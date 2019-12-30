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
            if ($data['code'] == 400) {
                $data = [];
            }
            if ($data['data']) {
                $data = collect($data['data'])->toArray();
            }
        }
        return $data;
    }

}
