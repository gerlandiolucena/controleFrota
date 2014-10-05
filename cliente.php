<?php  include_once "Shared/header.php" ?>
    <script>
        $('document').ready(function(e){
            carregaMenu();
            $('#txtcnpj').hide();
            $('#lblcnpj').hide();
            $('#fisica').click(function(e){
                $('#lblcnpj').hide();
                $('#txtcnpj').hide();
                $('#txtcpf').show();
                $('#lblcpf').show();
            });
            $('#juridica').click(function(e){
                $('#txtcpf').hide();
                $('#lblcpf').hide();
                $('#txtcnpj').show()
                $('#lblcnpj').show();
            });
        });
    </script>
    </head>
<?php include_once "Shared/menu.php";
include_once "controller/clienteController.php";
$controller = new clienteController();
?>
    <div class="row">
        <div class="row">
            <div class="col-sm-11">
                <div class="panel panel-default">
                    <div class="panel-black black-sel">
                        <h3 class="panel-title">Cadastro de Clientes</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form" method="POST" role="form">
                            <input type="hidden" value="inserir" name="op"/>
                            <div class="form-group">
                                <label for="txtcliente">NOME</label>
                                <input type="text" name="txtcliente" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="txtcliente">Tipo</label>
                                <input type="radio" checked name="tpcliente" id="fisica" />Fisica
                                <input type="radio" name="tpcliente"  id="juridica" />Jurídica
                            </div>
                            <div class="form-group">
                                <label for="txtcpf" id="lblcpf">CPF</label>
                                <input type="text" name="txtcpf" id="txtcpf" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="txtcpf" id="lblcnpj">CNPJ</label>
                                <input type="text" name="txtcnpj" id="txtcnpj" class="form-control" />
                            </div>
                            <div class="form-group">

                                <label for="txtcliente">ENDERECO</label>
                                <input type="text" name="txtcliente" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="txtcliente">CEP</label>
                                <input type="text" name="txtcep" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="txtcliente">ESTADO</label>
                                <input type="text" name="txtestado" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="txtcliente">TELEFONE</label>
                                <input type="text" name="txttelefone" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="txtcliente">TELEFONE COMERCIAL</label>
                                <input type="text" name="txttelcomercial" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="txtcliente">CELULAR</label>
                                <input type="text" name="txtcelular" class="form-control" />
                            </div>

                            <input type="submit" value="Cadastrar" class="form-control"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Cadastrar Clientes</th>
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