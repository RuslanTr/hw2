<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 02.02.19
 * Time: 22:25
 */

    $url = '';
    $option = getopt('u:', ['url::']);

    if (isset($option['u'])) {
        $url = $option['u'];
    } elseif (isset($option['url'])) {
        $url = $option['url'];
    } elseif (isset($argv[1])) {
        $url = $argv[1];
    }

    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        echo 'Wrong url' . PHP_EOL;
        exit();
    }

    echo 'Input ' . $url . PHP_EOL;
    $parts = parse_url($url);
    $host = $parts['host'];

    function getDomain($host)
    {
        if(preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $host, $matches))
        {
            return $matches['domain'];
        }

        return $host;
    }

    function getSubDomains($host)
    {
        $subDomains = $host;
        $host = getDomain($subDomains);

        $subDomains = rtrim(strstr($subDomains, $host, true), '.');

        return $subDomains;
    }

    $parts['domain'] = getDomain($host);
    $subDomain = getSubDomains($host);

    if (strlen($subDomain)) {
        $parts['subdomain'] = $subDomain;
    }

    $domainParts = explode('.', $parts['domain']);
    $parts['tdl'] = '.' . array_pop($domainParts);
    if (count($domainParts) > 1) {
        $parts['sdl'] = '.' . array_pop($domainParts) . $parts['tdl'];
    }

    if (isset($parts['query']) && strlen($parts['query']) > 0) {
        parse_str($parts['query'], $queryArray);
        $parts['parsedQuery'] = $queryArray;
    }

//extension
    $ext = pathinfo($parts['path'], PATHINFO_EXTENSION);
    if (strlen($ext) > 0) {
        $parts['extension'] = $ext;
    }

    echo 'Output: ' . PHP_EOL . json_encode($parts, JSON_PRETTY_PRINT) . PHP_EOL;
