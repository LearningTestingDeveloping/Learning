
<?php
/*
$katalog2 = '\\\\pesa.local\\mr\\BEW\\Chłopacy';
$katalog=($katalog2);

$kat = opendir($katalog2);



while ($plik = readdir($kat))
{
   if(is_dir($katalog.'/'.$plik))
   {
      echo "$plik<br />";
   }
}
closedir($kat);

*/

function wyswietlKatalog($sciezka)
  {
  	$dir = opendir(utf8_encode($sciezka));
  	echo '<ul>';
  	while($f = readdir($dir))
  	{
  		if(is_dir($sciezka.$f) && $f != '.' && $f != '..')
  		{
			echo '<li>'.$f;
 			wyswietlKatalog($sciezka.$f.'/'); // 1
 			echo '</li>';
 		}
 	}
 	echo '</ul>';
 	closedir($dir);
 } 
 
 
 
 //$path="\\\\pc-877\\oskar\\chł\\";
 $path="C:\\WebServ\\httpd\\";
 //$string = iconv('ASCII', 'UTF-8', $path);

 wyswietlKatalog($path);
 

 
 
 
 
 
?>