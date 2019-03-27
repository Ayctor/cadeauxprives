<?php

namespace Ayctor\Cadeauxprives;

use \GuzzleHttp\Client;

/**
 * Class Cadeauxprives
 * @package ayctor\Skeleton
 */
class Cadeauxprives
{
    /**
     * @var \GuzzleHttp\Client HTTP client
     */
    private $client;

    /**
     * @var string Base URI
     */
    private $base_uri;

    /**
     * @var int Site ID
     */
    private $site_id;

    /**
     * @var string Api Key
     */
    private $api_key;

    /**
     * Create a new Cadeaux privés instance
     *
     * @param $base_uri string Base URI of Cadeaux privés instance
     * @param $site_id int Site ID. Provided by Cadeaux privés
     * @param $api_key string Api Key
     */
    public function __construct($base_uri, $site_id, $api_key)
    {
        $this->base_uri = trim($base_uri, '/') . '/webservices/';
        $this->site_id = $site_id;
        $this->api_key = $api_key;

        $this->client = new Client([
            'base_uri' => $this->base_uri,
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    /**
     * @param $user_infos
     * @return mixed
     * @throws \Exception
     */
    public function updateUser($user_infos)
    {
        $user_infos['site_id'] = $this->site_id;
        $user_infos['crypt'] = hash("sha256",
            $user_infos['email']
            . $user_infos['code_client']
            . date('dmY')
            . $this->site_id
            . $this->api_key
        );

        try {
            $response = $this->client->post('user/update', ['json' => $user_infos]);

            $res = json_decode($response->getBody()->getContents());
            $res->login_url = $this->base_uri . 'login?token=' . $res->token;

            return $res;
        } catch (\Exception $e) {
            throw new \Exception($e->getResponse()->getBody()->getContents(), $e->getCode());
        }
    }
}
