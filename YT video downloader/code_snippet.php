<?php

ob_end_clean();
ob_start();

set_time_limit(0);
ini_set('memory_limit', '512M');

$yt_url = filter_var($_POST["link"], FILTER_SANITIZE_URL);

if (empty($yt_url)) {
    $error_empty = 'Please enter a YouTube link';
    $empty_url = urlencode($error_empty);
    header("location:index.php?error_empty=$empty_url");
    exit();
}

$regex = '/(?:https?:\/\/(?:www\.)?(?:youtube\.com\/(?:watch\?v=|shorts\/)|m\.youtube\.com\/(?:watch\?v=|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11}))/';

if(preg_match($regex, $yt_url, $matches)) {

    if (strpos($yt_url, "m.youtube.com") !== false) {
        $yt_url = str_replace("m.youtube.com", "www.youtube.com", $yt_url);
    }

    $YT_video_id = $matches[1]; 

    $videoId = $YT_video_id;

    error_log("Matched video ID: " . $videoId);
    error_log("Rewritten YouTube URL: " . $yt_url); 

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://youtube-video-and-shorts-downloader1.p.rapidapi.com/api/getYTVideo?url=$yt_url&countrycode=pg",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: youtube-video-and-shorts-downloader1.p.rapidapi.com",
            "x-rapidapi-key: febb5b0d6amsh8d2ebde0abef7ccp199dd5jsn5f37d32d7054"
        ],
        CURLOPT_SSL_VERIFYPEER => false,  
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    error_log("cURL Response: " . $response);
    error_log("cURL Error: " . $err);

    curl_close($curl);

    if ($err) {
        
        error_log("cURL Error #:" . $err);
        $error_empty = 'Unknown error: ' . $err;
        $empty_url = urlencode($error_empty);
        header("location:index.php?error_empty=$empty_url");
        exit();

    } else {
        $data = json_decode($response);

        error_log("API Response: " . json_encode($data));

        if (isset($data->links)) {
            
            $video_360p = null;
            $video_480p = null;
            $video_720p = null;
            $video_1080p = null;
            
            foreach ($data->links as $item) {

                if ($item->quality == 'video_render_360p' || $item->quality == "video_render_360p60" || $item->quality=="video_render_360p50" && $item->hasAudio=="true") {
                    $video_360p = $item->link;
                }
                if ($item->quality == 'video_render_480p' || $item->quality == "video_render_480p60" || $item->quality=="video_render_480p50" && $item->hasAudio=="true") {
                    $video_480p = $item->link;
                }
                if ($item->quality == 'video_render_720p' || $item->quality == "video_render_720p60" || $item->quality=="video_render_720p50" && $item->hasAudio=="true") {
                    $video_720p = $item->link;
                }
                if ($item->quality == 'video_render_1080p' || $item->quality == "video_render_1080p60" || $item->quality=="video_render_1080p50" && $item->hasAudio=="true") {
                    $video_1080p = $item->link;
                }

            }

            
            $url_download = array(
                $video_360p,
                $video_480p, 
                $video_720p,
                $video_1080p, 
                $videoId, 
                $data->description
            );
                       
            $encoded_urls = urlencode(json_encode($url_download));

            header("location:index.php?id=$encoded_urls");
            exit(); 

        } else {
            $exceed_msg_request = "You have exceeded the MONTHLY quota for Requests on your current plan, BASIC. Upgrade your plan at https://rapidapi.com/ugoBoy/api/youtube-video-and-shorts-downloader1";
          
            if($data->message==$exceed_msg_request){
                
                error_log("Execeeded API request for 300/month");
                $error_empty = 'You\'ve reach the limit of request 300/month.';
                $empty_url = urlencode($error_empty);
                header("location:index.php?error_empty=$empty_url");
                exit();
        
            }else{
                
                error_log("No links found in API response.");
                $error_empty = 'Unable to fetch video link, please try again later.';
                $empty_url = urlencode($error_empty);
                header("location:index.php?error_empty=$empty_url");
                exit();

            }
        }
    }

} else {
    $error_empty = 'Please enter a valid youtube link';
    $empty_url = urlencode($error_empty);
    header("location:index.php?error_empty=$empty_url");
    exit();      
}

$error_empty = 'Unknown error please try again';
$empty_url = urlencode($error_empty);
header("location:index.php?error_empty=$empty_url");
exit();  
?>
