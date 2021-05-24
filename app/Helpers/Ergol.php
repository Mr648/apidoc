<?php

if (!function_exists('ergol')) {

    /**
     *
     * @param $route
     * @return string
     */
    function ergol($route): string
    {
        return sprintf('%s://%s%s', 'http', 'ergol.local', $route);
    }
}
