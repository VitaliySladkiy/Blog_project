<?php

    //?api-key=eepkbBZP5wmx4gDDQiG8zuK2JYCn2LR8

    $url_viewed = 'https://api.nytimes.com/svc/mostpopular/v2/emailed/1.json';
    $url_shared = 'https://api.nytimes.com/svc/mostpopular/v2/shared/1/facebook.json';

    $APPID = 'eepkbBZP5wmx4gDDQiG8zuK2JYCn2LR8';

    $ch_viewed = curl_init();
    curl_setopt($ch_viewed, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch_viewed, CURLOPT_URL, $url_viewed.'?api-key='.$APPID);

    ($response = json_decode(curl_exec($ch_viewed), true));
    curl_close($ch_viewed);

    $ch_shared = curl_init();
    curl_setopt($ch_shared, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch_shared, CURLOPT_URL, $url_shared.'?api-key='.$APPID);


    ($shared = json_decode(curl_exec($ch_shared), true));
    curl_close($ch_shared);




//
//    $str = $response['results'][4]['media'][0]["media-metadata"][2]['url'];
//    var_dump($str);
