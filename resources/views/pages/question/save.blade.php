<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <form action="{{ route('question.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $question->id }}">
      <div
        class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        
        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
          <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">
            @if (!$question->id)
              Nueva pregunta
            @else
              Actualizar pregunta - {{ $question->question }}
            @endif
          </h2>
        </header>

        <div class="p-3">
          <div class="rounded shadow-lg p-4 px-4">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
              
              <div class="md:col-span-5">
                <label for="major">Especialidad</label>
                <div class="relative mb-2  mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-folder"></i>
                  </div>
                  <select name="major_id"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option value="">Seleccionar Categoria</option>
                    @foreach ($major as $item)
                      <option value="{{ $item->id }}"
                        {{ $item->id == $question?->major_id ? 'selected' : '' }}
                        {{ !$item->status ? 'disabled' : '' }}>{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="md:col-span-5">
                <label for="question">Pregunta</label>
                <div class="relative mb-2  mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                  </div>
                  <input type="text" id="question" name="question" value="{{ $question->question }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escribe la pregunta">
                </div>
                @error('question')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="md:col-span-5">
                <label for="description">Descripción</label>
                <div class="relative mb-2 mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-start pl-3 pointer-events-none top-3">
                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                  </div>
                  <textarea type="text" rows="2" id="description" name="description" value=""
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Descripción">{{ $question->description }}</textarea>
                </div>
              </div>

              <div class="md:col-span-5">
                <label for="imagen">Subir una Foto</label>
                <div class="relative mb-2  mt-2 flex flex-wrap items-center gap-2">
                  <img class="block w-40 h-40 mb-2 object-contain" src="{{$question->imagen ? asset($question->imagen) : asset('images/img/noimagen.jpg')}}" alt="">
                  <input name="imagen"
                    class="p-2.5 block w-max text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
              </div>


              <div class="md:col-span-5 text-right mt-6 flex justify-between">
                <div class="inline-flex items-end">
                  <a href="{{ route('question.index') }}"
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
