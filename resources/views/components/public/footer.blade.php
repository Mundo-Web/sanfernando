<footer class="flex flex-col justify-center px-[8%] py-20 bg-slate-900 max-md:px-5 !text-lg !font-poppins_regular">
  <div class="flex flex-wrap gap-10 justify-between items-start w-full max-md:max-w-full">
    <section class="flex flex-col min-w-[240px] w-[330px]">
      <div class="flex flex-col w-full">
        <div class="flex gap-2 items-center self-start">
          <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/93f2421934f627c82a1f00265f8fb2b03632c8f4c667470a8307d61d620234d7"
            class="object-contain shrink-0 self-stretch my-auto w-10 aspect-square" alt="Company logo" />
          <div class="flex flex-col self-stretch my-auto w-[100px]">
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/5d9cc8593fc9f4378529e5f8c320b53f2fcac980a4b35b024695fc7e7110fb0f"
              class="object-contain max-w-full aspect-[3.03] w-[100px]" alt="Company name" />
            <img loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/bd5896281afafbaa5dec749f1bab7d83b6d5ed9b62b8ebe2e33452518a7e0678"
              class="object-contain max-w-full aspect-[16.67] w-[100px]" alt="Company slogan" />
          </div>
        </div>
        <p class="mt-4 text-xs leading-4 text-white">
          Nunc gravida sodales lectus et finibus. Duis vehicula pretium odio, nec efficitur purus tempor at. Donec eget
          tellus id tellus convallis malesuada at eget justo.
        </p>
      </div>
      <a href="/catalogoGestion"
        class="flex gap-3 items-start mt-6 text-sm font-semibold tracking-normal leading-10 text-white rounded-xl min-h-[40px]">
        <span class="gap-3 self-stretch px-6 h-10 bg-red-600 rounded-xl min-w-[240px] max-md:px-5">
          Explorar todos los cursos y Diplomados
        </span>
      </a>
    </section>
    <nav class="flex flex-wrap gap-10 items-start min-w-[240px] w-[659px] max-md:max-w-full">
      <div class="flex flex-col flex-1 shrink leading-tight whitespace-nowrap basis-0">
        <h3 class="text-sm font-medium text-white">Enlaces</h3>
        <ul class="flex flex-col mt-5 w-full text-xs text-white text-opacity-80">
          <li><a href="{{ route('Home.jsx') }}">Inicio</a></li>
          <li class="mt-3"><a href="{{ route('CatalogoGP.jsx') }}">Cursos</a></li>
          <li class="mt-3"><a href="{{ route('Nosotros.jsx') }}">Nosotros</a></li>
          <li class="mt-3"><a href="{{ route('Docente.jsx') }}">Docentes</a></li>
          <li class="mt-3"><a href="/blog">Blog</a></li>
          <li class="mt-3"><a href="{{ route('Contacto.jsx') }}">Contacto</a></li>
        </ul>
      </div>
      <div class="flex flex-col w-[221px]">
        <h3 class="text-sm font-medium leading-tight text-white">Datos de contacto</h3>
        <address class="flex flex-col mt-5 w-full text-xs leading-4 text-white text-opacity-80 not-italic">
          <p>{{ $datosgenerales->address }} - {{ $datosgenerales->city }}, {{ $datosgenerales->district }}</p>
          <p class="mt-3">Correo Electrónico: <a
              href="mailto:admision@gestionpublica.edu.pe">{{ $datosgenerales->email }}</a></p>
          <p class="mt-3 leading-tight">Teléfono: <a href="tel:+51943305073">{{ $datosgenerales->cellphone }}</a></p>
        </address>
      </div>
      <div class="flex flex-col flex-1 shrink leading-tight basis-0">
        <h3 class="text-sm font-medium text-white">Aviso Legal</h3>
        <ul class="flex flex-col mt-5 w-full text-xs text-white text-opacity-80">
          <li><a href="#">Política de Privacidad</a></li>
          <li class="mt-3"><a href="#">Términos y Condiciones</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <hr class="mt-12 w-full bg-white rounded-lg min-h-[2px] max-md:mt-10 max-md:max-w-full" />
  <div class="flex flex-wrap gap-10 justify-between items-center mt-12 w-full max-md:mt-10 max-md:max-w-full">
    <p class="self-stretch my-auto text-xs leading-tight text-white">
      Copyright © 2023 EGESPP. Reservados todos los derechos
    </p>
    <div class="flex gap-2.5 items-start self-stretch my-auto">

      @if ($datosgenerales->instagram)
        <a target="_blank" href="{{ $datosgenerales->instagram }}" aria-label="Instagram">
          <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b923cc1833af09337dc143c7c3d54c19cfe840deec4df793c6d96201779c7718"
            class="object-contain shrink-0 w-8 aspect-square" alt="" />
        </a>
      @endif
      @if ($datosgenerales->facebook)
        <a target="_blank" href="{{ $datosgenerales->facebook }}" aria-label="Facebook">
          <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/3c44a8c6d2e998706681aefde9edcecc1a8c578bd58b7870eb2a1f803e056be5"
            class="object-contain shrink-0 w-8 aspect-square" alt="" />
        </a>
      @endif
      @if ($datosgenerales->linkedin)
        <a target="_blank" href="{{ $datosgenerales->linkedin }}" aria-label="Linkedin">
          <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b66ec4cdec5c308e6417c85e86eb12d327f5bcedaa96b3e65ca3c9d2259a126c"
            class="object-contain shrink-0 w-8 aspect-square" alt="" />
        </a>
      @endif
      @if ($datosgenerales->tiktok)
        <a target="_blank" href="{{ $datosgenerales->tiktok }}" aria-label="Tiktok">
          <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/3607abf1fa88fd120d941c5e99b8e4bb76763247b76cd8982cfbb664d0cf5113"
            class="object-contain shrink-0 w-8 aspect-square" alt="" />
        </a>
      @endif
      @if ($datosgenerales->youtube)
        <a target="_blank" href="{{ $datosgenerales->youtube }}" class='text-center' aria-label="YouTube">
          <i class="fa-brands fa-youtube text-lg w-8 bg-[#fa080c] text-white rounded-full p-1.5"></i></a>
      @endif
      @if ($datosgenerales->twitter)
        <a target="_blank" href="{{ $datosgenerales->twitter }}" class='text-center' aria-labe="twitter">
          <i class="fa-brands fa-x-twitter text-lg w-8 bg-[#fa080c] text-white rounded-full p-1.5"></i></a>
      @endif

    </div>
  </div>
</footer>
