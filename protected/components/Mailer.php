<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mailer
 *
 */
class Mailer {

    const EMAIL = true;
    const HOST = "smtp.gmail.com";
    const PORT = "465";
    const SMTP_AUTH = true;
    const SMTP_SECURE = "tls/ssl";
    const USERNAME = "armand1live@gmail.com";
    const PASSWORD = "1992tkmpuravidaayb";
    const FROM = "armand1live@gmail.com";
    const FROM_NAME = "ArmandoMaldonado";

    /**
     * Función para enviar correos electrónicos usando php mailer
     * @param type $to
     * @param type $subject
     * @param type $body
     * @param type $from
     * @param type $fromName
     */
    public static function enviarEmail($to, $subject, $body, $from = self::FROM, $fromName = self::FROM_NAME) {
        if (self::EMAIL) {
            Yii::app()->mailer->Host = self::HOST;
            Yii::app()->mailer->IsSMTP();
            Yii::app()->mailer->Port = self::PORT;
            Yii::app()->mailer->SMTPAuth = self::SMTP_AUTH;
            Yii::app()->mailer->SMTPSecure = self::SMTP_SECURE;
            Yii::app()->mailer->Username = self::USERNAME;
            Yii::app()->mailer->Password = self::PASSWORD;
            Yii::app()->mailer->From = $from;
            Yii::app()->mailer->FromName = $fromName;
            Yii::app()->mailer->AddReplyTo($from);
            Yii::app()->mailer->IsHTML(true);
            if (is_array($to)) {
                foreach ($to as $t) {
                    Yii::app()->mailer->AddAddress($t);
                }
            } else {
                Yii::app()->mailer->AddAddress($to);
            }
            Yii::app()->mailer->Subject = $subject;
            Yii::app()->mailer->Body = $body;
            if (!Yii::app()->mailer->Send()) {
                throw new Exception('Error enviando el correo');
            } else {
                
            }
        }
    }

}

?>
