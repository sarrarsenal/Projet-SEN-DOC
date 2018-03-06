<?php function CopyDir($origine, $destination) {
$test = scandir($origine);

$file = 0;
$file_tot = 0;

foreach($test as $val) {
if($val!="." && $val!="..") {
if(is_dir($origine."/".$val)) {
CopyDir($origine."/".$val, $destination."/".$val);
IsDir_or_CreateIt($destination."/".$val);
} else {
$file_tot++;
if(copy($origine."/".$val, $destination."/".$val)) {
$file++;
} else {
if(!file_exists($origine."/".$val)) {
echo $origine."/".$val;
}
}
}
}
}
return true;
}
?>