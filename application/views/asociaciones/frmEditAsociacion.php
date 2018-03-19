<div class="row"  id="validation">
    <div class="col-12">
        <div class="card ">
            <div class="card-body wizard-content">
                    <h4 class="card-title">Editar Asociaci&oacute;n</h4>
                    <h6 class="card-subtitle">Edición de Asociaci&oacute;n paso a paso</h6>
                    <form  class="validation-wizard wizard-circle" id="save" onsubmit="ok()">
                      <? foreach ($asociacion as $item) {?> 
                         <h6>Generales</h6>
                         <section>
                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label class="control-label" for="numeroAsociacion"> Numero de registro*:</label>
                                                        <input style="text-transform:uppercase" class="form-control required"  value=" <?PHP echo $item['NUMERO_ASOCIACIONES']; ?> "  maxlength="25" id="numeroAsociacion" name="numeroAsociacion"  type="text"> 
                                                         
                                                </div>
                                        </div>
                        
                                         <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="siglasAsociacion">Siglas</label>
                                                        <input style="text-transform:uppercase" class="form-control required" value=" <?PHP echo $item['SIGLAS_ASOCIACIONES']; ?> "  maxlength="25"  id="siglasAsociacion" name="siglasAsociacion" type="text"> 
                                                        
                                                </div>
                                         </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombreAsociacion"> Nombre Asociacion: *</label>  
                                                    <input style="text-transform:uppercase" required="true" value=" <?PHP echo $item['NOMBRE_ASOCIACIONES']; ?> "  class="form-control required" maxlength="200" id="nombreAsociacion"  name="nombreAsociacion" type="text">
                             
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                               <div class="form-group">
                                                    <label for="institucionAsociacion">Institucion a la que pertenece</label> 
                                                    <input style="text-transform:uppercase" value=" <?PHP echo $item['INSTITUCION_PERTENECE_ASOCIACIONES']; ?> " class="form-control" maxlength="50" id="institucionAsociacion"   name="institucionAsociacion" type="text">
                                               </div>
                                        </div>
                                </div>

                        </section>
                        <h6>Sector/tipo/clase</h6>
                        <section>
                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="sectorAsociacion">Sector</label>
                                                        <select  style="width: 100%" class="form-control" onchange="cambio()" value=" <?PHP echo $item['ID_SECTOR_ASOCIACIONES']; ?> " id="sectorAsociacion"  name="sectorAsociacion" required="true">
                                                           
                                                            <?  foreach ($sector as $items) {
                                                                ?>
                                                                        <option value="<? echo $items['ID_SECTOR_ASOCIACION']; ?>"> <? echo $items['NOMBRE_SECTOR_ASOCIACION']; ?></option>
                                                                <?
                                                                }
                                                            ?>
                                                        </select> 
                                                         
                                                </div>
                                         </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="tipoAsociacion">Tipo de Asociacion</label>
                                                        <select  style="width: 100%" id="tipoAsociacion" value=" <?PHP echo $item['ID_TIPO_ASOCIACIONES']; ?> " required="true" onchange="dependencia()" class="form-control" name="tipoAsociacion" required="true">
                                                                <?  foreach ($tipos as $items) {
                                                                ?>
                                                                        <option value="<? echo $items['ID_TIPO_ASOCIACION']; ?>"> <? echo $items['NOMBRE_TIPO_ASOCIACION']; ?></option>
                                                                <?
                                                                }
                                                            ?>
                                                        </select> 
                                                </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="claseAsociacion">Clase: *</label>
                                                        <select  style="width: 100%"  id="claseAsociacion" class="form-control" value=" <?PHP echo $item['ID_CLASE_ASOCIACIONES']; ?> " name="claseAsociacion" required="true" type="text">
                                                                <option value="1" selected="true">Seleccione una clase</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="dependenciaAsociacion">Dependencia: *</label>
                                                        <select  style="width: 100%" class="form-control" id="dependenciaAsociacion" value=" <?PHP echo $item['AFILIACION_ASOCIACIONES']; ?> "  name="dependenciaAsociacion" >
                                                            <option value=" ">Seleccione una opcion</option>
                                                        </select>
                                                </div>
                                        </div>
                                </div>
                        </section>
                        <h6>Complementarios</h6>
                        <section>
                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="estadoAsociacion">Estado: *</label>
                                                    <select  style="width: 100%" class="form-control" id="estadoAsociacion" required="true"  value=" <?PHP echo $item['ESTADO_ASOCIACIONES']; ?> "  name="estadoAsociacion">
                                                        <option value="ACEFALO" selected>ACEFALO</option>
                                                        <option value="ACTIVO">ACTIVO</option>
                                                        <option value="TRAMITE">TRAMITE</option>
                                                        <option value="CANCELADO">CANCELADO</option>
                                                        <option value="DENEGADO">DENEGADO</option>
                                                    </select>
                       
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="municipioAsociacion">Municipio: *</label>
                                                    <select  style="width: 100%" class="form-control" id="municipioAsociacion" value=" <?PHP echo $item['ID_MUNICIPIO_ASOCIACIONES']; ?> " name="municipioAsociacion" required="true">
                                                        <?  foreach ($deptos as $items) {
                                                            ?>
                                                                    <optgroup  label =" <? echo $items['NOMBRE_DEPARTAMENTO']; ?>" >
                                                            <?
                                                                    $aux=$this->AM->getMunicipiosByDepto($items['ID_DEPARTAMENTO']);
                                                                    foreach ($aux as $item2) {
                                                                     ?>       
                                                                        <option class="l2" value="<? echo $item2['ID_MUNICIPIO']; ?>"> <? echo $item2['NOMBRE_MUNICIPIO']; ?></option>
                                                                    <?
                                                                    }
                                                                    ?>
                                                                </optgroup>
                                                                    <?
                                                            }
                                                        ?>
                                                    </select> 
                                                </div>
                                        </div>
                                </div>
                                 <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="emailAsociacion">Email: </label>
                                                    <input style="text-transform:uppercase" class="form-control email" maxlength="50" value=" <?PHP echo $item['EMAIL_ASOCIACIONES']; ?> " id="emailAsociacion" required="true" name="emailAsociacion" type="text"> 
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group"> 
                                                    <label for="telefonoAsociacion">Telefono: *</label>
                                                    <input style="text-transform:uppercase" class="form-control" maxlength="9" data-mask="9999-9999" id="telefonoAsociacion" value=" <?PHP echo $item['TELEFONO_ASOCIACIONES']; ?> " required="true" name="telefonoAsociacion">
                                                </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group"> 
                                                     <label for="direccionAsociacion">Direccion: *</label>
                                                    <textarea style="text-transform:uppercase" class="form-control required"   id="direccionAsociacion"  name="direccionAsociacion">
                                                        <?PHP echo $item['DIRECCION_ASOCIACIONES']; ?>
                                                    </textarea>  
                                                   
                                                </div> 
                                        </div>                                   
                                </div>
                        </section>
                       <h6>Finales</h6>
                        <section>
                                 <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fechaConstitucionAsociacion">Fecha de Constitucion</label>
                                                    <input style="text-transform:uppercase" class="form-control date required" value=" <?PHP echo $item['FECHA_CONSTITUCION_ASOCIACIONES']; ?> " id="fechaConstitucionAsociacion"  name="fechaConstitucionAsociacion" type="text">           
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="resolucionFinal">Fecha de Resolucion Final</label>
                                                    <input style="text-transform:uppercase" class="form-control date required" value=" <?PHP echo $item['FECHA_RESOLUCION_FINAL']; ?> " id="resolucionFinal" name="resolucionFinal"  required="true" type="text"> 
                                                </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="numeroLibro">Numero de libro: </label>
                                                    <input style="text-transform:uppercase" class="form-control" id="numeroLibro" name="numeroLibro"  type="text">        
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group"> 
                                                    <label for="folioAsociacion">Folio: </label>                                                       
                                                    <input style="text-transform:uppercase" value=" <?PHP echo $item['FOLIO_ASOCIACIONES']; ?> " class="form-control" id="folioAsociacion" name="folioAsociacion"   type="text">      
                                                </div>  
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group"> 
                                                    <label for="regAsociacion">Reg.: </label>
                                                    <input style="text-transform:uppercase" value=" <?PHP echo $item['REG_ASOCIACIONES']; ?> " class="form-control" id="regAsociacion" name="regAsociacion"  type="text">      
                                                </div>                                                           
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="articuloAsociacion">Articulo: </label>                                                       
                                                    <input style="text-transform:uppercase" value=" <?PHP echo $item['ARTICULO_ASOCIACIONES']; ?> " class="form-control" id="articuloAsociacion" name="articuloAsociacion"  type="text">      
                                                </div>
                                        </div>
                                </div>
                                
                        </section>
                    <?php } ?>
                </form>


            </div>
        </div>
    </div>
