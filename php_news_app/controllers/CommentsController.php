<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\core\Request;
    use app\core\Response;
    use app\core\Application;
    use app\models\CommentModel;

    class CommentsController extends Controller {
        public function deleteCommentRender(Request $request, Response $response) {

            $this->setLayout('updateDelete');
            return $this->render('deleteComment');
        }

        public function deleteComment(Request $request, Response $response) {
            $getBody = $request->getBody();
            $comments_id = $getBody['comments_id'];
            $commentModel = new CommentModel();

            $commentModel->deleteComment($comments_id);
            Application::$app->session->setFlash('success', 'Comment Deleted');
            $response->redirect('/article?id=' . $getBody['article_id']);
        }

        public function editCommentRender(Request $request, Response $response) {
            $this->setLayout('updateDelete');
            return $this->render('editComment');
        }

        public function editComment(Request $request, Response $response) {
            $params = [];
            $getBody = $request->getBody();
            $params['comments_body'] = $getBody['comments_body'];
            $params['comments_id'] = $getBody['comments_id'];
            $commentModel = new CommentModel();

            $commentModel->editComment($params);
            Application::$app->session->setFlash('success', 'Comment Updated');
            $response->redirect('/article?id=' . $getBody['article_id']);
            return true;
        }

        public function addComment(Request $request, Response $response) {
            $getBody = $request->getBody();

            if ($request->isPost() && $getBody['comments_body']) {
                
                $commentModel = new CommentModel();

                $commentModel->addComment($getBody);
                Application::$app->session->setFlash('success', 'Comment added');
                $response->redirect('/article?id=' . $getBody['news_id']);
            } else {
                Application::$app->session->setFlash('error', 'You can\'t add empty comment');
                $response->redirect('/article?id=' . $getBody['news_id']);
            }
        }
    }