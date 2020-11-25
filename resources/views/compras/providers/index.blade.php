@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>{{ __('Providers') }}</h1>
@stop

@section('content')

<x-card>

    <x-slot name="title">
        {{ __('Providers') }}
    </x-slot>

    <x-table>
        <x-slot name="thead">
            <th>Id</th>
            <th>Name</th>
        </x-slot>
        @foreach ($providers as $provider)
        <tr>
            <td>{{ $provider->id }}</td>
            <td>{{ $provider->name }}</td>
        </tr>
        @endforeach
    </x-table>


</x-card>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

