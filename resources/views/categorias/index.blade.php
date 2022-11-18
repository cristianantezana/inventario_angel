@extends('panel')
@section('contenido')
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header modal-header-warning">
          <h5 class="modal-title" id="staticBackdropLabel">EDITAR CATEGORIA</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" id="editar_form" >
          <div class="modal-body">
            <div class="row">
              <div class="col-lg">
                @csrf
                <input type="hidden" name="categoria_id" id="categoria_id">
                <label for="fname">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control"  required>
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
  {{-- fin modal editar --}}
  <div class="page-header card">
    <div class="card-block">
        <h2 class="m-b-10">Gestion Categoria</h2>
    </div>
  </div>
  <div class="page-body">
    <div class="row">
      <div class="col-lg-4 col-md-12">
        <div class="card">
          <div class="card text-white bg-info mb-3">
              <h3> <center>Registrar Categoria</center> </h3>
          </div>
          <div class="card-block">
            <form action="#" method="POST" id="agregar_form"  >   
              @csrf
              <label for="categoria" >Nombre Categoria</label>
              <input type="text"   name ="categoria" class="form-control form-control-round" placeholder="Nombre......." id="categora">
              <br>
              <br>
              <button type="submit"  class="btn btn-success btn-block">GUARDAR</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-12">
        <div class="card">
          <div class="card-header">
                <h3>Categorias</h3>
          <div id="datatable-table" ></div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')  
  <script type="text/javascript">
    function tableCategoria()
    {
      $.ajax
      ({
        url: '{{ route('categorias.table') }}',
        method: 'GET',
        success: function(data)
        {
          $("#datatable-table").empty();
          $("#datatable-table").append(data);
          $('#table').DataTable({"order": [[ 0, "asc" ]]});
        }
      });
    }
        
    $("#agregar_form").submit(function(e){
      e.preventDefault();
      const fd = new FormData(this);
      $.ajax
      ({
        url: '{{url('categorias/store')}}',
        method: 'post',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response)
        {
          if(response.status == 200)
          {
            Swal.fire
            (
              'Agregado!',
              'Categoria añadido con éxito!',
              'success'
            );
            tableCategoria();
          }
          $("#agregar_form")[0].reset(); 
        }
      });
    });
        
    $( document ).ready(function() {
      tableCategoria();
        console.log( "ready!" );
    });

    $("#editar_form").submit(function(e){
      e.preventDefault();
      const fd = new FormData(this);
      $("#editar_btn").text('Actualizando...');
      $.ajax
      ({
        url: '{{url('categorias/update')}}',
        method: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response)
        {
          if (response.status == 200)
          {
            Swal.fire(
              'ACTUALIZADO!',
              'Se actualizo correctamente!',
              'success'
            );
            tableCategoria();
          }
          $("#editar_btn").text('GUARDAR');
          $("#editar_form")[0].reset();
          $("#staticBackdrop").modal('hide');
        }
      });
    });
      // funcion para editar con ajax request
    $(document).on('click', '.editar', function(e){
      e.preventDefault();
      let id = $(this).attr('id');
      $.ajax
      ({
        url: '{{ route('categorias.edit') }}',
        method: 'GET',
        data: {id: id,_token: '{{ csrf_token() }}'},
        success: function(response) {
          $("#nombre").val(response.nombre_categoria);
          $("#categoria_id").val(response.cod_categoria);
        }
      });
    });
    //funcion para eliminar con ajax
    $(document).on('click', '.eliminar',function(e){
      e.preventDefault();
      let id = $(this).attr('id');
      let csrf = '{{ csrf_token() }}';
      Swal.fire
      ({
        title: 'Estas seguro?',
        text: "De elimnar a esta persona!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) 
        => {
          if (result.isConfirmed)
          {
            $.ajax
            ({
              url: '{{ route('categorias.destroy') }}',
              method: 'DELETE',
              data: {id: id, _token: csrf},
              success: function(response)
              {
                Swal.fire(
                  'Eliminado!',
                  'Se elimino Correctamente .',
                  'success'
                );
                tableCategoria();
              }
            });
          }
        })
    });
  </script>
@endsection