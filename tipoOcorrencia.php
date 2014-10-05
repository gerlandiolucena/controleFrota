<?php  include_once "Shared/header.php" ?>
    <script>
        $('document').ready(function(e){
            carregaMenu();
        });
    </script>
    </head>
    <body>
    <?php include_once "Shared/menu.php";
    include_once "controller/tipoOcorrenciaController.php";
    $tipoOcorrenciaController = new tipoOcorrenciaController();
    $tipoOcorrencias = $tipoOcorrenciaController->retornaTodos();
    ?>

    <div class="row">
        <div class="col-sm-11">
            <div class="panel panel-default">
                <div class="panel-black black-sel">
                    <h3 class="panel-title">Cadastro Tipo de Ocorrência</h3>
                </div>
                <div class="panel-body">
                    <form class="form" action="../controllers/tipoocorrenciacontroller.php" method="POST">
                        <input type="hidden" value="" name="id" id="id"/>
                        <div class="form-group">
                            <label for="txtTipo">Descrição</label>
                            <input type="text" name="txtTipo" required id="txtTipo" placeholder="Digite a descrição da ocorrência" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="txtTempMin">Tempo Mínimo para finalizar</label>
                            <input type="number" name="txtTempMin" required id="txtTempMin" placeholder="Digite o tempo mínimo" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="txtTempMax">Tempo Max. para finalizar</label>
                            <input type="number" name="txtTempMax" required id="txtTempMax" placeholder="Digite o tempo máximo." class="form-control" />
                        </div>
                        <div class="form-group form-inline">
                        <input type="submit" name="inserir" id="btnCadastrar" value="Salvar" class="form-control btn-primary col-sm-3" />
                        <input type="reset" value="Cancelar" id="btnCancelar" class="form-control btn-danger col-sm-3" />
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-11">
            <div class="panel panel-default">
                <div class="panel-black black-sel">
                    <h3 class="panel-title">Setores</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="controller/tipoocorrenciacontroller.php" method="post">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Seleciona</th>
                                <th>Tipo</th>
                                <th>Temp.Min</th>
                                <th>Tep.Max</th>
                                <th>Editar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($tipoOcorrencias as $cont)
                            {
                                echo "<tr><td class='col-sm-1'><input type='checkbox' name='ids[]' value='".$cont["id"]."' /></td><td>".$cont["tipo"]."</td><td>".$cont["tempMin"]."</td><td>".$cont["tempMax"]."</td><td><a href='#'><span class='glyphicon glyphicon-pencil editPen'></span></a></td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                        <input type="submit" name="excluir" value="Deletar" class="btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div><!-- fecha div col-md-10-->
<script>
    $('document').ready(function(e){
        $('.editPen').click(function(e){
            var linha = this.parentNode.parentNode.parentNode;
            var id = linha.cells[0].getElementsByTagName('input')[0].value;
            var tipo = linha.cells[1].innerText;
            var min = linha.cells[2].innerText;
            var max = linha.cells[3].innerText;
            document.getElementById("txtTipo").value = tipo;
            document.getElementById("txtTempMin").value = min;
            document.getElementById("txtTempMax").value = max;
            document.getElementById("id").value = id;
            document.getElementById("btnCadastrar").value = 'Alterar';
            document.getElementById("btnCadastrar").name = 'alterar';
        });
        $('#btnCancelar').click(function(e){
            document.getElementById("txtTipo").value = '';
            document.getElementById("txtTempMin").value = '';
            document.getElementById("txtTempMax").value = '';
            document.getElementById("id").value = '';
            document.getElementById("btnCadastrar").value = 'Cadastrar';
            document.getElementById("btnCadastrar").name = 'inserir';
        });
    });
</script>
</body>
<?php  include_once "Shared/footer.php" ?>
