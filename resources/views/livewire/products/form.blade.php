<div>
  <x-app-layout>
    <x-slot name="header">
      <div class="inline-flex justify-between w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <a href="{{ route('productos') }}">
            Productos
          </a>
        </h2>
      @if ($product->id)
        <div>
          @can('destroy_product')
            <button wire:click="destroy" class="bg-transparent  text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: red; border-color: red;">
              Eliminar
            </button>
          @endcan
          @can('new_product')
            <a
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: green; border-color: green;"
              href="{{ route('productos.new') }}">
              Nuevo
            </a>
          @endcan
        </div>
      @endif
      </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <form wire:submit.prevent="save" class="py-10 px-4" novalidate>
                <div>
                    <x-jet-label value="Nombre" />
                    <x-jet-input class="block mt-1 w-full" type="text" wire:model="product.name" autofocus />
                    @error('product.name') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                  <x-jet-label value="Descripción" />
                  <x-jet-input class="block mt-1 w-full" wire:model="product.description" type="text" />
                  @error('product.description') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                  <x-jet-label value="Precio ($)" />
                  <x-jet-input class="block mt-1 w-full" wire:model="product.price" type="text" />
                  @error('product.price') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4">
                        Guardar
                    </x-jet-button>
                </div>
              </form>
            </div>
        </div>
    </div>
  </x-app-layout>
</div>
