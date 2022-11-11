
@extends('panel')
@section('contenido')
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header modal-header-primary">
         <h5 class="modal-title" id="exampleModalLabel">REGISTRAR PERSONA</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form action="{{url('personas/store')}}" method="POST">
          @csrf
         <div class="modal-body">
            <div class="row">
               <div class="form-group col-6"> 
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre"  required>
               </div>
               <div class="form-group col-6"> 
                  <label for="apaterno">Apellido</label>
                  <input type="text" class="form-control" id="apellido" name="apellido">
               </div>
             </div>
             <div class="row">
               <div class="form-group col-6"> 
                  <label for="nombre">Celular</label>
                  <input type="number" class="form-control" id="celular" name="celular"  required>
               </div>
               <div class="form-group col-6"> 
                  <label for="apaterno">Telefono</label>
                  <input type="number" class="form-control" id="telefono" name="telefono">
               </div>
             </div>
             <div class="row">
               <div class="form-group col-6"> 
                  <label for="nombre">Direccion</label>
                  <input type="text" class="form-control" id="direccion" name="direccion"  required>
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
                            <h2 style="color:rgba(17, 16, 16, 0.77)" class="m-b-10">GESTION PERSONA</h2>
                          
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
                                                <th class="text-center" scope="col">NOMBRE</th>
                                                <th class="text-center" scope="col">APELLIDO</th>
                                                <th class="text-center" scope="col">CELULAR</th>
                                                <th class="text-center" scope="col">TELEFONO</th>
                                                <th class="text-center" scope="col">DIRECCION</th>
                                                <th class="text-center" scope="col"></th>
                                                <th class="text-center" scope="col">EDITAR</th>
                                                <th class="text-center" scope="col">ELIMINAR</th>
                                                </tr>
                                          </thead>
                                          <tbody id="data_persona">
                                             <?php $contador = 1?>
                                             @foreach ($personas as $item)
                                             <tr>
                                                 <th  class="text-center" scope="row"><?php echo $contador;?></th>
                                                 <td class="text-center">{{$item->nombre}}</td>
                                                 <td class="text-center">{{$item->apellido}}</td>
                                                 <td class="text-center">{{$item->celular}}</td>
                                                 <td class="text-center">{{$item->celular_2}}</td>
                                                 <td class="text-center">{{$item->direccion}}</td>
                                                 <td><center>
                                                   @if($item->estado == 1)
                                                   <button  class="btn-sm btn-round btn btn-success" disabled>Activo</button>
                                                   @elseif($item->estado == 0)
                                                   <button  class="btn-sm  btn-round btn btn-danger" disabled>Inactivo</button>
                                                   @endif
                                                </center></td>
                                                <td class="text-center">
                                                   <button type="button" "  class="btn btn-warning" data-toggle="modal" data-target="#editarPersona{{$item->cod_persona}}"><i class="fa fa-pencil" aria-hidden="true">  </i>
                                                    </button>
                                                   
                                                   {{-- <a href="{{ route('personas.edit', $item->cod_persona) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></i></a></td> --}}
                                                <td><center>
                                                   <button class="btn btn-danger eliminarPersona" 
                                                   action="{{ url('personas/destroy',$item->cod_persona) }}" method="DELETE" token="{{ csrf_token() }}" pagina="personas/index">
                                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                                   </button>
                                                   {{-- <form class="form_eliminar" action="{{ route('personas.destroy',$item->cod_persona) }}" method="POST">
                                                   {{ csrf_field() }} <!--token para poder realizar el insert-->
                                                   {{ method_field('DELETE') }}
                                                   <button  type="submit" class="btn btn-danger  "><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                  
                                                   </form> --}}
                                                </center>
                                                </td>
                                             
                              
                                             </tr>
                                             <div class="modal fade" id="editarPersona{{$item->cod_persona}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                  <div class="modal-content">
                                                    <div class="modal-header modal-header-warning">
                                                      <h4 class="modal-title" id="exampleModalLabel">EDITAR PERSONA</h4>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <form action="{{url('personas/update', $item->cod_persona)}}" method="POST">
                                                      @method('PUT')
                                                       @csrf
                                                      <div class="modal-body">
                                                         <div class="row">
                                                            <div class="form-group col-6"> 
                                                               <label for="nombre">Nombre</label>
                                                               <input type="text" class="form-control" id="nombre" name="nombre" value="{{$item->nombre}}" required>
                                                            </div>
                                                            <div class="form-group col-6"> 
                                                               <label for="apaterno">Apellido</label>
                                                               <input type="text" value="{{$item->apellido}}" class="form-control" id="apellido" name="apellido">
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="form-group col-6"> 
                                                               <label for="nombre">Celular</label>
                                                               <input type="number" value="{{$item->celular}}" class="form-control" id="celular" name="celular"  required>
                                                            </div>
                                                            <div class="form-group col-6"> 
                                                               <label for="apaterno">Telefono</label>
                                                               <input type="number" value="{{$item->celular_2}}" class="form-control" id="telefono" name="telefono">
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="form-group col-6"> 
                                                               <label for="nombre">Direccion</label>
                                                               <input type="text" value="{{$item->direccion}}" class="form-control" id="direccion" name="direccion"  required>
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

      <div class="main-body">
         <div class="page-wrapper">

         <div class="page-body">
             <!-- Basic table card start -->
           
         </div>
     </div>
    <!-- Modal -->

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
      <script>
      
      </script>
      <script type="text/javascript">
      
         $('.form_eliminar').submit(function(e){
         e.preventDefault();
         Swal.fire({
            title: 'Estas seguro?',
            text: "De elimnar a esta persona!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
         }).then((result) => {
            if (result.isConfirmed) {
               this.submit();
            }
         });
      });
      $('body').on('keyup', '#buscar', function(){
         let buscar = $(this).val();
         console.log(buscar);
         $.ajax({
            method:"POST",
            url: "{{url('personas/buscar')}}",
            dataType:"json",
            data:{
               '_token':'{{ csrf_token() }}',
               buscar:buscar
            },
            success: function(res){
               let tabla = '';
               let contador = 0;
               $('#data_persona').html('');
               $.each(res, function(index, value){
                  contador++;
                  let cod = value.cod_persona;
                  let url = 'action="{{url('/')}}/personas/destroy/'+cod+'"';
                  $tabla = '<tr><th class="text-center">'+contador+'</td> <td class="text-center">'+value.nombre+'</th> <td class="text-center">'+value.apellido+'</td><td class="text-center">'+value.celular+'</td><td class="text-center"><button type="button" "  class="btn btn-warning" data-toggle="modal" data-target="#editarPersona'+cod+'"><i class="fa fa-pencil" aria-hidden="true">  </i></button>{{-- <a href="{{ route('personas.edit', $item->cod_persona) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></i></a></td> --}}<td> <td><center><button class="btn btn-danger eliminarPersona" '+url+' method="DELETE" token="{{ csrf_token() }}" pagina="personas/index"><i class="fa fa-trash" aria-hidden="true"></i></button></center></td></tr>';
                  $('#data_persona').append($tabla);
                  //console.log(index.length);
               })
              // console.log(res);
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
         }).then((result) => {
            if (result.isConfirmed) {
               let datos = new FormData();
               datos.append("_method", method);
               datos.append("_token", token);
               $.ajax({
                  url:action,
                  method: "POST",
                  data:datos,
                  cache:false,
                  contentType:false,
                  processData:false,
                  success: function(res){
                     if(res == "ok"){
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
      