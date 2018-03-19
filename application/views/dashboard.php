<div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<? echo base_url();  ?>">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>             
</div>


<!--BLOCK SECTION -->
<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-info"><i class="mdi  mdi-briefcase-check mdi-48px"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0"><? echo $total; ?></h3>
                        <h5 class="text-muted m-b-0">Asociaciones Inscritas</h5></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-danger"><i class="mdi  mdi-city mdi-48px"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0"><? echo $publicas ?></h3>
                        <h5 class="text-muted m-b-0">Asociaciones Públicas</h5></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-success"><i class="mdi  mdi-factory mdi-48px"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0"><? echo $privadas ?></h3>
                        <h5 class="text-muted m-b-0">Asociaciones Privadas</h5></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-warning"><i class="mdi   mdi-account-check  mdi-48px"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0"><? echo $afiliados ?></h3>
                        <h5 class="text-muted m-b-0">Afiliados Activos</h5></div>
                </div>
            </div>
        </div>
    </div>
</div>   
<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Detalle de Asociaciones</h3>

                <div id="asoc" style="height:260px; width:100%;"></div>
            </div>
            <div>
                <hr class="m-t-0 m-b-0">
            </div>
            <div class="card-body text-center ">
                <ul class="list-inline m-b-0">
                    <li>
                        <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10 "></i>Publicas: <? echo $publicas ?></h6> </li>

                    <li>
                        <h6 class="text-muted  text-success"><i class="fa fa-circle font-10 m-r-10"></i>Privadas: <? echo $privadas ?></h6> </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Detalle de Asociaciones Privadas</h3>

                <div id="visitor" style="height:260px; width:100%;"></div>
            </div>
            <div>
                <hr class="m-t-0 m-b-0">
            </div>
            <div class="card-body text-center ">
                <ul class="list-inline m-b-0">
                    <? 
                      //  $i=0;
                       // $salida= array();
                       
                        foreach ($tipos as $item) {
                          //  $colores[$i]=substr(md5(time()), 0, 6);
                            echo "
                            <li>
                                <h6 class='text-muted text-success' >
                                    <i class='fa fa-circle font-10 m-r-10'></i>";
                                        echo $item['nombre'].": ".$item['TOT'];
                                       // $salida[$i]="[".$item['nombre'].",".$item['TOT']."],";
                                        
                                        //$i++;

                               echo " 
                                </h6> 
                            </li>";
                             //echo "<script>         $('#aux').val($('#aux').val()+'".$salida[$i]."');</script>";
                        }

                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Detalle de Solicitudes</h3>

                <div id="solicitudes" style="height:260px; width:100%;"></div>
            </div>
            <div>
                <hr class="m-t-0 m-b-0">
            </div>
            <div class="card-body text-center ">
                <ul class="list-inline m-b-0">
                     <? 
                      //  $i=0;
                       // $salida= array();
                       
                        foreach ($solicitudes as $item) {
                          //  $colores[$i]=substr(md5(time()), 0, 6);
                            echo "
                            <li>
                                <h6 class='text-muted text-success' >
                                    <i class='fa fa-circle font-10 m-r-10'></i>";
                                        echo $item['nombre'].": ".$item['total'];
                                       // $salida[$i]="[".$item['nombre'].",".$item['TOT']."],";
                                        
                                        //$i++;

                               echo " 
                                </h6> 
                            </li>";
                             //echo "<script>         $('#aux').val($('#aux').val()+'".$salida[$i]."');</script>";
                        }

                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<input type="hidden" value="<? echo $publicas ?>" name="pub" id="pub">
<input type="hidden" value="<? echo $privadas ?>" name="priv" id="priv">
<input type="hidden" value="${total2}" name="pen" id="pen">
<input type="hidden" value="${countSapSolFin}" name="fina" id="fina">
<input type="hidden" value=" " name="aux" id="aux">
<input type="hidden" value="${countSapASociacionsClas}" name="aux1" id="aux1">



    


