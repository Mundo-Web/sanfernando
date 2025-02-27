import React, { useEffect, useRef, useState } from "react";
import { createRoot } from "react-dom/client";
import CreateReactScript from "./Utils/CreateReactScript";
import { Fetch, GET } from "sode-extend-react";
import arrayJoin from "./Utils/ArrayJoin";
import { set } from "sode-extend-react/sources/cookies";
import SliderFront from "./components/Section/SliderFront";
import SliderBenefit from "./components/Section/SliderBenefit";
import TwoColumn from "./components/Section/TwoColumn";
import Curse from "./components/Product/Curse";
import SliderTestimony from "./components/Section/SliderTestimony";
import SelectSecond from "./components/Inputs/SelectSecond";
import Dropdown from "./components/Dropdown";
import FilterPagination from "./components/Filter/FilterPagination";
import axios from "axios";

const CatalogoGP = ({
  productos,
  env_url,
  userIsLogged,
  Wishlist,
  categorias,
}) => {
  const [isListVisible, setIsListVisible] = useState(false);
  // const query = useRef({ query: '', order: '' });
  // const [query, setQuery] = useState({ query: GET.search ?? '', order: '' });

  const query = useRef({
    query: "",
    order: "",
    category: GET.category ? [GET.category] : [],
    subcategory: GET.subcategory ? [GET.subcategory] : [],
  });

  const options = [
    { value: 'a-z', label: 'Desde A a Z' },
    { value: 'z-a', label: 'Desde Z a A' },
    { value: 'ultimos', label: 'Ultimos' },
  ]

  const [items, setItems] = useState();
  const [isOpen, setIsOpen] = useState(true);
  const [isSubcategoryOpen, setIsSubcategoryOpen] = useState(true);
  const deseosactivos = Wishlist.map((item) => item.product_id);

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
    const categories = Array.isArray(query2.category) ? query2.category : [];
    setItems([])
    try {
      const response = await axios.post(
        `/buscar?query=${query2.query}&order=${query2.order}&category=${query2.category.join(',')}&subcategory=${query2.subcategory.join(',')}`,
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
    if (!Array.isArray(query.current.category)) {
      query.current.category = [];
    }
    if (check) {
      query.current = {
        ...query.current,
        category: [...new Set([...query.current.category, id])],
      };
    } else {
      query.current = {
        ...query.current,
        category: query.current.category.filter((catId) => catId !== id),
        subcategory: query.current.subcategory.filter((subcatId) => !categorias.map((x) => x.id == id ? x.subcategories.map((y) => y.id): null).flat().filter(Boolean).includes(subcatId)),
      };
    }
    buscarProductoQuery();
  };

  const handleSubcategoryChange = (categoryId, subcategoryId, check) => {
    if (!Array.isArray(query.current.subcategory)) {
      query.current.subcategory = [];
    }
    if (check) {
      query.current = {
        ...query.current,
        category: [...new Set([...query.current.category, categoryId])],
        subcategory: [...new Set([...query.current.subcategory, subcategoryId])],
      };
    } else {
      query.current = {
        ...query.current,
        subcategory: query.current.subcategory.filter((subcatId) => subcatId !== subcategoryId),
      };
    }
    buscarProductoQuery();
  };

  return (
    <>
      <section className="flex flex-col">
        <div className="flex flex-col justify-center items-center px-[8%] py-10 xl:py-16 w-full max-w-3xl text-center mx-auto gap-5">
          <h1 className="text-4xl lg:text-5xl font-Montserrat_Bold font-bold">
            Descubre el Curso Perfecto para Ti
          </h1>

          <p className="text-base font-Montserrat_Regular tracking-normal">
            Más de 50 opciones diseñadas para estudiantes y médicos en busca de especialización.
          </p>

          <div className="flex flex-wrap gap-2.5 items-center px-4 py-2 w-full bg-[#566574] bg-opacity-10 rounded-3xl max-md:max-w-full">

            <label htmlFor="searchInput" className="sr-only">Buscar por nombre del curso, especialidad o palabras</label>
            <input type="text" id="searchInput" onChange={buscarProducto} placeholder="Buscar por nombre del curso, especialidad o palabras" className="flex-1 w-full py-3 px-3 text-base font-poppins_regular text-[#2D464C] border-0 focus:border-0 focus:ring-0 bg-transparent" style={{ outline: 'none !important', border: 'none' }} defaultValue={GET.search} />
            <a
              className="w-auto bg-[#F19905] px-6 py-2 rounded-2xl text-base text-white font-Montserrat_SemiBold">
              Buscar
            </a>
          </div>
        </div>
      </section>

      {/* <div className="flex flex-col w-full max-md:max-w-full">
          
          <div className="flex flex-wrap gap-5 lg:gap-10 justify-between items-center mt-6 w-full max-md:max-w-full">
            
            <div className="flex flex-col self-stretch my-auto text-base leading-tight text-red-600 min-w-[240px] w-[493px] max-md:max-w-full">
              
              <div className='mb-5'>

                <ul className='flex flex-row w-full gap-4 md:grid-cols-3'>
                  {categorias.length > 0 && categorias.map((item, index) => {

                    return (
                      <li>
                        <input type="checkbox" id={`react-option-${index}`} value={item.id} className="hidden peer" required=""></input>
                        <label
                          onClick={(e) => handleCategoryChange(item.id, e.target.previousSibling.checked)}
                          htmlFor={`react-option-${index}`}
                          type="button"
                          className="text-red-700 font-bold bg-white border-2 border-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800  rounded-lg text-sm px-5 py-2 text-center me-2 mb-2  peer-checked:bg-red-700 peer-checked:text-white "
                        >
                          {item.name}
                        </label>
                      </li>
                    );
                  })}
                </ul>

              </div>

              <div className="flex flex-wrap gap-2.5 items-center px-4 py-3 w-full bg-rose-50 rounded-xl max-md:max-w-full">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/8d0148f8eb4404f2a75a99c44c0b35db6ba68a27faeb0e05d47cc41d12c3445f?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" alt="" />
                <label htmlFor="searchInput" className="sr-only">Buscar curso o diplomado</label>
                <input type="text" id="searchInput" onChange={buscarProducto} placeholder="Buscar curso o diplomado" className="flex-1 w-full py-3 px-3 text-base font-poppins_regular text-[#2D464C] border-0 focus:border-0 focus:ring-0 bg-transparent" style={{ outline: 'none !important', border: 'none' }} defaultValue={GET.search} />
              </div>
            </div>

            <div className="flex gap-3 justify-center items-center self-stretch my-auto min-w-[240px]">
              <span className="self-stretch my-auto text-sm tracking-normal leading-loose text-gray-600">
                Ordenar por:
              </span>
              <SelectSecond title={'Seleccionar '} options={options} handleOptionChange={handleOptionChange} />
            </div>

          </div>
        </div> */}

      <section className="flex flex-col !font-normal pb-10 xl:pb-16">
        <div className="flex flex-col lg:flex-row gap-4 lg:gap-12 px-[5%] lg:px-[8%] w-full">

          <div className="flex flex-col w-full lg:w-1/3">
            <div className="relative w-full mb-8">

              <div className={`py-3 px-4 cursor-pointer bg-[#f0f1f2] flex rounded-t-2xl justify-between items-center ${isOpen ? "" : "rounded-b-2xl"}`} onClick={() => setIsOpen(!isOpen)} >
                <span className="font-Montserrat_Bold text-[#221F1F] text-xl">Categorias</span>
                <span className={`transform transition-transform ${isOpen ? "rotate-180" : ""}`}>
                  <i className="fa-solid fa-chevron-down"></i>
                </span>
              </div>


              <ul
                className={`w-full p-5 pt-2 flex flex-col gap-3 bg-[#f0f1f2] border-b border-gray-300 z-10 rounded-b-2xl ${isOpen ? "block" : "hidden"
                  }`}
              >
                {categorias.length > 0 && categorias.map((item, index) => {
                  return (
                    <li key={`category-${item.id}`} className='flex flex-row items-start justify-start'>
                      <input type="checkbox" id={`react-option-${index}`} value={item.id} className="peer rounded-sm focus:ring-0 border-[#F19905] text-[#F19905]"
                        onChange={(e) => handleCategoryChange(item.id, e.target.checked)} checked={query.current.category.includes(item.id)}></input>
                      <label
                        // onClick={(e) => handleCategoryChange(item.id, e.target.previousSibling.checked)}
                        htmlFor={`react-option-${index}`}
                        type="button"
                        className="font-Montserrat_Regular leading-none ml-2"
                      >
                        {item.name}
                      </label>
                    </li>
                  );
                })}
              </ul>
            </div>
            <div className="relative w-full">

              <div className={`py-3 px-4 cursor-pointer bg-[#f0f1f2] flex rounded-t-2xl transition-all justify-between items-center ${isSubcategoryOpen ? "" : "rounded-b-2xl"}`} onClick={() => setIsSubcategoryOpen(!isSubcategoryOpen)} >
                <span className="font-Montserrat_Bold text-[#221F1F] text-xl">Subcategorias</span>
                <span className={`transform transition-transform ${isSubcategoryOpen ? "rotate-180" : ""}`}>
                  <i className="fa-solid fa-chevron-down"></i>
                </span>
              </div>


              <ul
                className={`w-full p-5 pt-2 flex flex-col gap-3 bg-[#f0f1f2] border-b border-gray-300 z-10 rounded-b-2xl ${isSubcategoryOpen ? "block" : "hidden"
                  }`}
              >
                {
                  categorias.length > 0 && categorias.map((category) => {
                    if (
                      (
                        query.current.category.length > 0 &&
                        !query.current.category.includes(category.id)
                      ) ||
                      category.subcategories.length <= 0
                    ) return
                    return <div key={category.id}>
                      <p className="font-semibold mb-2">{category.name}</p>
                      {category.subcategories.map((subcategory) => {
                        return (
                          <li key={`category-${subcategory.id}`} className='flex flex-row items-start justify-start py-1'>
                            <input type="checkbox" id={`sc-option-${subcategory.id}`} value={subcategory.id} className="peer rounded-sm focus:ring-0 border-[#F19905] text-[#F19905]"
                              onChange={(e) => handleSubcategoryChange(category.id, subcategory.id, e.target.checked)} checked={query.current.subcategory.includes(subcategory.id)}></input>
                            <label
                              htmlFor={`sc-option-${subcategory.id}`}
                              type="button"
                              className="font-Montserrat_Regular leading-none ml-2"
                            >
                              {subcategory.name}
                            </label>
                          </li>
                        );
                      })}
                    </div>
                  })
                }
              </ul>
            </div>
          </div>

          <div className='flex flex-col w-full lg:w-2/3'>
            <div className="grid grid-cols-1 md:grid-cols-2  w-full gap-12  pb-12">
              <div className="col-span-1 lg:col-span-2 flex flex-col md:flex-row md:justify-end gap-3 justify-center items-start  min-w-[240px] font-Montserrat_Regular">
                <span className="self-stretch my-auto text-sm tracking-normal leading-loose text-gray-600 ml-1">
                  Ordenar por:
                </span>
                <SelectSecond title={'Seleccionar '} options={options} handleOptionChange={handleOptionChange} />
              </div>
              {items?.map((producto, index) => {
                let deseoActivo = deseosactivos.includes(
                  producto.id
                )
                  ? (producto.wishlist = true)
                  : (producto.wishlist = false);
                return (
                  <Curse
                    key={index}
                    producto={producto}
                    env_url={env_url}
                    userIsLogged={userIsLogged}
                    deseoActivo={deseoActivo}
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
  createRoot(el).render(<CatalogoGP {...properties} />);
});
