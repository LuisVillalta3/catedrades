<div>
  <x-app-layout>
    <x-slot name="header">
      <div class="inline-flex justify-between w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Productos
        </h2>
        <div>
          @can('clear_trash')
            <button wire:click='destroyAll'
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: red; border-color: red;">
                Limpiar todo
            </button>
          @endcan
          @can('recovery_trash')
            <button wire:click='recoveryAll'
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: green; border-color: green;">
              Recuper todos
            </button>
          @endcan
          <a
            class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: blue; border-color: blue;"
            href="{{ route('productos') }}">
            Ver productos
          </a>
        </div>
      </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <table class="table-auto w-full">
                <thead>
                  <tr>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Inventario</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Precio</th>
                    <th>Acciones</th>
                  </tr>
                  <tr>
                    <th class="px-4 py-2">
                      <x-jet-input wire:model="name" class="block mt-1 w-full" type="text" />
                    </th>
                    <th class="px-4 py-2">&nbsp;</th>
                    <th class="px-4 py-2">&nbsp;</th>
                    <th class="px-4 py-2">&nbsp;</th>
                    <th class="px-4 py-2">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($elements as $item)
                    <tr>
                      <td class="border px-4 py-2">{{ $item->name }}</td>
                      <td class="border px-4 py-2">{{ $item->stock }}</td>
                      <td class="border px-4 py-2">{{ $item->description }}</td>
                      <td class="border px-4 py-2">${{ $item->price }}</td>
                      <td class="border px-4 py-2 inline-flex justify-between">
                        @can('recovery_trash')
                          <button wire:click='recovery({{ $item->id }})'
                            class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: green; border-color: green;">
                            Recuperar
                          </button>
                        @endcan
                        @can('destroy_trash')
                          <button wire:click="destroy({{ $item->id }})" class="bg-transparent  text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: red; border-color: red;">
                            Eliminar
                          </button>
                        @endcan
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $elements->links() }}
            </div>
        </div>
    </div>
  </x-app-layout>
</div>
