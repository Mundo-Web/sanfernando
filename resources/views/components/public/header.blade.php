@php
  $pagina = Route::currentRouteName();
  $isIndex = $pagina == 'index';
@endphp


<style>
  nav a .underline-this {
    position: relative;
    overflow: hidden;
    display: inline-block;
    text-decoration: none;
    /* padding-bottom: 4px; */
  }

  nav a .underline-this::before,
  nav a .underline-this::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #FF5E14;
    transform: scaleX(0);
    transition: transform 0.3s ease;
  }

  nav a .underline-this::after {
    transform-origin: right;
  }

  nav a:hover .underline-this::before,
  nav a:hover .underline-this::after {
    transform: scaleX(1);
  }

  nav a:hover .underline-this::before {
    transform-origin: left;
  }

  nav li {
    padding: 0 !important;
    margin: 0 !important;
  }

  .jquery-modal.blocker.current {
    z-index: 30;
  }
</style>

<style>
  .bg-image {
    background-image: url('');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 900;
  }
</style>

{{-- <img src="{{ asset('images/contacto.png') }}" class="absolute top-0 left-0 w-full z-[99999] opacity-30"></img> --}}

<div class="navigation shadow-xl px-5" style="z-index: 9999; background-color: #fff !important">
  <button aria-label="hamburguer" type="button" class="hamburger" id="position" onclick="show()">
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M18 2L2 18M18 18L2 2" stroke="#272727" stroke-width="2.66667" stroke-linecap="round" />
    </svg>
  </button>
  <nav class="w-full h-full overflow-y-auto p-8" x-data="{ openCatalogo: true, openSubMenu: null }">
    <ul class="space-y-1">
      <li>
        <a href="/"
          class="text-[#272727] font-medium font-poppins text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $isIndex ? 'text-[#FF5E14]' : '' }}">
          <span class="underline-this">
            <svg
              class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            INICIO
          </span>
        </a>
      </li>
      <li>
        <a @click="openCatalogo = !openCatalogo" href="javascript:void(0)"
          class="text-[#272727] flex justify-between items-center font-medium font-poppins text-sm py-2 px-3 hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'catalogo' ? 'text-[#FF5E14]' : '' }}">
          <span class="underline-this">
            <svg
              class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
              <path
                d="M15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783ZM6 2h6a1 1 0 1 1 0 2H6a1 1 0 0 1 0-2Zm7 5H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Z" />
              <path
                d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
            </svg>
            PRODUCTOS
          </span>
          <span :class="{ 'rotate-180': openCatalogo }"
            class="ms-1 inline-block transform transition-transform duration-300">↓</span>
        </a>
        <ul x-show="openCatalogo" x-transition class="ml-3 mt-1 space-y-1 border-l border-gray-300">
          <li>
            <a href="{{ route('Catalogo.jsx') }}"
              class="text-[#272727] flex items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300">
              <span class="underline-this">
                Todas las categorías

              </span>

            </a>
            @if (count($categorias) > 0)


              @foreach ($categorias as $item)
                <a href="/catalogo/{{ $item->id }}"
                  class="text-[#272727] flex items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300"
                  @click="openCategories[{{ $item->id }}] = !openCategories[{{ $item->id }}]">
                  <span>{{ $item->name }}</span>
                  {{--  <svg class="w-5 h-5 transform transition-transform"
                            :class="{ 'rotate-180': openCategories[{{ $item->id }}] }" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                          </svg> --}}
                </a>

                {{-- <div x-show="openCategories[{{ $item->id }}]"
                        class="p-4 border border-t-0 border-gray-200 space-y-4">
                        @foreach ($item->subcategories as $subitem)
                          <label for="item-category-{{ $subitem->id }}"
                            class="text-custom-border flex flex-row gap-2 items-center cursor-pointer">
                            <a href="/catalogo/{{ $subitem->id }}" id="item-category-{{ $subitem->id }}"
                              name="category"
                              class=" rounded-sm border-none text-[#272727] flex items-center py-2 px-3 hover:opacity-75 transition-opacity duration-300"
                              value="{{ $subitem->id }}">
                              {{ $subitem->name }}
                            </a>
                          </label>
                        @endforeach
                      </div> --}}
              @endforeach

            @endif
          </li>

        </ul>
      </li>
      @if ($blog > 0)
        <li>
          <a href="/blog/0"
            class="text-[#272727] font-medium font-poppins text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'contacto' ? 'text-[#FF5E14]' : '' }}">
            <span class="underline-this">
              <svg
                class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                <path
                  d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z" />
              </svg>
              BLOG
            </span>
          </a>
        </li>
      @endif
      <li>
        <a href="/contacto"
          class="text-[#272727] font-medium font-poppins text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'contacto' ? 'text-[#FF5E14]' : '' }}">
          <span class="underline-this">
            <svg
              class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M19 4h-1a1 1 0 1 0 0 2v11a1 1 0 0 1-2 0V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a1 1 0 0 0-1-1ZM3 4a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4Zm9 13H4a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-3H4a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-3H4a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-3h-2a1 1 0 0 1 0-2h2a1 1 0 1 1 0 2Zm0-3h-2a1 1 0 0 1 0-2h2a1 1 0 1 1 0 2Z" />
              <path d="M6 5H5v1h1V5Z" />
            </svg>
            CONTACTO
          </span></a>
      </li>

      @if ($tags->count() > 0)
        @foreach ($tags as $item)
          <li>
            <a href="/catalogo?tag={{ $item->id }}"
              class="text-[#272727] font-medium font-poppins text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'contacto' ? 'text-[#FF5E14]' : '' }}">
              <span class="underline-this  ">
                {{ $item->name }} </span>
            </a>

          </li>
        @endforeach

      @endif
    </ul>
  </nav>

