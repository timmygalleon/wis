<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Types</title>
</head>
<body>
    
<?php
// Addition
$num1 = 10;
$num2 = 5;
$sum = $num1 + $num2;
echo "Addition: $num1 + $num2 = $sum<br>";

// Subtraction
$diff = $num1 - $num2;
echo "Subtraction: $num1 - $num2 = $diff<br>";

// Multiplication
$product = $num1 * $num2;
echo "Multiplication: $num1 * $num2 = $product<br>";

// Division
$quotient = $num1 / $num2;
echo "Division: $num1 / $num2 = $quotient<br>";

// Modulus (Remainder)
$remainder = $num1 % $num2;
echo "Modulus (Remainder): $num1 % $num2 = $remainder<br>";

// Exponentiation
$power = pow($num1, $num2);
echo "Exponentiation: $num1 ^ $num2 = $power<br>";

// Increment
$num3 = 5;
$num3++;
echo "Increment: num3++ = $num3<br>";

// Decrement
$num4 = 8;
$num4--;
echo "Decrement: num4-- = $num4<br>";
?>

</body>
</html>