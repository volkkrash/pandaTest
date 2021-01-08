<?

class DB {

  const USER = "volkrash_db";
  const PASS = "LKY86svz";
  const HOST = "volkrash.mysql.tools";
  const DB = "volkrash_db";

  public static function connect() {
    $user = self::USER;
    $pass = self::PASS;
    $host = self::HOST;
    $db = self::DB;

    $conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
    return $conn;
  }
}