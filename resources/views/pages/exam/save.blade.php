<style>
  .select2-container{
    width: 100%!important;
  }
  .select2-selection{
    height: auto!important;
    padding: 6px 10px!important;
  }
</style>
<x-app-layout>

  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <form action="{{ route('exam.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $exam->id }}">  
      <div
        class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
          <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">
            @if (!$exam->id)
              Nuevo simulacro
            @else
              Actualizar simulacro - {{ $exam->title }}
            @endif
          </h2>
        </header>

        <div class="p-3">
          <div class="rounded shadow-lg p-4 px-4 ">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
              
              <div class="md:col-span-5">
                <label for="title">Titulo de Simulacro <span class="text-red-600">*</span></label>
                <div class="relative mb-2  mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                  </div>
                  <input type="text" id="title" name="title" value="{{ $exam->title }}"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escribe el titulo">
                </div>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="md:col-span-5">
                <label for="description">Aprueba con x puntos <span class="text-red-600">*</span></label>
                <div class="relative mb-2 mt-2">
                  <div class="absolute inset-y-0 left-0 flex items-start pl-3 pointer-events-none top-3">
                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                  </div>
                  <input type="text" rows="2" id="description" name="description" 
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ingrese cantidad de puntos con los que se aprobara el simulacro" value="{{ $exam->description }}">
                </div>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="md:col-span-5">
                <div id="questions-container">
                  @foreach ($exam->questions as $index => $question)
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-1 md:gap-4 mt-4 question-group">
                          
                            <!-- Especialidad -->
                            <div class="md:col-span-4">
                                <label for="especialidad_{{ $index }}">Especialidad</label>
                                <div class="relative mb-2 mt-2">
                                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-folder"></i>
                                  </div>
                                  <select name="questions[{{ $index }}][especialidad_id]" id="especialidad_{{ $index }}" 
                                      class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                                      focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 
                                      dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                      onchange="loadPreguntas('#pregunta_{{ $index }}', this.value)">
                                      <option value="">Seleccione una especialidad</option>
                                      @foreach ($especialidades as $especialidad)
                                          <option value="{{ $especialidad->id }}" {{ $question->majors->id  == $especialidad->id ? 'selected' : '' }}>
                                              {{ $especialidad->name }}
                                          </option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            {{$preguntas}}
                            <!-- Pregunta -->
                            <div class="md:col-span-5">
                                <label for="pregunta_{{ $index }}">Pregunta</label>
                                <div class="relative mb-2 mt-2">
                                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                      <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-question-circle"></i>
                                  </div>
                                  <select name="questions[{{ $index }}][pregunta_id]" id="pregunta_{{ $index }}" 
                                      class="select2 mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                                      focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 
                                      dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                      <option value="">Seleccione una pregunta</option>
                                      @foreach ($preguntas->where('major_id', $question->majors?->id) as $q)
                                          <option value="{{ $q->id }}" {{ $question->id == $q->id ? 'selected' : '' }}>
                                              {{ $q->question }}
                                          </option>
                                         
                                      @endforeach
                                  </select>
                                </div>
                            </div>
                
                            <!-- Puntaje -->
                            <div class="md:col-span-2">
                                <label for="puntaje_{{ $index }}">Puntaje</label>
                                <div class="relative mb-2 mt-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-calculator"></i>
                                    </div>
                                    <input type="number" name="questions[{{ $index }}][puntaje]" id="puntaje_{{ $index }}"
                                      value="{{ $question->pivot->score }}" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                                      focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 
                                      dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>


                            <div class="md:col-span-1 flex flex-row justify-end items-end">
                              <button type="button" class="remove-question text-red-500 hover:text-red-700 pb-2 pr-1">
                                  <i class="fas fa-trash-alt text-xl"></i>
                              </button>
                            </div>

                        </div>
                  @endforeach
                </div>
              </div>

              <div class="md:col-span-5">
                <button type="button" id="add-question"
                    class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Añadir Pregunta
                </button>
              </div>

             

              <div class="md:col-span-5 text-right mt-6 flex justify-between">
                <div class="inline-flex items-end">
                  <a href="{{ route('exam.index') }}"
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


