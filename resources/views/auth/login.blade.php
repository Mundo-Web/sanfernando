<x-authentication-layout>

  <div class="flex flex-col md:flex-row justify-center h-screen">
    <!-- Primer div -->
    <div class="w-2/5 hidden md:block font-poppins">
      <!-- Imagen ocupando toda la altura y sin desbordar -->
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
          <h1 class="font-bold font-poppins_semibold text-4xl tracking-tight">Hola, Inicia Sesión</h1>
          {{-- <p class="font-normal text-base font-poppins_regular tracking-tight">
            Inicie sesión utilizando los detalles de la cuenta a continuación.
          </p> --}}
        </div>
        <div class="">
          <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5 font-poppins_regular">
            @csrf
            <div>
              <span for="email" class="text-[#4E5566] font-medium">Email</span>
              <input type="text" placeholder="Correo electrónico" name="email"
                id="email" type="email" :value="old('email')" required autofocus
                class="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
            </div>

            <div class="relative w-full ">
              <span for="email" class="text-[#4E5566] font-medium">Contraseña</span>
              <input type="password" placeholder="Contraseña" id="password" name="password" required
                autocomplete="current-password"
                class="w-full py-3 px-3 focus:outline-none text-[#CF072C] placeholder-[#CF072C] focus:placeholder-[#CF072C] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#CF072C] focus:ring-0" />
              <!-- Imagen -->
              <img src="./images/svg/pass_eyes.svg" alt="password"
                class="absolute right-4 top-1/2  cursor-pointer ojopassWord" />
            </div>

            <div class="flex gap-3 justify-between">
              <div class="flex flex-row justify-start items-center gap-3">
                <input type="checkbox" id="acepto_terminos" class="w-5 h-5 appearance-none rounded-[0.25rem] border border-solid  outline-none focus:ring-[#CF072C] checked:bg-[#CF072C] text-[#CF072C] focus:ring-0 focus:border-[#CF072C] border-[#CF072C]" />
                <label for="acepto_terminos" class="font-normal text-[#4E5566] ">Acuérdate de mí
                </label>
              </div>

              <div>
                <input type="submit" value="Iniciar Sesión"
                  class="text-white bg-[#CF072C] px-6 py-3 rounded-2xl cursor-pointer  font-semibold font-poppins_regular  tracking-normal" />
              </div>
            </div>

            {{-- @if (Route::has('password.request'))
              <div class="flex flex-row justify-center items-centerpx-4">
                <a href="{{ route('password.request') }}"
                  class="text-[#CF072C] bg-[#FFDDDE] w-full py-3 rounded-2xl cursor-pointer font-semibold font-poppins_regular tracking-normal text-center">Olvidé mi contraseña</a>
              </div>
            @endif --}}

            <p class="mt-4">No tienes una cuenta aun? <a href="/register" class="font-semibold">Registrate</a></p>

          </form>
          <x-validation-errors class="mt-4" />
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).on("click", '.ojopassWord', function() {


      var input = $(this).siblings('input');

      // Alterna el tipo de entrada entre 'password' y 'text'
      if (input.attr('type') === 'password') {
        input.attr('type', 'text');
      } else {
        input.attr('type', 'password');
      }

    })
  </script>
</x-authentication-layout>
