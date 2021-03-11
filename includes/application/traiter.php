<?php
require_once('../config/config.php');
set_time_limit ( 120 );
$cmd = "matlab -nodisplay -nosplash -nodesktop -wait -r cd('".PFE_MATLAB_DIR."'),comb('".UPLOAD_DIR."\\".$_POST['file_name']."')";
exec($cmd);
$File=fopen('../../matlab/result.txt','r');
fscanf($File,'%d',$classe);
fclose($File);

$T[1]='سيدي إبراهيم الزهار';
$T[2]='زنوش';
$T[3]='رأس الذراع';
$T[4]='شعال';
$T[5]='الخليج';
$T[6]='تطاوين 7 نوفمبر';
$T[7]='أكودة';
$T[8]='نحال';
$T[9]='الدخانية';
$T[10]='الرضاع';
$File=fopen('../../matlab/result.txt','w');
fprintf($File,'%s',$T[$classe]);
fclose($File);

?>
command executed