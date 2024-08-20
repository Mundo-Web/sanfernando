import React, { useEffect, useState } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import Tippy from '@tippyjs/react'
import AttempsRest from './actions/AttempsRest'


const attempsRest = new AttempsRest()

const CursoDesarrollo = ({ course, modules, module }) => {

  const sessions = modules.filter(({ type }) => type == 'session')
  const sources = []
  sessions.forEach(({ sources: sourcesList }) => {
    sources.push(...sourcesList)
  });

  const courseDuration = {
    hours: Math.floor(course.duracion / 60),
    minutes: course.duracion % 60
  }

  const moduleDuration = {
    hours: Math.floor(module.duration / 60),
    minutes: module.duration % 60
  }

  let selectedIndex = 0;

  useEffect(() => {
    const selectedModule = document.querySelector(`[data-pos="module-${selectedIndex}"]`);
    if (selectedModule) {
      selectedModule.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      // selectedModule.classList.add('ring-2', 'ring-offset-2', 'ring-red-500');
    }
  }, [null])

  const onStartAttemp = async (e) => {
    const request = {
      evaluation_id: module.id,
      course_id: course.id
    }
    const result = await attempsRest.save(request)
    if (!result) return
    location.href = `/micuenta/evaluation/${module.id}`
  }

  return (<>
    <section className='font-poppins_regular'>
      <div className="flex flex-col justify-center px-[5%] lg:px-[8%] py-10 bg-rose-50 max-md:px-5">
        <div className="flex gap-4 items-start self-start text-sm tracking-normal leading-loose text-gray-600">
          <div className="flex gap-1.5 items-center">
            <i className='fa fa-folder-open text-[#FF6636]'> </i>
            <div className="self-stretch my-auto">{sessions.length} Módulos</div>
          </div>
          <div className="flex gap-1.5 items-center">
            <i className='far fa-play-circle text-[#564FFD]'></i>
            <div className="self-stretch my-auto">{sources.length} lecturas</div>
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

    <section className='px-[5%] lg:px-[8%] font-poppins_regular'>
      <div className="flex flex-wrap gap-10 items-start py-16">
        <div id='modules' className="w-full flex flex-row overflow-x-auto md:overflow-hidden md:flex-col text-sm font-semibold tracking-normal text-white md:w-[200px] gap-2 md:sticky top-8">
          {
            modules.sort((a, b) => a.order - b.order).map(({ id, type, name }, i) => {
              if (id == module.id) selectedIndex = i
              return <a key={`module-${i}`} data-pos={`module-${i}`}
                href={`/micuenta/session/${course.uuid}/${id}`}
                className={`gap-3 self-stretch px-8 text-center max-w-full py-3 capitalize ${id == module.id ? 'bg-[#CF072C]' : 'bg-red-400'} hover:bg-[#CF072C] rounded-xl w-full cursor-pointer`}>
                {
                  type == 'session'
                    ? <>Módulo {i + 1}</>
                    : <>Examen final</>
                }
                <span className='block text-xs line-clamp-1 text-ellipsis text-nowrap'>{name}</span>
              </a>
            })
          }
        </div>
        <div className="flex flex-col flex-1 shrink basis-0 min-w-[240px] max-md:max-w-full">
          {
            module.type == 'session'
              ? <>

                <div className="flex flex-col w-full max-md:max-w-full">
                  {
                    module.source_type == 'image'
                      ? <img src={`/api/sources/${module.source}`} className="object-cover inset-0 aspect-video size-full rounded-lg" />
                      : <iframe href={`//www.youtube.com/watch?v=${module.source}`} data-videoid={module.source} class="embedded-video-large aspect-video size-full h-full rounded-lg" frameborder="0" allowfullscreen="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" title="Embed videos and playlists" width="400" height="230" src={`https://www.youtube.com/embed/${module.source}`} id="widget2" ></iframe>
                  }
                </div>
                <div className="flex flex-col pb-10 mt-8 w-full max-md:max-w-full">
                  <div className="flex flex-col pb-8 w-full border-b border-rose-50 max-md:max-w-full">
                    <div className="flex flex-col w-full font-semibold max-md:max-w-full">
                      <div className="text-lg leading-tight text-rose-700 max-md:max-w-full">
                        Modulo {selectedIndex + 1} - {module.name}
                      </div>
                      <div className="mt-2 text-xl tracking-normal leading-7 text-neutral-800 max-md:max-w-full">
                        {module.description}
                      </div>
                    </div>
                    <div className="flex flex-wrap gap-8 justify-center items-end mt-8 w-full max-md:max-w-full">
                      <div
                        className="flex flex-1 shrink gap-6 items-center text-sm tracking-normal leading-loose basis-0 min-w-[240px] max-md:max-w-full">
                        <div className="flex items-center self-stretch my-auto">
                          <div className="self-stretch my-auto text-gray-600 me-1">Publicado el</div>
                          <div className="self-stretch my-auto font-medium text-rose-700">
                            {moment(module.createdAt).format('LL')}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {
                    module.sources.length > 0 &&
                    <div className="flex flex-col mt-8 max-w-full min-h-[132px] w-[687px]">
                      <div
                        className="text-2xl font-semibold tracking-tight leading-none bg-blend-normal text-neutral-800 max-md:max-w-full">
                        Archivos adjuntos ({module.sources.length})
                      </div>
                      {
                        module.sources.map((source, i) => {
                          return <div key={`source-${i}`}
                            className="flex flex-wrap gap-10 justify-between items-center p-4 mt-5 w-full bg-rose-50 rounded-xl max-md:max-w-full">
                            <div className="flex gap-3 items-center self-stretch my-auto min-w-[240px]">
                              <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c5d28976a815d8ea0d04e6b48b765924274ee13e58597e6d14b658e4ff875e2d?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                className="object-contain shrink-0 self-stretch my-auto w-12 aspect-square" />
                              <div className="flex flex-col self-stretch my-auto w-[calc(100%-25px)]">
                                <div className=" text-base font-medium leading-none text-neutral-800 text-ellipsis line-clamp-1">
                                  {source.name}
                                </div>
                                <div className="mt-1 text-sm tracking-normal leading-loose text-rose-700">
                                  {Number(source.size / 1000000).toFixed(2)} MB
                                </div>
                              </div>
                            </div>
                            <Tippy content='Descargar recurso'>
                              <a href={`/api/sources/${source.ref}`} download={source.name} target='_blank'
                                className="gap-3 self-stretch px-4 py-2 my-auto text-base font-bold leading-tight text-white whitespace-nowrap bg-rose-700 rounded-lg">
                                <i className='fa fa-download'></i>
                              </a>
                            </Tippy>
                          </div>
                        })
                      }

                    </div>
                  }
                </div>
              </>
              : <div className="flex flex-col max-w-[724px]">
                <div className="flex gap-3 items-start w-full max-md:max-w-full">
                  <div className="flex flex-col flex-1 shrink w-full basis-0 min-w-[240px] max-md:max-w-full">
                    <div className="flex flex-wrap gap-6 items-center w-full font-semibold max-md:max-w-full">
                      <div className="self-stretch my-auto text-xl tracking-normal leading-none text-neutral-800">
                        Examen final: {module.name}
                      </div>
                      <div className="flex gap-1 justify-center items-center self-stretch px-2 py-1 my-auto text-xs leading-tight text-right text-gray-600 bg-amber-200 rounded-2xl">
                        <i className='fa fas fa-info-circle'></i>
                        <div className="self-stretch my-auto">Por realizar</div>
                      </div>
                    </div>
                    <div className="mt-3 text-base font-medium leading-6 text-gray-600 max-md:max-w-full">
                      {module.description}
                      <span className='block mt-2'>
                        Te proporcionaremos recomendaciones y detalles importantes para maximizar tu aprendizaje
                      </span>
                    </div>
                  </div>
                </div>
                <div className="flex flex-col mt-10 gap-6 w-full text-base leading-none text-gray-600 max-md:max-w-full">
                  {module.duration == null ? <div className="flex flex-col items-start w-full max-md:max-w-full">
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
                            {moduleDuration.hours > 0 && <>{moduleDuration.hours}h</>} {moduleDuration.minutes > 0 && <>{moduleDuration.minutes}m</>}</span>
                          <span className="block gap-2.5 self-stretch mt-2 font-medium max-md:pl-5 max-md:max-w-full">
                            Si finaliza el tiempo se enviará las respuestas que hayas
                            contestado.
                          </span>
                        </div>
                      </div>
                    </div>}
                  <div className="flex flex-col items-start w-full max-md:max-w-full">
                    <div className="flex gap-2 items-start font-bold">
                      <i className='shrink-0 fa fa-check text-[#CF072C] text-xl me-1'></i>
                      <div>
                        <span className='block'>Intentos permitidos</span>
                        <span className="block gap-2.5 self-stretch mt-2 font-medium max-md:pl-5 max-md:max-w-full">
                          Tendrás {module.attemps == 1 ? <><b>1</b> intento permitido</> : <><b>{module.attemps}</b> intentos permitidos</>} para desarrollar tu evaluación.
                        </span>
                      </div>
                    </div>
                  </div>
                  <div className="flex flex-col items-start w-full max-md:max-w-full">
                    <div className="flex gap-2 items-start font-bold">
                      <i className='shrink-0 fa fa-check text-[#CF072C] text-xl me-1'></i>
                      <div>
                        <span className='block'>Total de preguntas</span>
                        <span className="block gap-2.5 self-stretch mt-2 font-medium max-md:pl-5 max-md:max-w-full">
                          El examen consta de <b>{module.questions_count}</b> preguntas
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
                <button className="w-max px-8 py-4 mt-10 text-sm font-semibold text-white bg-rose-700 rounded-xl"
                  onClick={onStartAttemp}>
                  Realizar evaluación
                </button>
              </div>
          }
        </div>
      </div>
    </section>
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <CursoDesarrollo {...properties} />);
})
