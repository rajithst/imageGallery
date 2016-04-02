<?php
class Gallery {


    public $path;
    public function __construct(){
        $this->path=__DIR__.'\images';
   
    }

    public function setPath($path){

        if (substr($path, -1) === '/') {
            $path=substr($path,0,-1);
        }
           $this->path = $path;
    }

    private  function getDirectory($path){
        return scandir($path);
    }

    public function getImages($extensions = array('jpg','png','gif')){
        
        $images = $this->getDirectory($this->path);

        foreach ($images as $index => $image) {
           $extension=explode('.', $image);
           $extension=strtolower(end($extension));

            if (in_array($extension, $extensions) === false) {
                   unset($images[$index]); // removing the value and key
               } else {

                    $images[$index] = array( 

                        'full'=>$this->path . '/' . $image,
                        'thumb'=>$this->path . '/thumbs/' . $image

                        );

               }
     }


       return (count($images)) ? $images : false;
    }



}