@php
  $pagina = Route::currentRouteName();
  $isIndex = $pagina == 'Home.jsx';
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

  .selectancho [class$="-control"] {
    width: auto !important;
    min-width: 250px !important;
  }

  
</style>

{{-- <img src="{{ asset('images/contacto.png') }}" class="absolute top-0 left-0 w-full z-[99999] opacity-30"></img> --}}

<div class="navigation shadow-xl px-5" style="z-index: 9999; background-color: #fff !important">
  <button aria-label="hamburguer" type="button" class="hamburger" id="position" onclick="show()">
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M18 2L2 18M18 18L2 2" stroke="#272727" stroke-width="2.66667" stroke-linecap="round" />
    </svg>
  </button>
  <nav class="w-full h-full overflow-y-auto p-8" x-data="{ openCatalogo: false, openSubMenu: null }">
    <ul class="space-y-1">
      <li>
        <a href="/"
          class="text-[#272727] font-medium font-Montserrat_Regular text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $isIndex ? 'text-[#FF5E14]' : '' }}">
          <span class="underline-this">
            <svg
              class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            Inicio
          </span>
        </a>
      </li>
      <li>
        <a href="{{ route('CatalogoGP.jsx') }}"
          class="text-[#272727] font-medium font-Montserrat_Regular text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'catalogo' ? 'text-[#FF5E14]' : '' }}">
          <span class="underline-this">
            <svg
              class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
              <path
                d="M15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783ZM6 2h6a1 1 0 1 1 0 2H6a1 1 0 0 1 0-2Zm7 5H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Z" />
              <path
                d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
            </svg>
            Cursos
          </span>
        </a>
      </li>
      @if (count($simulacros) > 0)
        <li>
          <a href="{{ route('CatalogoSimulacro.jsx') }}"
            class="text-[#272727] font-medium font-Montserrat_Regular text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'contacto' ? 'text-[#FF5E14]' : '' }}">
            <span class="underline-this">
              <svg
                class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                <path
                  d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z" />
              </svg>
              Simulacros
            </span>
          </a>
        </li>
      @endif
      @if (count($docentes)  > 0)
        <li>
          <a href="{{ route('Docente.jsx') }}"
            class="text-[#272727] font-medium font-Montserrat_Regular text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'contacto' ? 'text-[#FF5E14]' : '' }}">
            <span class="underline-this">
              <svg
                class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                <path
                  d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z" />
              </svg>
              Docentes
            </span>
          </a>
        </li>
      @endif
      @if (count($recursos) > 0)
        <li>
          <a href="{{ route('Recursos.jsx') }}"
            class="text-[#272727] font-medium font-Montserrat_Regular text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'contacto' ? 'text-[#FF5E14]' : '' }}">
            <span class="underline-this">
              <svg
                class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                <path
                  d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z" />
              </svg>
              Recursos
            </span>
          </a>
        </li>
      @endif 

      <li>
        <a href="/contacto"
          class="text-[#272727] font-medium font-Montserrat_Regular text-sm py-2 px-3 block hover:opacity-75 transition-opacity duration-300 {{ $pagina == 'contacto' ? 'text-[#FF5E14]' : '' }}">
          <span class="underline-this">
            <svg
              class="inline-block w-3 h-3 mb-0.5 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M19 4h-1a1 1 0 1 0 0 2v11a1 1 0 0 1-2 0V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a1 1 0 0 0-1-1ZM3 4a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4Zm9 13H4a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-3H4a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-3H4a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-3h-2a1 1 0 0 1 0-2h2a1 1 0 1 1 0 2Zm0-3h-2a1 1 0 0 1 0-2h2a1 1 0 1 1 0 2Z" />
              <path d="M6 5H5v1h1V5Z" />
            </svg>
            Contacto
          </span></a>
      </li>

     
    </ul>
  </nav>

</div>

