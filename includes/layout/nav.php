<section class="col s12 m4">
  <ul class="subjects">

    <?php while ($subject = mysqli_fetch_assoc($subject_set)) { ?>

      <?php /*grab all pages for current subject*/ $page_set = find_pages_for_subject($subject["id"]); ?>

      <li <?php if($subject["id"]===$selected_subject_id){echo "class='selected'";} ?>>
        <a href="manage_content.php?subject=<?php echo urlencode($subject['id']); ?>">
        <?php echo $subject["menu_name"]; ?></a>

        <ul class="pages">
          <?php while ($page = mysqli_fetch_assoc($page_set)) { ?>

            <li <?php if($page["id"]===$selected_page_id){echo "class='selected'";} ?>><a href="manage_content.php?page=<?php echo urlencode($page['id']); ?>"><?php echo $page["menu_name"]; ?></a></li>

          <?php } // close page_set while loop ?>
        </ul>
      </li>

    <?php } // close subject_set while loop ?>

  </ul>
</section>
