@extends('components.public.matrix', ['pagina' => 'detalle'])

@section('css_importados')

@stop


@section('content')

    <main class="z-[15] ">

        <section class="flex flex-col rounded-none">
            <div class="flex relative flex-col pt-40 pr-20 w-full min-h-[400px] max-md:pt-24 max-md:pr-5 max-md:max-w-full">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/b4e82bfe25986db29d99fb9384e4ab44a145de97336f63cc73125e430d7ff1d5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    alt="" class="object-cover absolute inset-0 size-full" />
                <div
                    class="flex relative gap-2.5 items-center self-center p-6 bg-white h-[72px] rounded-[120px] w-[72px] max-md:px-5">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/fe2d3d974abe73aaa1caa252790763c1211d1343861341723c3f9e4cdc18c5ce?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        alt="" class="object-contain w-6 aspect-square" />
                </div>
                <div class="flex relative flex-wrap items-center self-start mt-40 max-md:mt-10">
                    <div class="flex flex-1 shrink self-stretch my-auto w-28 h-3 bg-red-800 basis-0"></div>
                    <div class="flex flex-1 shrink self-stretch my-auto w-28 h-3 bg-red-600 basis-0"></div>
                    <div class="flex flex-1 shrink self-stretch my-auto h-3 bg-red-500 basis-0 w-[111px]"></div>
                    <div class="flex flex-1 shrink self-stretch my-auto w-28 h-3 bg-orange-400 basis-0"></div>
                    <div class="flex flex-1 shrink self-stretch my-auto w-28 h-3 bg-cyan-600 basis-0"></div>
                </div>
            </div>
        </section>

        <section
            class="flex flex-wrap gap-10 justify-center items-center px-24 py-8 text-lg font-bold leading-6 text-white bg-rose-700 max-md:px-5">
            <div class="flex gap-4 items-center self-stretch my-auto min-w-[240px]">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/8c768f03b593a9e24068932a36a5418fd85469274a7b9fdf3c193e88f2bca428?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    alt="Calendar icon" class="object-contain shrink-0 self-stretch my-auto w-10 aspect-square" />
                <p class="self-stretch my-auto">
                    Inicio
                    <span>28 de mayo al 27 de agosto del 2024</span>
                </p>
            </div>
            <div class="flex gap-4 items-center self-stretch my-auto">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/906244440b108bcc664a19de3f761476c01c580f34424dab1729c99d082cf97e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    alt="Virtual learning icon" class="object-contain shrink-0 self-stretch my-auto w-10 aspect-square" />
                <p class="self-stretch my-auto">
                    Modalidad
                    <span>100% Virtual</span>
                </p>
            </div>
            <div class="flex gap-4 items-center self-stretch my-auto">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/3d74ab37b381b9442d6119d2afb893d02a820df496e84ce8ccfc7301d6fb1600?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    alt="Certification icon" class="object-contain shrink-0 self-stretch my-auto w-10 aspect-square" />
                <p class="self-stretch my-auto">
                    Certificación
                    <span>250 horas lectivas</span>
                </p>
            </div>
        </section>


        <div class="flex flex-wrap gap-10 justify-between items-start px-40 max-md:px-5">
            <div class="flex flex-col min-w-[240px] w-[615px] max-md:max-w-full">
                <div class="flex flex-col w-full max-md:max-w-full">
                    <div class="flex flex-col w-full text-lg leading-8 text-gray-600 max-md:max-w-full">
                        <div
                            class="flex flex-wrap gap-2 items-center w-full text-sm tracking-normal leading-loose text-slate-400 max-md:max-w-full">
                            <div class="self-stretch my-auto">Home</div>
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/b1ffced907665d1171bcfd755af982685998caa1b7c77cf6aaa284d071c45939?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-3.5 aspect-square" />
                            <div class="self-stretch my-auto">Cursos</div>
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/b1ffced907665d1171bcfd755af982685998caa1b7c77cf6aaa284d071c45939?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-3.5 aspect-square" />
                            <div class="self-stretch my-auto">Categoria</div>
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/b1ffced907665d1171bcfd755af982685998caa1b7c77cf6aaa284d071c45939?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-3.5 aspect-square" />
                            <div class="self-stretch my-auto font-medium">
                                Diplomado de Auditoria...
                            </div>
                        </div>
                        <div
                            class="mt-4 text-6xl font-bold leading-[67px] text-neutral-800 max-md:max-w-full max-md:text-4xl max-md:leading-[54px]">
                            Diplomado de Auditoría y Control Gunernamental
                        </div>
                        <div class="mt-4 max-md:max-w-full">
                            Este diplomado permite conocer y aplicar el marco conceptual y
                            normativo del Sistema Nacional de Control, metodologías y
                            procedimientos para ejecutar los servicios de control gubernamental
                            previo , simultáneo y posterior en sus diversas modalidades.
                        </div>
                        <div class="mt-4 max-md:max-w-full">
                            El Control Gubernamental involucra la realización de los Servicios de
                            Control sobre las operaciones ejecutadas por los funcionarios y
                            servidores públicos que involucre el uso de recursos públicos.
                            Haciéndose necesaria la auditoría y control gubernamental.
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-10 justify-center items-center mt-10 w-full max-md:max-w-full">
                        <div class="flex flex-col flex-1 shrink items-start self-stretch my-auto basis-8 min-w-[240px]">
                            <div class="flex gap-3 justify-center items-center">
                                <img loading="lazy"
                                    srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/13f8f9d7956eed707f93aa3139e26d13e749d7224aba213549fbc29a924cc1dc?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 self-stretch my-auto w-20 aspect-[1.6]" />
                                <div class="flex flex-col self-stretch my-auto">
                                    <div class="text-sm tracking-normal leading-loose text-rose-700">
                                        Dictado por:
                                    </div>
                                    <div
                                        class="flex gap-1.5 items-start mt-1 text-base font-medium leading-none text-gray-600">
                                        <div>Ademir Neyra</div>
                                        <div class="text-gray-600">•</div>
                                        <div>Carlos Soria</div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-2 justify-center items-center mt-6">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/dbaceea11f6a3f905103b5b188c28d8e0ff1a5bd47388b20a48abf6a1f56d225?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 self-stretch my-auto aspect-[5] w-[120px]" />
                                <div class="flex gap-1 items-center self-stretch my-auto">
                                    <div class="self-stretch my-auto text-base font-medium leading-none text-gray-600">
                                        4.8
                                    </div>
                                    <div class="self-stretch my-auto text-sm tracking-normal leading-loose text-rose-700">
                                        (451,444 Calificación)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex gap-3 items-center self-stretch px-4 py-2 my-auto text-base font-bold leading-tight text-white bg-rose-700 rounded-xl">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/6951aae30f33bd543a5f70e81f55bc643f33df502d318789244486f456ed1aca?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                            <div class="self-stretch my-auto">Brochure del curso</div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-6 mt-10 w-full bg-rose-50 rounded-2xl max-md:px-5 max-md:max-w-full">
                    <div class="text-2xl font-bold leading-tight text-neutral-800 max-md:max-w-full">
                        Beneficios
                    </div>
                    <div
                        class="flex flex-wrap gap-6 justify-center mt-6 w-full text-base font-medium leading-7 text-gray-600 max-md:max-w-full">
                        <div class="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
                            <div class="flex gap-3 items-start w-full">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/3e100234612b63381b0913899134352995ff6d1ecd0c1d478b9db5d2ace8f35d?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-6 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Acceso a nuestra aula virtual las 24 horas.
                                </div>
                            </div>
                            <div class="flex gap-3 items-start mt-10 w-full">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/3e100234612b63381b0913899134352995ff6d1ecd0c1d478b9db5d2ace8f35d?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-6 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Asesoramiento por WhatsApp y correo electrónico 24/7.
                                </div>
                            </div>
                            <div class="flex gap-3 items-start mt-10 w-full">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/3e100234612b63381b0913899134352995ff6d1ecd0c1d478b9db5d2ace8f35d?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-6 aspect-square" />
                                <div class="flex-1 shrink basis-0">Descarga tus clases.</div>
                            </div>
                        </div>
                        <div class="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
                            <div class="flex gap-3 items-start w-full">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6126dcd57e40f0e35780d68d82ec2d614a9180a95f5a331dfa5aedbe024f0fe9?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-6 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Certificación con 250 horas lectivas.
                                </div>
                            </div>
                            <div class="flex gap-3 items-start mt-10 w-full">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6126dcd57e40f0e35780d68d82ec2d614a9180a95f5a331dfa5aedbe024f0fe9?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-6 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Material de estudio y grabación de las sesiones en vivo.
                                </div>
                            </div>
                            <div class="flex gap-3 items-start mt-10 w-full">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6126dcd57e40f0e35780d68d82ec2d614a9180a95f5a331dfa5aedbe024f0fe9?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-6 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Bibliografía complementaria.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img loading="lazy"
                    srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/ffb984d54cd5f4cc1c3a2283b893a1c3b15d53525135a49744e6132c80eab737?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/ffb984d54cd5f4cc1c3a2283b893a1c3b15d53525135a49744e6132c80eab737?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/ffb984d54cd5f4cc1c3a2283b893a1c3b15d53525135a49744e6132c80eab737?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/ffb984d54cd5f4cc1c3a2283b893a1c3b15d53525135a49744e6132c80eab737?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/ffb984d54cd5f4cc1c3a2283b893a1c3b15d53525135a49744e6132c80eab737?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/ffb984d54cd5f4cc1c3a2283b893a1c3b15d53525135a49744e6132c80eab737?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/ffb984d54cd5f4cc1c3a2283b893a1c3b15d53525135a49744e6132c80eab737?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/ffb984d54cd5f4cc1c3a2283b893a1c3b15d53525135a49744e6132c80eab737?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                    class="object-contain mt-10 w-full rounded-xl aspect-[1.19] max-md:max-w-full" />
                <div class="flex flex-col p-8 mt-10 w-full bg-red-100 rounded-2xl max-md:px-5 max-md:max-w-full">
                    <div class="text-2xl font-bold leading-tight text-neutral-800">
                        Para quién es este curso:
                    </div>
                    <div class="flex flex-col mt-6 w-full text-base font-medium leading-7 text-gray-600 max-md:max-w-full">
                        <div class="flex flex-wrap gap-3 items-start w-full max-md:max-w-full">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/6e84fb4bc6c6f35489c342e99c89685f6adb3ba8589f0c00d73788555bd53af3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 w-6 aspect-square" />
                            <div class="flex-1 shrink basis-0 max-md:max-w-full">
                                Normativa que rige el control gubernamental y explora las
                                clasificaciones del control, incluyendo el control interno y
                                externo.
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3 items-start mt-3 w-full max-md:max-w-full">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/6e84fb4bc6c6f35489c342e99c89685f6adb3ba8589f0c00d73788555bd53af3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 w-6 aspect-square" />
                            <div class="flex-1 shrink basis-0 max-md:max-w-full">
                                Fundamentos teóricos y conceptuales del control gubernamental.
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3 items-start mt-3 w-full max-md:max-w-full">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/6e84fb4bc6c6f35489c342e99c89685f6adb3ba8589f0c00d73788555bd53af3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 w-6 aspect-square" />
                            <div class="flex-1 shrink basis-0 max-md:max-w-full">
                                Procedimientos de auditoría utilizados en el control posterior,
                                específicamente en la contratación de bienes y servicios.
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3 items-start mt-3 w-full max-md:max-w-full">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/6e84fb4bc6c6f35489c342e99c89685f6adb3ba8589f0c00d73788555bd53af3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 w-6 aspect-square" />
                            <div class="flex-1 shrink basis-0 max-md:max-w-full">
                                Enfócate en la redacción de informes de auditoría, incluyendo su
                                estructura y características.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-10 w-full max-md:max-w-full">
                    <div class="text-2xl font-bold leading-tight text-neutral-800">
                        ¿A quién va dirigido?
                    </div>
                    <div class="mt-6 text-base font-medium leading-7 text-gray-600 max-md:max-w-full">
                        Técnico, bachiller o título profesional  (todas las carreras alineadas
                        al sector público).
                        <br />
                        <br />
                        Funcionarios y servidores públicos o empresarios de todas las entidades
                        públicas así como a profesionales que ejecutan el Control Gubernamental
                        por los órganos que conforman el Sistema Nacional de Control (CGR, OCI,
                        y SOA) que deseen incorporar y dar una buena utilización de las
                        principales herramientas en control gubernamental en sus áreas de
                        trabajo.
                    </div>
                </div>
                <div class="flex flex-col mt-10 w-full max-md:max-w-full">
                    <div class="text-2xl font-bold leading-tight text-neutral-800 max-md:max-w-full">
                        ¿Qué lograrás una vez terminado el Diplomado?
                    </div>
                    <div class="flex flex-col mt-6 w-full max-md:max-w-full">
                        <div
                            class="flex-1 shrink gap-2 self-stretch w-full text-base font-medium leading-7 text-gray-600 max-md:max-w-full">
                            Evaluación independiente y objetiva de los estados financieros de una
                            empresa.
                        </div>
                        <div
                            class="flex-1 shrink gap-2 self-stretch mt-3 w-full text-base font-medium leading-7 text-gray-600 max-md:max-w-full">
                            Ejecutar el Control Interno simultáneo y posterior a los actos y
                            operaciones sobre la base de los lineamientos y cumplimiento del Plan
                            Anual de Control .
                        </div>
                        <div
                            class="flex flex-wrap gap-2 items-start mt-3 w-full text-base font-medium leading-7 text-gray-600 max-md:max-w-full">
                            <div class="flex gap-2.5 pt-3 min-h-[18px]"></div>
                            <div class="flex-1 shrink basis-0 max-md:max-w-full">
                                Elaboración y evaluación del Plan Operativo de las actividades del
                                OCI.
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3 items-start mt-3 w-full max-md:max-w-full">
                            <div class="flex gap-2.5 items-start">
                                <div class="flex gap-2.5 pt-3 min-h-[18px]"></div>
                            </div>
                            <div
                                class="flex-1 shrink text-base font-medium leading-7 text-gray-600 basis-0 max-md:max-w-full">
                                Cuadro de Necesidades y Presupuesto de las actividades que tiene el
                                OCI.
                            </div>
                        </div>
                        <div
                            class="flex flex-wrap gap-3 mt-3 w-full text-base font-medium leading-7 text-gray-600 max-md:max-w-full">
                            <div class="flex gap-2.5 py-3 min-h-[140px]"></div>
                            <div class="flex-1 shrink my-auto basis-0 max-md:max-w-full">
                                Verificar las denuncias que formulen los servidores públicos y
                                ciudadanía en general, sobre actos y operaciones, otorgándoles el
                                trámite que corresponda su mérito, conforme a las disposiciones
                                emitidas sobre la materia y por disposición de la Jefatura del OCl.
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-10 w-full max-md:max-w-full">
                    <div class="text-2xl font-bold leading-tight text-neutral-800">
                        ¿Por qué elegir a EGESPP?
                    </div>
                    <div
                        class="flex flex-col mt-6 w-full text-base font-medium leading-7 text-center text-gray-600 max-md:max-w-full">
                        <div class="flex flex-wrap gap-4 w-full max-md:max-w-full">
                            <div
                                class="flex flex-col flex-1 shrink p-6 bg-rose-50 rounded-2xl basis-0 min-w-[240px] max-md:px-5">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/8f05e4604a53d3576c8baab5f2d69f1e2236d7896e07ac77fa4fa55d4770d568?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain self-center w-10 aspect-square" />
                                <div class="mt-3.5">
                                    Hemos capacitado a más de 1000 mil Alumnos a nivel nacional.
                                </div>
                            </div>
                            <div
                                class="flex flex-col flex-1 shrink self-start p-6 bg-red-100 rounded-2xl basis-0 min-w-[240px] max-md:px-5">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/fded84a8f2a4c00e41049a533cd475f87f11f9b1cd08a83986d7115c76e76bd6?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain self-center w-10 aspect-square" />
                                <div class="mt-3.5">
                                    Contamos con una moderna plataforma virtual implementada para ser
                                    utilizada de manera constante.
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-4 w-full max-md:max-w-full">
                            <div
                                class="flex flex-col flex-1 shrink p-6 bg-red-100 rounded-2xl basis-0 min-w-[240px] max-md:px-5">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/900488d95906babfb0159e67099ca97c06c5a8689ad4fa6805f341a18d4fb5d0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain self-center w-10 aspect-square" />
                                <div class="mt-3.5">
                                    Tenemos docentes con más de 20 años de experiencia capacitando
                                    profesionales, técnicos y estudiantes.
                                </div>
                            </div>
                            <div
                                class="flex flex-col flex-1 shrink p-6 bg-rose-50 rounded-2xl basis-0 min-w-[240px] max-md:px-5">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/a126e5871640bf976e51db9b2f3ece99025832d1b74101155de0d4699c72545b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain self-center w-10 aspect-square" />
                                <div class="mt-3.5">
                                    Metodología innovadora de enseñanza especializada
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-10 w-full max-md:max-w-full">
                    <div class="text-2xl font-bold leading-tight text-neutral-800">
                        Temario
                    </div>
                    <div class="flex flex-col mt-6 w-full max-md:max-w-full">
                        <div
                            class="flex flex-col p-5 w-full rounded-2xl border border-red-200 border-solid max-md:max-w-full">
                            <div class="flex flex-wrap gap-6 items-start w-full max-md:max-w-full">
                                <div
                                    class="flex flex-1 shrink gap-2 items-start text-base font-medium leading-6 basis-0 min-w-[240px] text-neutral-800">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/b99f6f1e6d27e66f09ea0f6250e810c5af4cda76cae97bf7801630a3d13ff88c?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 w-5 aspect-square" />
                                    <div class="flex-1 shrink basis-0">
                                        Módulo 1: Marco conceptual y normativo del Sistema Nacional de
                                        Control - SNC y el Ejercicio de Control Gubernamental.
                                    </div>
                                </div>
                                <div class="flex gap-4 items-start text-sm tracking-normal leading-loose text-gray-600">
                                    <div class="flex gap-1.5 items-center">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/023d6aa6e4775bb71fca3d2a8e5c44ea433e19ced445762a9b117860305957fb?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                            class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                        <div class="self-stretch my-auto">4 lectures</div>
                                    </div>
                                    <div class="flex gap-1.5 items-center whitespace-nowrap">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/f07d0a554c69ac7c4aed36c3e73dc4a8b92c6e3bd55bb81a1fe2f7634a0e5ba0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                            class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                        <div class="self-stretch my-auto">51m</div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-col justify-center pb-4 mt-6 w-full text-sm tracking-normal text-gray-600 max-md:max-w-full">
                                <div class="flex flex-wrap justify-between items-start w-full max-md:max-w-full">
                                    <div
                                        class="flex flex-wrap flex-1 shrink gap-2 items-start leading-6 basis-0 min-w-[240px] max-md:max-w-full">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b7a35fbda34504704c44102995d0f740beb1c7d9e00000a09c26b1226a182c21?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                            class="object-contain shrink-0 w-4 aspect-square" />
                                        <div class="flex-1 shrink basis-0 max-md:max-w-full">
                                            Marco Normativo del Sistema Nacional de Control y el ejercicio
                                            de control gubernamental.
                                        </div>
                                    </div>
                                    <div class="leading-loose">07:31</div>
                                </div>
                                <div class="flex flex-wrap justify-between items-start mt-3.5 w-full max-md:max-w-full">
                                    <div
                                        class="flex flex-wrap flex-1 shrink gap-2 items-start leading-6 basis-0 min-w-[240px] max-md:max-w-full">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b7a35fbda34504704c44102995d0f740beb1c7d9e00000a09c26b1226a182c21?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                            class="object-contain shrink-0 w-4 aspect-square" />
                                        <div class="flex-1 shrink basis-0 max-md:max-w-full">
                                            El Sistema Nacional de Control-SNC, entidades sujetas,
                                            conformación (Contraloría General de la República, Órganos de
                                            Control Institucional, y Sociedades de Auditoría) y
                                            atribuciones.
                                        </div>
                                    </div>
                                    <div class="leading-loose">07:31</div>
                                </div>
                                <div class="flex flex-wrap justify-between items-start mt-3.5 w-full max-md:max-w-full">
                                    <div
                                        class="flex flex-wrap flex-1 shrink gap-2 items-start leading-6 basis-0 min-w-[240px] max-md:max-w-full">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b7a35fbda34504704c44102995d0f740beb1c7d9e00000a09c26b1226a182c21?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                            class="object-contain shrink-0 w-4 aspect-square" />
                                        <div class="flex-1 shrink basis-0 max-md:max-w-full">
                                            Clasificación del control gubernamental en función de quién lo
                                            ejerce (interno, externo) y en el momento de su ejercicio
                                            (previo, simultáneo y posterior).
                                        </div>
                                    </div>
                                    <div class="leading-loose">07:31</div>
                                </div>
                                <div class="flex flex-wrap justify-between items-start mt-3.5 w-full max-md:max-w-full">
                                    <div
                                        class="flex flex-wrap flex-1 shrink gap-2 items-start leading-6 basis-0 min-w-[240px] max-md:max-w-full">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b7a35fbda34504704c44102995d0f740beb1c7d9e00000a09c26b1226a182c21?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                            class="object-contain shrink-0 w-4 aspect-square" />
                                        <div class="flex-1 shrink basis-0 max-md:max-w-full">
                                            Los principios de control gubernamental y la aplicación de las
                                            Normas Generales de Control Gubernamental
                                        </div>
                                    </div>
                                    <div class="leading-loose">07:31</div>
                                </div>
                                <div class="flex flex-wrap justify-between items-start mt-3.5 w-full max-md:max-w-full">
                                    <div
                                        class="flex flex-wrap flex-1 shrink gap-2 items-start leading-6 basis-0 min-w-[240px] max-md:max-w-full">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b7a35fbda34504704c44102995d0f740beb1c7d9e00000a09c26b1226a182c21?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                            class="object-contain shrink-0 w-4 aspect-square" />
                                        <div class="flex-1 shrink basis-0 max-md:max-w-full">
                                            Servicios de Control Gubernamental: Marco Conceptual, tipos y
                                            modalidades.
                                        </div>
                                    </div>
                                    <div class="leading-loose">07:31</div>
                                </div>
                                <div
                                    class="flex flex-wrap gap-10 justify-between items-center mt-3.5 w-full leading-loose max-md:max-w-full">
                                    <div class="flex gap-2 items-center self-stretch my-auto">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/0d1964115afa9d30cb0d63ff8aae9573f8607e213ed3e511568f4f93827f6c08?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                            class="object-contain shrink-0 self-stretch my-auto w-4 aspect-square" />
                                        <div class="self-stretch my-auto">Examen final del bloque</div>
                                    </div>
                                    <div class="self-stretch my-auto">5.3 MB</div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex flex-wrap gap-6 justify-center items-start p-5 mt-3 w-full rounded-2xl border border-red-200 border-solid max-md:max-w-full">
                            <div
                                class="flex flex-1 shrink gap-2 items-start text-base font-medium leading-6 basis-0 min-w-[240px] text-neutral-800">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6bc0c6217d17e13ec0297cb2bc10cfc3224178f9a2c310f33da1e949ffa7a464?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-5 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Módulo 3: Servicios de Control Gubernamental Simultáneo
                                </div>
                            </div>
                            <div class="flex gap-4 items-start text-sm tracking-normal leading-loose text-gray-600">
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/023d6aa6e4775bb71fca3d2a8e5c44ea433e19ced445762a9b117860305957fb?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">52 lectures</div>
                                </div>
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/f07d0a554c69ac7c4aed36c3e73dc4a8b92c6e3bd55bb81a1fe2f7634a0e5ba0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">5h 49m</div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex flex-wrap gap-6 justify-center items-start p-5 mt-3 w-full rounded-2xl border border-red-200 border-solid max-md:max-w-full">
                            <div
                                class="flex flex-1 shrink gap-2 items-start text-base font-medium leading-6 basis-0 min-w-[240px] text-neutral-800">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6bc0c6217d17e13ec0297cb2bc10cfc3224178f9a2c310f33da1e949ffa7a464?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-5 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Módulo 4: Auditoría de Cumplimiento y Servicio de Control
                                    Específico a Hechos con Presunta Irregularidad
                                </div>
                            </div>
                            <div class="flex gap-4 items-start text-sm tracking-normal leading-loose text-gray-600">
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/023d6aa6e4775bb71fca3d2a8e5c44ea433e19ced445762a9b117860305957fb?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">52 lectures</div>
                                </div>
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/f07d0a554c69ac7c4aed36c3e73dc4a8b92c6e3bd55bb81a1fe2f7634a0e5ba0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">5h 49m</div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex flex-wrap gap-6 justify-center items-start p-5 mt-3 w-full rounded-2xl border border-red-200 border-solid max-md:max-w-full">
                            <div
                                class="flex flex-1 shrink gap-2 items-start text-base font-medium leading-6 basis-0 min-w-[240px] text-neutral-800">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6bc0c6217d17e13ec0297cb2bc10cfc3224178f9a2c310f33da1e949ffa7a464?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-5 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Módulo 5: Planeamiento de la auditoría de cumplimiento y servicio
                                    de control específico a hechos con presunta irregularidad
                                </div>
                            </div>
                            <div class="flex gap-4 items-start text-sm tracking-normal leading-loose text-gray-600">
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/023d6aa6e4775bb71fca3d2a8e5c44ea433e19ced445762a9b117860305957fb?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">52 lectures</div>
                                </div>
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/f07d0a554c69ac7c4aed36c3e73dc4a8b92c6e3bd55bb81a1fe2f7634a0e5ba0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">5h 49m</div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex flex-wrap gap-6 justify-center items-start p-5 mt-3 w-full rounded-2xl border border-red-200 border-solid max-md:max-w-full">
                            <div
                                class="flex flex-1 shrink gap-2 items-start text-base font-medium leading-6 basis-0 min-w-[240px] text-neutral-800">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6bc0c6217d17e13ec0297cb2bc10cfc3224178f9a2c310f33da1e949ffa7a464?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-5 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Módulo 6: Planificación de la auditoría de cumplimiento y servicio
                                    de control específico a hechos con presunta irregularidad
                                </div>
                            </div>
                            <div class="flex gap-4 items-start text-sm tracking-normal leading-loose text-gray-600">
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/023d6aa6e4775bb71fca3d2a8e5c44ea433e19ced445762a9b117860305957fb?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">52 lectures</div>
                                </div>
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/f07d0a554c69ac7c4aed36c3e73dc4a8b92c6e3bd55bb81a1fe2f7634a0e5ba0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">5h 49m</div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex flex-wrap gap-6 justify-center items-start p-5 mt-3 w-full rounded-2xl border border-red-200 border-solid max-md:max-w-full">
                            <div
                                class="flex flex-1 shrink gap-2 items-start text-base font-medium leading-6 basis-0 min-w-[240px] text-neutral-800">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6bc0c6217d17e13ec0297cb2bc10cfc3224178f9a2c310f33da1e949ffa7a464?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-5 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Módulo 7: Técnicas y Procedimientos de Auditoría
                                </div>
                            </div>
                            <div class="flex gap-4 items-start text-sm tracking-normal leading-loose text-gray-600">
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/023d6aa6e4775bb71fca3d2a8e5c44ea433e19ced445762a9b117860305957fb?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">52 lectures</div>
                                </div>
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/f07d0a554c69ac7c4aed36c3e73dc4a8b92c6e3bd55bb81a1fe2f7634a0e5ba0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">5h 49m</div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex flex-wrap gap-6 justify-center items-start p-5 mt-3 w-full rounded-2xl border border-red-200 border-solid max-md:max-w-full">
                            <div
                                class="flex flex-1 shrink gap-2 items-start text-base font-medium leading-6 basis-0 min-w-[240px] text-neutral-800">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6bc0c6217d17e13ec0297cb2bc10cfc3224178f9a2c310f33da1e949ffa7a464?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-5 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Módulo 8: Ejecución de la auditoría de cumplimiento y servicio de
                                    control específico a hechos con presunta irregularidad
                                </div>
                            </div>
                            <div class="flex gap-4 items-start text-sm tracking-normal leading-loose text-gray-600">
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/023d6aa6e4775bb71fca3d2a8e5c44ea433e19ced445762a9b117860305957fb?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">52 lectures</div>
                                </div>
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/f07d0a554c69ac7c4aed36c3e73dc4a8b92c6e3bd55bb81a1fe2f7634a0e5ba0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">5h 49m</div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex flex-wrap gap-6 justify-center items-start p-5 mt-3 w-full rounded-2xl border border-red-200 border-solid max-md:max-w-full">
                            <div
                                class="flex flex-1 shrink gap-2 items-start text-base font-medium leading-6 basis-0 min-w-[240px] text-neutral-800">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6bc0c6217d17e13ec0297cb2bc10cfc3224178f9a2c310f33da1e949ffa7a464?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-5 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Módulo 9: Elaboración de Informes de Auditoría de Cumplimiento y
                                    Servicio de Control Específico a Hechos con Presunta Irregularidad
                                </div>
                            </div>
                            <div class="flex gap-4 items-start text-sm tracking-normal leading-loose text-gray-600">
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/023d6aa6e4775bb71fca3d2a8e5c44ea433e19ced445762a9b117860305957fb?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">52 lectures</div>
                                </div>
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/f07d0a554c69ac7c4aed36c3e73dc4a8b92c6e3bd55bb81a1fe2f7634a0e5ba0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">5h 49m</div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex flex-wrap gap-6 justify-center items-start p-5 mt-3 w-full rounded-2xl border border-red-200 border-solid max-md:max-w-full">
                            <div
                                class="flex flex-1 shrink gap-2 items-start text-base font-medium leading-6 basis-0 min-w-[240px] text-neutral-800">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6bc0c6217d17e13ec0297cb2bc10cfc3224178f9a2c310f33da1e949ffa7a464?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain shrink-0 w-5 aspect-square" />
                                <div class="flex-1 shrink basis-0">
                                    Módulo 10: Implementación y seguimiento de las recomendaciones de
                                    los informes de auditoría y su publicación en el portal de
                                    transparencia
                                </div>
                            </div>
                            <div class="flex gap-4 items-start text-sm tracking-normal leading-loose text-gray-600">
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/023d6aa6e4775bb71fca3d2a8e5c44ea433e19ced445762a9b117860305957fb?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">52 lectures</div>
                                </div>
                                <div class="flex gap-1.5 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/f07d0a554c69ac7c4aed36c3e73dc4a8b92c6e3bd55bb81a1fe2f7634a0e5ba0?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                        class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                                    <div class="self-stretch my-auto">5h 49m</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex gap-3 items-center self-start px-4 py-2 mt-6 text-base font-bold leading-tight text-white bg-rose-700 rounded-xl">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/6951aae30f33bd543a5f70e81f55bc643f33df502d318789244486f456ed1aca?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                        <div class="self-stretch my-auto">Brochure del curso</div>
                    </div>
                </div>
                <div
                    class="flex flex-col mt-10 w-full text-2xl font-bold leading-tight whitespace-nowrap text-neutral-800 max-md:max-w-full">
                    <div class="max-md:max-w-full">Diploma</div>
                    <img loading="lazy"
                        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/ccadd2ada7ecc27e927e3cecf582fc6255e077af16db82817156e0030376bbb5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                        class="object-contain mt-6 w-full aspect-[1.28] max-md:max-w-full" />
                </div>
                <div class="flex flex-col mt-10 w-full max-md:max-w-full">
                    <div class="text-2xl font-bold leading-tight text-neutral-800 max-md:max-w-full">
                        Docente
                    </div>
                    <div
                        class="flex flex-col items-start p-8 mt-6 w-full bg-rose-50 rounded-2xl max-md:px-5 max-md:max-w-full">
                        <img loading="lazy"
                            srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/35826865a25ac2b4c77ae4e6641929f25ecea75c3e4709ab10e426cee344f5f5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain max-w-full aspect-square rounded-[200px] w-[136px]" />
                        <div class="flex flex-col self-stretch mt-6 w-full max-md:max-w-full">
                            <div class="flex flex-col w-full max-md:max-w-full">
                                <div class="text-xl font-bold leading-tight text-slate-700 max-md:max-w-full">
                                    Dra. Patricia Heredia Olivera
                                </div>
                                <div class="mt-1.5 text-sm tracking-normal leading-6 text-gray-600 max-md:max-w-full">
                                    Economista especialista, con amplia experiencia en el sector
                                    público y privado. Magíster en Gestión Pública (ESAN).
                                </div>
                            </div>
                            <div
                                class="mt-4 w-full text-sm tracking-normal leading-6 text-gray-600 rounded-none max-md:max-w-full">
                                Profesional con amplia experiencia en auditoría gubernamental y
                                control interno. Experto en normativas y prácticas de supervisión y
                                fiscalización en el sector público peruano. Apasionado por compartir
                                conocimientos y habilidades para promover la transparencia y la
                                eficiencia en la gestión pública.
                            </div>
                        </div>
                        <div
                            class="flex gap-2.5 justify-center items-center px-5 py-2.5 mt-6 text-sm font-bold text-center text-white bg-rose-700 min-h-[40px] rounded-[100px]">
                            <div class="self-stretch my-auto">Perfil del decente</div>
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/750b30a75e1a11903416d34d5658b5bf616a3d859daa9372126fdab98a9b8f15?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-10 w-full max-md:max-w-full">
                    <div class="text-2xl font-bold leading-tight text-neutral-800 max-md:max-w-full">
                        Inversión
                    </div>
                    <div class="flex flex-col p-6 mt-6 w-full bg-rose-50 rounded-2xl max-md:px-5 max-md:max-w-full">
                        <div class="flex flex-col w-full text-base font-medium leading-7 text-gray-600 max-md:max-w-full">
                            <div class="flex-1 shrink gap-2 self-stretch w-full max-md:max-w-full">
                                Valor: S/ 250.00
                            </div>
                            <div class="flex-1 shrink gap-2 self-stretch mt-3 w-full max-md:max-w-full">
                                Persona Natural: S/ 250.00
                            </div>
                            <div class="flex-1 shrink gap-2 self-stretch mt-3 w-full max-md:max-w-full">
                                Persona Jurídica: S/ 250.00 + IGV
                            </div>
                        </div>
                        <div
                            class="flex gap-2.5 justify-center items-center self-start px-5 py-2.5 mt-6 text-sm font-bold text-center text-white bg-rose-700 min-h-[40px] rounded-[100px]">
                            <div class="self-stretch my-auto">Comprar Curso</div>
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/750b30a75e1a11903416d34d5658b5bf616a3d859daa9372126fdab98a9b8f15?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-10 w-full max-md:max-w-full">
                    <div class="text-2xl font-bold leading-tight text-neutral-800 max-md:max-w-full">
                        Método de Pago
                    </div>
                    <div class="flex flex-col p-6 mt-6 w-full bg-red-100 rounded-2xl max-md:px-5 max-md:max-w-full">
                        <div class="text-xl font-bold leading-tight text-neutral-800 max-md:max-w-full">
                            Cuenta Bancaria BBVA
                        </div>
                        <div class="flex flex-col mt-5 w-full max-md:max-w-full">
                            <div class="flex flex-col w-full whitespace-nowrap max-md:max-w-full">
                                <div class="text-sm tracking-normal leading-loose text-gray-600 max-md:max-w-full">
                                    Titular
                                </div>
                                <div
                                    class="w-full text-lg font-bold tracking-normal leading-none rounded-none text-neutral-800 max-md:pr-5 max-md:max-w-full">
                                    EGESPP
                                </div>
                            </div>
                            <div class="flex flex-col mt-3 w-full max-md:max-w-full">
                                <div class="text-sm tracking-normal leading-loose text-gray-600 max-md:max-w-full">
                                    Número de cuenta
                                </div>
                                <div
                                    class="w-full text-lg font-bold tracking-normal leading-none whitespace-nowrap rounded-none text-neutral-800 max-md:pr-5 max-md:max-w-full">
                                    0011-0615-0200240417
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-wrap gap-5 mb-20 items-start p-6 mt-6 w-full bg-red-200 rounded-2xl max-md:px-5 max-md:max-w-full">
                        <div class="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
                            <div class="text-xl font-bold leading-tight text-neutral-800">
                                Yape o Plin
                            </div>
                            <div class="flex flex-col mt-5 w-full">
                                <div class="flex flex-col w-full">
                                    <div class="text-sm tracking-normal leading-loose text-gray-600">
                                        Titular
                                    </div>
                                    <div
                                        class="w-full text-lg font-bold tracking-normal leading-none rounded-none text-neutral-800 max-md:pr-5">
                                        Edwin Williams
                                    </div>
                                </div>
                                <div class="flex flex-col mt-3 w-full">
                                    <div class="text-sm tracking-normal leading-loose text-gray-600">
                                        Número Yape o Plin
                                    </div>
                                    <div
                                        class="w-full text-lg font-bold tracking-normal leading-none rounded-none text-neutral-800 max-md:pr-5">
                                        976 019 977
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img loading="lazy"
                            srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/eac810d7c65f807434897557781e1c49da92e8c7d8473e985d1a5af430b124a3?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 aspect-[0.98] w-[161px]" />
                    </div>
                </div>
            </div>
            <div class="flex flex-col sticky top-0 justify-center py-8 bg-rose-50 rounded-2xl min-w-[240px] w-[400px]">
                <div class="flex flex-col px-6 w-full max-md:px-5">
                    <div class="flex gap-10 justify-between items-center w-full">
                        <div class="flex gap-2 items-center self-stretch my-auto text-neutral-800">
                            <div class="self-stretch my-auto text-2xl font-bold leading-none">
                                S/ 250.00
                            </div>
                            <div class="self-stretch my-auto text-base font-medium">
                                PEN 299.90
                            </div>
                        </div>
                        <div
                            class="gap-2.5 self-stretch px-3 py-2 my-auto text-sm font-bold leading-none text-red-600 uppercase bg-red-100 rounded-xl">
                            56% off
                        </div>
                    </div>
                    <div
                        class="flex gap-2 justify-center items-center self-start mt-3 text-sm font-medium tracking-normal leading-none text-red-600">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/25fd0fa9e16611447f71de6665b5e2da08b305774b61b232d6688e6c7f2503c2?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                            class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square" />
                        <div class="self-stretch my-auto">¡Quedan 2 días a este precio!</div>
                    </div>
                </div>
                <div class="mt-6 w-full border border-white border-solid min-h-[1px]"></div>
                <div class="flex flex-col pl-6 mt-6 w-full max-md:pl-5">
                    <div class="text-base font-medium leading-none text-neutral-800">
                        Este curso incluye:
                    </div>
                    <div class="flex flex-col mt-4 text-sm tracking-normal leading-loose text-gray-600">
                        <div class="flex gap-3 items-center">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/74a856f765768e83d6b21a6d6f3bc0d8e18555c6209f853f20245261d56a0406?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                            <div class="self-stretch my-auto w-[340px]">Acceso de por vida</div>
                        </div>
                        <div class="flex gap-3 items-center mt-3">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/832ca9f5a9db9a8bed8288d8cadd0d150cf66aeabe4f30d4926418f3386463a4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                            <div class="self-stretch my-auto w-[340px]">
                                Garantía de devolución de dinero de 30 días
                            </div>
                        </div>
                        <div class="flex gap-3 items-center mt-3 leading-6">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/f8669d3e6d9a7490ba10a19614ed136316a25b7c0d7ab994a6d8b02527970d10?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                            <div class="self-stretch my-auto w-[340px]">
                                Archivo de ejercicios gratuitos y recursos descargables.
                            </div>
                        </div>
                        <div class="flex gap-3 items-center mt-3">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/21e174a3d3997c418a7c7b1e613fcfdfd99f9c747b4c3c99bd855083835f7df4?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                            <div class="self-stretch my-auto w-[340px]">
                                Certificado de finalización compartible
                            </div>
                        </div>
                        <div class="flex gap-3 items-center mt-3">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/0d25f67c4a3f8993997221b3da4cdbf7477672170509625bf618332c6ed4134b?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                            <div class="self-stretch my-auto w-[340px]">
                                Accede desde móvil, tablet y TV
                            </div>
                        </div>
                        <div class="flex gap-3 items-center mt-3">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/f95671b541a607e624fa4d960a9fb3aa876b884d691fa66ec4efd1dc9661ab97?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                            <div class="self-stretch my-auto w-[340px]">Curso 100% en línea</div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 w-full border border-white border-solid min-h-[1px]"></div>
                <div class="flex flex-col px-6 mt-6 w-full max-md:px-5">
                    <div class="flex flex-col w-full text-sm font-bold tracking-normal leading-[56px]">
                        <div
                            class="gap-3 self-stretch px-8 w-full h-10 text-white capitalize bg-red-400 rounded-xl max-md:px-5">
                            añadir A La cesta
                        </div>
                        <div class="gap-3 self-stretch px-8 mt-2 w-full h-10 text-white bg-red-800 rounded-xl max-md:px-5">
                            Comprar Ahora
                        </div>
                    </div>
                    <div class="mt-3 text-xs tracking-normal leading-5 text-neutral-800">
                        Nota: todos los cursos tienen garantía de devolución de dinero de 30
                        días.
                    </div>
                </div>
                <div class="mt-6 w-full border border-white border-solid min-h-[1px]"></div>
                <div class="flex flex-col pl-6 mt-6 w-full max-md:pl-5">
                    <div class="text-sm font-medium leading-loose text-neutral-800">
                        Comparte este curso:
                    </div>
                    <div class="flex flex-col mt-4 w-full">
                        <div class="flex gap-3 items-center w-full">
                            <div
                                class="flex flex-1 shrink gap-2.5 justify-center items-center self-stretch p-3.5 my-auto bg-red-100 rounded-lg basis-0">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/fa62c6d683fac49cc5a880eea7906f26d6f470e256e95eedc3c44316b35515ac?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain self-stretch my-auto w-5 aspect-square" />
                            </div>
                            <div
                                class="flex flex-1 shrink gap-2.5 justify-center items-center self-stretch p-3 my-auto bg-red-100 rounded-lg basis-0">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/efde1e2a7058704810584bf8b5c90aaf3a1719cccb5095a7c811993f9d92fb6e?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain self-stretch my-auto w-6 aspect-square" />
                            </div>
                            <div
                                class="flex flex-1 shrink gap-2.5 justify-center items-center self-stretch p-3.5 my-auto bg-red-100 rounded-lg basis-0">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/912f193523fb27114046af37fd481933e264b7f1c872b67cdcb5d8e56f1391bf?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                    class="object-contain self-stretch my-auto w-5 aspect-square" />
                            </div>
                        </div>
                        <div
                            class="flex gap-3 justify-center items-center px-5 py-2 mt-2 w-full text-sm font-medium tracking-normal leading-none text-white bg-red-400 rounded-lg min-h-[40px]">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/523e4f3fbfa03ca18485d6b1725cd6b81714f16700efdac0d4303b0c2b12c9c5?placeholderIfAbsent=true&apiKey=5531072f5ff9482693929f17ec98446f"
                                class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                            <div class="self-stretch my-auto">Copiar link</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@section('scripts_importados')

    <script>
        function calcularTotal() {
            let articulos = Local.get('carrito')
            let total = articulos.map(item => {
                let monto
                if (Number(item.descuento) !== 0) {
                    monto = item.cantidad * Number(item.descuento)
                } else {
                    monto = item.cantidad * Number(item.precio)

                }
                return monto

            })
            const suma = total.reduce((total, elemento) => total + elemento, 0);

            $('#itemsTotal').text(`S/. ${suma} `)

        }
        $(document).ready(function() {
            console.log(pops.length)
            if (pops.length > 0) {
                $('#modalofertas').modal({
                    show: true,
                    fadeDuration: 100
                })

            }


            $(document).ready(function() {
                articulosCarrito = Local.get('carrito') || [];

                // PintarCarrito();
            });

        })
    </script>

    <script>
        /*  */
        var swiper = new Swiper(".beneficios", {
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1350: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });


        var carrouselTestimonios = new Swiper(".myTestimonios", {
            slidesPerView: 1, //3
            spaceBetween: 20,
            loop: true,
            grabCursor: false,
            centeredSlides: false,
            initialSlide: 0,
            speed: 1000,
            pagination: {
                el: ".swiper-pagination-testimonios",
                clickable: true,
            },
            navigation: {
                nextEl: ".next-testimonios",
                prevEl: ".prev-testimonios",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        var swiper = new Swiper(".slider", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 1,
                },
            },
        });
    </script>


@stop

@stop
