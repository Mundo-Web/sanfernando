import React from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import AttempsExamRest from './actions/AttempsExamRest'

const attempsExamRest = new AttempsExamRest()

const SimulacroTerminado = ({ attemp, course, evaluation, attempsCount, totalpuntaje }) => {

  const passed = attemp.score > (evaluation?.description)
  console.log(totalpuntaje)
  const onStartAttemp = async (e) => {
    const request = {
      evaluation_id: evaluation.id,
      course_id: course.id
    }
    const result = await attempsExamRest.save(request)
    if (!result) return
    location.href = `/micuenta/examen-simulacro/${evaluation.id}`
  }

  return (<>

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
            <div className="text-lg leading-tight text-rose-700 max-md:max-w-full">
              Obtuviste {attemp.score} respuestas correctas de {attemp.questions}
            </div>
            <div className={`mt-4 text-xl tracking-normal leading-7 text-neutral-800 max-md:max-w-full`}>
              {
                passed
                  ? <>Has aprobado <b>{course.producto}</b>. Tu esfuerzo y dedicación han dado frutos. Sigue adelante con tu aprendizaje para alcanzar nuevos logros</>
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
            <button onClick={onStartAttemp}
              className="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
              Dar un nuevo intento
            </button>
          }
        </div>

      </div>
    </section>
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <SimulacroTerminado {...properties} />);
})
