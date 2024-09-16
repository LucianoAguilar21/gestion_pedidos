<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">                            
                <div class="p-6 text-gray-900 ">                
                    <a class="m-2 p-2 bg-gray-800 rounded text-white" href="{{ route('customers.create') }}">Add Customer</a>
                    <table class="table-auto my-2 w-full  ">
                        <thead>
                          <tr class="">
                            <th class="border border-slate-600 hidden lg:block">ID</th>
                            <th class="border border-slate-600">Name</th>
                            <th class="border border-slate-600">Lastname</th>
                            <th class="border border-slate-600">Phone</th>
                            <th class="hidden lg:block border border-slate-600">Created at</th>
                            <th class="border border-slate-600">Actions</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($customers as $customer)                                
                                <tr class="border-b border-gray-300">
                                    <td  class="hidden lg:block">{{$customer->id}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->last_name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td class="hidden lg:block">{{$customer->created_at}}</td>
                                    <td class="text-center">                          
                                        <a class="bg-green-500 text-white px-1 rounded" href="{{route('customers.show',$customer)}}"><i class="fa-solid fa-eye"></i></a>                                    
                                        <a class="text-gray-600 px-1 rounded" href="{{route('customers.edit',$customer)}}"><i class="fa-solid fa-pen-to-square"></i></a>                                    
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
