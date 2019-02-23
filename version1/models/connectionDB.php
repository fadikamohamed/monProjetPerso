<?php

class SingletonClass {

    /**
     *
     * @var SingletonClass
     */
    private static $_instance;

    private function __construct()
    {
        try {
            $this->pdo = NEW PDO('mysql:host=localhost;dbname=siteManga;charset=utf8', 'root', 'mohamedf', [PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (true === is_null(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

}