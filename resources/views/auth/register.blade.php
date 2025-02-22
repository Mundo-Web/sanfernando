<x-authentication-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


    <div class="flex flex-col md:flex-row justify-center h-screen">
        <div class="w-2/5 hidden md:block font-poppins">
            <!-- Imagen ocupando toda la altura y sin desbordar -->
            <div style="background-image: url('{{ asset('images/academia/imagenregister.png') }}')"
                class="bg-cover bg-center bg-no-repeat w-full h-full shadow-lg">
            </div>
        </div>

        <!-- Segundo div -->
        <div class="w-full md:w-3/5  text-[#151515] flex justify-center items-center">
            <div class="w-5/6 flex flex-col gap-5 max-w-xl">
                <div class="flex flex-col gap-5 text-center md:text-left">
                    <h1 class="font-bold font-poppins_semibold text-4xl tracking-tight">Crear tu cuenta</h1>
                    <p class="font-normal text-base font-poppins_regular">
                        ¿Ya tienes una cuenta?
                        <a href="{{ route('login') }}"
                            class="font-semibold font-poppins_regular text-[16px] text-[#F19905]">Iniciar
                            Sesión</a>
                    </p>
                </div>
                <div class="">
                    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-5 font-poppins_regular">
                        @csrf
                        @php
                            if ($errors->any()) {
                                // dd($errors);
                            }
                        @endphp

                        <div>
                            <input type="text" placeholder="Nombre completo" id="name" name="name"
                                :value="old('name')" required autofocus
                                class="w-full py-3 px-3 focus:outline-none text-[#F19905] placeholder-[#F19905] focus:placeholder-[#F19905] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#F19905] focus:ring-0" />
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div>
                            <input type="text" placeholder="Apellidos" id="lastname" name="lastname"
                                :value="old('lastname')" required autofocus
                                class="w-full py-3 px-3 focus:outline-none text-[#F19905] placeholder-[#F19905] focus:placeholder-[#F19905] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#F19905] focus:ring-0" />
                            @error('lastname')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div>
                            <input type="text" placeholder="Correo electrónico" id="email" name="email"
                                :value="old('email')" required
                                class="w-full py-3 px-3 focus:outline-none text-[#F19905] placeholder-[#F19905] focus:placeholder-[#F19905] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#F19905] focus:ring-0" />
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative w-full">
                            <!-- Input -->
                            <input type="password" placeholder="Contraseña" id="password" name="password" required
                                autocomplete="new-password"
                                class="w-full py-3 px-3 focus:outline-none text-[#F19905] placeholder-[#F19905] focus:placeholder-[#F19905] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#F19905] focus:ring-0" />

                            <!-- Imagen -->
                            <img src="./images/svg/pass_eyes.svg" alt="password"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer ojopassWord" />
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative w-full">
                            <!-- Input -->
                            <input type="password" placeholder="Confirmar contraseña" id="password_confirmation"
                                name="password_confirmation" required autocomplete="new-password"
                                class="w-full py-3 px-3 focus:outline-none text-[#F19905] placeholder-[#F19905] focus:placeholder-[#F19905] font-normal text-base bg-[#FFF0F0] rounded-2xl border-2 border-transparent focus:border-2 focus:border-[#F19905] focus:ring-0" />
                            <!-- Imagen -->
                            <img src="./images/svg/pass_eyes.svg" alt="password"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer ojopassWord_confirmation" />
                            @error('password_confirmation')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex gap-3 my-4">
                            <input type="checkbox" id="acepto_terminos" class="w-5 h-5 appearance-none rounded-[0.25rem] border border-solid  outline-none focus:ring-[#F19905] checked:bg-[#F19905] text-[#F19905] focus:ring-0 focus:border-[#F19905] border-[#F19905]" required />
                            <label name="newsletter" id="newsletter" class="font-normal text-sm font-poppins_regular">

                                Acepto la
                                <span class="font-semibold text-[#F19905] cursor-pointer open-modal"
                                    data-tipo='PoliticaPriv'> Política de
                                    Privacidad</span>
                                y los
                                <span class="font-semibold text-[#F19905] cursor-pointer open-modal"
                                    data-tipo='terminosUso'>
                                    Términos de Uso
                                </span>
                            </label>
                        </div>

                        <div class="">
                            <input type="submit" value="Crear cuenta"
                                class="text-white bg-[#F19905] w-full py-3 rounded-2xl cursor-pointer font-semibold font-poppins_regular text-center" />
                        </div>
                    </form>

                    <p class="mt-4 font-poppins_regular">Ya tienes una cuenta? <a href="/login" class="font-semibold">Iniciar sesion</a></p>
                    {{-- <x-validation-errors class="mt-4" /> --}}
                </div>
            </div>
        </div>
    </div>

    <div id="modaalpoliticas" class="modal modalbanner">
        <div class="p-2" id="modal-content">
            <h1 id="modal-title">MODAL POLITICAS</h1>
            <div id="modal-body-content"></div>
        </div>
    </div>

    <script>
        const politicas = @json($politicas);
        const terminos = @json($terminos);

        $(document).on('click', '.open-modal', function() {
            var tipo = $(this).data('tipo');
            var title = '';
            var content = '';
            console.log(politicas)
            console.log(terminos)

            if (tipo == 'PoliticaPriv') {
                title = 'Política de Privacidad';
                content = politicas.content;
            } else if (tipo == 'terminosUso') {
                title = 'Términos y condiciones';
                content = terminos.content;
            }

            $('#modal-title').text(title);
            $('#modal-body-content').html(content);

            $('#modaalpoliticas').modal({
                show: true,
                fadeDuration: 100
            });
        });

        $(document).on("click", '.ojopassWord', function() {


            var input = $(this).siblings('input');

            // Alterna el tipo de entrada entre 'password' y 'text'
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
            } else {
                input.attr('type', 'password');
            }

        })
        $(document).on("click", '.ojopassWord_confirmation', function() {
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
