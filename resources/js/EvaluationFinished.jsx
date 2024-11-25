import React from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import AttempsRest from './actions/AttempsRest'

const attempsRest = new AttempsRest()

const ExamenFinalizado = ({ attemp, course, evaluation, attempsCount }) => {

  const passed = attemp.score > (evaluation.module?.aprove_with || (attemp.questions / 2))

  const onStartAttemp = async (e) => {
    const request = {
      evaluation_id: evaluation.id,
      course_id: course.id
    }
    const result = await attempsRest.save(request)
    if (!result) return
    location.href = `/micuenta/evaluation/${evaluation.id}`
  }

  return (<>
    {/* <section>
      <div
        className="flex flex-col lg:flex-row gap-10 justify-between items-center px-[5%] lg:px-[8%] py-10 bg-rose-50 font-poppins_regular">
        <div className="flex gap-8 items-center max-w-4xl">
          <div className="">
            <div className="text-2xl font-bold font-poppins_bold leading-none text-neutral-800 ">
              Examen Final de {course.producto}
            </div>
            <div className="mt-2 text-base font-medium leading-6 text-gray-600 ">
              Los exámenes online son pruebas realizadas en un ambiente virtual para
              evaluar y validar a distancia la preparación académica y las habilidades
              adquiridas por los estudiantes, esta modalidad ha ganado terreno en los
              últimos años ya que es considerada una forma más flexible de validar los
              conocimientos.
            </div>
          </div>
        </div>
        <a href='/micuenta' className=" px-8 py-3 text-sm font-semibold tracking-normal text-white bg-gray-500 rounded-xl">
          Volver a mi panel
        </a>
      </div>
    </section> */}

    <section className='px-[5%] lg:px-[8%]'>
      <div className="flex flex-col py-16  max-w-[687px] font-poppins_regular items-center justify-center mx-auto">
        <h1 className='h1'>{passed ? '¡Felicidades! 🎉' : 'No te desanimes'}</h1>
        <div className="flex flex-col w-full text-center max-md:max-w-full ">
          {
            passed
              ? <i className='my-10 text-[100px] text-green-500 far fa-smile'></i>
              : <i className='my-10 text-[100px] text-red-500 far fa-frown'></i>
          }
          <p className={`block mx-auto text-4xl font-bold rounded-lg border-4 w-max px-8 py-4 ${passed ? 'bg-green-100 border-green-300 text-green-500' : 'bg-red-100 border-red-300 text-red-500'}`}>{attemp.score}/{attemp.questions}</p>
          <div className="flex flex-col items-center mt-4 w-full max-md:max-w-full">
            {/* <div className="text-lg font-semibold leading-tight text-rose-700 max-md:max-w-full">
              ¡Examen Completado con Éxito!
            </div> */}
            <div className={`mt-4 text-xl tracking-normal leading-7 text-neutral-800 max-md:max-w-full`}>
              {
                passed
                  ? <>Has aprobado el examen en <b>{course.producto}</b>. Tu esfuerzo y dedicación han dado frutos. Sigue adelante con tu aprendizaje para alcanzar nuevos logros</>
                  : <>Aunque no aprobaste esta vez, cada paso cuenta. Sigue practicando y mejorando, y pronto dominarás <b>{course.producto}</b>.</>
              }
            </div>
          </div>
        </div>
        <div className="flex gap-6 mt-10">
          <a href='/micuenta'
            className="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
            Volver a mi panel
          </a>
          {
            !passed && attempsCount < evaluation.attemps &&
            <button onClick={onStartAttemp}
              className="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
              Dar un nuevo intento
            </button>
          }
          {
            passed && <a href={`/api/certificate/${attemp.id}`}
              // download={`Certificado de finalizacion - ${course.producto}.pdf`} 
              target='_blank'
              className="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
              <i className='fa fa-download me-1'></i>
              Descargar certificado
            </a>
          }
        </div>
      </div>
    </section>
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <ExamenFinalizado {...properties} />);
})
