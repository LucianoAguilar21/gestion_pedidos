<x-app-layout>
    <x-slot name="header">
        <a href="{{ url()->previous() }}"><i class="fa-solid fa-left-long border-2 rounded-full p-2 mb-2"></i></a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Details') }}
        </h2>
    </x-slot>

   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">                            
                <div class="p-6 text-gray-900"> 

                    <div class="sm:w-full  m-2 p-2">
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
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>