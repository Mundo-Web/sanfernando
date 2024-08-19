import React, { useState } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import Tippy from '@tippyjs/react'
const CursoDesarrollo = ({ course, modules, module }) => {

  const sessions = modules.filter(({ type }) => type == 'session')
  const sources = []
  sessions.forEach(({ sources: sourcesList }) => {
    sources.push(...sourcesList)
  });

  const duration = {
    hours: Math.floor(course.duracion / 60),
    minutes: course.duracion % 60
  }

  let selectedIndex = 0;

  return (<>
    <section className='font-poppins_regular'>
      <div className="flex flex-col justify-center px-[5%] lg:px-[8%] py-10 bg-rose-50 max-md:px-5">
        <div className="flex gap-4 items-start self-start text-sm tracking-normal leading-loose text-gray-600">
          <div className="flex gap-1.5 items-center">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/8cf366cd34ab8b5d4cd45ab7c71c60bd034877bbf0693e2ee39d9ecb522c053a?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
              className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
            <div className="self-stretch my-auto">{sessions.length} Módulos</div>
          </div>
          <div className="flex gap-1.5 items-center">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/338e830eec014330ce2a92be373e18dacb23bde78a6e898be522e28771877bcc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
              className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
            <div className="self-stretch my-auto">{sources.length} lecturas</div>
          </div>
          <div className="flex gap-1.5 items-center">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/e741bbd4b7dc70c93c9b761f4b9c581051feedaf16bfd30c61ff7268f6580b05?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
              className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
            <div className="self-stretch my-auto">{duration.hours && <>{duration.hours}h</>} {duration.minutes}m</div>
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
        <div className="flex flex-col text-sm font-semibold tracking-normal text-white w-[200px] gap-2 sticky top-8">
          {
            modules.sort((a, b) => a.order - b.order).map(({ id, type, name }, i) => {
              if (id == module.id) selectedIndex = i
              return <a key={`module-${i}`}
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
                {/* <div className="flex gap-3 justify-center items-center min-w-[240px]">
                  <img loading="lazy"
                    srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/fb3076258c6d528ab4da1f72b847f22a80a3b844be6ae6c257ffb6621b6f4ebf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/fb3076258c6d528ab4da1f72b847f22a80a3b844be6ae6c257ffb6621b6f4ebf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/fb3076258c6d528ab4da1f72b847f22a80a3b844be6ae6c257ffb6621b6f4ebf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/fb3076258c6d528ab4da1f72b847f22a80a3b844be6ae6c257ffb6621b6f4ebf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/fb3076258c6d528ab4da1f72b847f22a80a3b844be6ae6c257ffb6621b6f4ebf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/fb3076258c6d528ab4da1f72b847f22a80a3b844be6ae6c257ffb6621b6f4ebf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/fb3076258c6d528ab4da1f72b847f22a80a3b844be6ae6c257ffb6621b6f4ebf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/fb3076258c6d528ab4da1f72b847f22a80a3b844be6ae6c257ffb6621b6f4ebf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    className="object-contain shrink-0 self-stretch my-auto w-28 aspect-[3.5]" />
                  <div className="flex flex-col self-stretch my-auto">
                    <div className="text-sm font-semibold tracking-normal leading-none text-rose-700">
                      512
                    </div>
                    <div className="text-xs leading-none text-gray-600">
                      Estudiantes mirando
                    </div>
                  </div>
                </div> */}
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
        </div>
      </div>
    </section>
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <CursoDesarrollo {...properties} />);
})
