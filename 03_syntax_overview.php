<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax Overview</title>

    

</head>
<body>
<p>This is HTML content.</p>
    <?php
// Escaping to PHP using canonical tags
?>
    <?php
    // Canonical PHP tags
    $variable = "Hello, PHP!";
    echo "<p>$variable</p>";
    ?>

    <?
    // Short-open (SGML-style) tags
    $variable = "Hello, PHP!";
    echo "<p>$variable</p>";
    ?>
    
    <?= "Hello from PHP!"; ?>
    
    <script language="php">
    // HTML script tags
    $variable = "Hello from PHP!";
    echo "<p>$variable</p>";
    </script>

    <?php
    // Single-line comments
    $variable = "Hello, PHP!";
    // This is a single-line comment

    /*
       Multi-line comments
    */
    $variable = "Hello, PHP!";
    /*
       This is a
       multi-line comment
    */
    ?>

    <?php
    // PHP is whitespace insensitive
    $variable = "Hello, PHP!";
    $variable   =    "Hello, PHP!";
    ?>


    <?php
    // PHP is case sensitive
    $myVariable = "Hello";
    $myvariable = "World";
    echo $myVariable; // Outputs "Hello"
    echo $myvariable; // Outputs "World"
    ?>

    <?php
    // Statements are expressions terminated by semicolons
    $variable1 = "Hello";
    $variable2 = "World";
    ?>

    <?php
    // Expressions are combinations of tokens
    $sum = $variable1 . " " . $variable2;
    echo $sum; // Outputs "Hello World"
    ?>

    <?php
    // Braces make blocks
    $condition = true; // Define the condition variable
    if ($condition) {
        // Code inside the block
        $result = "Condition is true";
    } else {
        // Code inside the else block
        $result = "Condition is false";
    }
    ?>

    <?php
    // Running PHP Script from Command Prompt
    echo "Hello, Command Prompt!";
    ?>
</body>
</html>

