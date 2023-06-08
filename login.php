<?php
session_start();
include "database.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: giris.php?error=Kullanıcı Adı gereklidir");
        exit();
    } else if (empty($password)) {
        header("Location: giris.php?error=Şifre gereklidir");
        exit();
    } else {
        $md5Password = md5($password);
        $sha1Password = sha1($md5Password);
        
        $db = new db\Database();
        $pdo = $db->getPDO2(); // İkinci veritabanına bağlanan PDO nesnesini alır

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$sha1Password'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) === 1) {
            $row = $result[0];
            if ($row['username'] === $username && $row['password'] === $sha1Password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            } else {
                header("Location: giris.php?error=Geçersiz kullanıcı adı ve şifre.");
                exit();
            }
        } else {
            header("Location: giris.php?error=Geçersiz kullanıcı adı ve şifre.");
            exit();
        }
    }
} else {
    header("Location: giris.php");
    exit();
}
?>