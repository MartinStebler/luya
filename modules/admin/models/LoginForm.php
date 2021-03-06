<?php
namespace admin\models;

class LoginForm extends \yii\base\Model
{
    private $_user = false;

    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, "Incorrect username or password");
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            $user->scenario = 'login';
            $user->auth_token = \yii::$app->security->hashData(\yii::$app->security->generateRandomString(), $user->password_salt);
            $user->save();

            return $user;
        } else {
            return false;
        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = \admin\models\User::findByEmail($this->email);
        }

        return $this->_user;
    }
}
