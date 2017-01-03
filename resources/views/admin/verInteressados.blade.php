<div class="modal fade" id="interessadosModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="interessadosModalTitle"></h4>
        </div>
        <div class="modal-body">
          <ul id="interessadosModalList">
          	
          </ul>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript">
  function interessados($id, $titulo) {
    $.get("/interessados/" + $id, function(data, status){
    	document.getElementById('interessadosModalTitle').innerHTML = ($titulo + " (" + data.length + " interessados)");
      document.getElementById('interessadosModalList').innerHTML = "";
      	$.each(data, function(count, name) {
          
          var newItem = document.createElement("li");
          newItem.appendChild(document.createTextNode(name.name + " (" + name.email + ")"));

        	var list = document.getElementById('interessadosModalList');

          list.insertBefore(newItem, list.firstChild);
      	})
      	$('#interessadosModal').modal();
    });
  }
</script>