<?php
/*

Copyright (c) 2007 BeVolunteer

This file is part of BW Rox.

BW Rox is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

BW Rox is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, see <http://www.gnu.org/licenses/> or
write to the Free Software Foundation, Inc., 59 Temple Place - Suite 330,
Boston, MA  02111-1307, USA.

*/

/*
 * REGISTER FORM TEMPLATE
 */
?>
<div id="signuprox">
<p><?php echo $words->get('SignupCheckIntro'); ?></p>

<form method="post" action="signup/4" name="signup" id="user-register-form">
  <?=$callback_tag ?>
  <input type="hidden" name="javascriptactive" value="false" />

  <?php
        if (in_array('inserror', $vars['errors'])) {
            echo '<p class="error">'.$errors['inserror'].'</p>';
        }
        ?>

  <!-- Login Information -->
  <fieldset>
    <legend><?php echo $words->get('LoginInformation'); ?></legend>

    <!-- username -->
        <div class="signup-row">
          <label for="username"><?php echo $words->get('SignupUsername'); ?>* </label>
          <?=in_array('SignupErrorWrongUsername', $vars['errors']) ? '' : '<p class="float_left entered">'.$vars['username'].'</p>'; ?>
          <input <?=in_array('SignupErrorWrongUsername', $vars['errors']) ? '' : 'type="hidden"'?> id="register-username" name="username" style="float: left" <?php
            echo isset($vars['username']) ? 'value="'.htmlentities($vars['username'], ENT_COMPAT, 'utf-8').'" ' : '';
            ?> />
             <?php
          if (in_array('SignupErrorWrongUsername', $vars['errors'])) {
              echo '<div class="error">'.$words->get('SignupErrorWrongUsername').'</div>';
          }
          if (in_array('SignupErrorUsernameAlreadyTaken', $vars['errors'])) {
              echo '<div class="error"><br/>'.
                  $words->getFormatted('SignupErrorUsernameAlreadyTaken', $vars['username']).
                  '</div>';
          }
          ?>
          <!--
          <a href="#" onclick="return false;" >
          <img src="../images/icons/help.png" alt="?" height="16" width="16" />
          <span><?php echo $words->get('SignupUsernameDescription'); ?></span></a><br />
          <span class="small"><?php echo $words->get('SignupUsernameShortDesc'); ?></span>
          -->
        </div> <!-- signup-row -->

    <!-- password -->
        <div class="signup-row">
          <label for="password"><?php echo $words->get('SignupPassword'); ?>* </label>
          <input <?=in_array('SignupErrorPasswordCheck', $vars['errors']) ? '' : 'type="hidden"'; ?> id="register-password" name="password" style="float: left" <?php
          echo isset($vars['password']) ? 'value="'.$vars['password'].'" ' : '';
          ?> />
          <?php
          if (in_array('SignupErrorPasswordCheck', $vars['errors'])) {
              echo '<div class="error">'.$words->get('SignupErrorPasswordCheck').'</div>';
          ?>
            </div>
            <div class="signup-row">
              <label for="passwordcheck"><?php echo $words->get('SignupCheckPassword'); ?>* </label>
              <input type="hidden" id="register-passwordcheck" name="passwordcheck" style="float: left" <?php
                echo isset($vars['passwordcheck']) ? 'value="'.$vars['passwordcheck'].'" ' : '';
                ?> />
              <!--
              <span class="small"><?php echo $words->get('SignupPasswordConfirmShortDesc'); ?></span>
              -->
            </div>
          <?php
          } else {
              echo '<p class="float_left entered">********</p>';
          }
          ?>
          <!--
          <a href="#" onclick="return false;" >
          <img src="../images/icons/help.png" alt="?" height="16" width="16" />
          <span><?php echo $words->get('SignupPasswordDescription'); ?></span></a><br />
          <span class="small"><?php echo $words->get('SignupPasswordChoose'); ?></span>
          -->
       </div> <!-- signup-row -->


    <!-- email -->
        <div class="signup-row">
          <label for="email"><?php echo $words->get('SignupEmail'); ?>* </label>
          <input <?=in_array('SignupErrorInvalidEmail', $vars['errors']) ? '':'type="hidden"'?> id="register-email" name="email" style="float: left" <?php
          echo isset($vars['email']) ? 'value="'.htmlentities($vars['email'], ENT_COMPAT, 'utf-8').'" ' : '';
          ?> />
          <?php
          if (in_array('SignupErrorInvalidEmail', $vars['errors'])) {
              echo '<div class="error">'.$words->get('SignupErrorInvalidEmail').'</div>';
          } else {
            echo '<p class="float_left entered">'.$vars['email'].'</p>';
          }
          ?>
          <!--
          <a href="#" onclick="return false;" >
          <img src="../images/icons/help.png" alt="?" height="16" width="16" />
          <span><?php echo $words->get('SignupEmailDescription'); ?></span></a><br />
          <span class="small"><?php echo $words->get('SignupEmailShortDesc'); ?></span>
          -->
        </div> <!-- signup-row -->

