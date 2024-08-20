import React, { useRef, useState } from 'react';
import axios from 'axios'
import Swal from 'sweetalert2';

import InitialsImage from '../../Utils/InitialsImage';
const FormEstudiante = ({ user }) => {

    const [imagePreview, setImagePreview] = useState(user.profile_photo_url ?? null);

    const fileInputRef = useRef(null);
    const formUser = useRef({
        id: user.id,
        name: user.name,
        lastname: user.lastname,
        email: user.email,
        occupation: user.occupation ?? '',
        username: user.username ?? '',
        password: null,
        newpassword: null,
        confirmnewpassword: null
    })


    const handleImageClick = () => {
        fileInputRef.current.click();
    };
    const handleFileChange = (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onloadend = () => {
                setImagePreview(reader.result);
                formUser.current.image = file; // Actualizar formUser con la imagen
            };
            reader.readAsDataURL(file);
        }
    };
    const handleForm = (e) => {
        console.log(e.target.value)
        console.log(e.target.name)
        formUser.current = { ...formUser.current, [e.target.name]: e.target.value }
        console.log(formUser.current)
    }
    const handleSubmitPass = async (event) => {
        event.preventDefault();
        Swal.fire({
            title: 'Actualizando datos...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        const formData = new FormData();
        for (const key in formUser.current) {
            formData.append(key, formUser.current[key]);
        }

        try {
            const response = await axios.post('/api/savePassword', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            Swal.fire({
                icon: 'success',
                title: 'Datos actualizados',
                text: response.data.message || 'Los datos se han actualizado correctamente.'
            });
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al guardar datos',
                text: error.response?.data?.message || 'Hubo un error al intentar guardar los datos.'
            });
            console.error('Error al enviar el formulario:', error);
        }
    }

    const handleSubmit = async (event) => {
        event.preventDefault();
        Swal.fire({
            title: 'Actualizando datos...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        const formData = new FormData();
        for (const key in formUser.current) {
            formData.append(key, formUser.current[key]);
        }

        try {
            const response = await axios.post('/api/savePerfil', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            Swal.fire({
                icon: 'success',
                title: 'Datos actualizados',
                text: response.data.message || 'Los datos se han actualizado correctamente.'
            });
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al guardar datos',
                text: error.response?.data?.message || 'Hubo un error al intentar guardar los datos.'
            });
            console.error('Error al enviar el formulario:', error);
        }
    };

    return (
        <section className="flex flex-col self-stretch p-10 bg-white rounded-lg border border-solid border-slate-200 max-md:px-5 mt-6">
            <h2 className="text-2xl font-semibold tracking-tight leading-none text-neutral-800 max-md:max-w-full">Configuraciones de
                la cuenta</h2>
            <div className="flex flex-col mt-6 w-full max-md:max-w-full">
                <div className="flex flex-wrap gap-6 items-start w-full max-md:max-w-full">
                    <div className="flex flex-col min-w-[240px] w-[264px]">
                        <div
                            className="flex flex-col justify-center items-center p-8 max-w-full bg-rose-50 rounded w-[264px] max-md:px-5">
                            <div className="flex flex-col w-full text-sm font-medium tracking-normal leading-none text-white">
                                <div className="flex relative flex-col w-full aspect-square">
                                    <div className="flex relative flex-col w-full aspect-square">
                                        <div className="flex relative flex-col w-full aspect-square max-md:pt-24">
                                            <div onClick={handleImageClick} className="cursor-pointer">
                                                {imagePreview ? (
                                                    <img src={imagePreview} alt="Preview" className="object-cover z-0 w-full rounded-t-2xl h-[280px]" />
                                                ) : (
                                                    <InitialsImage name={formUser.current.name} />
                                                )}
                                            </div>
                                            <div className=" relative gap-2 justify-center items-end p-3 bg-black bg-opacity-50 hidden">
                                                <label htmlFor="file-upload" className="self-stretch my-auto cursor-pointer hidden">
                                                    Subir foto
                                                    <input ref={fileInputRef} className="hidden" id="file-upload" type="file" hidden onChange={handleFileChange} />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p className="mt-4 text-xs leading-4 text-center text-gray-600">El tamaño de la imagen debe ser inferior
                                a 1 MB y la relación de imagen debe ser 1:1.</p>
                        </div>

                    </div>
                    <div className="flex flex-col flex-1 shrink text-gray-600 basis-0 min-w-[240px] max-md:max-w-full">
                        <form className="flex flex-col w-full max-md:max-w-full" onSubmit={handleSubmit}>
                            <div className="flex flex-wrap gap-5 justify-center items-end w-full max-md:max-w-full">
                                <div className="flex overflow-hidden flex-col flex-1 shrink basis-9 min-h-[76px] min-w-[240px]">
                                    <label htmlFor="fullName" className="text-sm tracking-normal leading-loose">Nombre completo</label>
                                    <input
                                        type="text"
                                        id="fullName"
                                        name="name"
                                        defaultValue={formUser.current.name}
                                        onChange={handleForm}
                                        className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                        placeholder="Nombre"
                                    />
                                </div>
                                <input
                                    type="text"
                                    aria-label="Apellido"
                                    name="lastname"
                                    defaultValue={formUser.current.lastname}
                                    onChange={handleForm}
                                    className="overflow-hidden flex-1 shrink w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                    placeholder="Apellido"
                                />
                            </div>
                            <div className="flex overflow-hidden flex-col mt-5 w-full min-h-[76px] max-md:max-w-full">
                                <label htmlFor="username" className="text-sm tracking-normal leading-loose">Nombre de usuario</label>
                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    defaultValue={formUser.current.username}
                                    onChange={handleForm}
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                    placeholder="Nombre de usuario"
                                />
                            </div>
                            <div className="flex overflow-hidden flex-col mt-5 w-full whitespace-nowrap min-h-[76px] max-md:max-w-full">
                                <label htmlFor="email" className="text-sm tracking-normal leading-loose">Email</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    defaultValue={formUser.current.email}
                                    onChange={handleForm}
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                    placeholder="hola@mail.com"
                                />
                            </div>
                            <div className="flex overflow-hidden flex-col mt-5 w-full whitespace-nowrap min-h-[76px] max-md:max-w-full">
                                <label htmlFor="occupation" className="text-sm tracking-normal leading-loose">Ocupación</label>
                                <input
                                    type="text"
                                    id="occupation"
                                    name="occupation"
                                    defaultValue={formUser.current.occupation}
                                    onChange={handleForm}
                                    className="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0"
                                    placeholder="Estudiante"
                                />
                            </div>
                            <button
                                type='button'
                                onClick={handleSubmit}

                                className="gap-2.5 self-stretch px-5 py-2.5 mt-6 w-full text-sm font-semibold text-center text-teal-50 bg-rose-700 rounded-lg min-h-[40px]"
                            >
                                Salvar cambios
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div
                className="flex flex-col self-stretch font-semibold bg-white rounded-lg lg:border p-0 lg:p-8 lg:border-red-100 lg:border-solid mt-6">
                <h2 className="text-2xl tracking-tight leading-none text-neutral-800 max-md:max-w-full">Cambiar la contraseña</h2>
                <form className="flex flex-col mt-6 w-full max-md:max-w-full">
                    <div className="flex overflow-hidden flex-col w-full max-md:max-w-full">
                        <label for="current-password" className="text-sm tracking-normal leading-loose text-slate-600">Contraseña
                            actual</label>
                        <div
                            className="flex overflow-hidden flex-wrap flex-1  justify-center  mt-1.5 text-base text-gray-600 whitespace-nowrap bg-white rounded-lg border-solid size-full max-md:max-w-full">
                            <input type="password" id="current-password" placeholder="Contraseña" name='password' onChange={handleForm}
                                className="flex-grow py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
                        </div>
                    </div>
                    <div className="flex overflow-hidden flex-col mt-5 w-full  max-md:max-w-full">
                        <label for="new-password" className="text-sm tracking-normal leading-loose text-slate-600">Nueva
                            contraseña</label>
                        <div
                            className="flex overflow-hidden flex-wrap flex-1  justify-center  mt-1.5 text-base text-gray-600 whitespace-nowrap bg-white rounded-lg border-solid size-full max-md:max-w-full">
                            <input type="password" id="new-password" placeholder="Contraseña" name='newpassword' onChange={handleForm}
                                className="flex-grow py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
                        </div>
                    </div>
                    <div className="flex overflow-hidden flex-col mt-5 w-full  max-md:max-w-full">
                        <label for="confirm-password" className="text-sm tracking-normal leading-loose text-slate-600">Confirmar
                            Contraseña</label>
                        <div
                            className="flex overflow-hidden flex-wrap flex-1  justify-center  mt-1.5 text-base text-gray-600 whitespace-nowrap bg-white rounded-lg border-solid size-full max-md:max-w-full">
                            <input type="password" id="confirm-password" placeholder="Confirmar Contraseña" name='confirmnewpassword' onChange={handleForm}
                                className="flex-grow py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
                        </div>
                    </div>
                    <button type="button" onClick={handleSubmitPass}
                        className="gap-2.5 self-start px-5 py-2.5 mt-6 text-sm text-center text-teal-50 bg-rose-700 rounded-lg min-h-[40px]">
                        Salvar cambios
                    </button>
                </form>
            </div>

        </section>
    );
};

export default FormEstudiante;
