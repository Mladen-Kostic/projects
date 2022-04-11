<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\core\Application;
    use app\models\NewsModel;
    use app\models\CommentModel;

    class SiteController extends Controller {
        public function home() {
            $params = $this->getDataByCategory();
            return $this->render('home', $params);
        }

        public function article() {
            $commentModel = new CommentModel;
            $params = [];
            $params['article'] = $this->getRow();
            $params['comments'] = $commentModel->allComments();

            return $this->render('article', $params);
        }

        public static function siteSetCategories(): array {
            $news_model = new NewsModel;
            $categories = $news_model->getCategories();

            return $categories;
        }
        
        public function getDataByCategory(): array {
            $news_model = new NewsModel;
            $category = Application::$app->request->getBody();
            
            if (!isset($category['category'])) {
                $category = Application::$app->category;
                $data = $news_model->getNews($category);

                return $data;
            } else {
                $data = $news_model->getNews($category['category']);
                
                return $data;
            }
        }
        # treba da vrati sliku naslov i tekst
        public function getRow(): array {
            $id = Application::$app->request->getBody()['id'] ?? false;
            
            if (!$id) {
                Application::$app->response->redirect('/');
            }

            $news_model = new NewsModel;
            
            $data = $news_model->getArticle($id);
            
            return $data;
        }

    }