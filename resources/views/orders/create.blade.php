<x-app-layout>
    <x-slot name="header">
        <a href="{{ url()->previous() }}"><i class="fa-solid fa-left-long border-2 rounded-full p-2 mb-2"></i></a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900">    
                    
                    <form action="{{ route('orders.store') }}" method="POST">
                       
                        @csrf
                            <div class="">
                                <label for="customer_name" class="block text-sm font-bold leading-4 text-gray-900" >{{__('Customer name')}}</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                        <input type="text" name="customer_name" id="customer_name" 
                                            autocomplete="customer_name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                            placeholder="Example: Juan José" value="{{old('customer_name')}}" required>
                                    </div>
                                    <x-input-error :messages="$errors->get('customer_name')"/>
                                </div>
                            </div>

                            

                            <div class="">
                                <label class="block text-gray-700 text-sm font-bold mt-2 te" for="delivery">
                                    {{__('¿Delivery?')}}
                                </label>
                                @if ($errors->get('address') || $errors->get('delivery_price'))
                                <div class="flex">
                                    <div class="">
                                        <input type="radio" name="delivery" id="inlineRadio1" value="1" onclick="enableAddress()">
                                        <label class="text-gray-700 text-sm font-bold mb-2 " for="inlineRadio1">{{__('Yes')}}</label>
                                    </div>
                                    <div class="mx-5">
                                        <input checked type="radio" name="delivery" id="inlineRadio2" value="0" onclick="disableAddress()">
                                        <label class="text-gray-700 text-sm font-bold mb-2 " for="inlineRadio2" >{{__('No')}}</label>
                                    </div>
                                </div>
                                @else                                                
                                    <div class="flex">
                                        <div class="">
                                            <input type="radio" name="delivery" id="inlineRadio3" value="1" onclick="enableAddress()">
                                            <label class="text-gray-700 text-sm font-bold mb-2 " for="inlineRadio3">{{__('Yes')}}</label>
                                        </div>
                                        <div class="mx-5">
                                            <input checked type="radio" name="delivery" id="inlineRadio4" value="0" onclick="disableAddress()">
                                            <label class="text-gray-700 text-sm font-bold mb-2" for="inlineRadio4" >{{__('No')}}</label>
                                        </div>
                                    </div>
                                @endif
                                <x-input-error :messages="$errors->get('delivery')"/>
                            </div>

                            <div class="">
                                <label for="address" class="block text-sm font-bold leading-4 text-gray-900" id="addressLabel">delivery address</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                        <input type="text" name="delivery_address" id="address" 
                                            autocomplete="delivery_address" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                            placeholder="Example: address 1111" value="{{old('delivery_address')}}">
                                    </div>
                                    <x-input-error :messages="$errors->get('delivery_address')"/>
                                </div>
                            </div>

                           

                            <div class="">
                                <label for="delivery_cost" class="block text-sm font-bold leading-4 text-gray-900" id="delivery_cost_label">Delivery Cost</label>
                                <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                    <input type="number" name="delivery_cost" id="delivery_cost" 
                                        autocomplete="delivery_cost" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                        placeholder="Example: 3000.0" value="{{old('delivery_cost')}}">
                                    </div>
                                    <x-input-error :messages="$errors->get('delivery_cost')"/>
                                </div>
                            </div>

                            <div class="">
                                <label class="block text-gray-700 text-sm font-bold mt-2" for="delivery_date">
                                    {{__('Delivery date')}}
                                </label>
                                <input required class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline sm:max-w-md"
                                        type="datetime-local" name="delivery_date" id="delivery_date" 
                                        value="{{ old('delivery_date') ? \Carbon\Carbon::parse(old('delivery_date'))->format('Y-m-d\TH:i') : '' }}">
                                <x-input-error :messages="$errors->get('delivery_date')"/>
                            </div>                

                    
                        <hr class="m-2">
                        <div class="mt-4">
                            <h2 class="font-bold text-2xl">{{__('Products')}}</h2>
                            <div class="grid lg:gap-x-2 lg:gap-y-4 lg:grid-cols-3 sm:gap-y-2 sm:grid-cols-1  w-full">
                                @foreach ($products as $product)
                                <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow text-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $product->price }}.</p>
                        
                                    <div class="flex justify-center items-center mt-4">
                                        <!-- Botón para disminuir cantidad -->
                                        <button type="button" class="px-4 py-2 bg-gray-300 text-black rounded" onclick="decreaseQuantity({{ $product->id }},{{$product->price}})">-</button>
                                        
                                        <!-- Input para mostrar y enviar la cantidad -->
                                        <input type="number" name="products[{{ $product->id }}][quantity]" id="quantity_{{ $product->id }}" class="mx-2 w-16 text-center" value="0" min="0" readonly>
                                        
                                        <!-- Botón para aumentar cantidad -->
                                        <button type="button" class="px-4 py-2 bg-gray-300 text-black rounded" onclick="increaseQuantity({{ $product->id }},{{$product->price}})">+</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="border rounded w-[100px] text-center m-2 bg-[#00065c]/10">
                            <label class=" text-gray-700 text-sm font-bold">
                               <span>{{__('Total')}}:</span> <p id="total">0.00</p>
                            </label>
                        </div>

                        <input class="p-2 m-2 bg-blue-600 rounded text-white cursor-pointer " type="submit" value="{{__('Add order')}}">
                    </form>
                
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    let total = 0;

    if(document.getElementById("address").value.trim() !== '' ||
        document.getElementById("delivery_cost").value.trim() !== ''     
    ){
        document.addEventListener('onload',enableAddress());
        document.getElementById('inlineRadio3').checked = true;
    }else{
        document.addEventListener('onload',disableAddress());
    }

    function enableAddress() {
        document.getElementById("address").style.display = 'block';
        document.getElementById("delivery_cost").style.display = 'block';

        document.getElementById("addressLabel").style.display = 'block';
        document.getElementById("delivery_cost_label").style.display = 'block';

        document.getElementById("address").disabled = false;
        document.getElementById("delivery_cost").disabled = false;
        document.getElementById('address').setAttribute('required', 'required');
        document.getElementById('delivery_cost').setAttribute('required', 'required');
    }

    function disableAddress() {
        document.getElementById("address").style.display = 'none';
        document.getElementById("delivery_cost").style.display = 'none';

        document.getElementById("addressLabel").style.display = 'none';
        document.getElementById("delivery_cost_label").style.display = 'none';

        document.getElementById("address").disabled = true;
        document.getElementById("delivery_cost").disabled = true;
        document.getElementById('address').removeAttribute('required');
        document.getElementById('delivery_cost').removeAttribute('required');
    }

    // Aumentar la cantidad de un producto
    function increaseQuantity(productId, price) {
        let quantityInput = document.getElementById('quantity_' + productId);
        quantityInput.value = parseInt(quantityInput.value) + 1;

         // Actualizar el total
        total += price;
        updateTotalDisplay();
    }

    function decreaseQuantity(productId, price) {
        let quantityInput = document.getElementById('quantity_' + productId);
        if (quantityInput.value > 0) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            total -= price;
            updateTotalDisplay();
        }
        // Actualizar el total
        
    }
      // Función para actualizar el total mostrado en la página
      function updateTotalDisplay() {
        document.getElementById('total').textContent = total.toFixed(2); // Mostrar con 2 decimales
    }
</script>