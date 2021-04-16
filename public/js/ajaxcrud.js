$(function () {

  // document.getElementById('temp').onclick = function(){
  //   console.log('hello');
  // }

  $(".editButton").on('click', function (e) {
    $.ajax({
      url: $(this).attr('editUrl'),
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        if (response.status === "success") {
          $('#old_roll_no').val(response.old_roll_no);
          $('#roll_no').val(response.record[0].roll_no);
          $('#name').val(response.record[0].name);
          console.log(response.old_roll_no);
        }
        // $("#message").html(response.message);
      }
    });
  });

  $("#editForm").on('submit', function (e) {
    e.preventDefault();

    var editForm = $(this);
    $.ajax({
      url: editForm.attr('action'),
      type: 'post',
      data: editForm.serialize(),
      success: function (response) {
        // console.log(response);
        if (response.status == 'success') {
          $('.modal-body').html('<h1>Saved successfully</h1>');
        }

        $("#message").html(response.message);

      }
    });
  });

  $("#createForm").on('submit', function (e) {
    e.preventDefault();

    var createForm = $(this);

    $.ajax({
      url: createForm.attr('action'),
      type: 'post',
      data: createForm.serialize(),
      success: function (response) {
        console.log(response);
        if (response.status == 'success') {
          $('.modal-body').html('<h1>Record added successfully</h1>');
        }
        $("#createResponse").html(response.message);

      }
    });
  });

});
