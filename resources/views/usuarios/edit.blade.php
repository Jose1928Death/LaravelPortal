<x-plantilla>
    <x-slot name="contenido">
        <x-error/>
        <form name="form" method="POST" action="{{route('usuario.update', $usuario)}}" class="p-2 text-light">
            @csrf
            @method("PUT")
            @bind($usuario)
            <x-form-input name="nomusu" label="Usuario"/>
            <x-form-input name="mail" label="Email"/>
            <x-form-input name="localidad" label="Localidad"/>
            <x-form-select name="perfil_id" :options="$perfils" label="Perfil"/>

            <button type="submit" class="btn btn-success mt-4"><i class="fas fa-pen"></i> Actualizar</button>
            <a href="{{route("usuario.index")}}" class="btn btn-info mt-4"><i class="fas fa-undo-alt"></i> Volver</a>
        </form>
    </x-slot>
</x-plantilla>
