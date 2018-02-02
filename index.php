 <?php
  session_start();
require_once __DIR__ . '/Facebook/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '1736071000056030',
  'app_secret' => '771eaf7ff785fc69e28ff5b3c49f589a',
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
]);
$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/fbsdk/callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

