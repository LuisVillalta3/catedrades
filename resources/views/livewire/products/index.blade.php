<div>
  <x-app-layout>
    <x-slot name="header">
      <div class="inline-flex justify-between w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Productos
        </h2>
        <div>
          @can('index_report')
            <x-jet-dropdown>
              <x-slot name="trigger">
                <button
                    class="bg-transparent hover:bg-blue-500 mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: blue; border-color: blue;">
                      Descargar reporte
                </button>
              </x-slot>

              <x-slot name="content">
                <x-jet-dropdown-link href="{{ route('productos.exportar') }}">
                  productos
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('productos.exportar.todos') }}">
                  productos /c papelera
                </x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('productos.exportar.trash') }}">
                  productos eliminados
                </x-jet-dropdown-link>
              </x-slot>
            </x-jet-dropdown>
          @endcan
          @can('index_trash')
            <a href="{{ route('productos.trash') }}"
              class="bg-transparent hover:bg-blue-500 mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: red; border-color: red;">
                Ver papelera
            </a>
          @endcan
          @can('new_product')
            <a
              class="bg-transparent hover:bg-blue-500 mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: green; border-color: green;"
              href="{{ route('productos.new') }}">
              Nuevo
            </a>
          @endcan
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
                        @can('edit_product')
                          <a
                            href="{{ route('productos.editar', $item->id) }}"
                            class="bg-transparent hover:bg-blue-500 mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: blue; border-color: blue;">
                            Editar
                          </a>
                        @endcan
                        @can('destroy_product')
                          <button wire:click="destroy({{ $item->id }})" class="bg-transparent hover:bg-blue-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: red; border-color: red;">
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
