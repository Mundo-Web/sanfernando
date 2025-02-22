import React, { useState, useEffect } from "react";

import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css";
import truncateText from "../../Utils/truncateText";
import axios from 'axios';


const Recurso = ({ recurso }) => {

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
   
    const [contador, setContador] = useState(0);

    useEffect(() => {
        if (recurso.count !== undefined) {
            setContador(Number(recurso.count));
        }
    }, [recurso.count]);
    
    const onClickCount = async (e) => {
        if (!recurso.archive) {
            e.preventDefault();
            Swal.fire({
                title: "Ooops!",
                text: "No hay archivo disponible para descargar",
                icon: "error",
            });
            return;
        }
    
        const request = { id: recurso.id };
    
        try {
            const { data } = await axios.post('/aumentarContador', request, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
    
            setContador(Number(data.contador));
    
            Swal.fire({
                icon: "success",
                title: "Descarga",
                text: "Descarga realizada con éxito",
            });
    
            // Forzar la descarga del archivo después de la actualización del contador
            const link = document.createElement("a");
            link.href = recurso.archive;
            link.setAttribute("download", "");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
    
        } catch (error) {
            Swal.fire({
                title: "Ooops!",
                text: "Ocurrió un error al enviar tus datos",
                icon: "error",
            });
        }
    };
    
    return (
        <div
            
            className="flex flex-col justify-between gap-3 p-5 bg-white rounded-xl overflow-hidden"
        >
            <div className="flex flex-row gap-4">
                <img
                    src={recurso.imagen}
                    onError={(e) =>
                        (e.target.src = "/images/academia/medicinainterna.png")
                    }
                    className="w-24 h-24 object-contain"
                />
                <div className="flex flex-col justify-between">
                    <h1 className="text-lg leading-tight font-Montserrat_Bold font-bold line-clamp-3">
                        {recurso.name}
                    </h1>
                    
                    <p className="flex flex-row font-Montserrat_Regular">
                        <svg
                            className="mr-2"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                        >
                            <path
                                d="M14 21H12C7.28595 21 4.92893 21 3.46447 19.5355C2 18.0711 2 15.714 2 11V7.94427C2 6.1278 2 5.21956 2.38032 4.53806C2.65142 4.05227 3.05227 3.65142 3.53806 3.38032C4.21956 3 5.1278 3 6.94427 3C8.10802 3 8.6899 3 9.19926 3.19101C10.3622 3.62712 10.8418 4.68358 11.3666 5.73313L12 7M8 7H16.75C18.8567 7 19.91 7 20.6667 7.50559C20.9943 7.72447 21.2755 8.00572 21.4944 8.33329C22 9.08996 22 10.1433 22 12.25"
                                stroke="#F19905"
                                strokeWidth="1.5"
                                strokeLinecap="round"
                            />
                            <path
                                d="M16 18C16.5898 18.6068 18.1597 21 19 21C19.8403 21 21.4102 18.6068 22 18M19 20V13"
                                stroke="#F19905"
                                strokeWidth="1.5"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                            />
                        </svg>
                        {contador} descargas
                    </p>
                </div>
            </div>

            <a
                href={recurso.archive ? recurso.archive : "#"}
                onClick={onClickCount}
                download={recurso.archive ? true : false}
                className="w-auto bg-[#F19905] text-center px-6 py-3 rounded-3xl text-white font-Montserrat_SemiBold"
            >
                Descargar
            </a>
        </div>
    );
};

export default Recurso;
