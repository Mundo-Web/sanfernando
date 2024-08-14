import React from 'react';

const TwoColumn = () => {
    const imgnosotros = 'images/img/gp_nosotros.png';

    return (
        <div className="grid grid-cols-1 lg:grid-cols-2 w-full gap-12 px-[8%] py-12 xl:py-16">
        <div className="flex flex-col justify-center gap-5 text-textWhite ">
            <h2 className="text-[#CF072C] font-poppins_regular font-semibold text-lg">Sobre nosotros</h2>
            <h1
                className="text-[#1D2026] font-poppins_bold font-semibold tracking-tighter text-3xl md:text-5xl leading-none md:leading-tight">
                Donec at aliquam massa. Tincidunt, felis ut gravida fringilla
            </h1>
            <p className="text-[#4E5566] text-base font-poppins_regular">
                Nuestro objetivo es proporcionar formación de alta calidad a funcionarios y
                trabajadores del sector público, capacitándolos con los conocimientos necesarios
                para implementar acciones efectivas que contribuyan al desarrollo y mejora continua
                de las políticas públicas en el Perú. Nos comprometemos a ser líderes en educación
                y capacitación, impulsando la innovación y la ética en la gestión pública para generar
                un impacto positivo y duradero en nuestra sociedad."
            </p>
            <div className="flex flex-row gap-5 font-poppins_semibold">
                <a
                    className="bg-[#CF072C] text-white px-5 py-3 rounded-2xl text-base border-2 flex gap-2 border-[#CF072C] flex-row items-center ">
                    Ver más
                    <i className="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div className="flex flex-col justify-center items-center">
            <img src={`${imgnosotros}`} 
                className="object-contain h-[300px] md:h-[500px] w-full" />
        </div>
    </div>
);
};

                

export default TwoColumn;