<?php

if(isset($_POST['email'])) {

    $email_to = "jabu@jnec.co.za";

    $email_subject = "Website Message";





    function died($error) {

        echo "Sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }

    if(!isset($_POST['name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['message']) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }



    $name = $_POST['name']; // required

    $email_from = $_POST['email']; // required

    $message = $_POST['message']; // not required



    $error_message = "";

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Name: ".clean_string($name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Message: ".clean_string($message)."\n";





// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>



<!-- include your own success html here -->



Thank you for contacting us. We will be in touch with you very soon.



<?php

}

?>
