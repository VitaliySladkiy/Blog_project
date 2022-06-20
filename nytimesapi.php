<?php

    //?api-key=eepkbBZP5wmx4gDDQiG8zuK2JYCn2LR8
    $url = 'https://api.nytimes.com/svc/mostpopular/v2/emailed/1.json';

    $APPID = 'eepkbBZP5wmx4gDDQiG8zuK2JYCn2LR8';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url.'?api-key='.$APPID);

    $response = json_decode(curl_exec($ch), true);
    curl_close($ch);

    echo '<pre>';
    var_dump($response);