<script>
  $(document).ready(function () {
      $('.select2').select2({
            placeholder: "Seleccione una opción",
            allowClear: true
        });
    });
      $(document).ready(function () {
        let questionIndex = $(".question-group").length;

      $("#add-question").click(function () {
          questionIndex++;

          let questionHtml = `
          <div class="grid grid-cols-1 md:grid-cols-12 gap-1 md:gap-4 mt-4 question-group">
              
              <!-- Especialidad -->
              <div class="md:col-span-4">
                  <label for="especialidad_${questionIndex}">Especialidad</label>
                  <div class="relative mb-2 mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-folder"></i>
                      </div>
                      <select name="questions[${questionIndex}][especialidad_id]" id="especialidad_${questionIndex}" 
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                          focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 
                          dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          onchange="loadPreguntas('#pregunta_${questionIndex}', this.value)">
                          <option value="">Seleccione una especialidad</option>
                      </select>
                  </div>
              </div>
              

              <!-- Pregunta -->
              <div class="md:col-span-5">
                  <label for="pregunta_${questionIndex}">Pregunta</label>
                  <div class="relative mb-2 mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-question-circle"></i>
                      </div>
                      <select name="questions[${questionIndex}][pregunta_id]" id="pregunta_${questionIndex}" 
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                          focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 
                          dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option value="">Seleccione una pregunta</option>
                      </select>
                  </div>
              </div>

              <!-- Puntaje -->
              <div class="md:col-span-2">
                  <label for="puntaje_${questionIndex}">Puntaje</label>
                  <div class="relative mb-2 mt-2">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                          <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-calculator"></i>
                      </div>
                      <input type="number" name="questions[${questionIndex}][puntaje]" id="puntaje_${questionIndex}" 
                          class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                          focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 
                          dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Ingrese puntaje" min="0" step="0.1">
                  </div>
              </div>

              <!-- Botón para eliminar -->
              <div class="md:col-span-1 flex flex-row justify-end items-end">
                <button type="button" class="remove-question text-red-500 hover:text-red-700 pb-2 pr-1">
                    <i class="fas fa-trash-alt text-xl"></i>
                </button>
              </div>
          </div>`;

          $("#questions-container").append(questionHtml);

          // Cargar especialidades dinámicamente
          loadEspecialidades(`#especialidad_${questionIndex}`);

          // Activar Select2 en el nuevo campo de pregunta
          $(`#pregunta_${questionIndex}`).select2();

          
      });

      // Eliminar un grupo de preguntas
      $(document).on("click", ".remove-question", function () {
          $(this).closest(".question-group").remove();
      });


      function loadEspecialidades(selector) {
        $.ajax({
            url: "{{ route('obtenerEspecialidades') }}",
            type: "GET",
            success: function (response) {
                let options = '<option value="">Seleccione una especialidad</option>';
                response.especialidades.forEach(function (especialidad) {
                    options += `<option value="${especialidad.id}">${especialidad.name}</option>`;
                });
                $(selector).html(options);
            },
            error: function (xhr) {
                console.error("Error al obtener especialidades", xhr);
            }
        });
      }

      function loadPreguntas(selector, especialidadId) {
        
        if (!especialidadId) {
          $(selector).html('<option value="">Seleccione una pregunta</option>');
          return;
        }
        
        $.ajax({
            url: `/admin/preguntas/${especialidadId}`, // Ruta que devuelve preguntas filtradas por especialidad
            type: "GET",
            success: function (response) {
                let options = '<option value="">Seleccione una pregunta</option>';
                response.preguntas.forEach(function (pregunta) {
                    options += `<option value="${pregunta.id}">${pregunta.question}</option>`;
                });
                $(selector).html(options);
            },
            error: function (xhr) {
                console.error("Error al obtener preguntas", xhr);
            }
        });
      }

      $(document).on("change", "[id^=especialidad_]", function () {
          let especialidadId = $(this).val();
          let questionSelector = $(this).closest(".question-group").find("[id^=pregunta_]");

          if (especialidadId) {
              loadPreguntas(questionSelector, especialidadId);
          } else {
              questionSelector.html('<option value="">Seleccione una pregunta</option>');
          }
      });


  });
</script>