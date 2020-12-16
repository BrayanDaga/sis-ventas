@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>{{ __('purchases') }}</h1>

@stop

@section('content')

<x-card>

    <x-slot name="title">
        {{ __('purchases') }}
        <a href="{{ route('purchases.create') }}" class="btn btn-primary">Nueva Compra</a>

    </x-slot>
    <x-table>
        <x-slot name="thead">
            <th>Id</th>
            <th>Fecha</th>
            <th>type_vou</th>
            <th>Proveedor</th>
            <th>Impuesto</th>
            <th>Total</th>
        </x-slot>
        @foreach ($purchases as $purchase)
        <tr>
            <td>{{ $purchase->id }}</td>
            <td>{{ $purchase->created_at->format('d-m-Y') }}</td>
            <td>{{ $purchase->type_vou }}</td>
            <td>{{ $purchase->provider->name }}</td>
            <td>{{ $purchase->iva }}</td>
            <td>{{ $purchase->total }}</td>
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
</script>@stop

