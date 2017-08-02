<?php require_once '../includes/session.php'; ?>
<?php require_once '../includes/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Administrator</title>
  <?php include '../includes/layout/meta_head.php'; ?>
</head>
<body>
  <?php generate_header(); ?>
  <?php $errors = grab_errors(); ?>

  <main>
    <div class="container">
      <h2>New Administrator</h2>

      <section>

        <!-- FORM -->
        <form action="create_admin.php" method="post">

          <div class="row">
            <!-- FIRST NAME -->
            <div class="input-field col s6">
              <input id="first_name" type="text" class="validate" name="first_name" <?php repopulate_text_field("repop_first_name"); ?> >
              <label for="first_name" <?php highlight_label($errors, "first_name") ?> >First Name</label>
            </div>
            <!-- LAST NAME -->
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate" name="last_name" <?php repopulate_text_field("repop_last_name"); ?> >
              <label for="last_name" <?php highlight_label($errors, "last_name") ?> >Last Name</label>
            </div>
          </div>

          <!-- EMAIL -->
          <div class="input-field">
            <input id="email" type="email" class="validate" name="email" <?php repopulate_text_field("repop_email"); ?> >
            <label for="email" <?php highlight_label($errors, "email") ?> >Email</label>
          </div>

          <!-- USERNAME -->
          <div class="input-field">
            <input id="username" type="text" class="validate" name="username" <?php repopulate_text_field("repop_username"); ?> >
            <label for="username" <?php highlight_label($errors, "username") ?> >Username</label>
          </div>

          <!-- PASSWORD -->
          <div class="input-field">
            <input id="password" type="password" class="validate" name="password">
            <label for="password" <?php highlight_label($errors, "password") ?> >Password</label>
          </div>

          <!-- PASSWORD -->
          <div class="input-field">
            <input id="confirm_password" type="password" class="validate" name="confirm_password">
            <label for="confirm_password" <?php highlight_label($errors, "confirm_password") ?> >Confirm Password</label>
          </div>

          <!-- Submit Button -->
          <button class="btn waves-effect waves-light margin-top-adder" type="submit" name="submit">Create</button>

        </form>

      </section>

      <section>
        <?php echo_errors($errors); ?>
      </section>

    </div>
  </main>

  <?php include '../includes/layout/footer.php'; ?>
  <?php include '../includes/layout/meta_body.php'; ?>

</body>
</html>
