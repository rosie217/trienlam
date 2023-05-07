<?php

namespace backend\controllers;

use common\models\Image;
use backend\models\search\ImageSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ImageController implements the CRUD actions for Image model.
 */
class ImageController extends Controller {

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
	 * Lists all Image models.
	 *
	 * @return string
	 */
	public function actionIndex() {
		$searchModel  = new ImageSearch();
		$dataProvider = $searchModel->search($this->request->queryParams);
		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Creates a new Image model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return string|\yii\web\Response
	 */
	public function actionCreate() {
		$model = new Image();
		if ($this->request->isPost) {
			if ($model->load($this->request->post())) {
				$model->images = UploadedFile::getInstances($model, 'images');
				foreach ($model->images as $image) {
					$Image = new Image();
					$fileName = microtime(true) . '.' . $image->extension;
					if ($image->saveAs(\Yii::getAlias('@frontend/web/uploads/images/' . $fileName))) {
						$Image->image_url = Yii::$app->params['uploadUrl'] . '/uploads/images/' . $fileName;
						$Image->title_id  = $this->request->post()['Image']['title_id'];
						$Image->save();
					}
				}
				return $this->redirect([
					'index',
				]);
			}
		} else {
			$model->loadDefaultValues();
		}
		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Image model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param int $id ID
	 *
	 * @return \yii\web\Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id) {
		$oldImage     = Image::find()->where(['id' => $id])->one();
		$image_delete = $oldImage->image_url;
		unlink(\Yii::getAlias('@frontend/web/uploads/images/' . basename($image_delete)));
		$this->findModel($id)->delete();
		return $this->redirect(['index']);
	}

	/**
	 * Finds the Image model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param int $id ID
	 *
	 * @return Image the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Image::findOne(['id' => $id])) !== null) {
			return $model;
		}
		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