<?php
if (in_array('SignupErrorEmailCheck', $vars['errors'])) {
?>   
    <!-- confirm email -->
        <div class="signup-row">
          <label for="emailcheck"><?php echo $words->get('SignupEmailCheck'); ?>* </label>
          <input <?=in_array('SignupErrorEmailCheck', $vars['errors']) ? '':'type="hidden"'?> id="emailcheck" name="emailcheck" <?php
            echo isset($vars['emailcheck']) ? 'value="'.htmlentities($vars['emailcheck'], ENT_COMPAT, 'utf-8').'" ' : '';
            ?> />
            <?php
          if (in_array('SignupErrorEmailCheck', $vars['errors'])) {
              echo '<div class="error">'.$words->get('SignupErrorEmailCheck').'</div>';
          }
          ?>
        </div> <!-- signup-row -->
<?php } else { ?>
          <input <?=in_array('SignupErrorEmailCheck', $vars['errors']) ? '':'type="hidden"'?> id="emailcheck" name="emailcheck" <?php
            echo isset($vars['emailcheck']) ? 'value="'.htmlentities($vars['emailcheck'], ENT_COMPAT, 'utf-8').'" ' : '';
            ?> />
<?php } ?>
  </fieldset>

  <!-- Personal Information -->
  <fieldset>
    <legend><?php echo $words->get('SignupName'); ?></legend>
