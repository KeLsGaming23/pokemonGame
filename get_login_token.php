<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Get the username and password from the query parameters
  $username = $_GET['username'];
  $password = $_GET['password'];

  // Send a POST request to the Pokémon Showdown server to get the login token
  $url = 'https://play.pokemonshowdown.com/action.php';
  $data = 'act=getassertion&userid=' . urlencode($username) . '&challstr=' . urlencode($password);
  $options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => $data,
    ),
  );
  $context  = stream_context_create($options);
  $response = file_get_contents($url, false, $context);

  // Return the login token as the response
  echo $response;
}
?>
