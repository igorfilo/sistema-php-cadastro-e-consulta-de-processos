<?php include 'header.php';
require 'conexao.php';
require 'vendor/autoload.php';

$conexao = conexao::getInstance();

// Verifica se o formulário foi enviado
if (isset($_POST['data_inicial']) && isset($_POST['data_final']) && isset($_POST['nome_completo'])) {

    // Recupera os dados do formulário
    $data_inicial = $_POST['data_inicial'];
    $data_final = $_POST['data_final'];
    $nome_completo = $_POST['nome_completo'];

    // Cria a consulta SQL
    $sql = "SELECT * FROM tab_processos WHERE data BETWEEN :data_inicial AND :data_final AND interessado LIKE CONCAT('%', :nome_completo, '%')";

    // Prepara a consulta
    $stmt = $conexao->prepare($sql);

    // Vincula os parâmetros da consulta
    $stmt->bindValue(':data_inicial', $data_inicial, PDO::PARAM_STR);
    $stmt->bindValue(':data_final', $data_final, PDO::PARAM_STR);
    $stmt->bindValue(':nome_completo', '%' . $nome_completo . '%', PDO::PARAM_STR);

    // Executa a consulta
    $stmt->execute();

    // Obtém os resultados da consulta
    $resultados = $stmt->fetchAll();

    // Exibe os resultados da consulta
    if ($resultados) {
        $html = '
        <style type="text/css">
            .table.table-relatorio td, 
            .table.table-relatorio th{
            border: 1px solid black;
        }
       </style>
        
        <table class="table table-relatorio" style="text-align:center; font-size: 14px;">
        <caption>Relatório | Processos </caption> <br />
        <thead>
                <tr>
                <th style="font-weight: bold;">Nº Protocolo</th>
                <th style="font-weight: bold; width: 300px;">Assunto</th>
                <th style="font-weight: bold;">Data</th>
                <th style="font-weight: bold;">Destino</th>
                <th style="font-weight: bold;">Interessado</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($resultados as $processo) {
            $html .= '<tr>';
            $html .= '<td>' . $processo['nprotocolo'] . '</td>';
            $html .= '<td style="text-align: justify;">' . $processo['assunto'] . '</td>';
            $html .= '<td>' . $processo['data'] . '</td>';
            $html .= '<td>' . $processo['destino'] . '</td>';
            $html .= '<td>' . $processo['interessado'] . '</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';
    } else {
        $html = '<tr><td colspan="6">Nenhum resultado encontrado</td></tr>';
    }

     //gera o resultado a partir do dompdf
     $dompdf = new Dompdf\Dompdf();
     //define o tamanho e disposição da página
     $dompdf->setPaper('A4', 'portrait');
     // Carrega o HTML no objeto dompdf
     $dompdf->loadHtml($html);
     // Renderiza o PDF
     $dompdf->render();
     // Insere a contagem de página no documento
     $dompdf->getCanvas()->page_script('
     if ($PAGE_COUNT > 1) {
     $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
     $size = 10;
     
     $pdf->page_text($pdf->get_width() - 50, $pdf->get_height() - 40, "{PAGE_NUM} | {PAGE_COUNT}", $font, $size, array(0,0,0));
 
     }
     ');
    // Salva o PDF em um arquivo
    file_put_contents('relatorios/relatorio.pdf', $dompdf->output());

    // Envia o PDF para o navegador do usuário
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="relatorio.pdf"');
    echo $dompdf->output();
}

$conexao = null;
?>
<!DOCTYPE html>
<html>
<?php
$conexao = conexao::getInstance();
// Executa um SELECT para retornar os nomes dos membros
$sql = 'SELECT nome_completo FROM membro';
$stm = $conexao->prepare($sql);
$stm->execute();

// Armazena os resultados do SELECT em um array
$resultados = $stm->fetchAll();
?>

<head>
    <meta charset="utf-8">
    <title>Processos | Relatório </title>
    <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="shortcut icon" type="imagem/x-icon" href="#" />
</head>

<body>

    <div class='container'>
        <h2 style="text-align:center;">Relatório de Processos</h2>
        <form action="relatorio.php" method="post">
            <div class="col-md-6 form-group">
                <label for="data_inicial">Data Inicial</label>
                <input type="date" class="form-control" id="data_inicial" name="data_inicial">
            </div>
            <div class="col-md-6 form-group">
                <label for="data_final">Data Final</label>
                <input type="date" class="form-control" id="data_final" name="data_final">
            </div>
            <div class="col-md-6 form-group">
                <label for="nome_completo">Nome Completo</label>
                <input type="text" class="form-control" id="nome_completo" name="nome_completo">
            </div>
            <br />
            <div class="botao_consulta" style="text-align: center;">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"> </span> Consultar </button>
            </div>
        </form>

    </div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>