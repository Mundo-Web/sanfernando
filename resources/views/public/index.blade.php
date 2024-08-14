@extends('components.public.matrix', ['pagina' => 'index'])

@section('css_importados')

@stop

@php
    $bannersBottom = array_filter($banners, function ($banner) {
        return $banner['potition'] === 'bottom';
    });
    $bannerMid = array_filter($banners, function ($banner) {
        return $banner['potition'] === 'mid';
    });
@endphp

@section('content')

    <main class="z-[15] ">

        <section class="w-full relative">
            <div class="swiper slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="gap-20 bg-no-repeat object-top  bg-center bg-cover w-full px-[5%] h-[600px] xl:h-[650px] flex flex-row  items-center"
                            style="background-image:  url('{{ asset('images/img/gp_portada.png') }}')">
                            <div class="flex flex-row justify-center items-center gap-2 w-full md:w-2/3 py-12 lg:py-24">
                                <div class="flex flex-col gap-5 lg:gap-10 items-start px-0 lg:px-[2%]">
                                    <h2
                                        class='text-white text-3xl lg:text-6xl tracking-normal font-poppins_black font-bold uppercase'>
                                        Aprende con <span class="text-[#CF072C]">Expertos</span>, siempre y donde sea.
                                    </h2>

                                    <p class="text-white text-lg tracking-wider font-poppins_light font-normal">
                                        Escuela especializada en brindar Diplomados y Cursos a funcionarios y servidores que
                                        laboran en distintas áreas del sector público.
                                    </p>

                                    <div class="flex flex-col sm:flex-row gap-5 md:gap-10 justify-center items-start">
                                        <a href="#"
                                            class="bg-[#CF072C] border-2 border-[#CF072C] flex flex-row items-center gap-3 text-white px-6 py-3 text-base font-poppins_semibold rounded-2xl tracking-wide">Diplomados
                                            <i class="fa-solid fa-arrow-right"></i></a>

                                        <a href="#"
                                            class="bg-transparent border-2 border-white hover:bg-[#CF072C] hover:border-[#CF072C] flex flex-row items-center gap-3 text-white px-6 py-3 text-base font-poppins_semibold rounded-2xl tracking-normal">Ver
                                            cursos <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex flex-wrap items-center">
            <div class="flex flex-1 shrink self-stretch my-auto h-3 bg-orange-400 basis-0 min-w-[240px] w-1/2"
                role="presentation"></div>
            <div class="flex flex-1 shrink self-stretch my-auto h-3 bg-cyan-600 basis-0 min-w-[240px] w-1/2"
                role="presentation"></div>
        </section>

        <section class="flex flex-wrap gap-5 items-start px-24 py-8 bg-red-600 text-slate-100 max-md:px-5">
            <div class="swiper beneficios">
                <div class="swiper-wrapper font-poppins_regular">
                    <div class="swiper-slide">
                        <article class="flex gap-4 items-start min-w-[240px]">
                            <img loading="lazy" src="{{ asset('images/img/gp_icono1.png') }}"
                                class="object-contain shrink-0 w-10 aspect-square" alt="Ética y transparencia icon" />
                            <div class="flex flex-col">
                                <h2 class="text-lg font-poppins_semibold leading-tight">Ética y transparencia</h2>
                                <p class="mt-2 text-base leading-5">Promoción de la integridad y la honestidad en todas las
                                    actividades.
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="swiper-slide">
                        <article class="flex gap-4 items-start min-w-[240px]">
                            <img loading="lazy" src="{{ asset('images/img/gp_icono2.png') }}"
                                class="object-contain shrink-0 w-10 aspect-square" alt="Innovación" />
                            <div class="flex flex-col">
                                <h2 class="text-lg font-poppins_semibold leading-tight">Innovación</h2>
                                <p class="mt-2 text-base leading-5">Fomento de la creatividad y la adaptabilidad para
                                    enfrentar los desafíos actuales.
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="swiper-slide">
                        <article class="flex gap-4 items-start min-w-[240px]">
                            <img loading="lazy" src="{{ asset('images/img/gp_icono3.png') }}"
                                class="object-contain shrink-0 w-10 aspect-square" alt="Ética y transparencia icon" />
                            <div class="flex flex-col">
                                <h2 class="text-lg font-poppins_semibold leading-tight">Colaboración</h2>
                                <p class="mt-2 text-base leading-5">Trabajo en equipo y cooperación para lograr objetivos
                                    comunes.
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="swiper-slide">
                        <article class="flex gap-4 items-start min-w-[240px] ">
                            <img loading="lazy" src="{{ asset('images/img/gp_icono4.png') }}"
                                class="object-contain shrink-0 w-10 aspect-square" alt="Ética y transparencia icon" />
                            <div class="flex flex-col">
                                <h2 class="text-lg font-poppins_semibold leading-tight">Ética y transparencia</h2>
                                <p class="mt-2 text-base leading-5">Promoción de la integridad y la honestidad en todas las
                                    actividades.
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="grid grid-cols-1 lg:grid-cols-2 w-full gap-12 px-[8%] py-12 xl:py-16">
                <div class="flex flex-col justify-center gap-5 text-textWhite ">
                    <h2 class="text-[#CF072C] font-poppins_regular font-semibold text-lg">Sobre nosotros</h2>
                    <h1
                        class="text-[#1D2026] font-poppins_bold font-semibold tracking-tighter text-3xl md:text-5xl leading-none md:leading-tight">
                        Donec at aliquam massa. Tincidunt, felis ut gravida fringilla
                    </h1>
                    <p class="text-[#4E5566] text-base font-poppins_regular">
                        Nuestro objetivo es proporcionar formación de alta calidad a funcionarios y
                        trabajadores del sector público, capacitándolos con los conocimientos necesarios
                        para implementar acciones efectivas que contribuyan al desarrollo y mejora continua
                        de las políticas públicas en el Perú. Nos comprometemos a ser líderes en educación
                        y capacitación, impulsando la innovación y la ética en la gestión pública para generar
                        un impacto positivo y duradero en nuestra sociedad."
                    </p>
                    <div class="flex flex-row gap-5 font-Pangea_Regular">
                        <a
                            class="bg-[#CF072C] text-white px-5 py-3 rounded-2xl text-base border-2 flex gap-2 border-[#CF072C] flex-row items-center ">
                            Ver más
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="flex flex-col justify-center items-center">
                    <img src="{{ asset('images/img/gp_nosotros.png') }}"
                        class="object-contain h-[300px] md:h-[500px] w-full" />
                </div>
            </div>
        </section>

        <section class="bg-[#F9FAFB] px-[8%]">
            <div class="grid grid-cols-1 w-full gap-12  pt-12 xl:pt-16">
                <div class="flex flex-col justify-center gap-5 text-center">
                    <h2 class="text-[#CF072C] font-poppins_regular font-semibold text-lg">Cursos y Diplomados</h2>
                    <h1
                        class="text-[#1D2026] font-poppins_bold tracking-tighter text-3xl md:text-5xl leading-none md:leading-tight">
                        Nuestros Cursos y Diplomados
                    </h1>
                    <p class="text-[#4E5566] text-base font-poppins_regular max-w-3xl mx-auto">
                        Únase a nuestra famosa clase, el conocimiento proporcionado definitivamente será útil para usted.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 w-full gap-12 pt-12 pb-12">
                <div class="flex relative flex-col flex-1 shrink basis-0 min-w-[240px]">
                    <div class="min-w-[240px]">
                        <img loading="lazy" src="{{ asset('images/img/imagencurso.png') }}"
                            class="object-contain z-0 w-full rounded-t-2xl" alt="Course background image" />
                        <div class="object-contain absolute top-4 right-4 z-0 w-10 h-10 aspect-square">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20" cy="20" r="20" fill="white" />
                                <path
                                    d="M20 28.25C20 28.25 10.625 23 10.625 16.625C10.6252 15.4983 11.0156 14.4064 11.7299 13.5349C12.4442 12.6635 13.4382 12.0664 14.543 11.845C15.6478 11.6237 16.7951 11.7918 17.79 12.3208C18.7848 12.8498 19.5658 13.707 20 14.7467L20 14.7467C20.4342 13.707 21.2152 12.8498 22.21 12.3208C23.2049 11.7918 24.3522 11.6237 25.457 11.845C26.5618 12.0664 27.5558 12.6635 28.2701 13.5349C28.9844 14.4064 29.3748 15.4983 29.375 16.625C29.375 23 20 28.25 20 28.25Z"
                                    stroke="#CF072C" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>

                    <div
                        class="flex z-0 flex-col p-6 w-full bg-white border-r border-l border-rose-100 border-opacity-40 max-md:px-5">
                        <div
                            class="flex gap-3 items-center w-full text-xs font-medium leading-tight text-white uppercase whitespace-nowrap">
                            <span
                                class="gap-2.5 self-stretch px-1.5 py-1 my-auto bg-red-800 rounded font-poppins_regular">CURSO</span>
                        </div>
                        <h2 class="mt-4 text-2xl font-semibold font-poppins_medium leading-7 text-neutral-800">Políticas
                            Públicas en Perú</h2>
                        <div
                            class="flex flex-col self-start mt-4 text-sm tracking-normal font-poppins_regular leading-loose text-gray-600">
                            <div class="flex flex-row gap-2 items-start justify-start">
                                <img loading="lazy" src="{{ asset('images/svg/gp_reloj.svg') }}"
                                    class="object-contain w-6" alt="Clock icon" />
                                <p class="self-stretch leading-normal">384 horas lectivas y 24 créditos</p>
                            </div>
                            <div class="flex gap-2 items-center self-start mt-2">
                                <img loading="lazy" src="{{ asset('images/svg/gp_calendario.svg') }}"
                                    class="object-contain w-6 " alt="Calendar icon" />
                                <p class="self-stretch leading-normal">Inicio: Próximamente</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex z-0 gap-10 justify-between font-poppins_semibold items-center px-6 py-4 w-full text-sm bg-white rounded-none border border-solid border-rose-100 border-opacity-40 max-md:px-5">
                        <div
                            class="flex gap-1.5 items-center self-stretch my-auto font-medium tracking-normal leading-none text-gray-600 whitespace-nowrap">
                            <div loading="lazy" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.3446 15.401L14.2849 17.8974C14.7886 18.2165 15.4139 17.7419 15.2644 17.154L14.126 12.6756C14.0939 12.5509 14.0977 12.4197 14.137 12.297C14.1762 12.1743 14.2492 12.0652 14.3477 11.9822L17.8811 9.04132C18.3453 8.6549 18.1057 7.88439 17.5092 7.84567L12.8949 7.5462C12.7706 7.53732 12.6514 7.49332 12.5511 7.41931C12.4509 7.34531 12.3737 7.24435 12.3286 7.12819L10.6076 2.79436C10.5609 2.67106 10.4777 2.56492 10.3692 2.49002C10.2606 2.41511 10.1319 2.375 10 2.375C9.86813 2.375 9.73938 2.41511 9.63085 2.49002C9.52232 2.56492 9.43914 2.67106 9.39236 2.79436L7.6714 7.12819C7.62631 7.24435 7.54914 7.34531 7.4489 7.41931C7.34865 7.49332 7.22944 7.53732 7.10515 7.5462L2.49078 7.84567C1.89429 7.88439 1.65466 8.6549 2.11894 9.04132L5.65232 11.9822C5.75079 12.0652 5.82383 12.1743 5.86305 12.297C5.90226 12.4197 5.90606 12.5509 5.874 12.6756L4.81824 16.8288C4.63889 17.5343 5.38929 18.1038 5.99369 17.7209L9.65539 15.401C9.75837 15.3354 9.87792 15.3006 10 15.3006C10.1221 15.3006 10.2416 15.3354 10.3446 15.401Z"
                                        fill="#FD8E1F" />
                                </svg>
                            </div>
                            <span class="self-stretch my-auto">4.3</span>
                        </div>
                        <a href="#"
                            class="flex gap-1 justify-center items-center self-stretch px-5 py-3 my-auto text-center text-white bg-red-600 rounded-[100px]"
                            role="button">
                            <span class="self-stretch my-0">Ver más</span>
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.75131 16.5833C9.59853 16.4306 9.51853 16.2361 9.5113 16C9.50408 15.7639 9.57714 15.5694 9.73047 15.4167L13.8138 11.3333H4.5013C4.26519 11.3333 4.06714 11.2533 3.90714 11.0933C3.74714 10.9333 3.66742 10.7356 3.66797 10.5C3.66797 10.2639 3.74797 10.0658 3.90797 9.90583C4.06797 9.74583 4.26575 9.66611 4.5013 9.66667H13.8138L9.73047 5.58333C9.57769 5.43056 9.50464 5.23611 9.5113 5C9.51797 4.76389 9.59797 4.56944 9.75131 4.41667C9.90408 4.26389 10.0985 4.1875 10.3346 4.1875C10.5707 4.1875 10.7652 4.26389 10.918 4.41667L16.418 9.91667C16.5013 9.98611 16.5605 10.0731 16.5955 10.1775C16.6305 10.2819 16.6477 10.3894 16.6471 10.5C16.6471 10.6111 16.6299 10.7153 16.5955 10.8125C16.561 10.9097 16.5019 11 16.418 11.0833L10.918 16.5833C10.7652 16.7361 10.5707 16.8125 10.3346 16.8125C10.0985 16.8125 9.90408 16.7361 9.75131 16.5833Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="flex relative flex-col flex-1 shrink basis-0 min-w-[240px]">
                    <div class="min-w-[240px]">
                        <img loading="lazy" src="{{ asset('images/img/imagencurso.png') }}"
                            class="object-contain z-0 w-full rounded-t-2xl" alt="Course background image" />
                        <div class="object-contain absolute top-4 right-4 z-0 w-10 h-10 aspect-square">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20" cy="20" r="20" fill="white" />
                                <path
                                    d="M20 28.25C20 28.25 10.625 23 10.625 16.625C10.6252 15.4983 11.0156 14.4064 11.7299 13.5349C12.4442 12.6635 13.4382 12.0664 14.543 11.845C15.6478 11.6237 16.7951 11.7918 17.79 12.3208C18.7848 12.8498 19.5658 13.707 20 14.7467L20 14.7467C20.4342 13.707 21.2152 12.8498 22.21 12.3208C23.2049 11.7918 24.3522 11.6237 25.457 11.845C26.5618 12.0664 27.5558 12.6635 28.2701 13.5349C28.9844 14.4064 29.3748 15.4983 29.375 16.625C29.375 23 20 28.25 20 28.25Z"
                                    stroke="#CF072C" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>

                    <div
                        class="flex z-0 flex-col p-6 w-full bg-white border-r border-l border-rose-100 border-opacity-40 max-md:px-5">
                        <div
                            class="flex gap-3 items-center w-full text-xs font-medium leading-tight text-white uppercase whitespace-nowrap">
                            <span
                                class="gap-2.5 self-stretch px-1.5 py-1 my-auto bg-red-800 rounded font-poppins_regular">DIPLOMADO</span>
                        </div>
                        <h2 class="mt-4 text-2xl font-semibold font-poppins_medium leading-7 text-neutral-800">Políticas
                            Públicas en Perú</h2>
                        <div
                            class="flex flex-col self-start mt-4 text-sm tracking-normal font-poppins_regular leading-loose text-gray-600">
                            <div class="flex flex-row gap-2 items-start justify-start">
                                <img loading="lazy" src="{{ asset('images/svg/gp_reloj.svg') }}"
                                    class="object-contain w-6" alt="Clock icon" />
                                <p class="self-stretch leading-normal">384 horas lectivas y 24 créditos</p>
                            </div>
                            <div class="flex gap-2 items-center self-start mt-2">
                                <img loading="lazy" src="{{ asset('images/svg/gp_calendario.svg') }}"
                                    class="object-contain w-6 " alt="Calendar icon" />
                                <p class="self-stretch leading-normal">Inicio: Próximamente</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex z-0 gap-10 justify-between font-poppins_semibold items-center px-6 py-4 w-full text-sm bg-white rounded-none border border-solid border-rose-100 border-opacity-40 max-md:px-5">
                        <div
                            class="flex gap-1.5 items-center self-stretch my-auto font-medium tracking-normal leading-none text-gray-600 whitespace-nowrap">
                            <div loading="lazy" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.3446 15.401L14.2849 17.8974C14.7886 18.2165 15.4139 17.7419 15.2644 17.154L14.126 12.6756C14.0939 12.5509 14.0977 12.4197 14.137 12.297C14.1762 12.1743 14.2492 12.0652 14.3477 11.9822L17.8811 9.04132C18.3453 8.6549 18.1057 7.88439 17.5092 7.84567L12.8949 7.5462C12.7706 7.53732 12.6514 7.49332 12.5511 7.41931C12.4509 7.34531 12.3737 7.24435 12.3286 7.12819L10.6076 2.79436C10.5609 2.67106 10.4777 2.56492 10.3692 2.49002C10.2606 2.41511 10.1319 2.375 10 2.375C9.86813 2.375 9.73938 2.41511 9.63085 2.49002C9.52232 2.56492 9.43914 2.67106 9.39236 2.79436L7.6714 7.12819C7.62631 7.24435 7.54914 7.34531 7.4489 7.41931C7.34865 7.49332 7.22944 7.53732 7.10515 7.5462L2.49078 7.84567C1.89429 7.88439 1.65466 8.6549 2.11894 9.04132L5.65232 11.9822C5.75079 12.0652 5.82383 12.1743 5.86305 12.297C5.90226 12.4197 5.90606 12.5509 5.874 12.6756L4.81824 16.8288C4.63889 17.5343 5.38929 18.1038 5.99369 17.7209L9.65539 15.401C9.75837 15.3354 9.87792 15.3006 10 15.3006C10.1221 15.3006 10.2416 15.3354 10.3446 15.401Z"
                                        fill="#FD8E1F" />
                                </svg>
                            </div>
                            <span class="self-stretch my-auto">4.3</span>
                        </div>
                        <a href="#"
                            class="flex gap-1 justify-center items-center self-stretch px-5 py-3 my-auto text-center text-white bg-red-600 rounded-[100px]"
                            role="button">
                            <span class="self-stretch my-0">Ver más</span>
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.75131 16.5833C9.59853 16.4306 9.51853 16.2361 9.5113 16C9.50408 15.7639 9.57714 15.5694 9.73047 15.4167L13.8138 11.3333H4.5013C4.26519 11.3333 4.06714 11.2533 3.90714 11.0933C3.74714 10.9333 3.66742 10.7356 3.66797 10.5C3.66797 10.2639 3.74797 10.0658 3.90797 9.90583C4.06797 9.74583 4.26575 9.66611 4.5013 9.66667H13.8138L9.73047 5.58333C9.57769 5.43056 9.50464 5.23611 9.5113 5C9.51797 4.76389 9.59797 4.56944 9.75131 4.41667C9.90408 4.26389 10.0985 4.1875 10.3346 4.1875C10.5707 4.1875 10.7652 4.26389 10.918 4.41667L16.418 9.91667C16.5013 9.98611 16.5605 10.0731 16.5955 10.1775C16.6305 10.2819 16.6477 10.3894 16.6471 10.5C16.6471 10.6111 16.6299 10.7153 16.5955 10.8125C16.561 10.9097 16.5019 11 16.418 11.0833L10.918 16.5833C10.7652 16.7361 10.5707 16.8125 10.3346 16.8125C10.0985 16.8125 9.90408 16.7361 9.75131 16.5833Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="flex relative flex-col flex-1 shrink basis-0 min-w-[240px]">
                    <div class="min-w-[240px]">
                        <img loading="lazy" src="{{ asset('images/img/imagencurso.png') }}"
                            class="object-contain z-0 w-full rounded-t-2xl" alt="Course background image" />
                        <div class="object-contain absolute top-4 right-4 z-0 w-10 h-10 aspect-square">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20" cy="20" r="20" fill="white" />
                                <path
                                    d="M20 28.25C20 28.25 10.625 23 10.625 16.625C10.6252 15.4983 11.0156 14.4064 11.7299 13.5349C12.4442 12.6635 13.4382 12.0664 14.543 11.845C15.6478 11.6237 16.7951 11.7918 17.79 12.3208C18.7848 12.8498 19.5658 13.707 20 14.7467L20 14.7467C20.4342 13.707 21.2152 12.8498 22.21 12.3208C23.2049 11.7918 24.3522 11.6237 25.457 11.845C26.5618 12.0664 27.5558 12.6635 28.2701 13.5349C28.9844 14.4064 29.3748 15.4983 29.375 16.625C29.375 23 20 28.25 20 28.25Z"
                                    stroke="#CF072C" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>

                    <div
                        class="flex z-0 flex-col p-6 w-full bg-white border-r border-l border-rose-100 border-opacity-40 max-md:px-5">
                        <div
                            class="flex gap-3 items-center w-full text-xs font-medium leading-tight text-white uppercase whitespace-nowrap">
                            <span
                                class="gap-2.5 self-stretch px-1.5 py-1 my-auto bg-red-800 rounded font-poppins_regular">DIPLOMADO</span>
                        </div>
                        <h2 class="mt-4 text-2xl font-semibold font-poppins_medium leading-7 text-neutral-800">Políticas
                            Públicas en Perú</h2>
                        <div
                            class="flex flex-col self-start mt-4 text-sm tracking-normal font-poppins_regular leading-loose text-gray-600">
                            <div class="flex flex-row gap-2 items-start justify-start">
                                <img loading="lazy" src="{{ asset('images/svg/gp_reloj.svg') }}"
                                    class="object-contain w-6" alt="Clock icon" />
                                <p class="self-stretch leading-normal">384 horas lectivas y 24 créditos</p>
                            </div>
                            <div class="flex gap-2 items-center self-start mt-2">
                                <img loading="lazy" src="{{ asset('images/svg/gp_calendario.svg') }}"
                                    class="object-contain w-6 " alt="Calendar icon" />
                                <p class="self-stretch leading-normal">Inicio: Próximamente</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex z-0 gap-10 justify-between font-poppins_semibold items-center px-6 py-4 w-full text-sm bg-white rounded-none border border-solid border-rose-100 border-opacity-40 max-md:px-5">
                        <div
                            class="flex gap-1.5 items-center self-stretch my-auto font-medium tracking-normal leading-none text-gray-600 whitespace-nowrap">
                            <div loading="lazy" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.3446 15.401L14.2849 17.8974C14.7886 18.2165 15.4139 17.7419 15.2644 17.154L14.126 12.6756C14.0939 12.5509 14.0977 12.4197 14.137 12.297C14.1762 12.1743 14.2492 12.0652 14.3477 11.9822L17.8811 9.04132C18.3453 8.6549 18.1057 7.88439 17.5092 7.84567L12.8949 7.5462C12.7706 7.53732 12.6514 7.49332 12.5511 7.41931C12.4509 7.34531 12.3737 7.24435 12.3286 7.12819L10.6076 2.79436C10.5609 2.67106 10.4777 2.56492 10.3692 2.49002C10.2606 2.41511 10.1319 2.375 10 2.375C9.86813 2.375 9.73938 2.41511 9.63085 2.49002C9.52232 2.56492 9.43914 2.67106 9.39236 2.79436L7.6714 7.12819C7.62631 7.24435 7.54914 7.34531 7.4489 7.41931C7.34865 7.49332 7.22944 7.53732 7.10515 7.5462L2.49078 7.84567C1.89429 7.88439 1.65466 8.6549 2.11894 9.04132L5.65232 11.9822C5.75079 12.0652 5.82383 12.1743 5.86305 12.297C5.90226 12.4197 5.90606 12.5509 5.874 12.6756L4.81824 16.8288C4.63889 17.5343 5.38929 18.1038 5.99369 17.7209L9.65539 15.401C9.75837 15.3354 9.87792 15.3006 10 15.3006C10.1221 15.3006 10.2416 15.3354 10.3446 15.401Z"
                                        fill="#FD8E1F" />
                                </svg>
                            </div>
                            <span class="self-stretch my-auto">4.3</span>
                        </div>
                        <a href="#"
                            class="flex gap-1 justify-center items-center self-stretch px-5 py-3 my-auto text-center text-white bg-red-600 rounded-[100px]"
                            role="button">
                            <span class="self-stretch my-0">Ver más</span>
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.75131 16.5833C9.59853 16.4306 9.51853 16.2361 9.5113 16C9.50408 15.7639 9.57714 15.5694 9.73047 15.4167L13.8138 11.3333H4.5013C4.26519 11.3333 4.06714 11.2533 3.90714 11.0933C3.74714 10.9333 3.66742 10.7356 3.66797 10.5C3.66797 10.2639 3.74797 10.0658 3.90797 9.90583C4.06797 9.74583 4.26575 9.66611 4.5013 9.66667H13.8138L9.73047 5.58333C9.57769 5.43056 9.50464 5.23611 9.5113 5C9.51797 4.76389 9.59797 4.56944 9.75131 4.41667C9.90408 4.26389 10.0985 4.1875 10.3346 4.1875C10.5707 4.1875 10.7652 4.26389 10.918 4.41667L16.418 9.91667C16.5013 9.98611 16.5605 10.0731 16.5955 10.1775C16.6305 10.2819 16.6477 10.3894 16.6471 10.5C16.6471 10.6111 16.6299 10.7153 16.5955 10.8125C16.561 10.9097 16.5019 11 16.418 11.0833L10.918 16.5833C10.7652 16.7361 10.5707 16.8125 10.3346 16.8125C10.0985 16.8125 9.90408 16.7361 9.75131 16.5833Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-row justify-center items-center pb-12 xl:pb-16">
                <a href="#"
                    class="flex w-48 gap-1 justify-center items-center self-stretch px-5 py-3 my-auto text-center text-white bg-[#FFDDDE] rounded-xl"
                    role="button">
                    <span class="self-stretch my-auto font-poppins_semibold text-[#CF072C]">Ver Todos</span>
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.75131 16.5833C9.59853 16.4306 9.51853 16.2361 9.5113 16C9.50408 15.7639 9.57714 15.5694 9.73047 15.4167L13.8138 11.3333H4.5013C4.26519 11.3333 4.06714 11.2533 3.90714 11.0933C3.74714 10.9333 3.66742 10.7356 3.66797 10.5C3.66797 10.2639 3.74797 10.0658 3.90797 9.90583C4.06797 9.74583 4.26575 9.66611 4.5013 9.66667H13.8138L9.73047 5.58333C9.57769 5.43056 9.50464 5.23611 9.5113 5C9.51797 4.76389 9.59797 4.56944 9.75131 4.41667C9.90408 4.26389 10.0985 4.1875 10.3346 4.1875C10.5707 4.1875 10.7652 4.26389 10.918 4.41667L16.418 9.91667C16.5013 9.98611 16.5605 10.0731 16.5955 10.1775C16.6305 10.2819 16.6477 10.3894 16.6471 10.5C16.6471 10.6111 16.6299 10.7153 16.5955 10.8125C16.561 10.9097 16.5019 11 16.418 11.0833L10.918 16.5833C10.7652 16.7361 10.5707 16.8125 10.3346 16.8125C10.0985 16.8125 9.90408 16.7361 9.75131 16.5833Z"
                            fill="#CF072C" />
                    </svg>
                </a>
            </div>
        </section>

        <section class="px-[8%] bg-cover" style="background-image: url({{ asset('images/img/palacio.png') }})">
            <div class="grid grid-cols-1 w-full gap-12  pt-12 xl:pt-16">
                <div class="flex flex-col justify-center gap-5 text-center">
                    <h2 class="text-white font-poppins_regular font-semibold text-lg">Nuestros Beneficios</h2>
                    <h1
                        class="text-white font-poppins_bold tracking-tighter text-3xl md:text-5xl leading-none md:leading-tight max-w-3xl mx-auto">
                        Nunc viverra, metus quis lacinia interdum, nulla augue
                    </h1>
                    <p class="text-white text-base font-poppins_regular max-w-3xl mx-auto">
                        Integer bibendum ex convallis accumsan hendrerit.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 w-full gap-12 pt-12 pb-12 xl:pb-16">
                <div
                    class="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div class="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 class="text-4xl text-left">01</h2>
                        <h3 class="mt-5 text-2xl leading-7">CERTICIFACIÓN FÍSICA Y VIRTUAL</h3>
                    </div>
                </div>

                <div
                    class="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div class="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 class="text-4xl text-left">02</h2>
                        <h3 class="mt-5 text-2xl leading-7">MODERNA PLATAFORMA VIRTUAL SEGÚN TU DISPONIBILIDAD
                        </h3>
                    </div>
                </div>

                <div
                    class="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div class="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 class="text-4xl text-left">03</h2>
                        <h3 class="mt-5 text-2xl leading-7">DOCENTES CON MÁS DE 20 AÑOS DE EXPERIENCIA </h3>
                    </div>
                </div>

                <div
                    class="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div class="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 class="text-4xl text-left">04</h2>
                        <h3 class="mt-5 text-2xl leading-7">NORMATIVA ACTUALIZADA Y MATERIALES DESCARGABLES </h3>
                    </div>
                </div>

                <div
                    class="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div class="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 class="text-4xl text-left">05</h2>
                        <h3 class="mt-5 text-2xl leading-7">ACCESO POR UN AÑO A LA PLATAFORMA VIRTUAL Y DISPONIBLE LAS 24
                            HORAS </h3>
                    </div>
                </div>

                <div
                    class="flex flex-col px-5 pt-5 pb-20 w-full rounded-xl border border-gray-50 border-solid min-h-[236px]">
                    <div class="flex flex-col w-full text-white font-poppins_semibold">
                        <h2 class="text-4xl text-left">06</h2>
                        <h3 class="mt-5 text-2xl leading-7">CONVENIOS CON EL COLEGIO DE ECONOMISTAS DEL PERÚ Y SERVIR </h3>
                    </div>
                </div>

            </div>
        </section>

        <section
            class="flex overflow-hidden flex-wrap gap-10 justify-between items-center px-[8%] py-12 lg:py-16 bg-[#CF072C] max-md:px-5">
            <div
                class="flex flex-col justify-center self-stretch my-auto  leading-10 min-w-[240px] w-[586px] max-md:max-w-full">
                <h2 class="text-4xl text-white max-md:max-w-full font-poppins_semibold">Empiece a aprender con 67,1 mil
                    estudiantes en todo el Perú.</h2>
                <nav
                    class="flex gap-3 items-start self-start mt-8 text-base tracking-normal font-poppins_medium text-white capitalize">
                    <a href="#"
                        class="gap-3 self-stretch px-6 py-3 rounded-xl bg-slate-900 min-w-[240px] max-md:px-5">
                        Explorar todos los cursos y Diplomados
                    </a>
                </nav>
            </div>
            <div
                class="flex flex-wrap gap-10 items-center self-stretch my-auto text-white min-w-[240px] max-md:max-w-full">
                <article class="flex flex-col self-stretch my-auto">
                    <h3 class="text-4xl font-bold leading-tight font-poppins_regular">6.3k</h3>
                    <p class="self-start text-base font-medium font-poppins_regular leading-8 text-center">Cursos online
                    </p>
                </article>
                <article class="flex flex-col self-stretch my-auto">
                    <h3 class="text-4xl font-bold leading-tight font-poppins_regular">26k</h3>
                    <p class="self-start text-base font-medium font-poppins_regular leading-8 text-center">Alumnos
                        certificado</p>
                </article>
                <article class="flex flex-col justify-center self-stretch my-auto">
                    <h3 class="text-4xl font-bold leading-tight font-poppins_regular">99.9%</h3>
                    <p class="self-start text-base font-medium font-poppins_regular leading-8 text-center">Tasa de éxito
                    </p>
                </article>
            </div>
        </section>

        <section>
            <div class="grid grid-cols-1 xl:grid-cols-2 w-full gap-12 px-[8%] py-12 xl:py-16">

                <div class="flex flex-col justify-center items-center px-0 lg:px-[5%]">
                    <div class="w-full h-[500px] lg:h-[700px] border border-gray-200 rounded-3xl overflow-hidden relative bg-cover bg-center"
                        style="background-image: url('{{ asset('images/img/mujergp.png') }}');">
                        <div class="absolute inset-0 flex items-center justify-center disparo bg-opacity-50 cursor-pointer"
                            onclick="showVideo(this)">
                            <button class="text-white text-2xl"><img
                                    class="w-16 hover:animate-jump hover:animate-once hover:animate-duration-1000"
                                    src="{{ asset('images/img/iconoplayblanco.png') }}" /></button>
                        </div>
                        <iframe id="videoIframe" class="videoIframe w-full h-full hidden"
                            src="https://www.youtube.com/embed/Q5_ALBh8Qe4" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>

                <div class="flex flex-col justify-center gap-5 text-textWhite pr-[5%]">
                    <h1
                        class="text-[#1D2026] font-poppins_bold tracking-tighter text-3xl md:text-5xl leading-none md:leading-tight ">
                        Donec at aliquam massa. Nunc tincidunt, felis ut gravida fringilla
                    </h1>

                    <div class="">
                        <div class="swiper myTestimonios">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="bg-[#FFF0F0] relative p-5 lg:p-8 gap-3 flex flex-col rounded-xl h-auto">
                                        <img class="w-12" src="{{ asset('images/svg/comillas_gp.svg') }}" />
                                        <p class="text-[#1D2026] text-lg lg:text-xl font-poppins_regular">Nulla sed
                                            malesuada augue. Morbi interdum vulputate imperdiet.
                                            Pellentesque ullamcorper auctor ante, egestas interdum quam facilisis
                                            commodo. Phasellus efficitur quis ex in consectetur. Mauris tristique
                                            suscipit metus, a molestie dui dapibus vel.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="bg-[#FFF0F0] relative p-5 lg:p-8 gap-3 flex flex-col rounded-xl h-auto">
                                        <img class="w-12" src="{{ asset('images/svg/comillas_gp.svg') }}" />
                                        <p class="text-[#1D2026] text-lg lg:text-xl font-poppins_regular">Nulla sed
                                            malesuada augue. Morbi interdum vulputate imperdiet.
                                            Pellentesque ullamcorper auctor ante, egestas interdum quam facilisis
                                            commodo. Phasellus efficitur quis ex in consectetur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row gap-3 mt-3">
                                <div
                                    class="prev-testimonios cursor-pointer bg-[#FF9799] px-5 py-4 text-[#CF072C] rounded-full text-xl group hover:bg-[#CF072C]">
                                    <i class="fa-solid fa-arrow-left group-hover:text-white"></i></div>
                                <div
                                    class="next-testimonios cursor-pointer bg-[#FF9799] px-5 py-4 text-[#CF072C] rounded-full text-xl group hover:bg-[#CF072C]">
                                    <i class="fa-solid fa-arrow-right group-hover:text-white"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="px-[8%] bg-red-600 max-md:px-5 !font-poppins_regular">
            <div class="flex gap-5 max-md:flex-col">
                
                <div class="flex flex-col w-[65%] max-md:ml-0 max-md:w-full">
                    <div class="grow -mt-10 max-md:max-w-full">
                        <div class="flex gap-5 max-md:flex-col">
                            <div class="flex flex-col w-6/12 max-md:w-full">
                                <div class="flex flex-col justify-center self-stretch w-full max-md:mt-10 gap-3">
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
                                            class="w-auto inline-block !font-poppins_regular mt-10 px-6 py-2 text-base font-bold tracking-normal leading-10 text-rose-700 bg-blue-50 rounded-xl max-md:px-5">
                                            empezar a enseñar
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/31d2a58f6fbb89e9b97d22e950300dd25ed9036762fd76d2ffd12b44657c4b72?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain grow w-full aspect-[0.67]"
                                    alt="Ilustración representativa de enseñanza en línea" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col ml-5 w-[35%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col self-stretch my-auto max-md:mt-10">
                        <h2 class="text-3xl font-bold leading-10 text-gray-50 !font-poppins_regular">
                            Tus pasos para enseñar y ganar dinero
                        </h2>
                        <ol class="flex flex-col self-end mt-10 w-full max-w-[417px] list-none">
                            <li class="flex gap-5 items-start w-full">
                                <div class="flex flex-col flex-1 shrink justify-center basis-0 !text-base">
                                    <span
                                        class="flex items-center justify-center text-2xl font-semibold leading-none text-center text-rose-700 bg-gray-50 h-[52px] rounded-[100px] w-[52px]">
                                        1
                                    </span>
                                    <p class="mt-3 text-base tracking-normal leading-7 text-white !font-poppins_regular ">
                                        Aplicar para convertirse en instructor
                                    </p>
                                </div>
                                <div class="flex flex-col flex-1 shrink justify-center basis-0 !text-base">
                                    <span
                                        class="flex items-center justify-center text-2xl font-semibold leading-none text-center text-rose-700 bg-gray-50 h-[52px] rounded-[100px] w-[52px]">
                                        2
                                    </span>
                                    <p
                                        class="mt-3 text-base tracking-normal leading-loose text-white !font-poppins_regular">
                                        Crea y edita tu perfil
                                    </p>
                                </div>
                            </li>
                            <li class="flex gap-5 items-center mt-6 w-full">
                                <div
                                    class="flex flex-col flex-1 shrink justify-center self-stretch my-auto basis-0 !text-base">
                                    <span
                                        class="flex items-center justify-center text-2xl font-semibold !font-poppins_regular leading-none text-center text-rose-700 bg-gray-50 h-[52px] rounded-[100px] w-[52px]">
                                        3
                                    </span>
                                    <p
                                        class="mt-3 text-base tracking-normal leading-loose text-white !font-poppins_regular">
                                        Escoge un curso
                                    </p>
                                </div>
                                <div
                                    class="flex flex-col flex-1 shrink justify-center self-stretch my-auto basis-0 !text-base">
                                    <span
                                        class="flex items-center justify-center text-2xl !font-poppins_regular font-semibold leading-none text-center text-rose-700 bg-gray-50 h-[52px] rounded-[100px] w-[52px]">
                                        4
                                    </span>
                                    <p class="mt-3 !text-base tracking-normal leading-7 text-white !font-poppins_regular">
                                        Comience a enseñar y ganar dinero
                                    </p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>

            </div>
        </section>


    </main>
    {{-- modalOfertas --}}



    <!-- Modal toggle -->


    <!-- Main modal -->

    <div id="modalofertas" class="modal">

        <!-- Modal body -->
        <div class="p-1 ">
            <x-swipper-card-ofertas :items="$popups" id="modalOfertas" />
        </div>


    </div>


@section('scripts_importados')

    <script>
        let pops = @json($popups);

        function calcularTotal() {
            let articulos = Local.get('carrito')
            let total = articulos.map(item => {
                let monto
                if (Number(item.descuento) !== 0) {
                    monto = item.cantidad * Number(item.descuento)
                } else {
                    monto = item.cantidad * Number(item.precio)

                }
                return monto

            })
            const suma = total.reduce((total, elemento) => total + elemento, 0);

            $('#itemsTotal').text(`S/. ${suma} `)

        }
        $(document).ready(function() {
            console.log(pops.length)
            if (pops.length > 0) {
                $('#modalofertas').modal({
                    show: true,
                    fadeDuration: 100
                })

            }


            $(document).ready(function() {
                articulosCarrito = Local.get('carrito') || [];

                // PintarCarrito();
            });

        })
    </script>

    <script>
        /*  */
        var swiper = new Swiper(".beneficios", {
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1350: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });


        var carrouselTestimonios = new Swiper(".myTestimonios", {
            slidesPerView: 1, //3
            spaceBetween: 20,
            loop: true,
            grabCursor: false,
            centeredSlides: false,
            initialSlide: 0,
            speed: 1000,
            pagination: {
                el: ".swiper-pagination-testimonios",
                clickable: true,
            },
            navigation: {
                nextEl: ".next-testimonios",
                prevEl: ".prev-testimonios",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        var swiper = new Swiper(".slider", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 1,
                },
            },
        });
    </script>


@stop

@stop