<?php
if (in_array('SignupErrorFullNameRequired', $vars['errors'])) {
?>
    <!-- First Name -->
        <div class="signup-row">
          <label for="firstname"><?php echo $words->get('FirstName'); ?>* </label>
          <input type="hidden" id="firstname" name="firstname" <?php
          echo isset($vars['firstname']) ? 'value="'.htmlentities($vars['firstname'], ENT_COMPAT, 'utf-8').'" ' : '';
          ?> />
          <?php
            if (in_array('SignupErrorFullNameRequired', $vars['errors'])) {
                echo '<div class="error">'.$words->get('SignupErrorFullNameRequired').'</div>';
            }
            ?>
          <!--
          <a href="#" onclick="return false;" >
          <img src="../images/icons/help.png" alt="?" height="16" width="16" />
          <span><?php echo $words->get('SignupNameDescription'); ?></span></a><br />
          <span class="small"><?php echo $words->get('SignupFirstNameShortDesc'); ?></span>
          -->
        </div> <!-- signup-row -->

    <!-- Second Name -->
        <div class="signup-row">
          <label for="secondname"><?php echo $words->get('SignupSecondNameOptional'); ?></label>
          <input type="hidden" id="secondname" name="secondname" <?php
          echo isset($vars['secondname']) ? 'value="'.htmlentities($vars['secondname'], ENT_COMPAT, 'utf-8').'" ' : '';
          ?> />
          <!--
          <span class="small"><?php echo $words->get('SignupSecondNameShortDesc'); ?></span>
          -->
        </div> <!-- signup-row -->

    <!-- Last Name -->
        <div class="signup-row">
          <label for="lastname"><?php echo $words->get('LastName'); ?>* </label>
          <input type="hidden" id="lastname" name="lastname" <?php
          echo isset($vars['lastname']) ? 'value="'.htmlentities($vars['lastname'], ENT_COMPAT, 'utf-8').'" ' : '';
          ?>/>
          <!--
          <span class="small"><?php echo $words->get('SignupLastNameShortDesc'); ?></span>
          -->
        </div> <!-- signup-row -->
<?php } else { ?>
        <div class="signup-row">
          <label for="firstname"><?php echo $words->get('Name'); ?>* </label>
          <input type="hidden" id="firstname" name="firstname" <?php
          echo isset($vars['firstname']) ? 'value="'.htmlentities($vars['firstname'], ENT_COMPAT, 'utf-8').'" ' : '';
          ?> />
          <input type="hidden" id="secondname" name="secondname" <?php
          echo isset($vars['secondname']) ? 'value="'.htmlentities($vars['secondname'], ENT_COMPAT, 'utf-8').'" ' : '';
          ?> />
          <input type="hidden" id="lastname" name="lastname" <?php
          echo isset($vars['lastname']) ? 'value="'.htmlentities($vars['lastname'], ENT_COMPAT, 'utf-8').'" ' : '';
          ?>/>
          <p class="entered"><?=$vars['firstname'].' '.$vars['secondname'].' '.$vars['lastname'] ;?></p>
        </div> <!-- signup-row -->

<?php } ?>
    <!-- Birthdate -->
        <div class="signup-row">
          <label for="BirthDate"><?php echo $words->get('SignupBirthDate'); ?>*</label>
        <?php
        if (in_array('SignupErrorBirthDate', $vars['errors']) || in_array('SignupErrorBirthDateToLow', $vars['errors'])) {
        ?>
          <select id="BirthDate" name="birthyear">
            <option value=""><?php echo $words->get('SignupBirthYear'); ?></option>
            <?php echo $birthYearOptions; ?>
          </select>
          <select name="birthmonth">
            <option value=""><?php echo $words->get('SignupBirthMonth'); ?></option>
            <?php for ($i=1; $i<=12; $i++) { ?>
            <option value="<?php echo $i; ?>"<?php
            if (isset($vars['birthmonth']) && $vars['birthmonth'] == $i) {
                echo ' selected="selected"';
            }
            ?>><?php echo $i; ?></option>
            <?php } ?>
          </select>
          <select name="birthday">
            <option value=""><?php echo $words->get('SignupBirthDay'); ?></option>
            <?php for ($i=1; $i<=31; $i++) { ?>
            <option value="<?php echo $i; ?>"<?php
            if (isset($vars['birthday']) && $vars['birthday'] == $i) {
                echo ' selected="selected"';
            }
            ?>><?php echo $i; ?></option>
            <?php } ?>
            </select>
            <?php
        } else {
        ?>
          <p class="entered">
          <input type="hidden" id="BirthDay" name="birthday" value="<?php
            if (isset($vars['birthday'])) {
                echo $vars['birthday'];
            }
          ?>">
          <?=$vars['birthday'].'. ';?>
          <input type="hidden" id="BirthMonth" name="birthmonth" value="<?php
            if (isset($vars['birthmonth'])) {
                echo $vars['birthmonth'];
            }
          ?>">
          <?=$vars['birthmonth'].'. ';?>
          <input type="hidden" id="BirthYear" name="birthyear" value="<?php
            if (isset($vars['birthyear'])) {
                echo $vars['birthyear'];
            }
          ?>">
          <?=$vars['birthyear'];?>
          </p>
            <?php
        }
          if (in_array('SignupErrorBirthDate', $vars['errors'])) {
              echo '<div class="error">'.$words->get('SignupErrorBirthDate').'</div>';
          }
          if (in_array('SignupErrorBirthDateToLow', $vars['errors'])) {
              echo '<div class="error">'.$words->get('SignupErrorBirthDateToLow').'</div>';
          }

          ?>
          <!--
          <a href="#" onclick="return false;" >
          <img src="../images/icons/help.png" alt="?" height="16" width="16" />
          <span><?php echo $words->get('SignupBirthDateDescription'); ?></span></a><br />
          <span class="small"><?php echo $words->get('SignupBirthDateShape'); ?></span>
          -->
        </div> <!-- signup-row -->

    <!-- Gender -->
        <div class="signup-row">
          <label for="gender"><?php echo $words->get('Gender'); ?>*</label>
          <input type="hidden" id="gender" name="gender" value="<?php
             if (isset($vars['gender']) && $vars['gender'] == 'male') {
                 echo 'male" />';
                 echo '<p class="entered">'.$words->get('male').'</p>';
              } elseif (isset($vars['gender']) && $vars['gender'] == 'female') {
                 echo 'female" />';
                 echo '<p class="entered">'.$words->get('female').'</p>';
              } else {
              ?>
              <input class="radio" style="float: left" type="radio" id="gender" name="gender" value="female"<?php
                 if (isset($vars['gender']) && $vars['gender'] == 'female') {
                     echo ' checked="checked"';
                  }
                  ?> />
                  <?php echo $words->get('female'); ?>
                  <input class="radio" type="radio" name="gender" value="male"<?php
                  if (isset($vars['gender']) && $vars['gender'] == 'male') {
                      echo ' checked="checked"';
                  }
                  ?> />
                  <?php echo $words->get('male');
              }
              ?>
              <?php if (in_array('SignupErrorProvideGender', $vars['errors'])) {
                  echo '<div class="error">'.$words->get('SignupErrorProvideGender').'</div>';
                      }
          ?>

          <!--
          <a href="#" onclick="return false;" >
          <img src="../images/icons/help.png" alt="?" height="16" width="16" />
          <span><?php echo $words->get('SignupGenderDescription'); ?></span></a><br />
          -->
        </div> <!-- signup-row -->
  </fieldset>

  <fieldset id="location">
      <div class="signup-row">
        <legend><?php echo $words->get('Location'); ?></legend>
        <?php echo isset($vars['location']) ? 'value="'.htmlentities($vars['lastname'], ENT_COMPAT, 'utf-8').'" ' : ''; ?>
        <p class="entered"><?//=$vars['location']?></p>
      </div>
      <ul class="floatbox input_float">
        <li class="number">
          <label for="zip"><?php echo $words->get('SignupZip'); ?></label>
          <input type="hidden" id="zip" name="zip" <?php
            echo isset($vars['zip']) ? 'value="'.htmlentities($vars['zip'], ENT_COMPAT, 'utf-8').'" ' : '';
            ?> />
          <p class="entered"><?=$vars['zip']?></p>
          <!--
          <a href="#" onclick="return false;" >
          <img src="../images/icons/help.png" alt="?" height="16" width="16" />
          <span><?php echo $words->get('SignupZipDescription'); ?></span></a><br />
          <span class="small"><?php echo $words->get('SignupZipDescriptionShort'); ?></span>
          -->
        </li>
      </ul>

      <ul class="floatbox input_float">
        <li>

          <label for="street"><?php echo $words->get('SignupStreetName'); ?>*</label><br />
          <input type="hidden" id="street" name="street" <?php
            echo isset($vars['street']) ? 'value="'.htmlentities($vars['street'], ENT_COMPAT, 'utf-8').'" ' : '';
            ?> />
          <p class="entered"><?=$vars['street']?></p>
             <?php
            if (in_array('SignupErrorProvideStreetName', $vars['errors'])) {
                echo '<div class="error">'.$words->get('SignupErrorProvideStreetName').'</div>';
            }
            ?>
          <!--
          <a href="#" onclick="return false;" >
          <img src="../images/icons/help.png" alt="?" height="16" width="16" />
          <span><?php echo $words->get('SignupStreetNameDescription'); ?></span></a><br />
          <span class="small"><?php echo $words->get('SignupStreetNameDescription'); ?></span>
          -->
        </li>
        <li class="number">
          <label for="housenumber"><?php echo $words->get('SignupHouseNumber'); ?>*</label><br />
          <input type="hidden" id="housenumber" name="housenumber" <?php
          echo isset($vars['housenumber']) ? 'value="'.htmlentities($vars['housenumber'], ENT_COMPAT, 'utf-8').'" ' : '';
          ?> />
          <p class="entered"><?=$vars['housenumber']?></p>
          <!--
          <a href="#" onclick="return false;" >
          <img src="../images/icons/help.png" alt="?" height="16" width="16" />
          <span><?php echo $words->get('SignupHouseNumberDescription'); ?></span></a><br />
          <span class="small"><?php echo $words->get('SignupProvideHouseNumber'); ?></span>
          -->
        </li>
      </ul>

    <input type="hidden" name="geonameid" id="geonameid" value="<?php 
            echo isset($vars['geonameid']) ? htmlentities($vars['geonameid'], ENT_COMPAT, 'utf-8') : ''; 
        ?>" />
    <input type="hidden" name="latitude" id="latitude" value="<?php 
            echo isset($vars['latitude']) ? htmlentities($vars['latitude'], ENT_COMPAT, 'utf-8') : ''; 
        ?>" />
    <input type="hidden" name="longitude" id="longitude" value="<?php 
            echo isset($vars['longitude']) ? htmlentities($vars['longitude'], ENT_COMPAT, 'utf-8') : ''; 
        ?>" />
    <input type="hidden" name="geonamename" id="geonamename" value="<?php 
            echo isset($vars['geonamename']) ? htmlentities($vars['geonamename'], ENT_COMPAT, 'utf-8') : ''; 
        ?>" />
    <input type="hidden" name="geonamecountrycode" id="geonamecountrycode" value="<?php 
            echo isset($vars['geonamecountrycode']) ? htmlentities($vars['geonamecountrycode'], ENT_COMPAT, 'utf-8') : ''; 
        ?>" />
    <input type="hidden" name="admincode" id="admincode" value="<?php 
            echo isset($vars['admincode']) ? htmlentities($vars['admincode'], ENT_COMPAT, 'utf-8') : ''; 
        ?>" />

  </fieldset>

  <!-- feeback -->
  <fieldset>
    <legend><?php echo $words->get('SignupFeedback'); ?></legend>
    <p><?php echo $words->get('SignupFeedbackDescription'); ?></p>
    <textarea name="feedback" rows="10" cols="80"><?php
    echo isset($vars['feedback']) ? htmlentities($vars['feedback'], ENT_COMPAT, 'utf-8') : '';
    ?></textarea>
  </fieldset>

  <!-- terms -->

  <?php


/*
 *  FIXME
 *
    if (GetStrParam("Terms","")!="") echo " checked" ; // if user has already click, we will not bore him again
    echo " />";


  ?>
  <?php echo $words->get('IAgreeWithTerms'); ?></p>
  <?php
  */
    if (in_array('SignupMustacceptTerms', $vars['errors'])) {
        // SignupMustacceptTerms contains unknown placeholder
        echo '<div class="error">'.$words->get('SignupTermsAndConditions').'</div>';
    }
    ?>
  <p class="checkbox"><input type="checkbox" name="terms"
  <?php
	if (isset ($vars["terms"])) echo " checked" ; // if user has already click, we will not bore him again
	echo ">";
  ?>
  <?php echo $words->get('IAgreeWithTerms'); ?></p>
  <p>
    <input type="submit" value="<?php echo $words->get('SubmitForm'); ?>" class="submit"
    onclick="javascript:document.signup.javascriptactive.value = 'true'; return true;"
    />
  </p>

</form>
</div> <!-- signup -->

<script type="text/javascript">
 Register.initialize('user-register-form');
 
</script>
