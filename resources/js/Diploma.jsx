import React, { useEffect, useState } from 'react'
import CreateReactScript from './Utils/CreateReactScript'
import { createRoot } from 'react-dom/client'

const Diploma = () => {
const imgPlay = 'images/img/logorojodiploma.png';
const qrprueba = 'images/img/qrprueba.png';
const fondoizquierdo = 'images/img/fondoizquierdo.png';
const puntosderecha = 'images/img/puntosderecha.png';
const certif = 'images/img/certif.png';
return (<>
    <div className='mx-auto'>
        <div className='w-[800px] h-[600px] flex mx-auto my-10'>
            <div className='w-[100px] h-full bg-[#CF072C] rounded-tr-[50px] bg-cover' style={{ backgroundImage: `url(${fondoizquierdo})` }}>

            </div>

            <div className='w-[700px] h-full pl-10 pr-20 py-10 relative'>
                <div className='flex flex-col gap-8 items-start justify-center'>
                    <div className='flex flex-row justify-between w-full items-center'>
                        <div className='w-[200px]'>
                            <img src={imgPlay} alt='logo' className='w-full' />
                        </div>
                        <div className='w-[90px]'>
                            <img src={qrprueba} alt='logo' className='w-full' />
                        </div>
                    </div>
                    <div className='text-[#CF072C] uppercase text-3xl text-center font-bold mx-auto'>
                        DIPLOMADO EN AUDITORÍA Y CONTROL GUBERNAMENTAL
                    </div>
                    <div className='text-lg text-black  px-3 max-w-[700px] text-center  mx-auto'>
                            En mérito a su participación en nuestro<span
                            className='uppercase italic font-bold text-2xl'> DIPLOMADO DE AUDITORÍA
                                Y CONTROL GUBERNAMENTAL.</span>
                        <br></br>Organizado por EGESPP, con una duracion de 300 horas lectivas del 2024.
                    </div>
                    <div className='text-center text-xl font-bold w-full mx-auto'>
                            Diego Martinez Martinez
                    </div>
                    <div className='flex flex-row gap-20 mt-8'>
                        <div className='text-center text-black text-lg font-bold border-t border-black w-[250px]'>
                            Gerente General<br></br>
                            <span className='font-normal text-base'>Patricia Heredia Olivera</span>
                        </div>
                        <div className='text-center text-black text-lg font-bold border-t border-black w-[250px]'>
                            Sub. Gerente Académico<br></br>
                            <span className='font-normal text-base'>Edwin Chichipe Salazar</span>
                        </div>
                    </div>
                   
                </div>
                <div className='absolute top-20 right-0'><img src={puntosderecha} alt='logo' className='w-[25px]' /></div>
            </div>
        </div>
    </div>


    

</>)
}

CreateReactScript((el, properties) => {
createRoot(el).render(
<Diploma {...properties} />);
})
