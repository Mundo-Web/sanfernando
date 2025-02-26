<div>
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
    <div class="modal-overlay" class="" style="display: block;">
        <div class="modal"  style="display: block;" class="top-1/2 left-1/2 -translate-x-1/2 flex">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $questionId ? 'Editar Pregunta' : 'Crear Pregunta' }}</h5>
                        <button wire:click="closeModal" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="major_id">Name</label>
                                <select type="text" wire:model="major_id" class="form-control" id="major_id">
                                    <option value="">Select Major</option>
                                    @foreach ($majors as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="question">Name</label>
                                <input type="text" wire:model="question" class="form-control" id="question">
                                @error('question') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea wire:model="description" class="form-control" id="description"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            @foreach ($answers as $index => $answer)
                                <div>
                                    <input type="text" wire:model="answers.{{ $index }}.response" placeholder="Respuesta {{ $index + 1 }}">
                                    <input type="checkbox" wire:model="answers.{{ $index }}.is_correct"> Correcta
                                    <button type="button" wire:click="removeAnswer({{ $index }})">Eliminar</button>
                                </div>
                            @endforeach

                            <button type="button" wire:click="addAnswer">Agregar Respuesta</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="store" class="btn btn-primary">Guardar</button>
                        <button wire:click="closeModal" class="btn btn-secondary">Cerrar</button>
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
        }
    
        .modal-container {
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
        }
    </style>
</div>



