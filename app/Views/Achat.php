<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>logement</title>
    
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
<h5 class="modal-title" id="exampleModalLabel">ajout achat</h5>
<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form action="<?php echo base_url().'/clie/acha';?>" method="post">
<div class="form-group">
<input type="hidden" class=" updatnum" name="updatnum" >   
</div>
<!-- <div class="form-group">
<label for="completeNom" class="form-label">CLIENT</label>
<input type="number" class="form-control" name="cLI" placeholder="numero client">   
</div> -->
<div class="form-group">
          <label for="cLI" class="form-label">Client</label>
          <select class="form-control" name="cLI" >
          <?php if($cli):foreach($cli as $row): ?>
          <option value="<?php echo $row['num_cli'] ?>"><?php echo $row['nom_cli'] ?></option>
          <?php endforeach;?><?php endif ;?>
          </select>
      </div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Date achat</label>
<input type="date" class="form-control" name="dat" placeholder="Date achat">   
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Prix en Ar</label>
<input type="number" class="form-control" name="pri" onkeypress="return forceInteger(event)" placeholder="Prix">
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
<label for="completeNbplace" class="form-label">Paiement</label>   
<select class="form-control" name="pay" id="">
            <option value="en espece"> en espece</option>
            <option value="par carte">par carte</option>    
          </select>
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
</div>
<div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
    <tr>
    <th scope="col">Num </th>
      <th scope="col">Province</th>
      <th scope="col">Agence</th>
      <th scope="col">Adresse</th>
      <th scope="col">Citer</th>
      <th scope="col">Terrain</th>
      <th scope="col">Superficie</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
   <?php 
   
     foreach ($client as $user) {
      
   ?>
  <tr>
  <th scope="row" class="nume"><?php echo $user['num_log'];?></th>
      <td><?php echo $user['province'];?></td>
      <td><?php echo $user['agence'];?></td>
      <td><?php echo $user['adres_agn'];?></td>
      <td><?php echo $user['citer'];?></td>
      <td><?php echo $user['terrain'];?></td>
      <td><?php echo $user['superficie'];?></td>
      <td>
      <button type="button" class="btn btn-success modif" data-toggle="modal" data-target="#completModale">
     Acheter
      </button>
      <!-- <a href="" data-toggle="modal" class="modif" data-target="#completModale"><img src="img/mod.png" width="30px"></a> -->
      
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

        $(document).on('click','.modif',function(e){
         e.preventDefault();
        var num=$(this).closest('tr').find('.nume').text();
         $.ajax({
         url:"<?php echo base_url();?>"+"/achate/"+num,
        method : "GET",
        success: function(result){
          var res=JSON.parse(result);
         
          $(".updatnum").val(res.num_log);
        }
})
        })
      })
    </script>
</body>  
</html>