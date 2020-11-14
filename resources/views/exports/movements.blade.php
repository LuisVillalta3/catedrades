
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
      <th>Fecha de eliminación</th>
    </tr>
  </thead>
  <tbody>
    @foreach($elements as $movement)
      <tr>
        <td>{{ $movement->created_at }}</td>
        <td>{{ $movement->type == 1 ? 'Entrada' : 'Salida' }}</td>
        <td>{{ $movement->product->name ?? 'N/A' }}</td>
        <td>{{ $movement->qty }}</td>
        <td>{{ $movement->cost }}</td>
        <td>{{ $movement->provider->name ?? 'N/A' }}</td>
        <td>{{ $movement->cellar->name ?? 'N/A' }}</td>
        <td>{{ $movement->deleted_at }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
