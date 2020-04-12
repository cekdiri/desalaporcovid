<?php

namespace app\controllers;

use Yii;
use app\models\JenisLaporanModel;
use app\models\form\JenisLaporanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JenislaporanController implements the CRUD actions for JenisLaporanModel model.
 */
class JenislaporanController extends \app\controllers\MainController
{

    /**
     * Lists all JenisLaporanModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JenisLaporanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JenisLaporanModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new JenisLaporanModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JenisLaporanModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $cache = Yii::$app->cache;
            $cacheUniqueId = implode('-', ['getJenisLaporanList']);
            $cache->delete($cacheUniqueId);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JenisLaporanModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $cache = Yii::$app->cache;
            $cacheUniqueId = implode('-', ['getJenisLaporanList']);
            $cache->delete($cacheUniqueId);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JenisLaporanModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $cache = Yii::$app->cache;
        $cacheUniqueId = implode('-', ['getJenisLaporanList']);
        $cache->delete($cacheUniqueId);
        return $this->redirect(['index']);
    }

    /**
     * Finds the JenisLaporanModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JenisLaporanModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JenisLaporanModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
