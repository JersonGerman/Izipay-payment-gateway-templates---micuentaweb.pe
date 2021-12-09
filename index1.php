<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izipay incrustado</title>

    <!-- Libreria Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Librería Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <style>
        .container{
            margin-top:100px;
        }

    </style>

</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-offset-3">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="price">$67</h3>
                </div>
                <div class="card-block">
                    <form action="formulario-ipn.php" method="POST">
                        <div class="card-title text-center">
                            WordPress Plugin
                        </div>
                        <div class="list-group">
                            <li class="list-group-item"><input type="text" name="txtMonto" value="" required></li>
                            <li class="list-group-item"><input Type="email" name="txtEmail" value="taipejerson4@gmail.com" required></li>
                            <li class="list-group-item">Feacture 3</li>
                            <li class="list-group-item">Feacture 4</li>
                            <li class="list-group-item">Feacture 5</li>
                            <input class="btm btn-success"type="submit" value="Ir a pagar">
                        </div>
                    
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

    
</body>
</html>