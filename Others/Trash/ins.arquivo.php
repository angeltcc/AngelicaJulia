<? 

//colocar em view-adicionar.php
$arquivo = $_FILES['imagem'];
                    $arquivo = explode('.',$arquivo['name']);
                    
                    if($arquivo[sizeof($arquivo)-1] != 'jpg' || 'png'){
                        die('<script> function alert ("Esse formato de arquivo não é suportado") </script>');
                    } else {
                        move_uploaded_file($arquivo['tmp_name'],'../Images/camisetas'.$arquivo['name']);
                    }
?>