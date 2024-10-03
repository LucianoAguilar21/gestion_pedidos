<x-app-layout>
    <x-slot name="header">
        <a href="{{ url()->previous() }}"><i class="fa-solid fa-left-long border-2 rounded-full p-2 mb-2"></i></a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">                    
                    
                    <form action="{{route('products.update',$product)}}" method="POST">
                        @csrf @method('PUT')               
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="productName" class="block text-sm font-medium leading-4 text-gray-900">Product Name</label>
                                <div class="mt-2">
                                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                    <input type="text" name="name" id="name" 
                                        autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                        placeholder="{{$product->name ?? old('name')}}" value="{{$product->name ?? old('name')}}">

                                    </div>
                                    <x-input-error :messages="$errors->get('name')"/>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="productPrice" class="block text-sm font-medium leading-4 text-gray-900">Product Price</label>
                                <div class="mt-2">
                                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">                                    
                                    <input type="number" name="price" id="price" 
                                        autocomplete="price" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="{{$product->price ?? old('name')}}" value="{{$product->price ?? old('name')}}">
                                </div>
                                    <x-input-error :messages="$errors->get('price')"/>
                                </div>
                            </div>
                        </div>
                                          
                         <x-primary-button class="mt-2"
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-product-update')"                        
                        >{{ __('Update') }}</x-primary-button>

                        <x-modal name="confirm-product-update"  focusable >
                            <div class="p-6">

                                <h2 class="text-lg font-medium text-black uppercase">
                                    {{ __('¿Are you sure you want to update this product?') }}
                                </h2>
                                
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Product data will be permanently updated from your account.') }}
                                </p>
                                
                                <div class="mt-6">                    
                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                    </div>
                                    
                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>
                                    
                                    <x-primary-button class="ms-3">
                                        {{ __('Confirm') }}
                                    </x-primary-button>
                                </div>
                            </div>
                            
                        </x-modal>


                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
