@extends('panel')
@section('contenido')
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content ">
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
                <div class="card">
                  <div class="card-header">
                    <div class="row ">
                      <div class="form-group col-6">      
                        <h2 style="color:rgba(17, 16, 16, 0.77)" class="m-b-10">GESTION VEHICULOS</h2>
                      </div>
                      <div class="form-group col-6">      
                        <button type="button" style="float: right; color: white; font-weight: bold;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                          REGISTRAR NUEVO <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped table-hover" id="table">
                        <thead style="background-color: #6777ef;">
                            <tr>
                              <th class="text-center" style="color: #fff;">ITEMS</th>
                              <th class="text-center" style="color: #fff;">COLOR</th>
                              <th class="text-center" style="color: #fff;">MARCA</th>
                              <th class="text-center" style="color: #fff;">PLACA</th>
                              <th class="text-center" style="color: #fff;">ACCIONES</th>
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
                                <center>
                                  <button type="button" " class="btn btn-warning btn-sm mx-2" data-toggle="modal"
                                  data-target="#editarVehiculo{{$item->cod_vehiculo}}"><i class="fa fa-pencil" aria-hidden="true"></i>
                                  </button>     
                                  <button class="btn btn-danger btn-sm mx-2 eliminarVehiculo" action="{{ url('vehiculos/destroy',$item->cod_vehiculo) }}"
                                    method="DELETE" token="{{ csrf_token() }}" pagina="vehiculos">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                  </button>
                                </center>
                              </td>
                            </tr>
                                {{-- modal para editar --}}
                                <div class="modal fade" id="editarVehiculo{{$item->cod_vehiculo}}" tabindex="-1"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
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
    let tabla = 'table';
    let clase = 'eliminarVehiculo';
    let mensaje = "De elimnar a este Vehiculo!";
    tableEs(tabla);
    eliminarPorRuta(mensaje,clase);
  </script>
@endsection
      