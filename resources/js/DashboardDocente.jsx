import React, { useState } from 'react';
import { createRoot } from 'react-dom/client';
import CreateReactScript from './Utils/CreateReactScript';
import HeaderTeacher from './components/HeaderTeacher';
import Curse from './components/Product/Curse'; // Asegúrate de que este sea el componente correcto para "Mis Cursos"
import FormDocente from './components/Section/FormDocente';

const DashboardDocente = () => {
const [open, setOpen] = useState(false);
const [selectedOption, setSelectedOption] = useState('Mis Cursos');

const handleToggle = () => {
setOpen(!open);
};

const handleOptionClick = (option) => {
setSelectedOption(option);
};

const logo = 'images/img/logoblancoegssp.png';

return (
<>
    <div className="md:flex flex-col md:flex-row md:min-h-screen w-full">
        <div className="flex flex-col w-full md:w-64 text-gray-700 bg-[#0F1F38] gap-3">
            <div className="flex-shrink-0 px-4 py-4 flex flex-row items-center justify-between">
                <a href="#"
                    className="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">
                    <img src={logo} alt="Logo" className="h-10" />
                </a>
                <button className="rounded-lg md:hidden focus:outline-none focus:shadow-outline" onClick={handleToggle}>
                    <svg fill="#ffffff" viewBox="0 0 20 20" className="w-6 h-6">
                        {open ? (
                        <path fillRule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clipRule="evenodd" />
                        ) : (
                        <path fillRule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clipRule="evenodd" />
                        )}
                    </svg>
                </button>
            </div>
            <nav className={`flex-grow md:block font-poppins_light font-bold tracking-wide pb-4 md:pb-0
                md:overflow-y-auto ${ open ? 'block' : 'hidden' }`}>
                <div>
                    <a className={`block px-4 py-4 text-sm ${ selectedOption === 'Mis Cursos'
                        ? 'bg-[#CF072C] text-white' : 'bg-transparent text-white' } hover:bg-[#CF072C]
                        focus:bg-[#CF072C] focus:outline-none focus:shadow-outline`} href="#" onClick={()=>
                        handleOptionClick('Mis Cursos')}
                        >
                        <i className="fa-solid fa-layer-group mr-2"></i>Mis Cursos
                    </a>
                    <a className={`block px-4 py-4 text-sm ${ selectedOption === 'Perfil' ? 'bg-[#CF072C] text-white'
                        : 'bg-transparent text-white' } hover:bg-[#CF072C] focus:bg-[#CF072C] focus:outline-none
                        focus:shadow-outline`} href="#" onClick={()=> handleOptionClick('Perfil')}
                        >
                        <i className="fa-solid fa-gear mr-2"></i>Perfil
                    </a>
                </div>
                <div>
                    <a className={`block px-4 py-4 text-sm ${ selectedOption === 'Salir'
                        ? 'bg-[#FFFFFF1F] text-white' : 'bg-transparent text-white' } hover:bg-[#FFFFFF1F]
                        focus:shadow-outline`}>
                        <i className="fa-solid fa-right-from-bracket mr-2"></i>Salir
                    </a>
                </div>
            </nav>
        </div>

        <div className="flex flex-col flex-1 min-h-screen">
            <HeaderTeacher selectedOption={selectedOption} />
            <div className="content p-6 flex-1">
                {selectedOption === 'Mis Cursos' &&
                <h2>asdasds</h2>} 
                {selectedOption === 'Perfil' &&
                <FormDocente />} 
            </div>
        </div>
    </div>
</>
);
};

CreateReactScript((el, properties) => {
createRoot(el).render(
<DashboardDocente {...properties} />
);
});
