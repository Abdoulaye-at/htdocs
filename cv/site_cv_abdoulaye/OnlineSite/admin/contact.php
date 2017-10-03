<?php
  // Vérifications
  if(empty($_POST['name'])  	||
     empty($_POST['email']) 	||
     empty($_POST['message'])	||
     !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    	echo "Adresse mail non-valide !";
    	return false;
    } else {
      echo "Votre message a bien été envoyé !<br>";
      echo "Retourner sur le site: <a href='http://abdoulayethiaw.ma6tvacoder.org/'> Site CV  </a>";
    }
  $name = strip_tags(htmlspecialchars($_POST['name']));
  $email_address = strip_tags(htmlspecialchars($_POST['email']));
  $message = strip_tags(htmlspecialchars($_POST['message']));

  // Adresse mail de réception et contenu du message
  $to = 'abdoulaye.at@gmail.com'; // Adresse mail de réception
  $email_subject = "SiteCV_FormulaireDeContact:  $name";
  $email_body = "Vous avez reçu un message provenant de votre Site CV \n\n"."Voici les details :\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
  $headers = "From: abdoulaye.at@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
  $headers .= "Reply-To: $email_address";
  mail($to,$email_subject,$email_body,$headers);
  return true;
?>
