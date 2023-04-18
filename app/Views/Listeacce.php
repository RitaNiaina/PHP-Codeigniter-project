<?php
    require('connect.php');
    require('fpdf184/fpdf.php');
    
    
    class PDF extends FPDF
    {
    // En-t�te
    function Header()
    {
        // Logo
        
        $this->Image('image/log.jpeg',100,2,50);
        // Police Arial gras 15
        $this->SetFont('Arial','B',15);
        // D�calage � droite
        $this->Cell(80);
        // Titre

        // Saut de ligne
        $this->Ln(20);
    }
    
    // Pied de page
    function Footer()
    {
       
        // Positionnement � 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Num�ro de page
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }
   
    // Instanciation de la classe d�riv�e
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Image('image/logo.jpg',40,5,15);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(80,5,'         MINISTERE DE L EDUCATION NATIONALE',70,1);
    $pdf->Cell(80,5,'                        SECRETARIAT GENERAL',70,1);
    $pdf->Cell(80,5,'DIRECTION REGIONALE DE L EDUCATION NATIONALE',70,1);
    $pdf->Cell(80,5,'                             HAUTE MATSIATRA',70,1);





    $pdf->SetFont('Times','',12);
    $pdf->Cell(40,5,'                                                                                                                                        LISTE DES DEMANDES ACCEPTER',70,0,'C');
    $pdf->SetFont('Times','',12);
    $pdf->SetDrawColor(183);//couleur de fond
    $pdf->SetFillColor(221);//couleur des filets
    $pdf->SetTextColor(0);//couleur du texte
    $pdf->SetY(60);
    $pdf->SetX(5);//position 8mm de la gauche
    $pdf->Cell(30,8,' IM',1,0,'C',1);//1:filet de 1mm; 0:saut de ligne; C:centrer; 1:afficher le couleur de fond
    $pdf->SetX(35);//8+100
    $pdf->Cell(50,8,'Nom',1,0,'C',1);
    $pdf->SetX(85);//8+100
    $pdf->Cell(47,8,'Prenom',1,0,'C',1);
    $pdf->SetX(132);//8+100
    $pdf->Cell(75,8,'Poste demander',1,0,'C',1);
    $pdf->SetX(148);//8+100
    $pdf->Ln();//retour a la ligne
    $req = "select personnel.IM,personnel.Nom_pers,personnel.Prenom_pers, demande.Post_dem from personnel inner join demande on personnel.Id=demande.Id where demande.Reponse='Accepter'";
    $rep=mysqli_query($con, $req);
    $posit=68;
    while ($row = mysqli_fetch_array($rep)){
        $pdf->SetY($posit);
        $pdf->SetX(5);
        $pdf->MultiCell(30,8,utf8_decode($row['IM']),1,'C');
        $pdf->SetY($posit);
        $pdf->SetX(35);
        $pdf->MultiCell(50,8,utf8_decode($row['Nom_pers']),1,'C');
        $pdf->SetY($posit);
        $pdf->SetX(48);
        $pdf->SetX(85);
        $pdf->MultiCell(47,8,utf8_decode($row['Prenom_pers']),1,'C');
        $pdf->SetY($posit);
        $pdf->SetX(132);
        $pdf->MultiCell(75,8,utf8_decode($row['Post_dem']),1,'C');
        $posit+=8;
    }

    $pdf->Output();
    ?>
    
    