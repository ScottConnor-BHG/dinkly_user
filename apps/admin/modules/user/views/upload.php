<?php


    //error_log($_FILES["file"]["name"]." ". $_FILES["file"]["tmp_name"]);

    if ($_FILES["file"]["error"] > 0) {
      echo "Error: " . $_FILES["file"]["error"] . "<br>";
    } else {
      echo "Upload: " . $_FILES["file"]["name"] . "<br>";
      echo "Type: " . $_FILES["file"]["type"] . "<br>";
      echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
      echo "Stored in: " . $_FILES["file"]["tmp_name"]."<br>";
    }

    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    $temp = explode("/",$_FILES["file"]["tmp_name"]);
    $hash = end($temp);
    $file_name = $_FILES["file"]["name"];
    $temp = explode(" ",$file_name);
    $array_size =count($temp);
    if($array_size>1)
    {
      $file_name = "";
      foreach($temp as $index => $t)
      {
        if($index !=($array_size-1))
        {
          $file_name.= $t."_";
        }else{
          $file_name.=$t;
        }
      }
    }

    $_FILES["file"]["name"]= $file_name;

    //error_log($file_name);

    if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/x-png")
    || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 20000000)
    && in_array($extension, $allowedExts)) {
      if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
      } else {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
        if (file_exists("img/files/" . $hash)) {
          echo $_FILES["file"]["name"] . " already exists. ";
        } else {
          move_uploaded_file($_FILES["file"]["tmp_name"],
          "img/files/" . $file_name);
          $url="/img/files/" . $file_name;
          echo "Stored in: " . $url."<br>" ;
          echo '<img src="' . $url . '">';
          echo '<script type="text/javascript">'
          ,'var hash ='.json_encode($hash).';'
          ,'var title ='.json_encode($file_name).';'
             , 'saveImage(hash,title);'
             , '</script>';
             // Load the original image
          $image = new SimpleImage('img/files/'.$file_name);
           
          // Resize the image to 600px width and the proportional height
          $image->resizeToWidth(600);
          $image->save('img/files/thumbnails/'.$file_name);
        
        }
      }
    } else {
       echo "<br>Invalid file";
    }
  // function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth ) 
  // {
  //   // open the directory
  //   $dir = opendir( $pathToImages );

  //   // loop through it, looking for any/all JPG files:
  //   while (false !== ($fname = readdir( $dir ))) {
  //     // parse path for the extension
  //     $info = pathinfo($pathToImages . $fname);
  //     // continue only if this is a JPEG image
  //     if ( strtolower($info['extension']) == 'jpg' ) 
  //     {
  //       echo "Creating thumbnail for {$fname} <br />";
  //       // load image and get image size
  //       $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
  //       $width = imagesx( $img );
  //       $height = imagesy( $img );

  //       // calculate thumbnail size
  //       $new_width = $thumbWidth;
  //       $new_height = floor( $height * ( $thumbWidth / $width ) );

  //       // create a new temporary image
  //       $tmp_img = imagecreatetruecolor( $new_width, $new_height );

  //       // copy and resize old image into new image 
  //       imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

  //       // save thumbnail into a file
  //       imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
        
  //     }
  //   }
  //   // close the directory
  //   closedir( $dir );
  // }
  // // call createThumb function and pass to it as parameters the path 
  // // to the directory that contains images, the path to the directory
  // // in which thumbnails will be placed and the thumbnail's width. 
  // // We are assuming that the path will be a relative path working 
  // // both in the filesystem, and through the web for links
  // createThumbs("img/files/","img/files/thumbnails/",100);
?>