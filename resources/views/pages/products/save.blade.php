@php
  use SoDe\Extend\Crypto;
@endphp

<x-app-layout>


  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <form id="product-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $product->id }}">
      <div
        class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">

          <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">
            @if (!$product->id)
              Nuevo Curso
            @else
              Actualizar Curso - {{ $product->producto }}
            @endif
          </h2>
        </header>
        <div class="flex flex-col gap-2 p-3 ">
          <div class="grid grid-cols-1 md:grid-cols-5 gap-2 p-3 ">

            <div class="col-span-5 md:col-span-3">
              <div class="rounded shadow-lg p-4 px-4 border mb-2">


                <div id='general' class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 ">

                  <div class="col-span-5 md:col-span-3">

                    <label for="producto">Curso <span class="text-red-500 font-bold">*</span></label>

                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                      </div>
                      <input type="text" id="producto" name="producto" value="{{ $product->producto }}"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Curso" required>


                    </div>
                  </div>
                  {{--  <div class="col-span-5 md:col-span-2">

                    <label for="color">Color <span class="text-red-500 font-bold">*</span></label>

                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                      </div>
                      <input type="text" id="color" name="color" value="{{ $product->color }}"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Color">


                    </div>
                  </div> --}}
                  <div class="col-span-5 md:col-span-5 mt-2">

                    <label for="extract">Extracto</label>

                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                      </div>
                      <input type="text" id="extract" name="extract" value="{{ $product->extract }}"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Extracto">


                    </div>
                  </div>
                  <div class="col-span-5 md:col-span-5">
                    <label for="description">Descripcion</label>
                    <div class="relative mb-2 mt-2">
                      {{-- <textarea type="text" rows="2" id="description" name="description" value=""
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Descripción">{{ $product->description }}</textarea> --}}
                      <x-form.quill id="description" :value="$product->description" />
                    </div>
                  </div>
                  <div class="col-span-5 md:col-span-5">
                    <label for="description">¿A quién va dirigido?
                    </label>
                    <div class="relative mb-2 mt-2">
                      {{-- <textarea type="text" rows="2" id="description" name="description" value=""
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Descripción">{{ $product->description }}</textarea> --}}
                      <x-form.quill id="description2" :value="$product->description2" />
                    </div>
                  </div>
                  <div class="col-span-5 md:col-span-5">
                    <label for="lograras">¿Que lograras?
                    </label>
                    <div class="relative mb-2 mt-2">
                      {{-- <textarea type="text" rows="2" id="description" name="description" value=""
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Descripción">{{ $product->description }}</textarea> --}}
                      <x-form.quill id="lograras" :value="$product->lograras" />
                    </div>
                  </div>

                  <hr class="col-span-5">

                  <div class="col-span-5 md:col-span-5 mb-2">
                    <label for=""
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Previsualizacion del
                      Curso</label>
                    <div class="flex flex-wrap items-center gap-4">
                      <div for="imagen_ambiente" x-data="{ showAmbiente: false }" @mouseenter="showAmbiente = true"
                        @mouseleave="showAmbiente = false"
                        class="relative flex justify-center items-center h-[256px] w-[192px] border rounded-lg">
                        @if ($product->imagen)
                          <img id="imagen_previewer" x-show="!showAmbiente"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            src="{{ asset($product->imagen) }}" alt="{{ $product->name }}"
                            class="bg-[#f2f2f2] w-full h-full object-contain absolute inset-0 rounded-lg" />
                        @else
                          <img id="imagen_previewer" x-show="!showAmbiente"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            src="{{ asset('images/img/noimagen.jpg') }}" alt="imagen_alternativa"
                            class="bg-[#f2f2f2] w-full h-full object-contain absolute inset-0 rounded-lg" />
                        @endif
                        @if ($product->imagen_ambiente)
                          <img id="imagen_ambiente_previewer" x-show="showAmbiente"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            src="{{ asset($product->imagen_ambiente) }}" alt="{{ $product->name }}"
                            class="w-full h-full object-cover absolute inset-0 rounded-lg" />
                        @else
                          <img id="imagen_ambiente_previewer" x-show="showAmbiente"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300 transform"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95" src="{{ asset('images/img/noimagen.jpg') }}"
                            alt="imagen_alternativa" class="w-full h-full object-cover absolute inset-0 rounded-lg" />
                        @endif
                      </div>
                      <div>
                        {{-- <div class="mb-4">
                          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="image_texture">Imagen de textura <span
                              class="text-red-500 font-bold">*</span></label>
                          <label class="block w-max" for="image_texture" title="Cambiar imagen de textura" tippy>
                            <img id="image_texture_previewer"
                              class="w-40 h-10 border rounded-md object-cover object-center cursor-pointer"
                              src="{{ $product->image_texture ? asset($product->image_texture) : asset('images/img/noimagen.jpg') }}"
                              alt="">
                          </label>
                          <input data-id="input_img" class="hidden" id="image_texture" name="image_texture"
                            type="file" accept="image/*">
                        </div> --}}

                        <div class="mb-4">
                          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="imagen">Imagen del Curso</label>
                          <input data-id="input_img"
                            class="py-1 px-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="imagen" name="imagen" type="file" accept="image/*"
                            title="Cargar imagen de producto" tippy>
                        </div>
                        <div>
                          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="imagen_ambiente">Imagen Secundaria</label>
                          <input data-id="input_img"
                            class="py-1 px-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="imagen_ambiente" name="imagen_ambiente" type="file" accept="image/*"
                            title="Cargar imagen de ambiente" tippy>
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="col-span-5">

                  {{--   <div class="col-span-5">
                    <label for="imagenes mb-2">Otras imagenes del Curso</label>
                    <div id="imagenes" class="w-full flex flex-wrap gap-1">

                      <div id="imagenes_sortable" class="flex flex-wrap gap-1 max-w-full">
                        @foreach ($galery as $key => $image)
                          @php
                            $uuid = Crypto::randomUUID();
                          @endphp
                          <div id="galery_container_{{ $uuid }}"
                            class="relative group block w-[120px] h-[160px] rounded-md border" draggable="true">
                            <div
                              class="absolute top-0 left-0 bottom-0 right-0 rounded-md hover:bg-[#00000075] transition-all flex flex-col items-center justify-center gap-1">
                              <label for="galery_{{ $uuid }}" title="Cambiar Imagen" tippy
                                class="text-xl text-white hidden group-hover:block cursor-pointer fa-solid fa-camera-rotate z-10"></label>
                              <i id="btn_delete_galery" data-id="{{ $uuid }}" title="Eliminar Imagen" tippy
                                class="text-xl text-white hidden group-hover:block cursor-pointer fa-regular fa-trash-can z-10"></i>
                            </div>

                            <input class="hidden" name="galery[]"
                              value="{{ $image->id }}|{{ $image->imagen }}|{{ $key }}">
                            <input class="hidden" type="file" id="galery_{{ $uuid }}" accept="image/*">
                            <img class="w-full h-full rounded-md object-cover"
                              src="{{ $image->imagen ? asset($image->imagen) : asset('images/img/noimagen.jpg') }}">
                          </div>
                        @endforeach
                      </div>
                      <label for="galery"
                        class="block w-[120px] h-[160px] rounded-md border hover:opacity-50 cursor-pointer"
                        title="Agregar imagen" tippy>
                        <input class="hidden" type="file" id="galery" accept="image/*" multiple>
                        <img class="w-full h-full rounded-md object-cover"
                          src="{{ asset('images/img/image-plus.jpg') }}" alt="">
                      </label>
                    </div>
                  </div> --}}

                  {{-- <div class="md:col-span-5">
                    <label class="block mb-1" for="imagen">Imagen del producto</label>
                    <input id="imagen" name="imagen"
                      class="mb-2 p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                      aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    <label class="block mb-1" for="imagen_ambiente">Imagen de ambiente</label>
                    <input id="imagen_ambiente" name="imagen_ambiente"
                      class="mb-2 p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                      aria-describedby="user_avatar_help" id="user_avatar" type="file">
                  </div> --}}
                </div>
              </div>
            </div>
            <div class="col-span-5 md:col-span-2">
              <div
                class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 border mb-2">
                <div class="md:col-span-5 flex flex-wrap flex-4 justify-between">
                  <label class="inline-flex items-center cursor-pointer mb-2">
                    <input id="destacar" name="destacar" type="checkbox" class="sr-only peer"
                      {{ $product->destacar ? 'checked' : '' }}>
                    <div
                      class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="block ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Destacar</span>
                  </label>
                  <label class="inline-flex items-center cursor-pointer mb-2">
                    <input id="recomendar" name="recomendar" type="checkbox" class="sr-only peer"
                      {{ $product->recomendar ? 'checked' : '' }}>
                    <div
                      class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="block ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Recomendar</span>
                  </label>
                </div>
                <div class="md:col-span-5 flex justify-between gap-4">
                  <div class="w-full">
                    <label for="precio">Precio <span class="text-red-500 font-bold">*</span></label>
                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-money-bill"></i>
                      </div>
                      <input type="number" id="precio" name="precio" value="{{ $product->precio }}"
                        step="0.1"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="precio" required>
                    </div>

                  </div>
                  <div class="w-full">
                    <label for="descuento">Precio con descuento</label>
                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-money-bill"></i>
                      </div>
                      <input type="number" id="descuento" name="descuento" value="{{ $product->descuento }}"
                        step="0.1"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="descuento">
                    </div>

                  </div>


                </div>
                {{-- <div class="md:col-span-3">
                  <label for="precio_reseller">Precio para revendedor</label>
                  <div class="relative mb-2  mt-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-money-bill"></i>
                    </div>
                    <input type="number" id="precio_reseller" name="precio_reseller"
                      value="{{ $product->precio_reseller }}"
                      class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Precio para revendedor">
                  </div>
                </div> --}}
                <div class="md:col-span-5 flex justify-between gap-4">
                  <div class="w-full">
                    <label for="fecha_inicio"> Fecha Inicio

                    </label>
                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-money-bill"></i>
                      </div>
                      <input type="date" id="fecha_inicio" name="fecha_inicio"
                        value="{{ $product->fecha_inicio }}" step="0.1"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Fecha inicio del Curso">
                    </div>

                  </div>
                  <div class="w-full">
                    <label for="duracion">Duracion
                      <span class="text-red-500 font-bold">*</span>
                    </label>
                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-money-bill"></i>
                      </div>
                      <input type="number" id="duracion" name="duracion" value="{{ $product->duracion }}"
                        step="0.1"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="duracion" required>
                    </div>

                  </div>


                </div>

                {{-- <div class="md:col-span-3">
                  <label for="sku">Sku</label>
                  <div class="relative mb-2  mt-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <i class="text-lg text-gray-500 dark:text-gray-400 fa-solid fa-barcode"></i>


                    </div>
                    <input type="text" id="sku" name="sku" value="{{ $product->sku }}"
                      class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Sku">
                  </div>
                </div> --}}

                <div class="md:col-span-5">
                  <label for="categoria_id">Categoria <span class="text-red-500 font-bold">*</span></label>
                  <div class="relative mb-2  mt-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-folder"></i>
                    </div>
                    <select id="categoria_id" name="categoria_id" required
                      class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="">Seleccionar Categoria </option>
                      @foreach ($categoria as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $product->categoria_id) selected @endif>
                          {{ $item->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                {{-- <div class="md:col-span-5">
                  <label for="subcategory_id">Subcategoria</label>
                  <div class="relative mb-2  mt-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-folder"></i>
                    </div>
                    <select id="subcategory_id" name="subcategory_id"
                      class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="">Seleccionar Subcategoria </option>
                      @foreach ($subcategories as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $product->subcategory_id) selected @endif
                          data-category="{{ $item->category_id }}" @if ($item->id != $product->categoria_id) hidden @endif>
                          {{ $item->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div> --}}
                {{-- ESTE CURSO INCLUYE  --}}
                {{-- <div class="md:col-span-5 mt-2">
                  <div class=" flex items-end justify-between gap-2 ">
                    <label for="specifications">Este Curso Incluye </label>
                    <button type="button" id="AddEspecifiacion"
                      class="text-blue-500 hover:underline focus:outline-none font-medium">
                      <i class="fa fa-plus"></i>
                      Agregar
                    </button>
                  </div>
                  @foreach ($especificacion as $key => $item)
                    @php
                      $counter = count($especificacion) - $key;
                    @endphp
                    <div class="flex gap-2">
                      <div class="relative mb-2  mt-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                        </div>
                        <input type="text" id="specifications" name="tittle-{{ $counter }}"
                          value="{{ $item->tittle }}"
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Titulo">
                      </div>


                      <div class=" mb-2 mt-2">

                        <div class="relative">
                          <button
                            class="btn btn-secondary dropdown-toggle bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="button" id="dropdownMenuButton">
                            Selecciona un Icono
                          </button>
                          <div class="dropdown-menu absolute hidden bg-white shadow-lg rounded-lg mt-1 w-full z-10">
                            @foreach ($icons as $icon)
                              <a class="dropdown-item flex items-center p-2 hover:bg-gray-100 cursor-pointer"
                                href="#" data-icon-id="{{ $icon->id }}">
                                <img src="{{ asset($icon->path) }}" alt="{{ $icon->name }}" width="30"
                                  class="mr-2">
                                {{ $icon->name }}
                              </a>
                            @endforeach
                          </div>
                        </div>
                        <input type="hidden" name="icon_id" id="selectedIconId">
                      </div>

                    </div>
                  @endforeach
                </div> --}}
                <div class="md:col-span-5">
                  <div class="flex items-end justify-between gap-2">
                    <label for="specifications">Curso Incluye</label>
                    <button type="button" id="AddEspecifiacion"
                      class="text-blue-500 hover:underline focus:outline-none font-medium"><i class="fa fa-plus"></i>
                      Agregar</button>
                  </div>
                  <div id="specifications-container" class="w-full">
                    @php
                      $incluye = [];
                      if (!is_null($product->incluye) && is_string($product->incluye)) {
                          $decoded = json_decode($product->incluye, true);
                          if (json_last_error() === JSON_ERROR_NONE) {
                              $incluye = $decoded;
                          }
                      }
                    @endphp
                    @foreach ($incluye as $key => $item)
                      <div class="flex gap-2 specification-item">
                        <div class="relative mb-2 mt-2">
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                          </div>
                          <input type="text" name="incluye[{{ $key }}][titulo]"
                            value="{{ $item['titulo'] ?? '' }}"
                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Titulo">
                        </div>
                        <div class="relative mb-2 mt-2">

                          <div class="relative w-full mt-1">
                            <button
                              class=" btn btn-secondary dropdown-toggle bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              type="button">
                              Selecciona Icono
                            </button>
                            <div class="dropdown-menu absolute hidden bg-white shadow-lg rounded-lg mt-1 w-full z-10">
                              @foreach ($icons as $icon)
                                <a class="dropdown-item flex items-center p-2 hover:bg-gray-100 cursor-pointer"
                                  href="#" data-icon-id="{{ $icon->id }}"
                                  data-icon-path="{{ asset($icon->path) }}">
                                  <img src="{{ asset($icon->path) }}" alt="{{ $icon->name }}" width="30"
                                    class="mr-2">
                                  {{ $icon->name }}
                                </a>
                              @endforeach
                            </div>
                            <input type="hidden" name="incluye[{{ $key }}][icon]" class="selected-icon-id"
                              value={{ $item['icon'] ?? '' }}>
                          </div>

                        </div>
                      </div>
                    @endforeach

                  </div>
                </div>

                <div class="md:col-span-5 mt-2">
                  <div class=" flex items-end justify-between gap-2 ">
                    <label for="specifications">Beneficios </label>
                    <button type="button" id="AddBeneficios"
                      class="text-blue-500 hover:underline focus:outline-none font-medium">
                      <i class="fa fa-plus"></i>
                      Agregar
                    </button>
                  </div>
                  @php
                    $beneficios = [];
                    if (!is_null($product->beneficios) && is_string($product->beneficios)) {
                        $decoded = json_decode($product->beneficios, true);
                        if (json_last_error() === JSON_ERROR_NONE) {
                            $beneficios = $decoded;
                        }
                    }
                  @endphp
                  @foreach ($beneficios as $key => $item)
                    @php
                      $counter = count($especificacion) - $key;
                    @endphp
                    <div class="flex gap-2">
                      <div class="relative mb-2  mt-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                        </div>
                        <input type="text" id="beneficios" name="beneficio[]" value="{{ $item }}"
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Titulo">
                      </div>

                    </div>
                  @endforeach
                </div>

                <div class="md:col-span-5 mt-2">
                  <div class="flex items-end justify-between gap-2">
                    <label for="specifications">Para quien va este curso</label>
                    <button type="button" id="AddparaquienCurso"
                      class="text-blue-500 hover:underline focus:outline-none font-medium">
                      <i class="fa fa-plus"></i> Agregar
                    </button>
                  </div>
                  @php
                    $cursodirigido = [];
                    if (!is_null($product->curso_dirigido) && is_string($product->curso_dirigido)) {
                        $decoded = json_decode($product->curso_dirigido, true);
                        if (json_last_error() === JSON_ERROR_NONE) {
                            $cursodirigido = $decoded;
                        }
                    }
                  @endphp

                  @if (!empty($cursodirigido))
                    @foreach ($cursodirigido as $key => $item)
                      <div class="flex gap-2">
                        <div class="relative mb-2 mt-2">
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                          </div>
                          <input type="text" id="curso_dirigido" name="curso_dirigido[]"
                            value="{{ $item }}"
                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Titulo">
                        </div>
                      </div>
                    @endforeach
                  @endif
                </div>
                <div class="md:col-span-5 mt-2">
                  <div class="flex items-end justify-between gap-2">
                    <label for="specifications">Temario </label>
                    <button type="button" id="AddTEmario"
                      class="text-blue-500 hover:underline focus:outline-none font-medium">
                      <i class="fa fa-plus"></i> Agregar
                    </button>
                  </div>
                  @php
                    $Temario = [];
                    if (!is_null($product->temario) && is_string($product->temario)) {
                        $decoded = json_decode($product->temario, true);
                        if (json_last_error() === JSON_ERROR_NONE) {
                            $Temario = $decoded;
                        }
                    }
                  @endphp
                  @foreach ($Temario as $key => $item)
                    <div class="flex gap-2">
                      <div class="relative mb-2 mt-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                        </div>
                        <input type="text" name="temario[{{ $key }}][desc]"
                          value="{{ $item['desc'] ?? '' }}"
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Descripción">
                      </div>
                      <div class="relative mb-2 mt-2">
                        <input type="number" name="temario[{{ $key }}][recurso]"
                          value="{{ $item['recurso'] ?? '' }}"
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Recurso">
                      </div>
                      <div class="relative mb-2 mt-2">
                        <input type="number" name="temario[{{ $key }}][tiempo]"
                          value="{{ $item['tiempo'] ?? '' }}"
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Tiempo">
                      </div>
                    </div>
                  @endforeach
                </div>

                <div class="md:col-span-5">
                  <label for="producto">Atributos</label>
                  <div class="flex flex-wrap gap-2 mt-2 relative mb-2 ">
                    @foreach ($atributos as $item)
                      <div href="#"
                        class="w-[300px] !important block px-3 py-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-1 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                          {{ $item->titulo }}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400 mb-2">
                          {{ $item->descripcion }}</p>
                        <div class="flex flex-wrap gap-2">
                          @foreach ($valorAtributo as $value)
                            @if ($value->attribute_id == $item->id)
                              <div class="flex items-center">
                                <input type="{{ $item->is_multiple ? 'checkbox' : 'radio' }}"
                                  id="attribute-{{ $item->id }}-{{ $value->id }}"
                                  name="attributes[{{ $item->id }}]{{ $item->is_multiple ? '[]' : '' }}"
                                  value="{{ $value->id }}"
                                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 {{ $item->is_multiple ? 'rounded-sm' : 'rounded-full' }} focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="attribute-{{ $item->id }}-{{ $value->id }}"
                                  class="ml-2">{{ $value->valor }}</label>
                              </div>
                            @endif
                          @endforeach
                        </div>
                        @if ($item->imagen)
                          <img src="{{ asset($item->imagen) }}" class="rounded-lg mb-2 w-1/2" alt="Imagen actual">
                        @endif

                      </div>
                    @endforeach
                  </div>
                </div>

              </div>
              <div
                class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 border mb-2">
                <h4 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">
                  Inventario</h4>
                <div class="md:col-span-5 flex justify-between gap-4">

                  <div class="w-full">
                    <label for="stock">Existencias

                    </label>

                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                      </div>
                      <input type="number" id="stock" name="stock" value="{{ $product->stock }}"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Product">


                    </div>
                  </div>
                  <div class="w-full">
                    <label for="peso">Peso

                    </label>

                    <div class="relative mb-2  mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                      </div>
                      <input type="string" id="peso" name="peso" value="{{ $product->peso }}"
                        step="0.1"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Peso">


                    </div>
                  </div>


                </div>
              </div>

              <div class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 border">
                <h4 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">
                  Tags</h4>
                <div class="md:col-span-5 flex justify-between gap-4">
                  <ul class="flex flex-wrap w-full gap-2">
                    @foreach ($tags as $tag)
                      <li>
                        <input type="checkbox" id="tag-{{ $tag->id }}" name="tags_id[]"
                          value="{{ $tag->id }}" class="hidden peer"
                          @if (in_array($tag->id, $product->tags->pluck('id')->toArray())) checked @endif>
                        <label for="tag-{{ $tag->id }}"
                          class="inline-flex items-center justify-between w-full px-2 py-1 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-white hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                          <div class="block">
                            {{ $tag->name }}
                          </div>
                        </label>
                      </li>
                    @endforeach

                  </ul>
                  {{-- <div>
                    <div class="relative mb-2  mt-2">
                      <select id="tags_id" name="tags_id[]" multiple class="mt-1 w-full">
                        <option value="">Seleccionar Tag </option>
                        @foreach ($tags as $tag)
                          <option value="{{ $tag->id }}" @if (in_array($tag->id, $product->tags->pluck('id')->toArray())) selected @endif>
                            {{ $tag->name }}</option>
                        @endforeach
                      </select>
                    </div>


                  </div> --}}
                </div>
              </div>
              <div class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 border">
                <h4 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">
                  Docentes</h4>
                <div class="md:col-span-5 flex justify-between gap-4">
                  <ul class="flex flex-wrap w-full gap-2">
                    @foreach ($docentes as $item)
                      <li>
                        <input type="checkbox" id="docentes-{{ $item->id }}" name="docentes[]"
                          value="{{ $item->id }}" class="hidden peer"
                          @if (in_array($item->id, $product->docentes->pluck('id')->toArray())) checked @endif>
                        <label for="docentes-{{ $item->id }}"
                          class="inline-flex items-center justify-between w-full px-2 py-1 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 peer-checked:bg-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-white hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                          <div class="block">
                            {{ $item->nombre }}
                          </div>
                        </label>
                      </li>
                    @endforeach

                  </ul>

                </div>
              </div>
              <div class="md:col-span-5 flex justify-between gap-4">

                <div class="w-full">
                  <label for="descuento"> Brochre del curso </label>
                  <div class="relative mb-2 mt-2">

                    <input type="file" id="brochure_url" name="brochure_url"
                      class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="descuento">
                  </div>
                </div>


                @if (isset($product->brochure_url))
                  <a href="{{ asset('storage/' . $product->brochure_url) }}" target="_blank">Ver Brochure</a>
                @endif

              </div>

            </div>

          </div>

          <div class="md:col-span-5 text-right mt-6 flex justify-between px-4 pb-4">
            <div class="inline-flex items-end">
              <a href="{{ route('products.index') }}"
                class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Volver</a>
            </div>
            <div class="inline-flex items-end">
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Guardar Curso
              </button>
            </div>
          </div>

        </div>



      </div>

    </form>


  </div>
  {{-- <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable/build/umd/index.min.js"></script>
  <script>
    const sortable = new Draggable.Sortable(document.getElementById('imagenes_sortable'), {
      draggable: '[id^="galery_container"]',
    });
  </script> --}}

  <script>
    $(document).ready(function() {
      $('#dropdownMenuButton').on('click', function() {
        $(this).next('.dropdown-menu').toggleClass('hidden');
      });

      $('.dropdown-item').on('click', function(e) {
        e.preventDefault();
        var iconId = $(this).data('icon-id');
        var iconName = $(this).text().trim();
        $('#selectedIconId').val(iconId);
        $('#dropdownMenuButton').text(iconName);

        $(this).closest('.dropdown-menu').addClass('hidden');
      });

      $(document).on('click', function(e) {
        if (!$(e.target).closest('.relative').length) {
          $('.dropdown-menu').addClass('hidden');
        }
      });
    });
  </script>
  <script>
    $('#tags_id').select2({
      placeholder: 'Seleccionar Tag...',
    });
    // Obtener los enlaces de pestaña
    const generalTab = document.getElementById('general-tab');
    const attributesTab = document.getElementById('attributes-tab');

    // Obtener los contenedores de contenido
    const generalContent = document.getElementById('general');
    const attributesContent = document.getElementById('Attributes');

    // Agregar event listeners para los enlaces de pestaña
    generalTab.addEventListener('click', function(event) {
      generalTab.classList.add('active', 'dark:bg-slate-900')
      attributesTab.classList.remove('active', 'dark:bg-slate-900')
      // Ocultar el contenido de Attributes
      attributesContent.classList.add('hidden');
      // Mostrar el contenido de General
      generalContent.classList.remove('hidden');
    });

    attributesTab.addEventListener('click', function(event) {
      generalTab.classList.remove('active', 'dark:bg-slate-900')
      attributesTab.classList.add('active', 'dark:bg-slate-900')
      // Ocultar el contenido de General
      generalContent.classList.add('hidden');
      // Mostrar el contenido de Attributes
      attributesContent.classList.remove('hidden');
    });
  </script>

  <script>
    $(document).ready(function() {
      let specificationIndex = 1;

      $('#AddEspecifiacion').on('click', function() {
        const newSpecification = `
                <div class="flex gap-2 specification-item">
                    <div class="relative mb-2 mt-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                        </div>
                        <input type="text" name="incluye[${specificationIndex}][titulo]" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Titulo">
                    </div>
                    <div class="relative mb-2 mt-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                        </div>
                        <div class="relative">
                            <button class="btn btn-secondary dropdown-toggle bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="button">
                                Selecciona un Icono
                            </button>
                            <div class="dropdown-menu absolute hidden bg-white shadow-lg rounded-lg mt-1 w-full z-10">
                                @foreach ($icons as $icon)
                                    <a class="dropdown-item flex items-center p-2 hover:bg-gray-100 cursor-pointer" href="#" data-icon-id="{{ $icon->id }}" data-icon-path="{{ asset($icon->path) }}">
                                        <img src="{{ asset($icon->path) }}" alt="{{ $icon->name }}" width="30" class="mr-2">
                                        {{ $icon->name }}
                                    </a>
                                @endforeach
                            </div>
                            <input type="hidden" name="incluye[${specificationIndex}][icon]" class="selected-icon-id">
                        </div>
                        
                    </div>
                </div>
            `;
        $('#specifications-container').append(newSpecification);
        specificationIndex++;
      });

      $(document).on('click', '.dropdown-toggle', function() {
        $(this).next('.dropdown-menu').toggleClass('hidden');
      });

      $(document).on('click', '.dropdown-item', function(e) {
        e.preventDefault();
        var iconId = $(this).data('icon-id');
        var iconName = $(this).text().trim();
        var iconPath = $(this).data('icon-path');
        console.log(iconId, iconName, iconPath)
        $(this).closest('.relative').find('.dropdown-toggle').text(iconName);
        $(this).closest('.relative').find('.selected-icon-id').val(iconPath);
        $(this).closest('.dropdown-menu').addClass('hidden');
      });

      $(document).on('click', function(e) {
        if (!$(e.target).closest('.relative').length) {
          $('.dropdown-menu').addClass('hidden');
        }
      });
    });
  </script>

  <script>
    let valorInput = $('[id="specifications"]').length / 2

    function capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }

    function agregarElementos(elemento, valorInput, name) {
      elemento.setAttribute("type", "text");
      elemento.setAttribute("name", `${name}-${valorInput}`);
      elemento.setAttribute("placeholder", `${name == 'tittle'? 'Titulo': 'Especificacion'}`);
      elemento.setAttribute("id", `specifications`);

      elemento.classList.add("mt-1", "bg-gray-50", "border", "border-gray-300", "text-gray-900", "text-sm",
        "rounded-lg",
        "focus:ring-blue-500", "focus:border-blue-500", "block", "w-full", "pl-10", "p-2.5",
        "dark:bg-gray-700",
        "dark:border-gray-600", "dark:placeholder-gray-400", "dark:text-white",
        "dark:focus:ring-blue-500",
        "dark:focus:border-blue-500");

      return elemento
    }
    $("#AddTEmario").on('click', function(e) {
      e.preventDefault();
      valorInput++;

      const addButton = document.getElementById("AddTEmario");
      const parentContainer = addButton.parentElement.parentElement;

      const divFlex = document.createElement("div");
      divFlex.classList.add('flex', 'gap-2');

      const descInput = createInput('temario[' + valorInput + '][desc]', 'Descripción', 'text');
      const recursoInput = createInput('temario[' + valorInput + '][recurso]', 'Recurso', 'number');
      const tiempoInput = createInput('temario[' + valorInput + '][tiempo]', 'Tiempo', 'number');

      divFlex.appendChild(descInput);
      divFlex.appendChild(recursoInput);
      divFlex.appendChild(tiempoInput);

      const fragment = document.createDocumentFragment();
      fragment.appendChild(divFlex);

      parentContainer.insertBefore(fragment, addButton.parentElement.nextSibling);
    });

    function createInput(name, placeholder, type) {
      const divRelative = document.createElement("div");
      divRelative.classList.add('relative', 'mb-2', 'mt-2');

      const input = document.createElement("input");
      input.setAttribute("type", type);
      input.setAttribute("name", name);
      input.setAttribute("placeholder", placeholder);
      input.classList.add("mt-1", "bg-gray-50", "border", "border-gray-300", "text-gray-900", "text-sm", "rounded-lg",
        "focus:ring-blue-500", "focus:border-blue-500", "block", "w-full", "p-2.5", "dark:bg-gray-700",
        "dark:border-gray-600",
        "dark:placeholder-gray-400", "dark:text-white", "dark:focus:ring-blue-500", "dark:focus:border-blue-500");

      divRelative.appendChild(input);
      return divRelative;
    }

    function AgregarBEneficios(elemento, valorInput, name) {
      elemento.setAttribute("type", "text");
      elemento.setAttribute("name", `${name}[]`);
      elemento.setAttribute("placeholder", `${name == 'tittle'? 'Titulo': 'Especificacion'}`);
      elemento.setAttribute("id", `beneficios`);

      elemento.classList.add("mt-1", "bg-gray-50", "border", "border-gray-300", "text-gray-900", "text-sm",
        "rounded-lg",
        "focus:ring-blue-500", "focus:border-blue-500", "block", "w-full", "pl-10", "p-2.5",
        "dark:bg-gray-700",
        "dark:border-gray-600", "dark:placeholder-gray-400", "dark:text-white",
        "dark:focus:ring-blue-500",
        "dark:focus:border-blue-500");

      return elemento
    }

    function cursoDirigido(elemento, valorInput, name) {
      elemento.setAttribute("type", "text");
      elemento.setAttribute("name", `${name}[]`);
      elemento.setAttribute("placeholder", `Curso Dirigido`);
      elemento.setAttribute("id", `cursoDirigido`);

      elemento.classList.add("mt-1", "bg-gray-50", "border", "border-gray-300", "text-gray-900", "text-sm",
        "rounded-lg",
        "focus:ring-blue-500", "focus:border-blue-500", "block", "w-full", "pl-10", "p-2.5",
        "dark:bg-gray-700",
        "dark:border-gray-600", "dark:placeholder-gray-400", "dark:text-white",
        "dark:focus:ring-blue-500",
        "dark:focus:border-blue-500");

      return elemento
    }
    $('document').ready(function() {
      let valorInput = $('[id="specifications"]').length / 2


      $("#AddparaquienCurso").on('click', function(e) {
        e.preventDefault();
        valorInput++;

        const addButton = document.getElementById("AddparaquienCurso");
        const parentContainer = addButton.parentElement.parentElement;

        const divFlex = document.createElement("div");
        divFlex.classList.add('flex', 'gap-2');

        const dRelative = document.createElement("div");
        dRelative.classList.add('relative', 'mb-2', 'mt-2');

        const icon = document.createElement("div");
        icon.classList.add('absolute', 'inset-y-0', 'left-0', 'flex', 'items-center', 'pl-3',
          'pointer-events-none');
        icon.innerHTML = '<i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>';

        const inputTittle = document.createElement("input");
        let inputT = cursoDirigido(inputTittle, valorInput, 'curso_dirigido');

        dRelative.appendChild(icon);
        dRelative.appendChild(inputT);
        divFlex.appendChild(dRelative);

        const fragment = document.createDocumentFragment();
        fragment.appendChild(divFlex);

        parentContainer.insertBefore(fragment, addButton.parentElement.nextSibling);
      });
      $("#AddBeneficios").on('click', function(e) {
        e.preventDefault();
        valorInput++;

        const addButton = document.getElementById("AddBeneficios");
        const parentContainer = addButton.parentElement.parentElement;

        const divFlex = document.createElement("div");
        divFlex.classList.add('flex', 'gap-2');

        const dRelative = document.createElement("div");
        dRelative.classList.add('relative', 'mb-2', 'mt-2');

        const icon = document.createElement("div");
        icon.classList.add('absolute', 'inset-y-0', 'left-0', 'flex', 'items-center', 'pl-3',
          'pointer-events-none');
        icon.innerHTML = '<i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>';

        const inputTittle = document.createElement("input");
        let inputT = AgregarBEneficios(inputTittle, valorInput, 'beneficio');

        dRelative.appendChild(icon);
        dRelative.appendChild(inputT);
        divFlex.appendChild(dRelative);

        const fragment = document.createDocumentFragment();
        fragment.appendChild(divFlex);

        parentContainer.insertBefore(fragment, addButton.parentElement.nextSibling);
      });

      /*  $("#AddEspecifiacion").on('click', function(e) {
                                                                       e.preventDefault()
                                                                       valorInput++

                                                                       const addButton = document.getElementById("AddEspecifiacion");
                                                                       const divFlex = document.createElement("div");
                                                                       const dRelative = document.createElement("div");
                                                                       const dRelative2 = document.createElement("div");

                                                                       divFlex.classList.add('flex', 'gap-2')
                                                                       dRelative.classList.add('relative', 'mb-2', 'mt-2')
                                                                       dRelative2.classList.add('relative', 'mb-2', 'mt-2')

                                                                       const iconContainer = document.createElement("div");
                                                                       const icon = `<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
       <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
     </div>`
                                                                       iconContainer.innerHTML = icon;

                                                                       // Obtener el nodo del icono
                                                                       const iconNode = iconContainer.firstChild;



                                                                       const inputTittle = document.createElement("input");
                                                                       const inputValue = document.createElement("input");

                                                                       let inputT = agregarElementos(inputTittle, valorInput, 'tittle')
                                                                       let inputV = agregarElementos(inputValue, valorInput, 'specifications')


                                                                       dRelative.appendChild(inputT);
                                                                       dRelative2.appendChild(inputV);


                                                                       // Agregar el icono como primer hijo de dRelative
                                                                       dRelative.insertBefore(iconNode, inputT);

                                                                       // Clonar el nodo del icono para agregarlo como primer hijo de dRelative2
                                                                       const iconNodeCloned = iconNode.cloneNode(true);
                                                                       dRelative2.insertBefore(iconNodeCloned, inputV);


                                                                       divFlex.appendChild(dRelative);
                                                                       divFlex.appendChild(dRelative2);

                                                                       const parentContainer = addButton.parentElement
                                                                         .parentElement; // Obtener el contenedor padre
                                                                       parentContainer.insertBefore(divFlex, addButton.parentElement
                                                                         .nextSibling); // Insertar el input antes del siguiente elemento después del botón
                                                                     }) */


      // Note that the name "myFormDropzone" is the camelized
      // id of the form.
      /* Dropzone.options.myFormDropzone = {
              // Configuration options go here
            };
       */


      // Dropzone.options.myFormDropzone = {
      //   autoProcessQueue: false,
      //   uploadMultiple: true,
      //   maxFilezise: 10,
      //   maxFiles: 4,
      // }
    })
  </script>
  <script>
    const pickr = Pickr.create({
      el: '#colorPicker', // Selector CSS del input
      theme: 'classic', // Tema de Pickr
      default: '#000000', // Color por defecto
      swatches: [ // Colores de muestra
        '#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#00FFFF', '#FF00FF'
      ],
      components: {
        preview: true, // Mostrar vista previa
        opacity: true, // Habilitar control de opacidad
        hue: true, // Habilitar control de matiz
        interaction: {
          input: true, // Permitir entrada manual
          hex: true,
          save: true // Permitir guardar
        }
      }
    });
    pickr.on('save', (color, instance) => {

      document.getElementById('color').value = color.toHEXA().toString();

    })
  </script>
  <script>
    function toggleMenu() {
      console.log('cambiando toggle')
      var menuItems = document.getElementById('menu-items');
      var isExpanded = menuItems.classList.contains('hidden');
      menuItems.classList.toggle('hidden', !isExpanded);
      document.getElementById('menu-button').setAttribute('aria-expanded', !isExpanded);
    }

    const saveImage = async file => {
      const params = new FormData()
      params.append('image', file)
      params.append('_token', $('[name="_token"]').val())

      const data = await fetch('/admin/galery', {
          method: 'POST',
          headers: {
            'XSRF-TOKEN': Cookies.get('XSRF-TOKEN')
          },
          body: params
        })
        .then(res => res.json())

      return data
    }

    $('[data-id="input_img"]').on('change', function() {
      const file = this.files[0]
      const url = URL.createObjectURL(file)

      $(`#${this.id}_previewer`).attr('src', url)
    })

    $(document).on('change', '[id^="galery_"]', function() {
      const input = $(this)
      const label = input.parent()
      const input2send = label.find('[name="galery[]"]')
      const image_container = label.find('img')
      const file = input.get(0).files[0] ?? null
      const url = URL.createObjectURL(file)

      const params = new FormData()
      params.append('image', file)
      params

      saveImage(file).then((x) => {
        const data = x.data
        input2send.val(`0|${data.name}`)
      })

      image_container.attr('src', url)
    })

    $('#galery').on('change', (e) => {
      const files = e.target.files;
      Array.from(files).forEach(async file => {
        const {
          data,
          message,
          status
        } = await saveImage(file)
        const uuid = crypto.randomUUID()
        const pos = $('#imagenes_sortable').length
        $('#imagenes_sortable').append(`<div id="galery_container_${uuid}" class="relative group block w-[120px] h-[160px] rounded-md border">
          <div class="absolute top-0 left-0 bottom-0 right-0 rounded-md hover:bg-[#00000075] transition-all flex flex-col items-center justify-center gap-1">
            <label for="galery_${uuid}" title="Cambiar Imagen" tippy
              class="text-xl text-white hidden group-hover:block cursor-pointer fa-solid fa-camera-rotate z-10"></label>
            <i id="btn_delete_galery" data-id="${uuid}" title="Eliminar Imagen" tippy
              class="text-xl text-white hidden group-hover:block cursor-pointer fa-regular fa-trash-can z-10"></i>
          </div>

          <input class="hidden" name="galery[]"
            value="${0}|${data.name}|${pos}">
          <input class="hidden" type="file" id="galery_${uuid}" accept="image/*">
          <img class="w-full h-full rounded-md object-cover"
            src="/${data.name}">
        </div>`)

        tippy('#product-form [tippy]', {
          arrow: true
        })
      })
      e.target.value = null
    })

    tippy('#product-form [tippy]', {
      arrow: true
    })

    $(document).on('click', '#btn_delete_galery', function() {
      $(this).parents('[id^="galery_container_"]').remove()
    })

    $('#categoria_id').on('change', function() {
      console.log(this.value)
      const value = this.value
      $('#subcategory_id option[data-category]').prop('hidden', true)
      $(`#subcategory_id option[data-category="${value}"]`).prop('hidden', false)
    })
  </script>
</x-app-layout>
