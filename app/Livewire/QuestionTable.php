<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\QuestionExam;

class QuestionTable extends DataTableComponent
{
    protected $model = QuestionExam::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Major id", "major_id")
                ->sortable(),
            Column::make("Question", "question")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Imagen", "imagen")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
