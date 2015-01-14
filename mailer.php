<?php
/* Set e-mail recipient */
$myemail = "benny.moralez@gmail.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['inputName'], "Ваше имя");
$email = check_input($_POST['inputEmail'], "Ваш E-mail");
$subject = check_input($_POST['inputSubject'], "Тема письма");
$message = check_input($_POST['inputMessage'], "Сообщение");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("Неверный адрес почты");
}
/* Let's prepare the message for the e-mail */

$subject = "Сообщение с сайта";

$message = "

Сообщение с сайта vtumanov.tk:

Имя: $name
Email: $email
Тема: $subject

Сообщение:
$message

";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: http://address-of-confirmation-page.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<body>

<p>Please correct the following error:</p>
<strong><?php echo $myError; ?></strong>
<p>Hit the back button and try again</p>

</body>
</html>
<?php
exit();
}
?>