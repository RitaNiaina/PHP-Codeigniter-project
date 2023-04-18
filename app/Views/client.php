<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>logement vendu</title>
    
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist\css\bootstrap.min.css">
        

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    
</head>
<body id="page-top">
<div>

<?php echo view('/interface.php');?>

</div>
<div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
    <tr>
    <th scope="col">N° achat</th>
      <th scope="col">Nom client</th>
      <th scope="col">Prenom </th>
      <th scope="col">Logement </th>
      <th scope="col">Citer</th>
      <th scope="col">Date</th>
      <th scope="col">Prix</th>
      <!-- <th scope="col">Imprimer</th> -->
    </tr>
  </thead>
  <tbody>
   <?php 
   
     foreach ($client as $user) {
      
   ?>
  <tr>
  <th scope="row" class="nume"><?php echo $user['achat'];?></th>
      <td><?php echo $user['nom_cli'];?></td>
      <td><?php echo $user['prenom_cli'];?></td>
      <td><?php echo $user['num_log'];?></td>
      <td><?php echo $user['citer'];?></td>
      <td><?php echo $user['Date'];?></td>
      <td><?php echo $user['prix'];?></td>

      </tr>
      <?php 
  
        }
   ?>
  </tbody>
</table>
<br><b>IMPRIMER</b><a href="<?php echo base_url('/imprimpd');?>"><img src="img/print.png" width="30px"></a>
</div>
  </div>
 
    </div>
     
 

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="sweetalert/sweetalert2.all.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


<!-- <script>
   $(document).ready(function () {
    $(document).on('click','.impe',function() {
    var num=$(this).closest('tr').find('.num').text();
    $.ajax({
        method:'POST',
        url:'/'+num,
        
        data:{
          'nume':num
        },
        success:function(response){

        }
    })
    })
   })
</script> -->
    
</body>  
</html>