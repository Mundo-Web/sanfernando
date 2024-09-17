import React from 'react';

const DashboardEstudianteBlock = ({ finished, session, courses }) => {
  return (
    <div className='mt-6'>
      <div className="flex flex-col mt-10 w-full max-md:max-w-full">
        <div className="text-2xl font-semibold tracking-tight leading-none text-neutral-800 max-md:max-w-full">
          Dashboard
        </div>
        <div className="flex flex-wrap gap-6 items-center mt-5 w-full max-md:max-w-full">
          <div
            className="flex flex-1 shrink gap-6 items-center self-stretch p-6 my-auto basis-0 bg-[linear-gradient(180deg,rgba(240,242,245,0.00_0.02%,#F0F2F5_220.8%))] min-w-[240px] max-md:px-5">
            <div className="flex gap-2.5 items-center self-stretch p-3.5 my-auto bg-white rounded h-[60px] w-[60px] text-center">
              <i className='far fa-play-circle text-2xl text-center text-[#FF6636]'></i>
            </div>
            <div className="flex flex-col justify-center self-stretch my-auto w-[180px]">
              <div className="text-2xl leading-none text-neutral-800">{courses.length}</div>
              <div className="mt-1.5 text-sm tracking-normal leading-loose text-gray-600">
                Cursos matriculados
              </div>
            </div>
          </div>
          <div
            className="flex flex-1 shrink gap-6 items-center self-stretch p-6 my-auto basis-0 bg-[linear-gradient(180deg,rgba(240,242,245,0.00_0.02%,#F0F2F5_220.8%))] min-w-[240px] max-md:px-5">
            <div
              className="flex gap-2.5 items-center self-stretch p-3.5 my-auto bg-violet-100 rounded h-[60px] w-[60px] text-center">
              <i className='far fa-check-square text-2xl text-center text-[#564FFD]'></i>
            </div>
            <div className="flex flex-col justify-center self-stretch my-auto w-[180px]">
              <div className="text-2xl font-medium leading-none text-neutral-800">
                3
              </div>
              <div className="mt-1.5 text-sm tracking-normal leading-loose text-gray-600">
                Cursos activos
              </div>
            </div>
          </div>
          <div
            className="flex flex-1 shrink gap-6 items-center self-stretch p-6 my-auto basis-0 bg-[linear-gradient(180deg,rgba(240,242,245,0.00_0.02%,#F0F2F5_220.8%))] min-w-[240px] max-md:px-5">
            <div
              className="flex gap-2.5 items-center self-stretch p-3.5 my-auto bg-green-100 rounded h-[60px] w-[60px]">
              <i className='fas fa-trophy text-2xl text-center text-[#23BD33]'></i>
            </div>
            <div className="flex flex-col justify-center self-stretch my-auto w-[180px]">
              <div className="text-2xl font-medium leading-none text-neutral-800">
                {finished.length}
              </div>
              <div className="mt-1.5 text-sm tracking-normal leading-loose text-gray-600">
                Cursos completados
              </div>
            </div>
          </div>
        </div>
      </div>
      <div className="flex flex-col mt-10 w-full max-md:max-w-full">
        <div className="flex flex-wrap gap-10 justify-between items-center w-full max-md:max-w-full">
          <div className="self-stretch my-auto text-2xl font-semibold tracking-tight leading-none text-slate-700">
            Empecemos a aprender, {session.name.split(' ')[0]}
          </div>
        </div>
        <div className="flex flex-wrap gap-4 items-center mt-5 w-full max-md:max-w-full">
          {
            courses.map((course, i) => {
              const completed = finished.find(({ course_id }) => course_id == course.id);
              return <a key={`course-${i}`} href={`/micuenta/session/${course.uuid}`} className="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full">
                <img className="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src={`/${course.imagen}`} alt="" />
                <div className="flex flex-col justify-between p-4 leading-normal max-w-sm">
                  <h5 className="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white w-full">
                    {course.producto}
                  </h5>
                  <p className="font-normal text-gray-700 dark:text-gray-400 line-clamp-2 text-ellipsis">
                    {course.extract}
                  </p>
                  {
                    completed && <div className='flex flex-wrap gap-2 mt-2 items-center justify-start'>
                      <span className="w-max block  bg-green-100 text-green-800 text-xs font-medium px-2.5 py-1.5 rounded dark:bg-green-900 dark:text-green-300">Completado</span>
                      <a href={`/api/certificate/${completed.id}`}
                        //  download={`Certificado de finalizacion - ${course.producto}.pdf`} 
                        target='_blank' className="w-max text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-xs px-2.5 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        <i className='fa fa-download me-1'></i>
                        Certificado
                      </a>
                    </div>
                  }
                </div>
              </a>
            })
          }
        </div>
      </div>
    </div>
  );
};

export default DashboardEstudianteBlock;
