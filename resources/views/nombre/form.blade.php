@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Nombre
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Nombre</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('nombres.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2 mb20">
                                <label for="tipo" class="form-label">{{ __('Tipo') }}</label>
                                <input type="text" name="tipo" class="form-control @error('tipo') is-invalid @enderror" value="{{ old('tipo', $nombre?->tipo) }}" id="tipo" placeholder="Tipo">
                                {!! $errors->first('tipo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <label for="numero" class="form-label">{{ __('Numero') }}</label>
                                <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror" value="{{ old('numero', $nombre?->numero) }}" id="numero" placeholder="Numero">
                                {!! $errors->first('numero', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <label for="precio" class="form-label">{{ __('Precio') }}</label>
                                <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $nombre?->precio) }}" id="precio" placeholder="Precio">
                                {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <label for="fotografia" class="form-label">{{ __('Fotografia') }}</label>
                                <input type="text" name="fotografia" class="form-control @error('fotografia') is-invalid @enderror" id="fotografia" placeholder="Fotografia">
                                 </div>

                            <div class="col-md-12 mt20 mt-2">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
