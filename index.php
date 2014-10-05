<?php  include_once "Shared/header.php" ?>
    <script>
    $('document').ready(function(e){
        $('#btnLogin').bind('click', function(e){
            e.preventDefault();
            document.location.href = "dashboard.php";
        });
    });
    </script>
</head>
<body>

<div class="container">

    <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Acesso GHALRE</h2>
        <input type="email" class="form-control" placeholder="Email/Login" required="" autofocus="">
        <input type="password" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Lembre-se de mim
            </label>
        </div>
        <button class="btn btn-lg btn-default btn-block" id="btnLogin" type="submit">Acessar</button>
    </form>

</div>

<?php  include_once "Shared/footer.php" ?>
