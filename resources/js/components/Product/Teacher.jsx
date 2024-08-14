import React from 'react';

const Teacher = () => {
const imgcurso = 'images/img/imagencurso.png';
const imgcalendario = 'images/svg/gp_calendario.svg';
const imgreloj = 'images/svg/gp_reloj.svg';

return (
<div className="flex flex-col max-w-[336px]">
    <img loading="lazy"
        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/b45bddd2a045002c1152c485d228e082d5e54b7cdf7a243944983dec7c46d1b4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/b45bddd2a045002c1152c485d228e082d5e54b7cdf7a243944983dec7c46d1b4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/b45bddd2a045002c1152c485d228e082d5e54b7cdf7a243944983dec7c46d1b4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/b45bddd2a045002c1152c485d228e082d5e54b7cdf7a243944983dec7c46d1b4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/b45bddd2a045002c1152c485d228e082d5e54b7cdf7a243944983dec7c46d1b4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/b45bddd2a045002c1152c485d228e082d5e54b7cdf7a243944983dec7c46d1b4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/b45bddd2a045002c1152c485d228e082d5e54b7cdf7a243944983dec7c46d1b4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/b45bddd2a045002c1152c485d228e082d5e54b7cdf7a243944983dec7c46d1b4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
        className="object-contain w-full shadow-sm aspect-[1.08]" />
    <div className="flex flex-col mt-4 w-full">
        <div className="flex flex-col w-full">
            <div className="flex gap-10 justify-between items-center w-full font-medium whitespace-nowrap">
                <div
                    className="flex gap-1.5 items-center self-stretch my-auto text-sm tracking-normal leading-none text-gray-600">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb0a665c6aa4e8a830536cc611f92fc27dd3f8c32e1401d428f0aae05a12fd01?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                    <div className="self-stretch my-auto">4.8</div>
                </div>
                <div className="flex gap-1 justify-center items-center self-stretch my-auto">
                    <div className="self-stretch my-auto text-sm tracking-normal leading-none text-neutral-800">
                        2000
                    </div>
                    <div className="self-stretch my-auto text-xs tracking-normal leading-6 text-red-400">
                        Estudiantes
                    </div>
                </div>
            </div>
            <div className="flex flex-col mt-4 w-full">
                <div className="text-xl font-bold leading-tight text-neutral-800">
                    Dra. Patricia Heredia Olivera
                </div>
                <div className="mt-1.5 text-xs font-medium tracking-normal leading-6 text-gray-600">
                    Economista especialista, con amplia experiencia en el sector público y
                    privado. Magíster en Gestión Pública (ESAN).
                </div>
            </div>
        </div>
        <div
            className="flex gap-2.5 justify-center items-center px-5 py-2.5 mt-6 w-full text-sm font-bold text-center text-red-600 bg-red-100 rounded-lg min-h-[40px]">
            <div className="self-stretch my-auto">Perfil del decente</div>
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/75bad0eb80e4c8fa820b5a280da9560ca64547065469b69cd2c648442bf9f1c3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
        </div>
    </div>
</div>
);
};



export default Teacher;
