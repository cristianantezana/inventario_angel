@extends('panel')
@section('contenido')
    <section class="section">
    <div class="section-header">
        <h3 class="page__heading">Clientes Registrados</h3>
    </div>
    <div class="section-body">
        <input type="hidden" id="ruta" value="{{url('/')}}">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card mb-4">
                        <a type="button" href="{{route('clientes.create')}}" class="btn btn-info "  style=" color: white; font-weight: bold;">
                            Nuevo Clienteo <span><i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered mt-15 " id="table">
                                <thead style="background-color: #6777ef;">
                                    <th class="text-center" style="color: #fff;">ID</th>
                                    <th class="text-center" style="color: #fff;">NOMBRE</th>
                                    <th class="text-center" style="color: #fff;">APELLIDO</th>
                                    <th class="text-center" style="color: #fff;">CELULAR</th>
                                    <th class="text-center" style="color: #fff;">DIRECCCION</th>
                                    <th class="text-center" style="color: #fff;">NIT</th>
                                    <th class="text-center" style="color: #fff;">RAZON SOCIAL</th>
                                    <th class="text-center" style="color: #fff;">ACCIONES</th>
                                </thead>
                                <tbody>
                                    <?php $contador = 1?>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td class="text-center">{{$contador}}</td>
                                            <td class="text-center">{{$cliente->persona->nombre}}</td>
                                            <td class="text-center">{{$cliente->persona->apellido}}</td>
                                            <td class="text-center">{{$cliente->persona->celular}}</td>
                                            <td class="text-center">{{$cliente->persona->direccion}}</td>
                                            <td class="text-center">{{$cliente->nit}}</td>
                                            <td class="text-center">{{$cliente->razon_social}}</td>
                                            <td>
                                                <center>
                                                    <a href="#"  data-toggle="modal"
                                                    data-target="#editarCliente{{$cliente->cod_cliente}}" class="btn btn-warning btn-sm mx-2 editar" ><i class="fa fa-pencil "></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm  mx-2 eliminarCliente" action="{{ url('clientes/destroy',$cliente->cod_cliente) }}"
                                                        method="DELETE" token="{{ csrf_token() }}" pagina="clientes">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </center>
                                            </td>
                                        </tr>
                                            {{-- modal para editar --}}
                                            <div class="modal fade" id="editarCliente{{$cliente->cod_cliente}}" tabindex="-1"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-header-warning">
                                                    <h4 class="modal-title" id="exampleModalLabel">EDITAR CLIENTE</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <form action="{{url('clientes/update', $cliente->cod_cliente)}}" method="POST">
                                                    @method('PUT')
                                                        @csrf
                                                    <input type="text" hidden value="{{$cliente->persona->cod_persona}}" name="cod_persona">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                        <div class="form-group col-6"> 
                                                            <label for="nombre">Nombre</label>
                                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cliente->persona->nombre}}" required>
                                                        </div>
                                                        <div class="form-group col-6"> 
                                                            <label for="apellido">Apellido</label>
                                                            <input type="text" value="{{$cliente->persona->apellido}}" class="form-control" id="apellido" name="apellido">
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="form-group col-6"> 
                                                            <label for="celular">Celular</label>
                                                            <input type="number" value="{{$cliente->persona->celular}}" class="form-control" id="celular" name="celular"  required>
                                                        </div>
                                                        <div class="form-group col-6"> 
                                                            <label for="telefono">Telefono</label>
                                                            <input type="number" value="{{$cliente->persona->celular_2}}" class="form-control" id="telefono" name="telefono">
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-6"> 
                                                                <label for="direccion">Direccion</label>
                                                                <input type="text" value="{{$cliente->persona->direccion}}" class="form-control" id="direccion" name="direccion"  required>
                                                            </div>
                                                            <div class="form-group col-3"> 
                                                                <label for="nit">Nit</label>
                                                                <input type="number" value="{{$cliente->nit}}" class="form-control" id="nit" name="nit"  required>
                                                            </div>
                                                            <div class="form-group col-3"> 
                                                                <label for="razon_social">Razon Social</label>
                                                                <input type="text" value="{{$cliente->razon_social}}" class="form-control" id="razon_social" name="razon_social"  required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-warning">EDITAR</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                    {{-- fin modal editar --}}
                                        <?php $contador++?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
   
@endsection
@section('script') 
    @if (session('mensaje') == 'ok')
    <script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Realizado correctamente',
        showConfirmButton: false,
        timer: 1500
        })
    </script>    
    @endif 
  <script type="text/javascript">
    let tabla = 'table';
    tableEs(tabla);
    $(document).on("click", ".eliminarCliente",function(){
      var ruta = $("#ruta").val();
      let action = $(this).attr("action");
      let method = $(this).attr("method");
      let token = $(this).attr("token");
      let pagina = $(this).attr("pagina");
      Swal.fire({
        title: 'Estas seguro?',
        text: "De elimnar a esta persona!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) =>
        {
          if(result.isConfirmed)
          {
            let datos = new FormData();
            datos.append("_method", method);
            datos.append("_token", token);
            $.ajax
            ({
              url:action,
              method: "POST",
              data:datos,
              cache:false,
              contentType:false,
              processData:false,
              success: function(res)
              {
                if(res == "ok")
                {
                  Swal.fire({
                  type: 'success',
                  title: '!El registro ha siddo eliminado...',
                  showConfirmButton: true,
                  confirmButtonText: 'Cerrar',
                  }).then((result) => {
                      if (result.isConfirmed) {
                        window.location = ruta+'/'+pagina;
                      }
                  });
                }
              }
            })
          }
        });
    });
  </script>
@endsection