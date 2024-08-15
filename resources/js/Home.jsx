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


const Home = ({ url_env,
    productos,
    ultimosProductos,
    productosPupulares,
    blogs,
    banners,
    categorias,
    categoriasAll,
    destacados,
    descuentos,
    popups,
    general,
    benefit,
    faqs,
    testimonie,
    slider,
    category }) => {
    const sectionStep = 'images/img/palacio.png';
    const imgVideo = 'images/img/mujergp.png';
    const imgPlay = 'images/img/iconoplayblanco.png';


    return (<>
        <section className="w-full relative">
            <SliderFront categorias={categoriasAll} />
        </section>

        <section className="flex flex-wrap items-center">
            <div className="flex flex-1 shrink self-stretch my-auto h-3 bg-orange-400 basis-0 min-w-[240px] w-1/2"
                role="presentation"></div>
            <div className="flex flex-1 shrink self-stretch my-auto h-3 bg-cyan-600 basis-0 min-w-[240px] w-1/2"
                role="presentation"></div>
        </section>

        <section className="flex flex-wrap gap-5 items-start px-24 py-8 bg-[#CF072C] text-slate-100 max-md:px-5">
            <SliderBenefit />
        </section>

        <section>
            <TwoColumn />
        </section>

        <section className="bg-[#F9FAFB] px-[8%]">
            <div className="grid grid-cols-1 w-full gap-12  pt-12 xl:pt-16">
                <div className="flex flex-col justify-center gap-5 text-center">
                    <h2 className="text-[#CF072C] font-poppins_regular font-semibold text-lg">Cursos y Diplomados</h2>
                    <h1
                        className="text-[#1D2026] font-poppins_bold tracking-tighter text-3xl md:text-5xl leading-none md:leading-tight">
                        Nuestros Cursos y Diplomados
                    </h1>
                    <p className="text-[#4E5566] text-base font-poppins_regular max-w-3xl mx-auto">
                        Únase a nuestra famosa clase, el conocimiento proporcionado definitivamente será útil para usted.
                    </p>
                </div>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 w-full gap-12 pt-12 pb-12">

                {productosPupulares.map((producto, index) => { <Curse /> })}
                <Curse />

                <Curse />

                <Curse />
            </div>

            <div className="flex flex-row justify-center items-center pb-12 xl:pb-16">
                <a href="#"
                    className="flex w-48 gap-1 justify-center items-center self-stretch px-5 py-3 my-auto text-center text-white bg-[#FFDDDE] rounded-xl"
                    role="button">
                    <span className="self-stretch my-auto font-poppins_semibold text-[#CF072C]">Ver Todos</span>
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.75131 16.5833C9.59853 16.4306 9.51853 16.2361 9.5113 16C9.50408 15.7639 9.57714 15.5694 9.73047 15.4167L13.8138 11.3333H4.5013C4.26519 11.3333 4.06714 11.2533 3.90714 11.0933C3.74714 10.9333 3.66742 10.7356 3.66797 10.5C3.66797 10.2639 3.74797 10.0658 3.90797 9.90583C4.06797 9.74583 4.26575 9.66611 4.5013 9.66667H13.8138L9.73047 5.58333C9.57769 5.43056 9.50464 5.23611 9.5113 5C9.51797 4.76389 9.59797 4.56944 9.75131 4.41667C9.90408 4.26389 10.0985 4.1875 10.3346 4.1875C10.5707 4.1875 10.7652 4.26389 10.918 4.41667L16.418 9.91667C16.5013 9.98611 16.5605 10.0731 16.5955 10.1775C16.6305 10.2819 16.6477 10.3894 16.6471 10.5C16.6471 10.6111 16.6299 10.7153 16.5955 10.8125C16.561 10.9097 16.5019 11 16.418 11.0833L10.918 16.5833C10.7652 16.7361 10.5707 16.8125 10.3346 16.8125C10.0985 16.8125 9.90408 16.7361 9.75131 16.5833Z"
                            fill="#CF072C" />
                    </svg>
                </a>
            </div>
        </section>

        <section className="px-[8%] bg-cover" style={{ backgroundImage: `url(${sectionStep})` }}>
            <div className="grid grid-cols-1 w-full gap-12  pt-12 xl:pt-16">
                <div className="flex flex-col justify-center gap-5 text-center">
                    <h2 className="text-white font-poppins_regular font-semibold text-lg">Nuestros Beneficios</h2>
                    <h1
                        className="text-white font-poppins_bold tracking-tighter text-3xl md:text-5xl leading-none md:leading-tight max-w-3xl mx-auto">
                        Nunc viverra, metus quis lacinia interdum, nulla augue
                    </h1>
                    <p className="text-white text-base font-poppins_regular max-w-3xl mx-auto">
                        Integer bibendum ex convallis accumsan hendrerit.
                    </p>
                </div>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 w-full gap-12 pt-12 pb-12 xl:pb-16">
                <div
                    className="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div className="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 className="text-4xl text-left">01</h2>
                        <h3 className="mt-5 text-2xl leading-7">CERTICIFACIÓN FÍSICA Y VIRTUAL</h3>
                    </div>
                </div>

                <div
                    className="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div className="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 className="text-4xl text-left">02</h2>
                        <h3 className="mt-5 text-2xl leading-7">MODERNA PLATAFORMA VIRTUAL SEGÚN TU DISPONIBILIDAD
                        </h3>
                    </div>
                </div>

                <div
                    className="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div className="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 className="text-4xl text-left">03</h2>
                        <h3 className="mt-5 text-2xl leading-7">DOCENTES CON MÁS DE 20 AÑOS DE EXPERIENCIA </h3>
                    </div>
                </div>

                <div
                    className="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div className="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 className="text-4xl text-left">04</h2>
                        <h3 className="mt-5 text-2xl leading-7">NORMATIVA ACTUALIZADA Y MATERIALES DESCARGABLES </h3>
                    </div>
                </div>

                <div
                    className="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div className="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 className="text-4xl text-left">05</h2>
                        <h3 className="mt-5 text-2xl leading-7">ACCESO POR UN AÑO A LA PLATAFORMA VIRTUAL Y DISPONIBLE LAS 24
                            HORAS </h3>
                    </div>
                </div>

                <div
                    className="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div className="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 className="text-4xl text-left">06</h2>
                        <h3 className="mt-5 text-2xl leading-7">CONVENIOS CON EL COLEGIO DE ECONOMISTAS DEL PERÚ Y SERVIR </h3>
                    </div>
                </div>

            </div>
        </section>

        <section
            className="flex overflow-hidden flex-wrap gap-10 justify-between items-center px-[8%] py-12 lg:py-16 bg-[#CF072C] max-md:px-5">
            <div
                className="flex flex-col justify-center self-stretch my-auto  leading-10 min-w-[240px] w-[586px] max-md:max-w-full">
                <h2 className="text-4xl text-white max-md:max-w-full font-poppins_semibold">Empiece a aprender con 67,1 mil
                    estudiantes en todo el Perú.</h2>
                <nav
                    className="flex gap-3 items-start self-start mt-8 text-base tracking-normal font-poppins_medium text-white capitalize">
                    <a href="#"
                        className="gap-3 self-stretch px-6 py-3 rounded-xl bg-slate-900 min-w-[240px] max-md:px-5 text-sm">
                        Explorar todos los cursos y Diplomados
                    </a>
                </nav>
            </div>
            <div
                className="flex flex-wrap gap-10 items-center self-stretch my-auto text-white min-w-[240px] max-md:max-w-full">
                <article className="flex flex-col self-stretch my-auto">
                    <h3 className="text-4xl font-bold leading-tight font-poppins_regular">6.3k</h3>
                    <p className="self-start text-base font-medium font-poppins_regular leading-8 text-center">Cursos online
                    </p>
                </article>
                <article className="flex flex-col self-stretch my-auto">
                    <h3 className="text-4xl font-bold leading-tight font-poppins_regular">26k</h3>
                    <p className="self-start text-base font-medium font-poppins_regular leading-8 text-center">Alumnos
                        certificado</p>
                </article>
                <article className="flex flex-col justify-center self-stretch my-auto">
                    <h3 className="text-4xl font-bold leading-tight font-poppins_regular">99.9%</h3>
                    <p className="self-start text-base font-medium font-poppins_regular leading-8 text-center">Tasa de éxito
                    </p>
                </article>
            </div>
        </section>


        <section>
            <div className="grid grid-cols-1 xl:grid-cols-2 w-full gap-12 px-[8%] py-12 xl:py-16">

                <div className="flex flex-col justify-center items-center px-0 lg:px-[5%]">
                    <div className="w-full h-[500px] lg:h-[700px] border border-gray-200 rounded-3xl overflow-hidden relative bg-cover bg-center"
                        style={{ backgroundImage: `url(${imgVideo})` }}>
                        <div className="absolute inset-0 flex items-center justify-center disparo bg-opacity-50 cursor-pointer"
                            onclick="showVideo(this)">
                            <button className="text-white text-2xl"><img
                                className="w-16 hover:animate-jump hover:animate-once hover:animate-duration-1000"
                                src={`${imgPlay}`} /></button>
                        </div>
                        <iframe id="videoIframe" class="videoIframe w-full h-full hidden"
                            src="https://www.youtube.com/embed/Q5_ALBh8Qe4" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>

                <div className="flex flex-col justify-center gap-5 text-textWhite pr-[5%]">
                    <h1
                        className="text-[#1D2026] font-poppins_bold tracking-tighter text-3xl md:text-5xl leading-none md:leading-tight ">
                        Donec at aliquam massa. Nunc tincidunt, felis ut gravida fringilla
                    </h1>

                    <div className="">
                        <SliderTestimony sliders={1} />
                    </div>
                </div>
            </div>
        </section>

        <section class="px-[8%] bg-[#A90609] !font-poppins_regular mt-20">
            <div class="flex gap-5 max-md:flex-col py-10 md:py-0">

                <div class="flex flex-col w-[65%] max-md:ml-0 max-md:w-full">
                    <div class="grow  max-md:max-w-full">
                        <div class="flex gap-5 max-md:flex-col">
                            <div class="flex flex-col justify-center items-center w-full md:w-6/12">
                                <div class="flex flex-col justify-center self-stretch w-full">
                                    <div class="flex flex-col max-w-full text-white w-[377px]">
                                        <h1
                                            class="text-5xl !font-poppins_regular font-bold leading-snug">
                                            Se parte del Cambio
                                        </h1>
                                        <p class="mt-4 text-base !font-poppins_regular tracking-normal">
                                            Instructores de todo el mundo enseñan a millones de estudiantes en Udemy.
                                            Proporcionamos las herramientas y habilidades para enseñar lo que amas.
                                        </p>
                                    </div>
                                    <div>
                                        <a href="#"
                                            class="w-auto inline-block !font-poppins_regular mt-8 px-6 py-2 text-base font-bold tracking-normal leading-10 text-rose-700 bg-blue-50 rounded-xl max-md:px-5">
                                            empezar a enseñar
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col ml-5 w-full items-end  md:w-6/12 mt-0 md:-mt-16">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/31d2a58f6fbb89e9b97d22e950300dd25ed9036762fd76d2ffd12b44657c4b72?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-cover object-bottom grow w-full"
                                    alt="Ilustración representativa de enseñanza en línea" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col ml-5 w-[35%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col self-stretch my-auto">
                        <h2 class="text-3xl font-bold leading-10 text-gray-50 !font-poppins_regular">
                            Tus pasos para enseñar y ganar dinero
                        </h2>
                        <div class="grid grid-cols-2 mt-5 w-full gap-5">

                            <div class="flex flex-col flex-1 shrink justify-start items-start basis-0">
                                <span class="flex flex-row items-center justify-center text-xl font-semibold leading-none text-center text-rose-700 bg-gray-50 h-[45px] rounded-full w-[45px] pt-1">
                                    1
                                </span>
                                <p class="mt-3 text-[15px] tracking-normal leading-1 text-white !font-poppins_regular ">
                                    Aplicar para convertirse en instructor
                                </p>
                            </div>
                            <div class="flex flex-col flex-1 shrink justify-start items-start basis-0 !text-base">
                                <span
                                    class="flex items-center justify-center text-xl font-semibold leading-none text-center text-rose-700 bg-gray-50  h-[45px] rounded-full w-[45px] pt-1">
                                    2
                                </span>
                                <p
                                    class="mt-3 text-[15px] tracking-normal leading-1 text-white !font-poppins_regular">
                                    Crea y edita tu perfil
                                </p>
                            </div>


                            <div
                                class="flex flex-col flex-1 shrink justify-start items-start  basis-0 !text-base">
                                <span
                                    class="flex items-center justify-center text-xl font-semibold !font-poppins_regular leading-none text-center text-rose-700 bg-gray-50  h-[45px] rounded-full w-[45px] pt-1">
                                    3
                                </span>
                                <p
                                    class="mt-3 text-[15px] tracking-normal leading-1 text-white !font-poppins_regular">
                                    Escoge un curso
                                </p>
                            </div>
                            <div
                                class="flex flex-col flex-1 shrink justify-start items-start  basis-0 !text-base">
                                <span
                                    class="flex items-center justify-center text-xl !font-poppins_regular font-semibold leading-none text-center text-rose-700 bg-gray-50  h-[45px] rounded-full w-[45px] pt-1">
                                    4
                                </span>
                                <p class="mt-3 text-[15px] tracking-normal leading-1 text-white !font-poppins_regular">
                                    Comience a enseñar y ganar dinero
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

    </>)
}

CreateReactScript((el, properties) => {
    createRoot(el).render(<Home {...properties} />);
})