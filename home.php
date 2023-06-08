<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php">Logout</a>

      <!-- Kullanıcı Listesi sayfasına geçiş yapmak için bağlantı -->
    <p><a href="liste.php">Kullanıcıları Listele</a></p>

</body>
</html>

<?php 
}else{
     header("Location: giris.php");
     exit();
}
 ?>