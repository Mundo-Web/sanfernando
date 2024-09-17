<div onclick="openSearch()"
  class="cursor-pointer flex gap-1.5 items-center self-stretch p-2.5 my-auto w-10 h-10 bg-red-100 rounded-[57px]">
  <img loading="lazy"
    src="https://cdn.builder.io/api/v1/image/assets/TEMP/995e42d883b4ad4ad14f887f23504fcf5af2557fc95c8d33c27cb17fed7fef65?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
    alt="" class="object-contain self-stretch my-auto w-5 aspect-square hover:scale-125 transition-transform" />
</div>
<div id="myOverlay" class="overlay" style="z-index: 200;">
  <span class="closebtn" onclick="closeSearch()">×</span>
  <div class="overlay-content w-3/4 md:w-1/2 z-30">
    <form>
      <input type="text" placeholder="Buscar.." name="search" id="buscarproducto" class="rounded-2xl ">
    </form>
    <div id="resultados" class="bg-white p-[1px] rounded-xl  overflow-y-auto max-h-[300px]"></div>
  </div>
</div>
<script>
  function openSearch() {
    document.getElementById("myOverlay").style.display = "block";

  }

  function closeSearch() {
    document.getElementById("myOverlay").style.display = "none";
  }

  function imagenError(image) {
    image.onerror = null; // Previene la posibilidad de un bucle infinito si la imagen de error también falla
    image.src = '/images/img/noimagen.jpg'; // Establece la imagen de error
  }

  $('#buscarproducto').keyup(function() {

    clearTimeout(clockSearch);
    var query = $(this).val().trim();

    if (query !== '') {
      clockSearch = setTimeout(() => {
        $.ajax({
          url: '{{ route('buscar') }}',
          method: 'POST',
          data: {
            query: query
          },
          success: function(data) {
            console.log(data)
            var resultsHtml = '';
            var url = '{{ asset('') }}';
            data.resultado.forEach(function(result) {
              const price = Number(result.precio) || 0
              const discount = Number(result.descuento) || 0
              resultsHtml += `<a href="/detalleCurso/${result.id}">
              <div class="w-full flex flex-row py-3 px-5 hover:bg-slate-200">
                <div class="w-[10%]">
                  <img class="w-14 rounded-md" src="${url}${result.imagen}" onerror="imagenError(this)" />
                </div>
                <div class="flex flex-col justify-center w-[70%]">
                  <h2 class="text-left">${result.producto}</h2>
                  <p class="text-text12 text-left">Categoría</p>
                </div>
                <div class="flex flex-col justify-center w-[10%]">
                  <p class="text-right w-max">S/ ${discount > 0 ? discount.toFixed(2) : price.toFixed(2)}</p>
                  ${discount > 0 ? `<p class="text-text12 text-right line-through text-slate-500 w-max">S/ ${price.toFixed(2)}</p>` : ''}
                </div>
              </div>
            </a>`;
            });

            $('#resultados').html(resultsHtml);
          }
        });

      }, 300);

    } else {
      $('#resultados').empty();
    }
  });
</script>
