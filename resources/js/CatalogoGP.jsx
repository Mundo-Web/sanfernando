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
import SelectSecond from './components/Inputs/SelectSecond'


const CatalogoGP = () => {
    const sectionStep = 'images/img/palacio.png';
    const imgVideo = 'images/img/mujergp.png';
    const imgPlay = 'images/img/iconoplayblanco.png';


    return (<>
         <section className="flex flex-col !font-poppins_regular !font-normal">
            <div className="flex w-full bg-[#FFF0F0] h-10 lg:h-20 max-md:max-w-full" role="banner"></div>
            <div className="flex flex-col px-[8%] py-10 w-full max-md:px-5 max-md:max-w-full">
              <div className="flex flex-col w-full max-md:max-w-full">
                <h1 className="text-2xl lg:text-3xl font-semibold leading-tight text-neutral-800 max-md:max-w-full">
                  Nuestros Cursos y Diplomados
                </h1>
                <div className="flex flex-wrap gap-5 lg:gap-10 justify-between items-center mt-6 w-full max-md:max-w-full">
                  <form className="flex flex-col self-stretch my-auto text-base leading-tight text-red-600 min-w-[240px] w-[493px] max-md:max-w-full">
                    <div className="flex flex-wrap gap-2.5 items-center px-4 py-3 w-full bg-rose-50 rounded-xl max-md:max-w-full">
                      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/8d0148f8eb4404f2a75a99c44c0b35db6ba68a27faeb0e05d47cc41d12c3445f?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" alt="" />
                      <label for="searchInput" className="sr-only">Buscar curso o diplomado</label>
                      <input type="text" id="searchInput" placeholder="Buscar curso o diplomado" className="flex-1 shrink self-stretch my-auto basis-0 max-md:max-w-full bg-transparent border-none focus:outline-none" />
                    </div>
                  </form>
                  <div className="flex gap-3 justify-center items-center self-stretch my-auto min-w-[240px]">
                    <span className="self-stretch my-auto text-sm tracking-normal leading-loose text-gray-600">
                      Ordenar por:
                    </span>
                    <SelectSecond title={'Tendencias'} />
                  </div>
                </div>
              </div>
              <div className="flex flex-col lg:flex-row gap-10 items-center mt-6 text-xs leading-tight w-full">
                <div className="flex flex-wrap lg:flex-1 shrink gap-4 items-center self-stretch my-auto text-center text-red-400 whitespace-nowrap basis-0 min-w-[240px] max-w-2xl">
                  <span className="self-stretch my-auto text-gray-600">Sugerencia:</span>
                  <span className="self-stretch my-auto">Dignissim</span>
                  <span className="self-stretch my-auto">Proin</span>
                  <span className="self-stretch my-auto">Fermentum</span>
                  <span className="self-stretch my-auto">Aliquam</span>
                </div>
                <p className="flex-1 shrink self-stretch my-auto text-left lg:text-right text-gray-600 basis-0 max-md:max-w-full">
                  <strong className="font-semibold text-gray-600 pr-3">3.145.684</strong>
                  resultados encontrados para "gestión pública"
                </p>
              </div>
            </div>
        </section>


        <section>
            <div class="grid grid-cols-1 lg:grid-cols-5 w-full gap-4 px-[8%] py-12 xl:py-16">
                <div class="hidden lg:flex flex-col justify-start !font-poppins_regular !font-normal  items-start lg:col-span-1">
                    <section class="flex flex-col text-base leading-tight max-w-[350px]">
                        <div class="flex flex-col w-full">
                           <SelectSecond title={'Cursos'} />
                        </div>
                        <div class="flex flex-col mt-6 w-full">
                           <SelectSecond title={'Diplomados'} />
                        </div>
                      </section>
                </div>

                <div class="flex flex-col justify-center items-center lg:col-span-4">
                    <div class="grid grid-cols-1 md:grid-cols-2  w-full gap-12  pb-12">
                     
                    <Curse  />

                    <Curse  />

                    <Curse  />
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

    </>)
  }

CreateReactScript((el, properties) => {
    createRoot(el).render(<CatalogoGP {...properties} />);
})