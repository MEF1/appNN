<?php

use yii\helpers\Html;
use app\models\Puesto_Evento;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
/**
 * @var yii\web\View $this
 * @var app\models\Evento $model
 */
?>


<div class="evento-view">
<?php
  
    $events = array();
    //Testing
    $Event = new \yii2fullcalendar\models\Event();
    $Event->id = 1;
    $Event->title = 'Testing';
    $Event->start = date('Y-m-d\TH:m:s\Z');
    $events[] = $Event;

    $Event = new \yii2fullcalendar\models\Event();
    $Event->id = 2;
    $Event->title = 'Testing';
    $Event->start = date('Y-m-d\TH:m:s\Z',strtotime('tomorrow 6am'));
    $events[] = $Event;

?>

    <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
          'events'=> $events,
      ));   
    
    ?>
</div>