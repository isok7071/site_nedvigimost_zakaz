<?php

namespace app\controllers;

use app\models\Nedvishimost;
use app\models\NedvishimostSearch;
use app\models\NedvishomostComforts;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NedvishimostController implements the CRUD actions for Nedvishimost model.
 */
class Nedvishimost_adminController extends Controller
{
    public function beforeAction($action)
    {
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->admin==1){
            return true;
        }else{
            $this->redirect(['/site/index']);
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

                ],
            ]
        );
    }


    public function actionComplete($id)
    {
        $model = NedvishimostSearch::findOne($id);
        $model->status_proverki = 'Проверено модерацией';
        $model->save();
        Yii::$app->session->setFlash('success', 'Объявление выставлено на показ');
        return $this->redirect(['/nedvishimost']);
    }

    public function actionCancel($id)
    {
        $model = NedvishimostSearch::findOne($id);
        $model->status_proverki = 'Отклонено';
        $model->save();
        Yii::$app->session->setFlash('success', 'Объявление отклонено');
        return $this->redirect(['/nedvishimost']);
    }

    /**
     * Deletes an existing Nedvishimost model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Объявление удалено');
        return $this->redirect(['/nedvishimost']);
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
