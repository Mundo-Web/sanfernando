<footer class="bg-[#191023]">
    <style>
        #modalPoliticasDev #modalTerminosCondiciones #modallinkPoliticasDatos {
            ;
            height: 70vh;
            overflow-y: auto;
        }
        #modalPoliticasDev .prose,
        #modalTerminosCondiciones .prose,
        #modallinkPoliticasDatos .prose {
            max-width: 100%;
            text-align: justify;
        }
        .prose * {
            margin-bottom: 0% !important;
            margin-top: 0% !important;
        }
    </style>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 md:justify-center w-full px-[5%] py-8 lg:py-16 ">

        <div class="flex flex-col text-white text-base justify-start items-start gap-5">
            <img class="h-20 object-contain" src="{{ asset('images/img/logosf.png') }}" />
            @if (Auth::user() == null)
              <div class="mt-3 flex flex-row gap-3">
                  <a href="/register"
                      class="text-base font-Montserrat_Medium tracking-wide bg-[#F19905] text-white px-3 md:px-6 py-3 rounded-3xl">
                      Regístrate</a>
                  <a href="/login"
                      class="text-base font-Montserrat_Medium tracking-wide bg-transparent border text-white px-3 md:px-6 py-3 rounded-3xl">
                      Ingresar</a>
              </div>
            @endif
        </div>

        <div class="flex flex-col text-sm font-Montserrat_Regular text-white gap-2 pl-0 lg:pl-24">
            <h3 class="text-xl text-white font-Montserrat_Bold pb-3">Enlaces</h3>
            <a href="{{ route('Home.jsx') }}">Inicio</a>
            <a href="{{ route('CatalogoGP.jsx') }}">Cursos</a>
            @if (count($docentes)> 0)
                <a href="{{ route('Docente.jsx') }}">Docentes</a>
            @endif
            @if (count($recursos)>0)
                <a href="{{ route('Recursos.jsx') }}">Recursos</a>
            @endif
            <a href="{{ route('Contacto.jsx') }}">Contacto</a>
        </div>

        <div class="flex flex-col text-sm font-Montserrat_Regular text-white gap-2">
            <h3 class="text-xl text-white font-Montserrat_Bold pb-3">Datos de contacto</h3>
            <p>{{ $datosgenerales->address }} {{ $datosgenerales->inside }}</p>
            <p> {{ $datosgenerales->city }} - {{ $datosgenerales->country }}</p>
            <p>{{ $datosgenerales->cellphone }}</p>
            <p>{{ $datosgenerales->email }}</p>
        </div>

        <div class="flex flex-col text-sm font-Montserrat_Regular text-white gap-2">
            <h3 class="text-xl text-white font-Montserrat_Bold pb-3">Aviso legal</h3>
            linkTerminos2
            <a id="linkTerminos">Terminos y condiciones </a>
            <a id="linkPoliticas">Politicas de devolucion </a>

            <a href="{{ route('librodereclamaciones') }}"><img class="w-24"
                    src="{{ asset('images/img/reclamaciones.png') }}" /></a>
        </div>

    </div>

    <div class="bg-[#191023] py-5 flex items-center justify-center w-11/12 mx-auto border-t">
        <div class="flex flex-col lg:flex-row justify-between items-center gap-5 w-full">

            <div class="text-center">
                <p class="font-normal font-Montserrat_Regular text-sm text-white">
                    Copyright &copy; 2023 {{ config('app.name') }}. Reservados todos los derechos. Powered by <a
                        href="https://www.mundoweb.pe" target="_blank" class="text-white border-b border-white"> Mundo
                        Web
                    </a>
                </p>
            </div>

            <div class="flex flex-row gap-4 text-[#ccc]">
                @if ($datosgenerales->facebook)
                    <a href="{{ $datosgenerales->facebook }}">
                      <div class="p-2 bg-white bg-opacity-10 rounded-full w-10 h-10 flex flex-col justify-center items-center border border-white border-opacity-20">
                        <i class="fa-brands fa-square-facebook text-white text-xl"></i>
                      </div>
                    </a>
                @endif
                @if ($datosgenerales->instagram)
                    <a href="{{ $datosgenerales->instagram }}">
                      <div class="p-2 bg-white bg-opacity-10 rounded-full w-10 h-10 flex flex-col justify-center items-center border border-white border-opacity-20">
                        <i class="fa-brands fa-instagram text-white text-xl"></i>
                      </div>
                    </a>
                @endif
                @if ($datosgenerales->linkedin)
                    <a href="{{ $datosgenerales->linkedin }}">
                      <div class="p-2 bg-white bg-opacity-10 rounded-full w-10 h-10 flex flex-col justify-center items-center border border-white border-opacity-20">
                        <i class="fa-brands fa-linkedin text-white text-xl"></i>
                      </div>
                    </a>
                @endif
                @if ($datosgenerales->tiktok)
                    <a href="{{ $datosgenerales->tiktok }}">
                      <div class="p-2 bg-white bg-opacity-10 rounded-full w-10 h-10 flex flex-col justify-center items-center border border-white border-opacity-20">
                        <i class="fa-brands fa-tiktok text-white text-xl"></i>
                      </div>
                    </a>
                @endif
                @if ($datosgenerales->whatsapp)
                    <a href="{{ $datosgenerales->whatsapp }}">
                      <div class="p-2 bg-white bg-opacity-10 rounded-full w-10 h-10 flex flex-col justify-center items-center border border-white border-opacity-20">
                        <i class="fa-brands fa-whatsapp text-white text-xl"></i>
                      </div>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div id="modalTerminosCondiciones" class="modal" style="max-width: 900px !important;width: 100% !important;  ">
        <div class="p-4 ">
            <h1 class="font-Montserrat_Bold text-center text-2xl">Términos y condiciones</h1>
            <p class="font-Montserrat_Regular  prose grid grid-cols-1">{!! $terminos->content ?? '' !!}</p>
        </div>
    </div>

    <div id="modalPoliticasDev" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <div class="p-4 ">
            <h1 class="font-Montserrat_Bold text-center text-2xl">Políticas de devolución</h1>
            <p class="font-Montserrat_Regular  prose grid grid-cols-1 ">{!! $politicas->content ?? '' !!}</p>
        </div>
    </div>

</footer>

<script>
    $(document).ready(function() {
        $(document).on('click', '#linkTerminos', function() {
            $('#modalTerminosCondiciones').modal({
                show: true,
                fadeDuration: 400,

            })
        })

        $(document).on('click', '#linkTerminos2', function() {
            $('#modalTerminosCondiciones').modal({
                show: true,
                fadeDuration: 400,

            })
        })
        
        $(document).on('click', '#linkPoliticas', function() {
            $('#modalPoliticasDev').modal({
                show: true,
                fadeDuration: 400,


            })
        })

        $(document).on('click', '#linkTerminospago', function() {
            $('#modalTerminosCondiciones').modal({
                show: true,
                fadeDuration: 400,

            })
        })
        
    })
</script>
