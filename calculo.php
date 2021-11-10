<?php
    $mensagem = '';

    $valorGasolina = 6.10;
    $valorAlcool = 4.17;
    $valorDiesel = 4.59;

    if($_POST){
        $distancia = $_POST['distancia'];
        $autonomia = $_POST['autonomia'];

        if(is_numeric($distancia) && is_numeric($autonomia)){

            if($distancia > 0 && $autonomia >0){
                $gasolina = ($distancia / $autonomia) * $valorGasolina;
                $gasolina = number_format($gasolina, 2, ',', '.');

                $alcool = ($distancia / $autonomia) * $valorAlcool;
                $alcool = number_format($alcool, 2, ',', '.');

                $diesel = ($distancia / $autonomia) * $valorDiesel;
                $diesel = number_format($diesel, 2, ',', '.');

                $mensagem .= '<div class="sucesso">';
                $mensagem .= '<p>O valor total gasto será de: </p>';
                $mensagem .= '<p><b>Gasolina</b> R$' . $gasolina . '</p>';
                $mensagem .= '<p><b>Álcool</b> R$' . $alcool . '</p>';
                $mensagem .= '<p><b>Diesel</b> R$' . $diesel . '</p>';
                $mensagem .= '</div>';
            }else{
                $mensagem .= '<div class="erro">'; 
                $mensagem .= '<p><b>O valor da distância e autonimia ndeve ser maior que zero!</b></p>';
                $mensagem .= '</div>'; 
            }
            
        }else{
            $mensagem .= '<div class="erro">';
            $mensagem .= '<p><b>O valor recebido não é numérico!</b></p>';
            $mensagem .= '</div>'; 
        }
    }else{
        $mensagem .= '<div class="erro">';
        $mensagem .= '<p><b>Erro ao receber informações do formulário!</b></p>';
        $mensagem .= '</div>'; 
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultado do Consumo de Combustível</title>
</head>
<body>
    <main>
        <div class="painel">
            <h2>Resultado do cálculo de consumo</h2>
            <div class="conteudo-painel">
                <?php echo $mensagem; ?>
                <a class="botao" href="index.php">Voltar</a>
            </div>
        </div>
    </main>    
</body>
</html>