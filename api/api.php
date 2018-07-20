<?php
   // error_reporting(0);
set_time_limit (0);
header('Content-Type: application/json; charset=UTF-8');
function getBytesFromHexString($hexdata)
{
  for($count = 0; $count < strlen($hexdata); $count+=2)
    $bytes[] = chr(hexdec(substr($hexdata, $count, 2)));

  return implode($bytes);
}

function getImageMimeType($imagedata)
{
  $imagemimetypes = array( 
    "jpeg" => "FFD8", 
    "png" => "89504E470D0A1A0A", 
    "gif" => "474946",
    "bmp" => "424D", 
    "tiff" => "4949",
    "tiff" => "4D4D"
  );

  foreach ($imagemimetypes as $mime => $hexbytes)
  {
    $bytes = getBytesFromHexString($hexbytes);
    if (substr($imagedata, 0, strlen($bytes)) == $bytes)
      return $mime;
  }

  return NULL;
}
    $out['succes'] = 0;
    if(isset($_POST['image']) and isset($_POST['descripteur'])){
        // upload images
        $img = urldecode($_POST['image']);
        $type = getImageMimeType($img);
        $target = md5(uniqid()).".".$type;
        file_put_contents("../uploads/".$target,$img);
        
        // get lm 
        $dir_matalab = __DIR__."\..\matlab\\";
        $dir_up = __DIR__."\..\uploads\\";
        $out['succes'] = 1;
        if($_POST['descripteur'] == "lm" ) {
          $ex = "matlab -nodisplay -nosplash -nodesktop -wait -r cd('C:\\xampnew\\htdocs\\pfe\\matlab'),api('C:\\xampnew\\htdocs\\pfe\\uploads\\$target','lm')";
          exec($ex);
          $xml=simplexml_load_file('..\matlab\api.xml');
          $out['descripteur'] = $xml->val;
        }
    }
        echo json_encode($out);
        
?>