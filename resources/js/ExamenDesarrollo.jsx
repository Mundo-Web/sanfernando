import React, { useEffect, useState } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import Swal from 'sweetalert2'
import AttempsExamDetailsRest from './actions/AttempsExamDetailsRest'
import AttempsExamRest from './actions/AttempsExamRest'

const attempsExamRest = new AttempsExamRest()
const attempExamDetailsRest = new AttempsExamDetailsRest()

const ExamenDesarrollo = ({ evaluation, questions: questionsFromDB, attemp }) => {

  const [questions, setQuestions] = useState(questionsFromDB);
  const [percentage, setPercentaje] = useState(0);
  const [seconds, setSeconds] = useState(0);
  const [answers, setAnswers] = useState({}); // Estado para almacenar las respuestas seleccionadas
  
  const index = questions.findIndex(({ done }) => !done)
  const question = questions[index]

  const moduleDuration = {
    hours: Math.floor(evaluation.duracion / 60),
    minutes: evaluation.duracion % 60
  }

  // useEffect(() => {
  //   const startsAt = moment(attemp.created_at);
  //   const durationInSeconds = evaluation.duration * 60;

  //   const intervalId = setInterval(() => {
  //     const now = moment();
  //     const diffInSeconds = now.diff(startsAt, 'seconds')
  //     const percentageElapsed = (diffInSeconds / durationInSeconds) * 100
  //     const finalPercentage = Math.min(percentageElapsed, 100)
  //     setPercentaje(finalPercentage)
  //     setSeconds(diffInSeconds)

  //     if (percentage >= 100) {
  //       clearInterval(intervalId)
  //       finishEvaluation()
  //     }
  //   }, 1000);

  //   return () => clearInterval(intervalId);

  // }, [attemp.created_at, evaluation.duracion]);

  const hours = Math.floor(seconds / 3600);
  const minutes = Math.floor((seconds % 3600) / 60);
  const remainingSeconds = seconds % 60;

  let formattedTime = '';
  if (hours > 0) formattedTime += `${hours}h `;
  if (minutes > 0) formattedTime += `${minutes}m `;
  if (remainingSeconds > 0 || formattedTime === '') formattedTime += `${remainingSeconds}s`;

  // Función para manejar la selección de respuestas
  const handleAnswerChange = (questionId, answerId) => {
    setAnswers((prevAnswers) => ({
      ...prevAnswers,
      [questionId]: answerId,
    }));
  };


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
    const result = await attempExamDetailsRest.save(request)
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

    // const request = {
    //   'question_id': question.id,
    //   'answer_id': $(`[name="answer"]:checked`).val(),
    //   'attemp_id': attemp.id
    // }

    // Guardar todas las respuestas
    const requests = Object.entries(answers).map(([questionId, answerId]) => ({
      question_id: questionId,
      answer_id: answerId,
      attemp_id: attemp.id,
    }));

    //const result = await attempExamDetailsRest.save(request)
    const results = await Promise.all(requests.map(request => attempExamDetailsRest.save(request)));
    
    //if (!result) return
    if (results.some(result => !result)) return;

    finishEvaluation()
  }

  const finishEvaluation = async () => {
    const result = attempsExamRest.delete(attemp.id)
    if (!result) return
    location.href = `/micuenta/examen-simulacro-terminado/${attemp.id}`
  }

  if (!question) return finishEvaluation()

  return (<>
    <section>
      <div
        className="flex flex-col lg:flex-row gap-10 justify-between items-center px-[5%] lg:px-[8%] py-10 bg-rose-50 font-poppins_regular">
        <div className="flex gap-8 items-center max-w-3xl">
          <div className="">
            <div className="text-2xl font-bold font-poppins_bold leading-none text-neutral-800 ">
              {evaluation.producto}
            </div>
            <div className='mt-4 mb-2'>
              <div className='flex flex-row gap-2 items-center'>
                <i className='fa-solid fa-circle-question text-[#FF6636]'> </i>
                <span className='me-1'>{questions.length} preguntas</span>
              </div>
            </div>
            <div className="mt-2 text-base font-medium leading-6 text-gray-600 ">
              {evaluation.extract}
            </div>
          </div>
        </div>
        {/* {
          evaluation.duration == null &&
          <a href={`/micuenta/session/${evaluation.course.uuid}/${evaluation.id}`} className="px-6 py-3 text-sm font-semibold tracking-normal text-white bg-[#CF072C] rounded-xl">
            Completar después
          </a>
        } */}
      </div>
    </section>

    {/* <section className='px-[5%] lg:px-[8%] font-poppins_regular'>

      <div className="flex flex-col py-16 max-w-3xl mx-auto">

        <div className="flex flex-col w-full max-md:max-w-full">
          <div className="flex flex-col w-full font-semibold max-md:max-w-full">
            <div className="text-lg leading-tight text-rose-700 max-md:max-w-full">
              Pregunta {index + 1}
            </div>
            <div className="mt-2 text-xl tracking-normal leading-7 text-neutral-800 max-md:max-w-full">
              {question.question}
            </div>
            {question.imagen && (
                <img
                  src={`/storage/${question.imagen.replace("storage/", "")}`}
                  alt={question.question}
                  className="mt-4 rounded-lg max-w-full"
                />
            )}
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
                  <div className="w-full">{answer.response}</div>
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
    </section> */}

    <section className='px-[5%] lg:px-[8%] font-poppins_regular'>
        <div className="flex flex-col py-16 max-w-3xl mx-auto">
          {/* Listar todas las preguntas */}
          {questions.map((question, index) => (
            <div key={question.id} className="mb-10">
              <div className="flex flex-col w-full font-semibold">
                <div className="text-lg leading-tight text-rose-700">
                  Pregunta {index + 1}
                </div>
                <div className="mt-2 text-xl tracking-normal leading-7 text-neutral-800">
                  {question.question}
                </div>
                {question.imagen && (
                  <img
                    src={`/storage/${question.imagen.replace("storage/", "")}`}
                    alt={question.question}
                    className="mt-4 rounded-lg max-w-full"
                  />
                )}
              </div>
              <div className="flex flex-col gap-4 mt-6 w-full text-base font-medium leading-6 text-gray-600">
                {question.random_answers.filter(Boolean).map((answer) => (
                  <div key={`answer-${answer.id}`}>
                    <label
                      htmlFor={`answer-${question.id}-${answer.id}`}
                      className="flex items-center gap-4 p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100 peer-checked:border-red-600 peer-checked:text-red-600 peer-checked:bg-rose-50"
                    >
                      <input
                        type="radio"
                        id={`answer-${question.id}-${answer.id}`}
                        name={`answer-${question.id}`}
                        value={answer.id}
                        checked={answers[question.id] === answer.id}
                        onChange={() => handleAnswerChange(question.id, answer.id)}
                        className="peer w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500"
                        required
                      />
                      <div className="w-full">{answer.response}</div>
                    </label>
                  </div>
                ))}
              </div>
            </div>
          ))}

          {/* Botón para finalizar la evaluación */}
          <div className="flex flex-col lg:flex-row mt-16 text-sm tracking-normal text-white w-full gap-5 items-end">
            <button
              className="font-semibold bg-[#CF072C] rounded-2xl w-max text-center py-4 px-8"
              onClick={onFinishEvaluation}
            >
              Finalizar evaluación
            </button>
          </div>
        </div>
      </section>
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <ExamenDesarrollo {...properties} />);
})