</div>


<header class="font-poppins_regular">
  {{-- @foreach ($datosgenerales as $item)
    <div class="bg-[#0F1F38] h-[44px] flex lg:justify-between justify-center w-full px-[5%] xl:px-[8%] py-2 text-sm items-center">
      <div class="text-white text-start flex gap-3">
        <h3>
          Teléfono: {{ $item->cellphone }}
        </h3>
        <div>|</div>
        <a href="#">
          Email: contacto@egespp
        </a>
      </div>

      <div class="text-white text-end hidden lg:flex">
        @if (Auth::user() == null)
          <a href="/login">Log In </a> / <a href="/register">Sign Up</a>
        @endif
      </div>
    </div>
  @endforeach --}}

  <section
    class="flex flex-wrap gap-10 justify-between items-center px-[8%] py-2 border border-solid bg-slate-900 border-teal-800 border-opacity-10 max-md:px-5">
    <div
      class="hidden md:flex gap-4 items-start self-stretch my-auto text-sm tracking-normal leading-7 text-center min-w-[240px] text-slate-100">

      <p>Teléfono: {{ $datosgenerales->cellphone }}</p>
      <p>Email: {{ $datosgenerales->email }}</p>
    </div>
    <nav class="flex gap-4 items-center self-stretch my-auto mx-auto md:mx-0">
      {{-- <a href="#" aria-label="Social Media Link 1">
        <img loading="lazy"
          src="https://cdn.builder.io/api/v1/image/assets/TEMP/8693f932039c2e8c0a816be060e78697a7a02b21edbfbfcf31bd73f4123f53bf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
          alt="" class="object-contain shrink-0 w-6 aspect-square" />
      </a>
      <a href="#" aria-label="Social Media Link 2">
        <img loading="lazy"
          src="https://cdn.builder.io/api/v1/image/assets/TEMP/e1adcb46e083a4104243cc7858289a099b773ab8ae97b361c2a565e5498fd619?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
          alt="" class="object-contain shrink-0 w-6 aspect-square" />
      </a> --}}
      @if (Auth::user() == null)
        <a href="/login" class="text-white">Iniciar Sesion </a> </a>
      @else
        <div class=" relative text-white  hidden md:inline-flex" x-data="{ open: false }">
          <button class="px-3 py-2 inline-flex justify-center items-center group" aria-haspopup="true"
            @click.prevent="open = !open" :aria-expanded="open">
            <div class="flex items-center truncate">
              <span id="username"
                class="truncate ml-2 text-sm font-medium dark:text-slate-300 group-hover:opacity-75 dark:group-hover:text-slate-200  ">{{ Auth::user()->name }}</span>
              <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" viewBox="0 0 12 12">
                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
              </svg>
            </div>
          </button>
          <div
            class="origin-top-right z-10 text-red-600 bg-red-100 absolute top-full min-w-44  dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1"
            @click.outside="open = false" @keydown.escape.window="open = false" x-show="open">
            <ul>
              <li class=" hover:bg-rose-700 hover:text-white transition duration-100 ease-in">
                <a class="font-medium text-sm  flex items-center py-1 px-3 " href="{{ route('micuenta') }}"
                  @click="open = false" @focus="open = true" @focusout="open = false">Mi
                  Cuenta</a>
              </li>

              <li class=" hover:bg-rose-700 hover:text-white transition duration-100 ease-in">
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
                  <button type="submit" class="font-medium text-sm  flex items-center py-1 px-3"
                    @click.prevent="$root.submit(); open = false">
                    {{ __('Cerrar sesión') }}
                  </button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      @endif
      <a href="#" aria-label="Social Media Link 3">
        <div id="open-cart" class="relative">
          <span id="itemsCount"
            class="bg-rose-700 text-xs font-medium text-white text-center px-[7px] py-[2px]  rounded-full absolute -bottom-4 -right-4 ml-3">0</span>
          <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/2cb868de28b1b49e52be101815be5c820fdf20aee19c0b5b86753f263366f629?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
            alt="" class="object-contain shrink-0 w-6 aspect-square" />
        </div>



      </a>
    </nav>
  </section>

  <div>
    <div id="header-menu" class="flex justify-between gap-5 w-full px-[5%] xl:px-[8%] py-3  text-[17px] relative">

      <div id="menu-burguer" class="lg:hidden z-10 w-max">
        <img class="h-10 w-10 cursor-pointer" src="{{ asset('images/img/menu_hamburguer.png') }}"
          alt="menu hamburguesa" onclick="show()" />
      </div>

      <div class="w-auto">
        <a href="#">
          <img id="logo-gestion_publica" class="w-[170px] " {{-- public\images\svg\LOGO2.png --}}
            src="{{ asset($isIndex ? 'images/svg/logogp.svg' : 'images/svg/logogp.svg') }}" alt="gestion_publica" />
        </a>
      </div>

      <div class="hidden lg:flex items-center justify-center ">
        <div>
          <nav id="menu-items"
            class=" text-[#333] text-base font-Inter_Medium flex gap-5 xl:gap-10 items-center justify-center "
            x-data="{ openCatalogo: false, openSubMenu: null }">
            <a href="{{ route('Home.jsx') }}" class="font-medium hover:opacity-75 ">
              <span class="underline-this">Inicio</span>
            </a>

            <a id="productos-link" href="{{ route('CatalogoGP.jsx') }}" class="font-medium ">
              <span class="underline-this">Cursos</span>
              {{-- <div id="productos-link-h" class="w-0"></div> --}}

            </a>

            <a id="productos-link" href="{{ route('Nosotros.jsx') }}" class="font-medium ">
              <span class="underline-this">Nosotros</span>
              {{-- <div id="productos-link-h" class="w-0"></div> --}}

            </a>

            {{-- @if ($offerExists) --}}
            <a href="{{ route('Docente.jsx') }}" class="font-medium hover:opacity-75">
              <span class="underline-this">Docentes</span>
            </a>
            {{-- @endif --}}


            <a href="#" class="font-medium hover:opacity-75 ">
              <span class="underline-this">Eventos </span>
            </a>
            @if ($blog > 0)
              <a href="#" class="font-medium hover:opacity-75 ">
                <span class="underline-this">Blog </span>
              </a>
            @endif


            <a href="{{ route('Contacto.jsx') }}" class="font-medium hover:opacity-75  ">
              <span class="underline-this">Contacto</span>
            </a>
            @if ($tags->count() > 0)
              @foreach ($tags as $item)
                <a href="/catalogo?tag={{ $item->id }}" class="font-medium hover:opacity-75    "
                  style="color: {{ $item->color }}">
                  <span class="underline-this  ">
                    {{ $item->name }} </span>
                </a>
              @endforeach

            @endif

          </nav>
        </div>
      </div>



      <section class="flex gap-3 items-center">
        <x-header-search />

        <a href="/register"
          class="hidden md:flex  gap-2.5 justify-center items-center self-stretch px-5 py-2.5 my-auto text-sm font-semibold text-center text-red-600 bg-red-100 rounded-lg min-h-[40px]">
          <span class="self-stretch my-auto hover:scale-110 transition-transform">Crear Cuenta</span>
          <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/75bad0eb80e4c8fa820b5a280da9560ca64547065469b69cd2c648442bf9f1c3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
            alt="" class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
        </a>
      </section>

    </div>
  </div>

  <div class="flex justify-end relative">
    <div class="fixed bottom-[36px] z-[10] right-[15px] md:right-[25px]">
      <a href="https://api.whatsapp.com/send?phone={{ $datosgenerales->whatsapp }}&text={{ $datosgenerales->mensaje_whatsapp }}"
        target="_blank" class="">
        <img src="{{ asset('images/img/WhatsApp.png') }}" alt="whatsapp" class="w-20" />
      </a>
    </div>
  </div>

  <x-header-carrito />

