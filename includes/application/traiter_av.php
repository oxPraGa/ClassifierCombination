<?php
require_once('../config/config.php');
set_time_limit ( 120 );
$cmd = "matlab -nodisplay -nosplash -nodesktop -wait -r cd('".PFE_MATLAB_DIR."'),comb_av('".UPLOAD_DIR."\\".$_POST['file_name']."')";
exec($cmd);

?>
command executed