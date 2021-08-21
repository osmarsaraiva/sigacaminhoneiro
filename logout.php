<?php 
@session_start(); //não mostrar o erro
@session_destroy();

echo "<script>window.location='index.php'</script>";//redireciona 
 ?>