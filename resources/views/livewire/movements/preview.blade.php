<div>
  <x-app-layout>
    <x-slot name="header">
      <div class="inline-flex justify-between w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Movimiento {{ $movement->id }}
        </h2>
      </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-10 px-4">
              <h3 class="font-semibold text-xl text-gray-800 leading-tight py-2">
                Tipo: <span style="color: {{ $movement->type ? 'green' : 'red' }}">{{ $movement->type ? 'Entrada' : 'Salida' }}</span>
              </h3>
              <h3 class="font-semibold text-xl text-gray-800 leading-tight py-2">
                Fecha: {{ $movement->created_at }}
              </h3>
              <h3 class="font-semibold text-xl text-gray-800 leading-tight py-2">
                Producto:
                <span style="color: blue">{{ $movement->product->name }}</span>
              </h3>
              <h3 class="font-semibold text-xl text-gray-800 leading-tight py-2">
                Cantidad: {{ $movement->qty }}
              </h3>
              <h3 class="font-semibold text-xl text-gray-800 leading-tight py-2">
                Coste: ${{ $movement->cost }}
              </h3>
              <h3 class="font-semibold text-l text-gray-800 leading-tight py-2">
                <span class="text-xl">{{ $movement->type ? 'Bodega de destino' : 'Bodega de entrada' }}:</span>
                <br>
                &nbsp;&nbsp;<b>{{ $movement->cellar->name }}</b> - {{ $movement->cellar->ubication }}
              </h3>
              <h3 class="font-semibold text-l text-gray-800 leading-tight py-2">
                <span class="text-xl">{{ $movement->type ? 'Proveedor de destino' : 'Proveedor de entrada' }}:</span>
                <br>
                &nbsp;&nbsp;<b>{{ $movement->provider->name }}:</b>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;{{ $movement->provider->email }} - {{ $movement->provider->phone }} - {{ $movement->provider->ubication }}
              </h3>
              <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                  Ver movimientos
                </x-jet-button>
                <x-jet-button wire:click='downloadMovement' class="ml-4">
                  Descargar
                </x-jet-button>
            </div>
            </div>
        </div>
    </div>
  </x-app-layout>
</div>
