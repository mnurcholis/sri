<?php

namespace App\Livewire\Admin\Global;

use Livewire\Component;

class PageHeader extends Component
{
    public $judul = "";
    public $subjudul = "";
    public $breadcrumb = [];
    public function render()
    {
        return view('livewire.admin.global.page-header');
    }
}
