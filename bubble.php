<?php

    function bubbleSort($arr)
    {
        $n = count($arr)-1;
        for ($i=1; $i<$n; $i++)
        {
            for ($j=$n; $j >= $i; $j--)
            {
                if ($arr[$j] < $arr[$j-1])
                {
                    list($arr[$j-1], $arr[$j]) = array($arr[$j], $arr[$j-1]);
                }
            }
        }
        return $arr;
    }
    $arr = [5, 1, 43, 4, 6, 15, -1, 0, 16, 'abc', -14, 7, 9];
    echo implode(bubbleSort($arr), ' ');
