@extends('admin.layout')

@section('title', 'Peran & Perizinan')

@section('content')
<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
    <div class="modal-dialog" role="document">
        {!! Form::open(['method' => 'post']) !!}

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="roleModalLabel">Peran</h4>
            </div>
            <div class="modal-body">
                <!-- name Form Input -->
                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    {!! Form::label('name', 'Nama') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama Peran']) !!}
                    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>

                <!-- Submit Form Button -->
                {!! Form::submit('Kirim', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Peran & Perizinan</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <div id="accordion-role-permission" class="accordion accordion-bordered ">
                            @forelse ($roles as $role)
                                {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'm-b']) !!}

                                @if($role->name === 'Admin')
                                    @include('admin.roles._permissions', ['title' => ' Perizinan ' . $role->name, 'options' => ['disabled'], 'showButton' => true])
                                @else
                                    @include('admin.roles._permissions', ['title' => ' Perizinan ' . $role->name, 'model' => $role, 'showButton' => true])
                                @endif

                                {!! Form::close() !!}

                            @empty
                                <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
                            @endforelse
                        </div>
                    </div>
                    @can('add_roles')
                        <div class="card-footer text-right">
                            <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#roleModal"> <i class="glyphicon glyphicon-plus"></i> Peran Baru</a>        
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection