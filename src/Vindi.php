<?php

namespace Vindi;

class Vindi
{
    /**
     * This Package SDK Version.
     * @var string
     */
    public static $sdkVersion = '1.0.10';

    /**
     * The base URL for the Vindi API.
     * @var string
     */
    public static $apiBase = 'https://app.vindi.com.br/api/v1/';

    /**
     * Get Vindi API Key from environment.
     * @return string
     */
    public function getApiKey()
    {
        return \Config::get('vindi.api_key');
    }

    /**
     * Get CA Bundle Path.
     * @return string
     */
    public function getCertPath()
    {
        return realpath(sprintf('%s/%s', dirname(__FILE__), '/../data/ssl/ca-bundle.crt'));
    }
}
