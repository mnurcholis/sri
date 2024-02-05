<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="User Management" subjudul="Permission List" :breadcrumb="['User Management', 'Permission List']" />
    </x-slot>

    <div class="card">
        <div class="card-header">
            @if ($isEdit)
                <a href="#" wire:click='cancel' class="btn btn-warning mt-md-0 mt-2 ml-md-8">Cancel</a>
            @else
                <a href="#" wire:click='add' class="btn btn-primary mt-md-0 mt-2">Create Permission</a>
            @endif

        </div>
        <div class="card-body">
            @if ($isEdit)
                <h6>Permission Details</h6>
                <div class="row">
                    <div class="col-md-3">
                        <label>Role:</label>
                        {{ Form::text(null, null, [
                            'class' => 'form-control' . ($errors->has('name') ? ' border-danger' : null),
                            'placeholder' => 'Name Role',
                            'wire:model.lazy' => 'name',
                        ]) }}
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <button type="submit" wire:click='save' class="btn btn-primary mt-md-0 mt-2">Save</button>
                    </div>
                </div>
                <hr>
            @else
            @endif
            <livewire:admin.table.permission-list />
        </div>
        <livewire:admin.global.konfirmasi-hapus />
    </div>
