import React, { useEffect, useRef, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { default as Modal, default as ReactModal } from 'react-modal';
import 'tippy.js/dist/tippy.css';
import CourseCard from '../components/Courses/CourseCard';
import CreateReactScript from '../Utils/CreateReactScript';
import FloatingInput from '../components/Forms/FloatingInput';
import ModulesRest from '../actions/ModulesRest';
import SourcesRest from '../actions/SourcesRest';
import Tippy from '@tippyjs/react';
import Swal from 'sweetalert2';

Modal.setAppElement('body')

const customStyles = {
  content: {
    maxWidth: '480px',
    width: '95%',
    top: '50%',
    left: '50%',
    transform: 'translate(-50%, -50%)',
    height: 'calc(100vh - 140px)'
  },
};

const modulesRest = new ModulesRest()
const sourcesRest = new SourcesRest()

const Modules = ({ courses }) => {
  const dropdownRef = useRef()

  const [selected, setSelected] = useState(courses[0] ?? null)
  const [modules, setModules] = useState([0, 1, 2, 3])
  const [modalOpen, setModalOpen] = useState(false)
  const [moduleOpen, setModuleOpen] = useState(null)
  const [sourceType, setSourceType] = useState('image');
  const [sources, setSources] = useState([]);

  useEffect(() => {
    refreshModules()
  }, [selected])

  const refreshModules = async () => {
    const newModules = await modulesRest.byCourse(selected?.id);
    setModules(newModules)
  }

  const closeDropdown = () => {
    $(dropdownRef.current).removeClass('block')
    $(dropdownRef.current).addClass('hidden')
    $(dropdownRef.current).attr('style', 'position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(705.556px, 157.778px);')
  }

  const onCourseClicked = (course) => {
    closeDropdown()
    setSelected(course)
  }

  const onOpenModal = (module = null) => {
    setModuleOpen(module)
    setModalOpen(true)
  }

  const idRef = useRef()
  const nameRef = useRef()
  const descriptionRef = useRef()
  const imagePreviewRef = useRef()
  const imageRef = useRef()
  const videoRef = useRef()

  const fillForm = async () => {
    idRef.current.value = moduleOpen?.id || ''
    nameRef.current.value = moduleOpen?.name || ''
    descriptionRef.current.value = moduleOpen?.description || ''
    const newSourceType = moduleOpen?.source_type || 'image'
    setSourceType(newSourceType)

    if (newSourceType == 'image') {
      $(`#source-type-image`).prop('checked', true)
      imageRef.current.value = null
      imagePreviewRef.current.src = `/api/sources/${moduleOpen?.source}`
      videoRef.current.value = null
    } else {
      $(`#source-type-video`).prop('checked', true)
      imageRef.current.value = null
      imagePreviewRef.current.src = null
      videoRef.current.value = `https://youtu.be/${moduleOpen?.source}`
    }

    setSources(moduleOpen?.sources || [])
  }

  const onImageChange = async (e) => {
    const file = e.target.files[0] ?? null
    if (!file) return imagePreviewRef.current.src = null
    const url = URL.createObjectURL(file)
    imagePreviewRef.current.src = url
  }

  const onCloseModal = () => {
    setModuleOpen(null)
    setModalOpen(false)
  }

  const onModuleSubmit = async (e) => {
    e.preventDefault()
    const formData = new FormData();
    formData.append('course_id', selected.id)
    formData.append('id', idRef.current.value || '')
    formData.append('name', nameRef.current.value)
    formData.append('description', descriptionRef.current.value)
    formData.append('source_type', sourceType)
    if (sourceType == 'image') {
      if (imageRef.current.files?.[0]) {
        formData.append('source', imageRef.current.files?.[0] ?? null)
      }
    } else {
      formData.append('source', videoRef.current.value)
    }
    if (!idRef.current.value) {
      formData.append('sources', sources.map(({ id }) => id))
    }
    const result = await modulesRest.save(formData)
    console.log(result)
    if (!result) return
    refreshModules()
    setModalOpen(false)
  }

  const onSourceChange = (e) => {
    const files = [...e.target.files]
    files.forEach(async file => {
      const formData = new FormData();
      if (moduleOpen?.id) {
        formData.append('module_id', moduleOpen.id);
      }
      formData.append('source', file);
      const result = await sourcesRest.save(formData)
      if (!result) return
      const newSources = structuredClone(sources)
      newSources.push(result)
      setSources(newSources)
    });
    e.target.value = null
  }

  const onDeleteSource = async (sourceId) => {
    const result = await sourcesRest.delete(sourceId)
    if (!result) return
    const newSources = structuredClone(sources).filter(({ id }) => id != sourceId)
    setSources(newSources)
  }

  const onDeleteModule = async () => {
    const { isConfirmed } = await Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción eliminará el módulo de forma permanente.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar'
    })
    if (!isConfirmed) return
    const result = await modulesRest.delete(moduleOpen.id)
    if (!result) return
    setModalOpen(false)
    refreshModules()
  }

  return (<>
    <div className='p-4 flex justify-center'>
      <div className='w-full max-w-sm'>
        <CourseCard producto={selected.producto} extract={selected.extract} imagen={selected.imagen} id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" hasShadow />

        <div ref={dropdownRef} id="dropdownNotification" className="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
          <label htmlFor='inputSearch' className="flex font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white items-center">
            <i className='fa fa-search text-lg py-2 px-3'></i>
            <input id='inputSearch' className='w-full bg-transparent outline-none border-none' type="text" placeholder='Buscar curso...' />
          </label>
          <div className="divide-y divide-gray-100 dark:divide-gray-700">
            {
              courses.map((course, i) => {
                return <CourseCard key={`course-${i}`} {...course} onClick={() => onCourseClicked(course)} />
              })
            }
          </div>
          <a href="/admin/products/create" className="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
            <div className="inline-flex items-center ">
              <i className='fa fa-plus me-1'></i>
              Nuevo curso
            </div>
          </a>
        </div>
      </div>
    </div>

    <button className='block mx-auto bg-white text-gray-700 shadow-md rounded-full py-2 px-4 hover:bg-gray-100' onClick={() => onOpenModal()}>
      <i className='fa fa-plus me-1'></i> Agregar modulo
    </button>

    <div className='p-4 flex items-center justify-center gap-4 flex-wrap'>
      {modules.sort((a, b) => a.order - b.order).map((module, i) => (
        <div key={`module-${i}`} className="relative flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-md md:flex-row md:max-w-sm hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 cursor-pointer" onClick={() => onOpenModal(module)}>
          {
            module.type == 'session'
              ? <>
                <img className="object-cover w-full max-h-48 md:h-auto md:w-32 rounded-none rounded-t-lg md:rounded-none md:rounded-s-lg" src={module.source_type == 'video' ? `https://i.ytimg.com/vi/${module.source}/hq720.jpg` : `/api/sources/${module.source}`} alt={module.name}
                  onError={e => e.target.src = '/images/img/noimagen.jpg'}
                />
                {
                  module.source_type == 'video' && <i className='absolute top-2 left-2 fab fa-youtube text-lg text-[#FF0000]'></i>
                }
              </>
              : <img className="object-cover w-full max-h-48 md:h-auto md:w-32 rounded-none rounded-t-lg md:rounded-none md:rounded-s-lg" src={'/images/img/quizz-default.png'} alt={module.name}
                onError={e => e.target.src = '/images/img/noimagen.jpg'}
              />
          }

          <div className="flex flex-col justify-between p-4 leading-normal">
            <h5 className="mb-1 font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2">{module.type == 'quick-exam'
              ? <span className="bg-yellow-100 text-yellow-800 text-xs font-medium me-1 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Examen parcial</span>
              : (module.type == 'final-exam'
                ? <span className="bg-red-100 text-red-800 text-xs font-medium me-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Examen final</span>
                : '')} {module.name}</h5>
            <p className="font-normal text-gray-700 dark:text-gray-400 line-clamp-2">{module.description}</p>
          </div>
        </div>
      ))}
    </div>

    <ReactModal isOpen={modalOpen} style={customStyles} onAfterOpen={fillForm} onRequestClose={onCloseModal}>
      <form onSubmit={onModuleSubmit}>
        <input ref={idRef} type="hidden" name="id" />
        <ul className="block mx-auto items-center w-max text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
          <li className="w-max border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
            <div className="flex items-center ps-3">
              <input id="horizontal-list-radio-id" type="radio" value="" name="list-radio" className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500  cursor-pointer" defaultChecked />
              <label htmlFor="horizontal-list-radio-id" className="w-full py-3 ps-2 pe-3 text-sm font-medium text-gray-900 dark:text-gray-300  cursor-pointer">Sesion</label>
            </div>
          </li>
          {/* <li className="w-max border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
          <div className="flex items-center ps-3">
            <input id="horizontal-list-radio-military" type="radio" value="" name="list-radio" className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 cursor-pointer" />
            <label htmlFor="horizontal-list-radio-military" className="w-full py-3 ps-2 pe-3 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">Parcial</label>
          </div>
        </li> */}
          <li className="w-max dark:border-gray-600">
            <div className="flex items-center ps-3">
              <input id="horizontal-list-radio-passport" type="radio" value="" name="list-radio" className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 cursor-pointer" />
              <label htmlFor="horizontal-list-radio-passport" className="w-full py-3 ps-2 pe-3 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">Evaluacion final</label>
            </div>
          </li>
        </ul>
        <hr className='my-4' />
        <FloatingInput eRef={nameRef} label='Titulo de la sesion' />
        <FloatingInput eRef={descriptionRef} label='Descripcion de la sesion' long />

        <p className='mb-2' htmlFor="">Recurso principal</p>
        <div className="mb-4 flex w-full justify-center gap-4">
          <div className="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-full max-w-40">
            <input id="source-type-image" type="radio" value="image" name="source-type" className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer"
              onChange={e => setSourceType(e.target.value)} />
            <label htmlFor="source-type-image" className="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">Imagen</label>
          </div>
          <div className="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-full max-w-40">
            <input id="source-type-video" type="radio" value="video" name="source-type" className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer"
              onChange={e => setSourceType(e.target.value)} />
            <label htmlFor="source-type-video" className="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">Video</label>
          </div>
        </div>
        <label className={`w-full ${sourceType == 'image' ? 'block' : 'hidden'} cursor-pointer mb-4`} htmlFor='input_image'>
          <img ref={imagePreviewRef} className='block mx-auto w-[250px] h-[150px] object-cover object-center rounded-md' src="/images/img/noimagen.jpg" alt="" onError={e => e.target.src = '/images/img/noimagen.jpg'} />
        </label>
        <input ref={imageRef} className='hidden' id="input_image" type="file" onChange={onImageChange}></input>
        <FloatingInput eRef={videoRef} label='Link del video (YouTube)' hidden={sourceType == 'image'} />

        <hr className='my-4' />
        <div className='flex justify-between items-center mb-2'>
          <p>Otros recursos</p>
          <label htmlFor="input-source" className="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 cursor-pointer" >
            <i className='fa fa-plus me-1'></i>
            Agregar
          </label>
          <input className='hidden' type="file" name="input-source" id="input-source" multiple onChange={onSourceChange} />
        </div>

        <div className="flex gap-2 flex-col">
          {sources.map((source, i) => {
            return <div key={`source-${i}`} className="flex gap-2 justify-between items-center p-4 w-full bg-rose-50 rounded-xl max-md:max-w-full">
              <div className="flex gap-3 items-center self-stretch my-auto min-w-[240px]">
                <i className='far fa-file-alt text-[48px] text-rose-700 shrink-0 self-stretch'></i>
                <div className="flex flex-col self-stretch my-auto w-[228px]">
                  <Tippy content='Ver recurso'>
                    <a href={`/${source.ref}`} className="w-[calc(100%-25px)] text-base font-medium leading-none text-neutral-800 text-ellipsis line-clamp-1 hover:underline" target='_blank'>
                      {source.name}
                    </a>
                  </Tippy>
                  <div className="mt-1 text-sm tracking-normal leading-loose text-rose-700">
                    {Number(source.size / 1000000).toFixed(2)} MB
                  </div>
                </div>
              </div>
              <Tippy content='Eliminar recurso'>
                <button type='button'
                  className="gap-3 self-stretch px-4 py-2 my-auto text-base font-bold leading-tight text-white whitespace-nowrap bg-rose-700 rounded-lg"
                  onClick={() => onDeleteSource(source.id)}>
                  <i className='fa fa-trash'></i>
                </button>
              </Tippy>
            </div>
          })}
        </div>

        <button type="submit" className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 me-2">
          <i className='fa fa-save me-1'></i>
          Guardar
        </button>
        <button type="button" className="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800" onClick={onDeleteModule}>
          <i className='fa fa-trash me-1'></i>
          Eliminar
        </button>
      </form>
    </ReactModal>

  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(<Modules {...properties} />);
})