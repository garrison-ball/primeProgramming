<?php

// Change these values to use.
const VALUE1 = 99;
const VALUE2 = 100;


function findPrimesInRange($input1, $input2) {
    // Input Validation
    
    // Make sure both inputs are integers.
    if ( !is_int($input1) || !is_int($input2) ) {
        die('Error: Non-Integer Input Detected. Please enter integers.');
    }
    
    // Make sure both inputs are positive.
    if ( !( $input1 > 0 ) || !( $input2 > 0) ) {
        die('Error: Expected positive numbers.');
    }
    
    
    // Set lesser value to be $startValue; greater valuer to $endValue
    if ($input1 <= $input2) {
        $startValue = $input1;
        $endValue = $input2;
    }
    else {
        $startValue = $input2;
        $endValue = $input1;
    }
    
    // Create an empty array to store our results
    $foundPrimes = array();
    
    // Test each value and add it to the array if it is prime.
    $currentValue = $startValue;
    for ($currentValue = $startValue; $currentValue <= $endValue; $currentValue++) {
        
        if (determineIfPrime($currentValue) === true ) {
            $foundPrimes[] = $currentValue;
        }
        
    }
    
    if (count($foundPrimes > 0 )) {
        return $foundPrimes;
    }
    else {
        return false;
    }
}

function determineIfPrime($value) {
    
    if ( $value == 1 ) {
        return false;
    }
    
    $numerator = $value;
    $startDenominator = 2;
    $maxDenominator = ( ( $value / 2 ) - 1 );
    
    
    for ( $denominator = $startDenominator; $denominator <= $maxDenominator; $denominator++ ) {
        
        if ( $numerator % $denominator == 0 ) {
            return false;
        }
    }
    return true;
}

function performUnitTest() {
    
    $passedAllTests = true;
    
    $first26primes = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101);
    $test26primes = findPrimesInRange(1, 101);
    
    print_r($first26primes);
    print_r($test26primes);
    
    if ( $first26primes !== $test26primes ) {
        echo 'Error: First 26 Primes test failed. <br>';
        $passedAllTests = false;
    }
    
    $lowToHigh = findPrimesInRange(1, 10);
    $highToLow = findPrimesInRange(10, 1);
    
    if ( $lowToHigh !== $highToLow ) {
        echo 'Error: Inverse range test failed. <br>';
        $passedAllTests = false;
    }
    
    $primes7900to7920 = array(7901, 7907, 7919);
    $test7900to7920 = findPrimesInRange(7900, 7920);
    
    if ( $primes7900to7920 !== $test7900to7920 )
    {
        echo 'Error: 7900 - 7920 range test failed. <br>';
        $passedAllTests = false;
    }
    
    return $passedAllTests;
    
}

?>



<!DOCTYPE html>
<!--
    Created by Garrison Ball for UpDox Code Challenge
    
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Prime number results! </title>
    </head>
    <body>

        <?php
            
            performUnitTest();
            
            $primes = findPrimesInRange(VALUE1, VALUE2);
            
            if ( $primes ) {
                echo "<ol id=\"primes\">";
                foreach ( $primes as $thisPrime ) {
                    echo "<li> $thisPrime </li>";
                }
                echo "</ol>";
            }
            
            else {
                echo "No primes found.";
            }
        ?>
    </body>
</html>
