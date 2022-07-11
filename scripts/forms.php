<?php

function getStudentSearchForm(){
    echo'
    <hgroup class="modal-search-text">
        <h1 class="modal-search-title">Pesquisar registro</h1>
        <h2 id="text-db-type">Base de dados selecionada: Alunos</h2>
    </hgroup>

    <div class="input-group group">
        <div class="input-group">
            <label for="search-by-register" class="input-label">Digite a matrícula do aluno</label> <br>
            <input type="text" name="search-by-register" id="search-by-register" class="input-place" style="width:318px">
        </div>

        <div class="input-group actions" style="margin-top:0;">
            <button id="search-student" name="search-student">ENVIAR</button>
        </div>
    </div>
    ';
}

function getClassSearchForm(){
    echo'
    <hgroup class="modal-search-text">
        <h1 class="modal-search-title">Pesquisar registro</h1>
        <h2 id="text-db-type">Base de dados selecionada: Turmas de informática</h2>
    </hgroup>

    <div class="input-group group">
        <div class="input-group">
            <label for="search-by-class-code" class="input-label">Digite o código da turma</label> <br>
            <input type="text" name="search-by-class-code" id="search-by-class-code" class="input-place" style="width:318px">
        </div>

        <div class="input-group actions" style="margin-top:0;">
            <button id="search-class" name="search-class">Pesquisar</button>
        </div>
    </div>
    ';
}

function getInsertStudentForm(){
    require_once('_scripts\db.php');
    $conn = conectarDB();
    $classes_query = mysqli_query($conn, "SELECT * FROM turmas_informatica");
    $total_classes = mysqli_num_rows($classes_query);
    $classes = mysqli_fetch_array($classes_query);
    
    echo'
    <hgroup class="modal-text">
        <h1 id="modal-title">Incluir registro</h1>
        <h2 id="show-db-type">Base de dados selecionada: Alunos</h2>
    </hgroup>

    <div class="modal-content">
        <div class="input-group student-name">
            <label for="student-name" class="input-label">Nome do aluno</label> <br>
            <input type="text" name="student-name" id="name" class="input-place student-name">
        </div>

        <div class="input-group group"">
            <div class="input-group twin">
                <div class="input-group element">
                    <label for="cpf" class="input-label">CPF</label> <br>
                    <input type="text" name="cpf" id="cpf" style="width:215px;" class="input-place">
                </div>';

    echo'
                <div class="input-group element">
                    <span class="input-label">Turma</span> <br>
                    <select name="turma" class="input-place" style="width:215px;" id="turma" action="submit">';
    for($contador=0;$contador<$total_classes;$contador++){
        $class = $classes['class_code'];
        echo"           <option value='$class'>$class</option>";
        $classes = mysqli_fetch_assoc($classes_query);
    }
    echo'
                    </select>
                </div>
            </div>

            <div class="input-group twin second">
                <div class="input-group element">
                    <label for="cel" class="input-label">Celular do aluno</label> <br>
                    <input type="text" name="cel" id="cel" class="input-place">
                </div>

                <div class="input-group element"> 
                    <label for="rg" class="input-label">RG</label> <br>
                    <input type="text" name="rg" id="rg" class="input-place">
                </div>
            </div>
        </div>

            <div class="input-group actions">
                <button onclick="modalInsertData.close()" class="btn btn-cancel">Cancelar</button>
                <input type="submit" value="Enviar" name="submit-alunos" id="submit" class="btn btn-submit insert-data">
            </div>
        </div>';
}

function getInsertClassForm(){
    echo'
    <hroup class="modal-text">
        <h1 id="modal-title">Incluir registro</h1>
        <h2 id="show-db-type">Base de dados selecionada: Turmas de informática</h2>
    </hroup>

    <div class="input-group element">
        <label for="teacher" class="input-label">Digite o nome do professor da turma</label>
        <input type="text" name="teacher" id="teacher" class="input-place teacher">
    </div>

    <div class="input-group group">
        <div class="input-group twin" style="width:215px;">
            <div class="input-group element">
                <label for="class-code" class="input-label">Digite o código da turma</label>
                <input type="text" name="class-code" style="width:215px;" id="class-code" class="input-place">
            </div>
            
            <div class="input-group element">
                <label for="num-students" class="input-label">Número de estudantes</label>
                <input type="number" name="num-students" style="width:215px;" id="num-students" class="input-place">
            </div>
        </div>
        
        <div class="input-group twin second">
            <div class="input-group element">
                <label for="date-start" class="input-label">Data de início</label>
                <input type="date" name="date-start" id="date-start" class="input-place">
            </div>
            
            <div class="input-group element">
                <label for="date-end" class="input-label">Data de conclusão</label>
                <input type="date" name="date-end" id="date-end" class="input-place">
            </div>
        </div>
    </div>
    
    <div class="input-group actions">
        <button onclick="modalInsertData.close()" class="btn btn-cancel">Cancelar</button>
        <input type="submit" value="Enviar" name="submit-turmas" id="submit" class="btn-submit insert-data">
    </div>';
}

