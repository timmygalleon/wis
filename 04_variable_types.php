<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variable Types</title>
</head>
<body>
    
    <?php 
        //Integers, Doubles, Booleans, Strings
        $int_var = 123456;
        $double_var = 123.456;
        $null_var = NULL;
        $string_var = "This is a string";
        $string_var_2 = "The variable \"\$double_var\" contains $double_var";
        $string_var_2_single = 'The variable \"\$double_var\" contains $double_var';
        $string_var_3 = "B\nU\rN\tN";
        if($int_var){
            print "The boolean is true using \$int_var with a value of $int_var";
            print "<br>";
        }
        else{
            print "The boolean is false";
            print "<br>";
        }
        print "$string_var<br>";
        echo "$string_var_2<br>";
        print "$string_var_2_single<br>";
        print "$string_var_3<br>";
        
        //Local Variables
        function local_var(){
            $int_var = 987654;
            print "\$int_var inside function is $int_var<br>";
        }
        local_var();
        print "\$int_var outside function is $int_var<br>";

        //Function Parameters
        function adding($num){
            $num++;
            return $num;
        }
        $plus_one = adding(4);
        print "Return value is $plus_one<br>";

        //Global Variable
        function glob_var(){
            GLOBAL $int_var;
            $int_var = $int_var + 21;
            print "\$int_var is now $int_var<br>";
        }
        glob_var();
        print "\$int_var is still $int_var<br>";

        //Static Variable
        function countdown(){
            STATIC $count = 10;
            $count--;
            print "Countdown in $count<br>";
        }
        
        countdown();
        countdown();
        countdown();
        countdown();
        countdown();
        countdown();
        countdown();
    ?>
</body>
</html>