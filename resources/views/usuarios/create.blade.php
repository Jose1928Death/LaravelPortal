<x-plantilla>
    <x-slot name="contenido">
        <x-error/>
        <form name="form" method="POST" action="{{route('usuario.store')}}" class="p-2 text-light">
            @csrf
            <x-form-input name="nomusu" label="Usuario"/>
            <x-form-input name="mail" label="Email"/>
            <x-form-input name="localidad" label="Localidad"/>
            <x-form-select name="perfil_id" :options="$perfils" label="Perfil"/>

            <button type="submit" class="btn btn-success mt-4"><i class="fas fa-plus"></i> Crear</button>
            <button type="reset" class="btn btn-warning mt-4"><i class="fas fa-edit"></i>Resetear</button>
            <a href="{{route("usuario.index")}}" class="btn btn-info mt-4"><i class="fas fa-undo-alt"></i> Volver</a>
        </form>
    </x-slot>
</x-plantilla>
