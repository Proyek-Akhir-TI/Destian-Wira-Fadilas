<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('first_name', 'Nama Depan') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Nama Depan']) !!}
    @if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('last_name', 'Nama Belakang') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Nama Belakang']) !!}
    @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
</div>

<!-- email Form Input -->
<div class="form-group @if ($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<!-- password Form Input -->
<div class="form-group @if ($errors->has('password')) has-error @endif">
    {!! Form::label('password', 'Kata Sandi') !!}
    {!! Form::text('password', null,['class' => 'form-control', 'placeholder' => 'Kata Sandi', 'disabled' => !empty($user)]) !!}
    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
</div>

<!-- Roles Form Input -->
<div class="form-group @if ($errors->has('roles')) has-error @endif">
    {!! Form::label('roles[]', 'Peran') !!}
    {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control', 'multiple']) !!}
    @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
</div>

<!-- Permissions -->
@if(isset($user))
    <div class="form-group">
        <label>Pergantian Perizinan</label>
    </div>
    <div class="row">
        @foreach($permissions as $perm)
            <?php
                $per_found = null;

                if( isset($role) ) {
                    $per_found = $role->hasPermissionTo($perm->name);
                }

                if( isset($user)) {
                    $per_found = $user->hasDirectPermission($perm->name);
                }
            ?>

            <div class="col-md-3">
                <div class="checkbox">
                    <label class="{{ Str::contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                        {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!} {{ $perm->name }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
@endif