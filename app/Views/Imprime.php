<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
</head>
<body>

<div class="container">
<h1> LISTE DE VENTES EFFECTUEES </h1><br><br><br>
<!-- <div class="form-group">
<label for="completeNbplace" class="form-label">adresse</label>
<input type="text" class="form-control  updatadres" name="adresse" required>   
</div>
<div class="form-group">
<label for="completeNbplace" class="form-label">Telephone</label>
<input type="text" class="form-control  updattel" name="tel" required>   
</div> -->
        <table class="table table-borded"  width="100%" cellspacing="0">
        <thead>
    <tr>
    <th>N° achat</th>
      <th>Nom client</th>
      <th>Prenom </th>
      <th>Logement </th>
      <th>Citer</th>
      <th>Date</th>
      <th>Prix en Ar</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   
   foreach ($client as $cli) {
    
 ?>
  <tr>
  <th scope="row" class="nume"><?php echo $cli['achat'];?></th>
      <td><?php echo $cli['nom_cli'];?></td>
      <td><?php echo $cli['prenom_cli'];?></td>
      <td><?php echo $cli['num_log'];?></td>
      <td><?php echo $cli['citer'];?></td>
      <td><?php echo $cli['Date'];?></td>
      <td><?php echo $cli['prix'];?></td>
      
      </tr>
      <?php 
  
        }
   ?>
  </tbody>
</table>
</div>

</body>  
</html>