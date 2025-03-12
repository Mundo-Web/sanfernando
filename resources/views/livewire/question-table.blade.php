<div>
    {{-- Barra de búsqueda --}}
    <div class="mb-4">
        <input wire:model="search" type="text" placeholder="Buscar..." class="form-control">
    </div>

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