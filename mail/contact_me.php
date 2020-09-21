<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

   // Check for empty fields
   if(empty($_POST['name'])  | empty($_POST['email']) | empty($_POST['subject']) | empty($_POST['phone']) || empty($_POST['message']) ||!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
 }

  // Dados do formulário
  $name	= $_POST["name"];	
  $subject = $_POST["subject"];
  $phone = $_POST["phone"];	
  $email = $_POST["email"];	
  $message = $_POST["message"];	
 
  // Definir se o e-mail é em formato 
  $mail = new PHPMailer();  
  $mail->IsSMTP();
  $mail->Mailer = "smtp";

  $mail->SMTPDebug = 0;  // Você pode habilitar esta opção caso tenha problemas 
  $mail->SMTPAuth = TRUE; // Usar autenticação SMTP (obrigatório)
  $mail->CharSet = 'UTF-8'; 
  $mail->SMTPSecure = "tls"; // Configurações de compatibilidade para autenticação em TLS
  $mail->Port = 587;
  $mail->Host = "smtp.gmail.com";
  $mail->Username = "diamantecarsalvador@gmail.com";
  $mail->Password = "diamante150";

  $mail->IsHTML(true);  
  $mail->AddAddress("nil.sousa@ymail.com", "Concessionária Diamante Car"); //(<email-destinatário>, <nome-destinatário>)  
  $mail->SetFrom("diamantecarsalvador@gmail.com", "Contato de Cliente"); //(<email_smtp-remetente>, <nome-remetente>) 
  // $mail->AddReplyTo("reply-to-name", "reply-to-name"); //resposta
  // $mail->AddCC("cc-recipient-email", "cc-recipient-name"); //com cópia  
  $mail->Subject = $subject; // Assunto do Email  
  
  //Conteúdo do Email
  $content = "<p>Você recebou uma nova mensagem de um cliente pelo site</p>
            
            <p><strong>Dados do cliente</strong></p>

            <p>
            <strong>Assunto:</strong> $subject <br/>
            <strong>Cliente:</strong> $name <br/>
            <strong>E-mail:</strong> $email <br/>
            <strong>Telefone:</strong> $phone <br/>            
            <br/>
            <strong>Messagem</strong>    
            <p/>
            $message
            <br>
            <br>
          ";

  $mail->MsgHTML($content); 

  if(!$mail->Send()) {
    // echo "Error while sending Email.";
    // var_dump($mail);
    return false;
  } else {
    // header("Location: ../success.html");
    // die();
    return true;
  } 
?>