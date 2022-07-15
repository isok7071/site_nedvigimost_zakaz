<?php

namespace app\controllers;

use app\models\Nedvishimost;
use app\models\NedvishimostSearch;
use app\models\NedvishomostComforts;
use Yii;
use yii\web\Controller;
use yii\web\JsonResponseFormatter;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/**
 * NedvishimostController implements the CRUD actions for Nedvishimost model.
 */
class NedvishimostController extends Controller
{
    /**
     * @inheritDoc
     */
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

    /**
     * Lists all Nedvishimost models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NedvishimostSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nedvishimost model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Nedvishimost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        if(Yii::$app->user->isGuest){
            $this->redirect(['/site/index']);
            return false;
        }

        $model = new Nedvishimost();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $i = 0;
                    $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
                    foreach ($model->imageFiles as $file) {
                        if ($i == 0) {
                            $model->photo1 = $file;
                            $filename1 = md5($model->photo1->baseName . time()) . '.' . $model->photo1->extension;
                            $model->photo1->saveAs('@webroot/uploads/' . $filename1);
                            $model->photo1 = $filename1;
                        }
                        if ($i == 1) {
                            $model->photo2 = $file;
                            $filename2 = md5($model->photo2->baseName . time()) . '.' . $model->photo2->extension;
                            $model->photo2->saveAs('@webroot/uploads/' . $filename2);
                            $model->photo2 = $filename2;
                        }
                        if ($i == 2) {
                            $model->photo3 = $file;
                            $filename3 = md5($model->photo3->baseName . time()) . '.' . $model->photo3->extension;
                            $model->photo3->saveAs('@webroot/uploads/' . $filename3);
                            $model->photo3 = $filename3;
                        }
                        $i++;
                    }


                if ($model->id_type != 3 && $model->nomer_etash > $model->vsego_etash) {
                    \Yii::$app->session->setFlash('danger', 'Вы ввели неправильное количество этажей');
                    $this->redirect(['/site/pass']);
                    return false;
                }

                $model->id_user = \Yii::$app->user->id;
                $model->save(false);

                $comf_list = Yii::$app->request->post('Nedvishimost')['id_comforts'];
                foreach ($comf_list as $item) {
                    $model_comf = new NedvishomostComforts();
                    $model_comf->id_nedvigimost = $model->id;
                    $model_comf->id_comforts = $item;
                    $model_comf->save();
                }

                $this->redirect(['/site/pass']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Finds the Nedvishimost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Nedvishimost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nedvishimost::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
