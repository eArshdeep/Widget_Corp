<?php
  // get needed values
  // get type (e.g. page or subject)
  // and handle of current value weather page or subject assoc array for easy handle
  if(isset($current_subject)){
    $type = "Subject";
    $current = $current_subject;
  } elseif (isset($current_page)){
    $type = "Page";
    $current = $current_page;
  }
?>

<!-- Modal Structure for Deletion of Subject or Page-->
<div id="delete_modal" class="modal">
  <div class="modal-content container">
    <!-- Title -->
    <h4>Delete <?php echo $type; ?>?</h4>
    <!-- Body -->
    <p>Are you sure you want to delete the current <?php echo $type; ?>?</p>
    <p>There is no way to undo this action.</p>
    <p>If you wish to proceed, please type the name of the <?php echo $type; ?> below to confirm.</p>
    <div class="divider"></div>
    <!-- Name to enter -->
    <p class="hamburger_border bold inline_block"> <?php echo $current["menu_name"]; ?> </p>
    <!-- Form to confirm -->
    <form action="delete_subject.php" id="confirmation_form" method="post">
      <div class="input-field">
        <!-- Input field for menu name confirmation -->
        <input placeholder="About Us" id="confirm_menu_name" type="text">
        <label for="menu_name"><?php echo $type; ?> Name</label>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <a class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    <input form="confirmation_form" name="submit" value="Delete" type="submit" class="disabled modal-action modal-close waves-effect waves-red btn-flat">
  </div>
</div>

<?php
  // function for outputing javascript and jquery for validating delete modal form, typing in and confirming menu name for the subject you wish to delete will allow you to click delete to delete
  function modal_confirm_delete($menu_name){
    $output = "var target_menu_name = \"{$menu_name}\";";
    $output .= "$(\"#confirm_menu_name\").on(\"change paste keyup\", function() {";
    $output .= "if($(this).val()==target_menu_name) {";
    $output .= "console.log(\"Match\");";
    $output .= "$(\".waves-red\").removeClass(\"disabled\");";
    $output .= "console.log(\"Should have updated modal\");";
    $output .= "} else {";
    $output .= "$(\".waves-red\").addClass(\"disabled\");";
    $output .= "}";
    $output .= "});";
    echo $output;
  }
?>

<?php
  // clean up variables
  unset($type);
  unset($current);
?>
