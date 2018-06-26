<?php
		session_start();
		$_SESSION['log']=0;

		include "webconfig.php";

		$username = $_POST["username"];
		$password = $_POST["password"];

			/*$ldapID = ldap_connect ("10.215.88.6");

			if (!$ldapID)
			{
			  echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php">';
			  echo "Error 101 : LDAP server is currently unavailable. Please contact ICT at 5072.";
			  exit;
			}

			if (!ldap_bind($ldapID,$username."@tnb.com.my", $password))
			{
			  echo '<META HTTP-EQUIV="Refresh" Content="2; URL=index.php">';
			  echo "Your username or password is not matched. Please try again using your TNB email username and password.";
			  exit;
			}

			ldap_unbind($ldapID);
			*/

			$sqlstr = mysql_query("SELECT * FROM access WHERE username = '$username'");

			if (mysql_numrows($sqlstr) != 0)
			{

					while ($row = mysql_fetch_array($sqlstr))
					{
						$name = $row['name'];
						$station = $row['station'];
						$level = $row['level'];

						$_SESSION['username']=$username;
						$_SESSION['name']=$name;
						$_SESSION['station']=$station;
						$_SESSION['level']=$level;
						$ip = $_SERVER['REMOTE_ADDR'];
						$_SESSION['ip']=$ip;


						if ($level == 'Administrator')
						{
							$_SESSION['log']=1; //administrator
							echo '<META HTTP-EQUIV="Refresh" Content="0; URL=viewjoblist.php">';
							exit;
						}
						else
						{
							$_SESSION['log']=2; //user
							echo '<META HTTP-EQUIV="Refresh" Content="0; URL=viewjoblist.php">';
							exit;
						}
					}
			}
			else
			{
				$_SESSION['log']=0;
				echo "Your username and password not match. Please try again. Thank you.";
				echo '<META HTTP-EQUIV="Refresh" Content="3; URL=index.php">';
				exit;
			}
?>
