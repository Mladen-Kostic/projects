<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\core\Request;
    use app\core\Response;
    use app\models\LoginForm;
    use app\core\Application;
    use app\models\User;

    class AuthController extends Controller {
        
        public function login(Request $request, Response $response) {
            $loginForm = new LoginForm();

            if ($request->isPost()) {
                $loginForm->loadData($request->getBody());
                
                if ($loginForm->login()) {
                    $response->redirect('/');
                    return;
                }
            }

            /**
             * @params = \app\models\LoginForm->login_errors
             */
            $params = $loginForm->login_errors;
            $this->setLayout('auth');
            return $this->render('login', $params);
        }

        public function logout(Request $request, Response $response) {
            Application::$app->logout();
            $response->redirect('/');
        }

        public function register(Request $request) {
            $user = new User();

            if ($request->isPost()) {
                $user->loadData($request->getBody());

                if ($this->registerValidation($user)) {
                    Application::$app->session->setFlash('success', 'Account created successfully! You can now <a href="/login">Log In here.</a>');
                    Application::$app->response->redirect('/');
                }

                return $this->render('register', ['model' => $user]);
            }

            $this->setLayout('auth');
            return $this->render('register', ['model' => $user]);
        }
        
        public function registerValidation(\app\models\User $user) {
            $registrationErrors = [];
            if ($user->users_fname && $user->users_lname && $user->users_email && $user->users_password && $user->confirmPassword) {
                if (filter_var($user->users_email, FILTER_VALIDATE_EMAIL) && 
                    $this->registerUniqueEmail($user)) {
                    if ($user->users_password === $user->confirmPassword) {
                        return $user->save();
                    } else {
                        Application::$app->session->setFlash('error', 'Passwords do not match');
                    }
                } else {
                    Application::$app->session->setFlash('error', 'Invalid Email');
                }
            } else {
                Application::$app->session->setFlash('error', 'Please fill in all fields');
            }
        }

        public function registerUniqueEmail($user) {
            $email = $user->users_email;

            $exists = $user->findOne(['users_email' => $email]) ?? false;
            return !$exists;
        }
    }