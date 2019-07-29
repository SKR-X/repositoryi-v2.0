<?php
?>
<!DOCTYPE html>
<html>
 <head>
   <title>Project</title>
   <link rel="stylesheet" type="text/css" href="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta charset="utf-8">
 </head>
 <body>
   <div class="page">
<div class="loginform">
  <div class="loginhdr"><h1>REGISTRATION</h1></div>
<form method="POST" action="register_user.php">
<input type="text" name="username" placeholder="Username" required>
<input type="email" name="email" placeholder="E-mail" required>
<input type="text" name="fio" placeholder="FIO" required>
<input type="text" name="country" placeholder="Country" required>
<input type="text" name="region" placeholder="Region" required>
<input type="text" name="city" placeholder="City" required>
<input type="submit" name="reg" value="REGISTER" required>
</form>
<p>Password will be generated automatically</p>
</div>
</div>
</body> 
</html>
