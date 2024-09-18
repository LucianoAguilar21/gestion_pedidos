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

                    <form action="">
                    

                   
                        <div class="grid lg:gap-x-2 lg:gap-y-4 lg:grid-cols-3 sm:gap-y-2 sm:grid-cols-1  w-full">
                            @foreach ($products as $product)
                                <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow text-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$product->name}}</h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">{{$product->price}}.</p>
                                </div>
                            @endforeach
                            {{-- <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Noteworthy technology acquisitions 2021</h5>
                                <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                            </div> --}}
                            
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>

</x-app-layout>