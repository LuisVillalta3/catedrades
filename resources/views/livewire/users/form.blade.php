<div>
  <x-app-layout>
    <x-slot name="header">
      <div class="inline-flex justify-between w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <a href="{{ route('usuarios') }}">
            Usuarios
          </a>
        </h2>
      @if ($user->id)
        <div>
          @unless (Auth::id() == $user->id)
            @can('destroy_user')
              <button wire:click="destroy" class="bg-transparent hover:bg-blue-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: red; border-color: red;">
                Eliminar
              </button>
            @endcan
          @endunless
          @can('new_user')
            <a
              class="bg-transparent hover:bg-blue-500 mr-5 text-red-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="color: green; border-color: green;"
              href="{{ route('usuarios.new') }}">
              Nuevo
            </a>
          @endcan
        </div>
      @endif
      </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <form wire:submit.prevent="save" class="py-10 px-4" novalidate>
                <div>
                    <x-jet-label value="Nombre" />
                    @unless ($user->id)
                      <x-jet-input class="block mt-1 w-full" type="text" wire:model="user.name" autofocus />
                    @else
                      <x-jet-input class="block mt-1 w-full" type="text" wire:model="user.name" readonly />
                    @endunless
                    @error('user.name') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                  <x-jet-label value="Correo" />
                  @unless ($user->id)
                    <x-jet-input class="block mt-1 w-full" wire:model="user.email" type="email" />
                  @else
                    <x-jet-input class="block mt-1 w-full" wire:model="user.email" type="email" readonly />
                  @endunless
                  @error('user.email') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                  <small>Todas las contraseñas al momento de ser creadas serán <b>Password</b></small>
                </div>

                <div class="mt-4">
                  <x-jet-label value="Rol" />
                  <select wire:model="rol">
                    @foreach ($roles as $item)
                      <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4">
                        Guardar
                    </x-jet-button>
                </div>
              </form>
            </div>
        </div>
    </div>
  </x-app-layout>
</div>
