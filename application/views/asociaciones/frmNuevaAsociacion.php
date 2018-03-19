<div class="row"  id="validation">
    <div class="col-12">
        <div class="card ">
            <div class="card-body wizard-content">
                    <h4 class="card-title">Nueva Asociaci&oacute;n</h4>
                    <h6 class="card-subtitle">Ingreso de Asociaci&oacute;n paso a paso</h6>
                    <form  class="validation-wizard wizard-circle" id="save" onsubmit="ok()">
                         <h6>Generales</h6>
                         <section>
                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label class="control-label" for="numeroAsociacion"> Numero de registro:</label>
                                                        <input style="text-transform:uppercase" class="form-control required" disabled="true" maxlength="25" id="numeroAsociacion" name="numeroAsociacion"  type="text"> 
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="claseAsociacion">Clase: *</label>
                                                        <select style="width: 100%"  id="claseAsociacion" class="form-control"  name="claseAsociacion" required="true" type="text">
                                                                <option value="1" selected="true">Seleccione una clase</option>
                                                        </select>
                                                </div>
                                        </div>
                                        
                                </div>
                                 <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="sectorAsociacion">Sector</label>
                                                        <select style="width: 100%" class="form-control" onchange="cambio()"  id="sectorAsociacion"  name="sectorAsociacion" required="true">
                                                           
                                                            <?  foreach ($sector as $item) {
                                                                ?>
                                                                        <option value="<? echo $item['ID_SECTOR_ASOCIACION']; ?>"> <? echo $item['NOMBRE_SECTOR_ASOCIACION']; ?></option>
                                                                <?
                                                                }
                                                            ?>
                                                        </select> 
                                                         
                                                </div>
                                         </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="tipoAsociacion">Tipo de Asociacion</label>
                                                        <select style="width: 100%" id="tipoAsociacion" required="true" onchange="dependencia()" class="form-control" name="tipoAsociacion" required="true">
                                                                <?  foreach ($tipos as $item) {
                                                                ?>
                                                                        <option value="<? echo $item['ID_TIPO_ASOCIACION']; ?>"> <? echo $item['NOMBRE_TIPO_ASOCIACION']; ?></option>
                                                                <?
                                                                }
                                                            ?>
                                                        </select> 
                                                </div>
                                        </div>
                                </div>
                               

                        </section>
                        <h6>Sector/tipo/clase</h6>
                        <section>
                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombreAsociacion"> Nombre Asociacion: *</label>  
                                                    <input style="text-transform:uppercase" required="true"  class="form-control required" maxlength="200" id="nombreAsociacion"  name="nombreAsociacion" type="text">
                             
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                               <div class="form-group">
                                                    <label for="institucionAsociacion">Institucion a la que pertenece</label> 
                                                    <input style="text-transform:uppercase" class="form-control" maxlength="50" id="institucionAsociacion"   name="institucionAsociacion" type="text">
                                               </div>
                                        </div>
                                </div>
                                <div class="row">
                                         <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="siglasAsociacion">Siglas</label>
                                                        <input style="text-transform:uppercase" class="form-control required"  maxlength="25"  id="siglasAsociacion" name="siglasAsociacion" type="text"> 
                                                        
                                                </div>
                                         </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="dependenciaAsociacion">Dependencia: *</label>
                                                        <select style="width: 100%" class="form-control" id="dependenciaAsociacion"  name="dependenciaAsociacion" >
                                                            <option value="0">Seleccione una opcion</option>
                                                        </select>
                                                </div>
                                        </div>
                                </div>
                        </section>
                        <h6>Complementarios</h6>
                        <section>
                                <div class="row">
                                        <!-- <div class="col-md-6">   //Esta parte se hara en otra opcion, por defecto las asociaciones se inscribiran en tramite
                                                <div class="form-group">
                                                    <label for="estadoAsociacion">Estado: *</label>
                                                    <select style="width: 100%" class="form-control" id="estadoAsociacion" required="true"  name="estadoAsociacion">
                                                        <option value="ACEFALO" selected>ACEFALO</option>
                                                        <option value="ACTIVO">ACTIVO</option>
                                                        <option value="TRAMITE">TRAMITE</option>
                                                        <option value="CANCELADO">CANCELADO</option>
                                                        <option value="DENEGADO">DENEGADO</option>
                                                    </select>
                       
                                                </div>
                                        </div> -->
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="municipioAsociacion">Municipio: *</label>
                                                    <select style="width: 100%" class="form-control" id="municipioAsociacion"  name="municipioAsociacion" required="true">
                                                        <?  foreach ($deptos as $item) {
                                                            ?>
                                                                    <optgroup  label =" <? echo $item['NOMBRE_DEPARTAMENTO']; ?>" >
                                                            <?
                                                                    $aux=$this->AM->getMunicipiosByDepto($item['ID_DEPARTAMENTO']);
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
                                                    <input style="text-transform:uppercase" class="form-control email" maxlength="50"  id="emailAsociacion" required="true" name="emailAsociacion" type="text"> 
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group"> 
                                                    <label for="telefonoAsociacion">Telefono: *</label>
                                                    <input style="text-transform:uppercase" class="form-control" maxlength="9" data-mask="9999-9999" id="telefonoAsociacion" required="true" name="telefonoAsociacion">
                                                </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group"> 
                                                     <label for="direccionAsociacion">Direccion: *</label>
                                                    <textarea style="text-transform:uppercase" class="form-control required"  id="direccionAsociacion"    name="direccionAsociacion">
                                                        
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
                                                    <input style="text-transform:uppercase" class="form-control date required"  id="fechaConstitucionAsociacion"  name="fechaConstitucionAsociacion" type="text">           
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="resolucionFinal">Fecha de Resolucion Final</label>
                                                    <input style="text-transform:uppercase" class="form-control date required" id="resolucionFinal" name="resolucionFinal"  required="true" type="text"> 
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
                                                    <input style="text-transform:uppercase" class="form-control" id="folioAsociacion" name="folioAsociacion"   type="text">      
                                                </div>  
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group"> 
                                                    <label for="regAsociacion">Reg.: </label>
                                                    <input style="text-transform:uppercase" class="form-control" id="regAsociacion" name="regAsociacion"  type="text">      
                                                </div>                                                           
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="articuloAsociacion">Articulo: </label>                                                       
                                                    <input style="text-transform:uppercase" class="form-control" id="articuloAsociacion" name="articuloAsociacion"  type="text">      
                                                </div>
                                        </div>
                                </div>
                               
                        </section>
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
                var url = "<?php echo site_url(); ?>/SapAsociacion/saveAsociacion";
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
            var y = $('#sectorAsociacion').val();
            var z = $('#dependenciaAsociacion').val();
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
                var parametros = {
                    "tipo" : x,
                    "sector" : y,
                    "dependencia" :z
                 };
             var url = "<?php echo site_url(); ?>/SapAsociacion/cargarCorrelativo";
                $.ajax({                        
                   type: "POST",                 
                   url: url,                     
                   data:parametros, 
                   success: function(data)             
                   {
                    $('#numeroAsociacion').val(data);
                 }
               }); 

        }
    </script>
