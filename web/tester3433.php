<?php
    if(isset($_POST['SubmitButton'])){
        $price = $_POST["price"];
        $qty = $_POST["qty"];
        $message = $price*$qty;
        if(isset($message)){
            $message = $message;
        }else{
            $message = "";
        }
    }

        ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="#" method="post">
            <input type="number" name="price"> <br>
            <input type="number" name="qty"><br>
            <input type="submit" name="SubmitButton">
        </form>
        <?php echo "The Answer is" .$message; ?>

    </body>
    </html>