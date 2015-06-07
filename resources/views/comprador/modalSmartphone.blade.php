<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="modalSmartphone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2 id="name_d" align="center">{[{ smartphone.nombre }]}</h2>
            </div>
        </div>
        <p>Especificaciones</p>
        <div class="row main">
            <div class="col-md-4">
                <p align="center">
                    <img src="{[{smartphone.imagen}]}" alt="" class="img-responsive center-block">
                </p>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <img src="img/equipos/general.png" width="12%" alt="cpu">GENERAL
                    </div>
                    <ul class="list-group list-group-flush" id="red_d">
                        <li class="list-group-item"><strong>SO: </strong><span id="os">{[{ smartphone.os }]}</span></li>
                        <li class="list-group-item"><strong>2G: </strong><span id="2g">{[{ smartphone.red2g }]}</span></li>
                        <li class="list-group-item"><strong>3G: </strong><span id="3g">{[{ smartphone.red3g }]}</li>
                        <li class="list-group-item"><strong>4G: </strong><span id="4g">{[{ smartphone.red4g }]}</span></li>
                    </ul>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <img src="img/equipos/screen.png" width="12%" alt="cpu">PANTALLA
                    </div>
                    <ul class="list-group list-group-flush" id="pantalla">
                        <li class="list-group-item"><strong>Resolución: </strong><span id="reso">{[{ smartphone.pantalla_resolucion }]}</span></li>
                        <li class="list-group-item"><strong>Tamaño: </strong><span id="display_tamano">{[{ smartphone.pantalla_tamano }]}</span></li>
                        <li class="list-group-item"><strong>Tipo: </strong><span id="display_type">{[{ smartphone.tipo_pantalla }]}</span></li>
                    </ul>
                </div>


            </div>

            <div class="col-md-4">
                <br>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <img src="img/equipos/cpu.png" width="12%" alt="cpu">CPU
                    </div>
                    <ul class="list-group list-group-flush" id="cpu_d">
                        <li class="list-group-item"><strong>Núcleos: </strong><span id="nucleos">{[{ smartphone.nucelos }]}</span></li>
                        <li class="list-group-item"><strong>Velocidad: </strong><span id="velocidad">{[{ smartphone.velocidad }]}</span></li>
                        <li class="list-group-item"><strong>Tipo: </strong><span id="tipo_cpu">{[{ smartphone.tipo_procesador }]}</span></li>
                    </ul>
                </div>
                <br>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <img src="img/equipos/size.png" width="12%" alt="cpu">TAMAÑO Y PESO
                    </div>
                    <ul class="list-group list-group-flush" id="tamano_peso">
                        <li class="list-group-item"><strong>Ancho: </strong><span id="ancho">{[{ smartphone.ancho }]}</span></li>
                        <li class="list-group-item"><strong>Alto: </strong><span id="alto">{[{ smartphone.alto }]}</span></li>
                        <li class="list-group-item"><strong>Grosor: </strong><span id="grosor">{[{ smartphone.grosor }]}</span></li>
                        <li class="list-group-item"><strong>Peso: </strong><span id="peso">{[{ smartphone.peso }]}</span></li>
                    </ul>
                </div>
                <br>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <img src="img/equipos/battery.png" width="12%" alt="cpu">BATERÍA
                    </div>
                    <ul class="list-group list-group-flush" id="bateria">
                        <li class="list-group-item"><strong>En conversación: </strong><span id="conversacion">{[{ smartphone.bateria_conversacion }]}</span>
                        </li>
                        <li class="list-group-item"><strong>En stand-by: </strong><span id="stand_by">{[{ smartphone.bateria_espera }]}</span></li>
                        <li class="list-group-item"><strong>Tipo: </strong><span id="type_bat">{[{ smartphone.bateria_tipo }]}</span></li>

                        <li class="list-group-item"><strong>Capacidad: </strong><span id="capacidad_bat">{[{ smartphone.bateria_capacidad }]}</span></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-4"><br>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <img src="img/equipos/camera.png" width="12%" alt="cpu"> CÁMARA
                    </div>
                    <ul class="list-group list-group-flush" id="camara">
                        <li class="list-group-item"><strong>Trasera: </strong><span id="trasera">{[{ smartphone.camara_trasera }]}</span></li>
                        <li class="list-group-item"><strong>Frontal: </strong><span id="frontal">{[{ smartphone.camara_frontal }]}</span></li>
                        <li class="list-group-item"><strong>Video: </strong><span id="video">{[{ smartphone.camara_video }]}</span></li>
                    </ul>
                </div>
                <br>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <img src="img/equipos/conect.png" width="12%" alt="cpu">CONECTIVIDAD
                    </div>
                    <ul class="list-group list-group-flush" id="conectividad">
                        <li class="list-group-item"><strong>Bluetooth: </strong><span id="bluetooth"></span></li>
                        <li class="list-group-item"><strong>GPS: </strong><span id="gps">{[{ smartphone.gps }]}</span></li>
                        <li class="list-group-item"><strong>USB: </strong><span>{[{ smartphone.usb }]}</span></li>
                        <li class="list-group-item"><strong>Wifi: </strong><span id="wifi">{[{ smartphone.wireless }]}</span></li>
                    </ul>
                </div>
                <br>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <img src="img/equipos/ram.png" width="12%" alt="cpu">MEMORIA
                    </div>
                    <ul class="list-group list-group-flush" id="memoria">
                        <li class="list-group-item"><strong>Interna: </strong><span id="interna">{[{ smartphone.memoria_interna }]}</span></li>
                        <li class="list-group-item"><strong>RAM: </strong><span id="ram">{[{ smartphone.memoria_ram }]}</span></li>
                        <li class="list-group-item"><strong>Slot tarjeta: </strong><span id="slot">{[{ smartphone.memoria_tarjeta }]}</span></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Confirmar</button>
    </div>
  </div>
</div>