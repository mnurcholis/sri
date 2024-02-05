<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="User Management" subjudul="User List" :breadcrumb="['User Management', 'User List']" />
    </x-slot>
    <div class="card">
        <div class="card-header">
            @if ($isEdit)
                <a href="#" wire:click='cancel' class="btn btn-warning mt-md-0 mt-2 ml-md-8">Cancel</a>
            @else
                <a href="#" wire:click='add' class="btn btn-primary mt-md-0 mt-2">Create User</a>
            @endif

        </div>
        <div class="card-body">
            @if ($isEdit)
                <h6>Account Details</h6>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Full name:</label>
                            {{ Form::text(null, null, [
                                'class' => 'form-control' . ($errors->has('name') ? ' border-danger' : null),
                                'placeholder' => 'Full Name',
                                'wire:model.lazy' => 'name',
                            ]) }}
                            @error('name')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Email address:</label>
                            {{ Form::text(null, null, [
                                'class' => 'form-control' . ($errors->has('email') ? ' border-danger' : null),
                                'placeholder' => 'Email',
                                'wire:model.lazy' => 'email',
                            ]) }}
                            @error('email')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Number Whatsapp:</label>
                            {{ Form::number(null, null, [
                                'class' => 'form-control' . ($errors->has('wa') ? ' border-danger' : null),
                                'placeholder' => 'Number Whatsapp',
                                'wire:model.lazy' => 'wa',
                            ]) }}
                            @error('wa')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Role:</label>
                            {!! Form::select('role', get_role_user(), null, [
                                'id' => 'role_user',
                                'class' => 'form-control select role_user' . ($errors->has('role_user') ? ' border-danger' : null),
                                'placeholder' => 'Choose Role User',
                                'wire:model.lazy' => 'role_user',
                            ]) !!}
                            @error('role_user')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Password:</label>
                        {!! Form::password('password', [
                            'class' => 'form-control' . ($errors->has('password') ? ' border-danger' : null),
                            'placeholder' => 'Enter Password',
                            'value' => '12345678',
                            'wire:model.lazy' => 'password',
                        ]) !!}
                        @error('password')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label>Confirm Password:</label>
                        {{ Form::password('confirmpassword', [
                            'class' => 'form-control' . ($errors->has('confirmpassword') ? ' border-danger' : null),
                            'placeholder' => 'Confirm Password',
                            'wire:model.lazy' => 'confirmpassword',
                        ]) }}
                        @error('confirmpassword')
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
            <livewire:admin.table.user-list />
        </div>
    </div>
    <livewire:admin.global.konfirmasi-hapus />
</div>
