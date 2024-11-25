<?php

					define('HOSTNAME', 'localhost');
					define('USERNAME', 'root');
					define('PASSWORD','');
					define('DATABASE','crud_test');
					$conection = new mysqli("localhost", "root","","crud_test" );
					if ($conection->connect_error) {
						die("Kết nối thất bại: " . $conn->connect_error);
					}
					
?>