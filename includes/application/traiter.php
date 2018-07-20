<?php
set_time_limit ( 120 );
exec("matlab -nodisplay -nosplash -nodesktop -wait -r cd('C:\\xampp\\htdocs\\pfe\\matlab\\'),comb('C:\\xampp\\htdocs\\pfe\\uploads\\".$_POST['file_name']."')");
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