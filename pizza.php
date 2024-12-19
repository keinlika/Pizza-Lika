<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Server Side Form Processing Using PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="pizza.css">
</head>
<body>
<?php
    //No validation here, done in front-end
    function calculateTotal() {
        $total = 0;

        if (isset($_GET['pizzas'])) {
            foreach ($_GET['pizzas'] as $pizza) {
                $parts = explode('-', $pizza);
                $total += $parts[1]; //get the price
            }
        }

        return $total;
    }

    function getOrderedPizzas() {
        $orderedPizzas = "";

        if (isset($_GET['pizzas'])) {
            foreach ($_GET['pizzas'] as $pizza) {
                $parts = explode('-', $pizza);
                //Ex: Pepperoni: $4.30
                $orderedPizzas .= $parts[0] . ": $" . $parts[1] . "\n";
            }
        }

        return $orderedPizzas;
    }

    function getDateOfOrder() {
        $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        if (isset($_GET['cc-exp'])) {
            $date = explode('/', $_GET['cc-exp']);
            $year = $date[1];
            $monthNumber = $date[0];

            return $months[$monthNumber - 1] . ", " . $year;
        }

        return "";
    }
?>
<div id="content">
    <h2>Please review your order before purchase.</h2>
    <div style="margin: auto; width: 85%;">
        <form id="menu" method="GET" action="pizza_a.php">
            Name: <input style="width: 100%;" type="text" value="<?php echo $_GET['name'] ?? ''; ?>" readonly/><br><br>
            Last Name: <input style="width: 100%;" type="text" value="<?php echo $_GET['last-name'] ?? ''; ?>" readonly/><br><br>
            Address: <input style="width: 100%;" type="text" value="<?php echo $_GET['address'] ?? ''; ?>" readonly/><br><br>
            Phone: <input style="width: 100%;" type="text" value="<?php echo $_GET['phone'] ?? ''; ?>" readonly/><br><br>
            Items for Purchase:<br>
            <textarea style="width: 100%; min-height: 75px;" readonly><?php echo getOrderedPizzas(); ?></textarea><br><br>
            Total: <input style="width: 100%;" type="text" value="<?php echo "$" . number_format(calculateTotal(), 2); ?>" readonly/><br><br>
            Credit Card: <input style="width: 100%;" type="text" value="<?php echo $_GET['cc-type'] ?? ''; ?>" readonly/><br><br>
            Card Number: <input style="width: 100%;" type="text" value="<?php echo $_GET['cc-nr'] ?? ''; ?>" readonly/><br><br>
            Card Exp: <input style="width: 100%;" type="text" value="<?php echo getDateOfOrder(); ?>" readonly/><br><br>
            <div style="text-align: center;">
                <button type="submit" name="submit" value="canceled" class="button">Cancel</button>
                <button type="submit" name="submit" value="confirmed" class="button">Confirm</button>
            </div>
        </form>
    </div>
</div>
</body>

</html>
