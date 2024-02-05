<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="User Management" subjudul="Role List" :breadcrumb="['User Management', 'Role List']" />
    </x-slot>
    <div class="card">
        <div class="card-header">
            @if ($isEdit)
                <a href="#" wire:click='cancel' class="btn btn-warning mt-md-0 mt-2 ml-md-8">Cancel</a>
            @else
                <a href="#" wire:click='add' class="btn btn-primary mt-md-0 mt-2">Create Role</a>
            @endif

        </div>
        <div class="card-body">
            @if ($isEdit)
                <h6>Role Details</h6>
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
                    <div class="col-md-3">
                        <label>Permission:</label>
                        <div wire:ignore>
                            {!! Form::select('permission_user', get_permission_user(), null, [
                                'id' => 'permission_user',
                                'multiple' => 'multiple',
                                'class' => 'form-control permission_user',
                                'wire:model.lazy' => 'permission_user',
                            ]) !!}
                        </div>
                        @error('permission_user')
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
            <livewire:admin.table.role-list />
        </div>
    </div>
    <livewire:admin.global.konfirmasi-hapus />
</div>
@push('js')
    <script src="{{ asset('limitless/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            window.addEventListener('select2untukroleuser', event => {
                $('.permission_user').select2();

                $('#permission_user').on('change', function(e) {
                    var data = $('#permission_user').select2("val");
                    @this.set('permission_user', data);
                });
            });

        });
    </script>
@endpush
