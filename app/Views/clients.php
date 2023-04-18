<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>clients</title>
    
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
<h5 class="modal-title" id="exampleModalLabel">ajout client</h5>
<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form action="<?php echo base_url().'/clie/save';?>" method="post">

<div class="form-group">
<label for="completeNom" class="form-label">Nom client</label>
<input type="text" class="form-control" name="nom" placeholder="Nom client">   
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Prenom</label>
<input type="text" class="form-control" name="prenom" placeholder="Prenom">   
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">adresse</label>
<input type="text" class="form-control" name="adresse" placeholder="adresse">   
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Telephone</label>
<input type="text" class="form-control" name="tel" onkeypress="return forceInteger(event)" placeholder="Telephone">   
<script>
						
						function forceInteger(evt)
						{
			        		var mimi= (evt.which)? evt.which: evt.keyCode;
							if(mimi> 31 && (mimi < 48 || mimi > 57))
								return false;
							return true;
						}
						
						</script>
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Lieu travail</label>
<input type="text" class="form-control" name="lieu" placeholder="Lieu travail">   
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#completModale">
AJOUT
</button>
</div>
<div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
    <tr>
      <th scope="col">Numero</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Adresse</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Lieu travail</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
   <?php 
   
     foreach ($client as $user) {
      
   ?>
  <tr>
  <th scope="row" class="nume"><?php echo $user['num_cli'];?></th>
      <td><?php echo $user['nom_cli'];?></td>
      <td><?php echo $user['prenom_cli'];?></td>
      <td><?php echo $user['adres_cli'];?></td>
      <td><?php echo $user['tel_cli'];?></td>
      <td><?php echo $user['lieu_trav'];?></td>
      <td>
      
      <a href="" data-toggle="modal" class="modif" data-target="#editModale"><img src="img/mod.png" width="30px"></a>
      <a  class="delete"><img src="img/SUP.png" width="30px"></a>
      
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
<form action="<?php echo base_url().'/updatecli';?>" method="post">

<div class="form-group">
<input type="hidden" class=" updatnum" name="updatnum" >   
</div>

<div class="form-group"> 
<label for="completeNom" class="form-label">Nom client</label>
<input type="text" class="form-control updatnom" name="nom" required>   
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Prenom</label>
<input type="text" class="form-control updatprenom" name="prenom" required>   
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">adresse</label>
<input type="text" class="form-control  updatadres" name="adresse" required>   
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Telephone</label>
<input type="text" class="form-control  updattel" name="tel" onkeypress="return forceInteger(event)" required> 
<script>
						
						function forceInteger(evt)
						{
			        		var mimi= (evt.which)? evt.which: evt.keyCode;
							if(mimi> 31 && (mimi < 48 || mimi > 57))
								return false;
							return true;
						}
						
						</script>  
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Lieu travail</label>
<input type="text" class="form-control  updatlieu" name="lieu" required>   
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
    <script src="js/demo/datatables-demo.js"></script>

    <script>
      $(document).ready(function () {

        $(document).on('click','.delete',function() {
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
            url:'<?php echo base_url('jo');?>',
            data:{
              'delet':num
            },
            success:function(response){
              Swal.fire({
                            title: 'success',
                            text: 'Donne suprimer',
                            icon: 'success',
                            timer: 1000,
                            showConfirmButton: false,
                        }).then(()=>{
                                    window.location.reload();
                                })
            }
          })
        }
        })
        }) 
        $(document).on('click','.modif',function(e){
         e.preventDefault();
        
        var num=$(this).closest('tr').find('.nume').text();
         $.ajax({
         url:"<?php echo base_url();?>"+"/mimi/"+num,
        method : "GET",
        success: function(result){
          var res=JSON.parse(result);
          $(".updatnom").val(res.nom_cli);
          $(".updatprenom").val(res.prenom_cli);
          $(".updatadres").val(res.adres_cli);
          $(".updattel").val(res.tel_cli);
          $(".updatlieu").val(res.lieu_trav);
          $(".updatnum").val(res.num_cli);
        }
})
        })
      })
    </script>
</body>  
</html>