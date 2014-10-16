<?php
use yii\helpers\Html;
use yii\swiftmailer\Mailer;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Yii::$app->mailer->compose('contact/html')
     ->setFrom('martin.betelu@gmail.com')
     ->setTo($form->email)
     ->setSubject($form->subject)
     ->send();