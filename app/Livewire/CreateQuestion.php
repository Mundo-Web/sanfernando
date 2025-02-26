<?php

namespace App\Livewire;
use App\Models\QuestionExam;
use App\Models\Major;

use Livewire\Component;

class CreateQuestion extends Component
{   
    public $major_id;
    public $question;
    public $description;
    public $questionId;
    public $imagen;
    public $status = false;
    
    public $majors;
    public $questions = [];
    public $isOpen = false;
    public $selectedMajorId;

    public $answers = [];
    public $correctAnswers = [];
    
    public function render()
    {
        return view('livewire.create-question');
    }


    public function mount()
    {
        $this->majors = Major::all();
        $this->selectedMajorId = $this->majors->first()->id ?? null;
        $this->questions = QuestionExam::with('majors')->get();
        $this->filterQuestions();
    }

    public function selectMajor($majorId)
    {
        $this->selectedMajorId = $majorId;
        $this->filterQuestions();
    }

    public function filterQuestions()
    {
        $this->questions = QuestionExam::where('major_id', $this->selectedMajorId)->get();
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
        $this->status = false;
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

        $imagenPath = $this->imagen ? $this->imagen->store('questions', 'public') : null;

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
