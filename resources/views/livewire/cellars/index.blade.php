<div>
  <x-app-layout>
    <x-slot name="header">
      <div class="inline-flex justify-between w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Bodegas
        </h2>
        <div>
          @can('index_report')
            <a href="#report" rel="modal:open"
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: blue; border-color: blue;">
                Descargar reporte
            </a>
          @endcan
          @can('index_trash')
            <a href="{{ route('bodegas.trash') }}"
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: red; border-color: red;">
                Ver papelera
            </a>
          @endcan
          @can('new_cellar')
            <a
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: green; border-color: green;"
              href="{{ route('bodegas.new') }}">
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
                    <th class="px-4 py-2">Ubicación</th>
                    <th>Acciones</th>
                  </tr>
                  <tr>
                    <th class="px-4 py-2">
                      <x-jet-input wire:model="name" class="block mt-1 w-full" type="text" />
                    </th>
                    <th class="px-4 py-2">&nbsp;</th>
                    <th class="px-4 py-2">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($elements as $item)
                    <tr>
                      <td class="border px-4 py-2">{{ $item->name }}</td>
                      <td class="border px-4 py-2">{{ $item->ubication }}</td>
                      <td class="border px-4 py-2 inline-flex justify-between">
                        @can('edit_cellar')
                          <a
                            href="{{ route('bodegas.editar', $item->id) }}"
                            class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: blue; border-color: blue;">
                            Editar
                          </a>
                        @endcan
                        @can('destroy_cellar')
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

  @include('layouts.export_modal')
</div>
