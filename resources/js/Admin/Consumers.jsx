import React, { useRef, useState } from 'react';
import { createRoot } from 'react-dom/client';
import 'tippy.js/dist/tippy.css';
import Table from '../components/Table';
import CreateReactScript from '../Utils/CreateReactScript';
import ConsumersRest from '../actions/ConsumersRest';
import DxButton from '../components/dx/DxButton';
import ReactAppend from '../Utils/ReactAppend';
import Tippy from '@tippyjs/react';
import ReactModal from 'react-modal';
import CoursesRest from '../actions/CoursesRest';
import arrayJoin from '../Utils/arrayJoin';
import Swal from 'sweetalert2';
import SimpleCard from '../components/Users/SimpleCard';
import findIntersections from '../Utils/findIntersections';

const consumersRest = new ConsumersRest()
const coursesRest = new CoursesRest()

ReactModal.setAppElement('#app')

const modalStyles = {
  content: {
    width: '95%',
    maxWidth: '420px',
    height: 'max-content',
    maxHeight: '95vh',
    overflowY: 'auto',
    zIndex: '40',
    left: '50%',
    top: '50%',
    transform: 'translate(-50%, -50%)'
  }
}

const bigModalStyles = {
  content: {
    width: '95%',
    maxWidth: '660px',
    height: 'max-content',
    maxHeight: '95vh',
    overflowY: 'auto',
    zIndex: '40',
    left: '50%',
    top: '50%',
    transform: 'translate(-50%, -50%)'
  }
}

