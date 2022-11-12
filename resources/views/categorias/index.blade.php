
@extends('panel')
@section('contenido')
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
                    <form action="#" method="POST" id="add_employee_form"  >   
                        @csrf
                        <label for="categoria" >Nombre Categoria</label>
                        <input type="text"   name ="categoria" class="form-control form-control-round" placeholder="Nombre......." id="categora">
                        <br>
                        <br>
                        <button type="submit"  class="btn btn-info btn-block">GUARDAR</button>
                      </form>
                  </div>
              </div>
          </div>
          <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Categorias</h3>
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>CATEGORIA</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                       <tbody>
                           <tr>
                               <td>re</td>
                               <td>re</td>
                               <td>re</td>
                           </tr>
                       </tbody>
                    </table>
            </div>
        </div>
      </div>
  </div>



@endsection
@section('script')  

<script type="text/javascript">
 $("#add_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $.ajax({
          url: '{{url('categorias/store')}}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Employee Added Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
         
            $("#add_employee_form")[0].reset();
          
          }
        });
      });
$( document ).ready(function() {
    console.log( "ready!" );
});
</script>
@endsection