<div>
    {{-- Barra de búsqueda --}}
    <div class="mb-4">
        <input wire:model="search" type="text" placeholder="Buscar..." class="form-control">
    </div>

    {{-- Select para filtrar por especialidad --}}
    <div class="mb-4">
        <select wire:model="majorFilter" class="form-control">
            <option value="">Todas las especialidades</option>
            @foreach($majors as $major)
                <option value="{{ $major->id }}">{{ $major->name }}</option>
            @endforeach
        </select>
    </div>

    <h2>mensaje demo</h2>

    {{-- Tabla --}}
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    @foreach($this->columns() as $column)
                        <th wire:click="sort('{{ $column->column }}')">
                            {{ $column->title }}
                            @if ($sortField === $column->column)
                                @if ($sortDirection === 'asc')
                                    ↑
                                @else
                                    ↓
                                @endif
                            @endif
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                    <tr>
                        @foreach($this->columns() as $column)
                            <td>
                                {{ $column->format($row->{$column->column}, $row) }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Paginación --}}
    <div class="mt-4">
        {{ $rows->links() }}
    </div>
</div>