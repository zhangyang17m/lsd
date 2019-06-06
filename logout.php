<?php
session_start();

// logout session
session_unset();
session_destroy();

?>

<html>
<body>
<p align="center">You have logout successfully!</p>
<p align="center"><a href="userlogin.php">Login again</a></p>

</body>
</html>
