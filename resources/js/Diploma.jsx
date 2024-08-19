import React, { useEffect, useState } from 'react'
import CreateReactScript from './Utils/CreateReactScript'
import { createRoot } from 'react-dom/client'

const Diploma = () => {
    const imgPlay = 'images/img/logorojo.png';
return (<>
   
        <div className='w-[1000px] h-[650px] flex'>  
            <div className='w-[150px] h-full bg-red-600 rounded-tr-[50px]'>

            </div>
            <div className='w-[850px] h-full p-14'>
                    <div className='flex flex-col gap-12 items-center justify-center'>
                        <div className='float-start w-[200px]'><img src={imgPlay} alt='logo' className='w-[200px]' /></div>    
                        <div className='text-red-600 uppercase text-4xl text-center font-bold'>
                            Escuela de Gestion Publica y Negocios del Peru
                        </div>
                        <div className='text-xl text-black  px-3 max-w-[650px] mx-auto'>
                            En merito a su participacion en nuestro <span className='uppercase italic font-bold text-3xl'>DIPLOMADO DE AUDITORIA y CONTROL GUBERNAMENTAL.</span>
                            <br></br>Organizado por EGESPP, con una duracion de xx horas lectivas del 2024.
                        </div>
                        <div className='text-center  uppercase text-3xl font-bold'>
                            NOMBRE Y APELLIDO DE ALUMNO
                        </div>
                        <div className='flex flex-row gap-20'>
                            <div className='text-center text-black text-xl font-bold border-t border-black w-[250px]'>
                                 Gerente General<br></br>
                                 <span className='font-normal text-lg'>Patricia Heredia Olivera</span>   
                            </div>
                            <div className='text-center text-black text-xl font-bold border-t border-black w-[250px]'>
                                 Sub-Gerente Academico<br></br>
                                 <span className='font-normal text-lg'>Edwin Chichipe Salazar</span>   
                            </div>
                        </div>
                    </div>
            </div>
        </div>

</>)
}

CreateReactScript((el, properties) => {
createRoot(el).render(
<Diploma {...properties} />);
})
