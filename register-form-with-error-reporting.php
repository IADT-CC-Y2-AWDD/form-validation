<?php
require_once 'config.php';

function get_value($key) {
  global $post_params;
  if (isset($post_params) && is_array($post_params) && array_key_exists($key, $post_params)) {
    echo $post_params[$key];
  }
}
function get_error($key) {
  global $errors;
  if (isset($errors) && is_array($errors) && array_key_exists($key, $errors)) {
    return $errors[$key];
  }
  else {
    return "";
  }
}
function chosen($key, $search) {
  global $post_params;
  $chosen = FALSE;
  if (isset($post_params) && is_array($post_params) && array_key_exists($key, $post_params)) {
    $value = $post_params[$key];
    if (is_array($value)) {
      $chosen = in_array($search, $value);
    }
    else if (is_string($value)) {
      $chosen = (strcmp($search, $value) === 0);
    }
  }
  return $chosen;
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method === "GET") {
  // retrieving the form so it can be completed and submitted
}
else if ($method === "POST") {
  // the form was submitted but there are errors
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form validation example</title>

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
    <link href="<?= APP_URL ?>/assets/css/register-form.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php require 'include/header.php'; ?>
      <?php require 'include/navbar.php'; ?>
      <main role="main">
        <h1>Registration Form</h1>
        <form name='registration' action="register-with-error-reporting.php" method="post">

          <div class="form-field">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?= get_value('email') ?>" />
            <span class="error"><?= get_error('email') ?></span>
          </div>

          <div class="form-field">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" />
            <span class="error"><?= get_error('email') ?></span>
          </div>

          <div class="form-field">
            <label for="first-name">First name:</label>
            <input type="text" name="first-name" id="first-name" value="<?= get_value('first-name') ?>" />
            <span class="error"><?= get_error('first-name') ?></span>
          </div>

          <div class="form-field">
            <label for="last-name">Last name:</label>
            <input type="text" name="last-name" id="last-name" value="<?= get_value('last-name') ?>" />
            <span class="error"><?= get_error('last-name') ?></span>
          </div>

          <div class="form-field">
            <label for="address">Address:</label>
            <textarea name="address" id="address" rows="5"><?= get_value('address') ?></textarea>
            <span class="error"><?= get_error('address') ?></span>
          </div>

          <div class="form-field">
            <label for="county">County:</label>
            <select name="county" id="county">
              <option value="carlow"    <?= (chosen("county", "carlow")    ? "selected" : "") ?>>Carlow</option>
              <option value="cavan"     <?= (chosen("county", "cavan")     ? "selected" : "") ?>>Cavan</option>
              <option value="clare"     <?= (chosen("county", "clare")     ? "selected" : "") ?>>Clare</option>
              <option value="cork"      <?= (chosen("county", "cork")      ? "selected" : "") ?>>Cork</option>
              <option value="donegal"   <?= (chosen("county", "donegal")   ? "selected" : "") ?>>Donegal</option>
              <option value="dublin"    <?= (chosen("county", "dublin")    ? "selected" : "") ?>>Dublin</option>
              <option value="galway"    <?= (chosen("county", "galway")    ? "selected" : "") ?>>Galway</option>
              <option value="kerry"     <?= (chosen("county", "kerry")     ? "selected" : "") ?>>Kerry</option>
              <option value="kildare"   <?= (chosen("county", "kildare")   ? "selected" : "") ?>>Kildare</option>
              <option value="kilkenny"  <?= (chosen("county", "kilkenny")  ? "selected" : "") ?>>Kilkenny</option>
              <option value="laois"     <?= (chosen("county", "laois")     ? "selected" : "") ?>>Laois</option>
              <option value="leitrim"   <?= (chosen("county", "leitrim")   ? "selected" : "") ?>>Leitrim</option>
              <option value="limerick"  <?= (chosen("county", "limerick")  ? "selected" : "") ?>>Limerick</option>
              <option value="longford"  <?= (chosen("county", "longford")  ? "selected" : "") ?>>Longford</option>
              <option value="louth"     <?= (chosen("county", "louth")     ? "selected" : "") ?>>Louth</option>
              <option value="mayo"      <?= (chosen("county", "mayo")      ? "selected" : "") ?>>Mayo</option>
              <option value="meath"     <?= (chosen("county", "meath")     ? "selected" : "") ?>>Meath</option>
              <option value="monaghan"  <?= (chosen("county", "monaghan")  ? "selected" : "") ?>>Monaghan</option>
              <option value="offaly"    <?= (chosen("county", "offaly")    ? "selected" : "") ?>>Offaly</option>
              <option value="roscommon" <?= (chosen("county", "roscommon") ? "selected" : "") ?>>Roscommon</option>
              <option value="sligo"     <?= (chosen("county", "sligo")     ? "selected" : "") ?>>Sligo</option>
              <option value="tipperary" <?= (chosen("county", "tipperary") ? "selected" : "") ?>>Tipperary</option>
              <option value="waterford" <?= (chosen("county", "waterford") ? "selected" : "") ?>>Waterford</option>
              <option value="westmeath" <?= (chosen("county", "westmeath") ? "selected" : "") ?>>Westmeath</option>
              <option value="wexford"   <?= (chosen("county", "wexford")   ? "selected" : "") ?>>Wexford</option>
              <option value="wicklow"   <?= (chosen("county", "wicklow")   ? "selected" : "") ?>>Wicklow</option>
            </select>
            <span class="error"><?= get_error('county') ?></span>
          </div>

          <div class="form-field">
            <label for="eircode">Eircode Code:</label>
            <input type="text" name="eircode" id="eircode" value="<?= get_value('last-name') ?>" />
            <span class="error"><?= get_error('eircode') ?></span>
          </div>

          <div class="form-field">
            <label for="age">Age:</label>
            <input type="text" name="age" id="age" value="<?= get_value('last-name') ?>" />
            <span class="error"><?= get_error('age') ?></span>
          </div>

          <div class="form-field">
            <label for="height">Height (m):</label>
            <input type="text" name="height" id="height" value="<?= get_value('last-name') ?>" />
            <span class="error"><?= get_error('height') ?></span>
          </div>

          <div class="form-field">
            <label>Languages:</label>
            <div class="checkboxes">
              <div>
                <input type="checkbox" name="languages[]" id="irish" value="ga" <?= (chosen("languages", "ga") ? "checked" : "") ?> />
                <label for="irish">Irish</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="english" value="en" <?= (chosen("languages", "en") ? "checked" : "") ?> />
                <label for="english">English</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="french" value="fr" <?= (chosen("languages", "fr") ? "checked" : "") ?> />
                <label for="french">French</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="german" value="de" <?= (chosen("languages", "de") ? "checked" : "") ?> />
                <label for="german">German</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="dutch" value="nl" <?= (chosen("languages", "nl") ? "checked" : "") ?> />
                <label for="dutch">Dutch</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="spanish" value="es" <?= (chosen("languages", "es") ? "checked" : "") ?> />
                <label for="spanish">Spanish</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="italian" value="it" <?= (chosen("languages", "it") ? "checked" : "") ?> />
                <label for="italian">Italian</label>
              </div>
            </div>
          </div>

          <div class="form-field">
            <label>Newsletter:</label>
            <div class="radiobuttons">
              <div>
                <input type="radio" name="newsletter" id="yes" value="yes" <?= (chosen("newsletter", "yes") ? "checked" : "") ?> />
                <label for="yes">Yes</label>
              </div>
              <div>
                <input type="radio" name="newsletter" id="no" value="no" <?= (chosen("newsletter", "no")  ? "checked" : "") ?> />
                <label for="no">No</label>
              </div>
            </div>
          </div>

          <div class="form-field">
            <label></label>
            <input type="submit" name="submit" value="Submit" />
          </div>

        </form>
      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
