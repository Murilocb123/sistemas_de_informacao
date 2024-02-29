<?php
use models\pessoa;
require_once('./models/pessoa.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="listar_pessoas.php" method="post">
    <fieldset style="width: 40%;">
        <label for="nome_pessoa">Nome pessoa:</label><br>
        <input type="text" name="nome_pessoa" id="nome_pessoa">
        <input type="submit" value="Pesquisar">
    </fieldset>
    </form>
    <table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Cidade</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
            find();
        ?>
    </tbody>
    </table>
    <a href="..">voltar</a>
</body>
</html>



<?php
function find(){

    $pessoa = new pessoa();
    $where = null;
    if(isset($_POST['nome_pessoa']) && $_POST['nome_pessoa'] != ""){
        $where = "PESNOME LIKE '%".$_POST['nome_pessoa']."%'";
    }

    $pessoas = $pessoa->find($where);
    //for listando as pessoas
    foreach ($pessoas as $pessoa) {
        echo "<tr>";
        echo "<td>" . $pessoa['pesnome'] . "</td>";
        echo "<td>" . $pessoa['pessobrenome'] . "</td>";
        echo "<td>" . $pessoa['pesemail'] . "</td>";
        echo "<td>" . $pessoa['pescidade'] . "</td>";
        echo "<td>" . $pessoa['pesestado'] . "</td>";
        echo "</tr>";
    }
}



?>