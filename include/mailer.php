<?
error_reporting(0);
function show_form()
{
?>
<form action="" method=post class="mailer">
	<ul>
	<li>
		<label for="">���� ���<span class="req">*</span></label>
		<input type="text" name="input_name[0]" size="39" value="<?=substr(htmlspecialchars(trim($_POST['input_name'][0])), 0, 500);?>">
		<input type="hidden" name="check[]" value="1">
	</li>
	<li>
		<label for="">E-mail<span class="req">*</span></label>
		<input type="text" name="input_name[1]" size="39" value="<?=substr(htmlspecialchars(trim($_POST['input_name'][1])), 0, 500);?>">
		<input type="hidden" name="check[]" value="1">
	</li>
	<li>
		<label for="">�������</label>
		<input type="text" name="input_name[2]" size="39" value="<?=substr(htmlspecialchars(trim($_POST['input_name'][2])), 0, 500);?>">
		<input type="hidden" name="check[]" value="2">
	</li>
	<li>
		<label for="">���������</label>
		<textarea rows="10" cols="30" name="input_name[3]"><?=substr(htmlspecialchars(trim($_POST['input_name'][3])), 0, 10000);?></textarea>
		<input type="hidden" name="check[]" value="2">
	</li>
	</ul>
	<input type="submit" value="���������" name="submit">
</form>
<span class="req">*</span> �������� ����, ������� ���������� ���������
<?
}
function complete_mail() {


        $empty_input[] = '���� ���';
        $empty_input[] = 'E-mail';
        $empty_input[] = '�������';
        $empty_input[] = '���������';
        for ($i=0; $i<count($_POST['input_name']); $i++) {
              $_POST['input_name'][$i] = substr(htmlspecialchars(trim($_POST['input_name'][$i])), 0, 100000);
              if(substr(htmlspecialchars(trim($_POST['check'][$i])), 0, 1) == 1) {
                 if(empty($_POST['input_name'][$i])) {
                         $sendemail = 'No';
                         echo '<br /><b>���������� ��������� ���� '.$empty_input[$i].'!</b>';

                 }
              }
        }
        if($sendemail == 'No') show_form();
        $mess = '';
$mess .= '<b>���: </b>'.$_POST['input_name'][0].'<br />';
$mess .= '<b>E-mail: </b>'.$_POST['input_name'][1].'<br />';
$mess .= '<b>�������: </b>'.$_POST['input_name'][2].'<br />';
$mess .= '<b>���������: </b>'.$_POST['input_name'][3].'<br />';
// ���������� ���� ������ ��� �������� �����
// ���� �� ������ ��� ������� - http://www.php-mail.ru/class.phpmailer.zip
        require($_SERVER['DOCUMENT_ROOT'].'/include/class.phpmailer.php');

        $mail = new PHPMailer();
        $mail->From = '����. ���� � ������';      // �� ���� email
        $mail->FromName = 'info@cafeumamuli.ru';   // �� ���� ���
        $mail->AddAddress('e.sharlay@pixelstar.ru', 'admin'); // ���� - �����, ���
        $mail->IsHTML(true);        // ���������� ������ ������ HTML
        $mail->Subject = '��������� � �����';  // ���� ������
        $mail->Body = $mess;

        

        if($sendemail != 'No'){
              // ���������� ���� ������
              if (!$mail->Send()) die ('Mailer Error: '.$mail->ErrorInfo);
              echo '�������! ���� ������ ����������.';
        }
}
if (!empty($_POST['submit'])) complete_mail();
else show_form();
?>