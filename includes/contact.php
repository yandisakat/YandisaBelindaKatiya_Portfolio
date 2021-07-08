<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
   
    require 'C:\wamp64\www\dev_center\portfolio_site\vendor\phpmailer\phpmailer\src\Exception.php';
    require 'C:\wamp64\www\dev_center\portfolio_site\vendor\phpmailer\phpmailer\src\PHPMailer.php';
    require 'C:\wamp64\www\dev_center\portfolio_site\vendor\phpmailer\phpmailer\src\SMTP.php';

    $developmentMode = true;
    $mailer = new PHPMailer($developmentMode);
    $result = '';

    try {
        //Server settings
        $mailer->SMTPDebug = 0;
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'missykatiya@gmail.com';
        $mailer->Password = 'Madamek1994$';
        $mailer->SMTPSecure = 'ssl';
        $mailer->Port = 465;

        //Recipients
        $mailer->setFrom($_POST['sender_email']);
        $mailer->addAddress('missykatiya@gmail.com');
        $mailer->addReplyTo($_POST['sender_email'],$_POST['sender_name']);
        $mailer->isHTML();
        if ($developmentMode){
            $mailer->SMTPOptions = [
                'ssl'=> [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
                ];
        }
       
        $mailer->isHTML(true);
        $mailer->Subject = 'From Website Submission: ' . $_POST['email_subj'];
        $mailer->Body = '<h3>Name: '. $_POST['sender_name'].'<br> Email: ' . $_POST['email_subj'] 
        .'<br>Message: '. $_POST['email_body']. '</h3>';

        $mailer->send();
        $mailer->ClearAllRecipients();
        header('Location: yayadevcenter/portfolio_site/#');
        $result = "Thanks \t" . $_POST['sender_name'] . "for reaching out. I'll get back to you soon!";

    } catch (Exception $err) {
        $result = "Sorry, \t" . $_POST['sender_name'] . "your message could not be delivered. ";
        //$mailer->ErrorInfo;
    }
    
?>
