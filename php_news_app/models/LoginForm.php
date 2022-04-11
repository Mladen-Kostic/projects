<?php
    namespace app\models;
    use app\core\Application;

    class LoginForm {
        public string $users_email = '';
        public string $users_password = '';
        public array $login_errors = [];

        public function login() {
            $user = User::findOne(['users_email' => $this->users_email]);
            
            if (!$user) {
                $this->login_errors['users_email'] = 'Wrong email';
                
                return false;
            }
            
            if (!password_verify($this->users_password, $user->users_password)) {
                $this->login_errors['users_password'] = 'Incorrect password';
                
                return false;
            }
            
            return Application::$app->login($user);
        }

        public function loadData($data) {
            foreach ($data as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->{$key} = $value;
                }
            }
        }
    }