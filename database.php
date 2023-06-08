<?php
namespace db; // 'takip' isim alanını tanımlar. Bu, Database sınıfının tanımlandığı alanı belirtir.
use PDO; // PDO sınıfını kullanabilmek için PDO sınıfını içeri aktarır. PDO, PHP'nin veritabanı işlemlerini gerçekleştirmek için kullanılan bir sınıftır.
use PDOException; //  PDOException sınıfını içeri aktarır. Bu sınıf, PDO'dan kaynaklanan istisnaları yakalamak için kullanılır.
// 'Database' adında bir sınıf tanımlar. Bu sınıf, veritabanı bağlantısı işlemlerini gerçekleştirmek için kullanılır.
class Database {
private $MYSQL_HOST = 'localhost'; // Veritabanına bağlanmak için kullanılacak MySQL sunucusunun adresini belirtir.
private $MYSQL_USER = 'root'; //  Veritabanına bağlanmak için kullanılacak MySQL kullanıcı adını belirtir.
private $MYSQL_PASSWORD = ''; // Veritabanına bağlanmak için kullanılacak MySQL şifresini belirtir. Boş bir şifre kullanıldığı durumda bu alana boş bir dize atanır.
private $MYSQL_db ='takip'; // Bağlanılacak MySQL veritabanının adını belirtir.
private $MYSQL_db2 ='login'; // Bağlanılacak MySQL veritabanının adını belirtir.
private $CHARSET = 'UTF8'; // Veritabanı bağlantısında kullanılacak karakter kümesini belirtir.
private $COLLATION = 'utf8mb3_general_ci'; // Veritabanı
private $pdo = null; // PDO nesnesi için başlangıçta boş bir değer atanır.
private $pdo2 = null; // İkinci veritabanı için PDO nesnesi

// 'Database' sınıfının yapıcı metodunu tanımlar. Bu metod, Database sınıfından bir örnek oluşturulduğunda otomatik olarak çağrılır ve veritabanı bağlantısını gerçekleştirir.
public function __construct() {
    // SQL Bağlantısını açma
    $SQL = "mysql:host=" . $this->MYSQL_HOST . ";dbname=" . $this->MYSQL_db;
    $SQL2 = "mysql:host=" . $this->MYSQL_HOST . ";dbname=" . $this->MYSQL_db2;

    
    // Bağlantı işlemini gerçekleştirirken olası hataları yakalamak için bir try-catch bloğu kullanır. Eğer bir hata oluşursa, hata mesajını yakalar ve ekrana basar.
    try{
        $this->pdo = new PDO($SQL, $this->MYSQL_USER, $this->MYSQL_PASSWORD); // PDO sınıfının bir örneğini oluşturur ve MySQL sunucusuna bağlanır.
        $this->pdo->exec("SET NAMES '" . $this->CHARSET."' COLLATE '" . $this->COLLATION. "'"); // Veritabanı bağlantısının karakter kümesini ayarlar.
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // PDO'nun hata modunu ve istisna modunu ayarlar
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Varsayılan veri çekme modunu belirtir.

        $this->pdo2 = new PDO($SQL2, $this->MYSQL_USER, $this->MYSQL_PASSWORD);
        $this->pdo2->exec("SET NAMES '" . $this->CHARSET . "' COLLATE '" . $this->COLLATION . "'");
        $this->pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo2->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    }catch(PDOException $e) {
        echo $e->getMessage();
        die("PDO ile veritabanına bağlanmadı");
    }
}
public function getPDO() // PDO nesnesini döndüren bir metod tanımlar.
{
    return $this->pdo;
}
public function getPDO2()
{
    return $this->pdo2;
}

// Database sınıfının yıkıcı metodunu tanımlar. Bu metod, Database sınıfından bir örnek yok edildiğinde otomatik olarak çağrılır ve veritabanı bağlantısını kapatır.
public function __destruct() {
    $this->pdo = null;
    $this->pdo2 = null;
}
}
?>