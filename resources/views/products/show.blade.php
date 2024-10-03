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
                    {{$product->name}} <br>
                    {{$product->price}} <br>

                    <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion')"                        
                    >{{ __('Delete') }}</x-danger-button>


                    <x-modal name="confirm-product-deletion"  focusable>
                        <form method="post" action="{{route('products.destroy',$product)}}" class="p-6">
                            @csrf
                            @method('delete')
                
                            <h2 class="text-lg font-medium text-black uppercase">
                                {{ __('¿Are you sure you want to delete this product?') }}
                            </h2>
                
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Product data will be permanently deleted from your account.') }}
                            </p>
                
                            <div class="mt-6">                    
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>
                
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                
                                <x-danger-button class="ms-3">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
