<x-plantilla>
    <x-slot name="contenido">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title"><b>Nombre: </b>{{$perfil->nombre}}</h5>
              <p class="card-text"><b>Descripcion: </b>{{$perfil->descripcion}}</p>
              <p class="card-text"><b>Usuarios:</b>
                <small class="text-muted">
                <ul>
                    @foreach ($perfil->usuarios as $item)
                        <li>{{$item->nomusu}}</li>
                    @endforeach
                </ul>
                </small>
                <a href="{{route('perfil.index')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Volver</a>
            </p>
            </div>
          </div>
    </x-slot>
</x-plantilla>
