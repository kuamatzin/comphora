<!-- Modal -->
<div class="modal fade" id="modalPlan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <img src="img/{[{ plan.compania }]}.png" alt="comparahora" class="img-responsive center-block">
        <h2 class="text-center">{[{plan.nombre}]}</h2>
        <table class="table table-bordered table-hover">
          <tbody>

          <tr id="costom">
              <th><img src="img/planes/costo.png" class="img-responsive img-no-break-line" width="25px">Costo</th>
              <td>${[{plan.renta}]}</td>
          </tr>
          <tr id="minsm">
              <th><img src="img/planes/minutos.png" class="img-responsive img-no-break-line" width="25px">Minutos</th>
              <td><span>{[{plan.minutos_incluidos}]}</span> mins</td>
          </tr>
          <tr id="minsindism" style="display:none;">
              <th>Minutos Indistintos</th>
              <td><span>{[{plan.minutos_indistintos}]}</span> mins</td>
          </tr>
          <tr id="minsmismam" style="display:none;">
              <th>Minutos Misma Compañia</th>
              <td><span>{[{plan.minutos_compania}]}</span> mins</td>
          </tr>
          <tr id="smsm">
              <th><img src="img/planes/sms.png" class="img-responsive img-no-break-line" width="25px">SMS</th>
              <td>{[{plan.sms}]} sms</td>
          </tr>
          <tr id="smsotrasm" style="display:none;">
              <th>SMS otras Compañias</th>
              <td>{[{plan.sms_indistintos}]}</td>
          </tr>
          <tr id="smsmismam" style="display:none;">
              <th>SMS misma Compañia</th>
              <td>{[{plan.sms_compania}]}</td>
          </tr>
          <tr id="interm">
              <th><img src="img/planes/internet.png" class="img-responsive img-no-break-line" width="25px">Datos</th>
              <td>{[{plan.internet}]} MB</td>
          </tr>
          <tr id="numsfm" style="display:none;">
              <th>Numeros Frecuentes</th>
              <td>{[{plan.numeros_frecuentes}]}</td>
          </tr>
          <tr id="controlm">
              <th>Tipo de Plan</th>
              <td ng-if="plan.controlado == 'No'">Abierto</td>
              <td ng-if="plan.controlado == 'Si'">Controlado</td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Confirmar</button>
      </div>
    </div>
  </div>
</div>