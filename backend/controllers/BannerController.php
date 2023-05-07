<?php

namespace backend\controllers;

use common\models\Banner;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BannerController implements the CRUD actions for Banner model.
 */
class BannerController extends Controller {

	/**
	 * @inheritDoc
	 */
	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::class,
				'only'  => [
					'create',
					'index',
					'delete',
				],
				'rules' => [
					// allow authenticated users
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}

	/**
	 * Lists all Banner models.
	 *
	 * @return string
	 */
	public function actionIndex() {
		$dataProvider = new ActiveDataProvider([
			'query' => Banner::find(),
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

	/**
	 * Creates a new Banner model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return string|\yii\web\Response
	 */
	public function actionCreate() {
		$model = new Banner();
		if ($this->request->isPost) {
			if ($model->load($this->request->post())) {
				$image = UploadedFile::getInstances($model, 'image_url')[0];
				$fileName         = microtime(true) . '.' . $image->extension;
				if ($image->saveAs(\Yii::getAlias('@frontend/web/uploads/banner/' . $fileName))) {
					$model->image_url = Yii::$app->params['uploadUrl'] . '/uploads/banner/' . $fileName;
					$model->save();
				}
				return $this->redirect(['index']);
			}
		} else {
			$model->loadDefaultValues();
		}
		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Banner model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param int $id ID
	 *
	 * @return \yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id) {
		$oldImage     = Banner::find()->where(['id' => $id])->one();
		$image_delete = $oldImage->image_url;
		unlink(\Yii::getAlias('@frontend/web/uploads/banner/' . basename($image_delete)));
		$this->findModel($id)->delete();
		return $this->redirect(['index']);
	}

	/**
	 * Finds the Banner model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param int $id ID
	 *
	 * @return Banner the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Banner::findOne(['id' => $id])) !== null) {
			return $model;
		}
		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
