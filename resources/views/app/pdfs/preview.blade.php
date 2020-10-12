<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    </head>
    <body class="font-sans antialiased">
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                  <div class="inline-flex justify-between w-full">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                      Movimiento {{ $movement->id }}
                    </h2>
                  </div>
                </div>
            </header>

            <!-- Page Content -->
            <main>
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
                    </div>
                </div>
            </div>
            </main>
        </div>
    </body>
</html>
