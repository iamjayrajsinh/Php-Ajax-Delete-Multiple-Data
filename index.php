<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo "Delete Multiple Data"; ?></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
        <h1><?php echo "Delete Multiple Data with PHP & Ajax CRUD"; ?> Delete Multiple Data with <br>PHP & Ajax CRUD</h1>
    </div>
    <div id="sub-header">
      <button id="delete-btn">Delete</button>
    </div>
    <div id="table-data"></div>
  </div>

  <div id="error-message"></div>
  <div id="success-message"></div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // Load Tabular forms data of Students table from database
    function loadData(){
      $.ajax({
        url : "load-data.php",
        type : "POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    }
    loadData(); // Load Table data when page opens

    // Multiple Data Delete
    $("#delete-btn").on("click",function(){
      var id = [];

      // Converted all checked checkbox's value into Array
      $(":checkbox:checked").each(function(key){
        id[key] = $(this).val();
      });

      if(id.length === 0){
        alert("Please Select atleast one checkbox.");
      }else{
        if(confirm("Do you really want to delete these records ?")){
          $.ajax({
            url : "delete-data.php",
            type : "POST",
            data : {id : id},
            success : function(data){
              if(data == 1){
                $("#success-message").html("Data deleted successfully.").slideDown();
                $("#error-message").slideUp();
                loadData();
                setTimeout(function(){
                  $("#success-message").slideUp();
                },4000);

              }else{
                $("#error-message").html("Can't Delete Data.").slideDown();
                $("#success-message").slideUp();
                setTimeout(function(){
                  $("#error-message").slideUp();
                },4000);
              }
            }
          });
        }
      }
    });
  });
</script>
</body>

</html>
