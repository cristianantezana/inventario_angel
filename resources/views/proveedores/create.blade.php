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
        </div>
      </form>
    </div>
  </div>
  <!-- Fin de Modal -->
  <section class="section">
    <div class="section-header modal-header-primary">
        <h3 class="page__heading">Nuevo Cliente</h3>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card card-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                    <input class="form-control" id="busqueda_persona" name="buscar" type="text" placeholder="Buscar Persona....."/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-2">
                    <a type="button"  data-toggle="modal" data-target="#exampleModal"  class="btn btn-info" style=" color: white; font-weight: bold;">
                        Nuevo Persona <span><i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </span>
                    </a>
                  </div>        
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div id="resultado_est"  style="background-color:#b4bbc154 " ></div>
                </div>
              </div> 
              <br>
              <form action="{{ route('proveedores.store') }}" method="POST" class="form-horizontal">
                @csrf
                <input type="text" name="id"  @if(session('persona'))value="{{ session('persona.cod_persona')}}" @endif hidden >
                <div class="row ">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre<span class="required">*</span></label>
                        <input @if(session('persona'))value="{{ session('persona.nombre')}} {{ session('persona.apellido')}}"@endif 
                        type="text" class="form-control"  name="nombre" required="required"  readonly placeholder="Nombre Proveedor..">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="celular">Celular<span class="required">*</span></label>
                        <input type="number"  @if(session('persona')) value="{{ session('persona.celular') }}"@endif 
                          class="form-control" name="celular" placeholder="Nro de Celular" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="direccion">Direccion<span class="required">*</span></label>
                      <input @if(session('persona')) value="{{ session('persona.direccion')}}" @endif 
                      type="text" class="form-control " name="direccion" placeholder="Direccion.." readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nit">Empresa<span class="required">*</span></label>
                      <input type="text" class="form-control " name="nit" placeholder="Empresa" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado">Razon Social<span class="required">*</span></label>
                        <input type="text" class="form-control " name="razon_social" placeholder="Razon Social.">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a class="btn btn-danger" href="{{route('clientes.index')}}">Volver</a>
                </div>
              </form>
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
    $(document).ready(function(){                  
      let consulta;
      $("#busqueda_persona").focus();
      $("#busqueda_persona").keyup(function(e){
        if($(this).val().length > 2)
        {
          consulta = $("#busqueda_persona").val();                                
          $.ajax
          ({
              type: "POST",
              url: "{{url('clientes/buscar')}}",
              data:{'_token':'{{ csrf_token() }}',buscar:consulta},
              dataType: "html",
              beforeSend: function(){
                $("#resultado_est").html("<p align='center'><img src='ajax-loader.gif' /></p>");
              },
              success: function(data)
              {                                                    
                $("#resultado_est").empty()
                $("#resultado_est").append(data);
              }
          });                                           
        }else{
            $("#resultado_est").empty();
        }						  
      });
  });
</script>
@endsection


   