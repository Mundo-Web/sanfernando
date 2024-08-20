import React, { useEffect, useState } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import Swal from 'sweetalert2'
import AttempDetailsRest from './actions/AttempDetailsRest'
import AttempsRest from './actions/AttempsRest'

const attempsRest = new AttempsRest()
const attempDetailsRest = new AttempDetailsRest()

const Evaluation = ({ evaluation, questions: questionsFromDB, attemp }) => {

  const [questions, setQuestions] = useState(questionsFromDB)
  const [percentage, setPercentaje] = useState(0)
  const [seconds, setSeconds] = useState(0)

  const index = questions.findIndex(({ done }) => !done)
  const question = questions[index]

  const moduleDuration = {
    hours: Math.floor(evaluation.duration / 60),
    minutes: evaluation.duration % 60
  }

  useEffect(() => {
    const startsAt = moment(attemp.created_at);
    const durationInSeconds = evaluation.duration * 60;

    const intervalId = setInterval(() => {
      const now = moment();
      const diffInSeconds = now.diff(startsAt, 'seconds')
      const percentageElapsed = (diffInSeconds / durationInSeconds) * 100
      const finalPercentage = Math.min(percentageElapsed, 100)
      setPercentaje(finalPercentage)
      setSeconds(diffInSeconds)

      if (percentage >= 100) {
        clearInterval(intervalId)
        finishEvaluation()
      }
    }, 1000);

    return () => clearInterval(intervalId);

  }, [attemp.created_at, evaluation.duration]);

  const hours = Math.floor(seconds / 3600);
  const minutes = Math.floor((seconds % 3600) / 60);
  const remainingSeconds = seconds % 60;

  let formattedTime = '';
  if (hours > 0) formattedTime += `${hours}h `;
  if (minutes > 0) formattedTime += `${minutes}m `;
  if (remainingSeconds > 0 || formattedTime === '') formattedTime += `${remainingSeconds}s`;

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
    const request = {
      'question_id': question.id,
      'answer_id': $(`[name="answer"]:checked`).val(),
      'attemp_id': attemp.id
    }
    const result = await attempDetailsRest.save(request)
    $(`[name="answer"]`).prop('checked', false)
    if (!result) return
    const newQuestions = structuredClone(questions)
    newQuestions.forEach(x => {
      if (x.id == question.id) x.done = true
    });
    setQuestions(newQuestions)
  }

  const onFinishEvaluation = async () => {
    const { isConfirmed } = await Swal.fire({
      title: '¿Estás seguro?',
      text: 'Estas a punto de finalizar esta evaluacion. Asegurate de haber marcado la respuesta correcta.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, finalizar',
      cancelButtonText: 'Cancelar'
    })
    if (!isConfirmed) return
    const request = {
      'question_id': question.id,
      'answer_id': $(`[name="answer"]:checked`).val(),
      'attemp_id': attemp.id
    }
    const result = await attempDetailsRest.save(request)
    if (!result) return

    finishEvaluation()
  }

  const finishEvaluation = async () => {
    const result = attempsRest.delete(attemp.id)
    if (!result) return
    location.href = `/micuenta/evaluation-finished/${attemp.id}`
  }

  if (!question) return finishEvaluation()

  return (<>
    <section>
      <div
        className="flex flex-col lg:flex-row gap-10 justify-between items-center px-[5%] lg:px-[8%] py-10 bg-rose-50 font-poppins_regular">
        <div className="flex gap-8 items-center max-w-3xl">
          <div className="">
            <div className="text-2xl font-bold font-poppins_bold leading-none text-neutral-800 ">
              Examen final: {evaluation.name}
            </div>
            <div className='mt-4 mb-2'>
              {
                evaluation.duration != null &&
                <div>
                  <i className='far fa-clock w-6 block text-center'></i>
                  <span className='me-1'>Duración</span>
                  <span>{moduleDuration.hours > 0 && <>{moduleDuration.hours}h</>} {moduleDuration.minutes > 0 && <>{moduleDuration.minutes}m</>}</span>

                </div>
              }
              <div>
                <i className='fas fa-question w-6 block text-center'></i>
                <span className='me-1'>{questions.length} preguntas</span>
              </div>
            </div>
            <div className="mt-2 text-base font-medium leading-6 text-gray-600 ">
              {evaluation.description}
            </div>
          </div>
        </div>
        {
          evaluation.duration == null &&
          <a href={`/micuenta/session/${evaluation.course.uuid}/${evaluation.id}`} className="px-6 py-3 text-sm font-semibold tracking-normal text-white bg-[#CF072C] rounded-xl">
            Completar después
          </a>
        }
      </div>
    </section>

    <section className='px-[5%] lg:px-[8%] font-poppins_regular'>

      {
        evaluation.duration != null && <div className='mx-auto mt-12 w-full max-w-3xl bg-white sticky top-4 p-4 pb-2 border rounded-md shadow-md'>
          <p className='mb-2'>Tiempo transcurrido: {formattedTime}</p>
          <div className="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
            <div className="bg-red-600 h-2.5 rounded-full dark:bg-red-500" style={{ width: `${percentage}%` }}></div>
          </div>
        </div>
      }

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
            {question.random_answers.filter(Boolean).map((answer, i) => (
              <div key={`answer-${i}`}>
                <label htmlFor={`answer-${answer.id}`} className="flex items-center gap-4 p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-red-500 peer-checked:border-red-600 peer-checked:text-red-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 peer-checked:bg-rose-50">
                  <input
                    type="radio"
                    id={`answer-${answer.id}`}
                    name="answer"
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
          {
            index == questions.length - 1
              ? <button
                className="font-semibold bg-[#CF072C] rounded-2xl w-max text-center py-4 px-8" onClick={() => onFinishEvaluation()}>
                Finalizar evaluación
              </button>
              : <button
                className="font-semibold bg-[#CF072C] rounded-2xl w-max text-center py-4 px-8" onClick={() => onNextClicked()}>
                Responder
              </button>
          }
        </div>
      </div>
    </section>
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <Evaluation {...properties} />);
})
