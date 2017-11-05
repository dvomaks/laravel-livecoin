<?php
namespace Dvomaks\Livecoin;

class Client implements ClientContract
{
    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiSecret;


    public function __construct(array $auth, $api_url)
    {
        $this->apiUrl = $api_url;

        $this->apiKey = array_get($auth, 'key');
        $this->apiSecret =array_get($auth, 'secret');
    }

    public function exchangeTicker($params = [])
    {

    }

    private function get($api_method, $params, $private = true){

        ksort($params);
        $fields = http_build_query($params, '', '&');

        $headers = [];
        if($private === true){
            $signature = strtoupper(hash_hmac('sha256', $fields, $this->apiSecret));
            $headers = [
                "Api-Key: $this->apiKey",
                "Sign: $signature"
            ];
        }

        $ch = curl_init($this->apiUrl.$api_method."?".$fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($statusCode!=200) {
            throw new \Exception("Status code: $statusCode, response: $response");
        }

        return json_decode($response, true);
    }

    private function post($api_method, $params, $private = true){

        ksort($params);
        $fields = http_build_query($params, '', '&');
        $signature = strtoupper(hash_hmac('sha256', $fields, $this->secretKey));

        $headers = [];
        if($private === true){
            $signature = strtoupper(hash_hmac('sha256', $fields, $this->apiSecret));
            $headers = [
                "Api-Key: $this->apiKey",
                "Sign: $signature"
            ];
        }

        $ch = curl_init($this->apiUrl.$api_method);
        curl_setopt($ch, CURLOPT_POST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($statusCode!=200) {
            throw new \Exception("Status code: $statusCode, response: $response");
        }

        return json_decode($response, true);
    }
    
}