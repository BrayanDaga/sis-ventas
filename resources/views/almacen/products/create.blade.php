@extends('adminlte::page')

@section('title', 'PRoductos')

@section('content_header')
   <div class="d-flex justify-content-sm-between">
    <h1><i class="fa fa-edit"></i>  Agregar nuevo producto   </h1>
    <a class="btn btn-info " href="{{ route('products.index') }}">{{ __('Back') }}</a>
   </div>
@stop



@section('content')



    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" id="preview" src="{{ asset('img/products/default.jpg') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nombre de Producto</label>
                            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{ __('Name') }} ..." value="{{ old('name') }}" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            <label>Categoria</label>

                            <select name="category_id" id="category" class="form-control @error('status') is-invalid @enderror">
                                <option disabled selected >Seleccione categoria ....</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id  }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Proveedor</label>
                            <select id="provider" class="form-control" name="person_id" >
                                <option disabled selected>Seleccione proveedor ....</option>
                                @foreach ($providers as $provider)
                                <option value="{{ $provider->id  }}">{{ $provider->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">

                        <label>Stock</label>
                            <input id="stock" class="form-control @error('stock') is-invalid @enderror" type="number"  min="0" name="stock" placeholder="{{ __('stock') }} ..." value="{{ old('stock') }}" >

                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Descripcion</label>
                        <div class="form-group">
                            <textarea id="description" class="form-control" name="description" placeholder="descripcion ..." value="{{ old('description') }}"></textarea>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            <label>Precio</label>
                                <input id="price" class="form-control @error('price') is-invalid @enderror" type="number"  min="0.00" step="0.01" name="price" placeholder="{{ __('price') }} ..." value="{{ old('price') }}" >

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            <label>Estado</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="inactivo">Inactivo</option>
                                <option value="activo">Activo</option>
                            </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Imagen de Producto</label>
                                {{-- <img class="img-thumbnail" id="preview"  alt="" width="250"> --}}
                                <input type="file" name="image" id="file" accept="image/*">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>


@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#category').select2();
            $('#provider').select2();


            $('#file').change(function(e) {
            addImage(e);
            });

            function addImage(e){
            var file = e.target.files[0],
            imageType = /image.*/;

            if (!file.type.match(imageType))
            return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
            }

            function fileOnload(e) {
            var result=e.target.result;
            $('#preview').attr("src",result);
            }

        });

    </script>
    @include('includes.alerts')
@stop
