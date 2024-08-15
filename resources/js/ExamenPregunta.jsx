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


const ExamenPregunta = () => {

const imgfinalizado = 'images/img/finalizado.png';


return (<>

    <section>
        <div
            className="flex flex-col lg:flex-row gap-10 justify-between items-center px-[5%] lg:px-[8%] py-10 bg-rose-50 font-poppins_regular">
            <div className="flex gap-8 items-center max-w-3xl">
                <div className="">
                    <div className="text-2xl font-bold font-poppins_bold leading-none text-neutral-800 ">
                        Examen Final del curso de Gestión Pública
                    </div>
                    <div className="mt-2 text-base font-medium leading-6 text-gray-600 ">
                        Los exámenes online son pruebas realizadas en un ambiente virtual para
                        evaluar y validar a distancia la preparación académica y las habilidades
                        adquiridas por los estudiantes, esta modalidad ha ganado terreno en los
                        últimos años ya que es considerada una forma más flexible de validar los
                        conocimientos.
                    </div>
                </div>
            </div>
            <div className=" px-8 py-3 text-sm font-semibold tracking-normal text-white bg-[#CF072C] rounded-xl">
                Realizar prueba después
            </div>
        </div>
    </section>

    <section className='px-[5%] lg:px-[8%] font-poppins_regular'>
        <div class="flex flex-col py-16 max-w-3xl mx-auto">
            <div class="flex flex-col w-full max-md:max-w-full">
                <div class="flex flex-col w-full font-semibold max-md:max-w-full">
                    <div class="text-lg leading-tight text-rose-700 max-md:max-w-full">
                        Pregunta 1
                    </div>
                    <div class="mt-2 text-xl tracking-normal leading-7 text-neutral-800 max-md:max-w-full">
                        ¿El Sistema Nacional de Control-SNC, entidades sujetas, conformación
                        (Contraloría General de la República, Órganos de Control Institucional,
                        y Sociedades de Auditoría) y atribuciones?
                    </div>
                </div>
                <div class="flex flex-col mt-10 w-full text-base font-medium leading-6 text-gray-600 max-md:max-w-full">
                    <div class="flex flex-wrap gap-3 items-start px-4 w-full max-md:max-w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/e0368642224003cc058345410535bf02c41ef446eabaefe71f34f2604ad137ff?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 aspect-[0.96] w-[23px]" />
                        <div class="flex-1 shrink basis-0 max-md:max-w-full">
                            Ut sollicitudin, orci eu tincidunt sagittis, eros est semper ligula,
                            vel congue.
                        </div>
                    </div>
                    <div
                        class="flex flex-wrap gap-3 items-start p-4 mt-8 w-full bg-rose-50 rounded-xl max-md:max-w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/f0193642d318944a989b99eec200ef94c8d764c06601edcdb651e301c864dee4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 w-6 aspect-square" />
                        <div class="flex-1 shrink basis-0 max-md:max-w-full">
                            Pellentesque id massa dolor. Etiam a augue posuere nibh consectetur
                            egestas. Vestibulum lacinia venenatis fermentum. Nullam varius
                            placerat sagittis.
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3 items-start px-4 mt-8 w-full max-md:max-w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/203468b9d904f3b99beb111ad22fd7ebae8fd837365e2e0ce36e872fcad87a80?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 w-6 aspect-square" />
                        <div class="flex-1 shrink basis-0 max-md:max-w-full">
                            Aenean scelerisque, mi quis sollicitudin dignissim, nisi nisl sodales
                            diam, in fermentum ligula ante quis sem.
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3 items-start px-4 mt-8 w-full max-md:max-w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/d5ef365131fe7128042366b7f9cc120d3c63bb2c1a0ab6108058ff8fab54df6c?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 w-6 aspect-square" />
                        <div class="flex-1 shrink basis-0 max-md:max-w-full">
                            Sed eget placerat urna. Suspendisse sagittis nisi quis purus
                            vestibulum, in finibus lorem facilisis. Maecenas mattis consequat
                            metus quis bibendum.
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-col lg:flex-row mt-16  text-sm tracking-normal text-white w-full gap-5">
                <div
                    class="font-semibold bg-[#CF072C] rounded-2xl w-full lg:w-1/2 text-center py-4">
                    Responder
                </div>
                <div
                    class=" font-semibold rounded-2xl bg-slate-900 opacity-60 w-full lg:w-1/2 text-center py-4">
                    Estas seguro?, Ir a la sigueinte
                </div>
            </div>
        </div>
    </section>
</>)
}

CreateReactScript((el, properties) => {
createRoot(el).render(
<ExamenPregunta {...properties} />);
})
