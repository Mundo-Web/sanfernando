import React, { useEffect, useRef, useState } from "react";
import { createRoot } from "react-dom/client";
import CreateReactScript from "./Utils/CreateReactScript";
import { Fetch, GET } from "sode-extend-react";
import arrayJoin from "./Utils/ArrayJoin";
import { set } from "sode-extend-react/sources/cookies";
import SliderFront from "./components/Section/SliderFront";
import SliderBenefit from "./components/Section/SliderBenefit";
import TwoColumn from "./components/Section/TwoColumn";
import Exam from "./components/Product/Exam";
import SliderTestimony from "./components/Section/SliderTestimony";
import SelectSecond from "./components/Inputs/SelectSecond";
import Dropdown from "./components/Dropdown";
import FilterPagination from "./components/Filter/FilterPagination";
import axios from "axios";

const Simulacro = ({
    simulacros,
    env_url,
    userIsLogged
}) => {
    const [isListVisible, setIsListVisible] = useState(false);
    // const query = useRef({ query: '', order: '' });
    // const [query, setQuery] = useState({ query: GET.search ?? '', order: '' });

    const query = useRef({
        query: "",
        order: "",
        category: GET.category ?? "",
        tag: GET.tag ?? "",
    });

    const options = [
        { value: 'a-z', label: 'Desde A a Z' },
        { value: 'z-a', label: 'Desde Z a A' },
        { value: 'ultimos', label: 'Ultimos' },
    ]

    const [items, setItems] = useState();
    const [isOpen, setIsOpen] = useState(true);


    const toggleListVisibility = () => {
        setIsListVisible(!isListVisible);
    };

    const take = 9;
    const [currentPage, setCurrentPage] = useState(1);
    const [totalCount, setTotalCount] = useState(0);

    useEffect(() => {
        buscarProductoQuery();
    }, [null]);

    useEffect(() => {
        buscarProductoQuery();
    }, [currentPage]);

    const buscarProductoQuery = async () => {
        let query2 = query.current;

        try {
            const response = await axios.post(
                `/buscarSimulacro?query=${query2.query}&order=${query2.order}&&category=${query2.category}&&tag=${query2.tag}`,
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

    const buscarProducto = async (event) => {
        setCurrentPage(1);

        // setQuery((prevQuery) => ({
        //   ...prevQuery,
        //   query: event.target.value,
        // }));
        query.current = { ...query.current, query: event.target.value };
        buscarProductoQuery();
    };

    const handleOptionChange = (event) => {
        // setQuery((prevQuery) => ({
        //   ...prevQuery,
        //   order: event.value
        // }));

        query.current = { ...query.current, order: event.value };

        buscarProductoQuery();
    };
    
    const handleCategoryChange = (id, check) => {
        console.log(id, check);

        if (check) {
            // Si el checkbox está marcado, quita el id del array
            query.current = {
                ...query.current,
                category: query.current.category.filter(
                    (catId) => catId !== id
                ),
            };
        } else {
            // Si el checkbox no está marcado, agrega el id al array
            query.current = {
                ...query.current,
                category: [...(query.current.category || []), id],
            };
        }

        console.log(query.current);
        buscarProductoQuery();
    };

    return (
        <>
            <section className="flex flex-col">
                <div className="flex flex-col justify-center items-center px-[8%] py-10 xl:py-16 w-full max-w-3xl text-center mx-auto gap-5">
                    <h1 className="text-4xl lg:text-5xl font-Montserrat_Bold font-bold">
                        Nuestros Simulacros
                    </h1>

                    <p className="text-base font-Montserrat_Regular tracking-normal">
                        Más de 50 opciones diseñadas para estudiantes y médicos en busca de especialización.
                    </p>

                    <div className="flex flex-wrap gap-2.5 items-center px-4 py-2 w-full bg-[#566574] bg-opacity-10 rounded-3xl max-md:max-w-full">
                      
                      <label htmlFor="searchInput" className="sr-only">Buscar por nombre del simulacro</label>
                      <input type="text" id="searchInput" onChange={buscarProducto} placeholder="Buscar por nombre del curso, especialidad o palabras" className="flex-1 w-full py-3 px-3 text-base font-poppins_regular text-[#2D464C] border-0 focus:border-0 focus:ring-0 bg-transparent" style={{ outline: 'none !important', border: 'none' }} defaultValue={GET.search} />
                      <a 
                          className="w-auto bg-[#F19905] px-6 py-2 rounded-2xl text-base text-white font-Montserrat_SemiBold">
                          Buscar
                        </a>
                    </div>
                </div>
            </section>

     
            <section className="flex flex-col !font-normal pb-10 xl:pb-16">
				<div className="flex flex-col lg:flex-row gap-4 lg:gap-12 px-[5%] lg:px-[8%] w-full">
                    
                    <div className="flex flex-col w-full ">
                            <div className="grid grid-cols-1 md:grid-cols-3  w-full gap-12  pb-12">
                                
                                {items?.map((simulacro, index) => {
                                    return (
                                        <Exam
                                            key={index}
                                            simulacro={simulacro}
                                            env_url={env_url}
                                            userIsLogged={userIsLogged}
                                        />
                                    );
                                })}
                            </div>
                            <FilterPagination
                                current={currentPage}
                                setCurrent={setCurrentPage}
                                pages={Math.ceil(totalCount / take)}
                            />
					</div>

                </div>
            </section>
        </>
    );
};

CreateReactScript((el, properties) => {
    createRoot(el).render(<Simulacro {...properties} />);
});
