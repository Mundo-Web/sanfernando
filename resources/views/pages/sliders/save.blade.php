<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <form action="{{ route('slider.save') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $slider->id }}">
      <div
        class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
          <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">
            @if (!$slider->id)
              Agregar Slider
            @else
              Actualizar slider: {{ $slider->title }}
            @endif
          </h2>
        </header>

        <div class="p-3">
          <div class="rounded shadow-lg p-4 px-4 ">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
              <div class="md:col-span-4">
                <label for="title">Titulo de slider</label>
                <div class="relative mb-2 ">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-pen"></i>
                  </div>
                  <input type="text" id="title" name="title" value="{{ $slider->title }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Título">
                </div>
              </div>

               <div class="md:col-span-1">
                <label for="title">Color de slider</label>
                <div class="relative mb-2 h-12 ">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-pen"></i>
                  </div>
                  <input type="color" id="color" name="color" value="{{ $slider->color }}" style="border-radius:25px"
                     class="h-full w-full pl-8 pr-3">
                </div>
              </div>

              <div class="md:col-span-5">
                <label for="description">Descripción de servicio</label>
                <div class="relative mb-2 mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-start top-3 pl-3 pointer-events-none ">
                    <i class="fa fa-pen"></i>
                  </div>
                  <textarea type="text" rows="2" id="description" name="description"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Descripción">{{ $slider->description }}</textarea>
                </div>
              </div>

              <div class="md:col-span-2">
                <label for="botontext1">Titulo boton 1</label>
                <div class="relative mb-2  mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-pen"></i>
                  </div>
                  <input type="text" id="botontext1" name="botontext1" value="{{ $slider->botontext1 }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Titulo boton 1">
                </div>
              </div>
              <div class="md:col-span-3">
                <label for="link1">Url boton 1</label>
                <div class="relative mb-2  mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-pen"></i>
                  </div>
                  <input type="text" id="link1" name="link1" value="{{ $slider->link1 }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Url para botón 1">
                </div>
              </div>


              <div class="md:col-span-2">
                <label for="botontext2">Titulo boton 2</label>
                <div class="relative mb-2  mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-pen"></i>
                  </div>
                  <input type="text" id="botontext2" name="botontext2" value="{{ $slider->botontext2 }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Titulo para botón 2">
                </div>
              </div>


              <div class="md:col-span-3">
                <label for="link2">Url boton 2</label>
                <div class="relative mb-2  mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa fa-pen"></i>
                  </div>
                  <input type="text" id="link2" name="link2" value="{{ $slider->link2 }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Url para botón 2">
                </div>
              </div>



              <div class="md:col-span-2">
                <label for="description">Imagen de servicio (1440x808 px)</label>
                <div class="relative mb-2 mt-2">
                  @if ($slider->name_image)
                    <img src="{{ asset($slider->url_image . '' . $slider->name_image) }}"
                      class="max-w-xs max-h-48 object-cover  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  @else
                    <img src="/images/img/noimagen.jpg"
                      class="max-w-xs max-h-48 object-cover  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  @endif
                </div>
              </div>



              <div class="md:col-span-3">
                <label for="imagen">Subir una foto</label>
                <div class="relative mb-2  mt-2">
                  <input name="imagen"
                    class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
              </div>



              <div class="md:col-span-5 text-right mt-6 flex justify-between">
                <div class="inline-flex items-end">
                  <a href="{{ URL::previous() }}"
                    class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Volver</a>
                </div>
                <div class="inline-flex items-end">
                  <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Guardar
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>




</x-app-layout>
