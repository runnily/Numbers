# Numbers 

A basic web application which performs the following:

	(1) Generate numbers from 0-100

	(2) Unused numbers list

	(3) Used numbers list

	(4) Ability to move numbers from unused to the used list

	(5) Ability to move numbers from the used list to the unused list

This includes the following files:

	(1) setup/settings.php: Used for setting up the database

	(2) css/style.css: Styling for the webpage

	(3) unusedNumbers.php fetches the used number within the database; 
	    user can use this to unselect a used number.

	(4) usedNumbers.php fetches the unused number within the database
	    user can use this to select a number for use.
		

To start the web application,

change the default creditionals within setup/setting.php to your own.

$servername = <<your servername>>;
	
$username = <<your rootname>>;
	
$password = <<your password>>;

then run setup/settings.php on your apache server to setup the database

