<?php

namespace backend\controllers;

use Yii;
use backend\models\products;
use backend\models\productsSE;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\validators\Validator;
use yii\web\UploadedFile;
/**
 * ProductsController implements the CRUD actions for products model.
 */
class ProductsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new productsSE();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new products();
        $str='SP'.rand(1,4);
        $code='K'.rand(0,99).rand(0,12);
        if ($model->load(Yii::$app->request->post())) {
            $model->product_keywords=$str.$code;
            $model->file=UploadedFile::getInstance($model,'file');
            if($model->file){
                //Tương đương if(isset($File['file]))
                //var_dump($model->file);die; //Hàm check mảng
                $model->file->saveAs('../../uploads/'.$model->file->name);
                $model->product_img=$model->file->name; 
            }
            $model->create_up=time();
            $model->update_up=time();
            if($model->save(false))
            {
                Yii::$app->session->addFlash('success','Thêm mới sản phẩm thành công!');

                return $this->redirect(['index', 'id' => $model->id]);
            }
            else {
                Yii::$app->session->addFlash('danger','Thêm mới sản phẩm không thành công!');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->file=UploadedFile::getInstance($model,'file');
            if($model->file){//Tương đương if(isset($File['file]))
                //  var_dump($model->file);die; //Hàm check mảng
                $model->file->saveAs('../../uploads/'.$model->file->name );
                $model->product_img=$model->file->name; 
            }
            $model->create_up=time();
            $model->update_up=time();
            if($model->save(false))
            {
                Yii::$app->session->addFlash('success','Thêm mới sản phẩm thành công!');

                return $this->redirect(['index', 'id' => $model->id]);
            }
            else {
                Yii::$app->session->addFlash('danger','Thêm mới sản phẩm không thành công!');
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
