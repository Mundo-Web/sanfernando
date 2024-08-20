import React from 'react';

const CursosEstudianteBlock = ({ finished, courses }) => {
    return (
        <div className="flex flex-wrap items-center gap-4 mt-5 w-full max-md:max-w-full">

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
                                completed && <>
                                    <span class="w-max block mt-2 bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Completado</span>
                                </>
                            }
                        </div>
                    </a>
                })
            }
        </div>
    );
};

export default CursosEstudianteBlock;
