<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">                    
                    {{$customer->name}} <br>
                    {{$customer->last_name}} <br>

                    <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-customer-deletion')"                        
                    >{{ __('Delete') }}</x-danger-button>


                    <x-modal name="confirm-customer-deletion"  focusable>
                        <form method="post" action="{{route('customers.destroy',$customer)}}" class="p-6">
                            @csrf
                            @method('delete')
                
                            <h2 class="text-lg font-medium text-black uppercase">
                                {{ __('¿Are you sure you want to delete this customer?') }}
                            </h2>
                
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Customer data will be permanently deleted from your account.') }}
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
