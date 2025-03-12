<?php

namespace App\Livewire;
use App\Models\QuestionExam;
use App\Models\Major;
use Livewire\WithFileUploads;
use Livewire\Component;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; 
use Illuminate\Support\Str;
use Livewire\WithPagination;

class CreateQuestion extends Component
{   
    use WithFileUploads, WithPagination;

    public $major_id;
    public $question;
    public $description;
    public $questionId;
    public $imagen;
    public $status = true;
    
    public $majors;
    // public $questions = [];
    public $isOpen = false;
    public $selectedMajorId;

    public $answers = [];
    public $correctAnswers = [];
    public $perPage = 5;
    public $search = '';
    
    public function render()
    {   
        $questions = $this->filterQuestions();
        // return view('livewire.create-question');
        return view('livewire.create-question', [
            'questions' => $questions, // Pasa las preguntas paginadas a la vista
        ]);
    }


    public function mount()
    {
        $this->majors = Major::where('status', 1)->get();
        // $this->selectedMajorId = $this->majors->first()->id ?? null;
        $this->selectedMajorId = '';
        // $this->questions = QuestionExam::with('majors')->get();
        // $this->filterQuestions();
    }

    public function selectMajor($majorId)
    {
        $this->selectedMajorId = $majorId;
        $this->filterQuestions();
    }

    public function filterQuestions()
    {   
        $query = QuestionExam::query();

        // Filtrar por especialidad si está seleccionada
        if ($this->selectedMajorId) {
            $query->where('major_id', $this->selectedMajorId);
        }

        // Aplicar búsqueda si hay un término de búsqueda
        if ($this->search) {
            $query->search($this->search);
        }

        // Paginar los resultados
        return $query->paginate($this->perPage);
    }

    public function updatedSelectedMajorId()
    {
        // Este método se ejecuta automáticamente cuando cambia el valor de selectedMajorId
        $this->resetPage(); // Reinicia la paginación al cambiar la especialidad
    }

    public function updatedPerPage()
    {
        // Este método se ejecuta automáticamente cuando cambia el valor de perPage
        $this->resetPage(); // Reinicia la paginación al cambiar el número de elementos por página
    }

    public function updatedSearch()
    {
        // Reinicia la paginación al cambiar el término de búsqueda
        $this->resetPage();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function resetInputFields()
    {
        $this->major_id = '';
        $this->question = '';
        $this->description = '';
        $this->questionId = '';
        $this->imagen = null;
        $this->status = true;
        $this->answers = [];
    }

    public function store()
    {
        $this->validate([
            'major_id' => 'required|exists:majors,id',
            'question' => 'required',
            'description' => 'nullable',
        ]);

        $hasCorrectAnswer = collect($this->answers)->contains('is_correct', true);
        if (!$hasCorrectAnswer) {
            session()->flash('error', 'Debe haber al menos una respuesta correcta.');
            return;
        }

        $imagenPath = null;

        if ($this->imagen) {
            $manager = new ImageManager(new Driver()); 
            $nombreImagen = Str::random(10) . '_' . $this->imagen->getClientOriginalName();
            $ruta = 'storage/images/questions/';
    
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }
    
            $img = $manager->read($this->imagen->getRealPath());
            $img->save($ruta . $nombreImagen);
    
            $imagenPath = $ruta . $nombreImagen;
        }

        

        $question = QuestionExam::updateOrCreate(['id' => $this->questionId], [
            'major_id' => $this->major_id,
            'question' => $this->question,
            'description' => $this->description,
            'imagen' => $imagenPath,
            'status' => $this->status,
        ]);

        $question->answers()->delete(); // Eliminar respuestas anteriores (si es una actualización)

        foreach ($this->answers as $answer) {
            $question->answers()->create([
                'question_id' => $question->id,
                'response' => $answer['response'],
                'is_correct' => $answer['is_correct'],
            ]);
        }

        $this->selectedMajorId = $this->major_id;

        $this->filterQuestions();

        session()->flash('message', 
            $this->questionId ? 'Task Updated Successfully.' : 'Task Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }


    public function edit($id)
    {
        $questionJpa = QuestionExam::with('answers')->findOrFail($id);
        
        if (!$questionJpa) {
            session()->flash('error', 'La pregunta no existe.');
            return;
        }

        $this->questionId = $id;
        $this->major_id = $questionJpa->major_id;
        $this->question = $questionJpa->question;
        $this->description = $questionJpa->description;
        $this->imagen = $questionJpa->imagen;
        $this->status = $questionJpa->status;

        $this->answers = [];

        foreach ($questionJpa->answers as $answer) {
            $this->answers[] = [
                'question_id' => $questionJpa->id,
                'response' => $answer->response,
                'is_correct' => $answer->is_correct == 1,
            ];
        }

        $this->openModal();
    }

    public function delete($id)
    {
        QuestionExam::find($id)->delete();
        session()->flash('message', 'Task Deleted Successfully.');
    }

    public function addAnswer()
    {
        $this->answers[] = ['response' => '', 'is_correct' => false];
    }

    public function removeAnswer($index)
    {
        unset($this->answers[$index]);
        $this->answers = array_values($this->answers); // Reindexar el array
    }

}
