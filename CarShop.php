<?php 

// VARIABLES & arrays
$cars = ["Porsche 911", "Lamborghini Hurucan", "Ferrari F40", "McLaren F1"];
$prices = [150000, 200000, 250000, 300000];
$tax = 1.13;
$stock = [3, 0, 1, 2];

//User1 hard coded
$choice1 = "Lamborghini Hurucan";
$money1 = 160000;

//User2
$choice2 = "Porsche 911";
$money2 = 10000000;

$totalprices = (($prices[0] + $prices[1] + $prices[2] + $prices[3]) * $tax);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sam Lumba Automobile</title>
<link rel="stylesheet" href="Styles.css">
</head>
<body>

<?php
include 'header.php';
?>

<section id="inventory">
    <h2>Inventory</h2>
    <ul class="cars">
    <?php
    $images = [
        "https://static1.topspeedimages.com/wordpress/wp-content/uploads/2024/02/porsche-911-turbo-s.jpg",
        "https://drivar.com.au/wp-content/uploads/2024/03/pexels-auto-records-10292235-scaled.jpg",
        "https://th.bing.com/th/id/R.dd2d4ae71777359882ea6daf3627cafd?rik=pcAvAQMqrsTLGA&riu=http%3a%2f%2fsilodrome.com%2fwp-content%2fuploads%2f2013%2f11%2f1990-Ferrari-F40-4.jpg&ehk=k3BU1U4JkBychvzU7%2fWRDwSO0mRhnb9D0rDr4wTLnUc%3d&risl=&pid=ImgRaw&r=0",
        "https://1cars.org/wp-content/uploads/2019/11/McLaren-F1-12.jpg"
    ];

    for ($i = 0; $i < count($cars); $i++) {
        echo "<li>";
        echo "<img src='" . $images[$i] . "' alt='" . $cars[$i] . "' style='width:300px;height:auto;'>";
        echo "<br>" . $cars[$i] . " - $" . number_format($prices[$i], 2);
        echo "<br>Stock: " . $stock[$i];
        echo "</li>";
    }
    ?>
    </ul>

    <h2>Total Price of All Cars (including tax): $<?php echo number_format($totalprices, 2); ?></h2>
</section>

<!-- Transactions -->
<section id="transactions">
    <h2>Transactions</h2>
    <?php
// User1 transaction
    for ($i = 0; $i < count($cars); $i++) {
        if ($cars[$i] == $choice1) {
            $priceWithTax = $prices[$i] * $tax;
            if ($stock[$i] > 0 && $money1 >= $priceWithTax) {
                echo "<p>User 1 bought " . $cars[$i] . " successfully! Total: $" . number_format($priceWithTax, 2) . "</p>";
                $stock[$i]--;
            } elseif ($stock[$i] <= 0) {
                echo "<p>User 1 cannot buy " . $cars[$i] . ": Out of stock.</p>";
            } else {
                echo "<p>User 1 cannot buy " . $cars[$i] . ": Not enough money.</p>";
            }
        }
    }

// User2 transaction
    for ($i = 0; $i < count($cars); $i++) {
        if ($cars[$i] == $choice2) {
            $priceWithTax = $prices[$i] * $tax;
            if ($stock[$i] > 0 && $money2 >= $priceWithTax) {
                echo "<p>User 2 bought " . $cars[$i] . " successfully! Total: $" . number_format($priceWithTax, 2) . "</p>";
                $stock[$i]--;
            } elseif ($stock[$i] <= 0) {
                echo "<p>User 2 cannot buy " . $cars[$i] . ": Out of stock.</p>";
            } else {
                echo "<p>User 2 cannot buy " . $cars[$i] . ": Not enough money.</p>";
            }
        }
    }
    ?>
</section>

<?php
include 'footer.php';
?>

</body>
</html>
