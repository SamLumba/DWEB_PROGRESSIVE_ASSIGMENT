<?php
declare(strict_types=1); //Strict types

// VARIABLES & arrays
$cars = ["Porsche 911", "Lamborghini Hurucan", "Ferrari F40", "McLaren F1", "Audi R8", "BMW i8", "Mercedes AMG GT", "Tesla Model S"];
$prices = [150000, 200000, 250000, 300000, 180000, 160000, 220000, 140000];
$tax = 1.13;

//Temporary for module 2 user transactions
$choice1 = "Lamborghini Hurucan";
$money1 = 160000;

$choice2 = "Porsche 911";
$money2 = 10000000;

// 3. A global variable
$taxRate = 12; 

//associative array
// umulet for module 1 and 3 need palitan. for effieicncy
$newCarsArray = [ 
    "Porsche 911" => ["price" => 150000, "stock" => 3],
    "Lamborghini Hurucan" => ["price" => 200000, "stock" => 2],
    "Ferrari F40" => ["price" => 250000, "stock" => 1],
    "McLaren F1" => ["price" => 300000, "stock" => 13],
    "Audi R8" => ["price" => 180000, "stock" => 5],
    "BMW i8" => ["price" => 160000, "stock" => 12],
    "Mercedes AMG GT" => ["price" => 220000, "stock" => 2],
    "Tesla Model S" => ["price" => 140000, "stock" => 10]
];


function get_reorder_message(int $stockLevel): string {
    return ($stockLevel < 10) ? "Yes" : "No"; 
}
function get_total_value(float $price, int $quantity): float {
    return $price * $quantity;
}
function get_tax_due(float $price, int $quantity, int $taxRate = 0): float {
    return ($price * $quantity) * ($taxRate / 100);
}



// ========================================== MODULE 1 ==================================
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

    $images = [ // added 4 more cars
        "https://photos.prestigeimports.net/prestige-imports-content/uploads/2021/11/2019-Porsche-911-Carrera-GTS-WP0AB2A93KS114265-03.jpg",
        "https://images.hdqwalls.com/download/lamborghini-huracan-side-view-5k-x9-1920x1200.jpg",
        "https://i.pinimg.com/originals/6a/11/31/6a113106a3c0b49818ec0fd31957a256.jpg",
        "https://www.topgear.com/sites/default/files/images/news-article/2018/06/f4ab67d20ef024c7fa6462dd2746da69/1995_mclaren_f1_2.jpg?w=1280&h=720",
        "https://th.bing.com/th/id/R.e92d61684b26451a400d64b83aaf8241?rik=441mRXXFyKN1SQ&riu=http%3a%2f%2fwww.wallpaperbetter.com%2fwallpaper%2f933%2f390%2f417%2f2016-audi-r8-side-view-blue-car-1080P-wallpaper.jpg&ehk=t%2bG3ZHv%2fufipeaFZ%2fqgfvi5f%2f4hZII9eUJ0iErHRd10%3d&risl=&pid=ImgRaw&r=0",
        "https://tse1.explicit.bing.net/th/id/OIP.RWwGU_BjDhdCHgSvlUyfdAHaEo?rs=1&pid=ImgDetMain&o=7&rm=3", 
        "https://rare-gallery.com/uploads/posts/880627-AMG-GT-Mercedes-Benz-Side-Green-Metallic.jpg",
        "https://www.autospies.com/images/users/Agent009/images/tesla-model-s-02-2.jpg" 
    ];

    for ($i = 0; $i < count($cars); $i++) { ?>
        <li>
            <div class='image-container'>
                <img src='<?= $images[$i] ?>' alt='<?= $cars[$i] ?>'>
            </div>
            <br><?= $cars[$i] ?> - ₱<?= number_format($prices[$i], 2) ?>
        </li>
    <?php } ?>
    </ul>
</section>

<section id="transactions">
    <h2>Transactions</h2>
    <?php // ========================================== MODULE 2 =========================================
    // User1 transaction hard coded
    for ($i = 0; $i < count($cars); $i++) {
        if ($cars[$i] == $choice1) {
            $priceWithTax = $prices[$i] * $tax;
            if ($money1 >= $priceWithTax) { ?>
                <p>Sam bought <?= $cars[$i] ?> successfully! Total: $<?= number_format($priceWithTax, 2) ?></p>
            <?php } else { ?>
                <p>Sam cannot buy <?= $cars[$i] ?>: Not enough money.</p>
            <?php }
        }
    }

    // User2 transaction 
    for ($i = 0; $i < count($cars); $i++) {
        if ($cars[$i] == $choice2) {
            $priceWithTax = $prices[$i] * $tax;
            if ($money2 >= $priceWithTax) { ?>
                <p>Michael Jordan bought <?= $cars[$i] ?> successfully! Total: $<?= number_format($priceWithTax, 2) ?></p>
            <?php } else { ?>
                <p>Michael Jordan cannot buy <?= $cars[$i] ?>: Not enough money.</p>
            <?php }
        }
    }
    ?>
</section>



<?php //========================================== MODULE 3 ======================================== ?>


<section id="stock-monitor">
    <h2>Stock Monitoring</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Stocks</th>
                <th>Reorder?</th>
                <th>Total Value</th>
                <th>Tax Due</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($newCarsArray as $prod1 => $data) {
                $price = $data['price'];
                $stock = $data['stock'];
                ?>
                <tr><script></script>
                    <td><?= $prod1 ?></td>
                    <td><?= $data['stock'] ?></td>
                    <td><?= get_reorder_message($data['stock']) ?></td>
                    <td>₱<?= number_format(get_total_value($data['price'], $data['stock']), 2) ?></td>
                    <td>₱<?= number_format(get_tax_due($data['price'], $data['stock'], $taxRate), 2) ?></td>
                </tr>
            <?php } 
            ?>

        </tbody>
    </table>
</section>

<?php
include 'footer.php';
?>

</body>
</html>