<?php  include_once "Shared/header.php" ?>
<script>
    $('document').ready(function(e){
        carregaMenu();
    });
</script>
</head>
<body>
<?php include_once "Shared/menu.php";
    include_once "controller/controller.php";
    $controller = new setorController();
?>

<div class="row">
    <div class="col-sm-11">
        <div class="panel panel-default">
            <div class="panel-black black-sel">
                <h3 class="panel-title">Cadastro Setores</h3>
            </div>
            <div class="panel-body">
                <form class="form-inline" action="../controllers/setorController.php" method="POST">
                    <input type="hidden" value="" name="id" id="id"/>
                    <input type="text" name="txtsetor" id="txtsetor" class="form-control col-md-6" />
                    <input type="submit" value="inserir" id="btnCadastrar" class="form-control btn-primary col-sm-1" />
                    <input type="button" value="Cancelar" id="btnCancelar" class="form-control btn-danger col-sm-1" />
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
                <form class="form-inline" action="../controllers/setorController.php" method="POST">
                    <table class="table table-striped text-center" id="tblSetor">
                        <thead>
                        <tr>
                            <th class="col-md-1">Selecionar</th>
                            <th class="text-center">Setor</th>
                            <th class="text-center">Operacao</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $setores = $controller->retornarSetores();
                                foreach($setores as $setor)
                                {?>
                                    <tr>
                                        <td>
                                            <input value="<?=$setor["id"]?>" type='checkbox' name='ids[]' />
                                        </td>
                                        <td>
                                            <?= $setor["Setor"] ?>
                                        </td>
                                        <td>
                                            <a class="edit" data-obj="<?= $setor["id"]?>;<?= $setor["Setor"]?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                        </td>
                                    </tr>
                                <?php }?>
                        </tbody>
                    </table>
                <div class="col-md-4"><input type="submit" name="excluir" value="Excluir" id="btnExcluir" class="form-control btn-success col-sm-1" /></div>
                    </form>
            </div>
        </div>
    </div>
</div>
</div><!-- fecha div col-md-10-->
<script>
    $('document').ready(function(e){

        $('#btnCadastrar').click(function(e){
            if($('#txtsetor').val().trim() == '')
            {
                alert("Preencha o campo com o setor.");
                e.preventDefault();
            }
        });
        $('.edit').bind('click',function(e){
            var id = this.getAttribute("data-obj").split(';')[0];
            var setor = this.getAttribute("data-obj").split(';')[1];
            document.getElementById('btnCadastrar').name = "alterar";
            document.getElementById('btnCadastrar').value = "Alterar";
            document.getElementById('id').value = id;
            document.getElementById('txtsetor').value = setor;
        });

        $('#btnCancelar').bind('click', function(e){
            document.getElementById('id').value = '';
            document.getElementById('btnCadastrar').name = "inserir";
            document.getElementById('btnCadastrar').value = "Cadastrar";
            document.getElementById('txtsetor').value = '';
        });
    });
</script>
<?php  include_once "Shared/footer.php" ?>