<?php
require_once("_scripts\list.php");
require_once('_scripts\forms.php');
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="_styles\crud\styles.css">
        <link rel="stylesheet" href="_styles\crud\modals\modal-insert-data.css">
        <link rel="stylesheet" href="_styles\crud\modals\modal-search-data.css">
        <link rel="stylesheet" href="_styles\crud\modals\modal-change-data.css">
        <title>Educatech - Sistema</title>
    </head>

    <body>
        <header>
            <img width="11%" style="z-index:99;" src="_assets\title_padles.svg" alt="">
            <div class="title-container">
                <h1 id="title-text">Educatech</h1>
            </div>
        </header>
        
        <div class="main-container">
            <div class="content">
                <div class="btns-container" style="padding-top:0.938rem;">
                    <div class="btn-cadastrar">
                        <button onclick="modalInsertData.open()" id="btn-cadastrar" class="btns">
                            <h1 class="btn-txt">Cadastrar</h1>
                        </button>
                    </div>

                    <div class="choose-db">
                        <form action="crud.php" name="option" method="post" class="choose-db">
                            <div class="input-group">
                                <select name="option" id="option" action="submit">
                                    <option value="alunos">Alunos</option>
                                    <option value="turmas">Turmas de informática</option>
                                </select>
                            </div>

                            <div class="btn-submit">
                                <input type="submit" name="submit" value="Listar" id="submit" class="btn-submit">
                            </div>
                        </form>
                    </div>
                    
                    <div class="btn-pesquisar btns">
                        <button onclick="modalSearch.open()" id="btn-pesquisar" class="btns">
                            <h1 class="btn-txt">Pesquisar</h1>
                        </button>
                    </div>

                </div>

                <div class="table">
                    <?php   
                        if(isset($_POST['submit'])){
                            if($_POST['option']=='alunos'){
                                $choose = 'alunos';
                                listStudentsData();
                            }else if($_POST['option']=='turmas'){
                                $choose = 'turmas';
                                listClassesData();
                            }
                        }
                        else{
                            $choose = 'alunos';
                            listStudentsData();
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="modal-overlay-search">
            <div class="form-search-content">
                <div class="form-search">
                    <?php
                    if($choose=='alunos'){
                        getStudentSearchForm();
                    }else if ($choose=='turmas'){
                        getClassSearchForm();
                    }
                    ?>
                </div>

                <div class="display-search-result">
                    <div class="content-modal-search">
                        <div id="js-display-search-result"></div>

                        <div id="js-display-affected-result"></div>
                    </div>
                </div>

                <div class="search-options btn">
                    <div class="btn-cancelar btn">
                        <button onclick="modalSearch.close(); " id="btn-cancelar" class="btn search-btns">
                            <h1 class="btn-txt">CANCELAR</h1>
                        </button>
                    </div>
                    <div class="btn-deletar">
                        <button onclick="modalConfirmExclusion.open();" id="btn-deletar" class="btn search-btns">
                            <h1 class="btn-txt">DELETAR</h1>
                        </button>
                    </div>
                    <div class="btn-alterar">
                        <button onclick="modalChangeData.open();modalSearch.close();" id="btn-alterar" class="btn search-btns">
                            <h1 class="btn-txt">ALTERAR</h1>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-confirm-exclusion">
            <h1 id="modal-confirm-exclusion-text">Deseja mesmo deletar o registro?</h1>
            <div class="delete-btns">
                <button onclick="modalConfirmExclusion.close()" id="btn-cancel-delete">CANCELAR</button>
                <?php
                if($choose=='alunos'){
                    echo'<button id="btn-confirm-student-delete">DELETAR</button>';
                }else if($choose=='turmas'){
                    echo'<button id="btn-confirm-class-delete">DELETAR</button>';
                }
                ?>
            </div>
        </div>

        <div class="modal-change-data">
            <div class="modal-change-form">
                <form action="_scripts\change.php" method="post" class="modal-change-form">
                    <?php
                    if($choose=='alunos'){
                        getChangeStudentForm();
                    }else if($choose=='turmas'){
                        getChangeClassForm();
                    }
                    ?>
                </form>
            </div>
        </div>

        <div class="modal-overlay-insertdata">    
            <div class="modal-form">
                <form action="_scripts\create.php" method="POST" class="modal-form">
                    <?php
                    if($choose=='alunos'){
                        getInsertStudentForm();
                    }else if($choose=='turmas'){
                        getInsertClassForm();
                    }
                    ?>
                </form>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="_scripts\js\modals.js"></script>
    <script src="_scripts\js\search_student.js"></script>
    <script src="_scripts\js\search_class.js"></script>
    <script src="_scripts\js\delete_student.js"></script>
    <script src="_scripts\js\delete_class.js"></script>
</html>