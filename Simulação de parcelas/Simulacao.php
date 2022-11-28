<?php

function acharNovaData($data, $qtdDias)
{
  $dataSegundos = strtotime($data);
  $diasEmSeg    = $qtdDias * 24 * 60 * 60;
  $soma         = $dataSegundos + $diasEmSeg;
  $novaData     = date("d/m/Y",$soma);
  return $novaData;
}
    $valor_total = $_POST['valor_total'];

    $quantidade_parc = $_POST['quantidade_parc'];

    $dias_parc = $_POST['dias_parc'];

    echo "Valor da compra: " . number_format($valor_total, 2, ',', '.') . "<br>";

    echo "Quantidade de parcelas: $quantidade_parc <br><br>";

    $valor_parc = round( $valor_total / $quantidade_parc, 2);
    $valor_ultima_parc = $valor_total - ($valor_parc * ($quantidade_parc -1));
   
    $controle = 1;

    $soma_valor_parc = 0;

    $data = date('Y/m/d');

    while ($controle <= $quantidade_parc) {

        $data_venc = acharNovaData($data,  $dias_parc );
        echo "Parcela: " .($controle) . "<br>";
        echo "Data de vencimento: " .($data_venc) . "<br>";

        if ($controle == $quantidade_parc) {

            $valor_parc = $valor_ultima_parc;
        }
        echo "Valor da parcela: " . number_format($valor_parc, 2, ',', '.') . "<br>" . "<br>";
        $dados = explode('/',$data_venc);
        $data  = $dados[2]."/".$dados[1]."/".$dados[0];

        {
            $soma_valor_parc += number_format($valor_parc, 2, '.', '');
            
        }
        $controle++;
    }


    echo "<br>Valor total parcelado: " . number_format($soma_valor_parc, 2, ',', '.') . "<br>";

    ?>