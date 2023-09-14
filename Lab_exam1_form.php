<!-- Jai shree ram -->


<!DOCTYPE html>
<html>
<head>
    <title>Hire Taxi - Jabalpur Travels</title>
    <style>
        body
        {
            background-color: rgb(228, 123, 24);
            /* display: flex;
            flex-direction:column;
            justify-content: center;
            text-align: center;
            margin-top: 50px;
            height: 150px;
            padding-top: 100px;
            font-size:20px; */
        }
    </style>
</head>
<body>
    <h1>Hire Taxi - Jabalpur Travels</h1>
    
    <?php
    $cabTypes = array(
        "Economy" => 5,
        "Standard" => 8,
        "Premium" => 10
    );
    $name = "";
    $contactNumber = "";
    $pickupAddress = "";
    $destinationAddress = "";
    $cabType = "";
    $tripDistance = "";
    $promoCode = "";
    $discountAmount = 0;
    $name = $_POST["name"];
    $contactNumber = $_POST["contactNumber"];
    $pickupAddress = $_POST["pickupAddress"];
    $destinationAddress = $_POST["destinationAddress"];
    $cabType = $_POST["cabType"];
    $tripDistance = floatval($_POST["tripDistance"]);
    $promoCode = $_POST["promoCode"];
    $baseFare = $cabTypes[$cabType] * $tripDistance;
    echo "<h2>Booking Details:</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Contact Number: $contactNumber</p>";
    echo "<p>Pickup Address: $pickupAddress</p>";
    echo "<p>Destination Address: $destinationAddress</p>";
    echo "<p>Cab Type: $cabType</p>";
    echo "<p>Trip Distance: $tripDistance km</p>";
    echo "<p>Promo Code/Discount Amount: $promoCode</p>";
    echo "<h2>Payment Details:</h2>";
    echo "<p>Base Fare: Rs. $baseFare</p>";
    echo "<p>Discount Applied: Rs. $promoCode</p>";
    if ($baseFare >= 2 * $promoCode) {
        $final_cost = $baseFare - $promoCode;
    } else {
        $final_cost = $baseFare;
    }
    echo "<h3>Final Cost: Rs. " . $final_cost . "</h3>";

        $payment_methods = [
            'credit_card' => 'Credit Card',
            'debit_card' => 'Debit Card',
            'cash' => 'Cash',
            'upi' => 'UPI',
        ];

        echo "<h3>Payment Information:</h3>";
        echo "<form method='post' action='conform.php'>";
        echo "<label for='payment_method'>Mode of Payment:</label>";
        echo "<select id='payment_method' name='payment_method' required>";
        $ans = "";
        foreach ($payment_methods as $key => $value) {
            echo "<option value='$key'>$value</option>";
            $ans = $value;
        }
        echo "</select><br><br>";

        $card_discount = 0;
        if ($ans == 'credit_card' || $ans == 'debit_card') {
            $card_discount = 0.05 * $final_cost;
            $final_cost -= $card_discount;
            echo "<p>The card offers an extra 5% off on Bharat Bank credit and debit cards.</p>";
            echo "<p>Discount Applied: Rs. " . $card_discount . "</p>";
        }

        echo "<p>Net Payment Amount: Rs. " . $final_cost . "</p>";
        echo "<input type='submit' name='confirm_booking' value='Confirm Booking'>";
        echo "</form>";
    
    ?>

</body>
</html>
