<?php

namespace backend\controllers;

use backend\models\search\AdminSearch;
use common\models\Admin;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller {

	/**
	 * @inheritDoc
	 */
	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::class,
				'only'  => [
					'create',
					'update',
					'index',
					'view',
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
	 * Lists all Admin models.
	 *
	 * @return string
	 */
	public function actionIndex() {
		$searchModel  = new AdminSearch();
		$dataProvider = $searchModel->search($this->request->queryParams);
		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Creates a new Admin model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return string|Response
	 */
	public function actionCreate() {
		$model = new Admin();
		if ($this->request->isPost) {
			if ($model->load($this->request->post())) {
				$model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
				if ($model->save()) {
					return $this->redirect([
						'index',
					]);
				}
			}
		} else {
			$model->loadDefaultValues();
		}
		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Admin model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param int $id ID
	 *
	 * @return string|Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);
		if ($this->request->isPost && $model->load($this->request->post())) {
			$model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
			if ($model->save()) {
				return $this->redirect([
					'index',
				]);
			}
			return $this->redirect([
				'index',
			]);
		}
		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Admin model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param int $id ID
	 *
	 * @return Response
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();
		return $this->redirect(['index']);
	}

	/**
	 * Finds the Admin model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param int $id ID
	 *
	 * @return Admin the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Admin::findOne(['id' => $id])) !== null) {
			return $model;
		}
		throw new NotFoundHttpException('The requested page does not exist.');
	}
}
