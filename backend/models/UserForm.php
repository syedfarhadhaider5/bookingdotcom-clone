<?php

namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Model;


/**
 * Create user
 */
class UserForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $status;
    public $repeat_password;

    private $model;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email','username'], 'required'],
            [['status'], 'integer'],

            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'min' => 8],
            ['repeat_password', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
            [['username'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 255],
            ['email', 'unique',
                'targetClass' => '\common\models\User',
                'message' => 'This User already exists in the system'
            ],
            ['username', 'unique',
                'targetClass' => '\common\models\User',
                'message' => 'This User Name already exists in the system'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'password_hash' => 'Password Hash',
            'oauth_client' => 'Oauth Client',
            'oauth_client_user_id' => 'Oauth Client User ID',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'logged_at' => 'Logged At',
        ];
    }
    /**
     * @return User
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }
    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function save()
    {
        if ($this->validate()) {
            $model = $this->getModel();
            $isNewRecord = $model->getIsNewRecord();
            $model->username = $this->username;
            $model->email = $this->email;
            $model->status = $this->status;
            $model->generateAuthKey();
            $model->generateAccessToken();
            if ($this->password) {
                $model->setPassword($this->password);
            }
            if (!$model->save()) {
                throw new Exception('Model not saved');
            }
            if ($isNewRecord) {
                $params['user_id'] = $model->id;
                $params['first_name'] = '';
                $params['last_name'] = '';
                $model->afterSignup($params);
            }
            return !$model->hasErrors();
        }
        return null;
    }
}
