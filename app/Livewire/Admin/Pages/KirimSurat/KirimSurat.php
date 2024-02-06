<?php

namespace App\Livewire\Admin\Pages\KirimSurat;

use App\Models\KirimSurat as ModelsKirimSurat;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class KirimSurat extends Component
{
    use WithFileUploads;

    public $idNya, $judul, $number = [], $file, $data;
    public $isEdit = false;

    protected $listeners = ['edit', 'delete', 'LihatSurat'];

    public function LihatSurat($id)
    {
        $this->data = ModelsKirimSurat::find($id);
        $this->dispatchBrowserEvent('show-view-st-modal');
    }

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
        $this->number = [];
        $this->file = '';
    }

    public function save()
    {
        $rules = [
            'judul' => 'required',
            'file' => 'required|mimes:pdf|max:10240',
            'number' => 'required',
        ];
        $this->validate($rules, [
            'checklist.*.file.required_if' => 'Harus di isi file PDF.',
            'checklist.*.file.mimes' => 'File harus berupa PDF.',
            'checklist.*.file.max' => 'Maksimal upload file PDF 10Mb.',
        ]);

        $token = config('app.token_wa');
        $url = "https://pati.wablas.com/api/send-document";

        // Upload and store the document
        $file = $this->file->store('public/documents');
        $filePath = storage_path("app/$file");

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
            // Output or log the result for debugging
            // dd($result);

            // Handle the response as needed
            if ($response->successful()) {
                $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'success', // Jenis alert, misalnya 'success', 'error', atau 'warning'
                    'text' => 'Surat Berhasil dikirim...', // Isi pesan
                ]);
            } else {
                $result = $response->json();
                $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'error', // Jenis alert, misalnya 'success', 'error', atau 'warning'
                    'text' => 'Error - ' . $result, // Isi pesan
                ]);
            }
        }
        ModelsKirimSurat::create([
            'judul' => $this->judul,
            'file' => $file,
            'number' => json_encode($this->number)
        ]);
        $this->emit('refreshDatatable');
        $this->cancel();
    }

    public function render()
    {
        return view('livewire.admin.pages.kirim-surat.kirim-surat');
    }
}
