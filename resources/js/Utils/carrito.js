import axios from 'axios';
const opciones = {
  fecha: 'Fecha de entrega',
  horario: 'Horario de entrega',
  opcion: 'Tipo de Producto (Clasica, Premium, Deluxe)'
};

const verificarOpcionesFaltantes = (detallePedido) => {
  const faltantes = Object.keys(opciones).filter(opcion => detallePedido[opcion] === '');
  if (faltantes.length > 0) {
    const textFaltantes = faltantes.map(opcion => opciones[opcion]).join(', ');
    Swal.fire({
      icon: 'warning',
      title: 'Faltan opciones',
      text: `Por favor, complete ${textFaltantes} antes de continuar.`,
    });
    return true;
  }
  return false;
};



const obtenerDetalleProducto = (producto, resData) => {
  const { horario, complementos, fecha } = resData;
  
  return {
    id: producto.id,
    producto: producto.producto,
    precio: producto.descuento > 0 ? producto.descuento : producto.precio,
    imagen: `${producto.imagen}`  ,
    cantidad: 1,
    // fecha: fecha,
    // horario: horario,
    // complementos: complementos,
    // tipo: producto?.tipos?.name ?? 'Clasica',
    extract: producto.extract,
  };
};

const actualizarCarrito = (carrito, detalleProducto) => {
  const existeArticulo = carrito.some(item => item.id === detalleProducto.id);
  if (existeArticulo) {
    return carrito.map(item => {
      if (item.id === detalleProducto.id && !item.isCombo) {
        return {
          ...item,
          cantidad: item.cantidad ,
        };
      }
      return item;
    });
  } else {
    return [...carrito, detalleProducto];
  }
};

const agregarPedido = async (item) => {
  // if (verificarOpcionesFaltantes(detallePedido)) return;

  try {
    const res = await axios.post('/api/products/AddOrder', {id:item});
    if (res.status === 200) {
      const detalleProducto = obtenerDetalleProducto(res.data.producto, res.data);
      let carrito = Local.get('carrito') ?? [];
      carrito = actualizarCarrito(carrito, detalleProducto);
      Local.set('carrito', carrito);

      limpiarHTML();
      
      PintarCarrito();

      Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: 'Producto agregado correctamente al Carro de compras',
      });
    }
  } catch (error) {
    console.error(error);
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Hubo un error al agregar el pedido. Por favor, inténtelo de nuevo.',
    });
  }
};

function limpiarHTML() {
  //forma lenta 
  /* contenedorCarrito.innerHTML=''; */
  $('#itemsCarrito').html('')
  $('#itemsCarritoCheck').html('')


}
function PintarCarrito() {

  let articulosCarrito = Local.get('carrito')
  let itemsCarrito = $('#itemsCarrito')
  let itemsCarritoCheck = $('#itemsCarritoCheck')

  articulosCarrito.forEach(element => {


    let plantilla = `<tr class=" font-poppins border-b">
        <td class="p-2">
          <img src="/${element.imagen}" class="block bg-[#F3F5F7] rounded-md p-0 " alt="producto" onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';"  style="width: 100px; height: 75px; object-fit: contain; object-position: center;" />
        </td>
        <td class="p-2">
          <p class="font-semibold text-[14px] text-[#151515] mb-1">
            ${element.producto}
          </p>
          
        </td>
        <td class="p-2 text-end">
           <p class="font-semibold text-[14px] text-[#151515] w-max">

              S/${Number(element.precio)}
            </p>
          <button type="button" onClick="(deleteItem(${element.id} ))" class="w-6 h-6 flex justify-center items-center mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#272727" class="w-6 h-6">
              <path stroke="#272727" stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
          </button>

        </td>
      </tr>`

    itemsCarrito.append(plantilla)
    itemsCarritoCheck.append(plantilla)

  });
  mostrarTotalItems()
  calcularTotal()
}

function calcularTotal() {
  let articulos = Local.get('carrito')
  let total = articulos.map(item => {
    let total = 0
    total += item.cantidad * Number(item.precio)
    
    return total


  }).reduce((total, elemento) => total + elemento, 0);

  // const suma = total.
  

  $('#itemsTotal').text(`S/. ${total} `)

}

export { agregarPedido, limpiarHTML, PintarCarrito, calcularTotal, actualizarCarrito, obtenerDetalleProducto, verificarOpcionesFaltantes };