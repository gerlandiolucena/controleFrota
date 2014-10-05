<?php  include_once "Shared/header.php" ?>
<script>
        $('document').ready(function(e){
            carregaMenu();
            $('#btnCadastrar').click(function(e){
                if($('#txtcargo').val().trim() == '')
                {
                    alert("Preencha o campo com o cargo.");
                    e.preventDefault();
                }
            });

            $('.edit').click(function(e){

                var obj = this.getAttribute('data-obj').split(';');
                var id = obj[0];
                var cargo = obj[1];
                var setor = obj[2];

                document.getElementById('id').value = id;
                document.getElementById('txtcargo').value = cargo;
                document.getElementById('setor').value = setor;
                document.getElementById('btnCadastrar').name = "alterar";
                document.getElementById('btnCadastrar').value = "Alterar";
                $('#btnCadastrar').removeClass("btn-primary").addClass("btn-success");
            });
            $('#btnCancelar').click(function(e){
                document.getElementById('id').value = '';
                document.getElementById('txtcargo').value = '';
                document.getElementById('setor').value = '';
                document.getElementById('btnCadastrar').name = "inserir";
                document.getElementById('btnCadastrar').value = "Cadastrar";
                $('#btnCadastrar').removeClass("btn-success").addClass("btn-primary");
            });
        });
</script>
</head>
<body>
<?php include_once "Shared/menu.php";
    include_once "controller/cargoController.php";
    include_once "controller/setorController.php";
    $setorCtrl = new setorController();
    $controller = new cargoController();
?>

    <div class="row">
        <div class="col-sm-11">
            <div class="panel panel-default">
                <div class="panel-black black-sel">
                    <h3 class="panel-title">Cadastro de Cargos</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" method="POST" action="../controllers/cargoController.php">
                        <input type="hidden" id="id" name="id" value="" />
                        <select name="setor" id="setor" class="form-control">
                        <?php
                        foreach($setorCtrl->retornarTodos() as $setor){
                        ?>
                            <option value="<?= $setor["id"]?>"><?= $setor["Setor"]?></option>
                        <?php } ?>
                        </select>
                        <input type="text" name="txtcargo" id="txtcargo" class="form-control" class="form-control" />
                        <input type="submit" name="inserir" value="Cadastrar" id="btnCadastrar" class="form-control btn-primary" />
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
                    <form class="form-inline" method="POST" action="../controllers/cargoController.php">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="col-md-1">Selecionar</th>
                            <th class="col-md-5">Cargo</th>
                            <th class="col-md-5">Setor</th>
                            <th class="col-md-5">Editar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($controller->retornarTodos() as $cargo){ ?>
                            <tr id="<?= $cargo["id"]?>">
                                <td>
                                    <input type="checkbox" name="ids[]" value="<?= $cargo["id"]?>"/>
                                </td>
                                <td>
                                    <?= $cargo["nomeCargo"]?>
                                </td>
                                <td id="<?= $cargo["idsetor"]?>">
                                    <?= $cargo["setor"]?>
                                </td>
                                <td><a class="edit" data-obj="<?= $cargo["id"]?>;<?= $cargo["nomeCargo"]?>;<?= $cargo["idsetor"]?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                        <input type="submit" name="excluir" value="Excluir" class="btn-success" />
                    </form
                </div>
            </div>
        </div>
    </div>

    </div><!-- fecha div col-md-10-->
<?php  include_once "Shared/footer.php" ?>