<?php

require_once 'lib/validation.php';
require_once 'lib/register-validation.php';

$allowed_params = [
  "email",
  "password",
  "first-name",
  "last-name",
  "address",
  "county",
  "eircode",
  "age",
  "height",
  "languages",
  "newsletter"
];

$post_params = get_post_params($allowed_params);
$errors = [];

validate_email($post_params['email']);
validate_password($post_params['password']);
validate_first_name($post_params['first-name']);
validate_last_name($post_params['last-name']);
validate_address($post_params['address']);
validate_county($post_params['county']);
validate_eircode($post_params['eircode']);
validate_age($post_params['age']);
validate_height($post_params['height']);
validate_languages($post_params['languages']);
validate_newsletter($post_params['newsletter']);

echo '<pre>'; print_r($post_params); echo '</pre>';
echo '<pre>'; print_r($errors); echo '</pre>';

?>
