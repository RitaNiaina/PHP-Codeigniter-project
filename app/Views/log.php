<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    
header{background-color:rgba(238, 130, 238, 0.418);}

body{ 
    background: #1690A7;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    }

*{
    font-family: sans-serif;
    box-sizing: border-box;
}
form {
     width: 500px;
     border: 2px solid #ccc;
     padding: 30px;
     background: #fff;
     border-radius: 15px;
}


h2{ 
     text-align: center;
     margin-bottom: 40px;
}
input{
    display: block;
    border: 2px solid #ccc;
    width: 95%;
    padding: 10px;
    margin: 10px auto;
    border-radius: 5px;
}
label{
    color: #888;
    font-size: 18px;
    padding: 1Opx;
}
button{
    float: right;
    background: #555;
    padding: 15px 20px;
    color: #fff;
    border-radius: 5px;
    margin-right: 10px;
    border: none;
}
button:hover{
    opacity: .7;
}
.error{
    background: #F2DEDE;
    color: #A94442;
    padding: 1Opx ;
    width: 95%;
    border-radius: 5px;
    margin:20px auto;
}
    </style>
</head>
<body>
<form action="<?php echo base_url('log/check');?>" method="post">

<h2>LOGIN</h2>
<div class="form group">
<label>Nom de l'utilisateur</label>
<input type="text" name="username" placeholder="Nom de l'utilisateur">

</div>
<div class="form group">
<label>Mot de passe</label>
<input type="password" name="password" placeholder="Mot de passe">

</div>
<div class="form group">

<button type="submit" >se connecter</button>
</div>
</form>
    
</body>
</html>
