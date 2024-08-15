import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import BenefitSlide from '../Benefits/BenefitSlide';

const SliderBenefit = ({ benefits }) => {
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
                        <BenefitSlide {...benefit} />
                    </SwiperSlide>
                })
            }
        </Swiper>
    );
};



export default SliderBenefit;