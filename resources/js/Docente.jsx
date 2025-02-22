import React, { useEffect, useState, useRef } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import { Fetch } from 'sode-extend-react'
import arrayJoin from './Utils/ArrayJoin'
import { set } from 'sode-extend-react/sources/cookies'
import SliderFront from './components/Section/SliderFront'
import SliderBenefit from './components/Section/SliderBenefit'
import TwoColumn from './components/Section/TwoColumn'
import Curse from './components/Product/Curse'
import SliderTestimony from './components/Section/SliderTestimony'
import Teacher from './components/Product/Teacher'
import axios from 'axios'
import FilterPagination from './components/Filter/FilterPagination'
import SelectSecond from "./components/Inputs/SelectSecond";

const Docente = ({ docentes, cursos }) => {
	const sectionStep = 'images/img/palacio.png';
	const imgVideo = 'images/img/mujergp.png';
	const imgPlay = 'images/img/iconoplayblanco.png';

	const [items, setItems] = useState([docentes])
	const [isOpen, setIsOpen] = useState(true);
	const options = [
		{ value: 'a-z', label: 'Desde A a Z' },
		{ value: 'z-a', label: 'Desde Z a A' },
		{ value: 'ultimos', label: 'Ultimos' },
	]

	const buscarProducto = async (event) => {
		setCurrentPage(1)
		query.current = { ...query.current, query: event.target.value }
		buscarProductoQuery()
	};
	
	const take = 9
	const [currentPage, setCurrentPage] = useState(1)
	const query = useRef({ query: '', order: '', curse: ''});
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
			const response = await axios.post(`/buscarDocente?query=${query2.query}&&order=${query2.order}&&curse=${query2.curse}`, {
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

	const handleOptionChange = (event) => {
        query.current = { ...query.current, order: event.value };
        buscarProductoQuery();
    };

	const handleDocenteChange = (id, check) => {
        console.log(id, check);
		if (check) {
            // Si el checkbox está marcado, quita el id del array
            query.current = {
                ...query.current,
                curse: query.current.curse.filter(
                    (catId) => catId !== id
                ),
            };
        } else {
            // Si el checkbox no está marcado, agrega el id al array
            query.current = {
                ...query.current,
                curse: [...(query.current.curse || []), id],
            };
        }
		console.log(query.current);
        buscarProductoQuery();
    };



	return (<>


			<section className="flex flex-col !font-normal">
                <div className="flex flex-col justify-center items-center px-[8%] pt-10 xl:pt-16 w-full max-w-3xl text-center mx-auto gap-5">
                    <h1 className="text-4xl lg:text-5xl font-Montserrat_Bold font-bold">
						Un Equipo de Expertos a Tu Lado
                    </h1>

                    <p className="text-base font-Montserrat_Regular tracking-normal">
						Nuestros cursos están diseñados y dictados por médicos especialistas con amplia experiencia en la enseñanza y práctica clínica
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
			
			<section className="flex flex-col !font-normal py-10 xl:py-16">
				<div className="flex flex-col lg:flex-row gap-4 lg:gap-12 px-[5%] lg:px-[8%] w-full">
					
					<div className="flex flex-col w-full lg:w-1/3">
						<div className="relative w-full">
							
							<div className={`py-3 px-4 cursor-pointer bg-[#f0f1f2] flex rounded-t-2xl justify-between items-center ${isOpen ? "" : "rounded-b-2xl"}`} onClick={() => setIsOpen(!isOpen)} >
								<span className="font-Montserrat_Bold text-[#221F1F] text-xl">Cursos</span>
								<span className={`transform transition-transform ${isOpen ? "rotate-180" : ""}`}>
									<i class="fa-solid fa-chevron-down"></i>
								</span>
							</div>

						
							<ul
								className={`w-full p-5 flex flex-col gap-3 bg-[#f0f1f2] border-b border-gray-300 z-10 rounded-b-2xl ${
									isOpen ? "block" : "hidden"
								}`}
							>
								{cursos.length > 0 && cursos.map((item, index) => {
									return (
									<li className='flex flex-row items-start justify-start'>
										<input type="checkbox" id={`react-option-${index}`} value={item.id} className="peer rounded-sm focus:ring-0 border-[#F19905] text-[#F19905]" required=""></input>
										<label
											onClick={(e) => handleDocenteChange(item.id, e.target.previousSibling.checked)}
											htmlFor={`react-option-${index}`}
											type="button"
											className="font-Montserrat_Regular leading-none ml-2"
										>
										{item.producto}
										</label>
									</li>
									);
								})}
							</ul>
						</div>
					</div>

					<div className='flex flex-col w-full lg:w-2/3'>
						
						<div className='grid grid-cols-1 lg:grid-cols-2 gap-6'>
							<div className="col-span-1 lg:col-span-2 flex flex-col md:flex-row md:justify-end gap-3 justify-center items-start  min-w-[240px] font-Montserrat_Regular">
								<span className="self-stretch my-auto text-sm tracking-normal leading-loose text-gray-600 ml-1">
									Ordenar por:
								</span>
								<SelectSecond title={'Seleccionar '} options={options} handleOptionChange={handleOptionChange} />
							</div>
							{items.map((docente, index) => (<Teacher docentes={docente} />))}
						</div>

						<div className='flex flex-row items-center justify-center mt-6'>
							<FilterPagination current={currentPage} setCurrent={setCurrentPage} pages={Math.ceil(totalCount / take)} />
						</div>
					</div>
					
				</div>
			</section>



	</>)
}

CreateReactScript((el, properties) => {
	createRoot(el).render(
		<Docente {...properties} />);
})


{/* <ul className='flex flex-col w-full gap-4'>
		{cursos.length > 0 && cursos.map((item, index) => {
			return (
			<li className='flex flex-row items-start justify-start'>
				<input type="checkbox" id={`react-option-${index}`} value={item.id} className="peer rounded-sm focus:ring-0 border-[#F19905] text-[#F19905]" required=""></input>
				<label
					onClick={(e) => handleDocenteChange(item.id, e.target.previousSibling.checked)}
					htmlFor={`react-option-${index}`}
					type="button"
					className="font-Montserrat_Regular leading-none ml-2"
				>
				{item.producto}
				</label>
			</li>
			);
		})}
</ul> */}