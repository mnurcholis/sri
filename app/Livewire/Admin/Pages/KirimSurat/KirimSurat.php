<?php

namespace App\Livewire\Admin\Pages\KirimSurat;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class KirimSurat extends Component
{
    use WithFileUploads;

    public $idNya, $judul, $number = [], $file;
    public $isEdit = false;

    protected $listeners = ['edit', 'delete'];

    protected $rules = [
        'name' => 'required|max:255',
        'wa' => 'required|min:9',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|min:8',
        'confirmpassword' => 'required|same:password|min:8',
        'role_user' => 'required',
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
        $this->judul = '';
        $this->number = '';
        $this->file = '';
    }

    public function edit($id)
    {
        $this->isEdit = true;
        $data = ModelsUser::find($id);
        $this->idNya = $data->id;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->wa = $data->wa;
        $this->role_user = $data->getRoleNames();
    }
    public function save()
    {
        $rules = [
            'file' => 'required',
        ];
        $this->validate($rules);

        $token = config('app.token_wa');
        $url = "https://pati.wablas.com/api/send-document";

        // Upload and store the document
        $file = $this->file->store('documents', 'public');
        $filePath = storage_path("app/public/$file");

        // Attach the file outside the loop
        $fileAttachment = File::get($filePath);

        foreach ($this->number as $val) {
            $data = [
                'phone' => ganti_depan($val),
                'document' => $file,
                'caption' => $this->judul,
            ];

            // Send document to each phone number
            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->attach('document', $fileAttachment, $file) // Attach the file with the original name
                ->post($url, $data);
            // Handle the response as needed
            if ($response->successful()) {
                $result = $response->json();
            } else {
                $result = $response->json();
            }

            // Output or log the result for debugging
            dd($result);
        }
    }


    public function update()
    {
        $dataUser = ModelsUser::find($this->idNya);
        $dataUser->name = $this->name;
        $dataUser->email = $this->email;
        $dataUser->syncRoles($this->role_user);
        if ($this->password) {
            $dataUser->password = Hash::make($this->password);
        }
        $dataUser->save();
        $this->dispatchBrowserEvent('Update');
        $this->emit('refreshDatatable');
        $this->cancel();
    }

    public function delete($id)
    {
        $user = ModelsUser::find($id);
        $user->delete();
        $this->dispatchBrowserEvent('Delete');
        $this->emit('refreshDatatable');
    }

    public function render()
    {
        return view('livewire.admin.pages.kirim-surat.kirim-surat');
    }
}
