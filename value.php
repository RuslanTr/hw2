<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 03.02.19
 * Time: 9:16
 */

    if (!isset($argv[1]) || filter_var($argv[1], FILTER_VALIDATE_INT) === false)
    {
        echo 'Empty price param or not number' . PHP_EOL;
        exit();
    }

    $price = $argv[1];
    $currencyNotes = array(500, 200, 100, 50, 20, 10, 5, 2, 1);
    $i = 0;
    $result = array();

    echo 'Input: ' . $price . PHP_EOL;
    while($price > 0 && $i < count($currencyNotes))
    {
        if($price < $currencyNotes[$i])
        {
            $i++;
            continue;
        }
        $price -= $currencyNotes[$i];

        if (isset($result[$currencyNotes[$i]]))
        {
            $result[$currencyNotes[$i]]++;
        }
        else
        {
        $result[$currencyNotes[$i]] = 1;
        }
    }

    echo 'Output:' . PHP_EOL;

    foreach ($result as $currencyNote => $count)
    {
        echo $currencyNote . ': '  . $count . PHP_EOL;
    }