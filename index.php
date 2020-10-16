<?php 
  $db = mysqli_connect('localhost','root','','ajax');

  $sql = "select * from country";

  $result = mysqli_query($db,$sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  
<div class="container">
  <div class="row">
    <h1>Load city by select Country</h1>
    <div class="col-sm-4 mt-5">
      <div class="form-group">
        <label>Country</label>
        <select id="cntid" class="form-control">
          <option value="-1">Select Country</option>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row['id'] ?>"><?php echo $row['cntname'] ?></option>
        <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>City</label>
        <select id="citid" class="form-control">
        </select>
      </div>
      <div class="form-group">
        <label>Upazila </label>
        <select id="psid" class="form-control">
        </select>
      </div>
      
    </div>
  </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#cntid").change(function(){
      var id = $(this).val();
      if (id=='-1') {
        $("#citid").html('<option value="-1"> Select City</option>');
      }else{
        $("#citid").html('<option value="-1"> Select City</option>');
      $.ajax({
        type:"POST",
        url:"load_city.php",
        data: 'id='+id+'&type=citid',
        success:function(result){
          $("#citid").append(result);
        }
      })
    }
    });
     $("#citid").change(function(){
      var id = $(this).val();
      if (id=='-1') {
        $("#psid").html('<option value="-1"> Select Upazila </option>');
      }else{
        $("#psid").html('<option value="-1"> Select Upazila </option>');
      $.ajax({
        type:"POST",
        url:"load_city.php",
        data: 'id='+id+'&type=psid',
        success:function(result){
          $("#psid").append(result);
        }
      })
    }
    });

   });


</script>
</body>
</html>
