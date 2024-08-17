import React from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import DropdownComponent from './components/Inputs/DropdownComponent'
import { format, parseISO } from 'date-fns';
import { es } from 'date-fns/locale';



const CursoDetalle = ({ producto, url_env }) => {


  const formatDate = (dateString) => {
    console.log(dateString);
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


  return (
    <>
      <main className="z-[15] !font-poppins_regular">

        <section className="flex flex-col rounded-none ">
          <div
            className="flex relative flex-col pt-40 pr-20 w-full min-h-[400px]  max-md:pr-5 max-md:max-w-full">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/b4e82bfe25986db29d99fb9384e4ab44a145de97336f63cc73125e430d7ff1d5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
              alt="" className="object-cover absolute inset-0 size-full" />
            <div
              className="flex relative gap-2.5 items-center self-center p-6  h-[72px] rounded-[120px] w-[72px] max-md:px-5">
            </div>
            <div className=" relative flex-wrap items-center self-start mt-40 hidden lg:flex">
              <div className="flex flex-1 shrink self-stretch my-auto w-28 h-3 bg-red-800 basis-0"></div>
              <div className="flex flex-1 shrink self-stretch my-auto w-28 h-3 bg-red-600 basis-0"></div>
              <div className="flex flex-1 shrink self-stretch my-auto h-3 bg-red-500 basis-0 w-[111px]"></div>
              <div className="flex flex-1 shrink self-stretch my-auto w-28 h-3 bg-orange-400 basis-0"></div>
              <div className="flex flex-1 shrink self-stretch my-auto w-28 h-3 bg-cyan-600 basis-0"></div>
            </div>
          </div>
        </section>

        <section className="px-[5%] lg:px-[8%] py-8 text-lg  leading-6 text-white bg-rose-700 ">
          <div className='flex flex-col lg:flex-row justify-between max-w-5xl items-center mx-auto gap-5'>
            <div className="flex gap-4 items-start lg:items-center self-stretch my-auto min-w-[240px]">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/8c768f03b593a9e24068932a36a5418fd85469274a7b9fdf3c193e88f2bca428?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                alt="Calendar icon" className="object-contain shrink-0 w-10 aspect-square" />
              <p className="self-stretch my-auto font-bold">
                Inicio<br></br>
                <span className='font-normal'>{formatDate(producto.fecha_inicio)} </span>
              </p>
            </div>
            <div className="flex gap-4 items-center self-stretch my-auto">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/906244440b108bcc664a19de3f761476c01c580f34424dab1729c99d082cf97e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                alt="Virtual learning icon"
                className="object-contain shrink-0  w-10 aspect-square" />
              <p className="self-stretch my-auto font-bold">
                Modalidad<br></br>
                <span className='font-normal'>100% Virtual</span>
              </p>
            </div>
            <div className="flex gap-4 items-center self-stretch my-auto">
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/3d74ab37b381b9442d6119d2afb893d02a820df496e84ce8ccfc7301d6fb1600?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                alt="Certification icon"
                className="object-contain shrink-0  w-10 aspect-square" />
              <p className="self-stretch my-auto font-bold">
                Certificación<br></br>
                <span className='font-normal'>{producto.duracion} horas lectivas</span>
              </p>
            </div>
          </div>
        </section>

        <div className="flex flex-col lg:flex-row gap-10 justify-between items-start px-[5%] lg:px-[8%] mt-16">
          <div className="flex flex-col min-w-[240px] w-full max-w-4xl">
            <div className="flex flex-col w-full max-md:max-w-full">
              <div className="flex flex-col w-full text-lg leading-8 text-gray-600 max-md:max-w-full">
                <div
                  className="flex flex-wrap gap-2 items-center w-full text-sm tracking-normal leading-loose text-slate-400 max-md:max-w-full">
                  <div className="self-stretch my-auto">Home</div>
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/b1ffced907665d1171bcfd755af982685998caa1b7c77cf6aaa284d071c45939?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    className="object-contain shrink-0 self-stretch my-auto w-3.5 aspect-square" />
                  <div className="self-stretch my-auto">Cursos</div>
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/b1ffced907665d1171bcfd755af982685998caa1b7c77cf6aaa284d071c45939?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    className="object-contain shrink-0 self-stretch my-auto w-3.5 aspect-square" />
                  <div className="self-stretch my-auto">Categoria</div>
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/b1ffced907665d1171bcfd755af982685998caa1b7c77cf6aaa284d071c45939?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    className="object-contain shrink-0 self-stretch my-auto w-3.5 aspect-square" />
                  <div className="self-stretch my-auto font-medium">
                    {console.log(producto)}
                    {producto?.category?.name ?? ''}
                  </div>
                </div>
                <div
                  className="mt-4 text-6xl font-bold leading-[67px] text-neutral-800 max-md:max-w-full max-md:text-4xl max-md:leading-[54px]">
                  {producto?.producto ?? ''}

                </div>
                <div className="mt-4 max-md:max-w-full">
                  {producto?.extracto ?? ''}
                </div>
                <div className="mt-4 max-md:max-w-full">

                  <div dangerouslySetInnerHTML={{ __html: producto?.description ?? '' }} />
                </div>
              </div>
              <div className="flex flex-wrap gap-10 justify-center items-center mt-10 w-full max-md:max-w-full">
                {producto?.docentes.length > 0 && (<div
                  className="flex flex-col flex-1 shrink items-start self-stretch my-auto basis-8 min-w-[240px]">
                  <div className="flex gap-3 justify-center items-center">
                    <img loading="lazy"
                      srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                      className="object-contain shrink-0 self-stretch my-auto w-20 aspect-[1.6]" />
                    <div className="flex flex-col self-stretch my-auto">
                      <div className="text-sm tracking-normal leading-loose text-rose-700">
                        Dictado por:
                      </div>
                      <div
                        className="flex gap-1.5 items-start mt-1 text-base font-medium leading-none text-gray-600">
                        {producto?.docentes?.map((profesor, index) => (
                          <>
                            <div>{profesor.nombre}</div>
                            <div className="text-gray-600">•</div>
                          </>))}

                      </div>
                    </div>
                  </div>
                  {/* <div className="flex gap-2 justify-center items-center mt-6">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/dbaceea11f6a3f905103b5b188c28d8e0ff1a5bd47388b20a48abf6a1f56d225?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                      className="object-contain shrink-0 self-stretch my-auto aspect-[5] w-[120px]" />
                    <div className="flex gap-1 items-center self-stretch my-auto">
                      <div
                        className="self-stretch my-auto text-base font-medium leading-none text-gray-600">
                        4.8
                      </div>
                      <div
                        className="self-stretch my-auto text-sm tracking-normal leading-loose text-rose-700">
                        (451,444 Calificación)
                      </div>
                    </div>
                  </div> */}
                </div>)}


                <a href={`${url_env}/${producto.brochure_url}`}
                  target='_blank'
                  className="flex gap-3 items-center self-start px-4 py-2 mt-6 text-base font-bold leading-tight text-white bg-rose-700 rounded-xl"
                >
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6951aae30f33bd543a5f70e81f55bc643f33df502d318789244486f456ed1aca?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                  <div className="self-stretch my-auto">Brochure del curso</div>
                </a>
              </div>
            </div>
            {console.log(beneficios)}
            {beneficios.length > 0 && (<div className="flex flex-col p-6 mt-10 w-full bg-rose-50 rounded-2xl max-md:px-5 max-md:max-w-full">
              <div className="text-2xl font-bold leading-tight text-neutral-800 max-md:max-w-full">
                Beneficios
              </div>
              <div
                className="flex flex-wrap gap-6 justify-start mt-6 w-full text-base font-medium leading-7 text-gray-600 max-md:max-w-full">
                <div className="grid grid-cols-1 lg:grid-cols-2  min-w-[240px] gap-5 items-start">

                  {producto.beneficios && (
                    beneficios.map((beneficio, index) => (
                      <div key={index} className="flex gap-3 items-start w-full">
                        <img
                          loading="lazy"
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/3e100234612b63381b0913899134352995ff6d1ecd0c1d478b9db5d2ace8f35d?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                          className="object-contain shrink-0 w-6 aspect-square"
                          alt={`Beneficio ${index + 1}`}
                        />
                        <div className="flex-1 shrink basis-0">
                          {beneficio}
                        </div>
                      </div>
                    ))
                  )}

                </div>
              </div>
            </div>)}
            {console.log(producto.imagen_ambiente)}
            {producto?.imagen_ambiente && (<img loading="lazy"
              src={'/' + producto.imagen_ambiente}
              className="object-contain mt-10 w-full rounded-xl aspect-[1.19] max-md:max-w-full" />)}


            {curso_dirigido.length > 0 && (<div className="flex flex-col p-8 mt-10 w-full bg-red-100 rounded-2xl max-md:px-5 max-md:max-w-full">
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

            </div>)}


            <div className="flex flex-col mt-10 w-full max-md:max-w-full">
              <div dangerouslySetInnerHTML={{ __html: producto?.description2 ?? '' }}></div>
            </div>

            <div className="flex flex-col mt-10 w-full max-md:max-w-full">
              <div className="text-2xl font-bold leading-tight text-neutral-800">
                ¿Por qué elegir a EGESPP?
              </div>
              <div
                className="flex flex-col mt-6 w-full text-base font-medium leading-7 text-center text-gray-600 max-md:max-w-full">
                <div className="flex flex-wrap gap-4 w-full max-md:max-w-full">
                  <div
                    className="flex flex-col flex-1 shrink p-6 bg-rose-50 rounded-2xl basis-0 min-w-[240px] max-md:px-5">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f05e4604a53d3576c8baab5f2d69f1e2236d7896e07ac77fa4fa55d4770d568?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                      className="object-contain self-center w-10 aspect-square" />
                    <div className="mt-3.5">
                      Hemos capacitado a más de 1000 mil Alumnos a nivel nacional.
                    </div>
                  </div>
                  <div
                    className="flex flex-col flex-1 shrink self-start p-6 bg-red-100 rounded-2xl basis-0 min-w-[240px] max-md:px-5">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/fded84a8f2a4c00e41049a533cd475f87f11f9b1cd08a83986d7115c76e76bd6?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                      className="object-contain self-center w-10 aspect-square" />
                    <div className="mt-3.5">
                      Contamos con una moderna plataforma virtual implementada para ser
                      utilizada de manera constante.
                    </div>
                  </div>
                </div>
                <div className="flex flex-wrap gap-4 mt-4 w-full max-md:max-w-full">
                  <div
                    className="flex flex-col flex-1 shrink p-6 bg-red-100 rounded-2xl basis-0 min-w-[240px] max-md:px-5">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/900488d95906babfb0159e67099ca97c06c5a8689ad4fa6805f341a18d4fb5d0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                      className="object-contain self-center w-10 aspect-square" />
                    <div className="mt-3.5">
                      Tenemos docentes con más de 20 años de experiencia capacitando
                      profesionales, técnicos y estudiantes.
                    </div>
                  </div>
                  <div
                    className="flex flex-col flex-1 shrink p-6 bg-rose-50 rounded-2xl basis-0 min-w-[240px] max-md:px-5">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/a126e5871640bf976e51db9b2f3ece99025832d1b74101155de0d4699c72545b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                      className="object-contain self-center w-10 aspect-square" />
                    <div className="mt-3.5">
                      Metodología innovadora de enseñanza especializada
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="flex flex-col mt-10 w-full max-md:max-w-full">

              {temario > 0 &&
                (<><div className="text-2xl font-bold leading-tight text-neutral-800">
                  Temario
                </div>
                  <div className="flex flex-col mt-6 w-full max-md:max-w-full gap-4">

                    {temario && Object.entries(temario).map(([key, tema]) => (
                      <DropdownComponent key={key} tema={tema} />
                    ))}

                  </div></>)}

              <a href={`${url_env}/${producto.brochure_url}`}
                target='_blank'
                className="flex gap-3 items-center self-start px-4 py-2 mt-6 text-base font-bold leading-tight text-white bg-rose-700 rounded-xl"
              >
                <img loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/6951aae30f33bd543a5f70e81f55bc643f33df502d318789244486f456ed1aca?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                  className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                <div className="self-stretch my-auto">Brochure del curso</div>
              </a>
            </div>
            <div
              className="flex flex-col mt-10 w-full text-2xl font-bold leading-tight whitespace-nowrap text-neutral-800 max-md:max-w-full">
              <div className="max-md:max-w-full">Diploma</div>
              <img loading="lazy"
                srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                className="object-contain mt-6 w-full aspect-[1.28] max-md:max-w-full" />
            </div>
            {producto?.docentes.length > 0 && (<div className="flex flex-col mt-10 w-full max-md:max-w-full">
              <div className="text-2xl font-bold leading-tight text-neutral-800 max-md:max-w-full">
                Docente
              </div>
              {producto?.docentes?.map((profesor, index) => {
                return (<div
                  className="flex flex-col items-start p-8 mt-6 w-full bg-rose-50 rounded-2xl max-md:px-5 max-md:max-w-full">
                  <img loading="lazy"
                    srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    className="object-contain max-w-full aspect-square rounded-[200px] w-[136px]" />
                  <div className="flex flex-col self-stretch mt-6 w-full max-md:max-w-full">
                    <div className="flex flex-col w-full max-md:max-w-full">
                      <div className="text-xl font-bold leading-tight text-slate-700 max-md:max-w-full">
                        {profesor.nombre}
                      </div>
                      <div
                        className="mt-1.5 text-sm tracking-normal leading-6 text-gray-600 max-md:max-w-full">
                        {profesor.cargo}
                      </div>
                    </div>
                    <div
                      className="mt-4 w-full text-sm tracking-normal leading-6 text-gray-600 rounded-none max-md:max-w-full">
                      {profesor.cargo}
                    </div>
                  </div>
                  <a
                    className="flex gap-2.5 justify-center items-center px-5 py-2.5 mt-6 text-sm font-bold text-center text-white bg-rose-700 min-h-[40px] rounded-[100px]">
                    <div className="self-stretch my-auto cursor-pointer hover:scale-105 transition-all ">Perfil del decente</div>
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/750b30a75e1a11903416d34d5658b5bf616a3d859daa9372126fdab98a9b8f15?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                      className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square hover:scale-125" />
                  </a>
                </div>)
              })}

            </div>)}

            <div className="flex flex-col mt-10 w-full max-md:max-w-full">
              <div className="text-2xl font-bold leading-tight text-neutral-800 max-md:max-w-full">
                Inversión
              </div>
              <div
                className="flex flex-col p-6 mt-6 w-full bg-rose-50 rounded-2xl max-md:px-5 max-md:max-w-full">
                <div
                  className="flex flex-col w-full text-base font-medium leading-7 text-gray-600 max-md:max-w-full">
                  <div className="flex-1 shrink gap-2 self-stretch w-full max-md:max-w-full">
                    Valor: S/ {producto.precio}
                  </div>
                  <div className="flex-1 shrink gap-2 self-stretch mt-3 w-full max-md:max-w-full">
                    Persona Natural: S/ {producto.precio}
                  </div>
                  <div className="flex-1 shrink gap-2 self-stretch mt-3 w-full max-md:max-w-full">
                    Persona Jurídica: S/ {producto.precio} + IGV
                  </div>
                </div>
                <div
                  className="flex gap-2.5 justify-center items-center self-start px-5 py-2.5 mt-6 text-sm font-bold text-center text-white bg-rose-700 min-h-[40px] rounded-[100px] hover:scale-105 cursor-pointer">
                  <div className="self-stretch my-auto">Comprar Curso</div>
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/750b30a75e1a11903416d34d5658b5bf616a3d859daa9372126fdab98a9b8f15?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                </div>
              </div>
            </div>
            <div className="flex flex-col mt-10 w-full max-md:max-w-full">
              <div className="text-2xl font-bold leading-tight text-neutral-800 max-md:max-w-full">
                Método de Pago
              </div>
              <div
                className="flex flex-col p-6 mt-6 w-full bg-red-100 rounded-2xl max-md:px-5 max-md:max-w-full">
                <div className="text-xl font-bold leading-tight text-neutral-800 max-md:max-w-full">
                  Cuenta Bancaria BBVA
                </div>
                <div className="flex flex-col mt-5 w-full max-md:max-w-full">
                  <div className="flex flex-col w-full whitespace-nowrap max-md:max-w-full">
                    <div className="text-sm tracking-normal leading-loose text-gray-600 max-md:max-w-full">
                      Titular
                    </div>
                    <div
                      className="w-full text-lg font-bold tracking-normal leading-none rounded-none text-neutral-800 max-md:pr-5 max-md:max-w-full">
                      EGESPP
                    </div>
                  </div>
                  <div className="flex flex-col mt-3 w-full max-md:max-w-full">
                    <div className="text-sm tracking-normal leading-loose text-gray-600 max-md:max-w-full">
                      Número de cuenta
                    </div>
                    <div
                      className="w-full text-lg font-bold tracking-normal leading-none whitespace-nowrap rounded-none text-neutral-800 max-md:pr-5 max-md:max-w-full">
                      0011-0615-0200240417
                    </div>
                  </div>
                </div>
              </div>
              <div
                className="flex flex-wrap gap-5 mb-20 items-start p-6 mt-6 w-full bg-red-200 rounded-2xl max-md:px-5 max-md:max-w-full">
                <div className="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
                  <div className="text-xl font-bold leading-tight text-neutral-800">
                    Yape o Plin
                  </div>
                  <div className="flex flex-col mt-5 w-full">
                    <div className="flex flex-col w-full">
                      <div className="text-sm tracking-normal leading-loose text-gray-600">
                        Titular
                      </div>
                      <div
                        className="w-full text-lg font-bold tracking-normal leading-none rounded-none text-neutral-800 max-md:pr-5">
                        Edwin Williams
                      </div>
                    </div>
                    <div className="flex flex-col mt-3 w-full">
                      <div className="text-sm tracking-normal leading-loose text-gray-600">
                        Número Yape o Plin
                      </div>
                      <div
                        className="w-full text-lg font-bold tracking-normal leading-none rounded-none text-neutral-800 max-md:pr-5">
                        976 019 977
                      </div>
                    </div>
                  </div>
                </div>
                <img loading="lazy"
                  srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                  className="object-contain shrink-0 aspect-[0.98] w-[161px]" />
              </div>
            </div>
          </div>
          <div className="flex flex-col sticky top-0 justify-center py-8 bg-rose-50 rounded-2xl w-full lg:w-[400px]">
            <div className="flex flex-col px-6 w-full max-md:px-5">
              <div className="flex flex-col lg:flex-row gap-3 lg:gap-10 justify-between items-start w-full">
                <div className="flex gap-2 items-center self-stretch my-auto text-neutral-800">
                  <div className="self-stretch my-auto text-2xl font-bold leading-none">
                    S/ {producto.oferta}
                  </div>


                  <div className="self-stretch my-auto text-base font-medium">
                    PEN {producto.precio}
                  </div>
                </div>
                <div
                  className="gap-2.5  px-3 py-2 my-auto text-sm font-bold leading-none text-red-600 uppercase bg-red-100 rounded-xl">
                  {producto.precio && producto.oferta && (
                    <>
                      {((producto.precio - producto.oferta) / producto.precio * 100).toFixed(2)}% off
                    </>
                  )}
                </div>
              </div>
              <div
                className="flex gap-2 justify-center items-center self-start mt-3 text-sm font-medium tracking-normal leading-none text-red-600">
                <img loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/25fd0fa9e16611447f71de6665b5e2da08b305774b61b232d6688e6c7f2503c2?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                  className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                <div className="self-stretch my-auto">¡Quedan 2 días a este precio!</div>
              </div>
            </div>
            <div className="mt-6 w-full border border-white border-solid min-h-[1px]"></div>
            <div className="flex flex-col px-6 mt-6 w-full max-md:pl-5">
              <div className="text-base font-medium leading-none text-neutral-800">
                Este curso incluye:
              </div>
              {incluye && Object.entries(incluye).map(([key, incluye]) => (
                console.log(incluye),
                <div className="flex flex-col mt-4 text-sm tracking-normal leading-loose text-gray-600">
                  <div className="flex gap-3 items-center">
                    <img
                      src={incluye.icon}
                      alt="Icono"
                      className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                    <div className="self-stretch my-auto w-[340px]">{incluye.titulo}</div>
                  </div>
                </div>
              ))}

            </div>
            <div className="mt-6 w-full border border-white border-solid min-h-[1px]"></div>
            <div className="flex flex-col px-6 mt-6 w-full max-md:px-5">
              <div className="flex flex-col lg:flex-row w-full text-sm font-bold tracking-normal text-center gap-3">
                <div
                  className=" px-3 w-full text-white bg-red-400 rounded-xl py-3">
                  Añadir al carrito
                </div>
                <div
                  className="px-3 w-full text-white bg-red-800 rounded-xl py-3 ">
                  Comprar ahora
                </div>
              </div>
              <div className="mt-3 text-xs tracking-normal leading-5 text-neutral-800">
                Nota: todos los cursos tienen garantía de devolución de dinero de 30
                días.
              </div>
            </div>
            <div className="mt-6 w-full border border-white border-solid min-h-[1px]"></div>
            <div className="flex flex-col px-6 mt-6 w-full">
              <div className="text-sm font-medium leading-loose text-neutral-800">
                Comparte este curso:
              </div>
              <div className="flex flex-col mt-4 w-full">
                <div className="flex gap-3 items-center w-full">
                  <div
                    className="flex flex-1 shrink gap-2.5 justify-center items-center self-stretch p-3.5 my-auto bg-red-100 rounded-lg basis-0">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/fa62c6d683fac49cc5a880eea7906f26d6f470e256e95eedc3c44316b35515ac?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                      className="object-contain self-stretch my-auto w-5 aspect-square" />
                  </div>
                  <div
                    className="flex flex-1 shrink gap-2.5 justify-center items-center self-stretch p-3 my-auto bg-red-100 rounded-lg basis-0">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/efde1e2a7058704810584bf8b5c90aaf3a1719cccb5095a7c811993f9d92fb6e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                      className="object-contain self-stretch my-auto w-6 aspect-square" />
                  </div>
                  <div
                    className="flex flex-1 shrink gap-2.5 justify-center items-center self-stretch p-3.5 my-auto bg-red-100 rounded-lg basis-0">
                    <img loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/912f193523fb27114046af37fd481933e264b7f1c872b67cdcb5d8e56f1391bf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                      className="object-contain self-stretch my-auto w-5 aspect-square" />
                  </div>
                </div>
                <div
                  className="flex gap-3 justify-center items-center px-5 py-2 mt-2 w-full text-sm font-medium tracking-normal leading-none text-white bg-red-400 rounded-lg min-h-[40px]">
                  <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/523e4f3fbfa03ca18485d6b1725cd6b81714f16700efdac0d4303b0c2b12c9c5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                  <div className="self-stretch my-auto">Copiar link</div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </main>

    </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <CursoDetalle {...properties} />);
})
