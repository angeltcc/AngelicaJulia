               <?php  
            if(!empty($dados['btnfiltro'])){
                var_dump($dados);

                $query_filtro = "SELECT *
                            FROM tb_produtos
                            WHERE categoria IN ('Minimalista', 'Medio', 'Extravagante')
                            AND tamanho IN ('P', 'PP', 'M', 'G', 'GG', 'GGG', 'EGG')
                            AND modelagem IN ('Baby look', 'Regular')
                            AND cor IN ('Preto', 'Branco', 'Vermelho', 'Azul', 'Cinza')";
                $result_filtro = $pdo->prepare($query_filtro);
                $result_filtro->execute();

                while($row_filtro = $result_filtro->fetch(PDO::FETCH_ASSOC)){
                    extract($row_filtro); 
                    echo "Categoria: $categoria <br>";
                    echo "Tamanho: $tamanho <br>";
                    echo "Modelagem: $modelagem <br>";
                    echo "Cor: $cor <br>";
                
                }
            }
        ?>