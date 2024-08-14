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
import Teacher from './components/Product/Teacher'


const Docente = () => {
const sectionStep = 'images/img/palacio.png';
const imgVideo = 'images/img/mujergp.png';
const imgPlay = 'images/img/iconoplayblanco.png';


return (<>
    <section className="flex flex-col !font-poppins_regular !font-normal">
        <div className="flex w-full bg-[#FFF0F0] h-40 lg:h-60 max-md:max-w-full" role="banner"></div>

        <div className="flex flex-col px-[5%] lg:px-[8%] py-10 w-full max-md:px-5 max-md:max-w-full -mt-40 ">
            <div className="flex flex-col bg-white p-4 lg:p-8 rounded-2xl">
                <div className="text-3xl font-semibold leading-tight text-neutral-800 max-md:max-w-full">
                    Docentes
                </div>
                <div className="flex flex-wrap gap-6 items-start mt-6 w-full max-md:max-w-full">
                    <div className="flex flex-col flex-1 shrink whitespace-nowrap basis-0 min-w-[240px]">
                        <div className="text-sm tracking-normal leading-loose text-gray-600">
                            Buscar
                        </div>
                        <div
                            className="flex gap-2.5 items-center px-4 py-3 mt-1.5 w-full text-base leading-tight text-red-600 bg-rose-50 rounded-xl">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/8d0148f8eb4404f2a75a99c44c0b35db6ba68a27faeb0e05d47cc41d12c3445f?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                            <div className="flex-1 shrink self-stretch my-auto basis-0">Contraseña</div>
                        </div>
                    </div>
                    <div className="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
                        <div className="text-sm tracking-normal leading-loose text-gray-600">
                            Cursos y Diplomados
                        </div>
                        <div
                            className="flex gap-2.5 items-center px-4 py-3 mt-1.5 w-full text-base leading-tight text-red-600 whitespace-nowrap bg-rose-50 rounded-xl">
                            <div className="flex-1 shrink self-stretch my-auto basis-0">Contraseña</div>
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/ab0b4066df068bc53a8edb4248601396e5e5ebaee2c8e2ecddf0a715cf13b781?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                        </div>
                    </div>
                    <div className="flex flex-col flex-1 shrink whitespace-nowrap basis-0 min-w-[240px]">
                        <div className="text-sm tracking-normal leading-loose text-gray-600">
                            Profesor
                        </div>
                        <div
                            className="flex gap-2.5 items-center px-4 py-3 mt-1.5 w-full text-base leading-tight text-red-600 bg-rose-50 rounded-xl">
                            <div className="flex-1 shrink self-stretch my-auto basis-0">Contraseña</div>
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/485e0772ff005205674fa3ae3c5df867e3f721306ac45a95393479f681d9a7f9?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                        </div>
                    </div>
                </div>
                <div className='grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8'>
                    <Teacher />
                    <Teacher />
                    <Teacher />
                </div>
                
            </div>
            <div className='flex flex-row items-center justify-center mt-6'>
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
createRoot(el).render(
<Docente {...properties} />);
})
