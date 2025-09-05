@extends('layouts.app')

@section('titulo_pagina', 'Compra')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Compra detalle
                    </h1>
                </div>
                <div class="col ">
                    <a class="btn btn-outline-info float-right"
                       href="{{ route('compras.index') }}"
                    >
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
                        <span class="d-none d-sm-inline">Regresar</span>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">


                    <div class="card">


                        <div class="card-body">

                            <div class="form-row">

                                @include('compras.show_fields')

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
