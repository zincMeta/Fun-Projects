<?php


class Downloads{

    // public variables that can only be access in this class

    public $thumbnail_url;
    public $download_hd;
    public $create_download;
    public $file_get;
    public $url;
    
    // 
    
    // public function for displaying the downloads resolutions on the borwser

    public function __construct($download_url){
        
       $this->url = $download_url;
     
       $this->downloadMHD();
       $this->downloadSSHD(); 
       $this->downloadSHD();
       $this->downloadLSHD();
       $this->downloadLHD();

    }
    
    //


    // Download function for 1280px x 720px thumbnail image

    public function downloadMHD(){
        
        if(file_exists("Downloads/download-max-$this->url.jpg")==TRUE){
            
            $this->thumbnail_url = "https://img.youtube.com/vi/$this->url/maxresdefault.jpg" ;

            $this->file_get = file_get_contents($this->thumbnail_url);

            if($this->file_get==TRUE){

                $this->download_hd = "Downloads/download-max-$this->url.jpg";

                if(file_put_contents($this->download_hd,$this->file_get)==TRUE){
                    
                    echo "<a href='$this->download_hd' download='$this->download_hd'>Download 1280px x 720px</a>";

                }else{
                    echo "failed to fetch content";
                }

            }else{
                echo "";
            }

        }else{

            $this->create_download = touch("Downloads/download-max-$this->url.jpg");

            if($this->create_download==TRUE){
                
                $this->thumbnail_url = "https://img.youtube.com/vi/$this->url/maxresdefault.jpg" ;

                $this->file_get =file_get_contents($this->thumbnail_url);

                if($this->file_get==TRUE){

                    $this->download_hd = "Downloads/download-max-$this->url.jpg";

                    if(file_put_contents($this->download_hd,$this->file_get)==TRUE){
                        
                        echo "<a href='$this->download_hd' download='$this->download_hd'>Download 1280px x 720px</a>";

                    }else{
                        echo "failed to fetch content";
                    }

                }else{
                    echo "";
                }
            }
        }
    }

    
    // Download function for 640px x 480px thumbnail image

    public function downloadSSHD(){

        if(file_exists("Downloads/download-sd-$this->url.jpg")){

            $this->thumbnail_url = "https://img.youtube.com/vi/$this->url/sddefault.jpg" ;

            $this->file_get =file_get_contents($this->thumbnail_url);

            if($this->file_get==TRUE){

                $this->download_hd = "Downloads/download-sd-$this->url.jpg";

                if(file_put_contents($this->download_hd,$this->file_get)==TRUE){
                    
                    echo "<a href='$this->download_hd' download='$this->download_hd'>Download 640px x 480px</a>";
                }else{
                    echo "failed to fetch content";
                }

            }else{
                echo "";
            }
        }else{

            $this->create_download = touch("Downloads/download-sd-$this->url.jpg");

            if($this->create_download==TRUE){
                
                $this->thumbnail_url = "https://img.youtube.com/vi/$this->url/sddefault.jpg" ;

                $this->file_get =file_get_contents($this->thumbnail_url);

                if($this->file_get==TRUE){

                    $this->download_hd = "Downloads/download-sd-$this->url.jpg";

                    if(file_put_contents($this->download_hd,$this->file_get)==TRUE){
                        
                        echo "<a href='$this->download_hd' download='$this->download_hd'>Download 640px x 480px</a>";

                    }else{
                        echo "failed to fetch content";
                    }

                }else{
                    echo "";
                }
            }
        }
    }


    // Download function for 480px x 360px thumbnail image

