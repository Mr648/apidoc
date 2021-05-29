<?php

if (!function_exists('ergol')) {

    /**
     *
     * @param $route
     * @return string
     */
    function ergol($route): string
    {
        return sprintf('%s://%s%s', 'http', 'mekapps.ir', $route);
    }
}


if (!function_exists('colorize')) {

    function colorize($code)
    {
        $array = [
            '200' => 'border selection green',
            '201' => 'border selection green',
            '204' => 'border selection green',
            '202' => 'border selection green',
            '400' => 'border selection dark',
            '404' => 'border selection dark',
            '403' => 'border selection red',
            '401' => 'border selection red',
            '408' => 'border selection dark',
            '504' => 'border selection red',
            '303' => 'border selection red',
            '503' => 'border selection red',
            '500' => 'border selection red',
            '700' => 'border selection param',
            '648' => 'border selection me',
            '100' => 'border selection link',
        ];

        return $array[$code];
    }
}
