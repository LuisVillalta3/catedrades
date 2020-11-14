<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
      table {
        width: 100% !important;
      }
      tr,
      td,
      th {
        border-bottom: 2px solid #252f3f !important;
        text-align: left !important;
      }
    </style>
  </head>
  <body class="font-sans antialiased">
    <!-- Page Heading -->
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="inline-flex justify-between w-full">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>{{ $name }}</b>
          </h2>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <main>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <table class="table-auto w-full">
                <thead>
                  <tr style="border-bottom: 1px solid #252f3f !important;">
                    @foreach ($headers as $header)
                      <th class="px-4 py-2">{{ $header }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach ($elements as $item)
                    <tr style="border-bottom: 1px solid #252f3f !important;">
                      @foreach ($select as $el)
                        <td class="border px-4 py-2">{{ $item->$el }}</td>
                      @endforeach
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </main>
  </body>
</html>
