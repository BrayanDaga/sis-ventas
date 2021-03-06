<div>

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="row">

        <div class="p-3 m-8">
            <label class="inline-block w-32 font-bold">Tipo Voucher: </label>
             <select name="type_vou" wire:model="type_vou"  class="p-2 bg-white border shadow">
                <option disabled selected>Seleccione tipo voucher</option>
                <option value="boleta">Boleta</option>
                <option value="factura">Factura</option>
                <option value="ticket">Ticket</option>
            </select>

        </div>

        <div class="p-3 m-8">

            <label class="inline-block w-32 font-bold">Proveedor: </label>

             <select name="provider" wire:model="provider"  class="p-2 bg-white border shadow"  id="provider">
                 @foreach($providers as $item)
                 <option value={{ $item->id }}>{{ $item->name }}</option>
                 @endforeach
                 <option    disabled selected>Choose a proveedor</option>
            </select>
            <span>Por favor una vez que haya añadido productos no cambie de proveedor</span>


        </div>

        <div class="p-3 m-8">
                <label class="inline-block w-32 font-bold">Producto:</label>
                <select name="product" wire:model="product"
                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline" id="product">

                    @foreach($products as $item)
                    <option value={{ $item->id.','.$item->name.','. $item->price.','.$item->image }}>{{ $item->name }}</option>
                    @endforeach
                </select>
        </div>
        @if (isset($product) && $product!=null)
        <img src="{{ asset($image) }}" alt="Product Image" class="img-rounded" width="80">
        @endif
        <div class="p-3 m-8">
            <label class="inline-block w-32 font-bold">Precio:</label>
            <input class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline" type="text"  disabled value="{{ $price }}" >
        </div>
        <div class="p-3 m-8">
            <label class="inline-block w-32 font-bold">Cantidad:</label>
            <input class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline" type="number" wire:model.lazy="quantity" min="1" required>
        </div>

        <div class="p-3 m-8">

            <button class="btn btn-success btn-block" wire:click="addRow">Añadir</button>
        </div>
        <x-table>
            <x-slot name="thead">
                <th></th>
                <th>Id</th>
                {{-- <th>image</th> --}}
                <th>Articulo</th>
                <th>Cantidad</th>
                <th>Precio U</th>
                <th>Subtotal</th>
            </x-slot>
            @foreach($details as $key => $detail)
            <tr>
                <td>
                    <button class="btn btn-warning" wire:click="delRow({{ $key }})">X</button>
                </td>
                <td>{{ $detail['prod_id'] }} </td>
                {{-- <td>
                    <img src="{{ asset($detail['image'] )}}" alt="Product Image" class="img-rounded" width="60">
                </td> --}}
                <td>{{ $detail['product'] }} </td>
                 <td>{{ $detail['quantity'] }}</td>
                <td>{{ $detail['precioU'] }}</td>
                <td>{{ $detail['subtotal'] }}</td>
            </tr>
            @endforeach
            <tfoot>
                <th colspan="4"></th>
                <th>Total:</th>
                <th> S/. {{ $total }}</th>
            </tfoot>
        </x-table>
    <div>

        @if (isset($details) && $details!=null)
            <button class="btn btn-primary btn-lg" wire:click="storePurchase">Realizar Compra</button>

        @endif

</div>
