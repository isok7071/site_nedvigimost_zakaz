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
class LkController extends Controller
{

    public function beforeAction($action)
    {
        if (!Yii::$app->user->isGuest){
            return true;
        }else{
            $this->redirect(['/site/auth']);
            return false;
        }
    }

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
        $dataProvider = $searchModel->searchByUser($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


}
