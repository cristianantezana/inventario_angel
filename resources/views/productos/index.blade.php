@extends('panel')
@section('contenido')
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <h5 class="modal-title" id="exampleModalLabel">REGISTRAR PRODUCTO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('productos/store')}}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row">
                <div class="form-group col-8"> 
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre"  required>
                </div>
            </div>
            <div class="row">
              <div class="form-group col-6"> 
                <label for="categoria_id">Seleccione la Categoria<span class="required">*</span></label>
                <select name="categoria_id" class="form-control selectric">
                    @foreach($categorias as $item)
                      <option value="{{$item->cod_categoria}}">{{$item->nombre_categoria}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group col-6"> 
                <label for="presentacion_id">Seleccione la Presentacion<span class="required">*</span></label>
                <select name="presentacion_id" class="form-control selectric">
                    @foreach($presentacion as $item)
                      <option value="{{$item->cod_presentacion}}">{{$item->medida->nombre_medida.'- '.$item->nombre_presentacion}}</option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- fin de modal -->
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
                <h2 style="color:rgba(17, 16, 16, 0.77)" class="m-b-10">GESTION PRODUCTOS</h2>
                <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="form-group col-6"> 
                        <input class="form-control mr-sm-2" id="buscar" type="search" placeholder="Buscar" aria-label="Search">  
                      </div>
                      <div class="form-group col-6"> 
                        <button type="button" " style="float: right;" class="btn btn-primary" 
                          data-toggle="modal" data-target="#exampleModal">REGISTRAR NUEVO PRODUCTO
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-primary">
                          <tr>
                            <th class="text-center" scope="col">ITEMS</th>
                            <th class="text-center" scope="col">NOMBRE</th>
                            <th class="text-center" scope="col">CATEGORIA</th>
                            <th class="text-center" scope="col">PRESENTACION</th>
                            <th class="text-center" scope="col"></th>
                            <th class="text-center" scope="col">EDITAR</th>
                            <th class="text-center" scope="col">ELIMINAR</th>
                          </tr>
                        </thead>
                        <tbody id="data_persona">
                          <?php $contador = 1?>
                          @foreach ($productos as $item)
                            <tr>
                                <th  class="text-center" scope="row"><?php echo $contador;?></th>
                                <td class="text-center">{{$item->nombre_producto}}</td>
                                <td class="text-center">{{$item->categoria->nombre_categoria}}</td>
                                <td class="text-center">{{$item->presentacion->medida->nombre_medida.' '.$item->presentacion->nombre_presentacion}}</td>
                                <td>
                                  <center>
                                    @if($item->estado == 1)
                                      <button  class="btn-sm btn-round btn btn-success" disabled>Activo</button>
                                    @elseif($item->estado == 0)
                                      <button  class="btn-sm  btn-round btn btn-danger" disabled>Inactivo</button>
                                    @endif
                                  </center>
                                </td>
                              <td class="text-center">
                                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarPersona{{$item->cod_producto}}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                  </button>
                              </td>
                              <td>
                                <center>
                                  <button class="btn btn-danger eliminarPersona" 
                                  action="{{ url('productos/destroy',$item->cod_producto) }}" method="DELETE" token="{{ csrf_token() }}" pagina="productos/index">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                  </button>
                                </center>
                              </td>
                            </tr>
                                {{--modal editar  --}}
                                <div class="modal fade" id="editarPersona{{$item->cod_producto}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header modal-header-warning">
                                        <h4 class="modal-title" id="exampleModalLabel">EDITAR PRODUCTO</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form action="{{url('productos/update', $item->cod_producto)}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="form-group col-8"> 
                                              <label for="nombre">Nombre</label>
                                              <input value="{{$item->nombre_producto}}" type="text" class="form-control" id="nombre" name="nombre"  required>
                                            </div> 
                                          </div>
                                          <div class="row">
                                            <div class="form-group col-6"> 
                                              <label for="categoria_id">Seleccione la Categoria<span class="required">*</span></label>
                                              <select name="categoria_id" class="form-control selectric">    
                                                @foreach($categorias as $producto)
                                                  @if($producto->cod_categoria==$item->categoria->cod_categoria)
                                                    <option value="{{$producto->cod_categoria}}" selected>{{$producto->nombre_categoria}}</option>
                                                  @else
                                                    <option value="{{$producto->cod_categoria}}">{{$producto->nombre_categoria}}</option>
                                                  @endif
                                                @endforeach
                                              </select>
                                            </div>
                                            <div class="form-group col-6"> 
                                              <label for="presentacion_id">Seleccione la Presentacion<span class="required">*</span></label>
                                              <select name="presentacion_id" class="form-control selectric">
                                                @foreach($presentacion as $producto)
                                                  @if($producto->cod_presentacion==$item->presentacion->cod_presentacion)
                                                    <option value="{{$producto->cod_presentacion}}" selected>{{$producto->medida->nombre_medida.'- '.$producto->nombre_presentacion}}</option>
                                                  @else
                                                    <option value="{{$producto->cod_presentacion}}">{{$producto->medida->nombre_medida.'- '.$producto->nombre_presentacion}}</option>
                                                  @endif
                                                @endforeach
                                              </select>
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
                                {{-- fin modal --}}
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
        timer: 1800
      });
    </script>   
  @endif    
  <script type="text/javascript">
    $('.form_eliminar').submit(function(e){
      e.preventDefault();
      Swal.fire({
        title: 'Estas seguro?',
        text: "De elimnar este Producto!",
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
                    if (result.isConfirmed)
                    {
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
      