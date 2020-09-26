<table>
  <thead>
    <tr>
      <th>Fecha de creación</th>
      <th>Tipo</th>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Costo</th>
      <th>Proveedor</th>
      <th>Bodega</th>
      @if ($trashed)
        <th>Fecha de eliminación</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach($movements as $movement)
      <tr>
        <td>{{ $movement->created_at }}</td>
        <td>{{ $movement->type == 1 ? 'Entrada' : 'Salida' }}</td>
        <td>{{ $movement->product->name ?? 'N/A' }}</td>
        <td>{{ $movement->qty }}</td>
        <td>{{ $movement->cost }}</td>
        <td>{{ $movement->provider->name ?? 'N/A' }}</td>
        <td>{{ $movement->cellar->name ?? 'N/A' }}</td>
        @if ($trashed)
          <td>{{ $movement->deleted_at }}</td>
        @endif
      </tr>
    @endforeach
  </tbody>
</table>
