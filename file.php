<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $url = 'http://e.znotez.com/api/1/setText';
    if(isset($_POST['data'])) {
        $data = array('apikey' => '2a6e9953aed68276954081992e90d452c3b2c9eb27a12a1d565db8e2800c2fe5',
                  'padID' => 'timercity.dev',
                  'text' => $_POST['data']);
    }

// use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    var_dump($result);
}
