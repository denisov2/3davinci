<?php

namespace app\components;

/**
 * Created by PhpStorm.
 * User: denisov
 * Date: 06.05.2018
 * Time: 20:30
 */
class User
{
    public $githubId;
    public $githubLogin;

    private static $table = 'user';
    private static $db;
    
    public static function setDB()
    {
        self::$db = DB::getConnection();
    }

    public static function find($id)
    {
        $statement = self::$db->prepare("select * from " . self::$table . " WHERE github_id = $id");
        $result = $statement->execute();

        if ($statement->rowCount()) return true;
        else return false;
    }

    public static function update($id, $login)
    {

        $statement = self::$db->prepare("update " . self::$table . " SET github_login = :github_login WHERE github_id=:github_id");
        $statement->execute([
            'github_id' => $id,
            'github_login' => $login,
        ]);

        if ($statement->rowCount()) return true;
        else return false;
    }

    public static function create($id, $login)
    {
        $sql = "INSERT INTO " . self::$table . " (github_id, github_login) VALUES (:github_id,:github_login)";
        $statement = self::$db->prepare($sql);


        $statement->execute([
            'github_id' => $id,
            'github_login' => $login,
        ]);


        if ($statement->rowCount()) return true;
        else return false;
    }
}