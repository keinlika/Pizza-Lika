<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Server Side Form Processing Using PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="pizza.css">
</head>
<body>
    <h1 style="text-align: center;"><?php echo "Order " . $_GET["submit"] . " <br/>";
                                                if($_GET["submit"] == "confirmed")
                                                    echo "Thank you trusting Pizza Lika.";
                                                else
                                                    echo "Thank you for using our service."; ?></h1>
</body>
