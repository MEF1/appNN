<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\mail\BaseMailer;
use yii\swiftmailer\Mailer;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller {

    public function behaviors() {
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
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UsuarioSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Usuario;
        //Crea una nueva instancia de la clase EdmDocumento
        $band = false;
        //Crea una bandera con valor falso

        if (isset($_POST['Usuario'])) { //Entra al if si hay alguna variable enviada por post con el nombre 'EdmDocumento'
            $model->load(Yii::$app->request->post());
            //A la instancia creada $model se le asigna todos los datos que vienen por post del formulario

            $file = UploadedFile::getInstance($model, 'foto');
            //UploadedFile es una clase que representa la informacion de un archivo subido
            //A $file le asignamos la informacion del archivo subido            
            //print_r($file);exit();
            if (is_object($file) && $file->name != '') { //Comprueba si la variable $file es un objeto                   
                $extenssion = substr($file->name, -4); //Selecciona los ultimos 4 caracteres para obtener la extension y la asigna a la variable
                $nombreCifrado = md5(microtime()); //Cifra en md5 la variable entregada por la funcion microtime y la asigna a la variable
                $nombreCifrado .= $extenssion; //Adiciona a la variable anterior la extension del archivo
                $file->name = $nombreCifrado; //md5($file->name).$extenssion;
                $path = Yii::$app->basePath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'imagenes';
                //Especificamos la ruta en donde se encuentran los archivos 
                //Yii:: Es una colección de funciones auxiliares útiles para Yii Framework
                //$app->basePath Nos da el directorio raiz de la aplicacion

                if (!is_dir($path)) //is_dir indica si el nombre de la ruta es un directorio, si es falso entra en el if 
                    mkdir($path); //Crea un directorio con la ruta dada si no existe

                    /* --------------------------------- */
                $url = $path . DIRECTORY_SEPARATOR . $file->name; //url definitiva al archivo (Donde guarda el archivo)                                                            
                $array = pathinfo($url); //Devuelve la informacion del URL como un array asociativo y la asigna a la variable



                $ext1 = $array['extension']; //Asigna la extension a una variable
                $ext = strtolower($ext1); //Pasa a minuscula la extension                     
                /* --------------------------------- */

                if (empty($ext) OR $ext != 'png' && $ext != 'jpg' && $ext != 'gif') {
                    //Si la extension esta vacia o es diferente de alguna de las extensiones escritas entra por el if
                    throw new \yii\web\HttpException(204, " Solo puede subir archivos con extension (.png, .jpg, .gif)");
                    //Muestra un error por subir un archivo con extension no  valida
                } else {
                    $file->saveAs($url); //Si entra por el else guarda el archivo en la ruta especificada
                    $band = true; //Cambia la bandera con el valor true
                }

                /* --------------------------------------- */
                $model->foto = $file->name; //Al modelo con el tag documento_archivo se le asigna el nombre del archivo                                        
            } else {
                $model->foto = 'avatar-profile.png';
                $band = true;
            }
        }
        if ($band && $model->save()) { //Si $band es true y pudo guardar los datos del modelo entra por el if
            
            Yii::$app->mail->compose()
            ->setFrom('martin.betelu6@gmail.com')
            ->setTo($model->email)
            ->setSubject('Datos de Perfil')
            ->setHtmlBody('<b>Usuario:</b>'.$model->usr.'<br><b>Clave:</b>'.$model->clave)
            ->send();
            return $this->redirect(['view', 'id' => $model->id_usr]);
        } //Redirecciona a la vista del documento creado
        else {
            return $this->render('create', [ //Si entra por el else vuelve a renderizar la vista create
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {

        $model = $this->findModel($id);
        if (!empty($_POST['Usuario'])) {

            $model->attributes = $_POST['Usuario'];

            /* ---- Para el archivo y su ruta  --- */
            $file = UploadedFile::getInstance($model, 'foto');
            if (is_object($file)) { //significa que recupero el archivo subido                      
                /* ----------------------------------- */

                $extenssion = substr($file->name, -4);
                $nombreCifrado = md5(microtime());
                $nombreCifrado .= $extenssion;
                $file->name = $nombreCifrado; //md5($file->name).$extenssion;
                $path = Yii::$app->basePath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'imagenes';
                if (!is_dir($path))
                    mkdir($path);

                $url = $path . DIRECTORY_SEPARATOR . $file->name; //url definitiva al archivo
                /* ----------------------------------- */
                $array = pathinfo($url);
                $ext = $array['extension'];
                $ext = strtolower($ext);

                if (empty($ext) OR $ext != 'txt' && $ext != 'pdf' && $ext != 'png' && $ext != 'jpg' && $ext != 'gif') {
                    throw new HttpException(204, " Solo puede subir archivos con extension (.txt, .pdf, .png, .jpg, .gif");
                } else {
                    $file->saveAs($url);
                    $guardoArchivo = true;
                }
                /* ----------------------------------- */
                if (!empty($guardoArchivo)) {
                    $model->foto = $file->name;
                    if ($model->save())
                        $this->redirect(array('view', 'id' => $model->id_usr));
                    else
                        throw new HttpException(102, "Pudo guardar el archivo pero no la referencia en la BBDD");
                } else
                    throw new HttpException(204, "Hubo un problema al cargar guardar el archivo");
            }
        }
        else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