const Consumers = () => {
  const gridRef = useRef();
  const searchRef = useRef()

  const [coursesModalOpen, setCoursesModalOpen] = useState(false)
  const [certificatesModalOpen, setCertificatesModalOpen] = useState(false)
  const [massiveCoursesModalOpen, setMassiveCoursesModalOpen] = useState(false)

  const [individualLoaded, setIndividualLoaded] = useState(null)
  const [massiveLoaded, setMassiveLoaded] = useState(null)
  const [assignedCourses, setAssignedCourses] = useState([])
  const [foundCourses, setFoundCourses] = useState([])

  const onCoursesModalOpen = (data) => {
    setCoursesModalOpen(true)
    setAssignedCourses([])
    setIndividualLoaded(data)
  }

  const onCertificatesModalOpen = (data) => {
    setCertificatesModalOpen(true)
    setIndividualLoaded(data)
  }

  const onCoursesSearchChange = async (e) => {
    const search = e.target.value.trim()
    if (!search) {
      setFoundCourses([])
      return
    }
    const filter = [['producto', 'contains', search]];
    let notIn = []
    if (massiveCoursesModalOpen) {
      const intersection = findIntersections(massiveLoaded.map(x => x.courses), (a, b) => a.id == b.id)
      notIn = [...intersection, ...assignedCourses].map(course => (['id', '=', course.id]))
    } else {
      notIn = [...individualLoaded?.courses, ...assignedCourses].map(course => (['id', '=', course.id]))
    }
    if (notIn.length > 0) {
      filter.push(['!', arrayJoin(notIn, 'or')])
    }
    const result = await coursesRest.paginate({
      filter: arrayJoin(filter, 'and'),
    })
    setFoundCourses(result?.data ?? [])
  }

  const onRemoveAssigned = (id) => {
    setAssignedCourses(old => {
      const newCourses = old.filter(x => x.id != id)
      return newCourses
    })
  }

  const assignIndividualCourses = async () => {
    const { isConfirmed } = await Swal.fire({
      title: 'Asignar cursos',
      text: `¿Está seguro de asignar ${assignedCourses.length} ${assignedCourses.length == 1 ? 'curso' : 'cursos'} a ${individualLoaded?.name?.split(' ')[0]}?`,
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Asignar',
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33'
    })
    if (!isConfirmed) return

    const request = {
      user_id: individualLoaded?.id,
      courses: assignedCourses.map(({ id }) => id)
    }
    const result = await coursesRest.assign(request)
    if (!result) return
    setIndividualLoaded(result)
    setAssignedCourses([])
    $(gridRef.current).dxDataGrid('instance').refresh();
  }

  const assignMassiveCourses = async () => {
    const { isConfirmed } = await Swal.fire({
      title: 'Asignar cursos',
      text: `¿Está seguro de asignar ${assignedCourses.length} ${assignedCourses.length == 1 ? 'curso' : 'cursos'} a ${massiveLoaded.length} ${massiveLoaded.length == 1 ? 'alumno' : 'alumnos'}?`,
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Asignar',
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33'
    })
    if (!isConfirmed) return

    let assignedCount = 0
    const totalStudents = massiveLoaded.length

    const progressSwal = Swal.mixin({
      title: 'Asignación en curso',
      allowOutsideClick: false,
      allowEscapeKey: false,
      showConfirmButton: false
    })

    progressSwal.fire({
      html: `Se han asignado cursos a ${assignedCount}/${totalStudents} alumnos`
    })

    for (const user of massiveLoaded) {
      const courses = assignedCourses.filter(a => !user.courses.find(b => a.id === b.id))
      if (courses.length > 0) {
        const result = await coursesRest.assign({
          user_id: user.id,
          courses: courses.map(({ id }) => id)
        })
        if (result) {
          assignedCount++
          progressSwal.update({
            html: `Se han asignado cursos a ${assignedCount}/${totalStudents} alumnos`
          })
        }
      } else {
        assignedCount++
        progressSwal.update({
          html: `Se han asignado cursos a ${assignedCount}/${totalStudents} alumnos`
        })
      }
    }

    progressSwal.close()

    await Swal.fire({
      title: 'Asignación completada',
      text: 'Todos los cursos han sido asignados correctamente.',
      icon: 'success',
      confirmButtonText: 'Aceptar'
    })

    $(gridRef.current).dxDataGrid('instance').refresh()
    $(gridRef.current).dxDataGrid('instance').deselectAll();
    setMassiveCoursesModalOpen(false)
    setAssignedCourses([])
  }

  return (<>
    <Table gridRef={gridRef} title='Alumnos' rest={consumersRest} selectable
      toolBar={(container) => {
        container.unshift({
          widget: 'dxButton', location: 'after',
          options: {
            icon: 'refresh', hint: 'Refrescar tabla',
            onClick: () => $(gridRef.current).dxDataGrid('instance').refresh()
          }
        });
        container.unshift({
          widget: 'dxButton', location: 'after',
          options: {
            icon: 'fas fa-book', hint: 'Asignar cursos',
            onClick: () => {
              const rows = $(gridRef.current).dxDataGrid('instance').getSelectedRowKeys()
              if (rows.length == 0) return Swal.fire({
                title: 'Selecciona un alumno',
                text: 'Selecciona al menos un alumno para asignar cursos',
                icon: 'warning',
                confirmButtonText: 'Ok'
              })
              setMassiveLoaded(rows)
              setAssignedCourses([])
              setMassiveCoursesModalOpen(true)
            }
          }
        });
      }}
      columns={[
        {
          dataField: 'name',
          caption: 'Nombres'
        },
        {
          dataField: 'lastname',
          caption: 'Apellidos'
        },
        {
          dataField: 'email',
          caption: 'Correo',
        },
        {
          dataField: 'courses',
          caption: 'Cursos',
          cellTemplate: (container, { data }) => {
            ReactAppend(container, <Tippy content="Ver/Asignar cursos">
              <button onClick={() => onCoursesModalOpen(data)}>
                <i className='fa fa-book me-1'></i>
                {data.courses.length}
              </button>
            </Tippy>)
          },
          allowFiltering: false
        },
        {
          dataField: 'certificates_count',
          caption: 'Certificados',
          cellTemplate: (container, { data }) => {
            ReactAppend(container, <Tippy content="Ver/Asignar certificados">
              <button onClick={() => onCertificatesModalOpen(data)}>
                <i className='fa fa-mortar-board me-1'></i>
                {data.cetificates?.length || 0}
              </button>
            </Tippy>)
          }
        },
        {
          dataField: 'created_at',
          caption: 'Fecha creacion',
          dataType: 'datetime',
          format: 'yyyy-MM-dd HH:mm:ss',
          sortOrder: 'desc'
        },
        {
          caption: 'Acciones',
          cellTemplate: (container, { data }) => {
            container.append(DxButton({
              className: 'px-2 py-0 text-xs font-medium text-blue-700 bg-blue-100 rounded hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150 ease-in-out border-none text-blue-500',
              title: 'Ver/Asignar cursos',
              icon: 'fa fa-book',
              onClick: () => onCoursesModalOpen(data)
            }))
            container.append(DxButton({
              className: 'px-2 py-0 text-xs font-medium text-green-500 bg-green-100 rounded hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-150 ease-in-out border-none text-green-500',
              title: 'Ver/Asignar certificados',
              icon: 'fa fa-mortar-board',
              onClick: () => onCertificatesModalOpen(data)
            }))
          },
          allowFiltering: false,
          allowExporting: false
        }
      ]}
    />

    <ReactModal isOpen={coursesModalOpen} style={modalStyles} onRequestClose={() => {
      setCoursesModalOpen(false)
      setIndividualLoaded(null)
    }}>
      <h4 className='text-lg font-semibold mb-4'>Ver/Asignar cursos</h4>
      <SimpleCard {...individualLoaded} className='mb-4' />
      <div className='mb-2 flex justify-between text-md text-start text-gray-700 font-semibold'>
        Lista de cursos
      </div>
      <div className='relative mb-2'>
        <div className="relative">
          <div className="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
            <i className="fa fa-book"></i>
          </div>
          <input ref={searchRef} type="search" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full ps-10 p-2.5  outline-none" placeholder="Ingrese el nombre de un curso" onChange={onCoursesSearchChange} autoComplete='off' />
        </div>
        <div className={`${foundCourses.length > 0 ? 'absolute' : 'hidden'} z-10 bg-white rounded border w-full shadow mt-1`}>
          <ul className="max-h-48 py-2 overflow-y-auto text-gray-700 " aria-labelledby="dropdownUsersButton">
            {
              foundCourses?.map((course, index) => (<li key={index} className="w-full">
                <Tippy content={`Clic para agregar ${course.producto}`}>
                  <button className="flex items-center w-full px-4 py-2 hover:bg-gray-100 text-start" onClick={() => {
                    setAssignedCourses(old => ([...old, course]))
                    setFoundCourses([])
                    searchRef.current.value = ''
                  }}>
                    <img className="w-6 h-6 me-2 rounded-full" src={`/${course.imagen}`} alt={course.producto} onError={e => e.target.src = '/images/img/noimagen.jpg'} />
                    <span className="flex-1 truncate">{course.producto}</span>
                  </button>
                </Tippy>
              </li>))
            }
          </ul>
        </div>
      </div>
      <div className="relative border shadow rounded mb-4">
        <table className="w-full text-sm text-left rtl:text-right text-gray-500">
          <thead className="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" className="px-6 py-3">Curso</th>
              <th scope="col" className="px-6 py-3">Estado</th>
            </tr>
          </thead>
          <tbody>
            {
              individualLoaded?.courses?.length > 0 || assignedCourses.length > 0
                ? individualLoaded?.courses?.map((course, index) => {
                  return <tr key={index} className='bg-white border-t'>
                    <th scope="row" className="px-6 py-4 font-medium">
                      <div className='line-clamp-1 text-ellipsis w-full'>
                        {course.producto}
                      </div>
                    </th>
                    <td className="px-6 py-4 text-blue-500 text-nowrap">
                      En curso
                    </td>
                  </tr>
                })
                : <tr>
                  <td className='px-6 py-4 text-center text-nowrap' colSpan={2}>- Sin cursos -</td>
                </tr>
            }
            {
              assignedCourses.map((course, index) => {
                return <tr key={index} className='bg-white border-t'>
                  <th scope="row" className="px-6 py-4 font-medium">
                    <div className='line-clamp-1 text-ellipsis w-full'>
                      <Tippy content={`Quitar ${course.producto}`}>
                        <i className='fa fa-times text-red-500 font-semibold me-1 cursor-pointer' onClick={() => onRemoveAssigned(course.id)}></i>
                      </Tippy>
                      {course.producto}
                    </div>
                  </th>
                  <td className="px-6 py-4 text-gray-500 text-nowrap">
                    Por asignar
                  </td>
                </tr>
              })
            }
          </tbody>
        </table>
      </div>
      {
        assignedCourses.length > 0 &&
        <div className='text-end'>
          <Tippy content={`Asignar ${assignedCourses.length} ${assignedCourses.length == 1 ? 'curso' : 'cursos'} a ${individualLoaded?.name?.split(' ')[0]}`}>
            <button type="button" className="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2 me-2 mb-2" onClick={assignIndividualCourses}>
              Asignar
            </button>
          </Tippy>
        </div>
      }
    </ReactModal>

    <ReactModal isOpen={massiveCoursesModalOpen} style={bigModalStyles} onRequestClose={() => {
      setMassiveCoursesModalOpen(false)
      setMassiveLoaded([])
    }}>
      <h4 className='text-lg font-semibold mb-4'>Asignar cursos (Masivo)</h4>
      <div className="grid grid-cols-1 md:grid-cols-5 gap-4">
        <div className='col-span-1 md:col-span-2'>
          <div className='mb-2 flex justify-between text-md text-start text-gray-700 font-semibold'>
            Lista de Alumnos
          </div>
          <div className='flex flex-col gap-2'>
            {
              massiveLoaded?.map((user, index) => <SimpleCard key={index} {...user} />)
            }
          </div>
        </div>
        <div className='col-span-1 md:col-span-3'>
          <div className='mb-2 flex justify-between text-md text-start text-gray-700 font-semibold'>
            Lista de cursos
          </div>
          <div className='relative mb-2'>
            <div className="relative">
              <div className="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <i className="fa fa-book"></i>
              </div>
              <input ref={searchRef} type="search" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full ps-10 p-2.5  outline-none" placeholder="Ingrese el nombre de un curso" onChange={onCoursesSearchChange} autoComplete='off' />
            </div>
            <div className={`${foundCourses.length > 0 ? 'absolute' : 'hidden'} z-10 bg-white rounded border w-full shadow mt-1`}>
              <ul className="max-h-48 py-2 overflow-y-auto text-gray-700 " aria-labelledby="dropdownUsersButton">
                {
                  foundCourses?.map((course, index) => (<li key={index} className="w-full">
                    <Tippy content={`Clic para agregar ${course.producto}`}>
                      <button className="flex items-center w-full px-4 py-2 hover:bg-gray-100 text-start" onClick={() => {
                        setAssignedCourses(old => ([...old, course]))
                        setFoundCourses([])
                        searchRef.current.value = ''
                      }}>
                        <img className="w-6 h-6 me-2 rounded-full" src={`/${course.imagen}`} alt={course.producto} onError={e => e.target.src = '/images/img/noimagen.jpg'} />
                        <span className="flex-1 truncate">{course.producto}</span>
                      </button>
                    </Tippy>
                  </li>))
                }
              </ul>
            </div>
          </div>
          <div className="relative border shadow rounded mb-4">
            <table className="w-full text-sm text-left rtl:text-right text-gray-500">
              <thead className="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                  <th scope="col" className="px-6 py-3">Curso</th>
                  <th scope="col" className="px-6 py-3">Estado</th>
                </tr>
              </thead>
              <tbody>
                {
                  individualLoaded?.courses?.length > 0 || assignedCourses.length > 0
                    ? individualLoaded?.courses?.map((course, index) => {
                      return <tr key={index} className='bg-white border-t'>
                        <th scope="row" className="px-6 py-4 font-medium">
                          <div className='line-clamp-1 text-ellipsis w-full'>
                            {course.producto}
                          </div>
                        </th>
                        <td className="px-6 py-4 text-blue-500 text-nowrap">
                          En curso
                        </td>
                      </tr>
                    })
                    : <tr>
                      <td className='px-6 py-4 text-center text-nowrap' colSpan={2}>- Sin cursos -</td>
                    </tr>
                }
                {
                  assignedCourses.map((course, index) => {
                    return <tr key={index} className='bg-white border-t'>
                      <th scope="row" className="px-6 py-4 font-medium">
                        <div className='line-clamp-1 text-ellipsis w-full'>
                          <Tippy content={`Quitar ${course.producto}`}>
                            <i className='fa fa-times text-red-500 font-semibold me-1 cursor-pointer' onClick={() => onRemoveAssigned(course.id)}></i>
                          </Tippy>
                          {course.producto}
                        </div>
                      </th>
                      <td className="px-6 py-4 text-gray-500 text-nowrap">
                        Por asignar
                      </td>
                    </tr>
                  })
                }
              </tbody>
            </table>
          </div>
          {
            assignedCourses.length > 0 &&
            <div className='text-end'>
              <Tippy content={`Asignar ${assignedCourses.length} ${assignedCourses.length == 1 ? 'curso' : 'cursos'} a ${individualLoaded?.name?.split(' ')[0]}`}>
                  <button type="button" className="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2 me-2 mb-2" onClick={assignMassiveCourses}>
                  Asignar
                </button>
              </Tippy>
            </div>
          }
        </div>
      </div>
    </ReactModal>

    <ReactModal isOpen={certificatesModalOpen} style={modalStyles} onRequestClose={() => {
      setCertificatesModalOpen(false)
      setIndividualLoaded(null)
    }}>
      <h4 className='text-lg font-semibold mb-4'>Ver/Asignar certificados</h4>
    </ReactModal>
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(<Consumers {...properties} />);
})