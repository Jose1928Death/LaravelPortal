<x-plantilla>
    <x-slot name="contenido">
        <x-error/>
        <form name="form" method="POST" action="{{route('perfil.store')}}" class="p-2 text-light">
            @csrf
            <x-form-input name="nombre" label="Nombre"/>
            <x-form-input name="descripcion" label="Descripcion"/>

            <button type="submit" class="btn btn-success mt-4"><i class="fas fa-plus"></i> Crear</button>
            <button type="reset" class="btn btn-warning mt-4"><i class="fas fa-edit"></i>Resetear</button>
            <a href="{{route("perfil.index")}}" class="btn btn-info mt-4"><i class="fas fa-undo-alt"></i> Volver</a>
        </form>
    </x-slot>
</x-plantilla>
