<?php  include_once "Shared/header.php" ?>
<script>
    var map;
    function initialize() {
        var mapOptions = {
            zoom: 8,
            center: new google.maps.LatLng(-34.397, 150.644)
        };
        map = new google.maps.Map(document.getElementById('map'),
            mapOptions);
    }
    $('document').ready(function(e){


        initialize();
        carregaMenu();

        var data = {
            labels: ["ASD-1234", "ASD-1234", "ASD-1222", "ASD-4444", "ASD-8934", "ASD-8834", "ASD-2255"],
            datasets: [
                {
                    label: "Trânsito",
                    fillColor: "#F7464A",
                    strokeColor: "#FF5A5E",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [6, 2, 12, 11, 9, 7, 3]
                },
                {
                    label: "Pneu Furado",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [2, 5, 8, 1, 12, 5, 4]
                },
                {
                    label: "Problema Mecânico",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [9, 4, 3, 3, 8, 15, 8]
                }

            ]
        };
        var ctx = document.getElementById("canvas").getContext("2d");
        var myLineChart = new Chart(ctx).Line(data, {});
    });
</script>
</head>
<body>
<?php include_once "Shared/menu.php"; ?>

<div class="row">
    <div class="col-sm-4">
        <div class="list-group">
            <a href="#" class="list-group-item black-sel">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading">List group item heading</h4>
                <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            </a>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel panel-default">
            <div class="panel-black black-sel">
                <h3 class="panel-title">Dados de Ocorr&ecirc;ncias</h3>
            </div>
            <div class="panel-body">
                <canvas id="canvas" height="450" width="660px"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row col-lg-12" style="height:350px;">
    <div class="row">
        <div class="col-md-12 black-sel space-left" style="width: 1064px;height: 30px;padding: 5px;">
            <span class="list-group-item-heading">Dados rota</span>
            <select style="color:#333">
                <option selected>VEIC - ADD-6759</option>
                <option>VEIC - AFF-6759</option>
                <option>VEIC - AEE-6759</option>
                <option>VEIC - AWW-6759</option>
                <option>VEIC - ACD-6759</option>
                <option>VEIC - AAA-6759</option>
            </select>
        </div>
    </div>
    <div id="map"></div>
</div>

</div><!-- fecha div col-md-10-->
<?php  include_once "Shared/footer.php" ?>
