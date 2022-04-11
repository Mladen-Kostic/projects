<?php
    namespace app\models;
    use app\core\Application;

    class NewsModel {
        public function getCategories() {
            $categories = [];
            $statement = Application::$app->db->pdo->query('SELECT DISTINCT category FROM news');
            while ($row=$statement->fetch(\PDO::FETCH_ASSOC)) {
                $categories[] = $row['category'];
            }
            return $categories;
        }

        public function getNews($category) {
            if ($category === 'all') {
                $statement = Application::$app->db->pdo->query('SELECT id, news_title, news_image FROM news ORDER BY id DESC');
                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

                return $result;
            }

            //with $category argument;
            
            $statement = Application::$app->db->pdo->prepare("SELECT id, news_title, news_image, category FROM news WHERE category LIKE :category ORDER BY id DESC");
            $statement->execute(array(':category' => $category));
            
            if ($statement->rowCount() === 0) {
                return '<h1>Wrong category</h1>';
            } else {
                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            }
        }

        public function getArticle($id) {
            $statement = Application::$app->db->prepare("SELECT news_title, news_image, news_body FROM news WHERE id=:id");
            $statement->bindParam(':id', $id);
            $statement->execute();

            $data = $statement->fetch(\PDO::FETCH_ASSOC);

            return $data;
        }
    }