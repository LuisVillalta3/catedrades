<div>
  <x-app-layout>
    <x-slot name="header">
      <div class="inline-flex justify-between w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Productos
        </h2>
        <div>
          @can('index_report')
            <a href="#report" rel="modal:open"
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: blue; border-color: blue;">
                Descargar reporte
            </a>
          @endcan
          @can('index_trash')
            <a href="{{ route('productos.trash') }}"
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: red; border-color: red;">
                Ver papelera
            </a>
          @endcan
          @can('new_product')
            <a
              class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: green; border-color: green;"
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
                        @can('index_report')
                          <button
                            class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: #252f3f; border-color: #252f3f;">
                              Reportes
                          </button>
                        @endcan
                        @can('edit_product')
                          <a
                            href="{{ route('productos.editar', $item->id) }}"
                            class="bg-transparent  mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: blue; border-color: blue;">
                            Editar
                          </a>
                        @endcan
                        @can('destroy_product')
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

  <div id="report" class="modal">
    <form>
      @csrf
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Descargar reporte
      </h2>
      <br>
      <p class="font-semibold text-l text-gray-800 leading-tight">Formato</p>
      <div class="control">
        <input type="radio" id="pdf" name="format" value="pdf" checked>
        <label for="pdf">PDF</label>
        <input type="radio" id="csv" name="format" value="csv">
        <label for="csv">CSV</label>
        <input type="radio" id="xlsx" name="format" value="xlsx">
        <label for="xlsx">XLSX</label>
      </div>
      <div class="control mt-4">
        <label class="font-semibold text-l text-gray-800 leading-tight" for="name">Nombre del archivo</label>
        <x-jet-input class="block mt-1 w-full" name="name" id="name" type="text" placeholder="Productos" />
      </div>
      <div class="control mt-4">
        <label class="font-semibold text-l text-gray-800 leading-tight" for="content">Contenido</label>
        <select id="content" name="content">
          <option value="all">Todos</option>
          <option value="normal">Solo panel principal</option>
          <option value="trash">Solo papelera de reciclaje</option>
        </select>
      </div>
      <div class="control mt-4">
        <button type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Descargar
        </button>
      </div>
    </form>
  </div>
</div>
