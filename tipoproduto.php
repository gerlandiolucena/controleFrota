<?php  include_once "Shared/header.php" ?>
    <script>
        $('document').ready(function(e){
            carregaMenu();
        });
</script>
</head>
<body>
    <?php include_once "Shared/menu.php";
    include_once "controller/tipoProdutoController.php";
    $tipoProduto = new tipoProdutoController();
    $tipoProdutos = $tipoProduto->retornaTodos();
    ?>

    <div class="row">
        <div class="col-sm-11">
            <div class="panel panel-default">
                <div class="panel-black black-sel">
                    <h3 class="panel-title">Cadastro Tipo de Contato</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" action="controller/tipoContatoController.php" method="POST">
                        <input type="hidden" value="" name="id"/>
                        <input type="text" name="txtTipo" class="form-control" />
                        <input type="submit" name="salvar" id="btnCadastrar" value="Salvar" class="form-control btn-primary" />
                        <input type="reset" value="Cancelar" id="btnCancelar" class="form-control btn-danger" />
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
                    <form role="form" action="controller/tipoContatoController.php">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Seleciona</th>
                                <th>Id</th>
                                <th>Tipo</th>
                                <th>Editar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($tipoProdutos as $cont){
                            ?>
                                <tr>
                                    <td class='col-sm-1'>
                                        <input type='checkbox' name='ids[]' value='<?= $cont["id"]?>' />
                                    </td>
                                    <td>
                                        <?= $cont["id"]?>
                                    </td>
                                    <td>
                                        <?= $cont["tipo"]?>
                                    </td>
                                    <td>
                                        <a class="edit" data-obj="" href='#'><span class='glyphicon glyphicon-pencil'></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
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

    });
</script>
<?php  include_once "Shared/footer.php"; ?>