<html>

<head>

<meta http-equiv=content-type content=text/html; charset=utf-8>


</head>


<body>


<?php

echo"żźąłó";
ini_set('default_charset', 'UTF-8');
function getDirectorySize($path) 
{ 
  $totalsize = 0; 
  $totalcount = 0; 
  $dircount = 0; 
  if ($handle = opendir ($path)) 
  { 
    while (false !== ($file = readdir($handle))) 
    { 
      $nextpath = $path . '/' . $file; 
      if ($file != '.' && $file != '..' && !is_link ($nextpath)) 
      { 
        if (is_dir ($nextpath)) 
        { 
          $dircount++; 
          $result = getDirectorySize($nextpath); 
          $totalsize += $result['size']; 
          $totalcount += $result['count']; 
          $dircount += $result['dircount']; 
        } 
        elseif (is_file ($nextpath)) 
        { 
          $totalsize += filesize ($nextpath); 
          $totalcount++; 
        } 
      } 
    } 
  } 
  closedir ($handle); 
  $total['size'] = $totalsize; 
  $total['count'] = $totalcount; 
  $total['dircount'] = $dircount; 
  return $total; 
} 

function sizeFormat($size) 
{ 
    if($size<1024) 
    { 
        return $size." bytes"; 
    } 
    else if($size<(1024*1024)) 
    { 
        $size=round($size/1024,1); 
        return $size." KB"; 
    } 
    else if($size<(1024*1024*1024)) 
    { 
        $size=round($size/(1024*1024),1); 
        return $size." MB"; 
    } 
    else 
    { 
        $size=round($size/(1024*1024*1024),1); 
        return $size." GB"; 
    } 

} 
function drzewo_kataogow($path,$i)
{

    $tmp=$i;
    for($tmp;$tmp>1;$tmp--)
    {
            $znacznik_plik.='&nbsp';
           
    }
    if ($handle = opendir(utf8_encode($path)))
    {
		$file = urlencode($file);
		
            while (false !== ($file = readdir($handle)))
            {
            if ($file != "." && $file != "..") {
                            if (is_dir(utf8_encode($path).'/'.$file)) {
              
                                   $znacznik_katalog=$znacznik_plik;
                     echo '<b><meta http-equiv=content-type content=text/html; charset=utf-8><img src=folder.png width=20px > ' .utf8_encode($file).'</b><br/>';
                                 drzewo_kataogow(utf8_encode($path).'/'.utf8_encode($file),($i+1));
                               }
                           else
                        echo "$znacznik_plik <meta http-equiv=content-type content=text/html; charset=utf-8><img src=doc.png width=20px >$file<br/>";
                }
                }
        closedir($handle);
    }
}


  

$path="\\\\pc-877\\oskar\\111Ed-10\\zmiany"; 

$ar=getDirectorySize($path); 
$x=drzewo_kataogow($path,1);

echo "<h4>Details for the path : $path</h4>"; 
echo "Wielkosc : ".sizeFormat($ar['size'])."<br>"; 
echo "Plikow : ".$ar['count']."<br>"; 
echo "Katalogow : ".$ar['dircount']."<br>";
?>

</body>


</html>

