<button class="btn btn-success" style="width: 35%; font-size: 20px" onclick="$('#novaPalestra').modal();">Nova palestra</button>


<div class="modal fade" id="novaPalestra" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nova Palestra</h4>
        </div>
        <div class="modal-body">
          <p>Preencha os campos abaixo para cadastrar uma nova palestra.</p>

          <form id="Nova" name="Nova" action="palestras/nova" method="POST" class="form-horizontal" role="form">
          	<div class="input-group input-group-lg" style="margin-bottom: 25px;">
            		<span class="input-group-addon" onclick="document.getElementById('Titulo').focus();">
              		<i class="glyphicon glyphicon-pencil"></i>
            		</span>
            		<input type="text" class="form-control" name="titulo" id="Titulo" placeholder="Título" required="">
          	</div>            
                      
          	<div class="input-group input-group-lg" style="margin-bottom: 25px;">
            		<span class="input-group-addon" onclick="document.getElementById('Palestrante').focus();">
              		<i class="glyphicon glyphicon-user"></i>
            		</span>
            		<input type="text" class="form-control" name="palestrante" id="Palestrante" placeholder="Palestrante" required="">
          	</div>

          	<div class="input-group input-group-lg" style="margin-bottom: 25px;">
            		<span class="input-group-addon" onclick="document.getElementById('Data').focus();">
              		<i class="glyphicon glyphicon-calendar"></i>
            		</span>
            		<input type="datetime-local" class="form-control" name="data" id="Data" placeholder="Data" required="">

                <span class="input-group-addon" onclick="document.getElementById('Limite').focus();">
                  <i class="glyphicon glyphicon-warning-sign"></i>
                </span>
                <input type="number" class="form-control" name="limite" id="Limite" placeholder="Vagas" min="0">                
          	</div>

          	<div class="input-group input-group-lg" style="margin-bottom: 25px;">
            		<span class="input-group-addon" onclick="document.getElementById('Descricao').focus();">
              		<i class="glyphicon glyphicon-comment"></i>
            		</span>
            		<input type="text" class="form-control" name="descricao" id="Descricao" placeholder="Descrição" required="">
          	</div>

          	<input type="submit" name="" class="btn btn-success btn-block btn-lg" value="Cadastrar" />
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
          </form>


        </div>
      </div>
      
    </div>
  </div>
<br /><br />