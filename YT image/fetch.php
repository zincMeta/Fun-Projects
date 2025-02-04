<?php

$yt_url = filter_var($_POST["link"],FILTER_SANITIZE_URL);

// Validate for empty field

if(empty($yt_url)){

    $error_empty = 'Please enter a youtube link';
    $empty_url = urlencode($error_empty);
    header("location:index.php?error_empty=$empty_url");
    exit();
 
}else{

// Validate for direct link without id

    $exp_url = explode('=',$yt_url);
    
    if($yt_url=='https://www.youtube.com/watch?v' or $yt_url=='https://www.youtube.com/watch?v=' |  $yt_url=="https://www.youtube.com/shorts/" | $yt_url=="https://m.youtube.com/shorts/" | $yt_url=="https://youtube.com/shorts/" | $yt_url=='https://m.youtube.com/watch?v' or $yt_url=='https://m.youtube.com/watch?v=' | $yt_url=='https://youtu.be/'){
       
        $error_invalid ="Please enter a valid youtube link";
        $invalid_url= urlencode($error_invalid);
        header("location:index.php?error_invalid=$invalid_url");
        exit();
    
    }


//// https://www.youtube.com/watch?v=  LINKS ////


// Validate for link containing https://www.youtube.com/watch?v= , https://m.youtube.com/watch?v= and https://youtube.com/watch?v=


if(in_array('https://www.youtube.com/watch?v',$exp_url) | in_array('https://m.youtube.com/watch?v',$exp_url) | in_array('https://youtube.com/watch?v',$exp_url) ){    

        $www_url= $exp_url[1];
        $www_encode_url = urlencode($www_url);

        $check_url = get_headers("https://img.youtube.com/vi/$www_encode_url/default.jpg");
        
        $m_connect_link = explode('=',$yt_url);
    
        $pp = explode('&',$m_connect_link[1]);

        
        // Validate for https://m.youtube.com/watch?v= , https://m.youtube.com/watch?v= and https://www.youtube.com/watch?v= that has &pp=
        
        if(in_array('pp',$pp)){
    
            $m_c_link = $pp[0];
            $mcl_urlencode = urlencode($m_c_link);
                
            $check_url = get_headers("https://img.youtube.com/vi/$mcl_urlencode/default.jpg");
    
            if(strpos($check_url[0],"200")==TRUE){
    
                header("location:index.php?url=$mcl_urlencode");
                exit();    
            
            }else{
                
                $error_invalid ="Error: please check your network or link and try again";
                $invalid_url= urlencode($error_invalid);
                header("location:index.php?error_invalid=$invalid_url");
                exit();
    
            }  
        }
            
        // Execute this if the link does not have and &pp=

        $www_url_link = $m_connect_link[1];
            
        if(strpos($check_url[0],"200 OK")==TRUE){
        
            header("location:index.php?url=$www_url_link");
            exit();

        }else{
                
            $error_invalid ="Error: please check your network or link and try again";
            $invalid_url= urlencode($error_invalid);
            header("location:index.php?error_invalid=$invalid_url");
            exit();

        }

    }


//// https://youtu.be/  LINKS ////


// Validate for link containing https://youtu.be/ , https://m.youtu.be/ and https://www.youtu.be/     


    $share_url = explode('/',$yt_url);

    $share_link =$share_url[0] . '//' . $share_url[2] . '/';

    $new_share_link = array($share_link);
    
    if(in_array('https://youtu.be/',$new_share_link) | in_array('https://m.youtu.be/',$new_share_link) | in_array('https://www.youtu.be/',$new_share_link)){

        $share_url = explode('/',$yt_url);

        $required = explode('?',$share_url[3]);

        $convert_req = explode('=',$required[1]);

        $array_req =array('?' . $convert_req[0]);


        // Checking if link https://youtu.be/ ,  https://m.youtu.be/ and https://www.youtu.be/  has ?si=
    
    
        if(in_array("?si",$array_req)){
           
            $extract_id = $share_url[3];

            $share_ex_link = explode('?',$extract_id);
        
            $link_id = $share_ex_link[0];
            $share_encode_url = urlencode($link_id);
           
            $check_url = get_headers("https://img.youtube.com/vi/$share_encode_url/default.jpg");
            
            if(strpos($check_url[0],"200")==TRUE){
                
                header("location:index.php?url=$share_encode_url");
                exit();
            
            }else{

                $error_invalid ="Error: please check your network or link and try again";
                $invalid_url= urlencode($error_invalid);
                header("location:index.php?error_invalid=$invalid_url");
                exit();
            
            }

        }

        
        // Execute this if the link does not have and ?si=

        $share_url_link = $share_url[2];

        if(strpos($check_url[0],"200")==TRUE){
            
            header("location:index.php?url=$share_url_link");
            exit();
        
        }else{

            $error_invalid ="Error: please check your network or link and try again";
            $invalid_url= urlencode($error_invalid);
            header("location:index.php?error_invalid=$invalid_url");
            exit();
        
        }

    }
    


//// YOUTUBE SHORTS LINK /////


// Validate for link https://youtube.com/shorts/



    $shorts_link = explode('/',$yt_url);
  
    $shorts_new_link = $shorts_link[0] . '//' . $shorts_link[2] . "/" . $shorts_link[3] . "/" ;

    if("https://youtube.com/shorts/"==$shorts_new_link | "https://m.youtube.com/shorts/"==$shorts_new_link | "https://www.youtube.com/shorts/"==$shorts_new_link){


        $exp_shorts = explode('?',$shorts_link[4]);
        $shorts_req = explode('=',$exp_shorts[1]);
        $shorts_url = array('?' . $shorts_req[0]);

    
    // Validate for link https://youtube.com/shorts/ that has ?si=


        if(in_array("?si",$shorts_url)){
         
            $shorts_encode_url = urlencode($exp_shorts[0]);

            
            $check_url = get_headers("https://img.youtube.com/vi/$shorts_encode_url/default.jpg");

            if(strpos($check_url[0],'200')==TRUE){
                
                header("location:index.php?url=$shorts_encode_url");
                exit();
            
            }else{
                
                $error_invalid ="Error: please check your network or link and try again";
                $invalid_url= urlencode($error_invalid);
                header("location:index.php?error_invalid=$invalid_url");
                exit();    

            }
            
        }
        
    }


// Validate for link https://youtube.com/shorts/ , // Validate for link https://www.youtube.com/shorts/ and https://m.youtube.com/shorts/ without ?si

    if("https://www.youtube.com/shorts/"==$shorts_new_link | "https://m.youtube.com/shorts/"==$shorts_new_link | "https://youtube.com/shorts/"==$shorts_new_link){

        $shorts_encode_url = urlencode($shorts_link[4]);
    
        $check_url = get_headers("https://img.youtube.com/vi/$shorts_encode_url/default.jpg");

        if(strpos($check_url[0],'200')==TRUE){
            
            header("location:index.php?url=$shorts_encode_url");
            exit();
        
        }else{
            
            $error_invalid ="Error: please check your network or link and try again";
            $invalid_url= urlencode($error_invalid);
            header("location:index.php?error_invalid=$invalid_url");
            exit();
                

        }
        
    }
    


//// ERROR MESSAGE ////


// Send error message for non youtube links

    $error_invalid =  "Please enter a valid youtube link";

    $invalid_url= urlencode($error_invalid);

    header("location:index.php?error_invalid=$invalid_url");
    exit();

        
}
    
?>
