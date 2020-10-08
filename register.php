<?php

function get_post_params($allowed_params=[]) {
	$allowed_array = [];
	foreach($allowed_params as $param) {
		if(isset($_POST[$param])) {
			$allowed_array[$param] = $_POST[$param];
		}
    else {
			$allowed_array[$param] = NULL;
		}
	}
	return $allowed_array;
}

function is_present($value) {
	if (is_array($value)) {
    return TRUE;
  }
  else {
    $trimmed_value = trim($value);
    return isset($trimmed_value) && $trimmed_value !== "";
  }
}

function has_length($value, $options=[]) {
	if(isset($options['max']) && (strlen($value) > (int)$options['max'])) {
		return false;
	}
	if(isset($options['min']) && (strlen($value) < (int)$options['min'])) {
		return false;
	}
	if(isset($options['exact']) && (strlen($value) != (int)$options['exact'])) {
		return false;
	}
	return true;
}

function has_no_html_tags($value) {
  return strcmp($value, strip_tags($value)) === 0;
}

function is_safe_email($email) {
  $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
  return strcmp($email, $sanitized_email) === 0;
}

function is_valid_email($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL) !== FALSE;
}

function is_safe_float($float) {
  $sanitized_float = filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  return strcmp($float, $sanitized_float) === 0;
}

function is_valid_float($float) {
  $options = array(
    'options' => [ "decimal" => "."],
    'flags' => FILTER_FLAG_ALLOW_FRACTION,
  );
  return filter_var($float, FILTER_VALIDATE_FLOAT, $options) !== FALSE;
}

function is_safe_integer($integer) {
  $sanitized_integer = filter_var($integer, FILTER_SANITIZE_NUMBER_INT);
  return strcmp($integer, $sanitized_integer) === 0;
}

function is_valid_integer($integer, $range = []) {
  $options = array("options" => $range);
  return filter_var($integer, FILTER_VALIDATE_INT, $options) !== FALSE;
}

