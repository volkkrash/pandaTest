<?

class DB {

  const USER = "user";
  const PASS = "";
  const HOST = "localhost";
  const DB = "";

  public static function connect() {
    $user = self::USER;
    $pass = self::PASS;
    $host = self::HOST;
    $db = self::DB;

    $conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
    return $conn;
  }
}
