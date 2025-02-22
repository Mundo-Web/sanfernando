import React, { useState } from 'react';
import { createRoot } from 'react-dom/client';
import CreateReactScript from './Utils/CreateReactScript';
import HeaderTeacher from './components/HeaderTeacher';
import DashboardEstudianteBlock from './components/Section/DashboardEstudianteBlock';
import FormEstudiante from './components/Section/FormEstudiante';
import FavoritosEstudiante from './components/Section/FavoritosEstudiante';
import CursosEstudianteBlock from './components/Section/CursosEstudianteBlock';
import HistorialEstudiante from './components/Section/HistorialEstudiante';
import axios from 'axios';

const DashboardEstudiante = ({ session, general, finishedCourses, courses, Wishlist }) => {

	const [selectedOption, setSelectedOption] = useState('Dashboard');

	const handleOptionClick = (option) => {
		setSelectedOption(option);
	};
	const handleCerrarSesion = () => {

		axios.post('/logout')
			.then(() => {
				window.location.href = '/';
			});
	}

	return (
		<>
			<div className="md:flex flex-col md:flex-row md:min-h-screen w-full">
				<div className="flex flex-col flex-1 min-h-screen">
					{/* <HeaderTeacher selectedOption={session.name} /> */}
					<section className="flex flex-col !font-poppins_regular !font-normal">
						<div className="flex w-full bg-yellow-100 h-32 lg:h-40 max-md:max-w-full" role="banner"></div>
						<div className="flex flex-col px-[8%] py-10 w-full max-md:px-5 max-md:max-w-full -mt-40">
							<div className="flex flex-col p-10 pt-8 bg-white rounded-2xl max-md:px-5 shadow-xl">
								<div className="flex flex-col w-full bg-white max-md:max-w-full">
									<div
										className="flex flex-wrap gap-10 justify-between items-center px-4 py-4 w-full border-b border-yellow-100 max-md:max-w-full">
										<div className="flex gap-4 items-center self-stretch my-auto min-w-[240px]">
											<img loading="lazy"
												src={`/storage/${session?.profile_photo_path}`}
												className="object-contain shrink-0 self-stretch my-auto w-16 rounded-full aspect-square"
												onError={e => e.target.src = '/images/img/user-404.svg'} />
											<div className="flex flex-col self-stretch my-auto w-full">
												<div
													className="text-2xl font-semibold tracking-tight leading-none text-neutral-800">
													{session.name} {session.lastname} {console.log(session)}
												</div>
												<div className="text-base text-gray-600">Estudiante</div>
											</div>
										</div>
										{/* <a href={`//api.whatsapp.com/send?phone=${general.whatsapp}&text=Quiero+empezar+a+enseñar`}
											className="flex gap-2.5 justify-center items-center self-stretch px-5 py-2.5 my-auto text-sm font-semibold text-center text-teal-50 bg-[#F19905] rounded-lg min-h-[40px] min-w-[240px]">
											<div className="self-stretch my-auto">Conviértete en Instructor</div>
											<img loading="lazy"
												src="https://cdn.builder.io/api/v1/image/assets/TEMP/f7b1d4cde5983fa32af81c6bccbb8ee6ddd270b4dce4d3312a7f025f4bc68cab?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
												className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
										</a> */}
									</div>
									<div
										className="flex flex-nowrap items-center gap-3 md:gap-0 font-semibold mt-3 w-full text-base leading-none text-center text-[#F19905] max-md:max-w-full overflow-x-auto">
										<a
											className={`flex-1 shrink gap-2.5 self-stretch py-5 my-auto  border-b-[#F19905] ${selectedOption === 'Dashboard' ? 'bg-white border-b-2 border-solid border-b-[#F19905]' : ''}" `}
											onClick={() => handleOptionClick('Dashboard')}>
											<i className='fa fa-home me-1'></i>
											Dashboard
										</a>
										<a className={`flex-1 shrink gap-2.5 self-stretch py-5 my-auto  border-b-[#F19905] ${selectedOption === 'Perfil' ? 'bg-white border-b-2 border-solid border-b-[#F19905]' : ''}" `}
											onClick={() => handleOptionClick('Perfil')}>
											<i className='fa fa-user me-1'></i>
											Perfil
										</a>
										{/* <a className={`flex-1 shrink gap-2.5 self-stretch py-5 my-auto  border-b-[#F19905] ${selectedOption === 'Favoritos' ? 'bg-white border-b-2 border-solid border-b-[#F19905]' : ''}" `}
											onClick={() => handleOptionClick('Favoritos')}>
											<i className='fa fa-star me-1'></i>
											Favoritos
										</a> */}
										<a className={`flex-1 shrink gap-2.5 self-stretch py-5 my-auto  border-b-[#F19905] ${selectedOption === 'Cursos y Diplomados' ? 'bg-white border-b-2 border-solid border-b-[#F19905]' : ''}" `}
											onClick={() => handleOptionClick('Cursos y Diplomados')}>
											<i className='fa fa-book me-1'></i>
											Cursos 
										</a>
										<a className={`flex-1 shrink gap-2.5 self-stretch py-5 my-auto  border-b-[#F19905] ${selectedOption === 'Historial' ? 'bg-white border-b-2 border-solid border-b-[#F19905]' : ''}" `}
											onClick={() => handleOptionClick('Historial')}>
											<i className='fas fa-history me-1'></i>
											Historial
										</a>
										<a className="flex-1 shrink gap-2.5 self-stretch py-5 my-auto" onClick={handleCerrarSesion}>
											Cerrar Sesión
										</a>
									</div>
								</div>
								<div>
									{selectedOption === 'Dashboard' &&
										<DashboardEstudianteBlock finished={finishedCourses} session={session} courses={courses} />}
									{selectedOption === 'Perfil' &&
										<FormEstudiante user={session} />}
									{/* {selectedOption === 'Favoritos' &&
										<FavoritosEstudiante user={session} Wishlist={Wishlist} />} */}
									{selectedOption === 'Cursos y Diplomados' &&
										<CursosEstudianteBlock finished={finishedCourses} courses={courses} />}
									{selectedOption === 'Historial' &&
										<HistorialEstudiante />}
								</div>
							</div>
						</div>
					</section>

				</div>
			</div>
		</>
	);
};

CreateReactScript((el, properties) => {
	createRoot(el).render(
		<DashboardEstudiante {...properties} />
	);
});
