<?php
    namespace app\models;
    use app\core\Database;
    use app\core\Application;

    class CommentModel extends Database {
        public function allComments() {
            $news_id = Application::$app->request->getBody()['id'] ?? false;
            
            if ($news_id) {
                $statement = $this->prepare('SELECT comments.id, 
                                                users_id, 
                                                datetime_posted, 
                                                comments_body, 
                                                users_fname, 
                                                users_lname,
                                                users_email 
                                            FROM comments JOIN users 
                                            ON users.id = comments.users_id WHERE news_id=:news_id');
                $statement->bindValue(':news_id', $news_id);
                $statement->execute();

                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            } else {
                return false;
            }
        }

        public function deleteComment($comments_id) {
            $statement = $this->prepare('DELETE FROM comments WHERE id=:id');
            $statement->bindValue(':id', $comments_id);
            $statement->execute();

            return true;
        }

        public function editComment($params) {
            $comments_body = $params['comments_body'];
            $comments_id = $params['comments_id'];
            $statement = $this->prepare('UPDATE comments SET comments_body=:comments_body WHERE id=:comments_id');
            $statement->execute(array(
                ':comments_body' => $comments_body,
                ':comments_id' => $comments_id
            ));
            $statement->execute();

            return true;
        }

        // { ["users_id"]=> string(1) "4" ["news_id"]=> string(1) "9" ["comments_body"]=> string(11) "new comment" }
        public function addComment($data) {
            $users_id = $data['users_id'];
            $news_id = $data['news_id'];
            $comments_body = $data['comments_body'];

            $statement = $this->prepare('INSERT INTO comments (users_id, news_id, comments_body) VALUES (:users_id, :news_id, :comments_body)');
            $statement->execute(array(
                ':users_id' => $users_id,
                ':news_id' => $news_id,
                ':comments_body' => $comments_body,
            ));
            return true;
        }
    }