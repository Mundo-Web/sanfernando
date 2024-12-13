import React from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import SliderTestimony from './components/Section/SliderTestimony'
import HtmlContent from './Utils/HtmlContent'


const Nosotros = ({ testimonies, aboutUs }) => {

  const imgnosotros = 'images/img/nosotros.png';
  const imgprofesores = 'images/img/profesores.png';
  const imggaleria = 'images/img/galeria.png';

  const data = {}
  aboutUs.forEach(x => {
    data[x.titulo] = x.descripcion
  })

  return (<>

    <section>
      <div className="flex w-full bg-[#FFF0F0] h-10 lg:h-20 max-md:max-w-full" role="banner"></div>
      <div className="grid grid-cols-1 lg:grid-cols-2 w-full gap-12 px-[8%] py-12 xl:py-16">
        <div className="flex flex-col justify-center gap-5 text-textWhite ">
          <h2 className="text-[#CF072C] font-poppins_regular font-semibold text-5xl"><HtmlContent html={data['INICIO-FIN']}/></h2>
          <h1
            className="text-[#1D2026] font-poppins_bold font-semibold tracking-tighter text-3xl md:text-5xl leading-none md:leading-tight">
            <HtmlContent html={data['TITULO-OBJETIVO']} />
          </h1>
          <p className="text-[#4E5566] text-base font-poppins_regular">
            <HtmlContent html={data['DESCRIPCION-OBJETIVO']} />
          </p>
        </div>

        <div className="flex flex-col justify-center items-center">
          <img src={`${imgnosotros}`} className="object-contain h-[300px] md:h-[500px] w-full" />
        </div>
      </div>
    </section>

    <section>
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10  items-center px-[8%] pb-12 xl:py-16 font-poppins_regular">
        <div className="flex flex-1 shrink gap-2 items-start self-stretch my-auto whitespace-nowrap basis-0 min-w-[240px]">
          <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/fba3d5fc5abda0d6779776d1b78e9a26ac067ca30ed18e4dd0c84944ae423d01?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
            className="object-contain shrink-0 w-10 aspect-square" />
          <div className="flex flex-col flex-1 shrink basis-0 gap-2">
            <div className="text-3xl font-semibold tracking-tight leading-none text-neutral-800">
              {data.ESTUDIANTES}
            </div>
            <div className="text-sm font-medium tracking-normal leading-none text-gray-600">
              Estudiantes
            </div>
          </div>
        </div>
        <div className="flex flex-1 shrink gap-2 items-start self-stretch my-auto basis-0 min-w-[240px]">
          <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b76c058bc5e411181a3504937c6befe2970e47cb2d2bf03c67f5e8690569b829?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
            className="object-contain shrink-0 w-10 aspect-square" />
          <div className="flex flex-col flex-1 shrink basis-0 gap-2">
            <div className="text-3xl font-semibold tracking-tight leading-none text-neutral-800">
              {data.INSTRUCTORES}
            </div>
            <div className="text-sm font-medium tracking-normal leading-none text-gray-600">
              Instructores certificados
            </div>
          </div>
        </div>
        <div className="flex flex-1 shrink gap-2 items-start self-stretch my-auto basis-0 min-w-[240px]">
          <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/ff385a55be1442cf102253215de846217f419f1ed499dff863a5776147600c84?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
            className="object-contain shrink-0 w-10 aspect-square" />
          <div className="flex flex-col flex-1 shrink basis-0 gap-2">
            <div className="text-3xl font-semibold tracking-tight leading-none text-neutral-800">
              {data['TASA-EXITO']}
            </div>
            <div className="text-sm font-medium tracking-normal leading-none text-gray-600">
              Tasa de éxito
            </div>
          </div>
        </div>
        <div className="flex flex-1 shrink gap-2 items-start self-stretch my-auto basis-0 min-w-[240px]">
          <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/cd3dbc07e1007500fc5e4ed7d3cc80f27b0aafde8f8536612e1b078089c91622?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
            className="object-contain shrink-0 w-10 aspect-square" />
          <div className="flex flex-col flex-1 shrink basis-0 gap-2">
            <div className="text-3xl font-semibold tracking-tight leading-none text-neutral-800">
              {data.EMPRESAS}
            </div>
            <div className="text-sm font-medium tracking-normal leading-none text-gray-600">
              Empresas de confianza
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div className="grid grid-cols-1 lg:grid-cols-2 w-full gap-2 md:gap-12 px-[8%] pt-12 xl:pt-16 bg-[#FFDDDE]">
        <div className="flex flex-col justify-end items-end order-2 lg:order-1">
          <img src={`${imgprofesores}`}
            className="object-contain object-bottom h-[200px] md:h-[400px] w-full" />
        </div>
        <div className="flex flex-col justify-center gap-5 items-start order-1 lg:order-2">
          <h2 className="text-[#CF072C] font-poppins_regular font-semibold text-lg">Nuestra misión</h2>
          <h1
            className="text-[#1D2026] font-poppins_bold font-semibold tracking-tighter text-3xl xl:text-5xl leading-none md:leading-tight">
              <HtmlContent html={data['TITULO-MISION']}/>
          </h1>
          <p className="text-[#4E5566] text-base font-poppins_regular">
            <HtmlContent html={data['DESCRIPCION-MISION']}/>
          </p>
        </div>
      </div>
    </section>

    <section>
      <div className="grid grid-cols-1 lg:grid-cols-3 w-full gap-12 px-[8%] py-12 xl:py-16">
        <div className="flex flex-col justify-center gap-5 text-textWhite col-span-1">
          <h2 className="text-[#CF072C] font-poppins_regular font-semibold text-lg">Galeria</h2>
          <h1
            className="text-[#1D2026] font-poppins_bold font-semibold tracking-tighter text-3xl md:text-5xl leading-none md:leading-tight">
            <HtmlContent html={data['TITULO-GALERIA']} />
          </h1>
          <p className="text-[#4E5566] text-base font-poppins_regular">
            <HtmlContent html={data['DESCRIPCION-GALERIA']} />
          </p>
          <div className="flex flex-row gap-5 font-poppins_semibold ">
            <a
              className="bg-[#CF072C] text-white px-5 py-3 rounded-2xl text-base border-2 flex gap-2 border-[#CF072C] flex-row items-center ">
              Ver más
              <i className="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div className="flex flex-col justify-center items-center col-span-2">
          <img src={`${imggaleria}`}
            className="object-contain h-[300px] md:h-[500px] w-full" />
        </div>
      </div>
    </section>

    <section className="px-[8%] pb-12 lg:pb-16">
      <SliderTestimony testimonies={testimonies} />
    </section>



  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(
    <Nosotros {...properties} />);
})
