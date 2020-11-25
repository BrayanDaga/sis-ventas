@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>{{ __('Categories') }}</h1>
@stop

@section('content')

<x-card>

    <x-slot name="title">
        {{ __('Categories') }}
    </x-slot>

    <x-table>
        <x-slot name="thead">
            <th>Id</th>
            <th>Name</th>
        </x-slot>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
        </tr>
        @endforeach
    </x-table>


</x-card>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

