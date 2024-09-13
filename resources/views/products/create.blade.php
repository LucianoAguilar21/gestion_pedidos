<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf                    
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="productName" class="block text-sm font-medium leading-4 text-gray-900">Product Name</label>
                                <div class="mt-2">
                                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                    <input type="text" name="name" id="name" 
                                        autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                        placeholder="Example: Pizza" value="{{old('name')}}">

                                    </div>
                                    <x-input-error :messages="$errors->get('name')"/>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="productPrice" class="block text-sm font-medium leading-4 text-gray-900">Product Price</label>
                                <div class="mt-2">
                                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                    <input type="number" name="price" id="price" autocomplete="price" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                    placeholder="Example: 1000.0" value="{{old('price')}}"">
                                </div>
                                    <x-input-error :messages="$errors->get('price')"/>
                                </div>
                            </div>
                        </div>
                        
                        <button class="rounded bg-gray-800 p-2 text-white mt-2" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>