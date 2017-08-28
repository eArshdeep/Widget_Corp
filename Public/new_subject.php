<?php require_once '../includes/session.php'; ?>
<?php require_once '../includes/db_connection.php'; ?>
<?php require_once '../includes/functions.php'; ?>

<?php enforce_login(); ?>

<?php
  $context = array(
    "display_content_nav" => true
  );
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Subject</title>
  <?php include '../includes/layout/meta_head.php'; ?>
</head>
<body>
  <?php include '../includes/layout/header.php'; ?>
  <?php $errors = grab_errors(); ?>

  <main>
    <div class="row">
        <!-- NAV SECTION -->
        <section class="col s12 m2">
          <?php include '../includes/layout/nav.php'; ?>
        </section>

      <!-- MAIN SECTION -->
      <section class="col s12 m10">
        <div class="container">
          <div class="divider hide-on-large-only"></div>
          <h2>Create New Subject</h2>
          <form action="create_subject.php" method="post">
            <!-- Input: menu name -->
            <div class="input-field">
              <input placeholder="Menu name" id="menu_name" name="menu_name" type="text" <?php repopulate_text_field("repop_menu_name"); ?>>
              <label for="menu_name" <?php if(isset($errors["menu_name"])){echo "class='red-text'";} ?>>Menu Name</label>
            </div>
            <!-- Input: Position -->
            <div class="input-field">
              <select name="position">
                <option value="" disabled <?php if(!isset($_SESSION["repop_position"])){echo "selected";} ?> >Select Position</option>
                  <?php
                  $subject_set = find_all_subjects(false);
                  $subject_count = mysqli_num_rows($subject_set);
                  for($count=1; $count <=$subject_count+1; $count++){
                    $output = "<option ";
                    if(isset($_SESSION["repop_position"]) && $_SESSION["repop_position"] === $count){
                      $output .= "selected ";
                      $_SESSION["repop_position"] = null;
                    }
                    $output .= "value=\"{$count}\">";
                    $output .= $count;
                    $output .= "</option>";
                    echo $output;
                    unset($output);
                  }
                  ?>
              </select>
              <label <?php if(isset($errors["position"])){echo "class='red-text'";} ?>>Position</label>
            </div>
            <!-- Input: Visibility -->
            <p <?php if(isset($errors["visible"])){echo "class='red-text'";} ?>>Visibility</p>
              <input name="visible" type="radio" id="visible_true" value="1" <?php repopulate_visibility(1); ?> />
              <label for="visible_true">Visible</label>
              <span class="side-margin-adder">or</span>
              <input name="visible" type="radio" id="visible_hidden" value="0"<?php repopulate_visibility(0); ?> />
              <label for="visible_hidden">Hidden</label>

            <!-- Submit Button -->
            <button style="display:block;" class="btn waves-effect waves-light margin-top-adder" type="submit" name="submit" value="true">Create</button>
          </form>
          <a href="manage_content.php" class="orange-text">&#8592; Cancel</a>

          <section>
            <?php echo_errors($errors); ?>
          </section>
        </div>
      </section>
    </div>
  </main>

  <?php include '../includes/layout/footer.php'; include '../includes/layout/meta_body.php';?>
  <script type="text/javascript">
    $(document).ready(function() {
      // initialize html select forms
      $('select').material_select();
      <?php toast_message(); ?>
      $(".button-collapse").sideNav();
    });
  </script>

  <?php
    // release db resources and handles
    mysqli_close($db);
    mysqli_free_result($subject_set);
  ?>
</body>
</html>
