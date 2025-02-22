import React, { useEffect } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import Tippy from '@tippyjs/react'
import AttempsExamRest from './actions/AttempsExamRest'


const attempsExamRest = new AttempsExamRest()

const SimulacroDesarrollo = ({ course, attemps, evaluation }) => {

  // const sessions = modules.filter(({ type }) => type == 'session')
  // const sources = []
  // sessions.forEach(({ sources: sourcesList }) => {
  //   sources.push(...sourcesList)
  // });
  
  const courseDuration = {
    hours: Math.floor(course.duracion / 60),
    minutes: course.duracion % 60
  }

  let selectedIndex = 0;

  useEffect(() => {
    // const selectedModule = document.querySelector(`[data-pos="module-${selectedIndex}"]`);
    // if (selectedModule) {
    //   selectedModule.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    //   // selectedModule.classList.add('ring-2', 'ring-offset-2', 'ring-red-500');
    // }
  }, [null])

  const onStartAttemp = async (e) => {
    const request = {
      evaluation_id: evaluation.id,
      course_id: course.id
    }
    const result = await attempsExamRest.save(request)
    if (!result) return
    location.href = `/micuenta/examen-simulacro/${evaluation.id}`
  }

  const latestAttempt = attemps.reduce((latest, attempt) => 
    new Date(attempt.created_at) > new Date(latest.created_at) ? attempt : latest, 
    attemps[0] // Inicia con el primer intento
  );
  
  const finished = latestAttempt ? latestAttempt.finished : null;

  return (<>

    <section className='font-poppins_regular'>
      <div className="flex flex-col justify-center px-[5%] lg:px-[8%] py-10 bg-rose-50 max-md:px-5">
        <div className="flex gap-4 items-start self-start text-sm tracking-normal leading-loose text-gray-600">
          <div className="flex gap-1.5 items-center">
            <i className='fa-solid fa-circle-question text-[#FF6636]'> </i>
            <div className="self-stretch my-auto">{evaluation.questions_count} Preguntas</div>
          </div>
          <div className="flex gap-1.5 items-center">
            <i className='far fa-clock text-[#FF6636]'> </i>
            <div className="self-stretch my-auto">{courseDuration.hours && <>{courseDuration.hours}h</>} {courseDuration.minutes}m</div>
          </div>
        </div>
        <div className="flex gap-8 items-center mt-8 w-full max-md:max-w-full">
          <div className="flex flex-col self-stretch my-auto min-w-[240px] w-[620px]">
            <div className="text-2xl font-bold font-poppins_bold leading-none text-neutral-800">
              {course.producto}
            </div>
            <div className="mt-2 text-base font-medium leading-6 text-gray-600 max-md:max-w-full">
              Extracto: {course.extract}
            </div>
          </div>
        </div>
      </div>
    </section>

    <section className='px-[5%] lg:px-[8%] font-poppins_regular flex flex-row py-16'>
      
        <div className="flex flex-col flex-1 shrink basis-0 min-w-[240px] max-md:max-w-full">
          {
            <div className="flex flex-col max-w-[724px]">
                  
                  <div className="text-base font-medium leading-6 text-gray-600 max-md:max-w-full">
                          Te proporcionaremos recomendaciones y detalles importantes para maximizar tu aprendizaje
                  </div>
                 
                  <div className="flex flex-col mt-10 gap-6 w-full text-base leading-none text-gray-600 max-md:max-w-full">
                    {
                      (course.duracion == null || course.duracion == 0) ?
                      <div className="flex flex-col items-start w-full max-md:max-w-full">
                        <div className="flex gap-2 items-start font-bold">
                          <i className='shrink-0 fa fa-check text-[#CF072C] text-xl me-1'></i>
                          <div>
                            <span className='block'>Tiempo ilimitado</span>
                            <span className="block gap-2.5 self-stretch mt-2 font-medium max-md:pl-5 max-md:max-w-full">
                              No hay un tiempo limite para la resolucion de esta evaluación
                            </span>
                          </div>
                        </div>
                      </div>
                        : <div className="flex flex-col items-start w-full max-md:max-w-full">
                          <div className="flex gap-2 items-start font-bold">
                            <i className='shrink-0 fa fa-check text-[#CF072C] text-xl me-1'></i>
                            <div>
                              <span className='block'>
                                <span className='me-1'>Duración</span>
                                  {courseDuration.hours > 0 && <>{courseDuration.hours}h</>} {courseDuration.minutes > 0 && <>{courseDuration.minutes}m</>}
                              </span>
                              <span className="block gap-2.5 self-stretch mt-2 font-medium max-md:pl-5 max-md:max-w-full">
                                Si finaliza el tiempo se enviará las respuestas que hayas
                                contestado.
                              </span>
                            </div>
                          </div>
                        </div>
                     } 
                    
                    <div className="flex flex-col items-start w-full max-md:max-w-full">
                      <div className="flex gap-2 items-start font-bold">
                        <i className='shrink-0 fa fa-check text-[#CF072C] text-xl me-1'></i>
                        <div>
                          <span className='block'>Total de preguntas</span>
                          <span className="block gap-2.5 self-stretch mt-2 font-medium max-md:pl-5 max-md:max-w-full">
                            El examen consta de <b>{evaluation.questions_count}</b> preguntas
                          </span>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div className="flex flex-col p-4 mt-10 w-full bg-rose-50 rounded-lg max-md:max-w-full">
                    <div className="text-base font-semibold tracking-normal leading-none text-neutral-800 max-md:max-w-full">
                      <i className='fas fa-lightbulb me-2'></i>
                      Recomendaciones
                    </div>
                    <div className="mt-1 text-sm font-medium leading-6 text-gray-600 max-md:max-w-full">
                      - Asegúrate de estar en un lugar tranquilo para evitar interrupciones.
                      <br />
                      - Lee cada pregunta con atención antes de responder.
                      <br />
                      - Revisa tus respuestas antes de enviar el examen.
                    </div>
                  </div>
                  {finished !== 1 && ( // Si el intento más reciente no está finalizado, muestra el botón
                      <button 
                        className="w-max px-8 py-4 mt-10 text-sm font-semibold text-white bg-rose-700 rounded-xl"
                        onClick={onStartAttemp}
                      >
                        {finished === 0 ? 'Continuar evaluación' : 'Realizar evaluación'}
                      </button>
                  )}
            </div>
          }
        </div>
      
    </section>
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <SimulacroDesarrollo {...properties} />);
})
