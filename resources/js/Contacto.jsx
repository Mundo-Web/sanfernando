import React, { useRef } from "react";
import { createRoot } from "react-dom/client";
import CreateReactScript from "./Utils/CreateReactScript";
import { Clipboard, Notify } from "sode-extend-react";
import Swal from "sweetalert2";
import MessagesRest from "./actions/MessagesRest";
import HtmlContent from './Utils/HtmlContent';

const messagesRest = new MessagesRest();

const Contacto = ({ general, faqs, aboutUs }) => {
    const imgcontacto = "images/academia/imagencontacto.png";

    const nameRef = useRef();
    const lastnameRef = useRef();
    const emailRef = useRef();
    const phoneRef = useRef();
    const messageRef = useRef();
    
    const data = {}
    const img = {}
    aboutUs.forEach(x => {
        data[x.titulo] = x.descripcion
        img[x.titulo] = x.imagen
    })

    const onCopyClicked = () => {
        Clipboard.copy(general.email, () => {
            Swal.fire("Copiado!", "Se ha copiado el correo en el portapapeles");
        });
    };
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    const onFormSubmit = async (e) => {
        e.preventDefault();
        const request = {
            full_name: `${nameRef.current.value} ${lastnameRef.current.value}`,
            email: emailRef.current.value,
            phone: phoneRef.current.value,
            message: messageRef.current.value,
        };
        const result = await messagesRest.save(request, false);
        if (!result)
            return Swal.fire({
                title: "Ooops!",
                text: "Ocurrio un error al enviar tus datos",
                icon: "error",
            });
        e.target.reset();
        
        Swal.fire({
            title: "Perfecto",
            text: "Hemos registrado tus datos, en un momento uno de nuestros ejecutivos se pondra en contacto contigo.",
        });

        const sendEmail = await fetch('/guardarContactos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken 
            },
            body: JSON.stringify(request)
        });
    };

    return (
        <>
            <section>
                <div className="flex flex-col md:flex-row justify-center items-center px-[5%] xl:px-[8%] pt-5 pb-10 lg:pb-16 gap-6 md:gap-16 relative">
                    <form
                        onSubmit={onFormSubmit}
                        id="formContactos"
                        className="w-full md:w-1/2 flex flex-col gap-4 bg-[#F8F8FB] rounded-3xl p-6"
                        data-aos="fade-down"
                    >
                        <h2 className="font-Montserrat_Bold text-[#1D2026] text-2xl  xl:text-4xl">
                            <HtmlContent html={data['TITULO-CONTACTO']} />
                        </h2>

                        <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div className="flex flex-col gap-1">
                                <label className="text-[#001F4F] text-base font-Montserrat_Medium w-full leading-tight">
                                    Nombres
                                </label>
                                <input
                                    ref={nameRef}
                                    id="name"
                                    type="text"
                                    required
                                    name="name"
                                    placeholder="Nombres"
                                    className="placeholder:text-[#001F4F] text-[#001F4F] placeholder:text-opacity-30 bg-white font-Montserrat_Regular rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"
                                />
                            </div>

                            <div className="flex flex-col gap-1">
                                <label className="text-[#001F4F] text-base font-Montserrat_Medium w-full leading-tight">
                                    Apellidos
                                </label>
                                <input
                                    ref={lastnameRef}
                                    id="lastname"
                                    type="text"
                                    required
                                    name="lastname"
                                    placeholder="Apellidos"
                                    className="placeholder:text-[#001F4F] text-[#001F4F] placeholder:text-opacity-30 bg-white font-Montserrat_Regular rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"
                                />
                            </div>
                        </div>

                        <div className="flex flex-col gap-1">
                            <label className="text-[#001F4F] text-base font-Montserrat_Medium  w-full leading-tight">
                                Email
                            </label>
                            <input
                                ref={emailRef}
                                required
                                name="email"
                                id="email"
                                type="email"
                                placeholder="hola@mail.com"
                                className="placeholder:text-[#001F4F] text-[#001F4F] placeholder:text-opacity-30 bg-white font-Montserrat_Regular rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"
                            />
                        </div>

                        <div className="flex flex-col gap-1">
                            <label className="text-[#001F4F] text-base font-Montserrat_Medium w-full leading-tight">
                                Telefono
                            </label>
                            <input
                                ref={phoneRef}
                                required
                                name="phone"
                                id="telefonoContacto"
                                type="text"
                                placeholder="+51 123456789"
                                className="placeholder:text-[#001F4F] text-[#001F4F] placeholder:text-opacity-30 bg-white font-Montserrat_Regular rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"
                            />
                        </div>

                        <div className="flex flex-col gap-1">
                            <label className="text-[#001F4F] text-base font-Montserrat_Medium  w-full leading-tight">
                                Mensaje
                            </label>
                            <textarea
                                ref={messageRef}
                                name="message"
                                id="mensaje"
                                rows="3"
                                type="text"
                                placeholder="Escribe tu mensaje"
                                className="placeholder:text-[#001F4F] text-[#001F4F] placeholder:text-opacity-30 bg-white font-Montserrat_Regular  rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"
                            ></textarea>
                        </div>

                        <input
                            required
                            name="_token"
                            id="token"
                            type="hidden"
                            value={csrfToken || ''} 
                            className="placeholder:text-[#001F4F] text-[#001F4F] placeholder:text-opacity-30 bg-white font-gilroy_regular  rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"
                        />

                        <label className="text-[#001F4F] text-sm font-Montserrat_Medium flex flex-row items-center gap-2 focus:ring-0 focus:border-0">
                            <input
                                type="checkbox"
                                name="terms"
                                className="focus:ring-0 text-[#F19905] rounded-sm"
                                required
                            />
                            Estoy de acuerdo con todos sus{" "}
                            <span
                                className="font-semibold  "
                                id="#linkTerminos2"
                            >
                                {" "}
                                Términos & condiciones
                            </span>
                        </label>

                        <div className="flex flex-col gap-1">
                            <button
                                type="submit"
                                className="bg-[#F19905] flex flex-row items-center justify-center gap-2 text-white font-Montserrat_Regular rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"
                            >
                                Enviar
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="21"
                                    height="20"
                                    viewBox="0 0 21 20"
                                    fill="none"
                                >
                                    <path
                                        d="M18.8327 10.4141C18.8327 10.0046 18.8283 9.1784 18.8195 8.76773C18.7651 6.21311 18.7378 4.93581 17.7953 3.98961C16.8526 3.04342 15.5408 3.01046 12.917 2.94454C11.2999 2.90391 9.69877 2.90391 8.0817 2.94453C5.45796 3.01045 4.14608 3.04341 3.20347 3.98961C2.26087 4.9358 2.23363 6.2131 2.17915 8.76773C2.16163 9.58915 2.16164 10.4056 2.17916 11.2271C2.23363 13.7817 2.26087 15.059 3.20348 16.0052C4.14608 16.9514 5.45796 16.9843 8.08171 17.0502C8.75067 17.0671 9.41693 17.0769 10.0827 17.0798"
                                        stroke="#ffffff"
                                        stroke-width="1.25"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M2.16602 5L7.92687 8.27052C10.0316 9.46542 10.9671 9.46542 13.0718 8.27052L18.8327 5"
                                        stroke="#ffffff"
                                        stroke-width="1.25"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M18.8327 14.5833H12.166M18.8327 14.5833C18.8327 13.9998 17.1708 12.9096 16.7493 12.5M18.8327 14.5833C18.8327 15.1668 17.1708 16.2571 16.7493 16.6667"
                                        stroke="#ffffff"
                                        stroke-width="1.25"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                        </div>
                    </form>

                    <div className="w-full md:w-1/2 max-w-lg ml-auto">
                        <div className="flex flex-col items-center justify-end rounded-2xl overflow-hidden relative h-[500px] sm:h-[600px] lg:h-[650px] w-full pb-0 xl:pb-[10%]">
                            <img  src={`${img['IMAGEN-CONTACTO']}`} onError={e => e.target.src = {imgcontacto}}
                                className="absolute top-0 object-cover xl:object-contain h-full w-full lg:object-left"
                            />
                            
                            <div className="p-6 z-20 font-Montserrat_Regular w-full">
                                <div className="p-6 bg-white bg-opacity-40 rounded-lg">
                                    <div className="grid grid-cols-1 lg:grid-cols-4 gap-2 lg:gap-5 w-full">
                                        <h3 className="col-span-1 font-Montserrat_Bold text-sm">
                                            Dirección
                                        </h3>
                                        <div className="col-span-3 flex flex-col text-sm">
                                            <p>
                                                {general.address},{" "}
                                                {general.district}
                                            </p>
                                            <p>
                                                {general.city} -{" "}
                                                {general.country}
                                            </p>
                                        </div>
                                    </div>
                                    <hr className="my-3"></hr>
                                    <div className="grid grid-cols-1 lg:grid-cols-4 gap-2 lg:gap-5 w-full">
                                        <h3 className="col-span-1 font-Montserrat_Bold text-sm">
                                            Teléfonos
                                        </h3>
                                        <div className="col-span-3 flex flex-col text-sm">
                                            <p>{general.cellphone}</p>
                                            <p>{general.office_phone}</p>
                                        </div>
                                    </div>
                                    <hr className="my-3"></hr>
                                    <div className="grid grid-cols-1 lg:grid-cols-4 gap-2 lg:gap-5 w-full">
                                        <h3 className="col-span-1 font-Montserrat_Bold text-sm">
                                            Emails
                                        </h3>
                                        <div className="col-span-3 flex flex-col text-sm">
                                            <p>{general.email}</p>
                                            <p>{general.form_email}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            {faqs?.length > 0 && (
                
                <section className="bg-cover  relative pb-10 lg:pb-16 bg-[#F2F3F7]" >

                        <div className="bg-gradient-to-b from-white to-[#F2F3F7]">
                            <div className="flex flex-col justify-center items-center px-[5%] xl:px-[8%] pb-10 xl:pb-16 w-full max-w-4xl text-center mx-auto gap-5">
                                <h1 className="text-4xl lg:text-5xl font-Montserrat_Bold font-bold">
                                    <HtmlContent html={data['TITULO-FAQ']} />
                                </h1>

                                <p className="text-base font-Montserrat_Regular tracking-normal">
                                    <HtmlContent html={data['DESCRIPCION-FAQ']} />
                                </p>
                            </div>
                        </div>

                        <div className="px-[5%] md:px-[10%] flex flex-col gap-5 md:gap-10">  
                            <div className="flex flex-col items-center justify-center gap-5">
                                
                                <div className="grid w-full divide-y gap-y-5 divide-neutral-200 px-6 py-2 rounded-3xl" data-aos="fade-down">

                                    {faqs.map((faq, index) => (
                                        <div className="py-3 bg-white rounded-3xl px-4" key={index}>
                                            <details className="group">
                                                <summary className="flex cursor-pointer list-none items-center justify-between font-medium">
                                                    <span className="font-bold text-[19px] text-[#252222] font-Montserrat_Bold">
                                                    {faq.pregunta ?? ''}</span>
                                                    <span className="transition group-open:rotate-180 bg-white rounded-full p-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none">
                                                            <path d="M17 10L11.9992 14.58L7 10" stroke="#221F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </span>
                                                </summary>
                                                <p className="text-base text-[#252222] font-Montserrat_Regular">
                                                    <div dangerouslySetInnerHTML={{ __html: faq?.respuesta ?? '' }}></div>
                                                </p>
                                            </details>
                                        </div>
                                    ))}                  
                                </div>
                            </div>
                        </div>  
                </section>
            )}
            
            </section>
       

        </>
    );
};

CreateReactScript((el, properties) => {
    createRoot(el).render(<Contacto {...properties} />);
});
