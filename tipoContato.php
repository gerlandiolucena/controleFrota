<?php  include_once "Shared/header.php" ?>
    <script>
        $('document').ready(function(e){
            carregaMenu();
            $('.edit').click(function(e){
                var id = this.getAttribute('data-obj').split(';')[0];
                var contato = this.getAttribute('data-obj').split(';')[1];

                document.getElementById('id').value = id;
                document.getElementById('txtTipo').value = contato;
                document.getElementById('btnCadastrar').value = "Alterar";
                document.getElementById('btnCadastrar').name = "alterar";
                $('#btnCadastrar').removeClass('btn-primary').addClass('btn-success');
            });
        });
    </script>
    </head>
    <body>
    <?php include_once "Shared/menu.php";
    include_once "../controller/tipoContatoController.php";
    $tipoContato = new tipoContatoController();
    $tipoContatos = $tipoContato->retornaTodos();
    ?>

    <div class="row">
        <div class="col-sm-11">
            <div class="panel panel-default">
                <div class="panel-black black-sel">
                    <h3 class="panel-title">Cadastro Tipo de Contato</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" action="../controllers/tipocontatocontroller.php" method="POST">
                        <input type="hidden" value="" name="id" id="id"/>
                        <input type="text" name="txtTipo" id="txtTipo" class="form-control" />
                        <input type="submit" name="salvar" id="btnCadastrar" value="Cadastrar" class="form-control btn-primary" />
                        <input type="reset" value="Cancelar" class="form-control btn-primary" />
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
                    <form role="form" action="../controllers/tipocontatocontroller.php">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-1">Seleciona</th>
                                <th class="col-md-6">Tipo</th>
                                <th>Tipo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($tipoContatos as $cont)
                            { ?>
                                <tr>
                                    <td class='col-sm-1'>
                                        <input type='checkbox' name='ids[]' value="<?= $cont["id"]?>" />
                                    </td>
                                    <td><?= $cont["tipo"]?></td>
                                    <td>
                                        <a class="edit" data-obj="<?= $cont["id"]?>;<?= $cont["tipo"]?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </td>
                                </tr>
                          <?php  } ?>
                            </tbody>
                        </table>
                        <input type="submit" name="excluir" value="Deletar" class="btn-success" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div><!-- fecha div col-md-10-->
<?php  include_once "Shared/footer.php" ?>