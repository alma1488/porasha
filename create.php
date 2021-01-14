<?php 
require 'rb.php';
R::setup( 'mysql:host=localhost;dbname=request','root', '' );

if ( !R::testConnection() ){exit();}

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
    
    <form class="form" action="create.php" method="POST">
    
        <label for="artcl" class="form__content">Enter article: <input class="form__inp" type="text" name="arctl" value="article" required> </label>
        <label for="name" class="form__content">Enter name: <input class="form__inp" type="text" name="name" value="name" required> </label>
        <label for="amount" class="form__content">Enter amount: <input class="form__inp" type="number" name="amount" value="amount" required> </label>
        <label for="price" class="form__content">Enter price: <input class="form__inp" type="number" name="price" value="price" required> </label>
        <label for="total" class="form__content">Enter total: <input class="form__inp" type="number" name="total" value="total" required> </label>
    
        <a href="index.php" class="form__link"><input type="submit" value="create" class="btn btn_form"></a>
        <a class="create__link" href="./index.php">go back</a> 
    </form>

    <?php 

        if( isset( $_POST['submit'] ) )

            echo '<a class="create__link" href="./index.php">', 'go back', '</a>';   

            $requests = R::dispense('requests');

            $requests->artcl = $_POST['arctl'];
            $requests->name = $_POST['name'];
            $requests->amount = $_POST['amount'];
            $requests->price = $_POST['price'];
            $requests->total = $_POST['total'];

            R::store( $requests );

    ?>

</body>
</html>