<?php

    $m = $n = $argv[1];
    $a = [];
    $k = 1;
    if($m >= 1)
    {
        for($i=0; $i<$n; $i++)
        {
            if ($i % 2 == 0)
            {
                for ($j = 0; $j < $m; $j++)
                {
                    $a[$i][$j] = $k++;
                }
            }
            else
            {
                for ($j = $n-1; $j >= 0; $j--)
                {
                    $a[$i][$j] = $k++;
                }
            }
        }


        for($i=0; $i<$n; $i++)
        {
            echo PHP_EOL;
            for ($j = 0; $j < $m; $j++)
            {
                echo ' ';
                echo $a[$i][$j];
            }
        }
        echo PHP_EOL;
    }
    else
    {
        echo "It must be positive and integer. " . PHP_EOL;
    }