</div>
  <script type="text/javascript">
        $(document).ready(function() {
            $('select').select2({
                placeholder: 'No hay datos para mostrar'
            });
             $('#resolucionFinal').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
            $('#fechaConstitucionAsociacion').bootstrapMaterialDatePicker({ weekStart : 0, time: false }).on('change', function(e, date)
                {
                $('#resolucionFinal').bootstrapMaterialDatePicker('setMinDate', date);
                });
          
            cambio();
            dependencia();
           
        });
        
        function ok() {
                var url = "<?php echo site_url(); ?>/SapAsociacion/saveEditAsociacion";
                $.ajax({                        
                   type: "POST",                 
                   url: url,                     
                   data: $("#save").serialize(), 
                   success: function(data)             
                   {
                     if(data == "exito"){
                         swal({ title: "¡Registro exitoso!", type: "success", showConfirmButton: true });
                    }else{
                        swal({ title: "¡No se guardo el registro!", type: "error", showConfirmButton: true });
                     }
                 }
               });
        }
        function mayusculas(str) {
            var res = str.toUpperCase();
            str = res;
        }
        function cambio()
        {
            var x = $('#sectorAsociacion').val();
            //alert(x);
            $('#claseAsociacion').html();
            var url = "<?php echo site_url(); ?>/SapAsociacion/cargarSelect";
                $.ajax({                        
                   type: "POST",                 
                   url: url,                     
                   data:'tipo='+x, 
                   success: function(data)             
                   {
                    $('#claseAsociacion').html(data);
                 }
               }); 
        }
        function dependencia()
        {
            var x = $('#tipoAsociacion').val();
            //alert(x);
            $('#dependenciaAsociacion').html();
            var url = "<?php echo site_url(); ?>/SapAsociacion/cargarDependencia";
                $.ajax({                        
                   type: "POST",                 
                   url: url,                     
                   data:'tipo='+x, 
                   success: function(data)             
                   {
                    $('#dependenciaAsociacion').html(data);
                 }
               }); 
        }
    </script>
