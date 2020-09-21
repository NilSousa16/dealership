<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

   // Check for empty fields
   if(empty($_POST['nameSale'])  | empty($_POST['phoneSale']) | empty($_POST['brandCarsale']) | empty($_POST['modelSale']) | empty($_POST['color']) | empty($_POST['board']) | empty($_POST['year']) | empty($_POST['km'])  || empty($_POST['messageSale']) ||!filter_var($_POST['emailSale'],FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
 }

  // Dados do formulário
  $nameSale	= $_POST["nameSale"];	
  $phoneSale = $_POST["phoneSale"];	
  $emailSale = $_POST["emailSale"];

  $brandCarsale = $_POST["brandCarsale"];
  $modelSale = $_POST["modelSale"];
  $color = $_POST["color"];
  $board = $_POST["board"];
  $year = $_POST["year"];
  $km = $_POST["km"];  

  $messageSale = $_POST["messageSale"];	

  $subject = "Venda de Carro";
 
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
  $content = "<p>Você recebeu uma nova mensagem de um cliente querendo vender seu carro</p>
            
            <p><strong>Dados do cliente</strong></p>
                      
            <strong>Cliente:</strong> $nameSale <br/>
            <strong>E-mail:</strong> $emailSale <br/>
            <strong>Telefone:</strong> $phoneSale <br/>            

            <p><strong>Dados do veículo</strong></p>
                     
            <strong>Marca:</strong> $brandCarsale <br/>
            <strong>Modelo:</strong> $modelSale <br/>
            <strong>Cor:</strong> $color <br/> 
            <strong>Placa:</strong> $board <br/> 
            <strong>Ano:</strong> $year <br/> 
            <strong>KM:</strong> $km <br/> 
            <br/>

            <strong>Messagem</strong>    
            <br>

            $messageSale

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