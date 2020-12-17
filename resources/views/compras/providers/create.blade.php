@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>{{ __('Providers') }}</h1>
@stop



@section('content')

<x-card>

    <x-slot name="title">
        {{ __('providers') }} &nbsp;
        <a class="btn btn-info " href="{{ route('providers.index') }}">{{ __('Back') }}</a>
    </x-slot>


    <form action="{{ route('providers.store') }}" method="post">
        @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{ __('Name') }} ..." value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input id="numDoc" class="form-control"  type="text" name="numDoc" placeholder="{{ __('numDoc') }} ..."  value="{{ old('numDoc') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input id="phone" class="form-control"  type="text" name="phone" placeholder="{{ __('phone') }} ..."  value="{{ old('phone') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input id="address" class="form-control"  type="text" name="address" placeholder="{{ __('address') }} ..."  value="{{ old('address') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input id="email" class="form-control"  type="text" name="email" placeholder="{{ __('email') }} ..."  value="{{ old('email') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
            </div>
        </div>
    <div>
    </form>




</x-card>
@stop



@section('js')
    @include('includes.alerts')
@stop