</header>

<script>
  let clockSearch;
</script>

<script>
  function mostrarTotalItems() {
    let articulos = Local.get('carrito') ?? []
    console.log('articulos reload ', articulos)
    let contarArticulos = 0
    console.log(articulos.length)

    if (articulos.length > 0) {
      contarArticulos = articulos.reduce((total, articulo) => {
        return total + articulo.cantidad;
      }, 0);

    } else {
      console.log('no es mayora a 0 ')
      contarArticulos = 0

    }

    if (articulos.length > 0) {
      $('#itemsCount').show()
      $('#itemsCount').text(contarArticulos)

    } else {
      $('#itemsCount').hide()
    }

  }
  $(document).ready(function() {
    if ({{ $isIndex ? 1 : 0 }}) {
      $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var categoriasOffset = $('#categorias').offset().top;

        const headerMenu = $('#header-menu')
        const logo = $('#logo-decotab')
        const items = $('#menu-items')
        const username = $('#username')
        const burguer = $('#menu-burguer')
        if (scroll >= categoriasOffset) {
          headerMenu
            .removeClass('absolute bg-transparent text-white')
            .addClass('fixed top-0 bg-white shadow-lg');
          items
            .removeClass('text-white')
            .addClass('text-[#272727]')
          username
            .removeClass('text-white')
            .addClass('text-[#272727]')
          // burguer
          //   .removeClass('absolute')
          //   .addClass('fixed')
          logo.attr('src', 'images/svg/logo_decotab_header.svg')
          $('#header-menu svg').attr('stroke', '#272727');
        } else {
          headerMenu
            .removeClass('fixed bg-white shadow-lg')
            .addClass('absolute bg-transparent text-white');
          items
            .removeClass('text-[#272727]')
            .addClass('text-white')
          username
            .removeClass('text-[#272727]')
            .addClass('text-white')
          // burguer
          //   .removeClass('fixed')
          //   .addClass('absolute')
          logo.attr('src', '')
          $('#header-menu svg').attr('stroke', 'white');
        }
      });
    }
    mostrarTotalItems()
  })
