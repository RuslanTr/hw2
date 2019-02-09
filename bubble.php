<?php

    function bubbleSort($arr)
    {
        $n = count($arr)-1;
        for ($i=0; $i<$n; $i++)
        {
            for ($j=0; $j<$n-$i; $j++)
            {
                $k = $j+1;
                if ($arr[$k] < $arr[$j])
                {
                    list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
                }
            }
        }
        return $arr;
    }
    $arr = [5, 1, 43, 4, 6, 15, -1, 0];
    echo implode(bubbleSort($arr), ' ');
