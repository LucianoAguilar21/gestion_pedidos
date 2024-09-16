<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('customers.store') }}" method="POST">
                        @csrf                    
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="Name" class="block text-sm font-medium leading-4 text-gray-900">Customer Name</label>
                                <div class="mt-2">
                                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                    <input type="text" name="name" id="name" 
                                        autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                        placeholder="Example: Jose" value="{{old('name')}}">

                                    </div>
                                    <x-input-error :messages="$errors->get('name')"/>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="lastname" class="block text-sm font-medium leading-4 text-gray-900">Customer Lastname</label>
                                <div class="mt-2">
                                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                    <input type="text" name="lastname" id="lastname" autocomplete="lastname" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                    placeholder="Example: Rodriguez" value="{{old('lastname')}}"">
                                </div>
                                    <x-input-error :messages="$errors->get('lastname')"/>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="phone" class="block text-sm font-medium leading-4 text-gray-900">Customer phone</label>
                                <div class="mt-2">
                                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                    <input type="text" name="phone" id="phone" autocomplete="phone" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                    placeholder="number phone" value="{{old('phone')}}"">
                                </div>
                                    <x-input-error :messages="$errors->get('phone')"/>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="email" class="block text-sm font-medium leading-4 text-gray-900">Customer email (OPTIONAL)</label>
                                <div class="mt-2">
                                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                    <input type="text" name="email" id="email" autocomplete="email" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                    placeholder="Exampe: jose@gmail.com" value="{{old('email')}}"">
                                </div>
                                    <x-input-error :messages="$errors->get('phone')"/>
                                </div>
                            </div>
                        </div>
                        
                        <button class="rounded bg-gray-800 p-2 text-white mt-2 m-auto" type="submit">Add new customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>