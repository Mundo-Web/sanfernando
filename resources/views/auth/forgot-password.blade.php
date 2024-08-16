<x-authentication-layout>

    <div class="flex flex-col md:flex-row justify-center h-screen">
      <!-- Primer div -->
      <div class="w-2/5 hidden md:block font-poppins">
        <div style="background-image: url('{{ asset('images/imagen_login.png') }}')"
          class="bg-cover bg-center bg-no-repeat w-full h-full shadow-lg">
          {{-- <h1 class="font-medium text-[24px] py-10 bg-black bg-opacity-25 text-center text-white">
            {{ config('app.name', 'Laravel') }}
          </h1> --}}
        </div>
      </div>
      
      <!-- Segundo div -->
      <div class="w-full md:w-3/5  text-[#151515] flex justify-center items-center">
        <div class="w-5/6 flex flex-col gap-5 max-w-xl">
          <div class="flex flex-col gap-5 text-center md:text-left">
            @if (session('status'))
              <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
              </div>
            @endif
            <h1 class="font-bold font-poppins_semibold text-4xl tracking-tight">Recuperar contraseña</h1>
            <p class="font-normal text-base font-poppins_regular">
                Para crear una nueva contraseña, ingresa tu correo electrónico y te enviaremos instrucciones paso a paso.
            </p>
          </div>
          <div class="">
            <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-5">
              @csrf
              <div>
                <input type="text" placeholder="Correo electrónico" name="email"
                  id="email" type="email" :value="old('email')" required autofocus
                  class="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
              </div>
  
              <div class="">
                <input type="submit" value="Enviar"
                  class="text-white bg-[#CF072C] w-full py-3 rounded-2xl cursor-pointer font-semibold font-poppins_regular text-center" />
              </div>
  
             <div class="flex flex-row justify-center items-centerpx-4">
                <a href="{{ route('login') }}" 
                  class="text-[#CF072C] w-full py-2 rounded-3xl cursor-pointer font-semibold font-poppins_regular tracking-normal text-center">Cancelar</a>
              </div>
  
            </form>
            <x-validation-errors class="mt-4" />
          </div>
        </div>
      </div>

    </div>
  </x-authentication-layout>
  