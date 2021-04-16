<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</head>

<body>
  <div class="container">

    <!-- Modal -->
    <?php include_once('editModal.php'); ?>

    <!-- Create Modal -->
    <?php include_once('createModal.php'); ?>

    <div class="">

      <div class="row">
        <h1>List of Students</h1>
        <button type="button" id="createButton" style="margin: 5px 0 0 20%" class="btn btn-primary btn-sm"
          data-toggle="modal" data-target="#exampleCreateModalCenter">+Create</button>
      </div>

      <table id="dtBasicExample" class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Roll No</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $data = json_decode($data, true);
            // var_dump($data);
            for ($i=0; $i < count($data); $i++) { 
          ?>
          <tr>
            <th scope="row"><?php echo $i+1?></th>
            <td><?php echo $data[$i]['roll_no']?></td>
            <td><?php echo $data[$i]['name']?></td>
            <td>
              <!-- <a href="<?php //echo base_url().'pages/edit/'.$data[$i]['roll_no']?>"
              class="btn btn-info btn-sm editRecord">Edit</a> -->
              <button type="button" name="" class="editButton btn btn-primary btn-sm" data-toggle="modal"
                data-target="#exampleModalCenter"
                editUrl="<?php echo base_url().'pages/edit/'.$data[$i]['roll_no']?>">Edit</button>
              <a href="<?php echo base_url().'pages/delete/'.$data[$i]['roll_no']?>"
                class="btn btn-danger btn-sm deleteRecord">Delete</a>
            </td>
          </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>public/js/ajaxcrud.js"></script>
<script>
$(document).ready(function() {
  $('#dtBasicExample').dataTable();
  $('.closeRefresh').on('click', function() {
    window.location.reload();
  })
});
</script>

</html>