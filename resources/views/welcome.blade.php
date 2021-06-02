<x-plantilla>
    <x-slot name="contenido">
        <div class="grid grid-cols-2">
            <div class="col-md-12 text-center">
                <a href="{{route('usuario.index')}}" class='btn btn-dark my-3'>Usuarios</a>
                <a href="{{route('perfil.index')}}" class='btn btn-dark my-3'>Perfiles</a>
            </div>
        </div>
    </x-slot>
</x-plantilla>
