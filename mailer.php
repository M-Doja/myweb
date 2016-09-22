 "https://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.sendgrid.com/v3/mail/send"
 <?php

require 'vendor/autoload.php';
Dotenv::load(__DIR__);
$sendgrid_apikey = getenv('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');
$sendgrid = new SendGrid($sendgrid_apikey);
$url = 'https://api.sendgrid.com/';
$pass = $sendgrid_apikey;
$template_id = 'home.html';
$js = array(
  'sub' => array(':name' => array('Elmer')),
  'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => $template_id)))
);

$params = array(
    'to'        => "dojadeveloper@gmail.com",
    'toname'    => "Example User",
    'from'      => "you@youremail.com",
    'fromname'  => "Your Name",
    'subject'   => "PHP Test",
    'text'      => "I'm text!",
    'html'      => "<strong>I'm HTML!</strong>",
    'x-smtpapi' => json_encode($js),
  );

$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

// print everything out
print_r($response);

?>
