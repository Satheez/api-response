<?php

if (!function_exists('api')) {
    /**
     * @return \Satheez\ApiResponse\ApiResponse
     */
    function api(): \Satheez\ApiResponse\ApiResponse
    {
        return new Satheez\ApiResponse\ApiResponse;
    }
}
