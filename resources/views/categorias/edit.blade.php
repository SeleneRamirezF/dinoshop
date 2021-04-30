{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Formulario Editar Libro' }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-2 w-4/5">

        <form action="{{ route('libros.update', $libro) }}" name="nLibro" method="POST">
            @csrf
            @method('PUT')
            @bind($libro)

            <x-form-input name="titulo" label="Titulo" placeholder="Titulo" />
            <x-form-textarea name="sinopsis" placeholder="Sinopsis" />
            <x-form-input name="stock" label="Stock" placeholder="Stock" type="number" step="1" min='0' />

            <label class="block mt-4">
                <span class="text-gray-700">Tema del Libro</span>
                <select class="form-select mt-1 block w-full" name="tema_id">
                    @foreach ($temas as $item)
                        @if ($libro->tema->id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nombre }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endif
                    @endforeach
                </select>
            </label>

            <x-form-submit><i class="fas fa-edit"></i> Editar Libro</x-form-submit>


        </form>
    </div>
</x-app-layout> --}}
