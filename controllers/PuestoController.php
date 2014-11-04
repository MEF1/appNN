<?php

namespace app\controllers;

use Yii;
use app\models\puesto;
use app\models\PuestoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * PuestoController implements the CRUD actions for puesto model.
 */
class PuestoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all puesto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PuestoSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single puesto model.
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
     * Creates a new puesto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new puesto;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_puesto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing puesto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_puesto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing puesto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    
    //  CONTROLLER DROPDOWN DEPENDIENDTE  
    public function actionJson() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
        $id_deporte = $parents[0];
        $out=  self::getSubListPuesto($id_deporte);
        //$out = self::getSubCatList($id_deporte);
        // the getSubCatList function will query the database based on the
        // cat_id and return an array like below:
        // [
        // ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
        // ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
        // ]
        
        
        echo Json::encode(['output'=>$out, 'selected'=>'']);
        return;
        }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    
    private function getSubListPuesto($id_deporte){
        //$salida=[];
        //$model= new puesto();
        $sql='select id_puesto,descripcion from Puesto where id_deporte='.$id_deporte;
        $salida = puesto::findBySql($sql)->all();
        //$salida=$model::find('id_deporte=>'.$id_deporte)->all();  
        $array=[];
        foreach ($salida as $key => $puestos) {
            /*@var $puesto puesto */
            $array[]=['id'=>$puestos->id_puesto,'name'=>$puestos->descripcion];
        }
        return $array;   
        
    }

    




    /**
     * Finds the puesto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return puesto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = puesto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
