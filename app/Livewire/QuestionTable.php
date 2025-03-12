<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\{DateFilter, MultiSelectFilter, SelectFilter};
use App\Models\QuestionExam;
use App\Models\Major;

class QuestionTable extends DataTableComponent
{
    protected $model = QuestionExam::class;
    public $majorFilter = '';
    protected $listeners = ['refresh' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
             ->setLayout('question-table')
             ->setFilterLayout('popover');
    }

    public function columns(): array
    {
        return [
            Column::make("Especialidad", "major_id")
                ->sortable()
                ->format(function ($value, $row) {
                    return Major::find($value)->name;
                }),
            Column::make("Pregunta", "question")
                ->sortable(),
               
            Column::make("Imagen", "imagen")
                ->sortable()
                ->format(function ($value, $row) {
                    return $value ? '<img src="' . asset($value) . '" width="50">' : 'Sin Imagen';
                })
                ->html(),
        ];
    }

    public function getMajorsProperty()
    {
        return Major::all();
    }

   

    public function filters(): array
    {
        return [
            SelectFilter::make('Especialidad', 'major_id')
                ->setFilterPillTitle('Especialidad') // Título del filtro
                ->options([
                    '' => 'Todas las especialidades', // Opción por defecto
                    ...Major::pluck('name', 'id')->toArray(), // Opciones dinámicas
                ])
                ->filter(function ($builder, string $value) {
                    if ($value) {
                        $builder->where('major_id', $value); // Aplicar el filtro
                    }
                }),
        ];
    }

     public function query()
    {
        return QuestionExam::query();
    }
    
}
