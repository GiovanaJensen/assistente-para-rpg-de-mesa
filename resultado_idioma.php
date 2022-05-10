<?php
require_once "includes/db/dbConnection.php";

$comandoSQL = "SELECT A.NM_RACA 				 AS 'RACA',
B.NM_IDIOMA , B.CD_IDIOMA		 AS 'IDIOMA PRINCIPAL'
FROM TB_RACA AS A
JOIN TB_IDIOMA AS B
    ON  B.CD_IDIOMA = A.CD_IDIOMA_2
        WHERE A.cd_raca =  ";
$comandoSQL .= $_POST['codigo'] . " ";
$comandoSQL .= "GROUP BY b.CD_IDIOMA;";

$dados = $conn->query($comandoSQL);
foreach($dados as $idioma1){
    ?>
    <option value="<?php echo $idioma1[2];?>">
    <?php
    echo $idioma1[1];
    ?>
    </option>
    <?php
}