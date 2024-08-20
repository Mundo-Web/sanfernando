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
import QuestionsRest from '../actions/QuestionsRest';
import AnswersRest from '../actions/AnswersRest';

Modal.setAppElement('body')

const customStyles = {
  content: {
    maxWidth: '480px',
    width: '95%',
    top: '50%',
    left: '50%',
    transform: 'translate(-50%, -50%)',
    height: 'max-content',
    maxHeight: 'calc(100vh - 140px)'
  },
};

const modulesRest = new ModulesRest()
const sourcesRest = new SourcesRest()
const questionsRest = new QuestionsRest()
const answersRest = new AnswersRest()

const Modules = ({ courses }) => {
  const dropdownRef = useRef()

  const [selected, setSelected] = useState(courses[0] ?? null)
  const [modules, setModules] = useState([])
  const [modalOpen, setModalOpen] = useState(false)
  const [moduleOpen, setModuleOpen] = useState(null)
  const [sourceType, setSourceType] = useState('image');
  const [sources, setSources] = useState([]);
  const [moduleType, setModuleType] = useState('session');
  const [questions, setQuestions] = useState([]);

  const [modalQAOpen, setModalQAOpen] = useState(false)

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
  const durationRef = useRef()
  const attempsRef = useRef()
  const imageRef = useRef()
  const videoRef = useRef()

  const fillForm = async () => {
    const newModuleType = moduleOpen?.type || 'session'
    setModuleType(newModuleType)

    idRef.current.value = moduleOpen?.id || ''
    nameRef.current.value = moduleOpen?.name || ''
    descriptionRef.current.value = moduleOpen?.description || ''

    if (newModuleType == 'session') {
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
    } else {
      durationRef.current.value = moduleOpen?.duration
      attempsRef.current.value = moduleOpen?.attemps
    }
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
    formData.append('type', moduleType)
    formData.append('id', idRef.current.value || '')
    formData.append('name', nameRef.current.value)
    formData.append('description', descriptionRef.current.value)
    if (moduleType == 'session') {
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
    } else {
      formData.append('duration', durationRef.current.value)
      formData.append('attemps', attempsRef.current.value)
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

  const onDeleteModule = async (moduleId) => {
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
    const result = await modulesRest.delete(moduleId)
    if (!result) return
    setModalOpen(false)
    refreshModules()
  }

  const fillQA = async () => {
    setQuestions(moduleOpen.questions || [])
  }

  const onOpenQAModal = (module = null) => {
    setModuleOpen(module)
    setModalQAOpen(true)
    setQuestions(module?.questions || [{ answers: [] }])
  }

  const onCloseQAModal = async () => {
    setModuleOpen(null)
    setModalQAOpen(false)
    refreshModules()
  }

  const onQuestionAdd = async () => {
    const { data } = await questionsRest.save({
      module_id: moduleOpen?.id
    })
    if (!data) return

    const newQuestions = structuredClone(questions)
    newQuestions.push(data)
    setQuestions(newQuestions)
  }

  const onDeleteQuestion = async (questionId) => {
    const { isConfirmed } = await Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción eliminará la pregunta de forma permanente.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar'
    })
    if (!isConfirmed) return

    const result = await questionsRest.delete(questionId)
    if (!result) return

    const newQuestions = structuredClone(questions).filter(({ id }) => id != questionId)
    setQuestions(newQuestions)
  }

  const onQuestionSave = async (questionId) => {
    const request = {
      id: questionId,
      module_id: moduleOpen?.id,
      name: $(`#question-${questionId}`).val()
    }
    const { data } = await questionsRest.save(request)
    if (!data) return

    const newQuestions = structuredClone(questions)
    const index = newQuestions.findIndex(({ id }) => id == questionId)
    if (index == -1) newQuestions.push(data)
    else newQuestions[index] = data
    setQuestions(newQuestions)
  }

  const onAnswerAdd = async (questionId) => {
    const { data } = await answersRest.save({
      question_id: questionId,
      module_id: moduleOpen?.id,
      name: $(`#answer-${questionId}`).val()
    })
    if (!data) return

    $(`#answer-${questionId}`).val(null)
    const newQuestions = structuredClone(questions)
    const index = newQuestions.findIndex(({ id }) => id == questionId)
    newQuestions[index].answers.push(data)
    setQuestions(newQuestions)
  }

  const onCheckAnswer = async (id, status) => {
    const { data } = await answersRest.status({ id, status })
    if (!data) return

    const newQuestions = structuredClone(questions)
    const index = newQuestions.findIndex(({ id }) => id == questionId)
    newQuestions[index].answers.forEach((answer) => {
      if (answer.id == id) answer.correct = data.correct
    });
    setQuestions(newQuestions)
  }

  const onDeleteAnswer = async (questionId, answerId) => {
    const result = await answersRest.delete(answerId)
    if (!result) return

    const newQuestions = structuredClone(questions)
    const index = newQuestions.findIndex(({ id }) => id == questionId)
    newQuestions[index].answers = newQuestions[index].answers.filter(({ id }) => id != answerId)
    setQuestions(newQuestions)
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
        <div key={`module-${i}`} className="relative flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-md md:flex-row md:max-w-sm hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 cursor-pointer">
          {
            module.type == 'session'
              ? <>
                <img className="object-cover w-full max-h-48 md:h-auto md:w-32 rounded-none" src={module.source_type == 'video' ? `https://i.ytimg.com/vi/${module.source}/hq720.jpg` : `/api/sources/${module.source}`} alt={module.name}
                  onError={e => e.target.src = '/images/img/noimagen.jpg'}
                />
                {
                  module.source_type == 'video' && <i className='absolute top-2 left-2 fab fa-youtube text-lg text-[#FF0000]'></i>
                }
              </>
              : <img className="object-cover w-full max-h-48 md:h-auto md:w-32 rounded-none" src={'/images/img/quizz-default.png'} alt={module.name}
                onError={e => e.target.src = '/images/img/noimagen.jpg'}
              />
          }

          <div className="flex flex-col gap-1 justify-between p-4 leading-normal">
            <h5 className="font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2">{module.type == 'quick-exam'
              ? <span className="bg-yellow-100 text-yellow-800 text-xs font-medium me-1 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Examen parcial</span>
              : (module.type == 'final-exam'
                ? <span className="bg-red-100 text-red-800 text-xs font-medium me-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Examen final</span>
                : '')} {module.name}</h5>
            <p className="font-normal text-gray-700 dark:text-gray-400 line-clamp-2">{module.description}</p>
            <div className="inline-flex rounded-md shadow-sm" role="group">
              <Tippy content='Editar'>
                <button type="button" className="inline-flex items-center px-2 py-1.5 text-xs font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                  onClick={() => onOpenModal(module)}>
                  <i className='fa fa-pencil'></i>
                </button>
              </Tippy>
              {
                module.type != 'session' &&
                <Tippy content='Ver/Agregar preguntas'>
                  <button type="button" className="inline-flex items-center px-2 py-1.5 text-xs font-medium text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                    onClick={() => onOpenQAModal(module)}>
                    <i className='fa fa-list'></i>
                  </button>
                </Tippy>
              }
              <Tippy content='Eliminar'>
                <button type="button" className="inline-flex items-center px-2 py-1.5 text-xs font-medium text-gray-900 bg-transparent border border-gray-900 rounded-e-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"
                  onClick={() => onDeleteModule(module.id)}>
                  <i className='fa fa-trash'></i>
                </button>
              </Tippy>
            </div>
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
              <input id="horizontal-list-radio-id" type="radio" value="session" name="list-radio" className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500  cursor-pointer" defaultChecked onChange={(e) => setModuleType(e.target.value)} />
              <label htmlFor="horizontal-list-radio-id" className="w-full py-3 ps-2 pe-3 text-sm font-medium text-gray-900 dark:text-gray-300  cursor-pointer">Sesion</label>
            </div>
          </li>
          {/* <li className="w-max border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
          <div className="flex items-center ps-3">
            <input id="horizontal-list-radio-military" type="radio" value="quick-exam" name="list-radio" className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 cursor-pointer" />
            <label htmlFor="horizontal-list-radio-military" className="w-full py-3 ps-2 pe-3 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">Parcial</label>
          </div>
        </li> */}
          <li className="w-max dark:border-gray-600">
            <div className="flex items-center ps-3">
              <input id="horizontal-list-radio-passport" type="radio" value="final-exam" name="list-radio" className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 cursor-pointer" onChange={(e) => setModuleType(e.target.value)} />
              <label htmlFor="horizontal-list-radio-passport" className="w-full py-3 ps-2 pe-3 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">Evaluacion final</label>
            </div>
          </li>
        </ul>
        <hr className='my-4' />
        <FloatingInput eRef={nameRef} label={moduleType == 'session' ? 'Titulo de la sesion' : 'Titulo del examen'} />
        <FloatingInput eRef={descriptionRef} label={moduleType == 'session' ? 'Descripcion de la sesion' : 'Descripcion del examen'} long />

        <div className={moduleType == 'session' ? 'block' : 'hidden'}>
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
            <input className='hidden' type="file" name="input-source" id="input-source" onChange={onSourceChange} />
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
        </div>

        <div className={`${moduleType == 'final-exam' ? 'flex' : 'hidden'} flex-col md:flex-row gap-2`}>
          <FloatingInput eRef={durationRef} label='Duracion (minutos)' type='number' />
          <FloatingInput eRef={attempsRef} label='Intentos' type='number' />
        </div>

        <button type="submit" className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 me-2">
          <i className='fa fa-save me-1'></i>
          Guardar
        </button>
      </form>
    </ReactModal>
    <ReactModal isOpen={modalQAOpen} style={customStyles} onAfterOpen={fillQA} onRequestClose={onCloseQAModal}>
      <h4 className='text-xl'>Preguntas y respuestas de <b>{moduleOpen?.name}</b></h4>
      <hr className='my-2' />
      <div className='w-full'>
        <button className="block mx-auto mt-2 mb-3 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 cursor-pointer"
          onClick={() => onQuestionAdd()}>
          <i className='fa fa-plus me-1'></i>
          Agregar
        </button>
      </div>
      <div className='flex flex-col gap-2'>
        {
          questions.map((question, i) => {
            return <div key={`question-${i}`} className='flex flex-col gap-2 border rounded-md p-4'>
              <div className='flex flex-row gap-2'>
                <button type="button" className="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                  onClick={() => onQuestionSave(question.id)}>
                  <i className='fa fa-save me-1'></i>
                  Guardar
                </button>
                <button type="button" className="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                  onClick={() => onDeleteQuestion(question.id)}>
                  <i className='fa fa-trash me-1'></i>
                  Eliminar
                </button>
              </div>
              <div>
                <label htmlFor={`question-${question.id}`} className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pregunta</label>
                <input type="text" id={`question-${question.id}`} className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder='Ingrese una pregunta' defaultValue={question.name} />
              </div>
              <hr />
              <div>
                <label htmlFor={`answer-${question.id}`} className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Respuesta</label>
                <div className="flex">
                  <input type="text" id={`answer-${question.id}`} className="rounded-none rounded-s-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese una respuesta" />
                  <Tippy content='Agregar respuesta'>
                    <button className="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600"
                      onClick={() => onAnswerAdd(question.id)}>
                      <i className='fa fa-plus'></i>
                    </button>
                  </Tippy>
                </div>
              </div>
              <p className='my-2'> Selecciona las respuestas correctas </p>
              <div className="flex flex-wrap gap-2">
                {question.answers.map((answer, i) => {
                  return <div key={`answer-${i}`} class="flex items-center border rounded-md px-2 py-1.5">
                    <input defaultChecked={answer.correct == 1} id={`answer-item-${answer.id}`} type="checkbox" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer" onChange={(e) => onCheckAnswer(answer.id, e.target.checked)} />
                    <label htmlFor={`answer-item-${answer.id}`} class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">{answer.name}</label>
                    <Tippy content='Eliminar respuesta'>
                      <i className='ms-1 fa fa-times mt-[4px] text-red-600' onClick={() => onDeleteAnswer(question.id, answer.id)}></i>
                    </Tippy>
                  </div>


                })}
              </div>
            </div>
          })
        }
      </div>
    </ReactModal>
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(<Modules {...properties} />);
})