<?php

# Connect with the database (You'll have more options to change like target ip and target database
# in the archive mentioned on require_once)


function listStudentsData(){

    require_once('_scripts\db.php');
    $conn = conectarDB();

    # Selecting the rows of the table

    $data = mysqli_query($conn, "SELECT * FROM alunos");
    $total_rows = mysqli_num_rows($data);

    # Matching the arrays

    $data_array = mysqli_fetch_array($data);
    $tbody_array = array();

    echo'
    <table class="table">
        <thead class="table">
            <tr class="table">
                <th class="table">Matrícula</th>
                <th class="table">Turma</th>
                <th class="table">Nome</th>
                <th class="table">CPF</th>
                <th class="table">RG</th>
                <th class="table">Celular</th>
                <th class="table">Telefone</th>
                <th></th>
            </tr>
    </thead>
    
    <tbody class="table">
    
        <tr class="table">';

    for($cont=0;$cont<$total_rows;$cont++){
        $num_register = $data_array['num_register'];
        $class = $data_array['class'];
        $name = $data_array['name'];
        $cpf = $data_array['cpf'];
        $rg = $data_array['rg'];
        $cel_aluno = $data_array['cel_aluno'];
        $tel_aluno = $data_array['tel_aluno'];

        echo"
                <td class=\"table\">$num_register</td>
                <td class=\"table\">$class</td>
                <td class=\"table\">$name</td>
                <td class=\"table\">$cpf</td>
                <td class=\"table\">$rg</td>
                <td class=\"table\">$cel_aluno</td>
                <td class=\"table\">$tel_aluno</td>
            </tr>";

        $data_array = mysqli_fetch_assoc($data);
    }
    
    echo'</tbody></table>';
}

function listClassesData(){
    require_once('_scripts\db.php');
    $conn = conectarDB();

    # Selecting the rows of the table

    $data = mysqli_query($conn, "SELECT * FROM turmas_informatica");
    $total_rows = mysqli_num_rows($data);

    # Matching the arrays

    $data_array = mysqli_fetch_array($data);
    $tbody_array = [];

    echo'
    <table class="table">
        <thead class="table">
            <tr class="table">
                <th class="table">Turma</th>
                <th class="table">Número de estudantes</th>
                <th class="table">Data de início da turma</th>
                <th class="table">Data de encerramento</th>
            </tr>
        </thead>

        <tbody class=table>
            <tr class=table>
    ';

    for($cont=0;$cont<$total_rows;$cont++){
        $class_code = $data_array['class_code'];
        $number_students = $data_array['number_students'];
        $date_start = $data_array['date_start'];
        $date_end = $data_array['date_end'];

        echo"
                <td class=\"table\">$class_code</td>
                <td class=\"table\">$number_students</td>
                <td class=\"table\">$date_start</td>
                <td class=\"table\">$date_end</td>
            </tr>
        ";

        $data_array = mysqli_fetch_assoc($data);
    }
    echo'</tbody></table>';
    }
?>