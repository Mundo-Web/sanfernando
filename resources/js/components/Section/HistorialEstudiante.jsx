import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { format } from 'date-fns';
import { es } from 'date-fns/locale';

const HistorialEstudiante = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [items, setItems] = useState([]);
  const [openIndex, setOpenIndex] = useState(null);
  const [isloadingContent, setIsLoadingContent] = useState(false);

  const toggleContent = (index) => {
    setOpenIndex(openIndex === index ? null : index);
  };

  const formatDate = (isoDate) => {
    const date = new Date(isoDate);
    return format(date, "d 'de' MMMM, yyyy - hh:mm a", { locale: es });
  };

  const getSales = async () => {
    setIsLoadingContent(true);
    try {
      const response = await axios.post('/api/sales/paginate');
      setItems(response.data.data); // Asumiendo que la respuesta es un array de objetos

      setIsLoadingContent(false);
    } catch (error) {
      console.error('Error fetching sales data:', error);
    }
  };

  useEffect(() => {

    getSales();
  }, []);

  return (
    <div className="flex flex-col">
      {isloadingContent && <div role="status" className='text-center mt-4'>
        <svg aria-hidden="true" class="inline w-14 h-14 text-gray-200 animate-spin dark:text-gray-600 fill-red-700" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
          <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
        <span class="sr-only">Loading...</span>
      </div>}
      {items.map((item, index) => (
        <div key={index}>
          <div
            className="flex flex-wrap gap-10 justify-between items-center p-6 w-full bg-white border-b border-solid border-b-red-100 max-md:px-5 max-md:max-w-full"
            onClick={() => toggleContent(index)}>
            <div className="flex flex-col self-stretch my-auto min-w-[240px]">
              <time datetime={item.datetime} className="text-lg tracking-tight leading-none text-neutral-800">
                {formatDate(item.created_at)}
              </time>
              <div className="flex gap-4 items-start mt-3 text-sm tracking-normal leading-loose text-gray-600">
                <div className="flex gap-1.5 items-center">
                  <img
                    loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/2071f385233415c62d178f92a37624fd99a448535c4319675b40dde235489979?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    alt=""
                    className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square"
                  />
                  <span className="self-stretch my-auto">{item.detalle_sale.length} curso(s)</span>
                </div>
              </div>
            </div>
            {openIndex === index ? (
              <button
                className="flex gap-4 items-center self-stretch p-3 my-auto w-12 h-12 bg-rose-700 rounded-lg"
                aria-label="Action button">
                <img
                  loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/e9ace913622ef221e52438aba24fc54397fdaf07ae1e8fb8dd6afc959b93b3bc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                  alt=""
                  className="object-contain w-6 aspect-square"
                />
              </button>
            ) : (
              <button
                className="flex gap-4 items-center self-stretch p-3 my-auto w-12 h-12 bg-red-100 rounded-lg"
                aria-label="Action button">
                <img
                  loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/9eaa2ec66d0e4eb050f0e64a2b70c2020aba8eac19c2414ea2147f73e54816b7?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                  alt=""
                  className="object-contain w-6 aspect-square"
                />
              </button>
            )}
          </div>
          {openIndex === index && (
            <div className="animate-flip-down flex flex-col w-full border border-red-100 border-solid max-md:max-w-full">
              <div className="flex flex-wrap gap-10 justify-between items-center px-6 pt-6 pb-4 w-full bg-white max-md:px-5 max-md:max-w-full">
                <div className="flex flex-col self-stretch my-auto min-w-[240px]">
                  <div className="flex gap-4 items-start mt-3 text-sm tracking-normal leading-loose text-gray-600"></div>
                </div>
              </div>
              <div className="flex flex-wrap gap-6 px-6 w-full bg-white max-md:px-5 max-md:max-w-full">
                <section className="flex flex-col py-6 my-auto min-w-[240px] w-[594px] max-md:max-w-full gap-4">
                  {item.detalle_sale.map((detalle, index) => (
                    <div key={index} className="flex flex-wrap gap-10 justify-center items-center w-full max-md:max-w-full">
                      <div className="flex gap-5 items-start self-stretch my-auto min-w-[240px] max-md:max-w-full">
                        <img
                          loading="lazy"
                          src={`/${detalle.product_image}`}
                          alt="Course thumbnail"
                          className="object-cover shrink-0 aspect-square w-[120px] shadow-xl"
                        />
                        <div className="flex flex-col justify-between min-h-[119px] min-w-[240px] w-[312px]">
                          <div className="flex flex-col w-full max-w-[312px]">
                            <a href={`/micuenta/session/${detalle.product.uuid}`}>
                              <h3 className="mt-2 text-base leading-6 text-neutral-800 font-semibold">
                                {detalle.product_name}
                              </h3>
                            </a>
                          </div>
                          <p className="flex gap-1.5 items-start self-start mt-6 text-sm tracking-normal leading-loose">
                            <span className="text-red-300">Curso impartido por:</span>
                            {detalle.product.docentes.map((profe, index) => (
                              <React.Fragment key={index}>
                                • {' ' + profe.nombre + ' '}
                              </React.Fragment>
                            ))}
                          </p>
                        </div>
                      </div>
                      <p className="self-stretch my-auto text-xl font-medium leading-tight text-rose-700">
                        S/ {detalle.price}
                      </p>
                    </div>
                  ))}
                </section>
                <aside className="flex flex-col flex-1 shrink justify-center py-6 pl-6 bg-white border-l border-solid basis-0 border-l-slate-200 border-slate-200 min-w-[240px]">
                  <div className="flex flex-col w-full">
                    <time
                      datetime="2024-04-01T11:30:00"
                      className="text-2xl font-semibold tracking-tight leading-none text-neutral-800 max-md:max-w-full">
                      {formatDate(item.created_at)}
                    </time>
                    <div className="flex gap-4 items-start self-start mt-3 text-sm tracking-normal leading-loose text-gray-600">
                      <div className="flex gap-1.5 items-center">
                        <img
                          loading="lazy"
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/eb24fb05b564fc8d4a983b40c709b0e2fd61b801810abcce3adfcd405ec168d0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                          alt=""
                          className="object-contain shrink-0 self-stretch my-auto w-5 aspect-square"
                        />
                        <span className="self-stretch my-auto">{item.detalle_sale.length}curso</span>
                      </div>
                      <div className="flex gap-1.5 items-center">
                        <span className="text-[16px] text-[#4484eb]"> S/</span>
                        <span className="self-stretch my-auto">{item.total} PEN</span>
                      </div>
                    </div>
                  </div>
                  <div className="flex justify-between items-center mt-6 w-full text-sm tracking-normal leading-loose text-gray-600">
                    <span className="self-stretch my-auto w-[250px]">
                      {item.name} {item.lastname}
                    </span>
                  </div>
                </aside>
              </div>
            </div>
          )}
        </div>
      ))}
    </div>
  );
};

export default HistorialEstudiante;