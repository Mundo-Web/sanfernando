import React from 'react';
import truncateText from '../../Utils/truncateText'
import Tippy from '@tippyjs/react';
import 'tippy.js/dist/tippy.css';

const Exam = ({ simulacro, userIsLogged}) => {
  
  return (
    <div className="flex relative flex-col flex-1 shrink basis-0 min-w-[240px]">
      <div className="min-w-[240px]">
        <img loading="lazy" src={`/${simulacro.imagen}`} className="object-cover object-center z-0 w-full rounded-t-2xl h-[280px]"
          alt="Course background image" onError={e => e.target.src = '/images/img/noimagen.jpg'} />
      </div>

      <div className="flex z-0 flex-col p-6 w-full bg-[#F2F3F7] gap-2 rounded-b-3xl">
        {/* <div
          className="flex gap-3 items-center w-full text-xs font-medium leading-tight text-white uppercase whitespace-nowrap">
          <span className="gap-2.5 self-stretch px-1.5 py-1 my-auto bg-red-800 rounded font-poppins_regular">{simulacro?.category?.name}</span>
        </div> */}
        
        <Tippy content={simulacro.title}>
          <h2 className="text-xl font-semibold font-Montserrat_Bold leading-7 text-[#221F1F] xl:line-clamp-2">
            {truncateText(simulacro.title, 55)}
          </h2>
        </Tippy>

        <div className='font-Montserrat_Regular text-sm text-[#221F1F] xl:line-clamp-4'>
            <p>{simulacro.description}</p>
        </div>  


        <div
          className="flex flex-wrap gap-x-4 gap-y-1 self-start text-xs tracking-normal font-Montserrat_Regular leading-loose text-[#566574] py-2">
          
          <div className="flex flex-row gap-1 items-center justify-start">
            {/* <i className='fa fa-layer-group text-lg' style={{ color: '#221F1F' }}></i> */}
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
              <path d="M15.6667 1.66797V3.33464M5.66667 1.66797V3.33464" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M2.75017 10.2027C2.75017 6.57162 2.75017 4.75607 3.7936 3.62803C4.83703 2.5 6.51641 2.5 9.87517 2.5H11.4585C14.8173 2.5 16.4967 2.5 17.5401 3.62803C18.5835 4.75607 18.5835 6.57162 18.5835 10.2027V10.6307C18.5835 14.2617 18.5835 16.0773 17.5401 17.2053C16.4967 18.3333 14.8173 18.3333 11.4585 18.3333H9.87517C6.51641 18.3333 4.83703 18.3333 3.7936 17.2053C2.75017 16.0773 2.75017 14.2617 2.75017 10.6307V10.2027Z" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M3.16667 6.66797H18.1667" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p>2 horas</p>
          </div>

          <div className="flex flex-row gap-1 items-center justify-start">
            {/* <i className='fa fa-layer-group text-lg' style={{ color: '#221F1F' }}></i> */}
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
              <path d="M7.53583 2.61872L6.11514 3.27541C3.92728 4.28672 2.83334 4.79237 2.83334 5.6224C2.83334 6.45242 3.92728 6.95807 6.11515 7.96938L7.53583 8.62606C8.91268 9.26248 9.60118 9.58073 10.3333 9.58073C11.0655 9.58073 11.754 9.26248 13.1308 8.62606L14.5515 7.96938C16.7394 6.95807 17.8333 6.45242 17.8333 5.6224C17.8333 4.79237 16.7394 4.28672 14.5515 3.27541L13.1308 2.61872C11.754 1.98228 11.0655 1.66406 10.3333 1.66406C9.60118 1.66406 8.91268 1.98228 7.53583 2.61872Z" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M17.6567 9.25C17.7744 9.41558 17.8333 9.58825 17.8333 9.77808C17.8333 10.5962 16.7394 11.0947 14.5515 12.0917L13.1308 12.739C11.754 13.3663 11.0655 13.6801 10.3333 13.6801C9.60118 13.6801 8.91268 13.3663 7.53583 12.739L6.11515 12.0917C3.92728 11.0947 2.83334 10.5962 2.83334 9.77808C2.83334 9.58825 2.89224 9.41558 3.01001 9.25" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M17.3139 13.5547C17.6602 13.8305 17.8333 14.1054 17.8333 14.4309C17.8333 15.2492 16.7394 15.7476 14.5515 16.7445L13.1308 17.3919C11.754 18.0193 11.0655 18.3329 10.3333 18.3329C9.60118 18.3329 8.91268 18.0193 7.53583 17.3919L6.11515 16.7445C3.92728 15.7476 2.83334 15.2492 2.83334 14.4309C2.83334 14.1054 3.00649 13.8305 3.35279 13.5547" stroke="#221F1F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p>Intermedio</p>
          </div>
         
        </div>


        <a href={`/detalleCurso/${simulacro.id}`}
          className="flex gap-1 font-Montserrat_SemiBold justify-center items-center self-stretch px-5 py-2.5 my-auto text-center text-white bg-[#F19905] rounded-3xl"
          role="button">
          <span className="self-stretch my-0">Realizar examen</span>
        </a>

      </div>

    </div>
  );
};



export default Exam;
