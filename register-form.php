<?php require_once './lib/config.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form validation example</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
    <link href="<?= APP_URL ?>/assets/css/register-form.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php require './include/header.php'; ?>
      <?php require './include/navbar.php'; ?>
      <main role="main">
        <h1>Registration Form</h1>
        <form name='registration' action="register.php" method="post">

          <div class="form-field">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" />
          </div>

          <div class="form-field">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" />
          </div>

          <div class="form-field">
            <label for="first-name">First name:</label>
            <input type="text" name="first-name" id="first-name" />
          </div>

          <div class="form-field">
            <label for="last-name">Last name:</label>
            <input type="text" name="last-name" id="last-name" />
          </div>

          <div class="form-field">
            <label for="address">Address:</label>
            <textarea name="address" id="address" rows="5"></textarea>
          </div>

          <div class="form-field">
            <label for="county">County:</label>
            <select name="county" id="county">
              <option value="carlow">Carlow</option>
              <option value="cavan">Cavan</option>
              <option value="clare">Clare</option>
              <option value="cork">Cork</option>
              <option value="donegal">Donegal</option>
              <option value="dublin">Dublin</option>
              <option value="galway">Galway</option>
              <option value="kerry">Kerry</option>
              <option value="kildare">Kildare</option>
              <option value="kilkenny">Kilkenny</option>
              <option value="laois">Laois</option>
              <option value="leitrim">Leitrim</option>
              <option value="limerick">Limerick</option>
              <option value="longford">Longford</option>
              <option value="louth">Louth</option>
              <option value="mayo">Mayo</option>
              <option value="meath">Meath</option>
              <option value="monaghan">Monaghan</option>
              <option value="offaly">Offaly</option>
              <option value="roscommon">Roscommon</option>
              <option value="sligo">Sligo</option>
              <option value="tipperary">Tipperary</option>
              <option value="waterford">Waterford</option>
              <option value="westmeath">Westmeath</option>
              <option value="wexford">Wexford</option>
              <option value="wicklow">Wicklow</option>
            </select>
          </div>

          <div class="form-field">
            <label for="eircode">Eircode Code:</label>
            <input type="text" name="eircode" id="eircode" />
          </div>

          <div class="form-field">
            <label for="age">Age:</label>
            <input type="text" name="age" id="age" />
          </div>

          <div class="form-field">
            <label for="height">Height (m):</label>
            <input type="text" name="height" id="height" />
          </div>

          <div class="form-field">
            <label>Languages:</label>
            <div class="checkboxes">
              <div>
                <input type="checkbox" name="languages[]" id="irish" value="ga" />
                <label for="irish">Irish</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="english" value="en" />
                <label for="english">English</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="french" value="fr" />
                <label for="french">French</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="german" value="de" />
                <label for="german">German</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="dutch" value="nl" />
                <label for="dutch">Dutch</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="spanish" value="es" />
                <label for="spanish">Spanish</label>
              </div>
              <div>
                <input type="checkbox" name="languages[]" id="italian" value="it" />
                <label for="italian">Italian</label>
              </div>
            </div>
          </div>

          <div class="form-field">
            <label>Newsletter:</label>
            <div class="radiobuttons">
              <div>
                <input type="radio" name="newsletter" id="yes" value="yes" />
                <label for="yes">Yes</label>
              </div>
              <div>
                <input type="radio" name="newsletter" id="no" value="no" />
                <label for="no">No</label>
              </div>
            </div>
          </div>

          <div class="form-field">
            <label></label>
            <input type="submit" name="submit" value="Submit" />
          </div>

        </form>
      </main><!-- /.container -->
      <?php require './include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
