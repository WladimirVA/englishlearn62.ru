<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{

    public $files;
    private $arrFiles = [];

    public function rules()
    {
        return [
            [['files'], 'file', 'skipOnEmpty' => true,  'maxFiles' => 10],
        ];
    }

    public function attributeLabels()
    {
        return [
            'files' => 'Файлы курса',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->files as $file) {
                $path = 'files/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this -> arrFiles[] = "/" . $path;
            }
            return true;
        } else {
            return false;
        }
    }


    public function getStrFiles()
    {
        if(!empty($this -> arrFiles)){
            return implode(PHP_EOL, $this -> arrFiles);
        }else{
            return null;
        }
    }
}