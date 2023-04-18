<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    
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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
        <!-- Modal -->
<div class="modal fade" id="completModale" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">ajout login</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form action="<?php echo base_url().'/log/save';?>" method="post">
<div class="form-group">
<input type="hidden" class=" updatnum" name="updatnum" >   
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Nom utilisateur</label>
<input type="text" class="form-control" name="nom" placeholder=" Nom utilisateur">   
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Mot de passe</label>
<input type="text" class="form-control" name="pass" placeholder="Mot de passe">   
</div>
      </div>
      <div class="modal-footer">
      <button type="submit" name="submit" class="btn btn-primary" >Ajouter</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#completModale">
AJOUT
</button>
</div>

<div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
    <tr>
    <th scope="col">N° </th>
    <th scope="col">Nom utilisateur </th>
      <th scope="col">Mot de passe</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
   <?php 
   
     foreach ($client as $user) {
      
   ?>
  <tr>
  <th scope="row" class="nume"><?php echo $user['Id'];?></th>
      <td><?php echo $user['username'];?></td>
      <td><?php echo $user['password'];?></td>
      <td>
      <button type="button" class="btn btn-success modifs" data-toggle="modal" data-target="#editModale">
      Modifier
      </button>
      <button class="btn btn-danger deletev" ><a  class="text-light">Supprimer</a></button>
      </td>
      </tr>
      <?php 
  
        }
   ?>
  </tbody>
</table>
</div>
  </div>
    </div>

     </div>
     </div>
     </div>
 
<!-- modal MODIFIER-->
<div class="modal fade" id="editModale" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">modifier client</h5>
<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form action="<?php echo base_url().'/updatelogin';?>" method="post">

<div class="form-group">
<input type="hidden" class=" updatnum" name="updatnum" >   
</div>

<div class="form-group"> 
<label for="completeNom" class="form-label">Nom client</label>
<input type="text" class="form-control updatus" name="nom" required>   
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Prenom</label>
<input type="text" class="form-control updatpass" name="pass" required>   
</div>
      </div>
      <div class="modal-footer">
      <button type="submit" name="submit" class="btn btn-primary" >Ajouter</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      </form>
      </div>
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
    <script>
      $(document).ready(function () {

        $(document).on('click','.deletev',function() {
          var num=$(this).closest('tr').find('.nume').text();
          Swal.fire({
                    title: 'Vous ete sur?',
                    text: "Si sur clic sur lOk",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#24972a',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'O.K, Supprimer!'
                    }).then((result) => {
                    if (result.isConfirmed) {
          $.ajax({

            method:'POST',
            url:'<?php echo base_url('delety');?>',
            data:{
              'delty':num
            },
            success:function(response){
              Swal.fire({
                            title: 'success',
                            text: 'Donne suprimer',
                            icon: 'success',
                            timer: 3000,
                            showConfirmButton: false,
                        }).then(()=>{
                                    window.location.reload();
                                })
            }
          })
        }
        })
        }) 
        $(document).on('click','.modifs',function(e){
         e.preventDefault();
        
        var num=$(this).closest('tr').find('.nume').text();
         $.ajax({
         url:"<?php echo base_url();?>"+"/lolo/"+num,
        method : "GET",
        success: function(result){
          var res=JSON.parse(result);
          $(".updatus").val(res.username);
          $(".updatpass").val(res.password );
          $(".updatnum").val(res.Id);
        }
})
        })
      })
    </script>
</body>  
</html>