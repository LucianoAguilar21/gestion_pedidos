<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">                            
                <div class="p-6 text-gray-900 ">                
                    <a class=" p-2 bg-gray-800 rounded text-white" href="{{ route('products.create') }}">Create Product</a>
                    <table class="table-auto mt-4 w-full  ">
                        <thead>
                          <tr class="">
                            <th class="border border-slate-600 hidden lg:block">ID</th>
                            <th class="border border-slate-600">Name</th>
                            <th class="border border-slate-600">Price</th>
                            <th class="hidden lg:block border border-slate-600">Created at</th>
                            <th class="border border-slate-600">Actions</th>
                          </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($products as $product)                                
                                <tr class="border-b border-gray-300">
                                    <td  class="hidden lg:block">{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>${{$product->price}}</td>
                                    <td class="hidden lg:block">{{$product->created_at}}</td>
                                    <td class="text-center">                          
                                        <a class="bg-green-500 text-white px-1 rounded" href="{{route('products.show',$product)}}"><i class="fa-solid fa-eye"></i></a>                                    
                                        <a class="text-gray-600 px-1 rounded" href="{{route('products.edit',$product)}}"><i class="fa-solid fa-pen-to-square"></i></a>                                    
                                    </td>
                                   
                                </tr>
                               
                            @endforeach

                           
                        </tbody>
                      </table>                                      
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
