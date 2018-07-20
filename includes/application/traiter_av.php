<?php
set_time_limit ( 120 );
exec('matlab -nodisplay -nosplash -nodesktop -wait -r cd(\'C:\\xampp\\htdocs\\pfe\\matlab\\\'),comb_av(\'C:\\xampp\\htdocs\\pfe\\uploads\\'.$_POST['file_name'].'\')');

?>
command executed