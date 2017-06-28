<?php require_once '../includes/session.php'; ?>
<?php require_once '../includes/db_connection.php'; ?>
<?php require_once '../includes/functions.php'; ?>
<?php require_once '../includes/validation.php'; ?>

<?php
  if(isset($_POST["submit"])){
    // handle values
    $menu_name = $_POST["menu_name"];
    $position = (int) $_POST["position"];
    $visible = (int) $_POST["visible"];

    // escape
    $menu_name = mysqli_real_escape_string($db, $menu_name);

    // validate form values
    $required_fields = array("menu_name", "position", "visible");
    validate_presences($required_fields);

    $fields_with_length_limit = array("menu_name" => 30);
    validate_max_lengths($fields_with_length_limit);

    if(!empty($errors)){
      $_SESSION["errors"] = $errors;
      redirect_to("new_subject.php");
    }

    // build query
    $query = "INSERT INTO subjects ( menu_name, position, visible) VALUES ( '{$menu_name}', {$position}, {$visible});";
    $result = mysqli_query($db, $query);

    if($result){
      // if creation is successful
      $_SESSION["message"] = "Subject created successfully. Cheers :)";
      redirect_to("manage_content.php");
    } else {
      // if creation is NOT successful
      $_SESSION["message"] = "Unable to create subject. Bonkers!";
      redirect_to("new_subject.php");
    }

  } else {
    // if trying to access this page via a url, and not a post request, redirect to homepage
    redirect_to("index.php");
  }
?>
<?php
  if(isset($db)){mysqli_close($db);}
  if(isset($result)){mysqli_free_result($result);}
?>
