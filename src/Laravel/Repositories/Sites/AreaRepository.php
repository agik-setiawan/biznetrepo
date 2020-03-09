<?php

namespace Biznetrepo\Laravel\Repositories\Sites;

use Biznetrepo\Laravel\Contracts\Sites\AreaContract;
use Biznetrepo\Laravel\Services\ApiServices;

class AreaRepository implements AreaContract
{

    public $apiServices;

    public function __construct()
    {
        $this->apiServices = new ApiServices();
    }

    public function getCityAvailable()
    {
        $data = collect($this->apiServices->getData("/v2/coverage-city", ""))->toArray();
        if ($data) {
            if (isset($data['code'])) {
                if ($data['code'] == 400) {
                    $data = [];
                }
            }
            if (isset($data['data'])) {
                $data = collect($data['data'])->toArray();
            }
        }
        return $data;
    }

    public function getCityAvailableInstance()
    {
        $datas = $this->getCityAvailable();
        $response = "";
        foreach ($datas as $key => $value) {
            $response .= $value->CITY_NAME . " | ";
        }

        return $response;
    }
}
