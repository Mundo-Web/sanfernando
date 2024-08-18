import React from 'react';

const FavoritosEstudiante = () => {
return (
    
    <div class="flex flex-col !font-poppins_regular mt-10">
        <div
            class="hidden lg:flex flex-wrap gap-10 justify-between items-center w-full text-sm font-medium leading-none uppercase text-neutral-800 max-md:max-w-full">
            <h2 class="self-stretch my-auto w-[496px] max-md:max-w-full">Curso o diplomado</h2>
            <p class="self-stretch my-auto w-[130px]">Precio</p>
            <p class="self-stretch my-auto w-[356px]">Acción</p>
        </div>
        <article class="flex flex-wrap gap-10 justify-between items-center mt-6 w-full max-md:max-w-full">
            <div class="flex flex-wrap gap-5 items-start self-stretch my-auto min-w-[240px] max-md:max-w-full">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/e08cf944d7daa093c1f813c47f4b77e0b031f6b994836f642f744eac516c104c?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    class="object-contain shrink-0 rounded-lg aspect-square w-[120px]" alt="Course thumbnail" />
                <div class="flex flex-col justify-between min-h-[119px] min-w-[240px] w-[356px]">
                    <div class="flex flex-col w-full max-w-[356px]">
                        <div class="flex gap-1.5 justify-center items-center self-start text-sm tracking-normal">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb0a665c6aa4e8a830536cc611f92fc27dd3f8c32e1401d428f0aae05a12fd01?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square"
                                alt="Rating star icon" />
                            <div class="flex items-center self-stretch my-auto">
                                <p class="self-stretch my-auto font-medium leading-none text-gray-600">4.6</p>
                                <p class="self-stretch my-auto leading-loose text-red-300">(451,444 Reseñas)</p>
                            </div>
                        </div>
                        <h3 class="mt-2 text-base font-medium leading-6 text-neutral-800">The Ultimate Drawing Course -
                            Beginner to Advanced</h3>
                    </div>
                    <p class="flex gap-1.5 items-start mt-6 text-sm tracking-normal leading-loose text-gray-600">
                        <span class="text-red-300">Curso impartido por:</span>
                        <span>Ademir Neyra</span>
                        <span class="text-gray-600">•</span>
                        <span>Carlos Soria</span>
                    </p>
                </div>
            </div>
            <div class="flex gap-1 items-center self-stretch my-auto whitespace-nowrap">
                <p class="self-stretch my-auto text-xl font-medium leading-tight text-neutral-800">$37.00</p>
                <p class="self-stretch my-auto text-lg tracking-tight leading-none text-red-300">$49.00</p>
            </div>
            <div class="flex gap-3 items-center self-stretch my-auto min-w-[240px] w-[352px]">
                <button
                    class="flex-1 shrink gap-2.5 self-stretch px-4 py-2.5 my-auto text-sm font-semibold text-center text-teal-50 bg-red-700 rounded-lg min-h-[40px]">Comprar
                    Ahora</button>
                <button
                    class="flex-1 shrink gap-2.5 self-stretch px-2.5 py-2.5 my-auto text-sm font-semibold text-center text-teal-50 bg-red-400 rounded-lg basis-3.5 min-h-[40px]">Agregar
                    al carrito</button>
                <button
                    class="flex gap-3.5 items-center justify-center self-stretch p-2.5 my-auto w-10 h-10 bg-red-100 rounded-lg"
                    aria-label="Add to favorites">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/1f813abc3108b9161f9ce8e79c24fe828196c8ce42c6d7c5c10b4fbdb73b6cd1?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        class="object-contain w-5 aspect-square" alt="Heart icon" />
                </button>
            </div>
        </article>
        <hr class="mt-6 w-full border border-solid bg-slate-200 border-slate-200 min-h-[1px] max-md:max-w-full" />
        <article class="flex flex-wrap gap-10 justify-between items-center mt-6 w-full max-md:max-w-full">
            <div class="flex flex-wrap gap-5 items-start self-stretch my-auto min-w-[240px] max-md:max-w-full">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/fc15935618d46b41cc196b2e80daccb4ea9beea60da7401ddde1ee14dd5dbaf4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    class="object-contain shrink-0 rounded-lg aspect-square w-[120px]" alt="Course thumbnail" />
                <div class="flex flex-col justify-between min-h-[119px] min-w-[240px] w-[356px]">
                    <div class="flex flex-col w-full max-w-[356px]">
                        <div class="flex gap-1.5 justify-center items-center self-start text-sm tracking-normal">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb0a665c6aa4e8a830536cc611f92fc27dd3f8c32e1401d428f0aae05a12fd01?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square"
                                alt="Rating star icon" />
                            <div class="flex items-center self-stretch my-auto">
                                <p class="self-stretch my-auto font-medium leading-none text-gray-600">4.6</p>
                                <p class="self-stretch my-auto leading-loose text-red-300">(451,444 Reseñas)</p>
                            </div>
                        </div>
                        <h3 class="mt-2 text-base font-medium leading-6 text-neutral-800">The Ultimate Drawing Course -
                            Beginner to Advanced</h3>
                    </div>
                    <p class="flex gap-1.5 items-start mt-6 text-sm tracking-normal leading-loose text-gray-600">
                        <span class="text-red-300">Curso impartido por:</span>
                        <span>Ademir Neyra</span>
                        <span class="text-gray-600">•</span>
                        <span>Carlos Soria</span>
                    </p>
                </div>
            </div>
            <div class="flex gap-1 items-center self-stretch my-auto whitespace-nowrap">
                <p class="self-stretch my-auto text-xl font-medium leading-tight text-neutral-800">$37.00</p>
                <p class="self-stretch my-auto text-lg tracking-tight leading-none text-red-300">$49.00</p>
            </div>
            <div class="flex gap-3 items-center self-stretch my-auto min-w-[240px] w-[352px]">
                <button
                    class="flex-1 shrink gap-2.5 self-stretch px-4 py-2.5 my-auto text-sm font-semibold text-center text-teal-50 bg-red-700 rounded-lg min-h-[40px]">Comprar
                    Ahora</button>
                <button
                    class="flex-1 shrink gap-2.5 self-stretch px-2.5 py-2.5 my-auto text-sm font-semibold text-center text-teal-50 bg-red-400 rounded-lg basis-3.5 min-h-[40px]">Agregar
                    al carrito</button>
                <button
                    class="flex gap-3.5 items-center justify-center self-stretch p-2.5 my-auto w-10 h-10 bg-red-100 rounded-lg"
                    aria-label="Add to favorites">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/1f813abc3108b9161f9ce8e79c24fe828196c8ce42c6d7c5c10b4fbdb73b6cd1?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        class="object-contain w-5 aspect-square" alt="Heart icon" />
                </button>
            </div>
        </article>
        <hr class="mt-6 w-full border border-solid bg-slate-200 border-slate-200 min-h-[1px] max-md:max-w-full" />
        <article class="flex flex-wrap gap-10 justify-between items-center mt-6 w-full max-md:max-w-full">
            <div class="flex flex-wrap gap-5 items-start self-stretch my-auto min-w-[240px] max-md:max-w-full">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/e08cf944d7daa093c1f813c47f4b77e0b031f6b994836f642f744eac516c104c?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    class="object-contain shrink-0 rounded-lg aspect-square w-[120px]" alt="Course thumbnail" />
                <div class="flex flex-col justify-between min-h-[119px] min-w-[240px] w-[356px]">
                    <div class="flex flex-col w-full max-w-[356px]">
                        <div class="flex gap-1.5 justify-center items-center self-start text-sm tracking-normal">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb0a665c6aa4e8a830536cc611f92fc27dd3f8c32e1401d428f0aae05a12fd01?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square"
                                alt="Rating star icon" />
                            <div class="flex items-center self-stretch my-auto">
                                <p class="self-stretch my-auto font-medium leading-none text-gray-600">4.6</p>
                                <p class="self-stretch my-auto leading-loose text-red-300">(451,444 Reseñas)</p>
                            </div>
                        </div>
                        <h3 class="mt-2 text-base font-medium leading-6 text-neutral-800">The Ultimate Drawing Course -
                            Beginner to Advanced</h3>
                    </div>
                    <p class="flex gap-1.5 items-start mt-6 text-sm tracking-normal leading-loose text-gray-600">
                        <span class="text-red-300">Curso impartido por:</span>
                        <span>Ademir Neyra</span>
                        <span class="text-gray-600">•</span>
                        <span>Carlos Soria</span>
                    </p>
                </div>
            </div>
            <div class="flex gap-1 items-center self-stretch my-auto whitespace-nowrap">
                <p class="self-stretch my-auto text-xl font-medium leading-tight text-neutral-800">$37.00</p>
                <p class="self-stretch my-auto text-lg tracking-tight leading-none text-red-300">$49.00</p>
            </div>
            <div class="flex gap-3 items-center self-stretch my-auto min-w-[240px] w-[352px]">
                <button
                    class="flex-1 shrink gap-2.5 self-stretch px-4 py-2.5 my-auto text-sm font-semibold text-center text-teal-50 bg-red-700 rounded-lg min-h-[40px]">Comprar
                    Ahora</button>
                <button
                    class="flex-1 shrink gap-2.5 self-stretch px-2.5 py-2.5 my-auto text-sm font-semibold text-center text-teal-50 bg-red-400 rounded-lg basis-3.5 min-h-[40px]">Agregar
                    al carrito</button>
                <button
                    class="flex gap-3.5 items-center justify-center self-stretch p-2.5 my-auto w-10 h-10 bg-red-100 rounded-lg"
                    aria-label="Add to favorites">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/1f813abc3108b9161f9ce8e79c24fe828196c8ce42c6d7c5c10b4fbdb73b6cd1?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        class="object-contain w-5 aspect-square" alt="Heart icon" />
                </button>
            </div>
        </article>
    </div>
);
};

export default FavoritosEstudiante;
