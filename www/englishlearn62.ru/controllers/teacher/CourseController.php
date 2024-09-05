<?php

namespace app\controllers\teacher;

use app\models\Course;
use app\models\UploadForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;


class CourseController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


    public function actionIndex()
    {
        $teacher = Yii::$app->session->get('teacher');

        $dataProvider = new ActiveDataProvider([
            'query' => Course::find()->where(['teacher_id' => $teacher -> id]),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new Course();
        $files = new UploadForm();

        $teacher = Yii::$app->session->get('teacher');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model -> teacher_id = $teacher -> id;

                $files->files = UploadedFile::getInstances($files, 'files');

                if ($files->upload()) {
                      $model -> files = $files -> getStrFiles();
                }

                if($model -> save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'files' => $files
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $files = new UploadForm();

        $teacher = Yii::$app->session->get('teacher');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model -> teacher_id = $teacher -> id;

                $files->files = UploadedFile::getInstances($files, 'files');

                if ($files->upload()) {
                      $model -> files = $files -> getStrFiles();
                }

                if($model -> save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'files' => $files
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