function is_valid_boolean($boolean) {
  return filter_var($boolean, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== NULL;
}

function match($value, $regex='//') {
  return preg_match($regex, $value) === 1;
}

function has_inclusion_in($value, $set=[]) {
  return in_array($value, $set);
}

function list_has_inclusion_in($values, $set=[]) {
  if (!is_array($values)) {
    return FALSE;
  }
  else {
    return (count(array_diff($values, $set)) === 0);
  }
}

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

$email = $post_params['email'];
$password = $post_params['password'];
$first_name = $post_params['first-name'];
$last_name = $post_params['last-name'];
$address = $post_params['address'];
$county = $post_params['county'];
$eircode = $post_params['eircode'];
$age = $post_params['age'];
$height = $post_params['height'];
$languages = $post_params['languages'];
$newsletter = $post_params['newsletter'];

echo '<pre>'; print_r($post_params); echo '</pre>';

echo "<p>Email: " . htmlspecialchars($email) . " is present? " . (is_present($email) ? "Yes" : "No") . "</p>";
echo "<p>Email: " . htmlspecialchars($email) . " is safe email? " . (is_safe_email($email) ? "Yes" : "No") . "</p>";
echo "<p>Email: " . htmlspecialchars($email) . " is valid email? " . (is_valid_email($email) ? "Yes" : "No") . "</p>";
echo "<p>Email: " . htmlspecialchars($email) . " is valid length? " . (has_length($email, ["min" => 1, "max" => 64]) ? "Yes" : "No") . "</p>";

echo "<p>Password: " . htmlspecialchars($password) . " is present? " . (is_present($password) ? "Yes" : "No") . "</p>";
echo "<p>Password: " . htmlspecialchars($password) . " is valid length? " . (has_length($password, ["min" => 8, "max" => 64]) ? "Yes" : "No") . "</p>";

echo "<p>First name: " . htmlspecialchars($first_name) . " is present? " . (is_present($first_name) ? "Yes" : "No") . "</p>";
echo "<p>First name: " . htmlspecialchars($first_name) . " is valid length? " . (has_length($first_name, ["min" => 1, "max" => 32]) ? "Yes" : "No") . "</p>";
echo "<p>First name: " . htmlspecialchars($first_name) . " has no tags? " . (has_no_html_tags($first_name) ? "Yes" : "No") . "</p>";

echo "<p>Last name: " . htmlspecialchars($last_name) . " is present? " . (is_present($last_name) ? "Yes" : "No") . "</p>";
echo "<p>Last name: " . htmlspecialchars($last_name) . " is valid length? " . (has_length($last_name, ["min" => 1, "max" => 64]) ? "Yes" : "No") . "</p>";
echo "<p>Last name: " . htmlspecialchars($last_name) . " has no tags? " . (has_no_html_tags($last_name) ? "Yes" : "No") . "</p>";

echo "<p>Address: " . htmlspecialchars($address) . " is present? " . (is_present($address) ? "Yes" : "No") . "</p>";
echo "<p>Address: " . htmlspecialchars($address) . " is valid length? " . (has_length($address, ["min" => 1, "max" => 256]) ? "Yes" : "No") . "</p>";
echo "<p>Address: " . htmlspecialchars($address) . " has no tags? " . (has_no_html_tags($address) ? "Yes" : "No") . "</p>";

$allowed_counties = [
  "carlow", "cavan", "clare", "cork",
  "donegal", "dublin", "galway", "kerry",
  "kildare", "kilkenny", "laois", "leitrim",
  "limerick", "longford", "louth", "mayo",
  "meath", "monaghan", "offaly", "roscommon",
  "sligo", "tipperary", "waterford", "westmeath",
  "wexford", "wicklow"
];
echo "<p>County: " . htmlspecialchars($county) . " is present? " . (is_present($county) ? "Yes" : "No") . "</p>";
echo "<p>County: " . htmlspecialchars($county) . " is valid? " . (has_inclusion_in($county, $allowed_counties) ? "Yes" : "No") . "</p>";

$eircode_regex = "/\A([ac-fhknprtv-yAC-FHKNPRTV-Y]\d{2}|D6W)\s*[0-9ac-fhknprtv-yAC-FHKNPRTV-Y]{4}\Z/";
echo "<p>Eircode: " . htmlspecialchars($eircode) . " is present? " . (is_present($eircode) ? "Yes" : "No") . "</p>";
echo "<p>Eircode: " . htmlspecialchars($eircode) . " is valid Eircode format? " . (match(trim($eircode), $eircode_regex) ? "Yes" : "No") . "</p>";

echo "<p>Age: " . htmlspecialchars($age) . " is present? " . (is_present($age) ? "Yes" : "No") . "</p>";
echo "<p>Age: " . htmlspecialchars($age) . " is safe integer? " . (is_safe_integer($age) ? "Yes" : "No") . "</p>";
echo "<p>Age: " . htmlspecialchars($age) . " is valid integer? " . (is_valid_integer($age, ["min_range"=>0, "max_range"=>120]) ? "Yes" : "No") . "</p>";

echo "<p>Height: " . htmlspecialchars($height) . " is present? " . (is_present($height) ? "Yes" : "No") . "</p>";
echo "<p>Height: " . htmlspecialchars($height) . " is safe float? " . (is_safe_float($height) ? "Yes" : "No") . "</p>";
echo "<p>Height: " . htmlspecialchars($height) . " is valid float? " . (is_valid_float($height) ? "Yes" : "No") . "</p>";
echo "<p>Height: " . htmlspecialchars($height) . " is valid float format? " . (match($height, "/\A[0-9]{0,1}(\.[0-9]{0,2})?\Z/") ? "Yes" : "No") . "</p>";

$allowed_languages = ["ga", "en", "fr", "de", "nl", "es", "it"];
echo "<p>Languages: " . "languages is present? " . (is_present($languages) ? "Yes" : "No") . "</p>";
echo "<p>Languages: " . "languages is an array? " . (is_array($languages) ? "Yes" : "No") . "</p>";
echo "<p>Languages: " . "languages is valid? " . (list_has_inclusion_in($languages, $allowed_languages) ? "Yes" : "No") . "</p>";

echo "<p>Newsletter: " . htmlspecialchars($newsletter) . " is present? " . (is_present($newsletter) ? "Yes" : "No") . "</p>";
echo "<p>Newsletter: " . htmlspecialchars($newsletter) . " is valid boolean? " . (is_valid_boolean($newsletter) ? "Yes" : "No") . "</p>";
?>
