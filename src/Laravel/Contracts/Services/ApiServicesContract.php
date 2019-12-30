<?php

namespace Biznetrepo\Laravel\Contracts\Services;

interface ApiServicesContract
{
    /**
     * get data
     *
     * @param [type] $url
     * @param [type] $params
     * @return void
     */
    public function getData($url, $params);

    /**
     * post data
     *
     * @param [type] $url
     * @param [type] $params
     * @return void
     */
    public function postData($url, $params);
}
