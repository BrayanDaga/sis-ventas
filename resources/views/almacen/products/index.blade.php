@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>{{ __('Products') }}</h1>
@stop

@section('content')
<x-card>

    <x-slot name="title">
        {{ __('Products') }}
    </x-slot>

    <x-table>
        <x-slot name="thead">
            <th>Id</th>
            <th>{{ __('image') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Stock') }}</th>
            <th>{{ __('Status') }}</th>
        </x-slot>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td >
                <img src="https://picsum.photos/300/300" alt="Product Image" class="img-rounded" width="60">
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->status }}</td>
        </tr>
        @endforeach
    </x-table>


</x-card>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
