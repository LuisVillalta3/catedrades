<div>
  <x-app-layout>
    <x-slot name="header">
      <div class="inline-flex justify-between w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <a href="{{ route('movimientos') }}">
            Movimientos
          </a>
        </h2>
      @if ($movement->id)
        <div>
          @can('destroy_move')
            <button wire:click="destroy" class="bg-transparent hover:bg-blue-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: red; border-color: red;">
              Eliminar
            </button>
          @endcan
          @can('new_move')
            <a
              class="bg-transparent hover:bg-blue-500 mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: green; border-color: green;"
              href="{{ route('movimientos.new') }}">
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
                @if ($minavailble)
                  <div class="errors-group">
                    La cantidad a retirar debe ser menor a la disponible en inventario
                  </div>
                @endif
                <div>
                    <x-jet-label value="Tipo" />
                    <label class="switch">
                      <input type="checkbox" wire:model="movement.type">
                      <span class="slider"></span>
                    </label>
                    <div class="result">{{ ($movement->type || $movement->type == 1) ? 'Entrada' : 'Salida'  }}</div>
                    @error('movement.type') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                  <x-jet-label value="Cantidad" />
                  <x-jet-input class="block mt-1 w-full" wire:model="movement.qty" type="text" />
                  @error('movement.qty') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                  <x-jet-label value="Costo ($)" />
                  <x-jet-input class="block mt-1 w-full" wire:model="movement.cost" type="text" />
                  @error('movement.cost') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                  <x-jet-label value="Producto" />
                  <select wire:model="movement.product_id">
                    <option value>-- Seleccione --</option>
                    @foreach ($products as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                  @error('movement.product_id') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                  <x-jet-label value="Producto" />
                  <select wire:model="movement.cellar_id">
                    <option value>-- Seleccione --</option>
                    @foreach ($cellars as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                  @error('movement.cellar_id') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                  <x-jet-label value="Producto" />
                  <select wire:model="movement.provider_id">
                    <option value>-- Seleccione --</option>
                    @foreach ($providers as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                  @error('movement.provider_id') <span class="error" style="color: red;">{{ $message }}</span> @enderror
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
