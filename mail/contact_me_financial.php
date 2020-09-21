<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

   // Check for empty fields
   if(empty($_POST['nameFinancial'])  | empty($_POST['cpfFinancial']) | empty($_POST['phoneFinancial']) | empty($_POST['brandCarFinancial']) | empty($_POST['modelCarFinancial']) | empty($_POST['entranceFinancial']) | empty($_POST['portionFinancial']) || empty($_POST['messageFinancial']) ||!filter_var($_POST['emailFinancial'],FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
  }

  // Dados do formulário
  $nameFinancial = $_POST["nameFinancial"];
  $emailFinancial = $_POST["emailFinancial"];
  $cpfFinancial = $_POST["cpfFinancial"];
  $phoneFinancial = $_POST["phoneFinancial"];

  $brandCarFinancial = $_POST["brandCarFinancial"];
  $modelCarFinancial = $_POST["modelCarFinancial"];

  $entranceFinancial = $_POST["entranceFinancial"];
  $portionFinancial = $_POST["portionFinancial"];

  $messageFinancial = $_POST["messageFinancial"]; 


  $subject = "Financiamento de Carro";
 
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
  $content = "<p>Você recebou uma nova mensagem de um cliente querendo falar sobre financiamento</p>
            
            <p><strong>Dados do cliente</strong></p>
                      
            <strong>Cliente:</strong> $nameFinancial <br/>
            <strong>E-mail:</strong> $emailFinancial <br/>
            <strong>Telefone:</strong> $cpfFinancial <br/>            

            <p><strong>Dados do veículo</strong></p>
                     
            <strong>Marca:</strong> $brandCarFinancial <br/>
            <strong>Modelo:</strong> $modelCarFinancial <br/>

            <p><strong>Dados do financiamento</strong></p>

            <strong>Entrada:</strong> $entranceFinancial <br/> 
            <strong>Parcelas:</strong> $portionFinancial <br/> 
            <br/>

            <strong>Messagem</strong>    
            <br>

            $messageFinancial

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