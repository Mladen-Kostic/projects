<?php
    namespace app\models;
    use app\core\DbModel;

    class User extends DbModel {
        public int $id = 0;
        public string $users_fname = '';
        public string $users_lname = '';
        public string $users_email = '';
        public string $users_password = '';
        public string $confirmPassword = '';

        public static function tableName(): string {
            return 'users';
        }

        public function primaryKey(): string {
            return 'id';
        }

        public function save() {
            $this->users_password = password_hash($this->users_password, PASSWORD_DEFAULT);

            return parent::save();
        }

        public function attributes(): array {
            return ['users_fname', 'users_lname', 'users_email', 'users_password'];
        }

        public function getDisplayName(): string {
            return $this->users_fname . ' ' . $this->users_lname;
        }

        public function loadData($data) {
            foreach ($data as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->{$key} = $value;
                }
            }
        }
    }