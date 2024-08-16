import React from 'react';

const HeaderTeacher = ({ selectedOption }) => {
return (
<div
    className="flex flex-wrap gap-5 justify-between items-center px-[5%] py-6 bg-rose-50  font-poppins_regular">
    <div className="flex flex-col self-stretch my-auto min-w-[240px] text-neutral-800 w-[312px]">
        <div className="text-sm font-medium tracking-normal leading-none">Buenos días</div>
        <div className="mt-1.5 text-xl font-semibold leading-tight">{selectedOption}</div>
    </div>
    <div className="flex gap-2 items-start self-stretch my-auto min-w-[240px] max-md:max-w-full">
        <div
            className="order-2 flex overflow-hidden flex-col justify-center items-start px-5 py-2.5 text-base whitespace-nowrap bg-white rounded-lg min-w-[240px] text-slate-700 w-[312px] max-md:pr-5">
            <div className="flex gap-3 items-center">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/e554c55cc5dfa4299d96671a0df8b7fc1e792427fb529aa51d5e0227c6522a71?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                <div className="self-stretch my-auto">Buscar</div>
            </div>
        </div>
        <div className="flex  items-center px-2 w-11 h-11 bg-red-100 rounded-lg order-3">
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/17841a3746a6f4941572006eb5a02f33131cc77a6f7e1abb94a2dee90db98e5c?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                className="object-contain w-6 aspect-square" />
        </div>
        <img loading="lazy"
            srcSet="https://cdn.builder.io/api/v1/image/assets/TEMP/2181171fb7f4f9f99558718ec2e31ed8dccf22d0d7e0dcdfc020d7612147913e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/2181171fb7f4f9f99558718ec2e31ed8dccf22d0d7e0dcdfc020d7612147913e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/2181171fb7f4f9f99558718ec2e31ed8dccf22d0d7e0dcdfc020d7612147913e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/2181171fb7f4f9f99558718ec2e31ed8dccf22d0d7e0dcdfc020d7612147913e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/2181171fb7f4f9f99558718ec2e31ed8dccf22d0d7e0dcdfc020d7612147913e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/2181171fb7f4f9f99558718ec2e31ed8dccf22d0d7e0dcdfc020d7612147913e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/2181171fb7f4f9f99558718ec2e31ed8dccf22d0d7e0dcdfc020d7612147913e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/2181171fb7f4f9f99558718ec2e31ed8dccf22d0d7e0dcdfc020d7612147913e"
            className="object-contain shrink-0 w-11 rounded-full aspect-square order-1" />
    </div>
</div>
);
};

export default HeaderTeacher;