</script>
<script src="{{ asset('js/storage.extend.js') }}"></script>


<script>
  function addOnCarBtn(id, operacion) {
    let articulosCarrito = Local.get('carrito') || [];
    const prodRepetido = articulosCarrito.map(item => {
      if (item.id === id) {
        item.cantidad += Number(1);
        return item; // retorna el objeto actualizado 
      } else {
        return item; // retorna los objetos que no son duplicados 
      }

    });
    Local.set('carrito', articulosCarrito)
    // localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
    limpiarHTML()
    PintarCarrito()


  }

  function deleteOnCarBtn(id, operacion) {
    let articulosCarrito = Local.get('carrito') || [];
    const prodRepetido = articulosCarrito.map(item => {
      if (item.id === id && item.cantidad > 0) {
        item.cantidad -= Number(1);
        return item; // retorna el objeto actualizado 
      } else {
        return item; // retorna los objetos que no son duplicados 
      }

    });
    Local.set('carrito', articulosCarrito)
    limpiarHTML()
    PintarCarrito()


  }

  function deleteItem(id) {
    let articulosCarrito = Local.get('carrito') || [];
    articulosCarrito = articulosCarrito.filter(objeto => objeto.id !== id);

    Local.set('carrito', articulosCarrito)
    limpiarHTML()
    PintarCarrito()
  }

  function limpiarHTML() {
    //forma lenta 
    /* contenedorCarrito.innerHTML=''; */
    $('#itemsCarrito').html('')
    $('#itemsCarritoCheck').html('')


  }
  var appUrl = "{{ env('APP_URL') }}";

  $(document).ready(function() {


    PintarCarrito()
    console.log('pintar carrito ')



    $('#buscarblog').keyup(function() {

      var query = $(this).val().trim();

      if (query !== '') {
        $.ajax({
          url: '{{ route('buscarblog') }}',
          method: 'GET',
          data: {
            query: query
          },
          success: function(data) {
            var resultsHtml = '';
            var url = '{{ asset('') }}';
            data.forEach(function(result) {
              resultsHtml +=
                '<a class="z-50" href="/post/' + result.id +
                '"> <div class=" z-50 w-full flex flex-row py-2 px-3 hover:bg-slate-200"> ' +
                ' <div class="w-[30%]"><img class="w-full rounded-md" src="' +
                url + result.url_image + result.name_image + '" /></div>' +
                ' <div class="flex flex-col justify-center w-[80%] pl-3"> ' +
                ' <h2 class="text-left line-clamp-1">' + result.title +
                '</h2> ' +
                '</div> ' +
                '</div></a>';
            });

            $('#resultadosblog').html(resultsHtml);
          }
        });
      } else {
        $('#resultadosblog').empty();
      }
    });
  });
