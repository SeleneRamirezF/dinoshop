{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Formulario Libros' }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-2 w-4/5">

        <form action="{{ route('libros.store') }}" name="libro" method="POST">
            @csrf
            <x-form-input name="titulo" label="Titulo" placeholder="Titulo"/>
            <x-form-textarea name="sinopsis" placeholder="Sinopsis"/>
            <x-form-input name="stock" label="Stock" placeholder="Stock" type="number" step="1" min='0'/>

            <label class="block mt-4">
                <span class="text-gray-700">Tema del Libro</span>
                <select class="form-select mt-1 block w-full" name="tema_id">
                  @foreach ($temas as $item)
                      <option value="{{$item->id}}">{{$item->nombre}}</option>
                  @endforeach
                </select>
              </label>

              <x-form-submit><i class="fas fa-plus"></i> Nuevo Libro</x-form-submit>


        </form>
    </div>
</x-app-layout> --}}