<header class="sticky top-0 z-30">
  {{-- border-b shadow-lg --}}

  <div id="header-menu" class="flex items-center justify-between gap-5 w-full px-[5%] text-[17px] py-2 text-white 
    @if ($isIndex ? 1 : 0)
    @else
    bg-[#191023]
    @endif">

    <div id="menu-burguer" class="lg:hidden z-10 w-max flex flex-row items-center">
      {{-- <img class="h-10 w-10 cursor-pointer" src="{{ asset('images/img/menu_hamburguer.png') }}"
        alt="menu hamburguesa" onclick="show()" /> --}}
      <div class="cursor-pointer" onclick="show()">
        <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M5 7H19" stroke="#F19905" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M5 12H19" stroke="#F19905" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M5 17H19" stroke="#F19905" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
     </div>
    </div>

    <div class="w-auto">
      <a href="/">
        <img id="logo-gestion_publica" class="w-28"
          src="{{ asset($isIndex ? 'images/img/logosf.png' : 'images/img/logosf.png') }}"
          alt="gestion_publica" />
      </a>
    </div>

    <div class="hidden lg:flex items-center justify-center">
      <div>
        <nav id="menu-items"
          class="text-base font-Montserrat_SemiBold flex gap-5 xl:gap-10 items-center justify-center "
          x-data="{ openCatalogo: false, openSubMenu: null }">
          
          <a href="{{ route('Home.jsx') }}" class="font-medium">
            <span>Inicio</span>
          </a>

         

          <a id="productos-link" href="{{ route('CatalogoGP.jsx') }}" class="font-medium">
            <span>Cursos</span>
            {{-- <div id="productos-link-h" class="w-0"></div> --}}
          </a>

          
          @if (count($simulacros)>0)
            <a href="{{ route('CatalogoSimulacro.jsx') }}" class="font-medium">
              <span>Simulacros</span>
            </a>
          @endif


          @if (count($docentes)> 0)
            <a href="{{ route('Docente.jsx') }}" class="font-medium">
              <span>Docentes</span>
            </a>
          @endif

          {{-- <a id="productos-link" href="{{ route('Nosotros.jsx') }}" class="font-medium ">
            <span class="underline-this">Nosotros</span>
          </a> --}}

          @if (count($recursos)>0)
            <a href="{{ route('Recursos.jsx') }}" class="font-medium">
              <span>Recursos</span>
            </a>
          @endif
          

          {{-- @if ($blog > 0)
            <a href="/blog" class="font-medium hover:opacity-75 ">
              <span class="underline-this">Blog </span>
            </a>
          @endif --}}

          <a href="{{ route('Contacto.jsx') }}" class="font-medium">
            <span>Contacto</span>
          </a>

          {{-- @if ($tags->count() > 0)
            @foreach ($tags as $item)
              <a href="/catalogoGestion?tag={{ $item->id }}" class="font-medium hover:opacity-75    "
                style="color: {{ $item->color }}">
                <span class="underline-this  ">
                  {{ $item->name }} </span>
              </a>
            @endforeach
          @endif --}}

        </nav>
      </div>
    </div>

    <section class="flex flex-wrap gap-2 justify-between items-center">
        
        <nav class="flex gap-4 items-center self-stretch my-auto mx-auto md:mx-0 font-Montserrat_SemiBold">
          @if (Auth::user() == null)
            <div class="text-white hidden md:block">
              <a href="/login" class="text-white">Inicia sesión </a>
              <span class="text-slate-200">|</span>
              <a href="/register" class="text-white px-4 py-2 bg-[#F19905] rounded-2xl">Regístrate</a>
            </div>
          @else
            <div class=" relative text-white  hidden md:inline-flex" x-data="{ open: false }">
              <button class="inline-flex justify-center items-center group" aria-haspopup="true"
                @click.prevent="open = !open" :aria-expanded="open">
                <div class="flex items-center truncate mt-[4px]">
                  <span id="username"
                    class="truncate ml-2 text-sm font-medium !text-white">
                  </span>
                  <i class="fas fa-angle-down ms-2"></i>
                </div>
              </button>
              <div
                class="origin-top-right z-40 text-[#F19905] bg-red-100 absolute top-full min-w-44  dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                @click.outside="open = false" @keydown.escape.window="open = false" x-show="open">
                <ul>
                  <li class=" hover:bg-[#F19905] hover:text-white transition duration-100 ease-in">
                    <a class="font-medium text-sm  flex items-center py-1 px-3 " href="/micuenta" @click="open = false"
                      @focus="open = true" @focusout="open = false">Mi
                      Cuenta</a>
                  </li>
    
                  <li class=" hover:bg-[#F19905] hover:text-white transition duration-100 ease-in">
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
          <a href="#">
            <div id="open-cart" class="relative">
              <span id="itemsCount"
                class="bg-[#F19905] flex text-xs font-medium text-white text-center px-[7px] py-[2px]  rounded-full absolute -bottom-4 -right-4 ml-3">0</span>
              <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/2cb868de28b1b49e52be101815be5c820fdf20aee19c0b5b86753f263366f629?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                alt="" class="object-contain shrink-0 w-6 aspect-square z-20" />
            </div>
          </a>
        </nav>
    </section>
    
    <x-header-carrito />
    
  </div>

</header>

  {{-- Whatsapp --}}
<div class="flex justify-end relative">
    <div class="fixed bottom-[36px] z-[10] right-[15px] md:right-[25px]">
      <a href="https://api.whatsapp.com/send?phone={{ $datosgenerales->whatsapp }}&text={{ $datosgenerales->mensaje_whatsapp }}"
        target="_blank" class="">
        <img src="{{ asset('images/img/WhatsApp.png') }}" alt="whatsapp" class="w-20" />
      </a>
    </div>
</div>

<script>
  let clockSearch;
  @auth
  $(document).ready(function() {
    let name = "{{ Auth::user()->name }}" ?? ''
    let lastname = "{{ Auth::user()->lastname }}" ?? ''

    lastname = lastname.toLowerCase()
    let [firstName, SecondName] = name.split(' ')
    let [firstLName, SecondLName] = lastname.split(' ')


    firstLName = firstLName ? firstLName.charAt(0).toUpperCase() + firstLName.slice(1) : ''
    SecondLName = SecondLName ? SecondLName.charAt(0).toUpperCase() + SecondLName.slice(1) : ''

    console.log(firstName, SecondName, firstLName, SecondLName)

    $('#username').text(
      `${firstName ? firstName : ''} ${SecondName ? SecondName : ''} ${firstLName ? firstLName : ''} ${SecondLName ? SecondLName : ''}`
    )

  })
  @endauth
</script>

<script>
  function mostrarTotalItems() {
    let articulos = Local.get('carrito') ?? []
    let contarArticulos = 0

    if (articulos.length > 0) {
      contarArticulos = articulos.reduce((total, articulo) => {
        return total + articulo.cantidad;
      }, 0);

    } else {
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

        const headerMenu = $('#header-menu');
        const logo = $('#logo-decotab');
        const items = $('#menu-items');
        const username = $('#username');
        const burguer = $('#menu-burguer');

        if (scroll > 0) {  // Verifica si el usuario hizo scroll
          headerMenu
            .removeClass('bg-transparent')  // Elimina las clases actuales
            .addClass('bg-[#191023] shadow-lg');  // Agrega las clases con fondo blanco y sombra
          username
            .removeClass('text-white')  // Cambia el color del nombre de usuario
            .addClass('text-[#272727]');
        } else {
          headerMenu
            .removeClass('bg-[#191023] shadow-lg')  // Elimina las clases con fondo blanco
            .addClass('bg-transparent');  // Vuelve a poner el fondo transparente
          username
            .removeClass('text-[#272727]')  // Vuelve al color blanco
            .addClass('text-white');
        }
      });
    }
    mostrarTotalItems();  // Llama a la función que desees al cargar
});
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

    $('#buscarblog').keyup(function() {

      var query = $(this).val().trim();

      if (query !== '') {
        $.ajax({
          url: '{{ route('buscarblog') }}',
          method: 'POST',
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
           'text-[#006BF6] font-bold font-Montserrat_Regular text-md py-2 px-3 block   duration-300 w-full whitespace-nowrap gap-4';

         ul.innerHTML = element.name;
         element.subcategories.forEach(subcategoria => {
           let li = document.createElement('li');
           li.style.setProperty('padding-left', '4px', 'important');
           li.style.setProperty('padding-right', '2px', 'important');

           li.className =
             'text-[#272727] px-2 rounded-sm cursor-pointer font-normal font-Montserrat_Regular text-[13px] py-2 px-3 hover:bg-blue-200 hover:opacity-75 transition-opacity duration-300 w-full whitespace-nowrap';
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
              // item.cantidad += Number(detalleProducto.cantidad);
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
          icon: '/favicon.ico',
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

