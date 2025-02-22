import React from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import DropdownComponent from './components/Inputs/DropdownComponent'
import { format, parseISO } from 'date-fns';
import { es } from 'date-fns/locale';
import copyToClipboard from './Utils/copyToClipboard';
import { agregarPedido } from './Utils/carrito.js'
import YTEmbed from './Utils/YTEmbed.jsx';

const iconof = 'images/academia/check.png';

const CursoDetalle = ({ producto, modules, url_env }) => {

  console.log(modules)
  const currentUrl = window.location.href;
  const formatDate = (dateString) => {

    if (dateString == null) {
      return 'Proximamente'
    }
    const date = parseISO(dateString);
    return format(date, "dd 'de' MMMM 'del' yyyy", { locale: es });
  };

  const beneficios = producto?.beneficios ? JSON.parse(producto.beneficios) : [];
  const curso_dirigido = producto?.curso_dirigido ? JSON.parse(producto.curso_dirigido) : [];
  const incluye = producto?.incluye ? JSON.parse(producto.incluye) : [];
  const temario = producto?.temario ? JSON.parse(producto.temario) : [];


  const removeLastS = (str) => {
    if (!str || typeof str !== 'string') return str;
    const lastChar = str.slice(-1);
    if (lastChar === 'S' || lastChar === 's') {
      return str.slice(0, -1);
    }
    return str;
  };

  return (
    <>
      <main className="z-[15] mb-8">

        

        <div className="flex flex-col lg:flex-row gap-10 justify-between items-start px-[5%] xl:px-[8%] mt-16">
  
          <div className="flex flex-col min-w-[240px] w-full max-w-4xl">
            <div className="flex flex-col w-full">

              <div className="flex flex-col w-full text-lg gap-4">
                <div
                  className="flex font-Montserrat_Regular flex-wrap text-[#F19905] gap-2 items-center w-full text-sm">
                  <div className="self-stretch my-auto">Home</div>
                  <i className='fas fa-angle-right'></i>
                  <div className="self-stretch my-auto">Programas</div>
                  <i className='fas fa-angle-right'></i>
                  <div className="self-stretch my-auto">{producto?.category?.name ?? 'S/Categoria'}</div>
                  <i className='fas fa-angle-right'></i>
                  <div className="self-stretch my-auto font-medium text-[#191023]">
                    {producto?.producto ?? ''}  
                  </div>
                </div>


                <section className="flex flex-col rounded-none">
                  <div
                    className="flex relative flex-col pt-40 pr-20 w-full min-h-[400px]  max-md:pr-5 max-md:max-w-full">
                    {
                      producto.tipo_portada ?
                        <>
                          {
                            producto.tipo_portada == 'imagen' ?
                              <img loading="lazy"
                                src={`/${producto.portada_detalle}`}
                                onError={e => {
                                  e.target.onerror = null;
                                  e.target.src = 'https://cdn.builder.io/api/v1/image/assets/TEMP/b4e82bfe25986db29d99fb9384e4ab44a145de97336f63cc73125e430d7ff1d5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f';
                                }}
                                alt="" className="object-cover object-center absolute inset-0 size-full" />
                              : <YTEmbed videoId={producto.portada_detalle} />
                          }
                        </>

                        : <img loading="lazy"
                          src='https://cdn.builder.io/api/v1/image/assets/TEMP/b4e82bfe25986db29d99fb9384e4ab44a145de97336f63cc73125e430d7ff1d5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f'
                          alt="" className="object-cover object-center absolute inset-0 size-full" />
                    }
                  </div>
                </section>

                <div className="flex flex-wrap gap-10 justify-center items-center mt-0 w-full max-md:max-w-full">
                
                  {producto?.docentes.length > 0 && (
                    <div
                      className="flex flex-col flex-1 shrink items-start self-stretch my-auto basis-8 min-w-[240px]">
                      <div className="flex gap-3 justify-center items-center ms-8">
                        {producto?.docentes?.map((profesor, index) => (
                          <img loading="lazy"
                            src={`/${profesor.url_foto}`}
                            onError={e => {
                              e.target.onerror = null; 
                              e.target.src = '/images/img/noStaff.jpg';
                            }}
                            className="object-cover shrink-0 self-stretch my-auto w-14 h-14  aspect-[1.6] rounded-full -ms-8 border-4 border-white" />
                        ))}

                        <div className="flex flex-col self-stretch my-auto">
                          <div className="text-base tracking-normal text-[#191023] font-Montserrat_Regular">
                            Dictado por:
                          </div>
                          <div
                            className="flex gap-1.5 items-start text-[#F19905] text-base font-Montserrat_Regular font-semibold">
                            {producto?.docentes?.map((profesor, index) => (
                              <>
                                <div>{profesor.nombre}</div>
                                <div className="text-gray-600">•</div>
                              </>))}

                          </div>
                        </div>
                      </div>

                    </div>
                  )}
                  
                </div>

                <h2
                  className="font-Montserrat_Bold text-4xl md:text-5xl xl:text-[56px]">
                  {producto?.producto ?? ''}
                </h2>

                <div className="font-Montserrat_Regular text-base">
                  <div dangerouslySetInnerHTML={{ __html: producto?.description ?? '' }} />
                </div>
              </div>
 
            </div>


            {beneficios.length > 0 && (<div className="flex flex-col p-6 mt-10 w-full bg-[#F2F3F7] rounded-2xl">
              <div className="text-2xl font-Montserrat_Bold">
                Beneficios
              </div>
              <div
                className="flex flex-wrap gap-6 justify-start mt-6 w-full text-base font-Montserrat_Regular text-[#252222]">
                <div className="grid grid-cols-1 lg:grid-cols-2  min-w-[240px] gap-5 items-start">

                  {producto.beneficios && (
                    beneficios.map((beneficio, index) => (
                      <div key={index} className="flex gap-3 items-start w-full">
                        <i class="fa-solid fa-circle-check text-2xl text-[#F19905]"></i>
                        <div className="flex-1 shrink basis-0">
                          {beneficio}
                        </div>
                      </div>
                    ))
                  )}

                </div>
              </div>
            </div>)}

            <div className="flex flex-col gap-3 mt-10 w-full">
              <div className="text-2xl font-Montserrat_Bold">
                A quién va dirigido
              </div>

              <div className="flex flex-col w-full font-Montserrat_Regular">
                <div dangerouslySetInnerHTML={{ __html: producto?.description2 ?? '' }}></div>
              </div>

              {producto?.imagen_ambiente && (<img loading="lazy"
                src={'/' + producto.imagen_ambiente}
                className="object-contain mt-5 w-full rounded-xl " />
              )}
            </div>      


            {producto.que_lograras && (
              <div className='flex flex-col mt-10 w-full'>
                <div className="text-2xl font-Montserrat_Bold">
                  Qué lograrás una vez terminado el Diplomado
                </div>
                <div className="bg-[#F2F3F7] rounded-2xl p-6 mt-5">
                    <div className="grid grid-cols-1 min-w-[240px] gap-5 items-start w-full text-base font-Montserrat_Regular text-[#252222]">
                      
                      {(() => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(producto.que_lograras, "text/html");
                        const parrafos = Array.from(doc.querySelectorAll("p")); 

                        return parrafos.map((p, index) => (
                          <div key={index} className="flex gap-3 items-start w-full">
                            <i className="fa-solid fa-circle-check text-2xl text-[#F19905]"></i>
                            <div className="flex-1 shrink basis-0">
                              {p.textContent.trim()} 
                            </div>
                          </div>
                        ));
                      })()}

                    </div>
                </div>
              </div>
            )}  


            <div className="flex flex-col mt-10 w-full max-md:max-w-full">
              <div className="text-2xl font-Montserrat_Bold text-[#252222]">
                <h1>Temario</h1>
                <div className="max-w-2xl py-4 space-y-2">
                  {modules.sort((a, b) => a.order - b.order).map((module, index) => (
                    <div key={index} className="bg-[#F2F3F7] rounded-lg overflow-hidden border border-[#F19905]">
                      <div className="px-4 py-2 flex items-start justify-between cursor-pointer">
                        <div className="flex flex-col gap-1">
                          <h3 className="text-lg font-Montserrat_Bold text-gray-800">
                            {/* {module.type == 'session' ? `Módulo ${index + 1}`: 'Evaluación final'}:  */}
                            {module.name}
                          </h3>
                          <div className="mt-2 flex items-center font-Montserrat_Regular text-sm text-gray-600 space-x-4">
                            <span className="flex items-center">
                              <i className="fa fa-book mr-2 text-blue-500" />
                              {module.sources_count} recursos
                            </span>
                            <span className="flex items-center">
                              <i className="fa fa-clock mr-2 text-[#F19905]" />
                              {module.duration || 0}m
                            </span>
                          </div>
                        </div>
                        {/* <FontAwesomeIcon icon={faChevronDown} className="text-gray-400 mt-1" /> */}
                      </div>
                    </div>
                  ))}
                </div>
              </div>
            </div>


            {producto?.docentes.length > 0 && (
              <div className="flex flex-col mt-10 w-full">
                <div className="text-2xl leading-tight font-Montserrat_Bold">
                  Docente
                </div>

                {producto?.docentes?.map((profesor, index) => {
                  return (<div
                    className="flex flex-col items-start p-8 mt-6 w-full bg-[#F2F3F7] rounded-2xl max-md:px-5 max-md:max-w-full">
                    
                    <div className="flex flex-row gap-8 items-center">
                      <img loading="lazy"
                        src={`/${profesor.url_foto}`}
                        className="object-cover max-w-full aspect-square rounded-full w-20 h-20" onError={e => {
                          e.target.onerror = null; // Evita un bucle infinito
                          e.target.src = '/images/img/noStaff.jpg';
                        }} />
                      <div className="flex flex-col w-full">
                        <div className="text-xl md:text-2xl font-Montserrat_Bold leading-tight text-[#252222]">
                          {profesor.nombre}
                        </div>
                        <div
                          className="font-Montserrat_Regular text-sm tracking-normal leading-6 text-[#252222]">
                          {profesor.cargo}
                        </div>
                      </div>
                    </div>


                    <div className="flex flex-col self-stretch w-full">
                      <div
                        className="mt-4 w-full text-sm tracking-normal font-Montserrat_Regular leading-6 text-[#252222] rounded-none line-clamp-4">
                        {profesor.resume}
                      </div>
                    </div>

                    <a
                      href={'/detalleDocente/' + profesor.id}
                      target='_blank'
                      className="flex gap-2.5 justify-center items-center px-5 py-2.5 mt-6 text-sm font-Montserrat_Regular font-semibold text-center text-white bg-[#F19905] min-h-[40px] rounded-[100px]">
                      <div className="self-stretch my-auto cursor-pointer hover:scale-105 transition-all ">Perfil del docente</div>
                    </a>

                  </div>)
                })}
              </div>
            )}


             {/* {curso_dirigido.length > 0 && (
              <div className="flex flex-col p-8 mt-10 w-full bg-red-100 rounded-2xl max-md:px-5 max-md:max-w-full">
                <div className="text-2xl font-bold leading-tight text-neutral-800">
                  Para quién es este curso:
                </div>
                {curso_dirigido && (
                  curso_dirigido.map((dirigido, index) => (
                    <div key={index} className="flex flex-col mt-6 w-full text-base font-medium leading-7 text-gray-600 max-md:max-w-full">
                      <div className="flex flex-wrap gap-3 items-start w-full max-md:max-w-full">
                        <img
                          loading="lazy"
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/6e84fb4bc6c6f35489c342e99c89685f6adb3ba8589f0c00d73788555bd53af3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                          className="object-contain shrink-0 w-6 aspect-square"
                        />
                        <div className="flex-1 shrink basis-0 max-md:max-w-full">
                          {dirigido}
                        </div>
                      </div>
                    </div>
                  ))
                )}
              </div>
            )}       */}
            
            {/* <div className="flex flex-col mt-10 w-full max-md:max-w-full">

              {temario > 0 &&
                (<><div className="text-2xl font-bold leading-tight text-neutral-800">
                  Temario
                </div>
                  <div className="flex flex-col mt-6 w-full max-md:max-w-full gap-4">

                    {temario && Object.entries(temario).map(([key, tema]) => (
                      <DropdownComponent key={key} tema={tema} />
                    ))}

                  </div></>)}

                      
              {producto?.brochure_url !== null && (<a href={`${url_env}/${producto.brochure_url}`}
                target='_blank'
                className="flex gap-3 items-center self-start px-4 py-2 mt-6 text-base font-bold leading-tight text-white bg-rose-700 rounded-xl"
              >
                <img loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/6951aae30f33bd543a5f70e81f55bc643f33df502d318789244486f456ed1aca?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                  className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                <div className="self-stretch my-auto">Brochure del curso</div>
              </a>)}

            </div> */}

          </div>

          <div className="flex flex-col sticky top-8 justify-center py-8 bg-[#F5F5F9] rounded-2xl w-full lg:w-[600px]">
            <div className="flex flex-col px-6 w-full max-md:px-5">
              <div className="flex flex-col lg:flex-row gap-3 lg:gap-10 justify-between items-start w-full">

                {producto.descuento > 0 ? (

                  <>
                    <div className="flex flex-col gap-2 items-center self-stretch my-auto font-Montserrat_Bold">
                      <div className="self-stretch my-auto text-base font-medium text-[14px] line-through text-[#252222]" >
                        S/ {producto.precio}
                      </div>
                      <div className="self-stretch my-auto text-2xl font-bold leading-none">

                        S/ {producto.descuento}
                      </div>
                    </div>
                    <div
                      className="gap-2.5 font-Montserrat_SemiBold px-3 py-2 my-auto text-sm font-bold leading-none text-[#191023] uppercase bg-[#D8D8DE] rounded-xl">
                      {((producto.precio - producto.descuento) / producto.precio * 100).toFixed(2)}% off
                    </div>

                  </>
                ) : (producto.precio && producto.descuento && (
                  <div className="flex gap-2 items-center self-stretch my-auto">
                    <div className="self-stretch my-auto text-2xl font-bold leading-none font-Montserrat_Bold">
                      {console.log(producto)}
                      S/ {producto.precio}
                    </div>
                  </div>
                ))}


              </div>
              {
                producto.offer_message &&
                <div
                  className="flex gap-2 justify-center font-Montserrat_SemiBold items-center self-start mt-3 text-sm font-medium tracking-normal leading-none text-[#F19905]">
                  <i class="fa-regular fa-clock text-xl"></i>
                  <div className="self-stretch my-auto">{producto.offer_message}</div>
                </div>
              }
            </div>

            {incluye && Object.values(incluye).some(item => item.titulo) && ( 
              <div>
                  <div className="mt-6 w-full border border-white border-solid min-h-[1px]"></div>

                  <div className="flex flex-col px-6 mt-6 w-full max-md:pl-5">
                    <div className="text-base font-medium leading-none text-[#252222] font-Montserrat_Medium">
                      Este curso incluye:
                    </div>
                    <div className="flex flex-col mt-3 gap-1 text-sm text-[#252222] font-Montserrat_Regular">
                      {Object.entries(incluye).map(([key, item]) =>
                        (item.icon && item.titulo) && ( // Verifica si al menos uno de los dos existe
                          <div key={key} className="flex gap-2 items-center">
                            {item.icon ? (
                              <img
                                src={item.icon}
                                alt="Icono"
                                className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square"
                              />
                            ) : (
                              <div>•</div>
                            )}
                            <div className="self-stretch my-auto w-[340px]">{item.titulo}</div>
                          </div>
                        )
                      )}
                    </div>
                  </div>
              </div>
            )}


            <div className="mt-6 w-full border border-white border-solid min-h-[1px]"></div>

            <div className="flex flex-col px-6 mt-6 w-full max-md:px-5">
              <div className="flex flex-col lg:flex-row w-full text-sm font-bold tracking-normal text-center gap-3">
                <div
                  onClick={() => agregarPedido(producto.id)}
                  className=" px-3 w-full text-white rounded-xl font-Montserrat_SemiBold py-3 cursor-pointer bg-[#F19905]">
                  Añadir al carrito
                </div>
              </div>

            </div>

            <div className="mt-6 w-full border border-white border-solid min-h-[1px]"></div>

            <div className="flex flex-col px-6 mt-6 w-full">
              <div className="text-sm font-medium leading-loose text-neutral-800 font-Montserrat_Medium">

                Comparte este {removeLastS(producto.category.name) ?? 'Curso'}:
              </div>
              <div className="flex flex-col mt-4 w-full">
                <div className="flex gap-3 items-center w-full">
                  <a
                    href={`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="cursor-pointer hover:bg-[#D8D8DE] text-[#191023] flex flex-1 shrink gap-2.5 justify-center items-center self-stretch p-3.5 my-auto bg-[#D8D8DE] rounded-lg basis-0"
                  > 
                    <i class="fa-brands fa-facebook-f text-xl"></i>
                  </a>
                  <a
                    href={`mailto:?subject=Enlace Interesante&body=${encodeURIComponent(currentUrl)}`}
                    className="cursor-pointer hover:bg-[#D8D8DE] text-[#191023] flex flex-1 shrink gap-2.5 justify-center items-center self-stretch p-3 my-auto bg-[#D8D8DE] rounded-lg basis-0"
                  >
                    <i class="fa-solid fa-envelope text-xl"></i>
                  </a>
                  <a
                    href={`https://api.whatsapp.com/send?text=${encodeURIComponent(currentUrl)}`}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="cursor-pointer hover:bg-[#D8D8DE] text-[#191023] flex flex-1 shrink gap-2.5 justify-center items-center self-stretch p-3.5 my-auto bg-[#D8D8DE] rounded-lg basis-0"
                  >
                    <i class="fa-brands fa-whatsapp text-xl"></i>
                  </a>
                </div>
                <div
                  onClick={copyToClipboard}
                  className="font-Montserrat_SemiBold cursor-pointer flex gap-3 justify-center items-center px-5 py-2 mt-2 w-full text-sm font-medium tracking-normal leading-none text-white bg-[#191023] rounded-lg min-h-[40px]">
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/523e4f3fbfa03ca18485d6b1725cd6b81714f16700efdac0d4303b0c2b12c9c5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                  <div className="self-stretch my-auto">Copiar link</div>
                </div>
              </div>
            </div>
          </div>
          
        </div>

      </main >

    </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <CursoDetalle {...properties} />);
})
