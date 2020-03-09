<?php

namespace Biznetrepo\Laravel\Services;

use GuzzleHttp\Client;
use Log;
use stdClass;
use Biznetrepo\Laravel\Contracts\Services\ApiServicesContract;

/**
 * ApiServices class
 */
class ApiServices implements ApiServicesContract
{

    /**
     * headers
     *
     * @var [type]
     */
    public $headers;

    /**
     * host from api backend
     *
     * @var [type]
     */
    public $host;

    /**
     * construct function
     */
    public function __construct()
    {
        $this->headers = config("api_biznet.headers");
        $this->host = config('api_biznet.host');
    }
    /**
     * get data from api backend
     *
     * @param [type] $url
     * @param [type] $param
     * @return void
     */
    public function postData($url, $params)
    {
        $client = new \GuzzleHttp\Client();

        $url = $this->host . $url;
        try {
            $request = $client->post($url, [
                'body' => json_encode($params),
                'headers' => $this->headers,
                'timeout' => 10, // Response timeout
                'connect_timeout' => 10, // Connection timeout
            ]);
            $response = json_decode($request->getBody());
            return $response;
        } catch (\Exception $e) {
            Log::info('[REST] ' . $e->getMessage());
        }
        return [];
    }

    /**
     * post data
     *
     * @param [type] $url
     * @param [type] $params
     * @return void
     */
    public function getData($url, $params)
    {
        $client = new \GuzzleHttp\Client();

        $url = $this->host . $url;
        try {
            $request = $client->get($url . '?' . $params, [
                'headers' => $this->headers
            ]);
            $response = json_decode($request->getBody());
            return $response;
        } catch (\Exception $e) {
            Log::info('[REST] ' . $e->getMessage());
        }
        return [];
    }
}
