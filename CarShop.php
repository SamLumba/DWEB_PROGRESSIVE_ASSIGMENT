<?php 
$cars = ["Porsche 911", "Lamborghini Hurucan", "Ferrari F40", "McLaren F1"];
$prices = [150000, 200000, 250000, 300000];
$tax = 1.13;

$totalprices = (($prices[1] + $prices[2] + $prices[3] + $prices[0]) * $tax);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sam Lumba Automibile</title>
    <link rel="stylesheet" href="Styles.css">
</head>

<body>

<header id=header>
    <h1>Sam's Automobile</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="inventory.php">Inventory</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </nav>
</header>


<main>
    <ul class="cars">

    <?php 
    $images = [
        "https://static1.topspeedimages.com/wordpress/wp-content/uploads/2024/02/porsche-911-turbo-s.jpg",
        "https://drivar.com.au/wp-content/uploads/2024/03/pexels-auto-records-10292235-scaled.jpg",
        "https://th.bing.com/th/id/R.dd2d4ae71777359882ea6daf3627cafd?rik=pcAvAQMqrsTLGA&riu=http%3a%2f%2fsilodrome.com%2fwp-content%2fuploads%2f2013%2f11%2f1990-Ferrari-F40-4.jpg&ehk=k3BU1U4JkBychvzU7%2fWRDwSO0mRhnb9D0rDr4wTLnUc%3d&risl=&pid=ImgRaw&r=0",
        "https://1cars.org/wp-content/uploads/2019/11/McLaren-F1-12.jpg"
    ];

    // Loop through cars (hard-coded output)
    for ($i = 0; $i < count($cars); $i++) {
        echo "<li>";
        echo "<img src='" . $images[$i] . "' alt='" . $cars[$i] . "'>";
        echo "<br>" . $cars[$i] . " - $" . $prices[$i];
        echo "</li>";
    }
    ?>

    </ul>

    <h2>Total Price of All Cars (including tax): 
        $<?php echo number_format($totalprices, 2); ?>
    </h2>
</main>


<footer class=footer>
    <p>&copy; 2024 Sam's Automobile. All rights reserved.</p>
</footer>

?>

</body>
</html>
