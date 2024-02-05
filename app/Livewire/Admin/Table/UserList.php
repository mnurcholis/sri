<?php

namespace App\Livewire\Admin\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserList extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Email', 'email')->sortable(),
            Column::make('Role', 'updated_at')
                ->format(function ($value, $row, Column $column) {
                    return $row->getRoleNames()->first();
                })
                ->html()
                ->searchable(),
            Column::make('Action', 'id')->view('components.table-action'),
        ];
    }
}
