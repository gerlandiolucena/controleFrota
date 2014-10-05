<script>
    function carregaMenu(){
        $('.sub-item').bind('click', function(e){
            var hide = this.parentNode.getElementsByTagName('ul')[0];
            $('.sub-item').each(function(idx, obj){
                $(obj).removeClass('sub-item-border');
            });
            $('.hide-menu').slideUp('slow');
            if(!$(hide).is(':visible'))
            {
            $(hide).slideDown(200);
            $(this).addClass('sub-item-border');
            }
        });
    }
</script>
    <div class="row">
        <div class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Controle Frota</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Controle Frota</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Distribui&ccedil;&atilde;o</a></li>
                        <li><a href="#about">Condutores</a></li>
                        <li><a href="#contact">Ve&iacute;culo</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ocorr&ecirc;ncia<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Por tipo</a></li>
                                <li><a href="#">Por Condutor</a></li>
                                <li><a href="#">Por Ve&iacute;culo</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Cadastro</li>
                                <li><a href="#"><span class="glyphicon glyphicon-plus"></span>Nova Ocorr&ecirc;ncia</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-minus"></span>Finalizar Ocorr&ecirc;ncia</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div></div>

<div class="col-md-2">

    <div class="row">
        <!--<div class="user-panel">
            <div class="pull-left image center">
                <i class="glyphicon glyphicon-user"></i>
                <img src="img/user.jpg" style="width:45px;border-radius:25px" >
            </div>
            <div class="pull-left info">
                <p>Jeffrey <strong>Williams</strong></p>
                <a href="#"><i class="fa fa-circle text-green"></i> Online</a>
            </div>
        </div>-->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="glyphicon glyphicon-search"></i></button>
						</span>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="menu">
            <div class="sub-menu">
               <div class="sub-item"><span class="glyphicon glyphicon-plus space-left"></span><span class="space-left">Cadastro</span></div>
                <ul class="hide-menu">
                    <li><a href="setores.php">Setor</a></li>
                    <li><a href="cargo.php">Cargo</a></li>
                    <li>Funcionário</li>
                    <li>Cliente</li>
                </ul>
            </div>

            <div class="sub-menu">
                <div class="sub-item"><span class="glyphicon glyphicon-plus space-left"></span><span class="space-left">Veículo</span></div>
                <ul class="hide-menu">
                    <li><a href="tipoVeiculo.php">Tipo Veículo</a></li>
                    <li>Veículo</li>
                </ul>
            </div>
            <div class="sub-menu">
                <div class="sub-item"><span class="glyphicon glyphicon-plus space-left"></span><span class="space-left">Ocorrência</span></div>
                <ul class="hide-menu">
                    <li><a href="tipoOcorrencia.php">Tipo Ocorrência</a></li>
                    <li>Ocorrência</li>
                </ul>
            </div>
            <div class="sub-menu">
                <div class="sub-item"><span class="glyphicon glyphicon-plus space-left"></span><span class="space-left">Contatos</span></div>
                <ul class="hide-menu">
                    <li><a href="tipocontato.php">Tipo Contatos</a></li>
                    <li>Contatos Clientes</li>
                    <li>Contatos Fornecedor</li>
                </ul>
            </div>
            <div class="sub-menu">
                <div class="sub-item"><span class="glyphicon glyphicon-plus space-left"></span><span class="space-left">Fornecedores</span></div>
                <ul class="hide-menu">
                    <li>Fornecedores</li>
                    <li>Funcionários</li>
                </ul>
            </div>
            <div class="sub-menu">
                <div class="sub-item"><span class="glyphicon glyphicon-plus space-left"></span><span class="space-left">Produtos</span></div>
                <ul class="hide-menu">
                    <li><a href="tipoproduto.php">Tipo Produtos</a></li>
                    <li>Produtos</li>
                    <li>Estoque</li>
                </ul>
            </div>
            <div class="sub-menu">
                <div class="sub-item"><span class="glyphicon glyphicon-plus space-left"></span><span class="space-left">Distribuição</span></div>
                <ul class="hide-menu">
                    <li>Nota Fiscal</li>
                    <li>Documentos Nota</li>
                    <li>Distribuição</li>
                    <li>Condutor x Veículo</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="col-md-10">
