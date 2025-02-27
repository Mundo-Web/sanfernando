<div class="dmeo">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">

            <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">
                    Preguntas
                </h2>
                <button wire:click="create" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-sm mt-3">Nueva pregunta</button>
            </header>

            <div class="p-3">
                <div class="rounded shadow-lg p-4 px-4 tabpanel-container" >
                    
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        
                        <div role="tablist" class="flex border-b">
                            @foreach ($majors as $major)
                                <button
                                    id="tab{{ $major->id }}"
                                    role="tab"
                                    aria-selected="{{ $selectedMajorId == $major->id ? 'true' : 'false' }}"
                                    aria-controls="panel{{ $major->id }}"
                                    wire:click="selectMajor({{ $major->id }})"
                                    class="px-4 py-2 focus:outline-none border-b-2 {{ $selectedMajorId == $major->id ? 'border-blue-500' : 'border-transparent' }}">
                                    {{ $major->name }}
                                </button>
                            @endforeach
                        </div>

                        

                            <table id="questionsTable" class="table table-bordered md:col-span-5" wire:init="filterQuestions">
                                <thead>
                                    <tr>
                                        <th>Pregunta</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->questions as $item)
                                        <tr>
                                            <td>{{ $item->question }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <button wire:click="edit('{{ $item->id }}')" class="btn btn-primary">Editar</button>
                                                <button wire:click="delete('{{ $item->id }}')" class="btn btn-danger">Eliminar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                    </div>
                    
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
                            <form class="flex flex-col gap-2 py-3">
                                
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
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                                          </div>
                                        <input type="text" wire:model="question" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="question">
                                    </div>
                                    @error('question') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-1">
                                    <label for="description">Descripción (Opcional)</label>
                                    <div class="relative mb-2  mt-1">
                                        <div class="absolute top-2 left-0 flex items-center pl-3 pointer-events-none">
                                            <i class="text-lg text-gray-500 dark:text-gray-400 fas fa-pen"></i>
                                        </div>
                                        <textarea wire:model="description" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="description"></textarea>
                                    </div>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
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
    
        /* .modal-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
        }
    
        .modal-content {
            padding: 20px;
        }
    
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
    
        .modal-title {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
        }
    
        .close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #6b7280;
        }
    
        .close:hover {
            color: #000;
        }
    
        .modal-body {
            margin-bottom: 20px;
        }
    
        .form-group {
            margin-bottom: 15px;
        }
    
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
    
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            font-size: 1rem;
        }
    
        .form-group textarea {
            resize: vertical;
        }
    
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
        }
    
        .modal-footer button {
            margin-left: 10px;
        } */
    </style>
</div>



