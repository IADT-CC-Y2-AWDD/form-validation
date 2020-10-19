<?php
function validate_email($email) {
  global $errors;
  if (!is_present($email)) {
    $errors['email'] = "Email required";
  }
  else if (!is_safe_email($email)) {
    $errors['email'] = "Email contains unsafe characters";
  }
  else if (!is_valid_email($email)) {
    $errors['email'] = "Email format is not valid";
  }
  else if (!has_length($email, ["min" => 7, "max" => 64])) {
    $errors['email'] = "Email is too short or long";
  }
}

function validate_password($password) {
  global $errors;
  if (!is_present($password)) {
    $errors['password'] = "Password required";
  }
  else if (!has_length($email, ["min" => 8, "max" => 64])) {
    $errors['password'] = "Password is too short or long";
  }
}

function validate_first_name($first_name) {
  global $errors;
  if (!is_present($first_name)) {
    $errors['first-name'] = "First name required";
  }
  else if (!has_length($first_name, ["min" => 1, "max" => 32])) {
    $errors['first-name'] = "First name is too short or long";
  }
  else if (!has_no_html_tags($first_name)) {
    $errors['first-name'] = "First name cannot contain any HTML tags";
  }
}

function validate_last_name($last_name) {
  global $errors;
  if (!is_present($last_name)) {
    $errors['last-name'] = "Last name required";
  }
  else if (!has_length($last_name, ["min" => 1, "max" => 64])) {
    $errors['last-name'] = "Last name is too short or long";
  }
  else if (!has_no_html_tags($last_name)) {
    $errors['last-name'] = "Last name cannot contain any HTML tags";
  }
}

function validate_address($address) {
  global $errors;
  if (!is_present($address)) {
    $errors['address'] = "Address required";
  }
  else if (!has_length($address, ["min" => 1, "max" => 256])) {
    $errors['address'] = "Address is too short or long";
  }
  else if (!has_no_html_tags($address)) {
    $errors['address'] = "Address cannot contain any HTML tags";
  }
}

function validate_county($county) {
  global $errors;
  $allowed_counties = [
    "carlow", "cavan", "clare", "cork",
    "donegal", "dublin", "galway", "kerry",
    "kildare", "kilkenny", "laois", "leitrim",
    "limerick", "longford", "louth", "mayo",
    "meath", "monaghan", "offaly", "roscommon",
    "sligo", "tipperary", "waterford", "westmeath",
    "wexford", "wicklow"
  ];
  if (!is_present($county)) {
    $errors['county'] = "County required";
  }
  else if (!is_element($county, $allowed_counties)) {
    $errors['county'] = "County  not recognised";
  }
}

function validate_eircode($eircode) {
  global $errors;
  $eircode_regex = "/\A([ac-fhknprtv-yAC-FHKNPRTV-Y]\d{2}|D6W)\s*[0-9ac-fhknprtv-yAC-FHKNPRTV-Y]{4}\Z/";
  if (!is_present($eircode)) {
    $errors['eircode'] = "Eircode required";
  }
  else if (!is_match(trim($eircode), $eircode_regex)) {
    $errors['eircode'] = "Eircode format is not valid";
  }
}

function validate_age($age) {
  global $errors;
  if (!is_present($age)) {
    $errors['age'] = "Age required";
  }
  else if (!is_safe_integer($age)) {
    $errors['age'] = "Age contains invalid characters";
  }
  else if (!is_valid_integer($age, ["min_range"=>0, "max_range"=>120])) {
    $errors['age'] = "Age is not valid";
  }
}

function validate_height($height) {
  global $errors;
  if (!is_present($height)) {
    $errors['height'] = "Height required";
  }
  else if (!is_safe_float($height)) {
    $errors['height'] = "Height conatins invalid characters";
  }
  else if (!is_valid_float($height)) {
    $errors['height'] = "Height is not a valid number";
  }
  else if (!is_match($height, "/\A[0-9]{0,1}(\.[0-9]{0,2})?\Z/")) {
    $errors['height'] = "Height format is not valid";
  }
}

function validate_languages($languages) {
  global $errors;
  $allowed_languages = ["ga", "en", "fr", "de", "nl", "es", "it"];
  if (!is_present($languages)) {
    $errors['languages'] = "Languages required";
  }
  else if (!is_array($languages)) {
    $errors['languages'] = "Languages invalid";
  }
  else if (!is_subset($languages, $allowed_languages)) {
    $errors['languages'] = "Languages not recognised";
  }
}

function validate_newsletter($newsletter) {
  global $errors;
  if (!is_present($newsletter)) {
    $errors['newsletter'] = "Newsletter required";
  }
  else if (!is_valid_boolean($newsletter)) {
    $errors['newsletter'] = "Newsletter not valid";
  }
}
?>
