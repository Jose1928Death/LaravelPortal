<x-plantilla>
    <x-slot name="contenido">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title"><b>Usuario: </b>{{$usuario->nomusu}}</h5>
              <p class="card-text"><b>Email: </b>{{$usuario->mail}}</p>
              <p class="card-text"><b>Localidad: </b>{{$usuario->localidad}}</p>
              <p class="card-text"><b>Perfil:</b>
                <small class="text-muted">
                    {{$usuario->perfil->nombre}}
                </small>
            </p>
            <a href="{{route('perfil.index')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Volver</a>
            </div>
          </div>
    </x-slot>
</x-plantilla>
