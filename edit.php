<?php
    require 'rb.php';
    R::setup( 'mysql:host=localhost;dbname=request','root', '' );

    if ( !R::testConnection() ){exit();}

    function id_amount(){$ids = [];$count = R::count('requests');for ($g = 0; $g < $count; $g++){$ids[$g] = $g+1;}return $ids;}
    $ids = id_amount();$requests = R::loadAll('requests', $ids);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div class="wrapper">

        <div class="panel">
            <div class="panel__item">Request</div>
        </div>
        <div class="box">

            <div class="box__title">
                <div class="item">id</div>
                <div class="item">artcl</div>
                <div class="item">name</div>
                <div class="item">amount</div>
                <div class="item">price</div>
                <div class="item">total</div>
            </div>

            <div class="box__info" id="update">
                <div class="box__content"></div>
                <div class="box__content"></div>
                <div class="box__content"></div>
                <div class="box__content"></div>
                <div class="box__content"></div>
                <div class="box__content"></div>
            </div>


        </div>

    </div>
    <script src="./index.js"></script>
</body>
</html>