<?php

namespace App\Livewire\Admin\Pages\KirimSurat;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\KirimSurat;

class KirimSuratTable extends DataTableComponent
{
    protected $model = KirimSurat::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function LihatSurat($id)
    {
        $this->emit('LihatSurat', $id);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Judul", "judul")
                ->sortable(),
            Column::make("Tanggal", "created_at")
                ->sortable()
                ->format(function ($value) {
                    return $value->settings(['formatFunction' => 'translatedFormat'])->locale('id')->format('l, j F Y');
                }),
            Column::make('Action', 'id')
                ->format(
                    function ($value, $row, Column $column) {
                        return '<div>
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
                                        <i class="icon-menu9"></i>
                                    </a>
          
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(22px, 1px, 0px);">
                                        <a href="#" wire:click="LihatSurat(' . $row->id . ')")" class="dropdown-item"><i class="icon-clipboard3"></i> Lihat Surat</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                )
                ->html(),
        ];
    }
}
