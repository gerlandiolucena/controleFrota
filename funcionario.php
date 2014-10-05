<?php  include_once "Shared/header.php" ?>
    <script>
        $('document').ready(function(e){
            carregaMenu();
        });
    </script>
    </head>
    <body>
    <div class="row">
        <div class="col-sm-11">
            <div class="panel panel-default">
                <div class="panel-black black-sel">
                    <h3 class="panel-title">Cadastro Setores</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" method="POST">
                        <input type="hidden" value="inserir" name="op"/>
                        <input type="text" name="txtsetor" class="form-control" />
                        <input type="submit" value="Cadastrar" class="form-control" />
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
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Setor</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div><!-- fecha div col-md-10-->
<?php  include_once "Shared/footer.php" ?>