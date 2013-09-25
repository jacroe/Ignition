<?php
function ign_email_send($user, $email, $subject, $body, $attachment = NULL)
{
	require_once IGN_PATH.'lib/swift/swift_required.php';
	$transport = Swift_SmtpTransport::newInstance(SMTP_SERVER, SMTP_PORT, 'ssl')
	  ->setUsername(SMTP_USER)
	  ->setPassword(SMTP_PASS);
	$mailer = Swift_Mailer::newInstance($transport);
	$message = Swift_Message::newInstance('(no subject)')
	  ->setFrom(array(SMTP_FROM => "Ignition at ".IGN_TITLE))
	  ->setTo(array($email => $user))
	  ->setSubject($subject)
	  ->setBody($body.'<br /><br />
Love,<br />
'.IGN_TITLE, 'text/html');
	if ($attachment) $message->attach(Swift_Attachment::fromPath($attachment));
	$result = $mailer->send($message);
}
