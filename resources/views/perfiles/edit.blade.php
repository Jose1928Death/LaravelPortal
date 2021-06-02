<x-plantilla>
    <x-slot name="contenido">
        <x-error/>
        <form name="form" method="POST" action="{{route('perfil.update', $perfil)}}" class="p-2 text-light">
            @csrf
            @method("PUT")
            @bind($perfil)
            <x-form-input name="nombre" label="Nombre"/>
            <x-form-input name="descripcion" label="Descripcion"/>

            <button type="submit" class="btn btn-success mt-4"><i class="fas fa-pen"></i> Actualizar</button>
            <a href="{{route("perfil.index")}}" class="btn btn-info mt-4"><i class="fas fa-undo-alt"></i> Volver</a>
        </form>
    </x-slot>
</x-plantilla>
