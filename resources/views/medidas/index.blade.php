
@extends('panel')
@section('contenido')
{{-- moda --}}

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-warning">
        <h5 class="modal-title" id="staticBackdropLabel">EDITAR MEDIDA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg">
              <form action="#" method="POST" id="editar_form" >
                @csrf
                <input type="hidden" name="medida_id" id="medida_id">
                <label for="nombre_medida" >Nombre de la Medida</label>
                <input type="text"   name ="nombre_medida" class="form-control form-control-round" placeholder="Nombre......." id="nombre_medida">
                <br>
                <label for="sigla_medida" >Sigla de la Medida</label>
                <input type="text"   name ="sigla_medida" class="form-control form-control-round" placeholder="Sigla......." id="sigla_medida">
                <br>
            </div>
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button  type="submit" id="editar_btn" class="btn btn-success" >GUARDAR</button>
      </div>
    </form>
    </div>
  </div>
</div>
{{-- fn --}}
{{-- modal editar --}}

{{-- fin modal editar --}}
<div class="page-header card">
    <div class="card-block">
        <h2 class="m-b-10">Gestion Medidas Producto</h2>
    </div>
</div>
<div class="page-body">
    <div class="row">
          <div class="col-lg-4 col-md-12">
              <div class="card">
                  <div class="card text-white bg-info mb-3">
                      <h3> <center>Registrar Medidas</center> </h3>
                  </div>
                  <div class="card-block">
                    <form action="#" method="POST" id="agregar_form"  >   
                        @csrf
                        <label for="nombre_medida" >Nombre de la Medida</label>
                        <input type="text"   name ="nombre_medida" class="form-control form-control-round" placeholder="Nombre......." id="nombre_medida">
                        <br>
                        
                        <label for="sigla_medida" >Sigla de la Medida</label>
                        <input type="text"   name ="sigla_medida" class="form-control form-control-round" placeholder="Sigla......." id="sigla_medida">
                        <br>
                        <button type="submit"  class="btn btn-success btn-block">GUARDAR</button>
                      </form>
                  </div>
              </div>
          </div>
          <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Medidas Producto</h3>
                    <div id="datatable-table" ></div>
                   
            </div>
        </div>
      </div>
  </div>



@endsection
@section('script')  

<script type="text/javascript">
      function tableMedida(){
        $.ajax({
          url: '{{ route('medidas.table') }}',
          method: 'GET',
          success: function(data) {
            $("#datatable-table").empty();
			      $("#datatable-table").append(data);
            $('#table_medida').DataTable( {
                "order": [[ 0, "asc" ]]
            }
             );
          }
        });
      }
     
 $("#agregar_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $.ajax({
          url: '{{url('medidas/store')}}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Agregado!',
                'Medida añadido con éxito!',
                'success'
              )
              tableMedida();
            }
            $("#agregar_form")[0].reset();
          }
        });
      });
     
$( document ).ready(function() {
        tableMedida();
    console.log( "ready!" );
});
$("#editar_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#editar_btn").text('Actualizando...');
        $.ajax({
          url: '{{url('medidas/update')}}',
          method: 'POST',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'ACTUALIZADO!',
                'Se actualizo correctamente!',
                'success'
              )
              tableMedida();
            }
            $("#editar_btn").text('GUARDAR');
            $("#editar_form")[0].reset();
            $("#staticBackdrop").modal('hide');
          }
        });
      });
  // edit employee ajax request
  $(document).on('click', '.editar', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('medidas.edit') }}',
          method: 'GET',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#nombre_medida").val(response.nombre_medida);
            $("#sigla_medida").val(response.sigla_medida);
            $("#medida_id").val(response.cod_medida);
          
          }
        });
      });
      $(document).on('click', '.eliminar', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Estas seguro?',
          text: "De elimnar a este registro!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('medidas.destroy') }}',
              method: 'DELETE',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Eliminado!',
                  'Se elimino Correctamente .',
                  'success'
                )
                tableMedida();
               
              }
            });
          }
        })
      });
</script>
@endsection