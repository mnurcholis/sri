<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Kirim" subjudul="Surat" :breadcrumb="['Kirim Surat']" />
    </x-slot>

    <div class="card">
        <div class="card-header">
            @if ($isEdit)
                <button type="button" wire:click='cancel' class="btn btn-warning mt-md-0 mt-2 ml-md-8">Cancel</button>
            @else
                <button type="button" wire:click='add' class="btn btn-primary mt-md-0 mt-2">Kirim Surat</button>
            @endif

        </div>
        <div class="card-body">
            @if ($isEdit)
                <h6>Account Details</h6>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Judul Surat:</label>
                            {{ Form::text(null, null, [
                                'class' => 'form-control' . ($errors->has('judul') ? ' border-danger' : null),
                                'placeholder' => 'Judul Surat',
                                'wire:model.lazy' => 'judul',
                            ]) }}
                            @error('judul')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>File Surat:</label>
                            <input type="file" name="file" wire:model="file">
                            @error('file')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Number Whatsapp:</label>
                            <div wire:ignore>
                                <select class="form-control select-multiple-tags" multiple="multiple" data-fouc>
                                </select>
                            </div>
                            @error('number')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <button type="submit" wire:click='save' class="btn btn-primary mt-md-0 mt-2">Kirim</button>
                    </div>
                </div>
            @else
                <livewire:admin.pages.kirim-surat.kirim-surat-table />
            @endif
        </div>
    </div>
    <livewire:admin.global.konfirmasi-hapus />
</div>


@push('js')
    <script src="{{ asset('limitless/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            window.addEventListener('select2untukroleuser', event => {
                $('.select-multiple-tags').select2({
                    tags: true,
                    tokenSeparators: [','], // Use commas to separate tags
                });

                $('.select-multiple-tags').on('change', function(e) {
                    var data = $(this).val(); // Use val() directly on the Select2 instance
                    @this.set('number', data);
                });
            });
        });
    </script>
@endpush
