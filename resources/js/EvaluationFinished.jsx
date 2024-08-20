import React from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'

const ExamenFinalizado = ({ evaluation }) => {
    return (<>
        <section>
            <div
                className="flex flex-col lg:flex-row gap-10 justify-between items-center px-[5%] lg:px-[8%] py-10 bg-rose-50 font-poppins_regular">
                <div className="flex gap-8 items-center max-w-4xl">
                    <div className="">
                        <div className="text-2xl font-bold font-poppins_bold leading-none text-neutral-800 ">
                            Examen Final de {evaluation.course.producto}
                        </div>
                        <div className="mt-2 text-base font-medium leading-6 text-gray-600 ">
                            Los exámenes online son pruebas realizadas en un ambiente virtual para
                            evaluar y validar a distancia la preparación académica y las habilidades
                            adquiridas por los estudiantes, esta modalidad ha ganado terreno en los
                            últimos años ya que es considerada una forma más flexible de validar los
                            conocimientos.
                        </div>
                    </div>
                </div>
                <a href='/micuenta' className=" px-8 py-3 text-sm font-semibold tracking-normal text-white bg-gray-500 rounded-xl">
                    Volver a mi panel
                </a>
            </div>
        </section>

        <section className='px-[5%] lg:px-[8%]'>
            <div className="flex flex-col py-16  max-w-[687px] font-poppins_regular items-center justify-center mx-auto">
                <div className="flex flex-col w-full text-center max-md:max-w-full ">
                    <img loading="lazy"
                        src='/images/img/finalizado.png'
                        className="object-contain self-center max-w-full aspect-[1.28] w-[380px]" />
                    <div className="flex flex-col items-center mt-4 w-full max-md:max-w-full">
                        <div className="text-lg font-semibold leading-tight text-rose-700 max-md:max-w-full">
                            ¡Examen Completado con Éxito!
                        </div>
                        <div className="mt-4 text-xl tracking-normal leading-7 text-neutral-800 max-md:max-w-full">
                            Has finalizado tu examen en <b>{evaluation.course.producto}</b>. Revisa tus resultados,
                            continúa aprendiendo, y fortalece tus habilidades para alcanzar tus
                            metas profesionales con confianza y determinación.
                        </div>
                    </div>
                </div>
                <a href='/micuenta'
                    className="gap-3  px-8 py-3 mt-10  text-sm tracking-normal text-white bg-rose-700 rounded-xl ">
                    Volver a mi panel
                </a>
            </div>
        </section>
    </>)
}

CreateReactScript((el, properties) => {
    createRoot(el).render(
        <ExamenFinalizado {...properties} />);
})
