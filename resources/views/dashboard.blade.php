<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div>
          <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
              <div class="mt-8 text-2xl">
                  Administrador de inventario
              </div>

              {{-- <div class="mt-6 text-gray-500">
                  Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                  to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                  you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                  ecosystem to be a breath of fresh air. We hope you love it.
              </div> --}}
          </div>

          <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
              <div class="p-6">
                  <div class="flex items-center">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                      <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('productos') }}">Productos</a></div>
                  </div>

                  <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-500">
                          Productos cargados <b>{{ $count_products }}</b>
                      </div>

                      <a href="{{ route('productos') }}">
                          <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                  <div>Ver productos</div>

                                  <div class="ml-1 text-indigo-500">
                                      <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-right w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                  </div>
                          </div>
                      </a>
                  </div>
              </div>

              <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                  <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                      <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('proveedores') }}">Proveedores</a></div>
                  </div>

                  <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-500">
                          Proveedores cargados <b>{{ $count_provider }}</b>
                      </div>

                      <a href="{{ route('proveedores') }}">
                          <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                  <div>Ver proveedores</div>

                                  <div class="ml-1 text-indigo-500">
                                      <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-right w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                  </div>
                          </div>
                      </a>
                  </div>
              </div>

              <div class="p-6 border-t border-gray-200">
                  <div class="flex items-center">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                      <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('bodegas') }}">Bodegas</a></div>
                  </div>

                  <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-500">
                          Número de bodegas {{ $count_bodegas }}
                      </div>

                      <a href="{{ route('bodegas') }}">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                <div>Ver bodegas</div>
    
                                <div class="ml-1 text-indigo-500">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-right w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div>
                        </div>
                    </a>
                  </div>
              </div>

              <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('movimientos') }}">Movimientos</a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Número de bodegas {{ $count_movements }}
                    </div>

                    <a href="{{ route('movimientos') }}">
                      <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                              <div>Ver Movimientos</div>
  
                              <div class="ml-1 text-indigo-500">
                                  <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-right w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                              </div>
                      </div>
                  </a>
                </div>
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</x-app-layout>
