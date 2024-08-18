import React from 'react';

const DashboardEstudianteBlock = () => {
return (
    <div className='mt-6'>
        <div className="flex flex-col mt-10 w-full max-md:max-w-full">
            <div className="text-2xl font-semibold tracking-tight leading-none text-neutral-800 max-md:max-w-full">
                Dashboard
            </div>
            <div className="flex flex-wrap gap-6 items-center mt-5 w-full max-md:max-w-full">
                <div
                    className="flex flex-1 shrink gap-6 items-center self-stretch p-6 my-auto basis-0 bg-[linear-gradient(180deg,rgba(240,242,245,0.00_0.02%,#F0F2F5_220.8%))] min-w-[240px] max-md:px-5">
                    <div className="flex gap-2.5 items-center self-stretch p-3.5 my-auto bg-white rounded h-[60px] w-[60px]">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b0f7472497a4044eb2bd91304ec3359095f27cfd0940661e3f5ef5996306ab3e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            className="object-contain w-8 aspect-square" />
                    </div>
                    <div className="flex flex-col justify-center self-stretch my-auto w-[180px]">
                        <div className="text-2xl leading-none text-neutral-800">6</div>
                        <div className="mt-1.5 text-sm tracking-normal leading-loose text-gray-600">
                            Cursos matriculados
                        </div>
                    </div>
                </div>
                <div
                    className="flex flex-1 shrink gap-6 items-center self-stretch p-6 my-auto basis-0 bg-[linear-gradient(180deg,rgba(240,242,245,0.00_0.02%,#F0F2F5_220.8%))] min-w-[240px] max-md:px-5">
                    <div
                        className="flex gap-2.5 items-center self-stretch p-3.5 my-auto bg-violet-100 rounded h-[60px] w-[60px]">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/778ea1841590d8bccf54013e3e56a334fd80e927e3d06abb6ca122a41b193898?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            className="object-contain w-8 aspect-square" />
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
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b714074a3f951eba1dd0ff76b8a6ac767b16e1fe46e082140ec4f16279564b03?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            className="object-contain w-8 aspect-square" />
                    </div>
                    <div className="flex flex-col justify-center self-stretch my-auto w-[180px]">
                        <div className="text-2xl font-medium leading-none text-neutral-800">
                            1
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
                    Empecemos a aprender, Kevin
                </div>
            </div>
            <div className="flex flex-wrap gap-4 items-start mt-5 w-full max-md:max-w-full">

                {'Aca van los cursos a los que ha ingresado'}
            </div>
        </div>
    </div>
);
};

export default DashboardEstudianteBlock;
