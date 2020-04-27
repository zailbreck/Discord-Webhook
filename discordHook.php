<?php

//Your Webhook URL
$url = "YOUR_URL_WEBHOOK";

$payload = json_encode(array(
    'username' => "Mikroskil Bot",
    'avatar_url' => "https://pbs.twimg.com/profile_images/456379770700181506/2fnlPhty_400x400.jpeg",
    'content' => "Selamat Datang Di Bot Mikroskil",
    'tts' => false,
    'file' => "",
    'embeds' => [
        /*
         * Our first embed
         */
        [
            // Set the title for your embed
            "title" => "Google.com",
            
            // The type of your embed, will ALWAYS be "rich"
            "type" => "rich",
            
            // A description for your embed
            "description" => "",
            
            // The URL of where your title will be a link to
            "url" => "https://www.google.com/",
            
            /* A timestamp to be displayed below the embed, IE for when an an article was posted
             * This must be formatted as ISO8601
             */
            "timestamp" => "2018-03-10T19:15:45-05:00",
            
            // The integer color to be used on the left side of the embed
            "color" => hexdec( "FFFFFF" ),
            
            // Footer object
            "footer" => [
                "text" => "Google TM",
                "icon_url" => "https://pbs.twimg.com/profile_images/972154872261853184/RnOg6UyU_400x400.jpg"
            ],
            
            // Image object
            "image" => [
                "url" => "https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png"
            ],
            
            // Thumbnail object
            "thumbnail" => [
                "url" => "https://pbs.twimg.com/profile_images/972154872261853184/RnOg6UyU_400x400.jpg"
            ],
            
            // Author object
            "author" => [
                "name" => "Alphabet",
                "url" => "https://www.abc.xyz"
            ],
            
            // Field array of objects
            "fields" => [
                // Field 1
                [
                    "name" => "Data A",
                    "value" => "Value A",
                    "inline" => false
                ],
                // Field 2
                [
                    "name" => "Data B",
                    "value" => "Value B",
                    "inline" => true
                ],
                // Field 3
                [
                    "name" => "Data C",
                    "value" => "Value C",
                    "inline" => true
                ]
            ]
        ]
    ]
));


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$result = curl_exec($ch);

if($errno = curl_errno($ch)) {
    $error_message = curl_strerror($errno);
    //throw new \Exception("cURL error ({$errno}):\n {$error_message}");
    echo $errno ." | ". $error_message;
}

$json_result = json_decode($result, true);

if (($httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE)) != 204)
{
    //throw new \Exception($httpcode . ':' . $result);
    //echo $httpcode." | ". $result;
}


curl_close($ch);

?>
