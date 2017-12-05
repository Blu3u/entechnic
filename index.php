<?php
require 'Modules\Database\MySQLInterface.class.php';
echo '<pre>';
print_r(MySQLInterface::Exec('SELECT * FROM gaps'));
echo '</pre>';
?>
