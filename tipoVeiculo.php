<?php  include_once "Shared/header.php" ?>
    <script>
        $('document').ready(function(e){
            carregaMenu();
        });
    </script>
    </head>
    <body>
    <?php include_once "Shared/menu.php";
    include_once "controller/tipoVeiculoController.php";
    $tipoVeiculo = new tipoVeiculoController();
    $veiculos = $tipoVeiculo->retornaTodos();
    ?>

    <div class="row">
        <div class="col-sm-11">
            <div class="panel panel-default">
                <div class="panel-black black-sel">
                    <h3 class="panel-title">Cadastro Tipo de Veiculo</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" action="controller/tipoveiculocontroller.php" method="POST">
                        <input type="hidden" value="" name="id" id="id"/>
                        <input type="text" name="txtTipo" id="txtTipo" class="form-control" />
                        <input type="submit" name="salvar" id="btnSalvar" value="Salvar" class="form-control btn-primary" />
                        <input type="reset" value="Cancelar" id="btnCancelar" class="form-control btn-primary" />
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
                    <form role="form" action="controller/tipoveiculocontroller.php">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Seleciona</th>
                            <th>Tipo</th>
                            <th>Editar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($veiculos as $veic)
                        {?>
                            <tr>
                                <td class='col-sm-1'>
                                    <input type='checkbox' name='ids[]' value='<?= $veic["id"]?>' />
                                </td>
                                <td><?= $veic["tipo"]?></td>
                                <td><a class="edit" data-obj='<?= $veic["id"]?>;<?= $veic["tipo"]?>' href='#'><span class='glyphicon glyphicon-pencil editPen'></span></a></td>
                            </tr>
                        <?php
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

        $('#btnSalvar').click(function(e){
            if($('#txtTipo').val().trim() == '')
            {
                alert("Preencha o campo com o tipo");
                e.preventDefault();
            }
        });
        $('.edit').click(function(e){
            var id = this.getAttribute('data-obj').split(';')[0];
            var tipo = this.getAttribute('data-obj').split(';')[1];

            $('#btnSalvar').val('Alterar');
            $('#btnSalvar').attr('name','alterar');
            $('#btnSalvar').removeClass("btn-primary").addClass("btn-success");
            $('#id').val(id);
            $('#txtTipo').val(tipo);
        });

        $('#btnCancelar').click(function(e){
            $('#btnSalvar').val('Salvar');
            $('#btnSalvar').attr('name','salvar');
            $('#btnSalvar').removeClass("btn-success").addClass("btn-primary");
            $('#id').val('');
            $('#txtTipo').val('');
        });
    });
 </script>
<?php  include_once "Shared/footer.php" ?>