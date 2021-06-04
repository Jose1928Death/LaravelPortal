<x-plantilla>
    <x-slot name="contenido">
        <x-mensaje/>
        <a href="{{route('usuario.create')}}" class="btn btn-success mb-2"><i class="fas fa-user-plus"></i> Crear usuario</a>
        <div class="grid grid-cols-2">
            <div class="col-md-12 text-center">
                <table class="table table-dark table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Detalles</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Email</th>
                        <th scope="col">Localidad</th>
                        <th scope="col-2">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuario as $item)
                        <tr>
                            <th scope="row">
                                <a href="{{route('usuario.show', $item)}}" class="btn btn-info"><i class="fas fa-info"></i> Info</a>
                            </th>
                            <td>{{$item->nomusu}}</td>
                            <td>{{$item->mail}}</td>
                            <td>{{$item->localidad}}</td>
                            <td>
                                <a href="{{route('usuario.edit', $item)}}" class="btn btn-warning"><i class="fas fa-user-edit"></i> Editar</a>
                                <form name="delete" method="POST" action="{{route('usuario.destroy', $item)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
                                </form>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="mt-2">
                      {{$usuario->links()}}
                  </div>
            </div>
            <a href="{{route('perfil.index')}}" class="btn btn-primary mb-2"><i class="fas fa-table"></i> Tabla perfiles</a>
        </div>
    </x-slot>
</x-plantilla>
