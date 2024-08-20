import{a as i}from"./axios-_sX4vCAy.js";const s=(r,e)=>({id:r.id,producto:r.producto,precio:r.descuento>0?r.descuento:r.precio,imagen:`${r.imagen}`,cantidad:1,extract:r.extract}),c=(r,e)=>r.some(t=>t.id===e.id)?r.map(t=>t.id===e.id&&!t.isCombo?{...t,cantidad:t.cantidad}:t):[...r,e],p=async r=>{try{const e=await i.post("/api/products/AddOrder",{id:r});if(e.status===200){const o=s(e.data.producto,e.data);let t=Local.get("carrito")??[];t=c(t,o),Local.set("carrito",t),n(),l(),Swal.fire({icon:"success",title:"Éxito",text:"Producto agregado correctamente al Carro de compras"})}}catch(e){console.error(e),Swal.fire({icon:"error",title:"Error",text:"Hubo un error al agregar el pedido. Por favor, inténtelo de nuevo."})}};function n(){$("#itemsCarrito").html(""),$("#itemsCarritoCheck").html("")}function l(){let r=Local.get("carrito"),e=$("#itemsCarrito"),o=$("#itemsCarritoCheck");r.forEach(t=>{let a=`<tr class=" font-poppins border-b">
        <td class="p-2">
          <img src="/${t.imagen}" class="block bg-[#F3F5F7] rounded-md p-0 " alt="producto" onerror="this.onerror=null;this.src='/images/img/noimagen.jpg';"  style="width: 100px; height: 75px; object-fit: contain; object-position: center;" />
        </td>
        <td class="p-2">
          <p class="font-semibold text-[14px] text-[#151515] mb-1">
            ${t.producto}
          </p>
          
        </td>
        <td class="p-2 text-end">
           <p class="font-semibold text-[14px] text-[#151515] w-max">

              S/${Number(t.precio)}
            </p>
          <button type="button" onClick="(deleteItem(${t.id} ))" class="w-6 h-6 flex justify-center items-center mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#272727" class="w-6 h-6">
              <path stroke="#272727" stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
          </button>

        </td>
      </tr>`;e.append(a),o.append(a)}),mostrarTotalItems(),d()}function d(){let e=Local.get("carrito").map(o=>{let t=0;return t+=o.cantidad*Number(o.precio),t}).reduce((o,t)=>o+t,0);$("#itemsTotal").text(`S/. ${e} `)}export{p as a};
