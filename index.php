<?php
    require 'rb.php';
    R::setup( 'mysql:host=localhost;dbname=request','root', '' );

    if ( !R::testConnection() ){exit();}
    if (isset($_GET['del'])){
        $id = $_GET['id'];
        $element_delet = R::findOne('requests', "id = '$id'", array($id));
        R::trash($element_delet);
    }

    function id_amount(){

        $ids = [];
        $count = R::count('requests');
        for ($g = 0; $g < $count; $g++){
            $ids[$g] = $g+1;
        }
        return $ids;
    }
    
    $ids = id_amount();
    $requests = R::loadAll('requests', $ids);
    R::close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>   
<body>
    <div class="wrapper">
        <div class="box">

            <div class="box__title">
                <div class="item">id</div>
                <div class="item">artcl</div>
                <div class="item">name</div>
                <div class="item">amount</div>
                <div class="item">price</div>
                <div class="item">total</div>
            </div>
            <?php 
                foreach ( $requests as $request){
                    echo '<form class="box__info" action="index.php" method="GET">';
                    echo '<input class="box__content" name="id" value=',$request['id'],'>',"\n";
                    echo '<p class="box__content" name="artcl">', $request['artcl'] ,'</p>',"\n";
                    echo '<p class="box__content" name="name">', $request['name'] ,'</p>',"\n";
                    echo '<p class="box__content" name="amount">', $request['amount'] ,'</p>',"\n";
                    echo '<p class="box__content" name="price">', $request['price'] ,'</p>',"\n";
                    echo '<p class="box__content" name="total">', $request['total'] ,'</p>',"\n";
                    echo '<input class="btn box__link" id="edit" type="submit" name="del" value="удалить">';
                    echo '</form>';
                }
            ?>
            <a href="./create.php"><button class="btn btn_create">создать</button></a>
        </div>
    </div>
</body>
</html>