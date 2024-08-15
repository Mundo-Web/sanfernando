import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import 'swiper/swiper-bundle.css';

const SliderTestimony = ({ testimonies }) => {
  const iconocomillas = 'images/svg/comillas_gp.svg';

  return (
    <div className="swiper myTestimonios">
      <Swiper
        slidesPerView={1}
        spaceBetween={20}
        loop={true}
        grabCursor={false}
        centeredSlides={false}
        initialSlide={0}
        speed={1000}
        pagination={{
          el: '.swiper-pagination-testimonios',
          clickable: true,
        }}
        navigation={{
          nextEl: '.next-testimonios',
          prevEl: '.prev-testimonios',
        }}
        autoplay={{
          delay: 3000,
          disableOnInteraction: false,
        }}
      >
        {
          testimonies.map((testimony, i) => {
            return <SwiperSlide>
              <div className="bg-[#FFF0F0] relative p-5 lg:p-8 gap-3 flex flex-col rounded-xl h-auto">
                <img className="w-12" src={`${iconocomillas}`} alt="Comillas" />
                <p className="text-[#1D2026] text-lg lg:text-xl font-poppins_regular">
                  {testimony.testimonie}
                </p>
                <p>- {testimony.ocupation}</p>
              </div>
            </SwiperSlide>
          })
        }
      </Swiper>

      <div className="flex flex-row gap-3 mt-3">
        <div className="prev-testimonios cursor-pointer bg-[#FF9799] px-5 py-4 text-[#CF072C] rounded-full text-xl group hover:bg-[#CF072C]">
          <i className="fa-solid fa-arrow-left group-hover:text-white"></i>
        </div>
        <div className="next-testimonios cursor-pointer bg-[#FF9799] px-5 py-4 text-[#CF072C] rounded-full text-xl group hover:bg-[#CF072C]">
          <i className="fa-solid fa-arrow-right group-hover:text-white"></i>
        </div>
      </div>
    </div>
  );
};

export default SliderTestimony;
