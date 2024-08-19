import React, { useEffect, useState } from 'react'
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


const Docente = ({ docente, cursos }) => {
	const sectionStep = 'images/img/palacio.png';
	const imgVideo = 'images/img/mujergp.png';
	const imgPlay = 'images/img/iconoplayblanco.png';

	console.log(docente)
	return (<>
		<section className="flex flex-col !font-poppins_regular !font-normal">
			<div className="flex w-full bg-[#FFF0F0] h-40 lg:h-60 max-md:max-w-full" role="banner"></div>
			<div className="flex flex-col px-[8%] py-10 w-full max-md:px-5 max-md:max-w-full -mt-40">
				<div className='flex flex-col bg-white p-4 lg:p-8 rounded-2xl'>
					<div class="flex flex-wrap gap-5 lg:gap-10 justify-between items-center px-6 py-8 bg-red-100 rounded-xl max-md:px-5">
						<div class="flex flex-wrap gap-6 items-center self-stretch my-auto min-w-[240px] max-md:max-w-full">
							<div className="flex flex-row gap-8 items-center">
								<img loading="lazy"
									src={`/${docente.url_foto}`}
									className="object-cover max-w-full aspect-square rounded-full w-[100px] h-[100px]"
									onError={e => {
										e.target.onerror = null; // Evita un bucle infinito
										e.target.src = '/images/img/noStaff.jpg';
									}} />
								<div className="flex flex-col w-full max-md:max-w-full">
									<div className="text-xl md:text-2xl font-bold leading-tight text-slate-700 max-md:max-w-full">
										{docente.nombre}
									</div>
									<div
										className="mt-1.5 text-sm tracking-normal leading-6 text-gray-600 max-md:max-w-full">
										{docente.cargo}
									</div>
								</div>
							</div>


						</div>
						<div class="flex flex-col justify-center items-start lg:items-end self-stretch my-auto min-w-[240px]">
							<div
								class="flex gap-1.5 items-start text-sm font-medium tracking-normal leading-none text-gray-600 ">

								<div class="self-stretch my-auto">
									<div class="flex gap-2 items-center self-stretch my-auto">
										<img loading="lazy"
											src="https://cdn.builder.io/api/v1/image/assets/TEMP/dfe63dad1b968067755a3a1be0729d14d07bec1f5a800feeb716d24f7e93e6dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
											class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
										<div class="flex gap-1 justify-center items-center self-stretch my-auto">
											<div
												class="self-stretch my-auto text-sm tracking-normal leading-none text-neutral-800">
												{docente.productos.length}
											</div>
											<div class="self-stretch my-auto text-xs tracking-normal leading-6 text-rose-700">
												Cursos
											</div>
										</div>
									</div>
								</div>
							</div>
							{(docente.instagram || docente.facebook || docente.linkedin || docente.youtube || docente.twitter) && (
								<div class="flex gap-2.5 items-start mt-6">

									{docente.instagram && (<a className='text-center' href={docente.instagram}><i class="fa-brands fa-instagram text-lg  w-8 bg-red-700 text-white rounded-full p-1.5"></i></a>)}
									{docente.facebook && (<a className='text-center' href={docente.facebook}><i class="fa-brands fa-facebook-f text-lg w-8 bg-red-700 text-white rounded-full p-1.5"></i></a>)}
									{docente.linkedin && (<a className='text-center' href={docente.linkedin}><i class="fa-brands fa-linkedin-in text-lg w-8 bg-red-700 text-white rounded-full p-1.5"></i></a>)}
									{docente.youtube && (<a className='text-center' href={docente.youtube}><i class="fa-brands fa-youtube text-lg w-8 bg-red-700 text-white rounded-full p-1.5"></i></a>)}
									{docente.twitter && (<a className='text-center' href={docente.twitter}><i class="fa-brands fa-x-twitter text-lg w-8 bg-red-700 text-white rounded-full p-1.5"></i></a>)}

								</div>

							)}


						</div>
					</div>

					<div className='grid grid-cols-1 lg:grid-cols-3 mt-10 gap-10'>
						<div className='col-span-1'>
							<div className='bg-[#FFF0F0] p-6 rounded-2xl'>
								<h2 className='font-poppins_regular font-bold text-xl'>Acerca de mí</h2>
								<p>{docente.resume}</p>
							</div>
						</div>
						<div className='col-span-1 lg:col-span-2'>
							<h2 className='font-poppins_regular font-bold text-2xl'>Cursos de {docente.name}</h2>
							<div className='grid grid-cols-1 md:grid-cols-2 gap-6 mt-6'>
								{docente.productos.map((curso, index) => { return <Curse key={index} producto={curso} /> })}
								{console.log(docente.productos)}

							</div>
						</div>
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
