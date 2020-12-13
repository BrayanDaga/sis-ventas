@extends('adminlte::page')

@section('title', 'Categorias')


@section('content_header')
    <h1>{{ __('Categories') }}</h1>
@stop

@section('content')

<x-card>

    <x-slot name="title">
        Lista de Categorias
        <a href="{{ route('categories.create') }}" class="btn btn-primary">{{ __('Add Category') }}   </a>

    </x-slot>

    <x-table>
        <x-slot name="thead">
            <th>Id</th>
            <th>Name</th>
            <th>Descripcion</th>
            <th></th>

        </x-slot>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Accion
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}"> <i class="fa fa-edit"></i> Edit</a>
                      {{-- <button class="dropdown-item" type="button"><i class="fa fa-barcode"></i>Barra</button> --}}

                      <a class="dropdown-item" href="{{ route('categories.destroy',$category->id) }}"
                      onclick="event.preventDefault();
                                    document.getElementById('delete').submit();">
                                <i class="fa fa-trash"></i>Borrar
                    </a>
                    <form id="delete" action="{{ route('categories.destroy',$category->id) }}" method="POST" class="d-none" style="display:none">
                        @method('DELETE')
                        @csrf
                    </form>


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
