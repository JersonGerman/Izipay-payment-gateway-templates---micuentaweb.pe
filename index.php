<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izipay incrustado</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
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
                    <h3 class="price">Pasarela de Pago Izipay</h3>
                </div>
                <div class="card-block">
                        <div class="card-title text-center">
                            Seccionar tipo de formulario
                        </div>
                        <form id="form" action="#" method="POST">
                            <div class="list-group">

                                <li class="list-group-item text-center">
                                    <label for="radioForm1" class="form-check-label">Incrustado</label>
                                    <input id="radioForm1" class="form-check-input" type="radio" name="radioForm" value="1" checked>
                                    <label for="radioForm2" class="form-check-label">Redirección</label>
                                    <input id="radioForm2" class="form-check-input" type="radio" name="radioForm" value="2">
                                </li>

                                <li class="list-group-item">
                                    <input id="txtMonto" type="number" name="txtMonto" value="" required placeholder="Ingrese un monto">
                                </li>
                                <li class="list-group-item">
                                    <input Type="email" name="txtEmail" value="" required placeholder="Correo electrónico">
                                </li>
                                <li class="list-group-item">
                                    <input Type="text" name="txtNombre" value="" required placeholder="Nombres">
                                </li>
                                <li class="list-group-item">
                                    <input Type="text" name="txtApellido" value="" required placeholder="Apellidos">
                                </li>
                                <li class="list-group-item">
                                    <span id="fecha"></span>
                                </li>
                                <li id="groupInput" class="list-group-item" style="display:none;"></li>
                                <button id="btnSend" class="btm btn-success" type="submit" name="pagar" value="Pagar">Ir a pagar</button>
                            </div>
                        </form>

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    mostrarFecha();

    document.getElementById('btnSend').addEventListener('click', (e)=>{
        e.preventDefault();
        let formulario = document.getElementById('form');
        let groupInput = document.getElementById('groupInput');
        groupInput.innerHTML = '';
        // console.log(radioForm1)7
        if(document.getElementById('radioForm1').checked == true){
            formulario.setAttribute('action','formulario.php');
        }
        if(document.getElementById("radioForm2").checked == true){
            formulario.setAttribute('action','https://secure.micuentaweb.pe/vads-payment/');
            addInput(groupInput,'vads_action_mode','INTERACTIVE');
            addInput(groupInput,'vads_amount',document.getElementById('txtMonto').value);
            addInput(groupInput,'vads_ctx_mode','TEST');
            addInput(groupInput,'vads_currency','604');
            addInput(groupInput,'vads_page_action','PAYMENT');
            addInput(groupInput,'vads_site_id','51447378');
            addInput(groupInput,'vads_trans_date','20211128');
        }

        
        formulario.submit();
    });

    function addInput(padre, name, valor){
        let inputAdd = document.createElement('input');
        inputAdd.setAttribute('type','hidden');
        inputAdd.setAttribute('name',name);
        inputAdd.setAttribute('value',valor);
        padre.appendChild(inputAdd);
    }

    function mostrarFecha(){
        setInterval(function(){
            let today = new Date();
            let date = `${today.getDate()}-${today.getMonth()+1}-${today.getFullYear()}`;
            let hour = `${today.getUTCHours()}:${today.getMinutes()}:${today.getSeconds()}`
            document.getElementById('fecha').innerHTML = date + "/"+hour;
        },1000);
    }
    function obtenerFechaUTC(){
        let today = new Date();
        let date = `${today.getFullYear()}${today.getMonth()}${today.getDate()}`
        let hour = `${today.getUTCHours()}:${today.getMinutes()}:${today.getSeconds()}`
    }


        

</script>

    
</body>
</html>