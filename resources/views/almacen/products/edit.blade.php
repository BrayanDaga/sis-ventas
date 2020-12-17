@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>{{ __('Categories') }}</h1>
@stop

@section('content')

<x-card>

    <x-slot name="title">
        Editar Categoria: {{ $category->id }} &nbsp;
        <a class="btn btn-info " href="{{ route('categories.index') }}">{{ __('Back') }}</a>
    </x-slot>

    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('categories.update',$category->id) }}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="{{ __('Name') }} ..." value="{{ old('name') ?? $category->name }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('Description') }}</label>
                        <input id="description" class="form-control" type="text" name="description" placeholder="{{ __('Description') }} ..." value="{{ old('description') ?? $category->description }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary ">{{ __('Uptade') }}</button>
                    </div>
            </form>
        </div>

    <div>


</x-card>
@stop



@section('js')
    @include('includes.alerts')
@stop
