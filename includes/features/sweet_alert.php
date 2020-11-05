<!--basic error template -->
<script type="text/javascript">
  swal({ title: "Error!", text: "Here's my error message!", type:"error", confirmButtonText: "Cool" });
</script>

<!--basic success template -->
  echo $welcome = "<script type=\"text/javascript\">
  swal({ title: \"Welcome back $username!\", 
      text: \"You have successfully logged in.\", 
      type: 'success', 
      timer: 6000, 
      showConfirmButton: false });                   

  setTimeout(function(){
      window.location.href = 'index.php';
  }, 5000);
  </script>";