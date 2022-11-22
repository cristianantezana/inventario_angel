@extends('panel')
@section('contenido')
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <h5 class="modal-title" id="exampleModalLabel">REGISTRAR VEHICULOS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('vehiculos/store')}}" method="POST">
            @csrf
          <div class="modal-body">
              <div class="row">
                <div class="form-group col-6"> 
                  <label for="placa">PLACA</label>
                  <input type="text" class="form-control" id="placa" name="placa"  required>
                </div>
                <div class="form-group col-6"> 
                  <label for="marca">MARCA</label>
                  <input type="text" class="form-control" id="marca" name="marca">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6"> 
                  <label for="color">COLOR</label>
                  <input type="text" class="form-control" id="celular" name="color"  required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Fin de Modal -->
        <!-- inner page section -->
  <section class="inner_page_head">
    <input type="hidden" id="ruta" value="{{url('/')}}">
    <div class="container_fuild">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="page-header card">
              <div class="card-block">
                @if (session('status'))
                    <div class="alert alert-success">{{session('status') }}</div>
                @endif
                <h2 style="color:rgba(17, 16, 16, 0.77)" class="m-b-10">GESTION VEHICULOS</h2>
                <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="form-group col-6"> 
                          <input class="form-control mr-sm-2" id="buscar" type="search" placeholder="Buscar" aria-label="Search">
                      </div>
                      <div class="form-group col-6">      
                        <button type="button" " style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          REGISTRAR NUEVO
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-primary">
                            <tr>
                              <th class="text-center" scope="col">ID</th>
                              <th class="text-center" scope="col">COLOR</th>
                              <th class="text-center" scope="col">MARCA</th>
                              <th class="text-center" scope="col">PLACA</th>
                              <th class="text-center" scope="col">EDITAR</th>
                              <th class="text-center" scope="col">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody id="data_persona">
                          <?php $contador = 1?>
                          @foreach ($vehiculos as $item)
                            <tr>
                              <th  class="text-center" scope="row"><?php echo $contador;?></th>
                              <td class="text-center">{{$item->color}}</td>
                              <td class="text-center">{{$item->marca}}</td>
                              <td class="text-center">{{$item->placa}}</td>
                              <td class="text-center">
                                  <button type="button" " class="btn btn-warning" data-toggle="modal"
                                  data-target="#editarVehiculo{{$item->cod_vehiculo}}"><i class="fa fa-pencil" aria-hidden="true"></i>
                                  </button>     
                              </td>
                              <td>
                                <center>
                                  <button class="btn btn-danger eliminarPersona" action="{{ url('vehiculos/destroy',$item->cod_vehiculo) }}"
                                    method="DELETE" token="{{ csrf_token() }}" pagina="vehiculos">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                  </button>
                                </center>
                              </td>
                            </tr>
                                {{-- modal para editar --}}
                                <div class="modal fade" id="editarVehiculo{{$item->cod_vehiculo}}" tabindex="-1"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header modal-header-warning">
                                        <h4 class="modal-title" id="exampleModalLabel">EDITAR VEHICULO</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form action="{{url('vehiculos/update', $item->cod_vehiculo)}}" method="POST">
                                        @method('PUT')
                                          @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="form-group col-6"> 
                                                <label for="nombre">PLACA</label>
                                                <input type="text" class="form-control"  name="placa" value="{{$item->placa}}" required>
                                            </div>
                                            <div class="form-group col-6"> 
                                                <label for="apaterno">MARCA</label>
                                                <input type="text" value="{{$item->marca}}" class="form-control" name="marca">
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="form-group col-6"> 
                                                <label for="nombre">COLOR</label>
                                                <input type="text" value="{{$item->color}}" class="form-control" id="color" name="color"  required>
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
                            <?php  $contador++;?>
                          @endforeach 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
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
    $('.form_eliminar').submit(function(e){
      e.preventDefault();
      Swal.fire({
        title: 'Estas seguro?',
        text: "De elimnar a este Vehiculos",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) =>
      {
        if (result.isConfirmed)
        {
          this.submit();
        }
      });
    });
  
    $(document).on("click", ".eliminarPersona",function(){
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
      