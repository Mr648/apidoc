<?php

if (!function_exists('unique_code')) {

    function unique_code($limit)
    {
        return substr(
            base_convert(
                sha1(
                    uniqid(mt_rand())
                )
                , 16
                , 36
            )
            , 0
            , $limit
        );
    }
}
