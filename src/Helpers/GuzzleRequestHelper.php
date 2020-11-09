<?php

namespace PhalconVee\Joker\Helpers;

class GuzzleRequestHelper
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Prepare Http Request.
     *
     * @param $method
     * @param $url
     * @param null $body
     * @return mixed|string|null
     */
    public function makeHttpRequest($method, $url, $body = null)
    {
        $response = null;

        try {
            if ($method == 'GET') {
                $response = $this->doGet($url, $body);
            } elseif ($method == 'POST') {
                $response = $this->doPost($url, $body);
            } elseif ($method == 'MULTIPART') {
                $response = $this->doMultiPart($url, $body);
            }

            $response = json_decode($response->getBody());

            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get Query.
     *
     * @param $url
     * @param array $body
     * @return mixed
     */
    public function doGet($url, $body = [])
    {
        return $this->client->request('GET', $url, [
            'query' => $body,
        ]);
    }

    /**
     * Post Query.
     *
     * @param $url
     * @param $body
     * @return mixed
     */
    public function doPost($url, $body)
    {
        return $this->client->request('POST', $url, [
            'form_params' => $body,
        ]);
    }

    /**
     * Multipart Query.
     *
     * @param $url
     * @param array $body
     * @return mixed
     */
    public function doMultiPart($url, $body = [])
    {
        return $this->client->request('POST', $url, [
            'multipart' => $body,
        ]);
    }
}
