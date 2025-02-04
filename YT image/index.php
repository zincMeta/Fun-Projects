<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YT Image Downloader</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
</head>
<body>
    <header>
        <h2 style="display:flex;align-items:center;"><i style="color: #e2184e;font-size: 30px; margin:0 12px"  class="bi-youtube"></i><span style='color: #e2184e;font-size:40px;'>YT</span> Thumbnail Downloader</h2>
    </header>
    <div class='AFI_link'>
        <a href="/">Get API<p class="avaliable">API not avaliable sorry <i class="bi-emoji-smile-upside-down-fill"></i></P></a>
        <div>
        <a style="background-color:transparent;"><img src="Guide_img/facebook.png" alt="" srcset=""><p class="Facebook">Facebook</P></a>
        <a style="background-color:transparent;"><img src="Guide_img/instagram.png" alt="" srcset=""><p class="Instagram">Instagram</P></a>
        <a style="background-color:transparent;"><img src="Guide_img/whatsapp.png" alt="" srcset=""><p class="Whatsapp">Whatsapp</P></a>
        </div>
    </div>
    <section>

    <h4>Download Stunning YouTube Thumbnails <span style="-webkit-text-stroke:0.5px   hsl(166, 100%, 22%); font-size:35px;color:  hsl(166, 88%, 50%)">Instantly!</span></h4>
    
    <h2 id="enter_link" >Ads Free!<i style='margin-left:4px; color:green; font-size:30px;'  class='bi-file-check-fill'></i></h2>

    <div class="image_container">
        <?php

            // Get the error message for empty input submit

            if(isset($_GET['error_empty'])){
            
                $error_empty = $_GET['error_empty'];
                echo "<div class='msg'>";

                echo "<div class='error' >";
                echo "<p>" . $error_empty . "</p>";
                echo "<a href='#enter_link' class='OK' >OK</a>";
                echo "</div>";
                print "<script>

                const error_btn = document.querySelector('.OK');

                error_btn.onclick = ()=>{
                    
                let error_ok = document.querySelector('.error');

                let msg = document.querySelector('.msg');
                
                msg.style.visibility='hidden';
                error_ok.style.display='none';

                };    

                </script>";
                
                echo "</div>";
            }

            // 
            
            // Get the error message for invalid thumbanil links

            if(isset($_GET['error_invalid'])){
                
                $error_invalid = $_GET['error_invalid'];

                echo "<div class='msg'>";
                
                echo "<div class='error' >";
                echo "<p>" . $error_invalid . "</p>";
                echo "<a href='#enter_link' class='OK' >OK</a>";
                echo "</div>";
                print "<script>

                const error_btn = document.querySelector('.OK');
                
                error_btn.onclick = ()=>{
                    
                let error_ok = document.querySelector('.error');
                
                let msg = document.querySelector('.msg');
                
                msg.style.visibility='hidden';
                
                error_ok.style. display='none';

                };    

                </script>";   
                
                echo "</div>";

            }

            // 

            // Get and display the message for successful links

            if(isset($_GET['url'])){
               

                $msg_success = "Link generated!, please reload the link if the thumbnail is not generated";
                echo "<div class='msg'>";
            
                echo "<div class='error' >";
                echo "<p>" . $msg_success . "<i style=' margin-left:8px' class='bi-emoji-smile'></i>" . "</p>";
                echo "<a href='#show' class='msg_success' >OK</a>";
                echo "</div>";
                echo "<script>
                    
                const success_btn = document.querySelector('.msg_success');
                
                success_btn.onclick = ()=>{
        
                let success_ok = document.querySelector('.error');
                
                let msg = document.querySelector('.msg');
                
                msg.style.visibility='hidden';

                success_ok.style. display='none';
                
    
                }
                </script>";

                echo "</div>";
            }

            // 

        ?>

        <div class="image_holder">
            <h3>Download <b style="color:red; font-weight:600">YouTube</b> thumbnail</h3>
            <p>Enter URL : </p>
            <form  action="fetch.php" method="post">
                <input name='link' type="text" value="" placeholder="Paste link here...">
                <button type='submit'>GET</button>
            </form>
           
        </div>

        <p class="web_info" style="color: #777">
        Get eye-catching thumbnails from your favourite youtube videos with our easy-to-use tool youtube thumbanil downloader. Just enter the video URL, and grab the perfect image in seconds!
        </p>
        <div id='show'>

        <?php

            // For reload button to reload a successful link

            if(isset($_GET['url'])){

                $url = $_GET['url'];

                echo "<button style='margin-top:15px;border-radius:0px 0px 0px 0px' class='reload'>Reload Link</button>";
                print "<script>

                    const reload_btn = document.querySelector('.reload');
                    
                    reload_btn.onclick = ()=>{
                        window.location.href='index.php?url=$url';
                    } 

                    </script>";
            }

            // 
        ?>

        </div>

        <div class='image_content'>

        <?php

        // Show the result of successfully generated thumbanil image and the links to download

                if(isset($_GET['url'])){


                    echo "<div class='image_show'>";
                    
                        $put = $_GET['url'];

                        $thumbnail_url = "https://img.youtube.com/vi/$put/sddefault.jpg" ;
                        echo "<script>
                        
                                                
                            let thumbnail = document.querySelector('thumbnail');
                            let image_content = document.querySelector('.image_content')

                            if(thumbnail.onload === false){
                                console.log('loading...')

                            }
                        </script>";
                    
                        echo "<img class='thumbnail' loading='lazy' src='$thumbnail_url' alt='failed to load..'>";
                    
                    echo "</div>";
                    echo "<div class='link_display'>";
                        
                    echo "<h1>Resolutions avaliable!</h1>";

                    echo "<div class='download_link'>";

                            // To fetch the download scripts from  "download.class.php" file and render the download button for downloading thumbnails
                    
                            require("download.class.php");
                        
                            $get_url = $_GET['url'];

                            $new_url = new Downloads($get_url);

                            //
                                                
                    echo "</div>";
                    
                    echo "</div>";
                }

            ?>

        </div>
        <?php

        // Display message that you want to show to the users when the thumbanil is generated

            if(isset($_GET['url'])){
                
                $img = $_GET['url'];
                
                echo "<div style='width:80%;' class='guide>";
                
                echo "<p style='text-align: start;'>This site was built out of passion and hobby, so it contains no Ads. But if you find this site
                    dissatisfying, feel free to check out other Youtube thumbnail downloaders. <a href='https://www.google.com/search?q=youtube+thumbnail+download&rlz=1C1BNSD_enPG1060PG1071&oq=youtube+thum&aqs=chrome.1.0i512l2j69i57j0i512l7.12469j0j7&sourceid=chrome&ie=UTF-8' style='color:blue;'>Veiw others <i class='bi-arrow-up-right-square'></i></a></p>";
                echo "<p style='text-align:center;'>Hope this site was helpful.</p>";
                
                echo "</div>";
                echo "<div style='background:green;width:50%;margin:1.5rem;' class='guide'>";
                echo "<h3 style='color:#fff; padding:12px; text-align:center; line-height:1.5;'>Thanks for visiting hope to see you soon.</h3>";
                echo "</div>";
                
            }
            
        // 

        ?>
        
        <h1 style='background-color: #d4e7f9;padding:12px'>Guides to Use</h1>
        <div class='guide_link'>
            <li class="toggle_desktop">Desktop</li>
            <li class="toggle_mobile">Mobile</li>
            <li class="toggle_watch">Watch-tutorial<i style='padding:2px;color:hsl(166, 90%, 35%);'class="bi-play-circle-fill"></i></li>
        </div>
        <div class='Desktop'>
            <div style='padding:10px;background-color: rgb(234, 239, 247);;'>
            <h1 style='text-align:center; color: #e2184e'>Step 1</h1>
                <p>First go to youtube and play a video of your favourite youtube thumbnail and when the video is playing click on 
                the link you see on the url bar.</p>
                <a href='https://www.youtube.com' style='color:blue;display:flex; align-items:center; flex-wrap:wrap; justify-content:center'>Click here to go to youtube<i style='padding:5px;' class='bi-arrow-up-right-square'></i></a>
            </div>
            
            <div class="img_guide1">
                <img  src="Guide_img/step1.png" alt="" srcset="">
                <img  src="Guide_img/stepOne.png" alt="" srcset="">
            </div>

            <div style='padding:10px;background-color: rgb(234, 239, 247);'>
                <h1 style='text-align:center;color: #e2184e'>Step 2</h1>
                <p>Copy the link and head back to this site. Paste the link in the input field provided and click on get.</p>
            </div>
            
            <div class="img_guide2">
                <img  src="Guide_img/step2.png" alt="" srcset="">
                <img  src="Guide_img/steplook2.png" alt="" srcset="">
            </div>
            
        </div>

        <div class='Mobile'>
            <div style='padding:10px;background-color: rgb(234, 239, 247);;'>
            <h1 style='text-align:center; color: #e2184e'>Mobile : Step 1</h1>
                <p>First open the youtube app, once opened play a video of your favourite thumbnail, while the video is playing click on 
                the link you see on the url bar.</p>
                <a href='https://www.youtube.com' style='color:blue;display:flex; align-items:center; flex-wrap:wrap; justify-content:center'>Click here to go to youtube<i style='padding:5px;' class='bi-arrow-up-right-square'></i></a>
            </div>

            <div class="img_guide1">
                <img  src="Guide_img/step1.png" alt="" srcset="">
                <img  src="Guide_img/stepOne.png" alt="" srcset="">
            </div>

            <div style='padding:10px;background-color: rgb(234, 239, 247);'>
                <h1 style='text-align:center; color: #e2184e'>Mobile : Step 2</h1>
                <p>Copy the link and go to any of the borwsers you have,enter this link 
                <a href='/' style="color:blue;">sweb2.com/portfolio/Work/YT image/index.php</a> on your search bar. Once the site is loaded 
                Paste the link that you copied from youtube in the input field provided and click on get.</p>
            </div>

            <div class="img_guide2">
                <img src="Guide_img/step2.png" alt="" srcset="">
                <img src="Guide_img/steplook2.png" alt="" srcset="">
            </div>

        </div>

        <div style='padding:20px;width:100%; background-color:#fff;' class='watch'>
            <video src="tutorial/vid1.mp4" controls></video>  
        </div>

        <div>
            <h2 style='text-align:start;padding:20px;background-color:#d4e7f9'>The download link will generate and you'll see a message saying <b style='color:green'>"Download link successfully generated",</b> click on ok.</h2>
            <p style='background-color:#fff;'>Now you can choose the best resolution for you, we recommand (1280px x 720px) as it's the hightest qaulity thumbnail youtube has.</p>
        </div>

    </div>
    </section>

    <footer>
        <div class="footer_div">
            
        <div style="color: #e2184e;font-size:20px;display:flex; flex-direction:column; align-items:center">
            <i class="bi-youtube"></i>   
            <a href="http://">Visit Youtube</a>
        </div>
        
        <div style="color: green;font-size:20px;display:flex; flex-direction:column; align-items:center">
            <i class="bi-envelope-fill"></i>   
            <a href="http://">strysenloniu@sweb2.com</a>
        </div>
        
        <div style="color: blue;font-size:20px;display:flex; flex-direction:column; align-items:center">
            <i class="bi-telephone-fill"></i>
            <a href="http://">+675 7439 6474</a>    
        </div>
        </div>
        <div>
            <h3 style="text-align:center">Social Media</h3>
            <div style="display:flex; justify-content:space-between; padding:12px">
            <a style="font-size:20px"><i class="bi-facebook"></i></a>
            <a style="font-size:20px"><i class="bi-instagram"></i></a>
            <a style="font-size:20px"><i class="bi-whatsapp"></i></a>
            </div>
        </div>

    </footer>
</body>
<script src="js/toggle.guide.js"></script>
<script>
                       
</script>
</html>