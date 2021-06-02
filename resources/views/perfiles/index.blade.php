<x-plantilla>
    <x-slot name="contenido">
        <x-mensaje/>
        <a href="{{route('perfil.create')}}" class="btn btn-success mb-2"><i class="fas fa-user-plus"></i> Crear perfil</a>
        <div class="grid grid-cols-2">
            <div class="col-md-12 text-center">
                <table class="table table-dark table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Contenido</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col-2">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($perfil as $item)
                        <tr>
                            <th scope="row">
                                <a href="{{route('perfil.show', $item)}}" class="btn btn-info"><i class="fas fa-info"></i> Info</a>
                            </th>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>
                                <a href="{{route('perfil.edit', $item)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                <form name="delete" method="POST" action="{{route('perfil.destroy', $item)}}">
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
                    {{$perfil->links()}}
                </div>
            </div>
        </div>
    </x-slot>
</x-plantilla>
