import React from 'react';
import Tippy from '@tippyjs/react';
import 'tippy.js/dist/tippy.css';
import truncateText from '../../Utils/truncateText'

const Teacher = ({ docentes }) => {
    const imgcurso = 'images/img/imagencurso.png';
    const imgcalendario = 'images/svg/gp_calendario.svg';
    const imgreloj = 'images/svg/gp_reloj.svg';

    return (
        <div className="flex relative flex-col flex-1 shrink basis-0 min-w-[240px]">
        <div className="min-w-[240px]">
            <img loading="lazy" src={`/${docentes.url_foto}`} className="object-cover object-center z-0 w-full rounded-t-2xl h-[280px]"
            alt="Course background image" onError={e => e.target.src = '/images/img/noStaff.jpg'} />
        </div>

        <div className="flex z-0 flex-col p-6 w-full bg-[#F2F3F7] gap-2 rounded-b-3xl">
            
            <Tippy content={docentes.nombre}>
                <h2 className="text-xl font-semibold font-Montserrat_Bold leading-7 text-[#221F1F] xl:line-clamp-2">
                    {truncateText(docentes.nombre, 55)}
                </h2>
            </Tippy>

            <div className='font-Montserrat_SemiBold text-sm text-[#F19905] -mt-2'><p>Especialista en {docentes.majors?.name}</p></div>

            <div className='font-Montserrat_Regular text-sm text-[#221F1F] line-clamp-3'>
                <p>{docentes.resume}</p>
            </div>  


            <div className="flex flex-col gap-y-1 self-start text-xs tracking-normal font-Montserrat_Regular leading-loose text-[#566574] py-2">
            
                {/* <div className="flex flex-row gap-2 items-start justify-start">
                    <i className='fa fa-layer-group text-lg' style={{ color: '#221F1F' }}></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M16.6663 18.3359V15.8359C16.6663 13.4789 16.6663 12.3004 15.9341 11.5682C15.2018 10.8359 14.0233 10.8359 11.6663 10.8359L9.99967 12.5026L8.33301 10.8359C5.97598 10.8359 4.79747 10.8359 4.06524 11.5682C3.33301 12.3004 3.33301 13.4789 3.33301 15.8359V18.3359" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.333 10.8359V15.4193" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.08366 10.8359V14.1693M7.08366 14.1693C8.00413 14.1693 8.75033 14.9154 8.75033 15.8359V16.6693M7.08366 14.1693C6.16318 14.1693 5.41699 14.9154 5.41699 15.8359V16.6693" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.9168 5.41797V4.58464C12.9168 2.9738 11.611 1.66797 10.0002 1.66797C8.38933 1.66797 7.0835 2.9738 7.0835 4.58464V5.41797C7.0835 7.0288 8.38933 8.33464 10.0002 8.33464C11.611 8.33464 12.9168 7.0288 12.9168 5.41797Z" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.9585 16.043C13.9585 16.3881 13.6787 16.668 13.3335 16.668C12.9883 16.668 12.7085 16.3881 12.7085 16.043C12.7085 15.6978 12.9883 15.418 13.3335 15.418C13.6787 15.418 13.9585 15.6978 13.9585 16.043Z" stroke="#221F1F" stroke-width="1.25"/>
                    </svg>
                    <p className='leading-tight'>Profesor en la Universidad Nacional Mayor de San Marcos</p>
                </div> */}

                {/* <div className="flex flex-row gap-2 items-start justify-start">
                    <i className='fa fa-layer-group text-lg' style={{ color: '#221F1F' }}></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M9.58333 18.3307C6.24422 18.3307 4.57466 18.3307 3.53733 17.1103C2.5 15.89 2.5 13.9257 2.5 9.9974C2.5 6.06903 2.5 4.10484 3.53733 2.88445C4.57466 1.66406 6.24422 1.66406 9.58333 1.66406C12.9224 1.66406 14.592 1.66406 15.6293 2.88445C16.4643 3.86683 16.6273 5.33118 16.659 7.91406" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.6665 6.66406H12.4998M6.6665 10.8307H9.1665" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.3408 15.0878C17.0433 14.5765 17.4998 13.7478 17.4998 12.8125C17.4998 11.2592 16.2407 10 14.6873 10H14.479C12.9257 10 11.6665 11.2592 11.6665 12.8125C11.6665 13.7478 12.1231 14.5765 12.8255 15.0878M16.3408 15.0878C15.8768 15.4257 15.3053 15.625 14.6873 15.625H14.479C13.861 15.625 13.2896 15.4257 12.8255 15.0878M16.3408 15.0878L16.8265 16.617C17.0118 17.2002 17.1044 17.4919 17.0791 17.6735C17.0263 18.0514 16.7181 18.332 16.3542 18.3333C16.1793 18.334 15.9173 18.1965 15.3934 17.9216C15.1688 17.8037 15.0564 17.7447 14.9415 17.71C14.7073 17.6394 14.459 17.6394 14.2248 17.71C14.1099 17.7447 13.9976 17.8037 13.7729 17.9216C13.249 18.1965 12.987 18.334 12.8122 18.3333C12.4483 18.332 12.14 18.0514 12.0873 17.6735C12.0619 17.4919 12.1546 17.2002 12.3398 16.617L12.8255 15.0878" stroke="#221F1F" stroke-width="1.25"/>
                    </svg>
                    <p className='leading-tight'>Autor de la Publicación Académica o Libro</p>
                </div> */}
            
            </div>


            <a href={`/detalleDocente/${docentes.id}`}
                className="flex gap-1 font-Montserrat_SemiBold justify-center items-center self-stretch px-5 py-2.5 my-auto text-center text-white bg-[#F19905] rounded-3xl"
                role="button">
                <span className="self-stretch my-0">Ver Perfil Completo</span>
            </a>

        </div>

    </div>       
    );
};



export default Teacher;