<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <form action="{{ route('politicas-de-devolucion.update', $terms->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div
        class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
          <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Editar Politicas
            de Cambio y Devolucion</h2>
        </header>

        <div class="p-3">
          <div class="rounded shadow-lg p-4 px-4 ">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">

              <div class="md:col-span-5">
                {{-- <label for="descripcion">Descripcion</label> --}}
                <div class="relative mb-2  mt-2">
                  {{-- <x-textarea id="description" name="content" :value="$terms->content" /> --}}
                  {{-- <x-form.quill id="content" name="content" :value="$terms->content" /> --}}
                   <textarea  id="description" name="content"
                                        class="ckeditor mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="content">{{ $terms->content }}</textarea>
                </div>
              </div>

              <div class="md:col-span-5 text-right mt-6 flex justify-between">
                <div class="inline-flex items-end">
                  <a href="{{ URL::previous() }}"
                    class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Volver</a>
                </div>
                <div class="inline-flex items-end">
                  <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Actualizar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>


</x-app-layout>


<script src="/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        toolbar: [
            { name: 'document', items: ['Source'] }, // Código fuente
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo'] },
            { name: 'styles', items: ['Styles', 'Format', 'FontSize'] }, // Tamaño y fuente
            { name: 'colors', items: ['TextColor', 'BGColor'] }, // Color de texto y fondo
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
            { name: 'insert', items: ['Table', 'HorizontalRule'] },
            { name: 'links', items: ['Link', 'Unlink'] },
            { name: 'tools', items: ['Maximize'] } // Maximizar
        ],
        extraPlugins: 'colorbutton,font', // Activa plugins para color y fuentes
        removePlugins: 'elementspath', // Elimina la ruta de elementos
        resize_enabled: true // Permite redimensionar el editor
    });
</script>
