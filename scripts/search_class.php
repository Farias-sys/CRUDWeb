<?php

require_once('db.php');
$conn = conectarDB();

$class_code = $_POST['value'];

$data_returned = mysqli_query($conn, "SELECT * FROM turmas_informatica WHERE class_code=$class_code");
$total_data = mysqli_num_rows($data_returned);
$data_returned_array = mysqli_fetch_array($data_returned);

if($total_data==0){
    echo'Não foi encontrado registro com o número de turma referenciado';
}else{
    $thead = '
    <table>
        <thead>
            <tr>
                <th>Turma</th>
                <th>Número de estudantes</th>
                <th>Data de início</th>
                <th>Data de encerramento</th>
                <th>Deleta registro</th>
                <th>Alterar registro<th>
            </tr>
        </thead>

        <tbody>
    ';

    for($cont=0;$cont<$total_data;$cont++){
        $class_code = $data_returned_array['class_code'];
        $number_students = $data_returned_array['number_students'];
        $date_start = $data_returned_array['date_start'];
        $date_end = $data_returned_array['date_end'];
        $btn_delete_register = '<td><img onclick="" src="/_assets/remover_simbolo.svg" alt="Remover registro"></td>';

        $tbody = "
            <tr>
                <td>$class_code</td>
                <td>$number_students</td>
                <td>$date_start</td>
                <td>$date_end</td>
                $btn_delete_register

            </tr>";
    }
    $final='</tbody></table>';
    echo"".$thead.$tbody.$final;
}

?>