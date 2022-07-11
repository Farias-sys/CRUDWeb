<?php

    # Connect with the database (You'll have more options to change like target ip and target database
    # in the archive mentioned on require_once)
    
    require_once('db.php');
    $conn = conectarDB();

    $num_register = $_POST['value'];
    

    $data_returned = mysqli_query($conn, "SELECT * FROM alunos WHERE num_register=$num_register");
    $total_data = mysqli_num_rows($data_returned);
    $data_returned_array = mysqli_fetch_array($data_returned);

    if($total_data==0){
        echo"Não foi encontrado registro com o número de matrícula referenciado $num_register";
    }else{
        $thead = '
        <table class="search-table student">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Turma</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Celular</th>
                    <th>Telefone</th>
                </tr>
        </thead>
        
        <tbody>';

        for($cont=0;$cont<$total_data;$cont++){
            $num_register = $data_returned_array['num_register'];
            $class = $data_returned_array['class'];
            $name = $data_returned_array['name'];
            $cpf = $data_returned_array['cpf'];
            $rg = $data_returned_array['rg'];
            $cel_aluno = $data_returned_array['cel_aluno'];
            $tel_aluno = $data_returned_array['tel_aluno'];

            $tbody="
                <tr>
                    <td>$num_register</td>
                    <td>$class</td>
                    <td>$name</td>
                    <td>$cpf</td>
                    <td>$rg</td>
                    <td>$cel_aluno</td>
                    <td>$tel_aluno</td>
                </tr>";
        }
        $final='</tbody></table>';
        echo"".$thead.$tbody.$final;
    }
?>