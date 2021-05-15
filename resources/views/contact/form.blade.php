
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'CONTACTA CON NOSOTROS'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">
        <x-mensajes-alertas />
        <form name="create" method="POST" action="{{ route('contact.send') }}">
            @csrf
            <x-form-input name="subject" label="Escriba el motivo de su mensaje" placeholder="Asunto"/>
            <x-form-textarea name="mensaje" label="Consulta" placeholder="Escriba su consulta"/>
            <div class="flex justify-end">
                <x-form-submit>
                    <span class="text-white-900"><i class="far fa-paper-plane"></i> Enviar</span>
                </x-form-submit>
            </div>
        </form>
    </div>

</x-app-layout>