function getChangeStudentForm(){
    require_once('_scripts\db.php');
    $conn = conectarDB();
    $classes_query = mysqli_query($conn, "SELECT * FROM turmas_informatica");
    $total_classes = mysqli_num_rows($classes_query);
    $classes = mysqli_fetch_array($classes_query);
    
    echo'
    <div class="modal-content">
        <hgroup class="modal-text">
            <h1 id="modal-title">Alterar registro</h1>
        </hgroup>

        <div class="input-group twin">
            <div class="input-group element">
                <label for="num-register" class="input-label">Matrícula</label>
                <input type="number" name="num-register" id="num-register" class="input-place">
            </div>

            <div class="input-group student-name">
                <label for="student-name" class="input-label">Nome do aluno</label> <br>
                <input type="text" name="student-name" id="name" class="input-place student-name">
            </div>
        </div>

        <div class="input-group group"">
            <div class="input-group twin">
                <div class="input-group element">
                    <label for="cpf" class="input-label">CPF</label> <br>
                    <input type="text" name="cpf" id="cpf" style="width:215px;" class="input-place">
                </div>';

    echo'
                <div class="input-group element">
                    <span class="input-label">Turma</span> <br>
                    <select name="turma" class="input-place" style="width:215px;" id="turma" action="submit">';
    for($contador=0;$contador<$total_classes;$contador++){
        $class = $classes['class_code'];
        echo"           <option value='$class'>$class</option>";
        $classes = mysqli_fetch_assoc($class);
    }

    echo'
                    </select>
                </div>
            </div>

            <div class="input-group twin second">
                <div class="input-group element">
                    <label for="cel" class="input-label">Celular do aluno</label> <br>
                    <input type="text" name="cel" id="cel" class="input-place">
                </div>

                <div class="input-group element"> 
                    <label for="rg" class="input-label">RG</label> <br>
                    <input type="text" name="rg" id="rg" class="input-place">
                </div>
            </div>
        </div>

            <div class="input-group actions">
                <button onclick="modalChangeData.close();" class="btn btn-cancel">Cancelar</button>
                <input type="submit" value="Enviar" name="change-aluno" id="submit" class="btn btn-submit insert-data">
            </div>
        </div>';
}

function getChangeClassForm(){
    echo'
    <div class="modal-content">
    <hroup class="modal-text">
        <h1 id="modal-title">Incluir registro</h1>
        <h2 id="show-db-type">Base de dados selecionada: Turmas de informática</h2>
    </hroup>

    <div class="input-group group">

        <div class="input-group twin">
            <div class="input-group element">
                <label for="class-code" class="input-label">Digite o código da turma</label>
                <input type="text" name="class-code" id="class-code" style="width:215px" class="input-place">
            </div>
            
            <div class="input-group element">
                <label for="num-students" class="input-label">Número de estudantes</label>
                <input type="number" name="num-students" id="num-students" style="width:215px" class="input-place">
            </div>
        </div>
    
        <div class="input-group twin second" style="margin-left:0;">
            <div class="input-group element">
                <label for="date-start" class="input-label">Data de início</label>
                <input type="date" name="date-start" id="date-start" class="input-place">
            </div>
        
            <div class="input-group element">
                <label for="date-end" class="input-label">Data de conclusão</label>
                <input type="date" name="date-end" id="date-end" class="input-place">
            </div>
        </div>
        
    </div>
    
    <div class="input-group actions">
        <button onclick="modalChangeData.close()" class="btn btn-cancel">Cancelar</button>
        <input type="submit" value="Enviar" name="change-class" id="submit" class="btn-submit insert-data">
    </div>
</div>
    ';
}
?>