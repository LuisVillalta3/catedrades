<div>
  <x-app-layout>
    <x-slot name="header">
      <div class="inline-flex justify-between w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Movimientos
        </h2>
        <div>
          @can('index_report')
            <a href="#report-movements" rel="modal:open" data-product="{{ null }}"
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: blue; border-color: blue;">
                Descargar reporte
            </a>
          @endcan
          @can('index_trash')
            <a href="{{ route('movimientos.trash') }}"
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: red; border-color: red;">
                Ver papelera
            </a>
          @endcan
          @can('new_move')
            <a
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: green; border-color: green;"
              href="{{ route('movimientos.new') }}">
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
                    <th class="px-4 py-2">Fecha de registro</th>
                    <th class="px-4 py-2">Tipo</th>
                    <th class="px-4 py-2">Producto</th>
                    <th class="px-4 py-2">Cantidad</th>
                    <th class="px-4 py-2">Costo</th>
                    <th class="px-4 py-2">Proveedor</th>
                    <th class="px-4 py-2">Bodega</th>
                    @can('destroy_move')
                      <th>Acciones</th>
                    @endcan
                  </tr>
                  <tr>
                    <th class="px-4 py-2">&nbsp;</th>
                    <th class="px-4 py-2">&nbsp;</th>
                    <th class="px-4 py-2">&nbsp;</th>
                    <th class="px-4 py-2">&nbsp;</th>
                    <th class="px-4 py-2">&nbsp;</th>
                    @can('destroy_move')
                      <th class="px-4 py-2">&nbsp;</th>
                    @endcan
                  </tr>
                </thead>
                <tbody>
                  @foreach ($elements as $item)
                    <tr>
                      <td class="border px-4 py-2">{{ $item->created_at }}</td>
                      <td class="border px-4 py-2">{{ $item->type == 1 ? 'Entrada' : 'Salida' }}</td>
                      <td class="border px-4 py-2">{{ $item->product->name ?? 'N/A' }}</td>
                      <td class="border px-4 py-2">{{ $item->qty }}</td>
                      <td class="border px-4 py-2">${{ $item->cost }}</td>
                      <td class="border px-4 py-2">{{ $item->provider->name ?? 'N/A' }}</td>
                      <td class="border px-4 py-2">{{ $item->cellar->name ?? 'N/A' }}</td>
                      @can('destroy_move')
                        <td class="border px-4 py-2 inline-flex justify-between">
                          <a
                            href="{{ route('movimientos.download', $item->id) }}"
                            class="bg-transparent  text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                            style="color: #252f3f; border-color: #252f3f;">
                            Reporte
                          </a>
                          <button wire:click="destroy({{ $item->id }})" class="bg-transparent  text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: red; border-color: red;">
                            Eliminar
                          </button>
                        </td>
                      @endcan
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $elements->links() }}
            </div>
        </div>
    </div>
  </x-app-layout>

  @include('layouts.export_movements')
</div>
