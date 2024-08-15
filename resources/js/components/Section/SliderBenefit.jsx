import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';

const SliderBenefit = ({ benefits }) => {
    // const backgroundImage = item.name_image
    // ? `url(${process.env.PUBLIC_URL + '/' + item.url_image + item.name_image})`
    // : `url(${process.env.PUBLIC_URL + '/images/img/noimagenslider.jpg'})`;
    const icono1 = 'images/img/gp_icono1.png';
    const icono2 = 'images/img/gp_icono2.png';
    const icono3 = 'images/img/gp_icono3.png';
    const icono4 = 'images/img/gp_icono4.png';
    return (
        <Swiper
            className="beneficios"
            slidesPerView={3}
            spaceBetween={20}
            loop={true}
            grabCursor={true}
            centeredSlides={false}
            initialSlide={0}
            navigation={{
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            }}
            pagination={{
                el: ".swiper-pagination",
            }}
            breakpoints={{
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1350: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            }}>
            {
                benefits.map((benefit, i) => {
                    return <SwiperSlide key={`benefit-${i}`}>
                        <article className="flex gap-4 items-start min-w-[240px]">
                            <img
                                loading="lazy"
                                src={`/${benefit.icono}`}
                                className="object-contain shrink-0 w-10 aspect-square"
                                alt={`Icono ${benefit.titulo}`}
                                onError={e => e.target.src = '/images/img/nobenefit.png'}
                            />
                            <div className="flex flex-col">
                                <h2 className="text-lg font-poppins_semibold leading-tight">{benefit.titulo}</h2>
                                <p className="mt-2 text-base leading-5">
                                    {benefit.descripcionshort}
                                </p>
                            </div>
                        </article>
                    </SwiperSlide>
                })
            }
            <SwiperSlide>
                <article className="flex gap-4 items-start min-w-[240px]">
                    <img
                        loading="lazy"
                        src={`${icono1}`}
                        className="object-contain shrink-0 w-10 aspect-square"
                        alt="Ética y transparencia icon"
                    />
                    <div className="flex flex-col">
                        <h2 className="text-lg font-poppins_semibold leading-tight">Ética y transparencia</h2>
                        <p className="mt-2 text-base leading-5">
                            Promoción de la integridad y la honestidad en todas las actividades.
                        </p>
                    </div>
                </article>
            </SwiperSlide>
            <SwiperSlide>
                <article className="flex gap-4 items-start min-w-[240px]">
                    <img
                        loading="lazy"
                        src={`${icono2}`}
                        className="object-contain shrink-0 w-10 aspect-square"
                        alt="Innovación"
                    />
                    <div className="flex flex-col">
                        <h2 className="text-lg font-poppins_semibold leading-tight">Innovación</h2>
                        <p className="mt-2 text-base leading-5">
                            Fomento de la creatividad y la adaptabilidad para enfrentar los desafíos actuales.
                        </p>
                    </div>
                </article>
            </SwiperSlide>
            <SwiperSlide>
                <article className="flex gap-4 items-start min-w-[240px]">
                    <img
                        loading="lazy"
                        src={`${icono3}`}
                        className="object-contain shrink-0 w-10 aspect-square"
                        alt="Colaboración"
                    />
                    <div className="flex flex-col">
                        <h2 className="text-lg font-poppins_semibold leading-tight">Colaboración</h2>
                        <p className="mt-2 text-base leading-5">
                            Trabajo en equipo y cooperación para lograr objetivos comunes.
                        </p>
                    </div>
                </article>
            </SwiperSlide>
            <SwiperSlide>
                <article className="flex gap-4 items-start min-w-[240px]">
                    <img
                        loading="lazy"
                        src={`${icono4}`}
                        className="object-contain shrink-0 w-10 aspect-square"
                        alt="Ética y transparencia icon"
                    />
                    <div className="flex flex-col">
                        <h2 className="text-lg font-poppins_semibold leading-tight">Ética y transparencia</h2>
                        <p className="mt-2 text-base leading-5">
                            Promoción de la integridad y la honestidad en todas las actividades.
                        </p>
                    </div>
                </article>
            </SwiperSlide>
        </Swiper>

    );
};



export default SliderBenefit;