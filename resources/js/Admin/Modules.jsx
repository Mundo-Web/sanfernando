import React, { useEffect, useRef, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { default as Modal, default as ReactModal } from 'react-modal';
import 'tippy.js/dist/tippy.css';
import CourseCard from '../components/Courses/CourseCard';
import CreateReactScript from '../Utils/CreateReactScript';
import FloatingInput from '../components/Forms/FloatingInput';
import ModulesRest from '../actions/ModulesRest';

Modal.setAppElement('body')

const customStyles = {
  content: {
    width: '480px',
    top: '50%',
    left: '50%',
    transform: 'translate(-50%, -50%)',
    height: 'calc(100vh - 140px)'
  },
};

const modulesRest = new ModulesRest()

const Modules = ({ courses }) => {
  const dropdownRef = useRef()

  const [selected, setSelected] = useState(courses[0] ?? null)
  const [modules, setModules] = useState([1, 2, 3, 4, 5, 6])
  const [modalOpen, setModalOpen] = useState(false)
  const [moduleOpen, setModuleOpen] = useState(null)
  const [sourceType, setSourceType] = useState('image');

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
  const imageRef = useRef()
  const videoRef = useRef()

  const fillForm = () => {
    idRef.current.value = moduleOpen?.id || undefined
    nameRef.current.value = moduleOpen?.name || ''
    descriptionRef.current.value = moduleOpen?.description || ''
    setSourceType(moduleOpen?.source_type || 'image')

    $(`#source-type-${moduleOpen?.source_type || 'image'}`).prop('checked', true)
    imageRef.current.value = null
    videoRef.current.value = moduleOpen?.source_type == 'image' ? null : `https://youtu.be/${moduleOpen.source}`
  }

  const onCloseModal = () => {
    setModuleOpen(null)
    setModalOpen(false)
  }

  const onModuleSubmit = async (e) => {
    e.preventDefault()
    const request = {
      course_id: selected.id,
      id: idRef.current.value,
      name: nameRef.current.value,
      description: descriptionRef.current.value,
      source_type: sourceType,
      source: sourceType == 'image' ? imageRef.current.value : videoRef.current.value
    }
    const result = await modulesRest.save(request)
    if (!result) return
    refreshModules()
    setModalOpen(false)
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
        <div key={`module-${i}`} className="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-md md:flex-row md:max-w-sm hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 cursor-pointer" onClick={() => onOpenModal(module)}>
          <img className="object-cover w-full max-h-48 md:h-auto md:w-32 rounded-none rounded-t-lg md:rounded-none md:rounded-s-lg" src={module.source_type == 'video' ? `https://i.ytimg.com/vi/${module.source}/hq720.jpg` : `/${module.source}`} alt={module.name} onError={e => e.target.src = '/images/img/noimagen.jpg'} />
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
            <input id="source-type-image" type="radio" value="image" name="source-type" className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer" defaultChecked
              onChange={e => setSourceType(e.target.value)} />
            <label htmlFor="source-type-image" className="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">Imagen</label>
          </div>
          <div className="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-full max-w-40">
            <input id="source-type-video" type="radio" value="video" name="source-type" className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer"
              onChange={e => setSourceType(e.target.value)} />
            <label htmlFor="source-type-video" className="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">Video</label>
          </div>
        </div>
        <input ref={imageRef} className={`${sourceType == 'image' ? 'block' : 'hidden'} w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400`} id="default_size" type="file"></input>
        <FloatingInput eRef={videoRef} label='Link del video (YouTube)' hidden={sourceType == 'image'} />

        <p className='mb-2' htmlFor="">Otros recursos</p>

        <div className="flex gap-10 justify-between items-center p-4 mt-5 w-full bg-rose-50 rounded-xl max-md:max-w-full">
          <div className="flex gap-3 items-center self-stretch my-auto min-w-[240px]">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/c5d28976a815d8ea0d04e6b48b765924274ee13e58597e6d14b658e4ff875e2d?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
              className="object-contain shrink-0 self-stretch my-auto w-12 aspect-square" />
            <div className="flex flex-col self-stretch my-auto w-[228px]">
              <div className="text-base font-medium leading-none text-neutral-800">
                Teoria_Gestion_Publica.pdf
              </div>
              <div className="mt-1 text-sm tracking-normal leading-loose text-rose-700">
                12.6 MB
              </div>
            </div>
          </div>
          <div
            className="gap-3 self-stretch px-4 py-2 my-auto text-base font-bold leading-tight text-white whitespace-nowrap bg-rose-700 rounded-lg">
            <i className='fa fa-trash'></i>
          </div>
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          <i className='fa fa-save me-1'></i>
          Guardar
        </button>
      </form>
    </ReactModal>

  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(<Modules {...properties} />);
})