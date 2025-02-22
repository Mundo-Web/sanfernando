import React from 'react';
import HtmlContent from '../../Utils/HtmlContent';

const TwoColumn = ({ aboutUs }) => {
  const data = {}
  const img = {}
  aboutUs.forEach(x => {
    data[x.titulo] = x.descripcion
    img[x.titulo] = x.imagen
  })
  
  const imgnosotros = 'images/academia/bannerf.png';
  

  return (
    <div className="grid grid-cols-1 lg:grid-cols-2 w-full gap-12">
      <div className="flex flex-col justify-center gap-5">
        
        <h1
          className="text-[#252222] font-Montserrat_Bold tracking-tighter text-4xl md:text-5xl leading-none md:leading-tight">
          <HtmlContent html={data['TITULO-NOSOTROS']} />
        </h1>

        <p className="text-[#252222] text-base font-Montserrat_Regular">
          <HtmlContent html={data['DESCRIPCION-NOSOTROS']} />
        </p>

        <div className="flex flex-row gap-5 font-Montserrat_Regular bg-[#191023] text-center max-w-md text-white font-semibold p-6 rounded-2xl">
          <HtmlContent html={data['DESCRIPCIONSECOND-NOSOTROS']} />
        </div>
      </div>

      <div className="flex flex-col justify-center items-center">
        <img src={`${img['IMAGEN-NOSOTROS']}`} onError={e => e.target.src = 'images/academia/bannerf.png'}
          className="object-contain h-[300px] md:h-[500px] w-full" />
      </div>
    </div>
  );
};



export default TwoColumn;