import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';

const SliderFront = ({ sliders }) => {

  const onFormSubmit = (e) => {
    e.preventDefault()
    const input = $(e.target).find('[name="search"')
    location.href = `/catalogoGestion?search=${input.val()}`
  }
  
  return (
    <Swiper
      className="slider"
      slidesPerView={1}
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
          slidesPerView: 1,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 1,
        },
      }}
    >
      {
        sliders.map((slider, i) => {
          
          return <SwiperSlide key={`slider-${i}`}>
            <div className="gap-3 md:gap-10 xl:gap-20 bg-no-repeat object-top bg-center bg-cover w-full px-[5%] h-full 2md:h-[600px] xl:h-[650px] flex flex-col 2md:flex-row items-center"
              style={{ backgroundImage: `url('/${slider.url_image}${slider.name_image}')` }}>
              <div className="flex flex-col justify-center items-start gap-2 w-full xl:w-1/2 pt-28 xl:pt-24 xl:pb-6">
                
                <div className="flex flex-col gap-5 items-start px-0 lg:px-[2%]">
                    <h2 className='text-4xl xl:text-5xl 2xl:text-[56px] text-white font-Montserrat_Bold leading-tight xl:line-clamp-4'>{slider.title}</h2>
                    <p className='text-base text-white font-Montserrat_Regular leading-snug xl:line-clamp-3'>{slider.description}</p>
                    {
                      slider.botontext1 &&
                      <a href={slider.link1}><div className='bg-[#F19905] px-6 py-2 rounded-3xl text-white font-Montserrat_SemiBold'><span>{slider.botontext1}</span></div></a>
                    }
                </div>
                
                {/* <div className='flex flex-row justify-start items-center px-0 lg:px-[2%] mt-10'>
                  <div className='flex flex-col gap-2 bg-white rounded-2xl px-4 py-3 max-w-sm'>
                      <div className='flex flex-row gap-2'>
                            <img className='w-10 h-10 rounded-full' src="images/academia/userf.png" alt="usuario"/>
                          <div>
                              <h2 className='font-Montserrat_SemiBold text-base text-[#112437]'>Ana López</h2>
                              <p className='font-Montserrat_Regular text-sm  text-[#112437] -mt-1'>Estudiante de Medicina</p>
                          </div>
                      </div>
                      <p className='font-Montserrat_Regular text-[#112437] text-sm'>"Gracias a esta plataforma, aprobé mi examen de residencia con una gran base en cirugía general. Residencia con una gran base en cirugía general"</p>
                  </div>
                </div> */}


              </div>

              <div className="flex flex-row justify-start items-center w-full xl:w-1/2 relative min-h-[400px] h-full">
                  
                    <ul className="planetas mt-20 w-full">
                      <li>
                          <picture>
                              <img src="images/academia/rayas.png" alt="Sistemas solar"/>
                          </picture>
                      </li>
                      <li>
                          <picture>
                              <img src="images/academia/circulo_1.png" alt="Planeta " />
                          </picture>
                      </li>
                      <li>
                          <picture>
                              <img src="images/academia/circulo_2.png" alt="Planeta " />
                          </picture>
                      </li>
                      <li>
                          <picture>
                              <img src="images/academia/circulo_3.png" alt="Planeta " />
                          </picture>
                      </li>
                      <li>
                          <picture>
                              <img src="images/academia/circulo_4.png" alt="Planeta " />
                          </picture>
                      </li>
                      <li>
                          <picture>
                              <img src="images/academia/circulo_5.png" alt="Planeta " />
                          </picture>
                      </li>
                    </ul>
                    
                    <div className='absolute bottom-0  left-0 sm:translate-x-1/2 2md:translate-x-0'>
                      <div className='flex flex-row justify-center items-end w-full'>
                        <img
                          loading="lazy"
                          src={`/${slider.url_image_second}${slider.name_image_second}`}
                          className="object-contain w-80 2md:w-[500px] aspect-[540/630]"
                          alt={slider.title}
                          onError={e => e.target.src = '/images/academia/imagenbanner.png'}
                        />
                      </div>
                    </div>
              </div>

            </div>
          </SwiperSlide>
        })
      }
    </Swiper>

  );
};



export default SliderFront;

{/* <div className="gap-20 bg-no-repeat object-top bg-center bg-cover w-full px-[5%] h-[600px] xl:h-[650px] flex flex-row items-center"
              style={{ backgroundImage: `url(/${slider.url_image}${slider.name_image})` }}>
              <div className="flex flex-row justify-center items-center gap-2 w-full xl:w-2/3 py-12 lg:py-24">
                
              
                <div className="flex flex-col gap-5 lg:gap-10 items-start px-0 lg:px-[2%]">
                  <h2 className='text-white text-3xl sm:text-5xl md:text-6xl tracking-normal font-poppins_black font-bold uppercase' style={{ textShadow: '0 0 20px rgba(0, 0, 0, .25)' }}>
                    {slider.title}
                  </h2>
                  <p className="text-white text-lg tracking-wider font-poppins_light font-normal" style={{ textShadow: '0 0 20px rgba(0, 0, 0, .25)' }}>
                    {slider.description}
                  </p>
                  <div className="flex flex-row gap-5 md:gap-10 justify-center items-start">
                    <a href={slider.link1}
                      className="bg-[#CF072C] border-2 border-[#CF072C] flex flex-row items-center gap-3 text-white px-3 md:px-6 py-3 text-base font-poppins_semibold rounded-2xl tracking-wide">
                      {slider.botontext1}
                      <i className="ms-1 fa-solid fa-arrow-right"></i>
                    </a>
                    {
                      slider.botontext2 &&
                      <a href={slider.link2}
                        className="bg-transparent border-2 border-white hover:bg-[#CF072C] hover:border-[#CF072C] flex flex-row items-center gap-3 text-white px-3 md:px-6 py-3 text-base font-poppins_semibold rounded-2xl tracking-normal">
                        {slider.botontext2}
                        <i className="ms-1 fa-solid fa-arrow-right"></i>
                      </a>
                    }
                  </div>
                  
                  
                  <form onSubmit={onFormSubmit} id="tab1" className="flex flex-col sm:flex-row py-2 md:py-4 px-4 tab-content bg-white justify-between items-center gap-2 rounded-2xl w-full md:max-w-[700px]">

                    <div className="w-full">
                      <div className="relative w-full text-left flex flex-col justify-center items-center">
                        <input name='search' type="text" className='w-full py-3 px-3 text-base font-poppins_regular font-semibold text-[#2D464C] border-0 focus:border-0 focus:ring-0' placeholder='En que curso estas interesado?' required />
                      </div>
                    </div>

                    <div className="flex justify-start items-center ml-3">
                      <div
                        className="flex flex-row-reverse 2md:flex-row justify-center items-center">
                        <div className="flex flex-row justify-start items-center w-auto">
                          <button id="linkExplirarAlquileres"
                            className="bg-[#CF072C] rounded-lg font-poppins_semibold font-medium text-white px-0 md:px-6 py-0 md:py-3 text-center h-full inline-block">
                            <i className="fa-solid fa-magnifying-glass"></i>
                            Buscar
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>


                </div>
              </div>
            </div> */}