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


const Docente = ({ docentes }) => {
	const sectionStep = 'images/img/palacio.png';
	const imgVideo = 'images/img/mujergp.png';
	const imgPlay = 'images/img/iconoplayblanco.png';

	const [items, setItems] = useState([docentes])

	const buscarProducto = async (event) => {

		setCurrentPage(1)

		query.current = { ...query.current, query: event.target.value }
		buscarProductoQuery()

	};
	const take = 9
	const [currentPage, setCurrentPage] = useState(1)
	const query = useRef({ query: '', order: '', });
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
			const response = await axios.post(`/buscarDocente?query=${query2.query}`, {
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



	return (<>
		<section className="flex flex-col !font-poppins_regular !font-normal">
			<div className="flex w-full bg-[#FFF0F0] h-40 lg:h-60 max-md:max-w-full" role="banner"></div>

			<div className="flex flex-col px-[5%] lg:px-[8%] py-10 w-full max-md:px-5 max-md:max-w-full -mt-40 ">
				<div className="flex flex-col bg-white p-4 lg:p-8 rounded-2xl">
					<div className="text-3xl font-semibold leading-tight text-neutral-800 max-md:max-w-full">
						Docentes
					</div>
					<div className="flex flex-wrap gap-6 items-start mt-6 w-full max-md:max-w-full">
						<div className="grid grid-cols-3 w-full">
							<div className="col-span-1 flex flex-col flex-1 shrink whitespace-nowrap basis-0 min-w-[240px]">
								<div className="text-sm tracking-normal leading-loose text-gray-600">
									Buscar
								</div>
								<div
									className="flex gap-2.5 items-center px-4 py-1 mt-1.5 w-full text-base leading-tight text-red-600 whitespace-nowrap bg-rose-50 rounded-xl">
									<img loading="lazy"
										src="https://cdn.builder.io/api/v1/image/assets/TEMP/8d0148f8eb4404f2a75a99c44c0b35db6ba68a27faeb0e05d47cc41d12c3445f?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
										className="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
									<input type="text" id="searchInput" onChange={buscarProducto} placeholder="Buscar curso o diplomado" className="flex-1 w-full   text-base font-poppins_regular text-[#2D464C] border-0 focus:border-0 focus:ring-0 bg-transparent" style={{ outline: 'none !important', border: 'none' }} />
								</div>
							</div>
						</div>


					</div>
					<div className='grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8'>

						{items.map((docente, index) => (<Teacher docentes={docente} />))}


					</div>

				</div>

				<div className='flex flex-row items-center justify-center mt-6'>
					<FilterPagination current={currentPage} setCurrent={setCurrentPage} pages={Math.ceil(totalCount / take)} />
					{/* <nav aria-label="Pagination" class="flex gap-6 justify-between items-center max-w-[393px]">
						<button aria-label="Previous page" class="flex gap-2.5 justify-center items-center self-stretch px-4 my-auto bg-red-200 h-[52px] rotate-[3.141592653589793rad] rounded-[100px] w-[52px]">
							<img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ff0317192b011b01d7fdb120f97fc223c2c8a165930b36c0309489160d2b263?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" alt="" class="object-contain self-stretch my-auto w-5 aspect-square" />
						</button>
						<ul class="flex items-center self-stretch my-auto text-sm font-medium tracking-normal leading-none text-center text-gray-600 whitespace-nowrap">
							<li><a href="#" aria-label="Page 1" class="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">01</a></li>
							<li><a href="#" aria-label="Current page, Page 2" aria-current="page" class="flex items-center justify-center self-stretch my-auto w-12 h-12 text-white bg-red-600 rounded-[100px]">02</a></li>
							<li><a href="#" aria-label="Page 3" class="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">03</a></li>
							<li><a href="#" aria-label="Page 4" class="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">04</a></li>
							<li><a href="#" aria-label="Page 5" class="flex items-center justify-center self-stretch py-3.5 my-auto w-12 rounded-[100px]">05</a></li>
						</ul>
						<button aria-label="Next page" class="flex gap-2.5 justify-center items-center self-stretch px-4 my-auto bg-red-200 h-[52px] rounded-[100px] w-[52px]">
							<img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/e4d0870444e79373617da8c7fbd2c7b6d85de83feaeb03177566a7d3daf99d91?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f" alt="" class="object-contain self-stretch my-auto w-5 aspect-square" />
						</button>
					</nav> */}
				</div>
			</div>
		</section>



	</>)
}

CreateReactScript((el, properties) => {
	createRoot(el).render(
		<Docente {...properties} />);
})
