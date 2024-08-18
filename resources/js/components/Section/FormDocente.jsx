import React from 'react';

const FormDocente = ({ selectedOption }) => {
return (
<div>
    <div class="flex flex-col self-stretch p-10 bg-white rounded-lg border border-red-100 border-solid max-md:px-5">
        <div class="flex flex-col w-full max-md:max-w-full">
            <div class="flex flex-wrap gap-6 items-start w-full max-md:max-w-full">
                <div class="flex flex-col flex-1 shrink basis-16 min-w-[240px] max-md:max-w-full">
                    <div class="text-2xl font-semibold tracking-tight leading-none text-neutral-800 max-md:max-w-full">
                        Configuraciones de la cuenta
                    </div>
                    <div class="flex flex-col mt-6 w-full max-md:max-w-full text-sm font-poppins_regular">
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 justify-center items-end w-full text-gray-600 max-md:max-w-full">
                            <div>
                                <span for="name" class="text-[#4E5566] font-medium">Nombre Completo</span>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    placeholder="Nombre"
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                />
                            </div>
                            <div> 
                                <input
                                    type="text"
                                    name="email"
                                    id="email"
                                    placeholder="Apellido"
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                />
                            </div>
                        </div>

                        <div
                            class="flex overflow-hidden flex-col mt-5 w-full text-gray-600 min-h-[76px] max-md:max-w-full">
                            <span for="nameuser" class="text-[#4E5566] font-medium">Nombre de usuario</span>
                            <input
                                    type="text"
                                    name="nameuser"
                                    id="nameuser"
                                    placeholder="Nombre de usuario"
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                />
                        </div>

                        <div class="flex overflow-hidden flex-col mt-5 w-full min-h-[76px] max-md:max-w-full">
                            <span for="cellphone" class="text-[#4E5566] font-medium">Número de teléfono</span>
                            <input
                                    type="number"
                                    name="cellphone"
                                    id="cellphone"
                                    placeholder="+51 123456789"
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                />
                        </div>

                    </div>
                </div>
                <div class="flex flex-col justify-center items-center p-8 bg-rose-50 rounded min-w-[240px] w-[264px] max-md:px-5 font-poppins_regular">
                    <div class="flex flex-col max-w-full text-sm font-medium tracking-normal leading-none text-white w-[200px]">
                        <div class="flex relative flex-col pt-40 w-full aspect-square max-md:pt-24">
                            <img loading="lazy"
                                srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/7e9825a99652c9bce362f13a39b8ae559d5cbd8a9d0928efea66c19e4bfb24ab?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/7e9825a99652c9bce362f13a39b8ae559d5cbd8a9d0928efea66c19e4bfb24ab?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/7e9825a99652c9bce362f13a39b8ae559d5cbd8a9d0928efea66c19e4bfb24ab?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/7e9825a99652c9bce362f13a39b8ae559d5cbd8a9d0928efea66c19e4bfb24ab?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/7e9825a99652c9bce362f13a39b8ae559d5cbd8a9d0928efea66c19e4bfb24ab?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/7e9825a99652c9bce362f13a39b8ae559d5cbd8a9d0928efea66c19e4bfb24ab?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/7e9825a99652c9bce362f13a39b8ae559d5cbd8a9d0928efea66c19e4bfb24ab?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/7e9825a99652c9bce362f13a39b8ae559d5cbd8a9d0928efea66c19e4bfb24ab?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-cover absolute inset-0 size-full" />
                            <div class="flex relative gap-2 justify-center items-center p-3 bg-black bg-opacity-50">
                                <i class="fa-solid fa-upload"></i>
                                <div class="self-stretch my-auto font-semibold tracking-wider">Subir foto</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-xs leading-4 text-center text-gray-600">
                        El tamaño de la imagen debe ser inferior a 1 MB y la relación de
                        imagen debe ser 1:1.
                    </div>
                </div>
            </div>
            <div class="flex flex-col mt-5 w-full text-gray-600 max-md:max-w-full text-sm font-poppins_regular">
                <span for="grade" class="text-[#4E5566] font-medium">Ápice</span>
                    <input
                        type="text"
                        name="grade"
                        id="grade"
                        placeholder="Grado academico"
                        className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                    />        
            </div>
            <div class="flex flex-col mt-5 w-full text-gray-600 max-md:max-w-full">
            <span for="biografia" class="text-[#4E5566] font-medium">Biografia</span>
                    <textarea
                        type="text"
                        name="biografia"
                        id="biografia"
                        placeholder="Tu título, profesión o pequeña biografía"
                        className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                    />   
            </div>
        </div>
        <button
            class="gap-2.5 font-poppins_regular self-start px-5 py-2.5 mt-6 text-sm font-semibold text-center tracking-wide text-teal-50 bg-rose-700 rounded-lg min-h-[40px]">
            Salvar cambios
        </button>
    </div>
    <div class="mt-6 flex flex-col self-stretch p-10 bg-white rounded-lg border border-red-100 border-solid max-md:px-5 font-poppins_regular">
        <div class="text-2xl font-semibold tracking-tight leading-none text-neutral-800 max-md:max-w-full">
            Perfil social
        </div>
        <div class="flex flex-col mt-6 w-full max-md:max-w-full">
        <form className="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div className="flex overflow-hidden flex-col w-full text-gray-600 min-h-[76px] max-md:max-w-full">
                <label className="text-sm tracking-normal leading-loose">Website</label>
                <div className="flex overflow-hidden flex-col flex-1 justify-center items-start px-5 py-2 mt-1.5 w-full text-base bg-white rounded-lg border border-red-100 border-solid max-md:pr-5 max-md:max-w-full">
                    <div className="flex gap-3 justify-center items-center w-full">
                        <img 
                            loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/894159d1ae096774ad8d2042c3eb715c709649eaeef9e22ef1d5394e841404d3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" 
                            alt="Website icon"
                        />
                        <div className="shrink-0 self-stretch my-auto w-0 h-8 bg-gray-200 border border-gray-200 border-solid"></div>
                        <input 
                            type="text" 
                            placeholder="URL Portafolio" 
                            className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                        />
                    </div>
                </div>
            </div>

            {/* Facebook */}
            <div className="flex overflow-hidden flex-col flex-1 shrink basis-0 min-h-[76px] min-w-[240px]">
                <label className="text-sm tracking-normal leading-loose text-gray-600">Facebook</label>
                <div className="flex overflow-hidden flex-col flex-1 justify-center items-start px-5 py-2 mt-1.5 w-full bg-white rounded-lg border border-red-100 border-solid max-md:pr-5">
                    <div className="flex gap-3 justify-center items-center  w-full">
                        <img 
                            loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/e4fa902c127341a1a7a71aab30ca762f8ad6dc288a2a4a7e523d515de7f301ff?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            className="object-contain w-5 aspect-square" 
                            alt="Facebook icon"
                        />
                        <div className="shrink-0 self-stretch my-auto w-0 h-8 border border-solid bg-slate-200 border-slate-200"></div>
                        <input 
                            type="text" 
                            placeholder="Facebook" 
                            className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                        />
                    </div>
                </div>
            </div>

            {/* Instagram */}
            <div className="flex overflow-hidden flex-col flex-1 shrink basis-0 min-h-[76px] min-w-[240px]">
                <label className="text-sm tracking-normal leading-loose text-gray-600">Instagram</label>
                <div className="flex overflow-hidden flex-col flex-1 justify-center items-start px-5 py-2 mt-1.5 w-full bg-white rounded-lg border border-red-100 border-solid max-md:pr-5">
                    <div className="flex gap-3 justify-center items-center  w-full">
                        <img 
                            loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/1306480e00d2b1e33196edc6edce5f3485f4d78b41ff9f3a00d408f10a7f2c81?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            className="object-contain w-5 aspect-square" 
                            alt="Instagram icon"
                        />
                        <div className="shrink-0 self-stretch my-auto w-0 h-8 border border-solid bg-slate-200 border-slate-200"></div>
                        <input 
                            type="text" 
                            placeholder="Instagram" 
                            className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                        />
                    </div>
                </div>
            </div>

            {/* Linkedin */}
            <div className="flex overflow-hidden flex-col flex-1 shrink basis-0 min-h-[76px] min-w-[240px]">
                <label className="text-sm tracking-normal leading-loose text-gray-600">Linkedin</label>
                <div className="flex overflow-hidden flex-col flex-1 justify-center items-start px-5 py-2 mt-1.5 w-full bg-white rounded-lg border border-red-100 border-solid max-md:pr-5">
                    <div className="flex gap-3 justify-center items-center  w-full">
                        <img 
                            loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/6833047d014a5ca618f896d7035a6c280455a09b28ceed161aff9ec642b65e17?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            className="object-contain w-5 aspect-square" 
                            alt="Linkedin icon"
                        />
                        <div className="shrink-0 self-stretch my-auto w-0 h-8 border border-solid bg-slate-200 border-slate-200"></div>
                        <input 
                            type="text" 
                            placeholder="Linkedin" 
                            className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                        />
                    </div>
                </div>
            </div>
        </form>
        </div>
        <button
            class="gap-2.5 font-poppins_regular self-start px-5 py-2.5 mt-6 text-sm font-semibold text-center tracking-wide text-teal-50 bg-rose-700 rounded-lg min-h-[40px]">
            Salvar cambios
        </button>
    </div>
</div>
);
};

export default FormDocente;
