<!-- Modal Structure -->

<div id="delete_modal" class="modal">

    <div class="modal-content">

      <h4>Remove Administrator?</h4>

      <p>Are you sure you want to remove the following administrator? This action cannot be undone. To continue, please enter the username shown in the text box below.</p>

      <p id="value_username" class="hamburger_border bold inline_block">op</p>

      <div class="input-field">

        <input placeholder="Enter username shown to confirm removal" id="confirm_username" type="text">

        <label for="confirm_username">Confirm Username</label>

      </div>

    </div>

    <div class="modal-footer">

      <form action="delete_admin.php" method="post">

        <input id="value_admin_id" type="hidden" name="admin_id">

        <input type="submit" value="remove" class="disabled modal-action modal-close waves-effect waves-red btn-flat">

      </form>

    </div>

</div>
