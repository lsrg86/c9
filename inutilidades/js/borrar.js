(function escucha(){
    var tabla = document.getElementById("tablaProducto");
    tabla.addEventListener('click', clickTabla);
    function clickTabla(event) {
        var target = event.target;
        if(target.tagName === 'A' && target.getAttribute('class') === 'borrar') {
            if(!confirm("De verdad?")) {
                event.preventDefault();
            }
        } else if(target.tagName === 'A' && target.getAttribute('class') === 'editar') {
           
          
            event.preventDefault();
            var dataId = target.getAttribute('data-id');
            var id = document.getElementById('id');
            id.value = dataId;
            var fEditar = document.getElementById('fEditar');
            fEditar.submit();
        
        }
        
    }
    
    var marcar = document.getElementById("marcarTodo");
    
    marcar.addEventListener('click', marcartodo);
    var listaCheck = document.getElementsByName("ids[]");
    function marcartodo(){
        
        if (marcar.checked===true){
            for (var i=0;i<listaCheck.length;i++){
            listaCheck[i].checked=1;
           }
            
        }
        else{
            for (var i=0;i<listaCheck.length;i++){
            listaCheck[i].checked=0;
           }
        }
        
    }
            
   
    
})();

