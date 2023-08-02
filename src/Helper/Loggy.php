<?php

namespace Kouroo\Loggy\Helper;

class Loggy {

    public function __construct()
    {
    }

    public static function sendException($e)
    {
        $curl = curl_init();

        $uri  = $_ENV['LOGGY_API_URL'];
        $url  = $uri . '/site/' . $_ENV['LOGGY_SITE_ID'] . '/log?token=' . $_ENV['LOGGY_SITE_TOKEN'];

        $method = 'POST';
        $fields = array(
            'status_code' => $e->getCode(),
            'message' => $e->getMessage()
        );

        $response = self::send($url, $method, $fields);
    }

    public static function send($url, $method = 'GET', $fields = [], $bearer = null)
    {
        $curl = curl_init();

        $opt_array = array(
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            //CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,
        );

        // Add post datas
        if( strtoupper($method) == 'POST' && !empty($fields) ){
            $opt_array[CURLOPT_POSTFIELDS] = $fields;
        }

        // Add Authorization bearer
        if( !empty($bearer) ){
            $opt_array[CURLOPT_HTTPHEADER] = array(
                'Authorization: Bearer ' . $bearer
            );
        }

        curl_setopt_array($curl, $opt_array);

        $response = curl_exec($curl);

        curl_close($curl);
    }

}