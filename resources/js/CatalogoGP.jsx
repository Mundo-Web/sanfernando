import React, { useEffect, useRef, useState } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import { Fetch, GET } from 'sode-extend-react'
import arrayJoin from './Utils/ArrayJoin'
import { set } from 'sode-extend-react/sources/cookies'
import SliderFront from './components/Section/SliderFront'
import SliderBenefit from './components/Section/SliderBenefit'
import TwoColumn from './components/Section/TwoColumn'
import Curse from './components/Product/Curse'
import SliderTestimony from './components/Section/SliderTestimony'
import SelectSecond from './components/Inputs/SelectSecond'
import Dropdown from './components/Dropdown'
import FilterPagination from './components/Filter/FilterPagination'
import axios from 'axios';


const CatalogoGP = ({ productos, env_url, userIsLogged, Wishlist, categorias }) => {

  const [isListVisible, setIsListVisible] = useState(false)
  // const query = useRef({ query: '', order: '' });
  // const [query, setQuery] = useState({ query: GET.search ?? '', order: '' });

  const query = useRef({ query: '', order: '', category: GET.category ?? '', tag: GET.tag ?? '' });
  const [items, setItems] = useState();

  const deseosactivos = Wishlist.map((item) => item.product_id)





  const toggleListVisibility = () => {
    setIsListVisible(!isListVisible);
  };
  const take = 9
  const [currentPage, setCurrentPage] = useState(1)
  const [totalCount, setTotalCount] = useState(0)

  useEffect(() => {
    buscarProductoQuery()
  }, [null])
  useEffect(() => {
    buscarProductoQuery()
  }, [currentPage])

  const buscarProductoQuery = async () => {

    let query2 = query.current

    try {
      const response = await axios.post(`/buscar?query=${query2.query}&order=${query2.order}&&category=${query2.category}&&tag=${query2.tag}`, {
        skip: take * (currentPage - 1),
        requireTotalCount: true,
        take
      });
      const data = response.data;

      setItems(data.resultado);
      setTotalCount(data.totalCount ?? 0)
    } catch (error) {
      console.error('Error fetching search results:', error);
    }
  }

  const buscarProducto = async (event) => {



    setCurrentPage(1)

    // setQuery((prevQuery) => ({
    //   ...prevQuery,
    //   query: event.target.value,
    // }));
    query.current = { ...query.current, query: event.target.value }
    buscarProductoQuery()



  };

  const handleOptionChange = (event) => {


    // setQuery((prevQuery) => ({
    //   ...prevQuery,
    //   order: event.value
    // }));

    query.current = { ...query.current, order: event.value }

    buscarProductoQuery()

  }
  const handleCategoryChange = (id, check) => {
    console.log(id, check)

    if (check) {
      // Si el checkbox está marcado, quita el id del array
      query.current = {
        ...query.current,
        category: query.current.category.filter(catId => catId !== id)
      };
    } else {
      // Si el checkbox no está marcado, agrega el id al array
      query.current = {
        ...query.current,
        category: [...(query.current.category || []), id]
      };
    }

    console.log(query.current)
    buscarProductoQuery()
  }


  return (<>
    <section className="flex flex-col !font-poppins_regular !font-normal">
      <div className="flex w-full bg-[#FFF0F0] h-10 lg:h-20 max-md:max-w-full" role="banner"></div>
      <div className="flex flex-col px-[8%] py-10 w-full max-md:px-5 max-md:max-w-full">
        <div className="flex flex-col w-full max-md:max-w-full">
          <h1 className="text-2xl lg:text-3xl font-semibold leading-tight text-neutral-800 max-md:max-w-full">
            Nuestros Programas
          </h1>
          <div className="flex flex-wrap gap-5 lg:gap-10 justify-between items-center mt-6 w-full max-md:max-w-full">
            <div className="flex flex-col self-stretch my-auto text-base leading-tight text-red-600 min-w-[240px] w-[493px] max-md:max-w-full">
              <div className='mb-5'>
                {console.log(categorias)}
                <ul className='flex flex-row w-full gap-4 md:grid-cols-3'>


                  {categorias.length > 0 && categorias.map((item, index) => {

                    return (
                      <li>
                        <input type="checkbox" id={`react-option-${index}`} value={item.id} className="hidden peer" required=""></input>
                        <label
                          onClick={(e) => handleCategoryChange(item.id, e.target.previousSibling.checked)}
                          htmlFor={`react-option-${index}`}
                          type="button"
                          className="text-black bg-white border border-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 mb-2  peer-checked:bg-red-700 peer-checked:text-white "
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
              <SelectSecond title={'Seleccionar '} handleOptionChange={handleOptionChange} />
              {/* <div className="dropdown w-full order-2 md:order-4">
                <div
                  className="flex gap-2.5 items-center self-stretch px-4 py-3 my-auto text-base leading-tight text-red-600 whitespace-nowrap bg-rose-50 rounded-xl justify-between" role="button" tabIndex="0"
                  onClick={toggleListVisibility}
                >
                  {selectedOption}
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/560d29ead07b85ec6bc5be3251ad24dfeac5fff9cc1338da00022c87b5927764?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" alt="" />
                </div>

                {isListVisible && (
                  <div className="list z-[100] animate-fade-down animate-duration-[2000ms]" style={{ maxHeight: '150px', boxShadow: 'rgba(0, 0, 0, 0.15) 0px 1px 2px 0px, rgba(0, 0, 0, 0.1) 0px 1px 3px 1px' }}>
                    <div className="w-full">
                      <input type="radio" name="drop1" id="id11" data-nombre='Mas Comprado' className="radio" value="price_high" onChange={handleOptionChange} />
                      <label
                        htmlFor="id11"
                        className="font-regularDisplay text-text20 hover:font-bold md:duration-100 hover:text-white ordenar"
                      >
                        <span className="name inline-block w-full">Mas Comprado</span>
                      </label>
                    </div>

                    <div className="w-full">
                      <input type="radio" name="drop1" id="id12" data-nombre='Mas Popular' className="radio" value="price_low" onChange={handleOptionChange} />
                      <label
                        htmlFor="id12"
                        className="font-regularDisplay text-text20 hover:font-bold md:duration-100 hover:text-white ordenar"
                      >
                        <span className="name inline-block w-full">Mas Popular</span>
                      </label>
                    </div>


                  </div>
                )}
              </div> */}

              {/* <div className="flex gap-2.5 items-center self-stretch px-4 py-3 my-auto text-base leading-tight text-red-600 whitespace-nowrap bg-rose-50 rounded-xl" role="button" tabIndex="0">
                <span className="self-stretch my-auto">Tendencias</span>
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/560d29ead07b85ec6bc5be3251ad24dfeac5fff9cc1338da00022c87b5927764?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" alt="" />
              </div> */}
            </div>
          </div>
        </div>
        <div className="flex flex-col lg:flex-row gap-10 items-center mt-6 text-xs leading-tight w-full">
          <div className="flex flex-wrap lg:flex-1 shrink gap-4 items-center self-stretch my-auto text-center text-red-400 whitespace-nowrap basis-0 min-w-[240px] max-w-2xl">
            {/* <span className="self-stretch my-auto text-gray-600">Sugerencia:</span>
            <span className="self-stretch my-auto">Dignissim</span>
            <span className="self-stretch my-auto">Proin</span>
            <span className="self-stretch my-auto">Fermentum</span>
            <span className="self-stretch my-auto">Aliquam</span> */}
          </div>
          <p className="flex-1 shrink self-stretch my-auto text-left lg:text-right text-gray-600 basis-0 max-md:max-w-full">
            <strong className="font-semibold text-gray-600 pr-3">{totalCount}</strong>


            {query.query !== '' ? <span >resultados para la busqueda "{query.query}"</span> : <span > Cursos y diplomados</span>}

          </p>
        </div>
      </div>
    </section>


    <section>
      <div className="grid grid-cols-1  w-full gap-4 px-[8%] py-12 xl:py-16">
        {/* <div className="hidden lg:flex flex-col justify-start !font-poppins_regular !font-normal  items-start lg:col-span-1">
          <section className="flex flex-col text-base leading-tight max-w-[350px]">
            <div className="flex flex-col w-full">
              <header className="flex gap-2.5 items-center px-4 py-3 w-full font-semibold text-red-600 whitespace-nowrap bg-gray-50 rounded-xl border-b border-zinc-100">
                <h2 className="flex-1 shrink self-stretch my-auto basis-0">Cursos</h2>
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/bb5ff0527288599e198e0eed4dac55467f0d3d99698718f0808db8085b50604b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" alt="" />
              </header>
              <nav className="flex flex-col w-full text-red-200">
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Curso 1</a>
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Curso 2</a>
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full font-semibold text-white bg-red-600">Curso 3</a>
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Curso 4</a>
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Curso 5</a>
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50 rounded-none">Curso 6</a>
              </nav>
            </div>
            <div className="flex flex-col mt-6 w-full">
              <header className="flex gap-2.5 items-center px-4 py-3 w-full font-semibold text-red-600 whitespace-nowrap bg-gray-50 rounded-xl border-b border-zinc-100">
                <h2 className="flex-1 shrink self-stretch my-auto basis-0">Diplomados</h2>
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f25a881811c52a794fbb3f7644ad50c2d39b584fecdf8f41974ed50976cfeea?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" alt="" />
              </header>
              <nav className="flex flex-col w-full text-red-200">
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Diplomado 1</a>
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Diplomado 2</a>
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Diplomado 3</a>
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Diplomado 4</a>
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50">Diplomado 5</a>
                <a href="#" className="flex-1 shrink gap-2.5 self-stretch px-4 py-3 w-full bg-gray-50 rounded-none">Diplomado 6</a>
              </nav>
            </div>
          </section>
        </div> */}

        <div className="flex flex-col justify-center items-center lg:col-span-4">
          <div className="grid grid-cols-1 md:grid-cols-3  w-full gap-12  pb-12">

            {items?.map((producto, index) => {
              let deseoActivo = deseosactivos.includes(producto.id) ? producto.wishlist = true : producto.wishlist = false
              return <Curse key={index} producto={producto} env_url={env_url} userIsLogged={userIsLogged} deseoActivo={deseoActivo} />
            })}



          </div>
          <FilterPagination current={currentPage} setCurrent={setCurrentPage} pages={Math.ceil(totalCount / take)} />

          {/* <nav aria-label="Pagination" className="flex gap-6 justify-between items-center max-w-[393px]">
            <button aria-label="Previous page" className="flex gap-2.5 justify-center items-center self-stretch px-4 my-auto bg-red-200 h-[52px] rotate-[3.141592653589793rad] rounded-[100px] w-[52px]">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ff0317192b011b01d7fdb120f97fc223c2c8a165930b36c0309489160d2b263?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" alt="" className="object-contain self-stretch my-auto w-5 aspect-square" />
            </button>
            <ul className="flex items-center self-stretch my-auto text-sm font-medium tracking-normal leading-none text-center text-gray-600 whitespace-nowrap">
              <li><a href="#" aria-label="Page 1" className="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">01</a></li>
              <li><a href="#" aria-label="Current page, Page 2" aria-current="page" className="flex items-center justify-center self-stretch my-auto w-12 h-12 text-white bg-red-600 rounded-[100px]">02</a></li>
              <li><a href="#" aria-label="Page 3" className="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">03</a></li>
              <li><a href="#" aria-label="Page 4" className="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">04</a></li>
              <li><a href="#" aria-label="Page 5" className="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">05</a></li>
            </ul>
            <button aria-label="Next page" className="flex gap-2.5 justify-center items-center self-stretch px-4 my-auto bg-red-200 h-[52px] rounded-[100px] w-[52px]">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/e4d0870444e79373617da8c7fbd2c7b6d85de83feaeb03177566a7d3daf99d91?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" alt="" className="object-contain self-stretch my-auto w-5 aspect-square" />
            </button>
          </nav> */}
        </div>


      </div>
    </section>

  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(<CatalogoGP {...properties} />);
})