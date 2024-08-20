import React from 'react';
import { agregarPedido } from '../../Utils/carrito.js'
import axios from 'axios';



const FavoritosEstudiante = ({ Wishlist, user }) => {


  const handleComprarAhora = async (id) => {
    console.log('comprar ahora')
    await agregarPedido(id)
    window.location.href = '/carrito'
  }
  const handleAddWishlist = async (id) => {
    // e.preventDefault();
    try {
      const response = await axios.post('micuenta/wishList', {
        _token: document.querySelector('input[name="_token"]').value,
        product_id: id
      });

      // Cambiar el color del botón
      /*  const button = document.getElementById('addWishlist');
       if (response.data.message === 'Producto agregado a la lista de deseos') {
         button.classList.remove('bg-[#99b9eb]');
         button.classList.add('bg-[#0D2E5E]');
       } else {
         button.classList.remove('bg-[#0D2E5E]');
         button.classList.add('bg-[#99b9eb]');
       } */

      Swal.fire({
        icon: 'success',
        title: response.data.message,
        showConfirmButton: false,
        timer: 1500
      });
    } catch (error) {
      console.log(error);
    }
  }

  return (

    <div className="flex flex-col !font-poppins_regular mt-10">
      <div
        className="hidden lg:flex flex-wrap gap-10 justify-between items-center w-full text-sm font-medium leading-none uppercase text-neutral-800 max-md:max-w-full">
        <h2 className="self-stretch my-auto w-[496px] max-md:max-w-full">Curso o diplomado</h2>
        <p className="self-stretch my-auto w-[130px]">Precio</p>
        <p className="self-stretch my-auto w-[356px]">Acción</p>
      </div>
      {console.log(Wishlist)}

      {Wishlist.length > 0 ? (
        <>
          {Wishlist.map((course) => (
            <article key={course.id} className="flex flex-wrap gap-10 justify-between items-center mt-6 w-full max-md:max-w-full">
              <div className="flex flex-wrap gap-5 items-start self-stretch my-auto min-w-[240px] max-md:max-w-full">
                <img
                  loading="lazy"
                  src={`/${course.products.imagen}`}
                  className="object-contain shrink-0 rounded-lg aspect-square w-[120px]"
                  alt="Course thumbnail"
                />
                <div className="flex flex-col justify-between min-h-[119px] min-w-[240px] w-[356px]">
                  <div className="flex flex-col w-full max-w-[356px]">
                    <div className="flex gap-1.5 justify-center items-center self-start text-sm tracking-normal">
                      {/* <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/cb0a665c6aa4e8a830536cc611f92fc27dd3f8c32e1401d428f0aae05a12fd01?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square"
                        alt="Rating star icon"
                      /> */}
                      <div className="flex items-center self-stretch my-auto">
                        {/* <p className="self-stretch my-auto font-medium leading-none text-gray-600">4.6</p>
                        <p className="self-stretch my-auto leading-loose text-red-300">(451,444 Reseñas)</p> */}
                      </div>
                    </div>
                    <h3 className="mt-2 text-base font-medium leading-6 text-neutral-800">
                      {course.products.producto}
                    </h3>
                  </div>
                  <p className="flex gap-1.5 items-start mt-6 text-sm tracking-normal leading-loose text-gray-600">
                    {course.products.docentes.length > 0 && (<span className="text-red-300">Curso impartido por:</span>)}

                    {course.products.docentes && course.products.docentes.map((docente) => (<> <span>{docente.nombre}</span>
                      <span className="text-gray-600">•</span></>))}

                  </p>
                </div>
              </div>
              <div className="flex gap-1 items-center self-stretch my-auto whitespace-nowrap">
                {course.products.descuento > 0 ? (
                  <>
                    <p className="self-stretch my-auto text-xl font-medium leading-tight text-neutral-800">
                      {course.products.descuento}
                    </p>
                    <p className="self-stretch my-auto text-lg tracking-tight leading-none text-red-300">
                      {course.products.precio}
                    </p>
                  </>
                ) : (
                  <p className="self-stretch my-auto text-lg tracking-tight leading-none text-neutral-800">
                    {course.products.precio}
                  </p>
                )}
              </div>
              <div className="flex gap-3 items-center self-stretch my-auto min-w-[240px] w-[352px]">
                <a className="flex-1 shrink gap-2.5 self-stretch px-4 py-2.5 my-auto text-sm font-semibold text-center text-teal-50 bg-red-700 rounded-lg min-h-[40px]"
                  onClick={() => handleComprarAhora(course.products.id)}
                >
                  Comprar Ahora
                </a>
                <button className="flex-1 shrink gap-2.5 self-stretch px-2.5 py-2.5 my-auto text-sm font-semibold text-center text-teal-50 bg-red-400 rounded-lg basis-3.5 min-h-[40px]" onClick={() => agregarPedido(course.products.id)}>
                  Agregar al carrito
                </button>
                <button
                  className="flex gap-3.5 items-center justify-center self-stretch p-2.5 my-auto w-10 h-10 bg-red-100 rounded-lg"
                  aria-label="Add to favorites"
                  onClick={() => handleAddWishlist(course.products.id)}
                >
                  <img
                    loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/1f813abc3108b9161f9ce8e79c24fe828196c8ce42c6d7c5c10b4fbdb73b6cd1?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    className="object-contain w-5 aspect-square"
                    alt="Heart icon"
                  />
                </button>
              </div>
            </article>
          ))}
        </>
      ) : (
        <p>No hay cursos en tu lista de deseos.</p>
      )}

      <hr className="mt-6 w-full border border-solid bg-slate-200 border-slate-200 min-h-[1px] max-md:max-w-full" />

    </div>
  );
};

export default FavoritosEstudiante;
