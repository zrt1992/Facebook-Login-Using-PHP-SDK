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
try {
  // Returns a `Facebook\FacebookResponse` object
  $accessToken = $helper->getAccessToken();
  $response = $fb->get('/me?fields=id,name', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

echo 'Name: ' . $user['name'];