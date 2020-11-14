<div id="report-movements" class="modal">
  <form action="{{ route('exportar.movimientos.datos') }}" method="post">
    @csrf
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Descargar reporte de movimientos
    </h2>
    <br>
    <p class="font-semibold text-l text-gray-800 leading-tight">Formato</p>
    <input type="hidden" name="product" id="product" value>
    <div class="control">
      <input type="radio" id="pdf" name="ext" value="pdf" checked>
      <label for="pdf">PDF</label>
      <input type="radio" id="csv" name="ext" value="csv">
      <label for="csv">CSV</label>
      <input type="radio" id="xlsx" name="ext" value="xlsx">
      <label for="xlsx">XLSX</label>
    </div>
    <div class="control mt-4">
      <label class="font-semibold text-l text-gray-800 leading-tight" for="name">Nombre del archivo</label>
      <x-jet-input class="block mt-1 w-full" name="name" id="name" type="text" placeholder="Movimientos" />
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
      <input type="checkbox" name="by_date" id="by_date">
      <label class="font-semibold text-l text-gray-800 leading-tight" for="by_date">Filtrar por fecha</label>
    </div>
    <div class="control mt-4">
      <label class="font-semibold text-l text-gray-800 leading-tight" for="since">Desde</label>
      <input type="date" name="since" id="since">
    </div>
    <div class="control mt-4">
      <label class="font-semibold text-l text-gray-800 leading-tight" for="until">Hasta</label>
      <input type="date" name="until" id="until">
    </div>
    <div class="control mt-4">
      <button type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Descargar
      </button>
    </div>
  </form>
</div>
