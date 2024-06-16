<?php
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$usermail = filter_input(INPUT_POST, 'usermail', FILTER_SANITIZE_EMAIL);
$usermessage = filter_input(INPUT_POST, 'usermessage', FILTER_SANITIZE_SPECIAL_CHARS);
// Get the current date and time
$currentDateTime = date('Y-m-d H:i:s');

//database connecction
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'R_corps_user_data';

$conn = mysqli_connect($host, $user, $password, $database);

$sql = "INSERT INTO messages_data(username, usermail, usermessage, sentdate) VALUES ('$username', '$usermail', '$usermessage', '$currentDateTime')";


require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               

$mail->isSMTP();                                     
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = 'Rcorpsinc@gmail.com';                 
$mail->Password = 'fjiturphflcguaso';                          
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;                                   

$mail->setFrom('Rcorpsinc@gmail.com', 'R-corps');
$mail->addAddress($usermail, 'User');     
$mail->isHTML(true);                                 

$mail->Subject = 'Successful Submission';
$mail->Body    = 'Hi ' . htmlspecialchars($username) . ',<br>Thank you for getting in touch with us. We have received your message and will get back to you shortly.';
$mail->AltBody = 'Hi ' . htmlspecialchars($username) . ',<br>Thank you for getting in touch with us. We have received your message and will get back to you shortly.';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    header("Location:../error.html");   
} else {
    header("Location:../confirmation.html");  
    mysqli_query($conn, $sql); 
    echo"real";
    
}

mysqli_close($conn);
?>