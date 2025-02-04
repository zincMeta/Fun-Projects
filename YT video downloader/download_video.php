<?php

ob_end_clean();
ob_start();

set_time_limit(0);
ini_set('memory_limit', '512M');

$link = filter_var($_GET['id'], FILTER_SANITIZE_URL);


$link_data = json_decode(urldecode($link));

$video_url = $link_data[0];
$title_url = $link_data[1];

$forbiden = curl_init();

curl_setopt($forbiden, CURLOPT_URL, $video_url);
curl_setopt($forbiden, CURLOPT_RETURNTRANSFER, true);
curl_setopt($forbiden, CURLOPT_USERAGENT, 'Mozilla/5.0');
curl_setopt($forbiden, CURLOPT_SSL_VERIFYPEER, false);

$headers = [
    'Authorization: febb5b0d6amsh8d2ebde0abef7ccp199dd5jsn5f37d32d7054',
    'Accept: application/json',
];
curl_setopt($forbiden, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($forbiden);

if (curl_errno($forbiden)) {
    echo 'Error: ' . curl_error($forbiden);
} else {

    $data_meta = json_decode($response, true);
   
    $error_mgs = json_decode(file_get_contents($video_url,1));

    if($error_mgs->message === "HTTP status error 403"){

        $forbiden_link = "Error 403 : file not found, please try again later";
        header("location:index.php?forbiden_url=$forbiden_link");
        exit();

    }else{

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $video_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36");
        curl_setopt($ch, CURLOPT_REFERER, "https://spvd-main.smvdurlutils.online/");

        $file_get_size = get_headers($video_url,1);
        $file_size = $file_get_size['Content-Length'];

        if($file_size <= 1000){
            
            $forbiden_link = "Error : File currently not found, try again later";
            header("location:index.php?forbiden_url=$forbiden_link");
            exit();

        }


        header('Content-Type: video/mp4');
        header("Content-Disposition: attachment; filename=\"$title_url.mp4\"");
        header('Cache-Control: no-cache');
        header("Content-Length: $file_size");
        header('Pragma: no-cache');

        $fp = fopen('php://output', 'wb'); 

        $buffer_size = 8192; 


        curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($ch, $data) use ($fp, $buffer_size) {
        
            fwrite($fp, $data);
            ob_flush();
            flush(); 
            return strlen($data); 
        });

        curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'cURL Error: ' . curl_error($ch);
            curl_close($ch);
            exit();
        }

        curl_close($ch);
        fclose($fp);

        exit();

    }
    
    curl_close($forbiden);

}

?>

