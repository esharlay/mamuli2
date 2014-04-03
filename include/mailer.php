<?
error_reporting(0);
function show_form()
{
?>
<form action="" method=post class="mailer">
	<ul>
	<li>
		<label for="">Ваше имя<span class="req">*</span></label>
		<input type="text" name="input_name[0]" size="39" value="<?=substr(htmlspecialchars(trim($_POST['input_name'][0])), 0, 500);?>">
		<input type="hidden" name="check[]" value="1">
	</li>
	<li>
		<label for="">E-mail<span class="req">*</span></label>
		<input type="text" name="input_name[1]" size="39" value="<?=substr(htmlspecialchars(trim($_POST['input_name'][1])), 0, 500);?>">
		<input type="hidden" name="check[]" value="1">
	</li>
	<li>
		<label for="">Телефон</label>
		<input type="text" name="input_name[2]" size="39" value="<?=substr(htmlspecialchars(trim($_POST['input_name'][2])), 0, 500);?>">
		<input type="hidden" name="check[]" value="2">
	</li>
	<li>
		<label for="">Сообщение</label>
		<textarea rows="10" cols="30" name="input_name[3]"><?=substr(htmlspecialchars(trim($_POST['input_name'][3])), 0, 10000);?></textarea>
		<input type="hidden" name="check[]" value="2">
	</li>
	</ul>
	<input type="submit" value="Отправить" name="submit">
</form>
<span class="req">*</span> Помечены поля, которые необходимо заполнить
<?
}
function complete_mail() {


        $empty_input[] = 'Ваше имя';
        $empty_input[] = 'E-mail';
        $empty_input[] = 'Телефон';
        $empty_input[] = 'Сообщение';
        for ($i=0; $i<count($_POST['input_name']); $i++) {
              $_POST['input_name'][$i] = substr(htmlspecialchars(trim($_POST['input_name'][$i])), 0, 100000);
              if(substr(htmlspecialchars(trim($_POST['check'][$i])), 0, 1) == 1) {
                 if(empty($_POST['input_name'][$i])) {
                         $sendemail = 'No';
                         echo '<br /><b>Необходимо заполнить поле '.$empty_input[$i].'!</b>';

                 }
              }
        }
        if($sendemail == 'No') show_form();
        $mess = '';
$mess .= '<b>Имя: </b>'.$_POST['input_name'][0].'<br />';
$mess .= '<b>E-mail: </b>'.$_POST['input_name'][1].'<br />';
$mess .= '<b>Телефон: </b>'.$_POST['input_name'][2].'<br />';
$mess .= '<b>Сообщение: </b>'.$_POST['input_name'][3].'<br />';
// подключаем файл класса для отправки почты
// если Вы забыли его скачать - http://www.php-mail.ru/class.phpmailer.zip
        require($_SERVER['DOCUMENT_ROOT'].'/include/class.phpmailer.php');

        $mail = new PHPMailer();
        $mail->From = 'Сайт. Кафе у мамули';      // от кого email
        $mail->FromName = 'info@cafeumamuli.ru';   // от кого имя
        $mail->AddAddress('e.sharlay@pixelstar.ru', 'admin'); // кому - адрес, Имя
        $mail->IsHTML(true);        // выставляем формат письма HTML
        $mail->Subject = 'Сообщение с сайта';  // тема письма
        $mail->Body = $mess;

        

        if($sendemail != 'No'){
              // отправляем наше письмо
              if (!$mail->Send()) die ('Mailer Error: '.$mail->ErrorInfo);
              echo 'Спасибо! Ваше письмо отправлено.';
        }
}
if (!empty($_POST['submit'])) complete_mail();
else show_form();
?>