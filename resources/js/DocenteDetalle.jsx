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
        <div className="flex flex-col px-[8%] py-10 w-full max-md:px-5 max-md:max-w-full -mt-40">
          <div className='flex flex-col bg-white p-4 lg:p-8 rounded-2xl'>  
            <div class="flex flex-wrap gap-10 justify-between items-center px-6 py-8 bg-red-100 rounded-xl max-md:px-5">
                <div class="flex flex-wrap gap-6 items-center self-stretch my-auto min-w-[240px] max-md:max-w-full">
                    <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/7225a071e84f16858b9225ffed876a6e0750a6be0ed3b81c8ea4e38b1619273b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/7225a071e84f16858b9225ffed876a6e0750a6be0ed3b81c8ea4e38b1619273b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/7225a071e84f16858b9225ffed876a6e0750a6be0ed3b81c8ea4e38b1619273b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/7225a071e84f16858b9225ffed876a6e0750a6be0ed3b81c8ea4e38b1619273b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/7225a071e84f16858b9225ffed876a6e0750a6be0ed3b81c8ea4e38b1619273b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/7225a071e84f16858b9225ffed876a6e0750a6be0ed3b81c8ea4e38b1619273b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/7225a071e84f16858b9225ffed876a6e0750a6be0ed3b81c8ea4e38b1619273b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/7225a071e84f16858b9225ffed876a6e0750a6be0ed3b81c8ea4e38b1619273b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        class="object-contain shrink-0 self-stretch my-auto aspect-square rounded-[255px] w-[102px]" />
                    <div class="flex flex-col justify-center self-stretch my-auto min-w-[240px] w-[362px]">
                        <div class="flex flex-col w-full">
                            <div class="w-full text-2xl font-semibold leading-tight text-neutral-800">
                                Dra. Patricia Heredia Olivera
                            </div>
                            <div class="mt-1 text-xs tracking-normal leading-4 text-gray-600">
                                Economista especialista, con amplia experiencia en el sector público y
                                privado. Magíster en Gestión Pública (ESAN).
                            </div>
                        </div>
                        <div
                            class="flex flex-col lg:flex-row gap-1 justify-between items-center mt-4 w-full font-medium whitespace-nowrap min-h-[22px]">
                            <div
                                class="flex gap-1.5 items-center self-stretch my-auto text-sm tracking-normal leading-none text-neutral-800">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb0a665c6aa4e8a830536cc611f92fc27dd3f8c32e1401d428f0aae05a12fd01?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                <div class="self-stretch my-auto">4.8</div>
                            </div>
                            <div class="flex gap-2 items-center self-stretch my-auto">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/4fefe30efbaac19e7e1363a37991dc87146d46d5b14ece9e7871190ca12900e0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                <div class="flex gap-1 justify-center items-center self-stretch my-auto">
                                    <div
                                        class="self-stretch my-auto text-sm tracking-normal leading-none text-neutral-800">
                                        2000
                                    </div>
                                    <div class="self-stretch my-auto text-xs tracking-normal leading-6 text-rose-700">
                                        Estudiantes
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-2 items-center self-stretch my-auto">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/dfe63dad1b968067755a3a1be0729d14d07bec1f5a800feeb716d24f7e93e6dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                <div class="flex gap-1 justify-center items-center self-stretch my-auto">
                                    <div
                                        class="self-stretch my-auto text-sm tracking-normal leading-none text-neutral-800">
                                        4
                                    </div>
                                    <div class="self-stretch my-auto text-xs tracking-normal leading-6 text-rose-700">
                                        Cursos
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-end self-stretch my-auto min-w-[240px]">
                    <div
                        class="flex gap-1.5 items-center text-sm font-medium tracking-normal leading-none text-gray-600 whitespace-nowrap">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/c32a1882584e21f3452a0077b8c92d2af52654e5f24bb6edfb45b4f6f4d8465e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                        <div class="self-stretch my-auto">https://www.patriciaheredia.com</div>
                    </div>
                    <div class="flex gap-2.5 items-start mt-4">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb963c0bc24376c8b9e65c08e1dbb60c32d21f2844d20f9d22bd435f6aa0a268?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 w-8 aspect-square" />
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b316d0bda2da3baa5235f357174381225735b27cdcb729f85f9ac477313af089?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 w-8 aspect-square" />
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/06b34bab7d2dc786c8405ef3abd9b758b2648bd3ecfb1ba0a03e36e16019d134?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 w-8 aspect-square" />
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/61ac1dbb271da450d361fcfce92e3caa7e9be4430f196d258a57e3bc25690959?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 w-8 aspect-square" />
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/8ed246758492e4fb48f4ae39ec76ad1bca366f1512ca02caa45136f74ae3d3a6?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 w-8 aspect-square" />
                    </div>
                </div>
            </div>

            <div className='grid grid-cols-1 lg:grid-cols-3 mt-10 gap-10'>
                <div className='col-span-1'>
                        <div className='bg-[#FFF0F0] p-6 rounded-2xl'>
                            <h2 className='font-poppins_regular font-bold text-xl'>Acerca de mí</h2>
                            <p>Profesional con amplia experiencia en auditoría gubernamental y control interno. 
                                Experto en normativas y prácticas de supervisión y fiscalización en el sector público 
                                peruano. Apasionado por compartir conocimientos y habilidades para promover la transparencia 
                                y la eficiencia en la gestión pública.</p>
                        </div>
                </div>
                <div className='col-span-1 lg:col-span-2'>
                      <h2 className='font-poppins_regular font-bold text-2xl'>Cursos de la Dra. Patricia</h2>
                      <div className='grid grid-cols-1 md:grid-cols-2 gap-6 mt-6'>
                        <Curse />
                        <Curse />
                        <Curse />
                        <Curse />
                        
                      </div> 
                </div>
            </div>
         </div>
        </div>
    </section>



</>)
}

CreateReactScript((el, properties) => {
createRoot(el).render(
<Docente {...properties} />);
})
