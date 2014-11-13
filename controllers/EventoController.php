<?php

namespace app\controllers;

use Yii;
use app\models\Evento;
use app\models\EventoSearch;
//use app\models\Ciudad;
use app\models\Candidato;
use app\models\puesto;
//use app\models\Deporte;
use app\models\Usuario;
//use app\models\Tipo_Evento;
use app\models\Puesto_Evento;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * EventoController implements the CRUD actions for Evento model.
 */
class EventoController extends Controller
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
     * Lists all Evento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id=1;
        $searchModel = new EventoSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        $usuario= Usuario::findOne($id);
        

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'usuario'=>$usuario,
        ]);
    }

    /**
     * Displays a single Evento model.
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
     * Creates a new Evento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException('No esta logeado el usuario!');
        }
        
        $model = new Evento;
        $puesto= new Puesto_Evento;
        $usuario= Usuario::find();
        
        if ($model->load(Yii::$app->request->post())&&$puesto->load(Yii::$app->request->post())) {
            $model->id_usuario=Yii::$app->user->identity->id;
            $model->id_tipo='1';
            $model->save();
            $puesto->id_evento=$model->id_evento;
            
            
            $puesto->id_puesto='1';
            
            $puesto->save();
            return $this->redirect(['view', 'id' => $model->id_evento]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'puesto'=>$puesto,
                'usuario'=>$usuario,
            ]);
        }
    }
    
    
            /**
     * CREAR UNA ACCION PARA POSTULARSE A UN EVENTO
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionPostular($id)
        {        
        $evento= Evento::findOne($id) ;
        //$sql='select * from Puesto_Evento where id_evento=12 ';
        //$puesto= Puesto_Evento::findOne('11');
        $puesto = Puesto_Evento::find()->where('id_evento = '.$id)->one();
        //echo $id;echo$puesto->id_puesto;exit;
        if ($puesto !=NULL) {
            $candidato = new Candidato;
            $candidato->id_puestoEvento= $puesto->id_puestoEvento;
            $candidato->id_usr=Yii::$app->user->identity->id;
            $candidato->id_estado='3';
            $candidato->save();
            
            $creador =  Usuario::findOne($evento->id_usuario);
            //echo $creador->usr;
            $postulante = Usuario::findOne($candidato->id_usr);
            //echo $postulante->usr;exit;
            // MENSAJE AL CREADOR DEL EVENTO LUEGO DE QUE ALGUIEN SE POSTULA
            Yii::$app->mail->compose()
            ->setFrom('appNN.2014@gmail.com') //destinatario del correo
            ->setTo($creador->email) //para probar modificar por correo propio
            ->setSubject('MEFU: Datos del Postulante')
            // este el el body del correo, aplicar los cambio de HTML aca!! 
                   
            ->setHtmlBody('<h3>Los Datos del postulante de tu evento son: </h3>'.
                    'Usuario'.$postulante->usr.
                    '<br>Nombre: '.$postulante->nombre.
                    '<br>Apellido: '.$postulante->apellido.
                    '<br>Teléfono: '.$postulante->telefono.
                    '<br>E-Mail.: '.$postulante->email.
                    '<h4>Ahora queda que se comuniquen entre ustedes</h4>
                    <h3>Muchas Gracias por usar la aplicación</h3>')
            ->send();
            
            // MENSAJE AL POSTULANTE LUEGO DE QUE CONFIRMA SU POSTULACION
            Yii::$app->mail->compose()
            ->setFrom('appNN.2014@gmail.com') //destinatario del correo
            ->setTo($postulante->email) //para probar modificar por correo propio
            ->setSubject('MEFU: Datos del Creador del Evento')
            // este el el body del correo, aplicar los cambio de HTML aca!!
            ->setHtmlBody('<h3>Los Datos del creador del evento son: </h3>'.
                    'Usuario'.$creador->usr.
                    '<br>Nombre: '.$creador->nombre.
                    '<br>Apellido: '.$creador->apellido.
                    '<br>Teléfono: '.$creador->telefono.
                    '<br>E-Mail.: '.$creador->email.
                    '<h4>Ahora queda que se comuniquen entre ustedes</h4>
                    <h3>Muchas Gracias por usar la aplicación</h3>')
            ->send();
            
            
            
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('view', [
                'model'=>$evento,
                //model' => $candidato,
                //'puesto'=> $puesto,
            ]);
        }        
        
    }     
    

    /**
     * Updates an existing Evento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {        
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException('No esta logeado el usuario!');
        }        

        $model = $this->findModel($id);
        $puesto = Puesto_Evento::find()->where('id_evento = '.$id)->one();

        if($model->id_usuario!=Yii::$app->user->identity->id){
            throw new ForbiddenHttpException('El usuario no es el creador del evento');
        }
        

        if ($model->load(Yii::$app->request->post()) && $puesto->load(Yii::$app->request->post())) {
            $puesto->save();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_evento]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'puesto' => $puesto,
            ]);
        }
    }

    /**
     * Deletes an existing Evento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->isGuest){
            throw new ForbiddenHttpException('No esta logeado el usuario!');
        }
        
        $model = $this->findModel($id);
        //$puesto = Puesto_Evento::find()->where('id_evento = '.$id)->one();
        if($model->id_usuario!=Yii::$app->user->identity->id){
            throw new ForbiddenHttpException('El usuario no es el creador del evento');
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Evento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Evento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Evento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
