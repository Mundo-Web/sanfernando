import React, { useEffect, useRef, useState } from "react";
import { createRoot } from "react-dom/client";
import CreateReactScript from "./Utils/CreateReactScript";
import SelectSecond from "./components/Inputs/SelectSecond";
import axios from 'axios'
import FilterPagination from './components/Filter/FilterPagination'
import { Fetch } from 'sode-extend-react'
import Recurso from "./components/Product/Recurso";
import HtmlContent from './Utils/HtmlContent';

const Recursos = ({ recursos, documentoscat, aboutUs }) => {
    
    const imgcontacto = "images/academia/imagencontacto.png";
    
    const documentos = documentoscat.map(doc => ({
      value: doc.name, 
      label: doc.name
    }));

    documentos.push({ value: "todos", label: "Todos los documentos" });

    const data = {}
    aboutUs.forEach(x => {
        data[x.titulo] = x.descripcion
    })

    const options = [
      { value: 'a-z', label: 'Desde A a Z' },
      { value: 'z-a', label: 'Desde Z a A' },
      { value: 'ultimos', label: 'Ultimos' },
      { value: 'todos', label: 'Todas las opciones' },
    ]

    const [items, setItems] = useState([recursos]);

    const buscarProducto = async (event) => {

      setCurrentPage(1)
  
      query.current = { ...query.current, query: event.target.value }
      buscarProductoQuery()
  
    };

    const take = 9
    const [currentPage, setCurrentPage] = useState(1)
    const query = useRef({ query: '', order: '', tag: '',});
    const [totalCount, setTotalCount] = useState(0)
    
    useEffect(() => {
      buscarProductoQuery()
    }, [null])

    useEffect(() => {
      buscarProductoQuery()
    }, [currentPage])

    const buscarProductoQuery = async () => {
      let query2 = query.current;

      try {
          const response = await axios.post(
              `/buscarRecursos?query=${query2.query}&&order=${query2.order}&&tag=${query2.tag}`,
              {
                  skip: take * (currentPage - 1),
                  requireTotalCount: true,
                  take,
              }
          );
          const data = response.data;

          setItems(data.resultado);
          setTotalCount(data.totalCount ?? 0);
      } catch (error) {
          console.error("Error fetching search results:", error);
      }
  };

    const handleOptionChange = (event) => {
        query.current = { ...query.current, order: event.value };
        buscarProductoQuery();
    };

    const handleTagChange = (event) => {
      query.current = { ...query.current, tag: event.value };
      buscarProductoQuery();
  };

    return (
        <>
           
           <section className="flex flex-col !font-normal">
                <div className="flex flex-col justify-center items-center px-[8%] pt-10 xl:pt-16 w-full max-w-3xl text-center mx-auto gap-5">
                    <h1 className="text-4xl lg:text-5xl font-Montserrat_Bold font-bold">
                        <HtmlContent html={data['TITULO-RECURSOS']} />
                    </h1>

                    <p className="text-base font-Montserrat_Regular tracking-normal">
                        <HtmlContent html={data['DESCRIPTION-RECURSOS']} />
                    </p>

                    <div className="flex flex-wrap gap-2.5 items-center px-4 py-2 w-full bg-[#566574] bg-opacity-10 rounded-3xl max-md:max-w-full">
                      <label htmlFor="searchInput" className="sr-only">Buscar por nombre del profesor, especialidad o curso</label>
                      <input type="text" id="searchInput" onChange={buscarProducto} placeholder="Buscar por nombre del profesor, especialidad o curso" className="flex-1 w-full py-3 px-3 text-base font-poppins_regular text-[#2D464C] border-0 focus:border-0 focus:ring-0 bg-transparent" style={{ outline: 'none !important', border: 'none' }} />
					  	        <a 
                          className="w-auto bg-[#F19905] px-6 py-2 rounded-2xl text-base text-white font-Montserrat_SemiBold">
                          Buscar
                    	</a>
                    </div>
                </div>
            </section>


            {recursos?.length > 0 && (
              <section className="px-[5%] xl:px-[8%] py-10 lg:py-20 ">
                  <div className='flex flex-col gap-8'>

                    <div className='flex flex-col md:flex-row md:justify-between items-start justify-center gap-5'>
                        <div className='flex flex-col gap-3 max-w-lg'>
                            <h1
                              className="text-2xl font-Montserrat_Bold font-bold">
                              Barra de Filtros
                            </h1>
                            <SelectSecond  title={'Todos los documentos '} options={documentos} handleOptionChange={handleTagChange}/>
                        </div>

                        <div className="flex flex-col md:flex-row gap-3 justify-center items-start  min-w-[240px] font-Montserrat_Regular">
                          <span className="self-stretch my-auto text-sm tracking-normal leading-loose text-gray-600 ml-1">
                            Ordenar por:
                          </span>
                          <SelectSecond title={'Todas las opciones '} options={options} handleOptionChange={handleOptionChange} />
                        </div>
                    
                    </div>

                    <div className='w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6'>
                       {items.map((recursos, index) => (<Recurso recurso={recursos} />))}
                    </div>

                    <div className='flex flex-row items-center justify-center mt-6'>
                      <FilterPagination current={currentPage} setCurrent={setCurrentPage} pages={Math.ceil(totalCount / take)} />
                    </div>
                  </div>

              </section>
            )}


        </>
    );
};



CreateReactScript((el, properties) => {
    createRoot(el).render(<Recursos {...properties} />);
});