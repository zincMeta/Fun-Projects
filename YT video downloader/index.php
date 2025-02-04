
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YT Downloader</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="image/logo4.png" type="image/x-icon">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
        
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="image/logo4.png" alt="" srcset="">
            <h1 style="color:#b7033f">ZIM</h1>
            <span style="color:#fff; font-size:20px"> Loader</span>
        </div>
        
        <i id="open_close_btn" class="bi-list"></i>
        <nav>
            <a href="">Home</a>
            <a href="">Youtube mp4</a>
            <a href="">Youtube mp3</a>
            <a href="http://">Donate<i style="color:inherit; margin: 0 0.5rem !important;" class="bi-bag-heart-fill"></i></a>
        </nav>
    </header>

    <section class="home_section" id="home">
        <div class="home_container">     
            <h1>Youtube Video Downloader</h1>
            <span>Ads Free <i class='bi-patch-check-fill' style="color:inherit"></i></span>
            <form action="code_snippet.php" method="post">
                <input class="link_url" type="text" name="link" placeholder="Enter youtube url here">
                <button class="submit_btn" type="submit">GET</button>
            </form>
            <div id="loading">
                <span class="notice"></span>

                <?php

                if(isset($_GET['curl_err'])){
                                    
                    $error = urldecode($_GET['curl_err']);
                    echo "<span id='display' class='error'>$error</span>";
                }

                if(isset($_GET['error_invalid'])){
                    
                    $error = $_GET['error_invalid'];
                    echo "<span id='display' class='error'>$error</span>";
                }

                if(isset($_GET['error_empty'])){
                    
                    $error = $_GET['error_empty'];
                    echo "<span id='display' class='error'>$error</span>";
                }

                if(isset($_GET['forbiden_url'])){
                    $forbiden_download = urldecode($_GET['forbiden_url']);
                    echo "
                    <div class='link_unavailable'>
                        <div>
                            <span>$forbiden_download</span>
                            <button id='display' class='close_btn'>OK</button>
                        </div>
                    </div>";
                }

                if (isset($_GET['id'])) {

                    $url_download = json_decode(urldecode($_GET['id']));
                    
                    $encoded_title = rawurlencode($url_download[5]);

                    $mp4_360px = urlencode(json_encode(array($url_download[0], $encoded_title)));
                    $mp4_480px = urlencode(json_encode(array($url_download[1], $encoded_title)));
                    $mp4_720px = urlencode(json_encode(array($url_download[2], $encoded_title)));
                    $mp4_1080px = urlencode(json_encode(array($url_download[3], $encoded_title)));
                
                    $videoId = $url_download[4]; 
                     
                    if (is_array($url_download)) {

                        echo "<div id='display' class='result'>";
                
                        echo "<span>Youtube MP4</span>";
                        echo "<span style='font-size:120%; color:#fff;background:#333; border-radius:0%'>$url_download[5]</span>";

                        echo "<div>";
                
                        echo "<div class='thumbnail_holder'>
                                <img src='https://img.youtube.com/vi/$videoId/hqdefault.jpg' alt='' srcset=''>    
                                <span class='duration'>Duration 3:13</span>
                            </div>";
                
                        echo "<div class='mp4_download_links'>";
                        echo "<span style='font-size:120%; color:#333;background:#fff; border-radius:0%'><i class='bi-play-fill' style='border-radius:20%; background:  #b7033f;color:#fff; padding:0px 5px'></i> Video Resolutions</span>";
                                                
                        echo "<table>
                            <tr>
                                <th>Quality</th>
                                <th>Action</th>
                            </tr>";

                            if(isset($url_download[3])){
                                echo"
                                <tr>  
                                    <td>1080p</td>
                                    <td><a class='resolution' href='download_video.php?id=$mp4_1080px'>Download 1080px <i class='bi-cloud-download'></i></a></td>    
                                </tr>";
                            }


                            if(isset($url_download[2])){
                                echo"
                                <tr>  
                                    <td>720p</td>
                                    <td><a class='resolution' href='download_video.php?id=$mp4_720px'>Download 720px <i class='bi-cloud-download'></i></a></td>    
                                </tr>";
                            } 


                            if(isset($url_download[1])){
                                echo"
                                <tr>  
                                    <td>480p</td>
                                    <td><a class='resolution' href='download_video.php?id=$mp4_480px'>Download 480px <i class='bi-cloud-download'></i></a></td>    
                                </tr>";
                            }

                            if(isset($url_download[0])){
                                echo"
                                <tr>  
                                    <td>360p</td>
                                    <td><a class='resolution' href='download_video.php?id=$mp4_360px'>Download 360px <i class='bi-cloud-download'></i></a></td>    
                                </tr>";
                            }

                        echo "</table>";
                        echo "</div>"; 
                        echo "</div>"; 
                        echo "</div>"; 
                    } else {
                        echo "Failed to decode the URL parameter.";
                    }
                }
                 
             ?>

        </div>



    </section>
    <section class="about_section">
        <div class="about_container">
            <h1>ZIM Loader</h1>
            <p>Get or download your favourite youtube videos in different pixels resolution from 1080p , 720p , 480p to 360p with our easy-to-use tool 
                youtube video downloader. Just enter the video URL, and grab the perfect video/mp4 in seconds!. No redirects and it's ads free!.
            </p>
            <div class="image_container">
                <img src="image/image1.png" alt="" srcset="">
                <img src="image/image2.png" alt="" srcset="">
            </div>
        </div>
    </section>
    <div style="font-weight:500; padding:0 1rem; width:100%; display:flex; flex-flow:column; align-items:center; justify-content:center">
        <h1 style="font-weight:500; padding:0.5rem 1rem; text-align:center; border-radius:19px; background-color: rgba(12, 12, 13, 0.2);">Guide Step</h1>
    </div>
    <div class="steps">
            <div class="step_lists">
                <div class="step_btn">
                    <span class="step_prev">Prev</span>
                    <span class="step_next">Next</span>
                </div>
            </div>
            <span style="color:#fff; background:#222; padding:12px; font-size:20px">Steps guide <i class="bi-arrow-right"></i> <span class="indicator_step" style="color: #00e0dc">ONE</span></span>

                <div id="step_one" class="step_container">
                    <p>First head to youtube by opening the app or by clicking here <i class="bi-arrow-right"></i><a style="color: #3985ff" href="https://www.Youtube.com/"> Youtube </a>. After opening youtube click on a video of your choosing and when the video is playing copy the url link and head back to this site.</p>
                    <div class="image_step">
                            <img src="image/step1.png" alt="" srcset="">
                            <img src="image/steplook1.jpg" alt="" srcset="">
                    </div>
                </div>
                <div id="step_two" class="step_container">
                    <p>Second step head to youtube by opening the app or by clicking here <i class="bi-arrow-right"></i><a style="color: #3985ff" href="https://www.Youtube.com/"> Youtube </a>. After opening youtube click on a video of your choosing and when the video is playing copy the url link and head back to this site.</p>
                    <div class="image_step">
                            <img src="image/step2.png" alt="" srcset="">
                            <img src="image/steplook2.png" alt="" srcset="">
                    </div>
                </div>
                
                <div id="step_three" class="step_container">
                    <p>Third step head to youtube by opening the app or by clicking here <i class="bi-arrow-right"></i><a style="color: #3985ff" href="https://www.Youtube.com/"> Youtube </a>. After opening youtube click on a video of your choosing and when the video is playing copy the url link and head back to this site.</p>
                    <div class="image_step">
                            <img src="image/step1.png" alt="" srcset="">
                            <img src="image/steplook1.jpg" alt="" srcset="">
                    </div>
                </div>
        </div>
        <div class="credit">
            <p>If this site was help consider helping us pay for the service to help keep this site ads free and up and running.</p>
            <h2>Thank you for using our services <i style="color:inherit;" class="bi-emoji-smile-upside-down"></i></h2>     
        </div>
    
    <footer>
        <a>loniustrysen@gmail.com</a>
        <div>
            <div class="social">
                <span>Social Media :</span>
                <a><i class="bi-facebook"></i></a>
                <a><i class="bi-instagram"></i></a>
                <a><i class="bi-whatsapp"></i></a>
            </div> 
        </div>
        <span style="color:#fff">&copysweb2.com</span> 
    </footer>
</body>
<script src="js/script.js"></script>
</html>