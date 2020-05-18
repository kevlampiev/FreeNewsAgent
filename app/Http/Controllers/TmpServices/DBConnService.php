<?php

namespace App\Http\Controllers\TmpServices;

use PDO;
use PDOException;

define('DB_DRIVER', 'mysql');
define('DB_HOST', '127.0.0.1');

//define('DB_HOST', '192.168.10.10');

define('DB_NAME', 'laravel_1');
define('DB_USER', 'homestead');
define('DB_PASS', 'secret');


define('GOODS_LIM', 12);

final class DBConnService
{
    private static $dBase;
    private function __construct()
    {
    }
    public static function getConnection(string $dbDriver=DB_DRIVER, $dbHost=DB_HOST, string $dbName=DB_NAME, string $dbUser=DB_USER, string $dbPass=DB_PASS): PDO
    {
        if (self::$dBase == null) {
            $connect_str = $dbDriver . ':host=' . $dbHost . ';dbname=' . $dbName;
            self::$dBase = new PDO($connect_str, $dbUser, $dbPass);
            self::$dBase->exec('SET NAMES UTF8');
            self::$dBase->setAttribute(PDO::ATTR_EMULATE_PREPARES, PDO::FETCH_ASSOC);
        };
        return self::$dBase;
    }

    /**
     * Для операторов SELECT и вызовов процедур, возвращающих наборы данных. Много строк
     */
    public static function selectRowsSet(string $sql, array $params = []): array
    {
        try {
            $stmt = self::getConnection()->prepare($sql);
            $stmt->execute($params);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $rows = ['error', $e->getMessage()];
        }
        return $rows;
    }

    /**
     * Для операторов SELECT и вызовов процедур, возвращающих наборы данных. Только 1 строка
     */
    public static function selectSingleRow(string $sql, array $params = []): array
    {
        $result = self::selectRowsSet($sql, $params);
        if ($result != []) {
            return $result[0];
        } else {
            return [];
        }
    }

    /**
     * Для INSERT, DELETE, UPDATE
     */
    public static function execQuery(string $sql, array $params): array
    {
        try {
            $stmt = self::getConnection()->prepare($sql);
            $stmt->execute($params);
            $result = ['status'=> 'Ok'];
        } catch (PDOException $e) {
            $result = ['status'=> 'Error: ' . $e->getMessage()];
        }
        return $result;
    }
}
