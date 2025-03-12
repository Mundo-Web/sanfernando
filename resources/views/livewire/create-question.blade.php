<div class="dmeo">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">

            <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">
                    Preguntas
                </h2>
                <button wire:click="create" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-sm mt-3">Nueva pregunta</button>
                <button id="file-excel-button"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-sm">
                    <i class="fas fa-cloud-upload-alt me-1"></i>
                    Cargar preguntas
                </button>
            </header>

            <div class="p-3">
                <div class="rounded shadow-lg p-4 px-4 tabpanel-container" >
                    
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        
                        <div role="tablist" class="flex border-b overflow-x-auto w-full md:col-span-5">
                            @foreach ($majors as $major)
                                <a
                                    id="tab{{ $major->id }}"
                                    role="tab"
                                    aria-selected="{{ $selectedMajorId == $major->id ? 'true' : 'false' }}"
                                    aria-controls="panel{{ $major->id }}"
                                    wire:click="selectMajor({{ $major->id }})"
                                    class="px-4 py-2 w-[150px] focus:outline-none border-b-2 {{ $selectedMajorId == $major->id ? 'border-blue-500' : 'border-transparent' }}">
                                    {{ $major->name }}
                                </a>
                            @endforeach
                        </div>

                        
                            
                            <table id="questionsTable" class="table table-bordered md:col-span-5" wire:init="filterQuestions">
                                <thead>
                                    <tr>
                                        <th class="min-w-[200px]">Pregunta</th>
                                        <th class="min-w-[150px]">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->questions as $item)
                                        <tr>
                                            <td>{{ $item->question }}</td>
                                            <td>
                                                <button wire:click="edit('{{ $item->id }}')" class="btn btn-primary">Editar</button>
                                                <button wire:click="delete('{{ $item->id }}')" class="btn btn-danger">Eliminar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                    </div>

                    <livewire:question-table />
                    
                </div>
            </div>


        </div>
    </div>

    <!-- Modal -->
    @if ($isOpen)
        <div class="modal-overlay" class="w-full h-full">
            <div class="modal"  style="display: block;" class="top-1/2 left-1/2 -translate-x-1/2 flex">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="flex flex-row justify-between">
                            <h5 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">{{ $questionId ? 'Editar Pregunta' : 'Crear Pregunta' }}</h5>
                            <button wire:click="closeModal" class="close text-2xl font-bold text-slate-800"><i class="fa-regular fa-circle-xmark"></i></button>
                        </div>
                        <div class="modal-body">
                            <form class="flex flex-col gap-2 py-3" enctype="multipart/form-data">
                                
                                <div class="col-span-1">
                                    <label for="major_id" class="font-normal text-slate-600 dark:text-slate-100 text-lg tracking-tight">Especialidad</label>
                                    <div class="relative mb-2  mt-1">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <i class="text-lg text-gray-500 dark:text-gray-400 fa-regular fa-square-caret-down"></i>
                                        </div>
                                        <select type="text" wire:model="major_id" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="major_id">
                                            <option value="">Selecciona especialidad</option>
                                            @foreach ($majors as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-span-1">
                                    <label for="question">Pregunta</label>
                                    <div class="relative mb-2  mt-1">
                                        <div class="absolute top-2 left-0 flex items-center pl-3 pointer-events-none">
                                            <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                                          </div>
                                        <textarea type="text" wire:model="question" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="question"></textarea>
                                    </div>
                                    @error('question') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-1">
                                    <label for="question">Imagen</label>
                                    <div class="relative mb-4  mt-1">
                                        <input type="file" wire:model="imagen" class="" id="imagen">
                                    </div>
                                    @if($imagen)
                                        @if(is_string($imagen))
                                            <img class="w-28 h-20 object-contain" src="{{ asset($imagen) }}" alt="Imagen de la pregunta">
                                        @else
                                            <img class="w-28 h-20 object-contain" src="{{ $imagen->temporaryUrl() }}" alt="Imagen de la pregunta">
                                        @endif
                                    @endif
                                </div>

                                <div class="flex flex-row justify-start items-center">
                                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-sm mt-3" wire:click="addAnswer">Agregar Respuesta</button>
                                </div>
                                
                                <div class="flex flex-col gap-0">
                                    @foreach ($answers as $index => $answer)
                                        <div class="flex flex-row gap-2 items-center w-full">
                                            <div class="relative mb-2  mt-1 w-full">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                                                </div>
                                                <input type="text" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="answers.{{ $index }}.response" placeholder="Respuesta {{ $index + 1 }}">
                                            </div>

                                            <input class="w-5 h-5 rounded-md text-blue-500 ring-0 focus:ring-0" type="checkbox" wire:model="answers.{{ $index }}.is_correct"> Correcto
                                            
                                            <div class="flex flex-col">
                                                <button class="w-5 h-auto" type="button" wire:click="removeAnswer({{ $index }})"><i class="fa-regular fa-trash-can text-red-600 text-2xl"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                        <div class="md:col-span-5 text-right mt-6 flex justify-between">
                            <div class="inline-flex items-end">
                                <button wire:click="closeModal" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Cerrar</button>
                            </div>
                            <div class="inline-flex items-end">
                                <button wire:click="store" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <form id="file-excel-modal" class="modal !py-6">
        <p class="mb-2">
          <b>Carga un zip (Imagenes sueltas)</b>
        </p>
        <input
          class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
          aria-describedby="images_input_help" id="image_input" type="file" accept=".zip">
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300 mb-4" id="images_input_help">
          Los nombres deben ir en formato: <br>
          <code>
            <span class="mention">Código Interno</span>*.jpg
          </code>
        </p>
    
        <p class="mb-2">
          <b>Carga un archivo excel</b>
          (<a href="/storage/templates/Preguntas_model.xlsx" download="Preguntas" class="text-blue-500 underline">Descargar formato</a>)
        </p>
        <input
          class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
          aria-describedby="file_input_help" id="file_input" type="file" accept=".xlsx,.xls">
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300 mb-4" id="file_input_help">XLSX o XLS (Solo archivo Excel)
        </p>
    
        <div id="progress-container" class="mt-4 hidden">
          <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
            <div id="progress-bar" class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
          </div>
          <p id="progress-text" class="mt-2 text-sm text-gray-600 dark:text-gray-400">0%</p>
        </div>
    
        <button
          class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
          type="submit">
          Cargar
        </button>
    </form>


    <style>
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            overflow-y: scroll;
        }
    </style>

    <script>
        $(document).on('click', '#file-excel-button', () => {
            $('#file-excel-modal').modal('show');
        });

        $(document).on('submit', '#file-excel-modal', (e) => {
            e.preventDefault();

            const fileInput = $('#file_input')[0];
            const file = fileInput.files[0];

            const zipInput = $('#image_input')[0];
            const zip = zipInput.files[0];

            if (!file) {
            Swal.fire({
                icon: 'warning',
                title: 'Archivo requerido',
                text: 'Por favor, selecciona un archivo Excel.'
            });
            return;
            }

            const formData = new FormData();
            formData.append('file', file);
            if (zip) formData.append('zip', zip)

            formData.append('image_route_pattern', '{0}');

            $.ajax({
            url: "/api/upload/items",
            type: 'POST',
            headers: {
                'X-Xsrf-Token': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
            },
            data: formData,
            processData: false,
            contentType: false,
            timeout: 240000,
            xhr: function() {
                const xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    const percentComplete = evt.loaded / evt.total * 100;
                    $('#progress-container').removeClass('hidden');
                    $('#progress-bar').css('width', percentComplete + '%');
                    $('#progress-text').text(Math.round(percentComplete) + '%');
                }
                }, false);
                return xhr;
            },
            success: function(response) {
                Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Archivo cargado exitosamente.'
                });
                $('#file-excel-modal').modal('hide');
                // Aquí puedes agregar código adicional para manejar la respuesta del servidor
            },
            error: function(xhr, status, error) {
                Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error al cargar el archivo: ' + error
                });
            },
            complete: function() {
                $('#progress-container').addClass('hidden');
                $('#progress-bar').css('width', '0%');
                $('#progress-text').text('0%');
                $('#file_input').val('');
                $('#image_input').val('');
            }
            });
        });
    </script>

    <script src="/js/moment/min/moment.min.js"></script>

  
</div>



