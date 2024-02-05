<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelRole;

class Role extends Component
{
    public $name, $permission_user, $idNya, $datane;
    public $isEdit = false;

    protected $listeners = ['edit', 'delete'];
    protected $rules = [
        'name' => 'required|min:3',
        'permission_user' => 'required',
    ];
    public function add()
    {
        $this->isEdit = !$this->isEdit;
        $this->dispatchBrowserEvent('select2untukroleuser');
    }

    public function cancel()
    {
        $this->isEdit = !$this->isEdit;
        $this->idNya = '';
        $this->name = '';
        $this->permission_user = '';
        $this->datane = '';
    }
    public function edit($id)
    {
        $this->isEdit = true;
        $this->datane = ModelRole::find($id);
        $this->idNya = $this->datane->id;
        $this->permission_user = $this->datane->getPermissionNames();
        $this->name = $this->datane->name;
        $this->dispatchBrowserEvent('select2untukroleuser');
    }

    public function save()
    {
        $this->validate();
        if ($this->idNya) {
            $this->update();
        } else {
            $role = ModelRole::create([
                'name' => $this->name,
                'guard_name' => 'web',
            ]);

            $role->givePermissionTo($this->permission_user);
            $this->dispatchBrowserEvent('Success');
            $this->emit('refreshDatatable');
            $this->cancel();
        }
    }

    public function update()
    {
        $role = ModelRole::find($this->idNya);
        if ($role) {
            $role->update([
                'name' => $this->name,
            ]);
            $role->syncPermissions($this->permission_user);
        }
        $this->dispatchBrowserEvent('Update');
        $this->emit('refreshDatatable');
        $this->cancel();
    }

    public function delete($id)
    {
        $role = Modelrole::find($id);
        $role->delete();
        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('Delete');
    }
    public function render()
    {
        return view('livewire.admin.pages.role');
    }
}
