
<div class="modal fade" id="createe">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h4>Registra una nueva tarea</h4>
            

                 </div>

       {!!Form::open(array('url'=>'proforma/servicio','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

    {{Form::token()}}





<div class="form-group">
  <label for="nombre_serviciot">Nombre de Tarea</label>
  <input type="text" name="nombre_serviciot" class="form-control" placeholder="nombre..."> 
</div>


<div style="margin-top: 20px" class="from-group ">

  <button class="btn btn-primary" type="submit">guardar</button>
  <button class="btn btn-danger" type="reset">Limpiar</button>
  <button style="margin-left: 300px" class="btn btn-success " type="button"><a style="color: white!important" href="{{url('proforma/config')}}">volver</a></button>


</div>

</div>


{!!Form::close()!!}

</div>



           <div class="modal-footer">
       <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cerrar</button>
       <input type="submit" class="btn btn-primary"  value="guardar" >
      
            
        </div>
        </div>
    </div>
</div>