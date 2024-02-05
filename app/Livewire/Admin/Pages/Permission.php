<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Component;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Permission extends Component
{
    public $name, $idNya, $datane;
    public $isEdit = false;

    protected $listeners = ['edit', 'delete'];
    protected $rules = [
        'name' => 'required|min:3',
    ];

    public function add()
    {
        $this->isEdit = !$this->isEdit;
    }
      public function cancel()
    {
        $this->isEdit = !$this->isEdit;
        $this->idNya = '';
        $this->name = '';
        $this->datane = '';
    }
     public function edit($id)
    {
        $this->isEdit = true;
        $this->datane = ModelsPermission::find($id);
        $this->idNya = $this->datane->id;
        $this->name = $this->datane->name;
    }

     public function save()
    {
        $this->validate();
        if ($this->idNya) {
            $this->update();
        } else {
            ModelsPermission::create([
                'name' => $this->name,
            ]);
            $this->dispatchBrowserEvent('Success');
            $this->emit('refreshDatatable');
            $this->cancel();
        }
    }

    public function update()
    {
        $role = ModelsPermission::find($this->idNya);
        if ($role) {
            $role->update([
                'name' => $this->name,
            ]);
        }
        $this->dispatchBrowserEvent('Update');
        $this->emit('refreshDatatable');
        $this->cancel();
    }

    public function delete($id)
    {
        $this->dispatchBrowserEvent('Error');
    }
    public function render()
    {
        return view('livewire.admin.pages.permission');
    }
}
