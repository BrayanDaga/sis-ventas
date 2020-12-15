@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>{{ __('Products') }}</h1>
@stop

@section('content')

<x-card>

    <x-slot name="title">
        {{ __('Products') }}
        <a href="{{ route('products.create') }}" class="btn btn-primary">Añadir Producto </a>

    </x-slot>

    <x-table>
        <x-slot name="thead">
            <th>Id</th>
            <th>{{ __('image') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Stock') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Price') }}</th>
            <th></th>
        </x-slot>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td >
                <img src="{{ asset($product->image )}}" alt="Product Image" class="img-rounded" width="60">
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                    @if ($product->status  == 'activo')
                    <span class="badge badge-success"> {{ $product->status }}</span></span>
                    @else
                    <span class="badge badge-danger"> {{ $product->status }}</span></span>
                    @endif
            </td>
            <td>{{ $product->price }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Accion
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" type="button"> <i class="fa fa-edit"></i> Edit</button>
                      {{-- <button class="dropdown-item" type="button"><i class="fa fa-barcode"></i>Barra</button> --}}
                      <button class="dropdown-item" type="button"><i class="fa fa-trash"></i>Borrar</button>
                    </div>
                  </div>
            </td>
        </tr>
        @endforeach
    </x-table>


</x-card>


@stop

@section('js')
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@include('includes.alerts')
@stop

