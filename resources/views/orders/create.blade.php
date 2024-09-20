<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="sm:col-span-4">
                                <label class="block text-gray-700 text-sm font-bold mt-2 te" for="username">
                                    {{__('Delivery?')}}
                                </label>
                                @if ($errors->get('address') || $errors->get('delivery_price'))
                                <div class="flex">
                                    <div class="">
                                        <input type="radio" name="delivery" id="inlineRadio1" value="1" onclick="enableAddress()">
                                        <label class="text-gray-700 text-sm font-bold mb-2 " for="inlineRadio1">Si</label>
                                    </div>
                                    <div class="mx-5">
                                        <input checked type="radio" name="delivery" id="inlineRadio2" value="0" onclick="disableAddress()">
                                        <label class="text-gray-700 text-sm font-bold mb-2 " for="inlineRadio2" >No</label>
                                    </div>
                                </div>
                                @else                                                
                                    <div class="flex">
                                        <div class="">
                                            <input type="radio" name="delivery" id="inlineRadio3" value="1" onclick="enableAddress()">
                                            <label class="text-gray-700 text-sm font-bold mb-2 " for="inlineRadio3">Si</label>
                                        </div>
                                        <div class="mx-5">
                                            <input checked type="radio" name="delivery" id="inlineRadio4" value="0" onclick="disableAddress()">
                                            <label class="text-gray-700 text-sm font-bold mb-2" for="inlineRadio4" >No</label>
                                        </div>
                                    </div>
                                @endif
                                <x-input-error :messages="$errors->get('delivery')"/>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="address" class="block text-sm font-bold leading-4 text-gray-900" id="addressLabel">Address</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                        <input type="text" name="address" id="address" 
                                            autocomplete="address" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                            placeholder="Example: address 1111" value="{{old('address')}}">
                                    </div>
                                    <x-input-error :messages="$errors->get('address')"/>
                                </div>
                            </div>

                           

                            <div class="sm:col-span-4">
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

                            <div class="sm:col-span-4">
                                <label class="block text-gray-700 text-sm font-bold mt-2" for="delivery_date">
                                    {{__('Delivery date')}}
                                </label>
                                <input required class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        type="datetime-local" name="delivery_date" id="delivery_date" 
                                        value="{{ old('delivery_date') ? \Carbon\Carbon::parse(old('delivery_date'))->format('Y-m-d\TH:i') : '' }}">
                                <x-input-error :messages="$errors->get('delivery_date')"/>
                            </div>

                        </div>
                        
                        
                        <div class="mt-4">

                            <h2 class="font-bold text-2xl">PRODUCTS</h2>
                            <div class="grid lg:gap-x-2 lg:gap-y-4 lg:grid-cols-3 sm:gap-y-2 sm:grid-cols-1  w-full">
                                @foreach ($products as $product)
                                <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow text-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$product->name}}</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">{{$product->price}}.</p>
                                </div>
                                @endforeach
                             
                            </div>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    

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
</script>