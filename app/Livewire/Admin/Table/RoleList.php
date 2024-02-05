<?php

namespace App\Livewire\Admin\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role;

class RoleList extends DataTableComponent
{
    protected $model = Role::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Permission', 'id')
                ->format(function ($value, $row, Column $column) {
                    $permissionNames = '';
                    foreach ($row->getPermissionNames() as $a) {
                        $permissionNames .= '<span>' . $a . '</span> ';
                    }
                    // Remove the trailing space if there are permission names
                    $permissionNames = rtrim($permissionNames);
                    return $permissionNames;
                })
                ->html(),
            Column::make('Action', 'id')->view('components.table-action'),
            // Other columns...
        ];
    }
}
