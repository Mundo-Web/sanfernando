@extends('components.public.matrix', ['pagina' => 'index'])

@section('css_importados')

@stop


@section('content')

    <main class="z-[15] ">

        <section class="flex flex-col !font-poppins_regular !font-normal">
            <header class="flex w-full bg-rose-50 min-h-[120px] max-md:max-w-full" role="banner"></header>
            <main class="flex flex-col px-[8%] py-10 w-full max-md:px-5 max-md:max-w-full">
              <div class="flex flex-col w-full max-md:max-w-full">
                <h1 class="text-3xl font-semibold leading-tight text-neutral-800 max-md:max-w-full">
                  Nuestros Cursos y Diplomados
                </h1>
                <div class="flex flex-wrap gap-10 justify-between items-center mt-6 w-full max-md:max-w-full">
                  <form class="flex flex-col self-stretch my-auto text-base leading-tight text-red-600 min-w-[240px] w-[493px] max-md:max-w-full">
                    <div class="flex flex-wrap gap-2.5 items-center px-4 py-3 w-full bg-rose-50 rounded-xl max-md:max-w-full">
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/8d0148f8eb4404f2a75a99c44c0b35db6ba68a27faeb0e05d47cc41d12c3445f?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" alt="" />
                      <label for="searchInput" class="sr-only">Buscar curso o diplomado</label>
                      <input type="text" id="searchInput" placeholder="Buscar curso o diplomado" class="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full bg-transparent border-none focus:outline-none" />
                    </div>
                  </form>
                  <div class="flex gap-3 justify-center items-center self-stretch my-auto min-w-[240px]">
                    <span class="self-stretch my-auto text-sm tracking-normal leading-loose text-gray-600">
                      Ordenar por:
                    </span>
                    <div class="flex gap-2.5 items-center self-stretch px-4 py-3 my-auto text-base leading-tight text-red-600 whitespace-nowrap bg-rose-50 rounded-xl" role="button" tabindex="0">
                      <span class="self-stretch my-auto">Tendencias</span>
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/560d29ead07b85ec6bc5be3251ad24dfeac5fff9cc1338da00022c87b5927764?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-wrap gap-10 items-center mt-6 w-full text-xs leading-tight max-md:max-w-full">
                <div class="flex flex-1 shrink gap-4 items-center self-stretch my-auto text-center text-red-400 whitespace-nowrap basis-0 min-w-[240px] max-md:max-w-full">
                  <span class="self-stretch my-auto text-gray-600">Sugerencia:</span>
                  <span class="self-stretch my-auto">Dignissim</span>
                  <span class="self-stretch my-auto">Proin</span>
                  <span class="self-stretch my-auto">Fermentum</span>
                  <span class="self-stretch my-auto">Aliquam</span>
                </div>
                <p class="flex-1 shrink self-stretch my-auto text-right text-gray-600 basis-0 max-md:max-w-full">
                  <strong class="font-semibold text-gray-600">3.145.684</strong>
                  resultados encontrados para "gestión pública"
                </p>
              </div>
            </main>
        </section>

        <section>
            <div class="grid grid-cols-1 lg:grid-cols-5 w-full gap-4 px-[8%] py-12 xl:py-16">
                <div class="hidden lg:flex flex-col justify-start !font-poppins_regular !font-normal  items-start lg:col-span-1">
                    <section class="flex flex-col text-base leading-tight max-w-[350px]">
                        <div class="flex flex-col w-full">
                          <header class="flex gap-2.5 items-center px-14 py-3 w-full font-semibold text-red-600 whitespace-nowrap bg-gray-50 rounded-xl border-b border-zinc-100">
                            <h2 class="flex-1 shrink self-stretch my-auto basis-0">Cursos</h2>
                            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/bb5ff0527288599e198e0eed4dac55467f0d3d99698718f0808db8085b50604b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" alt="" />
                          </header>
                          <nav class="flex flex-col w-full text-red-200">
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Curso 1</a>
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Curso 2</a>
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full font-semibold text-white bg-red-600">Curso 3</a>
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Curso 4</a>
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Curso 5</a>
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50 rounded-none">Curso 6</a>
                          </nav>
                        </div>
                        <div class="flex flex-col mt-6 w-full">
                          <header class="flex gap-2.5 items-center px-4 py-3 w-full font-semibold text-red-600 whitespace-nowrap bg-gray-50 rounded-xl border-b border-zinc-100">
                            <h2 class="flex-1 shrink self-stretch my-auto basis-0">Diplomados</h2>
                            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f25a881811c52a794fbb3f7644ad50c2d39b584fecdf8f41974ed50976cfeea?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" alt="" />
                          </header>
                          <nav class="flex flex-col w-full text-red-200">
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Diplomado 1</a>
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Diplomado 2</a>
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Diplomado 3</a>
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Diplomado 4</a>
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Diplomado 5</a>
                            <a href="#" class="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50 rounded-none">Diplomado 6</a>
                          </nav>
                        </div>
                      </section>
                </div>

                <div class="flex flex-col justify-center items-center lg:col-span-4">
                    <div class="grid grid-cols-1 md:grid-cols-2  w-full gap-12  pb-12">
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
                                            stroke="#FF282C" stroke-width="1.5" stroke-linecap="round"
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
                                            stroke="#FF282C" stroke-width="1.5" stroke-linecap="round"
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
                                            stroke="#FF282C" stroke-width="1.5" stroke-linecap="round"
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
                                            stroke="#FF282C" stroke-width="1.5" stroke-linecap="round"
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

                    <nav aria-label="Pagination" class="flex gap-6 justify-between items-center max-w-[393px]">
                        <button aria-label="Previous page" class="flex gap-2.5 justify-center items-center self-stretch px-4 my-auto bg-red-200 h-[52px] rotate-[3.141592653589793rad] rounded-[100px] w-[52px]">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ff0317192b011b01d7fdb120f97fc223c2c8a165930b36c0309489160d2b263?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" alt="" class="object-contain self-stretch my-auto w-5 aspect-square" />
                        </button>
                        <ul class="flex items-center self-stretch my-auto text-sm font-medium tracking-normal leading-none text-center text-gray-600 whitespace-nowrap">
                          <li><a href="#" aria-label="Page 1" class="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">01</a></li>
                          <li><a href="#" aria-label="Current page, Page 2" aria-current="page" class="flex items-center justify-center self-stretch my-auto w-12 h-12 text-white bg-red-600 rounded-[100px]">02</a></li>
                          <li><a href="#" aria-label="Page 3" class="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">03</a></li>
                          <li><a href="#" aria-label="Page 4" class="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">04</a></li>
                          <li><a href="#" aria-label="Page 5" class="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">05</a></li>
                        </ul>
                        <button aria-label="Next page" class="flex gap-2.5 justify-center items-center self-stretch px-4 my-auto bg-red-200 h-[52px] rounded-[100px] w-[52px]">
                          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/e4d0870444e79373617da8c7fbd2c7b6d85de83feaeb03177566a7d3daf99d91?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" alt="" class="object-contain self-stretch my-auto w-5 aspect-square" />
                        </button>
                      </nav>
                </div>


            </div>
        </section>




    </main>
    {{-- modalOfertas --}}



    <!-- Modal toggle -->


    <!-- Main modal -->




@section('scripts_importados')

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
