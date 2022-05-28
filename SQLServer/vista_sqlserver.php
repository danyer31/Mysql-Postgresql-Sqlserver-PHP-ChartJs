<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/sandstone/bootstrap.min.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="navbar-collapse collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href="http://localhost/KPI_Project/MySQL/vista_mysql.php">MySql
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="http://localhost/KPI_Project/Postgres/vista_postgres.php">Postgresql
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/KPI_Project/SQLServer/vista_sqlserver.php">SQLServer</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-7">
            <div class="card border-info">
                <div class="card-header">
                    KPI
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <button class="btn btn-primary" onClick="CargarDatosGraficoBarS()">Generar</button>
                        </div>
                        <canvas id="Chart3" width="350" height="150"></canvas>
                    </div>
                </div>
                </div>

        </div>
        <div class="col-md-5">
            <div class="card border-success">
                <div class="card-header">
                    Ventas/Compras
                </div>
                <div class = "card-body">
                    <form action="insertar_sqlserver.php" method="post">
                        <div class="form-group">
                            <input type="text" name="nombre" placeholder="Nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="cantidad" placeholder="Cantidad" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar Registro</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>



    function CargarDatosGraficoBarS(){
        $.ajax({
            url:'modelo_grafico_sqlserver.php',
            type: 'POST'
        }).done(function(resp){
            var nombre = [];
            var cantidad = [];
            console.log(resp)
            let sentencias = resp.split(/]/);
            let infojson = sentencias[0] + ']';
            //const newStr = resp.substring(1, resp.length - 2610)
            console.log(infojson)
            var data = JSON.parse(infojson);
            console.log(data)
            for (let i = 0; i < data.length; i++) {
                nombre.push(data[i][0]);
                cantidad.push(data[i][1])      
            }

            const ctx = document.getElementById('Chart3');
            const myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: nombre,
                    datasets: [{
                        label: 'Cantidad',
                        data: cantidad,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                }
            });
        })
    }
</script>