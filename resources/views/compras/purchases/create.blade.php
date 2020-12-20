@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>{{ __('Providers') }}</h1>
@stop



@section('content')

<x-card>

    <x-slot name="title">
        Compras  &nbsp;
        <a class="btn btn-info " href="{{ route('purchases.index') }}">{{ __('Back') }}</a>
    </x-slot>


    @livewire('purchase-component')

</x-card>
@stop


@section('js')
    @include('includes.alerts')
    @livewireScripts

@stop
