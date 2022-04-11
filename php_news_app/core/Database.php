<?php
    namespace app\core;

    class Database {
        public \PDO $pdo;

        public function __construct() {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=news_app', 'root', getenv("myAdminroot"));
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        public function prepare($sql) {
            return $this->pdo->prepare($sql);
        }

        public function appGetUser($id) {
            $query = "SELECT id, 
                            users_fname, 
                            users_lname, 
                            users_email, 
                            users_status 
                        FROM users WHERE id=:id";
            $statement = $this->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);

            return $result;
        }

    }