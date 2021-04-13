<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Student</h5>
        <button type="button" class="closeRefresh close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <h1 id="temp">Edit</h1>
        <div id="message"></div>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div id="message">
            </div>
            <?php echo form_open('pages/editSubmit', array('id' => 'editForm')) ?>
            <div class="form-group">
              <input type="hidden" name="old_roll_no" id="old_roll_no" value="">
            </div>
            <div class="form-group">
              <input type="text" name="roll_no" id="roll_no" value="" class="form-control" placeholder="Roll No">
            </div>
            <div class="form-group">
              <input type="text" name="name" id="name" value="" class="form-control" placeholder="Name">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-info">Save</button>
            </div>
            <?php echo form_close() ?>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="closeRefresh btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>