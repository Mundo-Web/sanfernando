import React from 'react';

const FormEstudiante = () => {
return (
<section class="flex flex-col self-stretch p-10 bg-white rounded-lg border border-solid border-slate-200 max-md:px-5 mt-6">
    <h2 class="text-2xl font-semibold tracking-tight leading-none text-neutral-800 max-md:max-w-full">Configuraciones de
        la cuenta</h2>
    <div class="flex flex-col mt-6 w-full max-md:max-w-full">
        <div class="flex flex-wrap gap-6 items-start w-full max-md:max-w-full">
            <div class="flex flex-col min-w-[240px] w-[264px]">
                <div
                    class="flex flex-col justify-center items-center p-8 max-w-full bg-rose-50 rounded w-[264px] max-md:px-5">
                    <div class="flex flex-col w-full text-sm font-medium tracking-normal leading-none text-white">
                        <div class="flex relative flex-col w-full aspect-square">
                            <div class="flex relative flex-col w-full aspect-square">
                                <div class="flex relative flex-col  w-full aspect-square max-md:pt-24">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/92579875217dbd5f58ad928f467dd387c80f713e10023295cfb12215ae604fdf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-cover absolute inset-0 size-full" alt="Profile picture" />
                                    <div
                                        class="flex relative gap-2 justify-center items-end p-3 bg-black bg-opacity-50">

                                        <label for="file-upload" class="self-stretch my-auto cursor-pointer">Subir foto
                                            <input className='hidden' id="file-upload" type='file' /></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-xs leading-4 text-center text-gray-600">El tamaño de la imagen debe ser inferior
                        a 1 MB y la relación de imagen debe ser 1:1.</p>
                </div>
                
            </div>
            <div class="flex flex-col flex-1 shrink text-gray-600 basis-0 min-w-[240px] max-md:max-w-full">
                <form class="flex flex-col w-full max-md:max-w-full">
                    <div class="flex flex-wrap gap-5 justify-center items-end w-full max-md:max-w-full">
                        <div class="flex overflow-hidden flex-col flex-1 shrink basis-9 min-h-[76px] min-w-[240px]">
                            <label for="fullName" class="text-sm tracking-normal leading-loose">Nombre completo</label>
                            <input type="text" id="fullName"
                                class="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                placeholder="Nombre" />
                        </div>
                        <input type="text" aria-label="Apellido"
                            class="overflow-hidden flex-1 shrink w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                            placeholder="Apellido" />
                    </div>
                    <div class="flex overflow-hidden flex-col mt-5 w-full min-h-[76px] max-md:max-w-full">
                        <label for="username" class="text-sm tracking-normal leading-loose">Nombre de usuario</label>
                        <input type="text" id="username"
                            class="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                            placeholder="Nombre de usuario" />
                    </div>
                    <div
                        class="flex overflow-hidden flex-col mt-5 w-full whitespace-nowrap min-h-[76px] max-md:max-w-full">
                        <label for="email" class="text-sm tracking-normal leading-loose">Email</label>
                        <input type="email" id="email"
                            class="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                            placeholder="hola@mail.com" />
                    </div>
                    <div
                        class="flex overflow-hidden flex-col mt-5 w-full whitespace-nowrap min-h-[76px] max-md:max-w-full">
                        <label for="occupation" class="text-sm tracking-normal leading-loose">Ocupación</label>
                        <input type="text" id="occupation"
                            class="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                            placeholder="Estudiante" />
                    </div>
                    <button
                    class="gap-2.5 self-stretch px-5 py-2.5 mt-6 w-full text-sm font-semibold text-center text-teal-50 bg-rose-700 rounded-lg min-h-[40px]">Salvar
                    cambios</button>
                </form>
            </div>
        </div>
    </div>

    <div
        class="flex flex-col self-stretch font-semibold bg-white rounded-lg lg:border p-0 lg:p-8 lg:border-red-100 lg:border-solid mt-6">
        <h2 class="text-2xl tracking-tight leading-none text-neutral-800 max-md:max-w-full">Cambiar la contraseña</h2>
        <form class="flex flex-col mt-6 w-full max-md:max-w-full">
            <div class="flex overflow-hidden flex-col w-full max-md:max-w-full">
                <label for="current-password" class="text-sm tracking-normal leading-loose text-slate-600">Contraseña
                    actual</label>
                <div
                    class="flex overflow-hidden flex-wrap flex-1  justify-center  mt-1.5 text-base text-gray-600 whitespace-nowrap bg-white rounded-lg border-solid size-full max-md:max-w-full">
                    <input type="password" id="current-password" placeholder="Contraseña"
                        class="flex-grow py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
                </div>
            </div>
            <div class="flex overflow-hidden flex-col mt-5 w-full  max-md:max-w-full">
                <label for="new-password" class="text-sm tracking-normal leading-loose text-slate-600">Nueva
                    contraseña</label>
                <div
                    class="flex overflow-hidden flex-wrap flex-1  justify-center  mt-1.5 text-base text-gray-600 whitespace-nowrap bg-white rounded-lg border-solid size-full max-md:max-w-full">
                    <input type="password" id="new-password" placeholder="Contraseña"
                        class="flex-grow py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
                </div>
            </div>
            <div class="flex overflow-hidden flex-col mt-5 w-full  max-md:max-w-full">
                <label for="confirm-password" class="text-sm tracking-normal leading-loose text-slate-600">Confirmar
                    Contraseña</label>
                <div
                    class="flex overflow-hidden flex-wrap flex-1  justify-center  mt-1.5 text-base text-gray-600 whitespace-nowrap bg-white rounded-lg border-solid size-full max-md:max-w-full">
                    <input type="password" id="confirm-password" placeholder="Confirmar Contraseña"
                        class="flex-grow py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
                </div>
            </div>
            <button type="submit"
                class="gap-2.5 self-start px-5 py-2.5 mt-6 text-sm text-center text-teal-50 bg-rose-700 rounded-lg min-h-[40px]">
                Salvar cambios
            </button>
        </form>
    </div>

</section>
);
};

export default FormEstudiante;
