<?php

    function bubble_sort($arr)
    {
        $size = count($arr)-1;
        for ($i=0; $i<$size; $i++)
        {
            for ($j=0; $j<$size-$i; $j++)
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
    echo implode(bubble_sort($arr), ' ');
