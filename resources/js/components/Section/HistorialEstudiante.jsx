import React, { useState } from 'react';

const HistorialEstudiante = () => {

    const [isOpen, setIsOpen] = useState(false);

    const toggleContent = () => {
        setIsOpen(!isOpen);
    };

return (

<div class="flex flex-col">
    <div
        class="flex flex-wrap gap-10 justify-between items-center p-6 w-full bg-white border-b border-solid border-b-red-100 max-md:px-5 max-md:max-w-full"
        onClick={toggleContent}>
        <div class="flex flex-col self-stretch my-auto min-w-[240px]">
            <time datetime="2024-04-01T11:30:00" class="text-lg tracking-tight leading-none text-neutral-800">
                1 Abril, 2024 - 11:30 AM
            </time>
            <div class="flex gap-4 items-start mt-3 text-sm tracking-normal leading-loose text-gray-600">
                <div class="flex gap-1.5 items-center">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/2071f385233415c62d178f92a37624fd99a448535c4319675b40dde235489979?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                    <span class="self-stretch my-auto">1 curso</span>
                </div>
                <div class="flex gap-1.5 items-center">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/f49a26d2d84c5172a3a54bdff056004adcfdd9d626c1ebeb360733e25833c2a4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                    <span class="self-stretch my-auto">80.00 PEN</span>
                </div>
                <div class="flex gap-1.5 items-center">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/54cc33ba0bb9adce2cd62a8d341522a4660734c8751ee4528916a6d8588d0dea?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                    <span class="self-stretch my-auto">Tarjeta crédito ...0987</span>
                </div>
            </div>
        </div>
        <button class="flex gap-4 items-center self-stretch p-3 my-auto w-12 h-12 bg-red-100 rounded-lg"
            aria-label="Action button">
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/9eaa2ec66d0e4eb050f0e64a2b70c2020aba8eac19c2414ea2147f73e54816b7?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                alt="" class="object-contain w-6 aspect-square" />
        </button>
    </div>
    {isOpen && (
    <div class="animate-flip-down flex flex-col w-full border border-red-100 border-solid max-md:max-w-full">
        <div
            class="flex flex-wrap gap-10 justify-between items-center px-6 pt-6 pb-4 w-full bg-white max-md:px-5 max-md:max-w-full">
            <div class="flex flex-col self-stretch my-auto min-w-[240px]">
                <time datetime="2024-04-01T11:30:00"
                    class="text-lg font-medium tracking-tight leading-none text-rose-700">
                    1 Abril, 2024 - 11:30 AM
                </time>
                <div class="flex gap-4 items-start mt-3 text-sm tracking-normal leading-loose text-gray-600">
                    <div class="flex gap-1.5 items-center">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/338e830eec014330ce2a92be373e18dacb23bde78a6e898be522e28771877bcc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                        <span class="self-stretch my-auto">2 curso</span>
                    </div>
                    <div class="flex gap-1.5 items-center">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/f49a26d2d84c5172a3a54bdff056004adcfdd9d626c1ebeb360733e25833c2a4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                        <span class="self-stretch my-auto">160.00 PEN</span>
                    </div>
                    <div class="flex gap-1.5 items-center">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/54cc33ba0bb9adce2cd62a8d341522a4660734c8751ee4528916a6d8588d0dea?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                        <span class="self-stretch my-auto">Tarjeta crédito ...0987</span>
                    </div>
                </div>
            </div>
            <button class="flex gap-4 items-center self-stretch p-3 my-auto w-12 h-12 bg-rose-700 rounded-lg"
                aria-label="Action button">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/e9ace913622ef221e52438aba24fc54397fdaf07ae1e8fb8dd6afc959b93b3bc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    alt="" class="object-contain w-6 aspect-square" />
            </button>
        </div>
        <div class="flex flex-wrap gap-6 px-6 w-full bg-white max-md:px-5 max-md:max-w-full">
            <section class="flex flex-col py-6 my-auto min-w-[240px] w-[594px] max-md:max-w-full">
                <div class="flex flex-wrap gap-10 justify-center items-center w-full max-md:max-w-full">
                    <div class="flex gap-5 items-start self-stretch my-auto min-w-[240px] max-md:max-w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b0556e24780343c2a1173ea743cde6de59d9f9367cb48db1cd9806113a3c1d07?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            alt="Course thumbnail" class="object-contain shrink-0 aspect-square w-[120px]" />
                        <div class="flex flex-col justify-between min-h-[119px] min-w-[240px] w-[312px]">
                            <div class="flex flex-col w-full max-w-[312px]">
                                <div
                                    class="flex gap-1.5 justify-center items-center self-start text-sm tracking-normal">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb0a665c6aa4e8a830536cc611f92fc27dd3f8c32e1401d428f0aae05a12fd01?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        alt=""
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="flex items-center self-stretch my-auto">
                                        <span
                                            class="self-stretch my-auto font-medium leading-none text-gray-600">4.6</span>
                                        <span class="self-stretch my-auto leading-loose text-red-300">(451,444
                                            Reseñas)</span>
                                    </div>
                                </div>
                                <h3 class="mt-2 text-base font-medium leading-6 text-neutral-800">Aliquam venenatis
                                    dolor at diam tempus condimentum</h3>
                            </div>
                            <p class="flex gap-1.5 items-start self-start mt-6 text-sm tracking-normal leading-loose">
                                <span class="text-red-300">Curso impartido por:</span>
                                <span class="text-gray-600">Ademir Neyra</span>
                            </p>
                        </div>
                    </div>
                    <p class="self-stretch my-auto text-xl font-medium leading-tight text-rose-700">13.99 PEN</p>
                </div>
                <div class="flex flex-wrap gap-10 justify-center items-center mt-8 w-full max-md:max-w-full">
                    <div class="flex gap-5 items-start self-stretch my-auto min-w-[240px] max-md:max-w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b0556e24780343c2a1173ea743cde6de59d9f9367cb48db1cd9806113a3c1d07?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            alt="Course thumbnail" class="object-contain shrink-0 aspect-square w-[120px]" />
                        <div class="flex flex-col justify-between min-h-[119px] min-w-[240px] w-[312px]">
                            <div class="flex flex-col w-full max-w-[312px]">
                                <div
                                    class="flex gap-1.5 justify-center items-center self-start text-sm tracking-normal">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb0a665c6aa4e8a830536cc611f92fc27dd3f8c32e1401d428f0aae05a12fd01?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        alt=""
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="flex items-center self-stretch my-auto">
                                        <span
                                            class="self-stretch my-auto font-medium leading-none text-gray-600">4.6</span>
                                        <span class="self-stretch my-auto leading-loose text-red-300">(451,444
                                            Reseñas)</span>
                                    </div>
                                </div>
                                <h3 class="mt-2 text-base font-medium leading-6 text-neutral-800">Aliquam venenatis
                                    dolor at diam tempus condimentum</h3>
                            </div>
                            <p class="flex gap-1.5 items-start self-start mt-6 text-sm tracking-normal leading-loose">
                                <span class="text-red-300">Curso impartido por:</span>
                                <span class="text-gray-600">Ademir Neyra</span>
                            </p>
                        </div>
                    </div>
                    <p class="self-stretch my-auto text-xl font-medium leading-tight text-rose-700">13.99 PEN</p>
                </div>
            </section>
            <aside
                class="flex flex-col flex-1 shrink justify-center py-6 pl-6 bg-white border-l border-solid basis-0 border-l-slate-200 border-slate-200 min-w-[240px]">
                <div class="flex flex-col w-full">
                    <time datetime="2024-04-01T11:30:00"
                        class="text-2xl font-semibold tracking-tight leading-none text-neutral-800 max-md:max-w-full">
                        1 Abril, 2024 - 11:30 AM
                    </time>
                    <div
                        class="flex gap-4 items-start self-start mt-3 text-sm tracking-normal leading-loose text-gray-600">
                        <div class="flex gap-1.5 items-center">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/eb24fb05b564fc8d4a983b40c709b0e2fd61b801810abcce3adfcd405ec168d0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                alt=""
                                class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                            <span class="self-stretch my-auto">1 curso</span>
                        </div>
                        <div class="flex gap-1.5 items-center">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/e7fad8930bee02fc06ed47048e2cb4a071c35c0fb568a8bdd257b2a73b9c23b1?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                alt=""
                                class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                            <span class="self-stretch my-auto">80.00 PEN</span>
                        </div>
                        <div class="flex gap-1.5 items-center">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/1b870df7b95d6f409f107aecde1d9588db8314e87d51a409fbd7a4cc09c55706?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                alt=""
                                class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                            <span class="self-stretch my-auto">Tarjeta crédito ...0987</span>
                        </div>
                    </div>
                </div>
                <div
                    class="flex justify-between items-center mt-6 w-full text-sm tracking-normal leading-loose text-gray-600">
                    <span class="self-stretch my-auto w-[120px]">Carlos Soria</span>
                    <span class="self-stretch my-auto text-lg tracking-tight leading-none text-center w-[238px]">****
                        **** **** 0987</span>
                    <span class="self-stretch my-auto w-20 text-right">04/24</span>
                </div>
            </aside>
        </div>
    </div>
     )}
</div>
);
};

export default HistorialEstudiante;