</script>

<script>
  document.addEventListener('click', function(event) {
    var input = document.getElementById('buscarblog');
    var resultados = document.getElementById('resultadosblog');

    // Check if both elements exist
    if (input && resultados) {
      var isClickInsideInput = input.contains(event.target);
      var isClickInsideResultados = resultados.contains(event.target);

      if (!isClickInsideInput && !isClickInsideResultados) {
        input.value = '';
        $('#resultadosblog').empty();
      }
    }
  });
</script>
<script>
  const categorias = @json($categorias);
  var activeHover = false
  /*  document.getElementById('productos-link').addEventListener('mouseenter', function(event) {
     if (event.target === this) {
       // mostrar submenú de productos 
       let padre = document.getElementById('productos-link-h');
       let divcontainer = document.createElement('div');
       divcontainer.id = 'productos-link-container';
       divcontainer.className =
         'absolute top-[90px] left-1/2 transform -translate-x-1/2 m-0 flex flex-row bg-white z-[60] rounded-lg shadow-lg gap-4 p-4 w-[80vw] overflow-x-auto';

       divcontainer.addEventListener('mouseenter', function() {
         this.addEventListener('mouseleave', cerrar);
       });

       categorias.forEach(element => {
         if (element.subcategories.length == 0) return;
         let ul = document.createElement('ul');
         ul.className =
           'text-[#006BF6] font-bold font-poppins text-md py-2 px-3 block   duration-300 w-full whitespace-nowrap gap-4';

         ul.innerHTML = element.name;
         element.subcategories.forEach(subcategoria => {
           let li = document.createElement('li');
           li.style.setProperty('padding-left', '4px', 'important');
           li.style.setProperty('padding-right', '2px', 'important');

           li.className =
             'text-[#272727] px-2 rounded-sm cursor-pointer font-normal font-poppins text-[13px] py-2 px-3 hover:bg-blue-200 hover:opacity-75 transition-opacity duration-300 w-full whitespace-nowrap';
           // Crear el elemento 'a'
           let a = document.createElement('a');
           a.href = `/catalogo?subcategoria=${subcategoria.id}`;
           a.innerHTML = subcategoria.name;
           a.className = 'block w-full h-full'; // Para que el enlace ocupe todo el 'li'

           // Añadir el elemento 'a' al 'li'
           li.appendChild(a);
           ul.appendChild(li);
         });
         divcontainer.appendChild(ul);
       });



       // limpia sus hijos antes de agregar los nuevos
       if (!activeHover) {
         padre.appendChild(divcontainer);
         activeHover = true;
       }
     }
   }); */

  /*  function cerrar() {
     let padre = document.getElementById('productos-link-h');
     activeHover = false
     padre.innerHTML = '';
   } */

  function agregarAlCarrito(item, cantidad) {
    $.ajax({

      url: `{{ route('carrito.buscarProducto') }}`,
      method: 'POST',
      data: {
        _token: $('input[name="_token"]').val(),
        id: item,
        cantidad

      },
      success: function(success) {
        let {
          producto,
          id,
          descuento,
          precio,
          imagen,
          color
        } = success.data
        let cantidad = Number(success.cantidad)
        let detalleProducto = {
          id,
          producto,
          descuento,
          precio,
          imagen,
          cantidad,
          color

        }
        let existeArticulo = articulosCarrito.some(item => item.id === detalleProducto.id)
        if (existeArticulo) {
          //sumar al articulo actual 
          const prodRepetido = articulosCarrito.map(item => {
            if (item.id === detalleProducto.id) {
              item.cantidad += Number(detalleProducto.cantidad);
              return item; // retorna el objeto actualizado 
            } else {
              return item; // retorna los objetos que no son duplicados 
            }

          });
        } else {
          articulosCarrito = [...articulosCarrito, detalleProducto]

        }

        Local.set('carrito', articulosCarrito)
        let itemsCarrito = $('#itemsCarrito')
        let ItemssubTotal = $('#ItemssubTotal')
        let itemsTotal = $('#itemsTotal')
        limpiarHTML()
        PintarCarrito()
        mostrarTotalItems()

        Notify.add({
          icon: '/images/svg/Boost.svg',
          title: 'Producto agregado',
          body: 'El producto se agregó correctamente al carrito',
          type: 'success',
        })

        /* Swal.fire({

          icon: "success",
          title: `Producto agregado correctamente`,
          showConfirmButton: true


        }); */
      },
      error: function(error) {
        console.log(error)
      }

    })
  }
  $(document).on('click', '#btnAgregarCarritoPr', function() {
    let url = window.location.href;
    let partesURL = url.split('/');
    let productoEncontrado = partesURL.find(parte => parte === 'producto');

    let item
    let cantidad


    item = partesURL[partesURL.length - 1]
    cantidad = Number($('#cantidadSpan span').text())
    item = $(this).data('id')

    try {
      agregarAlCarrito(item, cantidad)

    } catch (error) {
      console.log(error)

    }
  })

  $(document).on('click', '#btnAgregarCarrito', function() {

    let item = $(this).data('id')
    console.log(item)
    let cantidad = 1
    try {
      agregarAlCarrito(item, cantidad)

    } catch (error) {
      console.log(error)

    }


  })
</script>
