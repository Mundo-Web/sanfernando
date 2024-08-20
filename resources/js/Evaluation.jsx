import React, { useState } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import Swal from 'sweetalert2'

const Evaluation = ({ evaluation, questions }) => {
  const [answers, setAnswers] = useState(questions)
  const index = questions.findIndex(({ done }) => !done)
  const question = questions[index]

  const onNextClicked = async () => {
    const { isConfirmed } = await Swal.fire({
      title: '¿Estás seguro?',
      text: 'No podras volver atras. Asegurate de haber marcado la respuesta correcta.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, continuar',
      cancelButtonText: 'Cancelar'
    })

    if (!isConfirmed) return
  }

  return (<>
    <section>
      <div
        className="flex flex-col lg:flex-row gap-10 justify-between items-center px-[5%] lg:px-[8%] py-10 bg-rose-50 font-poppins_regular">
        <div className="flex gap-8 items-center max-w-3xl">
          <div className="">
            <div className="text-2xl font-bold font-poppins_bold leading-none text-neutral-800 ">
              Examen final: {evaluation.name}
            </div>
            <div className="mt-2 text-base font-medium leading-6 text-gray-600 ">
              {evaluation.description}
            </div>
          </div>
        </div>
        {
          evaluation.duration == null &&
          <button className="px-6 py-3 text-sm font-semibold tracking-normal text-white bg-[#CF072C] rounded-xl">
            Completar después
          </button>
        }
      </div>
    </section>

    <section className='px-[5%] lg:px-[8%] font-poppins_regular'>

      <div className='mx-auto mt-12 w-full max-w-3xl bg-white sticky top-4 p-4 pb-2 border rounded-md shadow-md'>
        <p className='mb-2'>Tiempo transcurrido: </p>
        <div className="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
          <div className="bg-red-600 h-2.5 rounded-full dark:bg-red-500" style={{ width: '45%' }}></div>
        </div>
      </div>

      <div className="flex flex-col py-16 max-w-3xl mx-auto">
        <div className="flex flex-col w-full max-md:max-w-full">

          <div className="flex flex-col w-full font-semibold max-md:max-w-full">
            <div className="text-lg leading-tight text-rose-700 max-md:max-w-full">
              Pregunta {index + 1}
            </div>
            <div className="mt-2 text-xl tracking-normal leading-7 text-neutral-800 max-md:max-w-full">
              {question.name}
            </div>
          </div>
          <div className="flex flex-col gap-4 mt-10 w-full text-base font-medium leading-6 text-gray-600 max-md:max-w-full">
            {question.random_answers.map((answer, i) => (
              <div key={`answer-${i}`}>
                <label htmlFor={`answer-${answer.id}`} className="flex items-center gap-4 p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-red-500 peer-checked:border-red-600 peer-checked:text-red-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 peer-checked:bg-rose-50">
                  <input
                    type="radio"
                    id={`answer-${answer.id}`}
                    name="hosting"
                    value={answer.id}
                    className="peer w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    required
                  />
                  <div className="w-full">{answer.name}</div>
                </label>
              </div>
            ))}
          </div>
        </div>
        <div
          className="flex flex-col lg:flex-row mt-16  text-sm tracking-normal text-white w-full gap-5 items-end">
          <button
            className="font-semibold bg-[#CF072C] rounded-2xl w-max text-center py-4 px-8" onClick={() => onNextClicked()}>
            Responder
          </button>
        </div>
      </div>
    </section>
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <Evaluation {...properties} />);
})
