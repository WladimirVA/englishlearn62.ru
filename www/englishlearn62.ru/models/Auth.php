<?php

namespace app\models;
use app\models\Student;
use app\models\Administrator;
use app\models\Teacher;
use Yii;

class Auth extends \yii\base\BaseObject
{

    public static function setStudent($identity)
    {

        $session = Yii::$app->session;
        $session->destroy();
        $session->open();

        $session->set('student', $identity);
    }

    public static function checkStudent($email, $password)
    {
        $u = Student::findOne(['email' => $email]);

        if($u && Yii::$app -> security -> validatePassword($password, $u -> password_hash)){
          static::setStudent($u);
          return true;
        }else{
          Yii::$app -> session -> setFlash('danger', 'Неверный логин или пароль');
          return false;
        }

    }

    public static function isStudent()
    {
        $session = Yii::$app->session;
        return $session->has('student');
    }


    public static function setAdmin($identity)
    {

        $session = Yii::$app->session;
        $session->destroy();
        $session->open();

        $session->set('admin', $identity);
    }

    public static function isAdmin()
    {
        $session = Yii::$app->session;
        return $session->has('admin');
    }


    public static function checkAdmin($login, $password)
    {
        $u = Administrator::findOne(['email' => $login]);

        if($u && Yii::$app -> security -> validatePassword($password, $u -> password_hash)){
          static::setAdmin($u);
          return true;
        }else{
          Yii::$app -> session -> setFlash('danger', 'Неверный логин или пароль');
          return false;
        }

    }

    public static function setTeacher($identity)
    {

        $session = Yii::$app->session;
        $session->destroy();
        $session->open();

        $session->set('teacher', $identity);
    }

    public static function isTeacher()
    {
        $session = Yii::$app->session;
        return $session->has('teacher');
    }


    public static function checkTeacher($login, $password)
    {
        $u = Teacher::findOne(['email' => $login]);

        if($u && Yii::$app -> security -> validatePassword($password, $u -> password_hash)){
          static::setTeacher($u);
          return true;
        }else{
          Yii::$app -> session -> setFlash('danger', 'Неверный логин или пароль');
          return false;
        }

    }


    public static function logout()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->destroy();
    }
}
