import React, { useState } from 'react';

const DropdownComponent = ({ tema }) => {
    const [isOpen, setIsOpen] = useState(false);

    const toggleContent = () => {
        setIsOpen(!isOpen);
    };

    return (
        <div className="encabezado flex flex-col p-5 w-full rounded-2xl border border-red-200 border-solid max-md:max-w-full cursor-pointer">
            <div className="flex flex-wrap gap-6 items-start w-full max-md:max-w-full" onClick={toggleContent}>
                <div className="flex flex-1 shrink gap-2 items-start text-base font-medium leading-6 basis-0 min-w-[240px] text-neutral-800">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/b99f6f1e6d27e66f09ea0f6250e810c5af4cda76cae97bf7801630a3d13ff88c?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        className={`object-contain shrink-0 w-5 aspect-square arrowvertical transition-transform duration-300 ${isOpen ? 'rotate-180' : ''}`} />
                    <div className="flex-1 shrink basis-0">
                        {tema.desc}
                    </div>
                </div>
                <div className="flex gap-4 items-start text-sm tracking-normal leading-loose text-gray-600">
                    <div className="flex gap-1.5 items-center">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/023d6aa6e4775bb71fca3d2a8e5c44ea433e19ced445762a9b117860305957fb?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                        <div className="self-stretch my-auto">{tema.recurso} RECURSOS</div>
                    </div>
                    <div className="flex gap-1.5 items-center whitespace-nowrap">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/f07d0a554c69ac7c4aed36c3e73dc4a8b92c6e3bd55bb81a1fe2f7634a0e5ba0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                        <div className="self-stretch my-auto">{tema.tiempo}m</div>
                    </div>
                </div>
            </div>
            {isOpen && (
                <div className="animate-flip-down contenido  flex flex-col justify-center pb-4 pt-6 w-full text-sm tracking-normal text-gray-600 max-md:max-w-full gap-3">
                    <div className="flex flex-wrap justify-between items-start w-full max-md:max-w-full ">
                        <div className="flex flex-wrap flex-1 shrink gap-2 items-start basis-0 min-w-[240px] max-md:max-w-full">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/b7a35fbda34504704c44102995d0f740beb1c7d9e00000a09c26b1226a182c21?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                className="object-contain shrink-0 w-4 aspect-square mt-1" />
                            <div className="flex-1 shrink basis-0 max-md:max-w-full leading-6">
                                <h2>Marco Normativo del Sistema Nacional de Control y el ejercicio de control gubernamental.</h2>
                            </div>
                        </div>
                        <div className="leading-loose">07:31</div>
                    </div>
                    <div className="flex flex-wrap justify-between items-start w-full max-md:max-w-full">
                        <div className="flex flex-wrap flex-1 shrink gap-2 items-start basis-0 min-w-[240px] max-md:max-w-full">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/b7a35fbda34504704c44102995d0f740beb1c7d9e00000a09c26b1226a182c21?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                className="object-contain shrink-0 w-4 aspect-square mt-1" />
                            <div className="flex-1 shrink basis-0 max-md:max-w-full leading-6">
                                <h2>Marco Normativo del Sistema Nacional de Control y el ejercicio de control gubernamental.</h2>
                            </div>
                        </div>
                        <div className="leading-loose">07:31</div>
                    </div>
                    <div className="flex flex-wrap justify-between items-start w-full max-md:max-w-full">
                        <div className="flex flex-wrap flex-1 shrink gap-2 items-start basis-0 min-w-[240px] max-md:max-w-full">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/b7a35fbda34504704c44102995d0f740beb1c7d9e00000a09c26b1226a182c21?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                className="object-contain shrink-0 w-4 aspect-square mt-1" />
                            <div className="flex-1 shrink basis-0 max-md:max-w-full leading-6">
                                <h2>Marco Normativo del Sistema Nacional de Control y el ejercicio de control gubernamental.</h2>
                            </div>
                        </div>
                        <div className="leading-loose">07:31</div>
                    </div>
                    <div class="flex flex-wrap gap-10 justify-between items-center w-full leading-loose max-md:max-w-full">
                        <div class="flex gap-2 items-center self-stretch my-auto">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/0d1964115afa9d30cb0d63ff8aae9573f8607e213ed3e511568f4f93827f6c08?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-4 aspect-square" />
                            <div class="self-stretch my-auto">Examen final del bloque</div>
                        </div>
                        <div class="self-stretch my-auto">5.3 MB</div>
                    </div>
                </div>
            )}
        </div>
    );
};

export default DropdownComponent;