    public function downloadSHD(){
        
        if(file_exists("Downloads/download-hq-$this->url.jpg")){
            
            $this->thumbnail_url = "https://img.youtube.com/vi/$this->url/hqdefault.jpg" ;

            $this->file_get = file_get_contents($this->thumbnail_url);

            if($this->file_get==TRUE){

                $this->download_hd = "Downloads/download-hq-$this->url.jpg";

                if(file_put_contents($this->download_hd,$this->file_get)==TRUE){
                    
                    echo "<a href='$this->download_hd' download='$this->download_hd'>Download 480px x 360px</a>";
                }else{
                    echo "failed to fetch content";
                }

            }else{
                echo "";
            }
        }else{

            $this->create_download = touch("Downloads/download-hq-$this->url.jpg");

            if($this->create_download==TRUE){
                
                $this->thumbnail_url = "https://img.youtube.com/vi/$this->url/hqdefault.jpg" ;

                $this->file_get =file_get_contents($this->thumbnail_url);

                if($this->file_get==TRUE){

                    $this->download_hd = "Downloads/download-hq-$this->url.jpg";

                    if(file_put_contents($this->download_hd,$this->file_get)==TRUE){
                        
                        echo "<a href='$this->download_hd' download='$this->download_hd'>Download 480px x 360px</a>";

                    }else{
                        echo "failed to fetch content";
                    }

                }else{
                    echo "";
                }
            }
        }
    }


    // Download function for 320px x 180px thumbnail image

    public function downloadLSHD(){

        if(file_exists("Downloads/download-mq-$this->url.jpg")){

            $this->thumbnail_url = "https://img.youtube.com/vi/$this->url/mqdefault.jpg" ;

            $this->file_get =file_get_contents($this->thumbnail_url);

            if($this->file_get==TRUE){

                $this->download_hd = "Downloads/download-mq-$this->url.jpg";

                if(file_put_contents($this->download_hd,$this->file_get)==TRUE){
                    
                    echo "<a href='$this->download_hd' download='$this->download_hd'>Download 320px x 180px</a>";
                }else{
                    echo "failed to fetch content";
                }

            }else{
                echo "";
            }

        }else{

            $this->create_download = touch("Downloads/download-mq-$this->url.jpg");

            if($this->create_download==TRUE){
                
                $this->thumbnail_url = "https://img.youtube.com/vi/$this->url/mqdefault.jpg" ;

                $this->file_get =file_get_contents($this->thumbnail_url);

                if($this->file_get==TRUE){

                    $this->download_hd = "Downloads/download-mq-$this->url.jpg";

                    if(file_put_contents($this->download_hd,$this->file_get)==TRUE){
                        
                        echo "<a href='$this->download_hd' download='$this->download_hd'>Download 320px x 180px</a>";

                    }else{
                        echo "failed to fetch content";
                    }

                }else{
                    echo "";
                }
            }
        }
    }


    // Download function for 120px x 90px thumbnail image

    public function downloadLHD(){

        if(file_exists("Downloads/download-default-$this->url.jpg")){
            
            $this->thumbnail_url = "https://img.youtube.com/vi/$this->url/default.jpg" ;

            $this->file_get =file_get_contents($this->thumbnail_url);

            if($this->file_get==TRUE){

                $this->download_hd = "Downloads/download-default-$this->url.jpg";

                if(file_put_contents($this->download_hd,$this->file_get)==TRUE){
                    
                    echo "<a href='$this->download_hd' download='$this->download_hd'>Download 120px x 90px</a>";
                }else{
                    echo "failed to fetch content";
                }

            }else{
                echo "";
            }
        }else{

            $this->create_download = touch("Downloads/download-default-$this->url.jpg");

            if($this->create_download==TRUE){
                
                $this->thumbnail_url = "https://img.youtube.com/vi/$this->url/default.jpg" ;

                $this->file_get =file_get_contents($this->thumbnail_url);

                if($this->file_get==TRUE){

                    $this->download_hd = "Downloads/download-default-$this->url.jpg";

                    if(file_put_contents($this->download_hd,$this->file_get)==TRUE){
                        
                        echo "<a href='$this->download_hd' download='$this->download_hd'>Download 120px x 90px</a>";

                    }else{  
                        echo "failed to fetch content";
                    }

                }else{
                    echo "";
                }
            }
        }
    }

}

// This script is going to be include in our index.php file

?>
