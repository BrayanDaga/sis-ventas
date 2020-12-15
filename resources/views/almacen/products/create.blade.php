@extends('adminlte::page')

@section('title', 'PRoductos')

@section('content_header')
    <h1>{{ __('products') }}</h1>
@stop



@section('content')

<x-card>

    <x-slot name="title">
        {{ __('products') }} &nbsp;
        <a class="btn btn-info " href="{{ route('products.index') }}">{{ __('Back') }}</a>
    </x-slot>


    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nombre de Producto</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{ __('Name') }} ..." value="{{ old('name') }}" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Categoria</label>
                        <select id="category" class="form-control" name="category_id">
                            <option disabled selected>Seleccione categoria ....</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id  }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Proveedor</label>
                        <select id="provider" class="form-control" name="person_id" >
                            <option disabled selected>Seleccione proveedor ....</option>
                            @foreach ($providers as $provider)
                            <option value="{{ $provider->id  }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <label>Stock</label>
                    <div class="form-group">
                        <input id="stock" class="form-control"  type="number" name="stock" placeholder="{{ __('stock') }} ..."  value="{{ old('stock') }}" min="0" >
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Descripcion</label>
                    <div class="form-group">
                        <textarea id="description" class="form-control" name="description" placeholder="descripcion ..."></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Precio</label>
                    <div class="form-group">
                        <input id="price" class="form-control"  type="number" name="price" placeholder="{{ __('price') }} ..."  value="{{ old('price') }}" min="0.00" step="0.01">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="status" id="status" class="form-control">
                            <option value="inactivo">Inactivo</option>
                            <option value="activo">Activo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Imagen de Producto</label>
                            {{-- <img class="img-thumbnail" id="preview"  alt="" width="250"> --}}
                            <input type="file" name="image" id="file" accept="image/*">

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


</x-card>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#category').select2({
                language: "es"
            });
            $('#provider').select2();
        });

    </script>
    @include('includes.alerts')
@stop
