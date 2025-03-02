<?php
function callApi($url, $postData, $headers = [], $timeout = 30)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => $timeout,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => array_merge(
            ['Content-Type: application/json'],
            $headers
        ),
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_VERBOSE => true,
    ));
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $curlError = curl_errno($curl);
    $curlErrorMsg = curl_error($curl);
    curl_close($curl);
    if ($curlError) {
        return [
            'error' => $curlErrorMsg,
            'http_code' => $httpCode
        ];
    }

    return [
        'data' => $response,
        'http_code' => $httpCode
    ];
}
