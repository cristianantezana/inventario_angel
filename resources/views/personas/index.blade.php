
@extends('panel')

@section('contenido')  
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="page-header card">
                        <div class="card-block">
                            <h5 class="m-b-10">GESTION PERSONA</h5>
                          
                            <div class="card">
                              <div class="card-header">
                               
                                  <br>
                                  <a href="{{route('personas.create')}}" class="btn btn-primary" style="float: right;">REGISTRAR NUEVO</a>
                                  <br>
                              </div>
                              <div class="card-block table-border-style">
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead class="bg-primary">
                                             <tr>
                                                <th class="text-center" scope="col">No</th>
                                                <th class="text-center" scope="col">NOMBRE</th>
                                                <th class="text-center" scope="col">APELLIDO</th>
                                                <th class="text-center" scope="col">CELULAR</th>
                                                
                                                <th class="text-center" scope="col"></th>
                                                <th class="text-center" scope="col">EDITAR</th>
                                                <th class="text-center" scope="col">ELIMINAR</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                             @foreach ($testimonio as $item)
                                             <tr>
                                                 <th scope="row">1</th>
                                                 <td class="text-center">{{$item->nombre}}</td>
                                                 <td class="text-center">{{$item->apellido}}</td>
                                                 <td class="text-center">{{$item->celular}}</td>
                                                
                                                 
                                                                
                                                 
                                                 <td><center>
                                                   @if($item->estado == 1)
                                                   <button  class="btn-sm btn-round btn btn-success" disabled>Activo</button>
                                                   @elseif($item->estado == 0)
                                                   <button  class="btn-sm  btn-round btn btn-danger" disabled>Inactivo</button>
                                                   @endif
                                                </center></td>
                                                <td class="text-center"><a href="{{ route('personas.edit', $item->cod_persona) }}" class="btn-sm  btn-round btn btn-warning">EDITAR</a></td>
                                                <td><center>
                                                   <form action="{{ route('personas.destroy',$item->cod_persona) }}" method="POST">
                                                   {{ csrf_field() }} <!--token para poder realizar el insert-->
                                                   {{ method_field('DELETE') }}
                                                   <button  type="submit" class="btn btn-danger btn-outline-danger">ELIMINAR</button>
                                                  
                                                   </form></center>
                                                </td>
                                             
                              
                                             </tr>
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
      <!-- end inner page section -->
      <!-- why section -->
      <!-- Main-body start -->
      <div class="main-body">
         <div class="page-wrapper">
             <!-- Page-header start -->
         
             <!-- Page-header end -->
             
         <!-- Page-body start -->
         <div class="page-body">
             <!-- Basic table card start -->
           
         </div>
     </div>
    
      @endsection