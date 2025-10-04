@extends('layouts.app')

@section('titulo_pagina',__('Profile'))

@push('css')
    <style>

        .icon-edit-avatar{
            position: absolute;
            right:20px;
            top:10px;
            text-align: center;
            border-radius: 30px 30px 30px 30px;
            color:white;
            padding:5px 10px;
            font-size:20px;
        }
    </style>
@endpush

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Profile')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @include('layouts.partials.request_errors')

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    @php($u = Auth::user())
                    <div class="card">
                        <div class="card-body box-profile text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{Auth::user()->img}}"
                                 alt="User profile picture">

                            <h3 class="profile-username">{{ $u->name }}</h3>
                            <p class="text-muted mb-2">{{ $u->role->name ?? 'Usuario' }}</p>

                            <ul class="list-group list-group-unbordered mb-3 text-left">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-muted">Nombre y Apellido</span>
                                    <strong class="text-dark">{{ $u->name }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-muted">Usuario</span>
                                    <strong class="text-dark">{{ $u->username ?? $u->email }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-muted">Correo</span>
                                    <strong class="text-dark">{{ $u->email }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-muted">Teléfono</span>
                                    <strong class="text-dark">{{ $u->phone ?? '—' }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="text-muted">Último acceso</span>
                                    <strong class="text-dark">{{ optional($u->last_login_at)->format('d/m/Y H:i') ?? '—' }}</strong>
                                </li>
                            </ul>

                            <a href="{{ route('password.request') }}" class="btn btn-link p-0">¿Olvidaste tu contraseña?</a>
                        </div>
                    </div>

                    <!-- /.card -->

                    <!-- About Me Box -->
{{--                    <div class="card card-primary">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">About Me</h3>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-header -->--}}
{{--                        <div class="card-body">--}}
{{--                            <strong><i class="fas fa-book mr-1"></i> Education</strong>--}}

{{--                            <p class="text-muted">--}}
{{--                                B.S. in Computer Science from the University of Tennessee at Knoxville--}}
{{--                            </p>--}}

{{--                            <hr>--}}

{{--                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>--}}

{{--                            <p class="text-muted">Malibu, California</p>--}}

{{--                            <hr>--}}

{{--                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>--}}

{{--                            <p class="text-muted">--}}
{{--                                <span class="tag tag-danger">UI Design</span>--}}
{{--                                <span class="tag tag-success">Coding</span>--}}
{{--                                <span class="tag tag-info">Javascript</span>--}}
{{--                                <span class="tag tag-warning">PHP</span>--}}
{{--                                <span class="tag tag-primary">Node.js</span>--}}
{{--                            </p>--}}

{{--                            <hr>--}}

{{--                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>--}}

{{--                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}
{{--                    </div>--}}
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">{{__('Settings')}}</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="tab-pane active" id="settings">
                                    {!! Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'patch']) !!}

                                    <div class="form-group row">
                                        {!! Form::label('username', __('Username'),["class"=>"col-sm-2 col-form-label"]) !!}
                                        <div class="col-10">
                                            {!! Form::text('username', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            {!! Form::label('name', __('Name'),["class"=>"col-sm-2 col-form-label"]) !!}
                                            <div class="col-10">
                                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label('email', __('Email'),["class"=>"col-sm-2 col-form-label"]) !!}
                                            <div class="col-10">
                                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>



{{--                                        <div class="form-group row">--}}
{{--                                            <div class="offset-sm-2 col-sm-10">--}}
{{--                                                <div class="checkbox">--}}
{{--                                                    <label>--}}
{{--                                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>--}}
{{--                                                    </label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-outline-success">{{__('Submit')}}</button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <!-- /.tab-pane -->

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('scripts')
    <script>
        $(function(){

            //para abrir el imput tipo file
            $("#upload_link").on('click', function(e){
                e.preventDefault();
                $("#upload:hidden").trigger('click');
            });


            //después de seleccionar el archivo (carga la imagen en el modal y lo abre)
            $("#upload").change(function () {

                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imgNewAvatar').attr('src', e.target.result);
                        $("#modal-edit-avatar").modal('show');
                    }

                    reader.readAsDataURL(this.files[0]);
                }

            });

            var cropBoxData;
            var canvasData;
            var cropper;



            //Cuando el modal se abre (inicializa el plugin para recortar la imagen)
            $('#modal-edit-avatar').on('shown.bs.modal', function () {

                var image = document.getElementById('imgNewAvatar');

                cropper = new Cropper(image, {
                    autoCropArea: 1,
                    ready: function () {
                        //Should set crop box data first here
                        cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
                    }
                });
            }).on('hidden.bs.modal', function () {
                cropBoxData = cropper.getCropBoxData();
                canvasData = cropper.getCanvasData();
                cropper.destroy();
            });


            $("#set_new_profile_pictur").click(function (e) {

                e.preventDefault();

                $("#uploadaAvatarSpinner").show();


                cropper.getCroppedCanvas().toBlob(function (blob) {

                    const formData = new FormData();
                    const extension = blob.type.split('/')[1];
                    const imageFile = new File([blob], `${Date.now()}.${extension}`, {
                        type: blob.type,
                    });

                    formData.append('avatar', imageFile);
                    console.log(blob,formData);

                    const header = {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    };

                    const url = '{{route('profile.edit.avatar',auth()->user()->id)}}';

                    axios.post(url,formData,header)
                    .then(response => {
                        log(response);

                        $("#modal-edit-avatar").modal('hide');
                        location.reload();
                    })
                    .catch(error => {
                        log(error.response);
                    });


                });
            })

        });
    </script>
@endpush
