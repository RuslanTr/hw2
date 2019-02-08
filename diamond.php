<?php

    $n = $argv[1];
    $m = $n - 1;
    if($n%2!==0 && $n>0)
    {
        for($i = 1; $i < $n ; $i++)
        {
            for($j = $i; $j < $n ; $j++)
            {
                echo '  ';
            }
            for($j = 2*$i - 1; $j > 0 ; $j--)
            {
                echo ' *';
            }
            echo PHP_EOL;

        }
        for($i = $n; $i > 0 ; $i--)
        {
            for($j = $n - $i; $j > 0; $j--)
            {
                echo '  ';
            }
            for($j = 2*$i - 1; $j > 0 ; $j--)
            {
                echo ' *';
            }
            echo PHP_EOL;
            $m++;
        }
    }
    else
    {
        echo "It must be positive,integer and odd" . PHP_EOL;
    }
