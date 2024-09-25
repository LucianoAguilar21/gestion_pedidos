<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">                            
                <div class="p-6 text-gray-900">   
        
                    <a class="m-4 p-2 bg-gray-800 rounded text-white" href="{{ route('orders.create') }}">Create order</a><br>         


                    @foreach ($orders as $order) 
                    <div class="sm:w-full  border rounded m-2 p-2">
                            <div class="w-full h-7 flex justify-between">
                                <div>
                                                  
                                    @switch($order->status)
                                        @case("new")
                                            <button class="text-gray-800 rounded-full bg-[#daf204] uppercase px-1 py-1 text-sm font-bold transition ease-in-out duration-300  hover:scale-110 status-btn" data-id="{{ $order->id }}" >{{__($order->status)}}</button>
                                            @break

                                        @case("pending")
                                            <button class="text-gray-800 rounded-full bg-[#ffcc00] uppercase px-1 py-1 text-sm font-bold transition ease-in-out duration-300  hover:scale-110 status-btn" data-id="{{ $order->id }}" >{{__($order->status)}}</button>
                                            @break
                                    
                                        @case("in_preparation")
                                            <button class="text-gray-100 rounded-full bg-[#007bff] uppercase px-1 py-1 text-sm font-bold transition ease-in-out duration-300  hover:scale-110 status-btn" data-id="{{ $order->id }}">{{__($order->status)}}</button>
                                            @break
            
                                        @case("in_delivery")
                                            <button class="text-gray-100 rounded-full bg-[#17a2b8] uppercase px-1 py-1 text-sm font-bold transition ease-in-out duration-300  hover:scale-110 status-btn" data-id="{{ $order->id }}">{{__($order->status)}}</button>
                                            @break
                                        
                                        @case("delivered")
                                            <button class="text-gray-100 rounded-full bg-[#1ca39e] uppercase px-1 py-1 text-sm font-bold transition ease-in-out duration-300  hover:scale-110 status-btn" data-id="{{ $order->id }}">{{__($order->status)}}</button>
                                            @break

                                        @case("cancelled")
                                            <button class="text-gray-100 rounded-full bg-[#ff4d4f] uppercase px-1 py-1 text-sm font-bold transition ease-in-out duration-300  hover:scale-110 status-btn" data-id="{{ $order->id }}">{{__($order->status)}}</button>
                                            @break
            
                                    @endswitch                        
                                 
                                </div>
                                <a class="bg-green-500 text-white p-1 rounded" href="{{route('orders.show',$order)}}"><i class="fa-solid fa-eye"></i></a>
                            </div>
                                
                                @unless($order->created_at->eq($order->updated_at))
                                    <small class="text-sm text-gray-800"> &middot; {{ __('Edited') }}</small><br>                           
                                @endunless
                               
                                <small class="text-sm text-gray-600">{{'Fecha :' . \Carbon\Carbon::parse($order->created_at)->isoFormat('D/MM/ YY H:mm:ss') }}</small>                                    
                                   
                                <p class="text-sm text-gray-800 font-semibold ">
                                    <span class="text-gray-600 text-sm font-normal">{{__('Customer')}}:</span> {{!is_null($order->customer) ? $order->customer->name . " ".$order->customer->last_name : $order->customer_name}}
                                </p>
                                        
                            
                                @if ($order->delivery)
                                    <small >
                                        <span class="text-sm text-gray-600 ">Entrega:</span> <span class="text-gray-800 text-sm font-semibold">{{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm [hs]') }}</span>
                                    </small>
                                    <br>
                                    <small >
                                        <span class="text-sm text-gray-600 ">Direccion:</span><span class="text-gray-800 text-sm break-words font-semibold"> {{ $order->delivery_address }} </span>
                                    </small>
                                    <br>
                                    
                                    <small >
                                        <span class="text-sm text-gray-600 ">Precio envío:</span> <span class="text-gray-800 text-sm font-semibold">$ {{ $order->delivery_cost }}</span>
                                    </small>
                                    <br>
                                    
                            
                                @else
                                    <small class="flex">
                                        <span class="text-sm text-gray-800">Retira: </span><span class="text-gray-800  text-sm font-semibold"> {{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm [hs]') }}</span>
                                    </small>
                                    
                                @endif
                                
                                <div class="sm:w-full lg:w-1/3">
                                    @foreach($order->orderItems as $item)
                                   
                                    <div class="text-sm mx-2 w-68">
                                        {{$item->quantity}} - {{$item->product->name}}<span class="float-end">{{$item->product->price}}</span>                                 
                                        <div> <span class="ms-5">Subtotal:</span> <span class="float-end">{{$item->sub_total}}</span></div>

                                    </div>                                
                                    @endforeach                                
                                </div>  
                        
                        
                        <p class="mt-2 text-base text-gray-800 font-bold">Total: <span class="text-gray-600 text-base font-bold underline">${{$order->total}}</p><span>
                            
                    </div>
                    @endforeach              
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.status-btn').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.dataset.id;
                const button = this;
    
                fetch(`/orders/${orderId}/status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Token de seguridad
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        // Cambiar el texto del botón al nuevo estado
                        button.textContent = data.status;
    
                        // Cambiar el color de fondo según el nuevo estado
                        switch (data.status) {
                            case 'new':
                                button.style.backgroundColor = '#daf204';  // Color para 'new'
                                button.style.color = '#000';  // Texto negro para 'new'
                                break;
                            case 'pending':
                                button.style.backgroundColor = '#ffcc00';  // Color para 'pending'
                                button.style.color = '#000';  // Texto negro para 'pending'
                                break;
                            case 'in_preparation':
                                button.style.backgroundColor = '#007bff';  // Color para 'in_preparation'
                                button.style.color = '#fff';  // Texto blanco para 'in_preparation'
                                break;
                            case 'in_delivery':
                                button.style.backgroundColor = '#17a2b8';  // Color para 'in_delivery'
                                button.style.color = '#fff';  // Texto blanco para 'in_delivery'
                                break;
                            case 'delivered':
                                button.style.backgroundColor = '#1ca39e';  // Color para 'delivered'
                                button.style.color = '#fff';  // Texto blanco para 'delivered'
                                break;
                            case 'cancelled':
                                button.style.backgroundColor = '#ff4d4f';  // Color para 'cancelled'
                                button.style.color = '#fff';  // Texto blanco para 'cancelled'
                                break;
                            default:
                                button.style.backgroundColor = '#f8f9fa';  // Color por defecto
                                button.style.color = '#000';  // Texto negro por defecto
                                break;
                        }
                    } else {
                        alert('No more status changes allowed.');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</x-app-layout>
