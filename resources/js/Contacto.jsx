import React, { useEffect, useState } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import { Fetch } from 'sode-extend-react'
import arrayJoin from './Utils/ArrayJoin'
import { set } from 'sode-extend-react/sources/cookies'
import SliderFront from './components/Section/SliderFront'
import SliderBenefit from './components/Section/SliderBenefit'
import TwoColumn from './components/Section/TwoColumn'
import Curse from './components/Product/Curse'
import SliderTestimony from './components/Section/SliderTestimony'


const Contacto = () => {

const imgcontacto = 'images/img/contacto.png';


return (<>

    <section>
        <div className="flex w-full bg-[#FFF0F0] h-10 lg:h-20 max-md:max-w-full" role="banner"></div>
        <div className="grid grid-cols-1 lg:grid-cols-2 w-full gap-12 px-[8%] pt-12 xl:pt-16">

            <div className="flex flex-col justify-center gap-5 text-textWhite ">

                <h1
                    className="text-[#1D2026] font-poppins_bold font-semibold tracking-tighter text-3xl md:text-5xl leading-none md:leading-tight">
                    Conecta con nosotros
                </h1>
                <p className="text-[#4E5566] text-base font-poppins_regular">
                    ¿Quieres charlar? ¡Nos encantaría saber de ti! Ponte en contacto con nuestro equipo de atención
                    al cliente para solicitar información sobre eventos para conferencias, tarifas de publicidad
                    o simplemente para saludarnos.
                </p>
                <div className="flex flex-row gap-5 font-poppins_semibold">
                    <a
                        className="bg-[#CF072C] text-white px-5 py-3 rounded-2xl text-base border-2 flex gap-2 border-[#CF072C] flex-row items-center ">
                        Copiar correo
                        <i className="fa-solid fa-envelope"></i>
                    </a>
                </div>
            </div>

            <div className="flex flex-col justify-center items-center">
                <img src={`${imgcontacto}`} className="object-contain object-bottom h-[300px] md:h-[500px] w-full" />
            </div>
        </div>
    </section>

    <section>
        <div className="flex gap-10 items-start px-[5%] lg:px-[8%] py-12 lg:py-20 bg-rose-50 font-poppins_regular">
            <div
                className="flex flex-wrap flex-1 shrink gap-10 items-start w-full basis-0 min-w-[240px] max-md:max-w-full">
                <div className="flex flex-col flex-1 shrink basis-12 min-w-[240px] max-md:max-w-full">
                    <div className="text-lg leading-6 text-gray-600 max-md:max-w-full">
                        ¿Estarás en Lima o en alguna otra sucursal próximamente? ¡Pasa por la
                        oficina! Nos encantaría conocerte.
                    </div>
                    <div className="flex flex-col mt-10 w-full max-md:max-w-full">
                        <div className="grid grid-cols-1 lg:grid-cols-3 items-start w-full">
                            <div
                                className="text-lg font-semibold leading-none text-rose-700 whitespace-nowrap w-[140px] lg:col-span-1">
                                Dirección
                            </div>
                            <div
                                className="flex-1 shrink text-sm tracking-normal leading-5 text-gray-600 basis-0 lg:col-span-2 mt-4 md:mt-0">
                                Malecón de la Reserva 615, Miraflores,
                                <br />
                                Lima - Perú. Cod. 15067
                            </div>
                        </div>
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/c4be9338ef810ad25349a9942e4c64f42b947683f61445b27a0c779a921d0c69?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            className="object-contain mt-10 w-full aspect-[500] max-md:max-w-full" />
                        <div className="grid grid-cols-1 lg:grid-cols-3 mt-10 w-full ">
                            <div
                                className="text-lg font-semibold leading-none text-rose-700 whitespace-nowrap w-[140px] lg:col-span-1">
                                Teléfonos
                            </div>
                            <div
                                className="flex flex-col flex-1 shrink justify-center text-sm tracking-normal leading-snug text-gray-600 basis-0 min-w-[240px] lg:col-span-2 mt-4 md:mt-0">
                                <div>(+51) 555-0103</div>
                                <div className="mt-2">(+51) 999-643-256</div>
                            </div>
                        </div>
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/c4be9338ef810ad25349a9942e4c64f42b947683f61445b27a0c779a921d0c69?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            className="object-contain mt-10 w-full aspect-[500] max-md:max-w-full" />
                        <div className="grid grid-cols-1 lg:grid-cols-3 mt-10 w-full">
                            <div className="text-lg font-semibold leading-none text-rose-700 w-[140px]">
                                Emails
                            </div>
                            <div
                                className="flex flex-col flex-1 shrink justify-center text-sm tracking-normal leading-snug text-gray-600 basis-0 min-w-[240px] mt-4 md:mt-0">
                                <div>ayuda@gestionpublica.com</div>
                                <div className="mt-2">cursosydiplomados@gestionpublica.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    className="flex flex-col p-6 bg-white rounded-xl min-w-[240px] w-[560px] max-md:px-5 max-md:max-w-full">
                    <div className="flex flex-col w-full max-md:max-w-full">
                        <div className="text-3xl font-semibold leading-tight text-neutral-800 max-md:max-w-full">
                            Ponerse en contacto
                        </div>
                        <div className="mt-2 text-base leading-7 text-gray-600 max-md:max-w-full">
                            No dudes en contactarnos, nos encanta hacer nuevos socios y amigos.
                        </div>
                    </div>
                    <form>
                        <div
                            className="flex flex-wrap gap-4 items-start mt-4 w-full whitespace-nowrap max-md:max-w-full">
                            <div className="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
                                <label className="text-sm tracking-normal leading-loose text-gray-600">
                                    Nombres
                                </label>
                                <input type="text"
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                    placeholder="Nombres" />
                            </div>
                            <div className="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
                                <label className="text-sm tracking-normal leading-loose text-gray-600">
                                    Apellidos
                                </label>
                                <input type="text"
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                    placeholder="Apellidos" />
                            </div>
                        </div>
                        <div className="flex gap-4 items-start mt-4 w-full whitespace-nowrap max-md:max-w-full">
                            <div className="flex flex-col flex-1 shrink w-full basis-0 min-w-[240px] max-md:max-w-full">
                                <label
                                    className="text-sm tracking-normal leading-loose text-gray-600 max-md:max-w-full">
                                    Email
                                </label>
                                <input type="email"
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                    placeholder="hola@mail.com" />
                            </div>
                        </div>
                        <div className="flex gap-4 items-start mt-4 w-full whitespace-nowrap max-md:max-w-full">
                            <div className="flex flex-col flex-1 shrink w-full basis-0 min-w-[240px] max-md:max-w-full">
                                <label
                                    className="text-sm tracking-normal leading-loose text-gray-600 max-md:max-w-full">
                                    Asunto
                                </label>
                                <input type="text"
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                    placeholder="Asunto" />
                            </div>
                        </div>
                        <div className="flex gap-4 items-start mt-4 w-full whitespace-nowrap max-md:max-w-full">
                            <div className="flex flex-col flex-1 shrink w-full basis-0 min-w-[240px] max-md:max-w-full">
                                <label
                                    className="text-sm tracking-normal leading-loose text-gray-600 max-md:max-w-full">
                                    Mensaje
                                </label>
                                <textarea
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                    placeholder="Hola..." rows="4" />
                            </div>
                        </div>
                        <button type="submit"
                            className="flex flex-wrap gap-2.5 justify-center items-center px-5 py-2.5 mt-8 w-full text-base font-bold text-center text-white whitespace-nowrap bg-rose-700 rounded-lg min-h-[40px] max-md:max-w-full">
                            <span className="self-stretch my-auto">Enviar</span>
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/d92c6cc3d0df6caa871cf303337026a1a06afa6ca812d6675145e94891c2c8c2?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</>)
}

CreateReactScript((el, properties) => {
createRoot(el).render(
<Contacto {...properties} />);
})
