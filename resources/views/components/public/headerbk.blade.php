<div class="flex justify-end md:w-auto md:justify-center items-center gap-2">

    @if (Auth::user() == null)
      <a class="hidden md:flex" href="{{ route('login') }}"><img class="bg-white rounded-lg"
          src="{{ asset('images/svg/header_user.svg') }}" alt="user" /></a>
    @else
      <div class="relative  hidden md:inline-flex" x-data="{ open: false }">
        <button class="px-3 py-5 inline-flex justify-center items-center group" aria-haspopup="true"
          @click.prevent="open = !open" :aria-expanded="open">
          <div class="flex items-center truncate">
            <span id="username"
              class="truncate ml-2 text-sm font-medium dark:text-slate-300 group-hover:opacity-75 dark:group-hover:text-slate-200 text-[#272727] ">{{ Auth::user()->name }}</span>
            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" viewBox="0 0 12 12">
              <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
            </svg>
          </div>
        </button>
        <div
          class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1"
          @click.outside="open = false" @keydown.escape.window="open = false" x-show="open">
          <ul>
            <li class="hover:bg-gray-100">
              <a class="font-medium text-sm text-black flex items-center py-1 px-3"
                href="{{ route('micuenta') }}" @click="open = false" @focus="open = true"
                @focusout="open = false">Mi Cuenta</a>
            </li>

            <li class="hover:bg-gray-100">
              <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button type="submit" class="font-medium text-sm text-black flex items-center py-1 px-3"
                  @click.prevent="$root.submit(); open = false">
                  {{ __('Cerrar sesión') }}
                </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    @endif
    {{-- <div class="bg-[#EB5D2C] flex justify-center items-center rounded-full w-7 h-7">
        <span id="itemsCount" class="text-white"></span>
      </div> --}}

    <div class="relative inline-block cursor-pointer justify-center ">
      <button onclick="openSearch()" class="flex justify-center items-center">
        <img src="{{ asset('images/svg/search_boost.svg') }}"
          class="bg-white rounded-lg max-w-full h-auto cursor-pointer" />
      </button>

    </div>


    <div class="flex justify-center items-center">
      <div id="open-cart" class="relative inline-block cursor-pointer pr-3">
        <span id="itemsCount"
          class="bg-[#EB5D2C] text-xs font-medium text-white text-center px-[7px] py-[2px]  rounded-full absolute bottom-0 right-0 ml-3">0</span>
        <img src="{{ asset('images/svg/bag_boost.svg') }}"
          class="bg-white rounded-lg p-1 max-w-full h-auto cursor-pointer" />
      </div>
      {{-- <input type="checkbox" class="bag__modal" id="check" /> --}}
      <div id="cart-modal"
        class="bag !fixed top-0 right-0 md:w-[450px] cartContainer border shadow-2xl  !rounded-none !p-0 !z-30"
        style="display: none">
        <div class="p-4 flex flex-col h-[90vh] justify-between gap-2">
          <div class="flex flex-col">
            <div class="flex justify-between ">
              <h2 class="font-semibold font-Inter_Medium text-[28px] text-[#151515] pb-5">Carrito</h2>
              <div id="close-cart" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke="#272727" stroke-linecap="round" stroke-linejoin="round"
                    d="M6 18 18 6M6 6l12 12" />
                </svg>
              </div>
            </div>
            <div class="overflow-y-scroll h-[calc(90vh-200px)] scroll__carrito">
              <table class="w-full">
                <tbody id="itemsCarrito">
                  {{-- <div class="flex flex-col gap-10 align-top" id="itemsCarrito"></div> --}}
                </tbody>
              </table>
            </div>
          </div>
          <div class="flex flex-col gap-2 pt-2">
            <div class="text-[#006BF6]  text-xl flex justify-between items-center">
              <p class="font-Inter_Medium font-semibold">Total</p>
              <p class="font-Inter_Medium font-semibold" id="itemsTotal">S/ 0.00</p>
            </div>
            <div>
              <a href="/carrito"
                class="font-normal font-Inter_Medium text-lg bg-[#006BF6] py-3 px-5 rounded-2xl text-white cursor-pointer w-full inline-block text-center">Ver
                Carrito</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>