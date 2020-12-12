@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>{{ __('Categories') }}</h1>
@stop

@section('content')

<x-card>

    <x-slot name="title">
        {{ __('Categories') }} &nbsp;
        <a class="btn btn-info " href="{{ route('categories.index') }}">{{ __('Back') }}</a>
    </x-slot>
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{ __('Name') }} ...">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('Description') }}</label>
                        <input id="description" class="form-control  @error('name') is-invalid @enderror" type="text" name="description" placeholder="{{ __('Description') }} ...">
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary ">{{ __('Save') }}</button>
                    </div>
            </form>
        </div>

    <div>


</x-card>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @include('includes.alerts')
@stop
