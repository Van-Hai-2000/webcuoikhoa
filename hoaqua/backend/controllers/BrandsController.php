<?php

namespace backend\controllers;

use Yii;
use backend\models\Brands;
use backend\models\BrandsSE;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * BrandsController implements the CRUD actions for Brands model.
 */
class BrandsController extends Controller
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
     * Lists all Brands models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BrandsSE();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Brands model.
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
     * Creates a new Brands model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Brands();

        if ($model->load(Yii::$app->request->post())) {
            $model->file=UploadedFile::getInstance($model,'file');
            if($model->file){//Tương đương if(isset($File['file]))
                //  var_dump($model->file);die; //Hàm check mảng
                $model->file->saveAs('../../uploads/'.$model->file->name );
                $model->brand_image=$model->file->name; 
            }
            $model->create_up=time();
            $model->update_up=time();
            if($model->save(false))
            {
                Yii::$app->session->addFlash('success','Thêm mới danh mục thành công!');

                return $this->redirect(['view', 'id' => $model->id]);
            }
            else {
                Yii::$app->session->addFlash('danger','Thêm mới danh mục không thành công!');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            
        }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        
    }

    /**
     * Updates an existing Brands model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->file=UploadedFile::getInstance($model,'file');
            if($model->file){
                //Tương đương if(isset($File['file]))
                //  var_dump($model->file);die; //Hàm check mảng
                $model->file->saveAs('../../uploads/'.$model->file->name );
                $model->brand_image=$model->file->name; 
            }
            $model->update_up=time();
            if($model->save(false))
            {
                
                return $this->redirect(['index', 'id' => $model->id]);
            }
            else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        else{
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        
    }

    /**
     * Deletes an existing Brands model.
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
     * Finds the Brands model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brands the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brands::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
