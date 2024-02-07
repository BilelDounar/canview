<?php
/**
 * Template Name: CVPDF
 */

require('fpdf/fpdf.php');

global $wpdb;
$id=$_GET['id'];
$user="SELECT * 
       FROM canview_cv AS cv 
       LEFT JOIN canview_formation AS cf
       ON cv.id=cf.id_cv
       LEFT JOIN canview_experience AS ce
       ON cv.id=ce.id_cv
       LEFT JOIN canview_passerelle_hardskills AS ph
       ON cv.id=ph.id_cv
       LEFT JOIN canview_hardskills AS ch
       ON ph.id_hardskills=ch.id
       LEFT JOIN canview_softskills AS cs
       ON cv.id=cs.id_cv
       LEFT JOIN canview_passerelle_langue AS pl
       ON cv.id=pl.id_cv
       LEFT JOIN canview_langue AS cl
       ON pl.id_langue=cl.id
       LEFT JOIN canview_loisir AS clo
       ON cv.id=clo.id_cv
       WHERE cv.id_user=$id;";
$infocv = $wpdb->get_results(
    $user
);

if(empty($infocv)){
    //redirection a faire vers la création de cv
    header('Location: '.path('403'));
}

//debug($infocv);

class PDF extends FPDF{
    function BanderoleGauche(){
        $this->setFillColor(150,210,217);
        $this->rect(0,0,75,$this->h,'F');
/*        $this->Image("<?php echo asset('img/photo_profil.jpg')?>",7.5,7.5,60,65,'JPG');*/
    }

    function HeaderCV()
    {
        global $prenom;
        global $nom;
        global $metier;
        $this->setFillColor(135,170,202);
        $this->rect(80,0,$this->w,72.5,'F');

        $this->SetFont('Arial','B',25);
        $this->SetXY(85,20);
        $this->SetTextColor(255,255,255);
        $this->Cell(0,0,$prenom,0,1,'C');

        $w = $this->GetStringWidth($nom)+6;
        $this->SetXY(85,30);
        $this->SetTextColor(255,255,255);
        $this->Cell(0,0,$nom,0,1,'C');

        $this-> setFillColor(255,255,255);
        $this->rect(120,42,45,0.5,'F');

        $this->SetFont('Arial','',20);
        $this->SetXY(85,55);
        $this->SetTextColor(255,255,255);
        $this->Cell(0,0,$metier,0,1,'C');
    }

    function Contact(){
        global $anniversaire;
        global $adresse;
        global $ville;
        global $telephone;
        global $mail;

        $this->SetFont('Arial','B',15);
        $this->SetXY(7.5,85);
        $this->setFillColor(135,170,202);
        $this->SetTextColor(255,255,255);
        $this->Cell(60,10,'Contact',0,1,'C',true);

        $this->setFillColor(150,210,217);
        $this->SetFont('Arial','',12);
        $this->SetXY(15,100);
        $this->Cell(0,0,$anniversaire,0,1,'L');
/*        $this->Image("<?php echo asset('imgCV/gateau_anniversaire.png')?>",7.5,97,5,5,'PNG');*/

        $this->SetXY(15,110);
        $this->Cell(60,0,$adresse,0,1,'L');
        $this->SetXY(15,118);
        $this->Cell(60,0,$ville,0,1,'L');
/*        $this->Image("<?php echo asset('imgCV/adresse.png')?>",7.5,106,5,7,'PNG');*/

        $this->SetXY(15,128);
        $this->Cell(0,0,$telephone,0,1,'L');
/*        $this->Image("<?php echo asset('imgCV/telephone.png')?>",7.5,125,5,5,'PNG');*/

        $this->SetXY(15,135);
        $this->MultiCell(60,5,$mail,0,1,'L');
/*        $this->Image("<?php echo asset('imgCV/mail.png')?>",7.5,135,5,5,'PNG');*/
    }

    function Hardskills(){
        global $hardskills1;
        global $hardskills2;
        global $hardskills3;
        global $hardskills4;
        $this->SetFont('Arial','B',15);
        $this->SetXY(7.5,150);
        $this->setFillColor(135,170,202);
        $this->SetTextColor(255,255,255);
        $this->Cell(60,10,'Hardskills',0,1,'C',true);

        $this->SetFont('Arial','',12);
        $this->SetXY(7.5,165);
        $this->Cell(60,0,$hardskills1,0,1,'C');
        $this->SetXY(7.5,172);
        $this->Cell(60,0,$hardskills2,0,1,'C');
        $this->SetXY(7.5,179);
        $this->Cell(60,0,$hardskills3,0,1,'C');
        $this->SetXY(7.5,186);
        $this->Cell(60,0,$hardskills4,0,1,'C');
    }

    function Softskills(){
        global $Softskills1;
        global $Softskills2;
        global $Softskills3;
        global $Softskills4;
        $this->SetFont('Arial','B',15);
        $this->SetXY(7.5,195);
        $this->setFillColor(135,170,202);
        $this->SetTextColor(255,255,255);
        $this->Cell(60,10,'Softskills',0,1,'C',true);

        $this->SetFont('Arial','',12);
        $this->SetXY(7.5,210);
        $this->Cell(60,0,$Softskills1,0,1,'C');
        $this->SetXY(7.5,217);
        $this->Cell(60,0,$Softskills2,0,1,'C');
        $this->SetXY(7.5,224);
        $this->Cell(60,0,$Softskills3,0,1,'C');
        $this->SetXY(7.5,231);
        $this->Cell(60,0,$Softskills4,0,1,'C');
    }

    function Langue(){
        global $langue1;
        global $langue2;
        global $langue3;

        $this->SetFont('Arial','B',15);
        $this->SetXY(7.5,245);
        $this->setFillColor(135,170,202);
        $this->SetTextColor(255,255,255);
        $this->Cell(60,10,'Langues',0,1,'C',true);

        $this->SetFont('Arial','',12);
        $this->SetXY(7.5,260);
        $this->Cell(60,0,$langue1,0,1,'C');
        $this->SetXY(7.5,266);
        $this->Cell(60,0,$langue2,0,1,'C');
        $this->SetXY(7.5,273);
        $this->Cell(60,0,$langue3,0,1,'C');
    }

    function profil(){
        global $texte;

        $this->SetFont('Arial','B',15);
        $this->SetXY(85,90);
        $this->setFillColor(135,170,202);
        $this->SetTextColor(255,255,255);
        $this->rect(80,85,$this->w,10,'F');
        $this->Cell(0,0,'Profil',0,1,'C');

        $this->SetFont('Arial','',12);
        $this->SetXY(80,100);
        $this->setFillColor(255,255,255);
        $this->SetTextColor(0,0,0);
        $this->MultiCell(125,6,$texte,0,1,'F');

        $this->setFillColor(0,0,0);
        $this->rect(100,155,90,0.3,'F');
    }

    function Formation(){
        global $f_formation1;
        global $f_ecole1;
        global $f_date1;

        global $f_formation2;
        global $f_ecole2;
        global $f_date2;

        global $f_formation3;
        global $f_ecole3;
        global $f_date3;

        $this->SetFont('Arial','B',15);
        $this->SetXY(80,165);
        $this->setFillColor(135,170,202);
        $this->SetTextColor(255,255,255);
        $this->Cell(60,10,'Formation',0,1,'C',true);

        $this->SetFont('Arial','',12);
        $this->SetXY(80,180);
        $this->setFillColor(255,255,255);
        $this->SetTextColor(0,0,0);
        $this->MultiCell(60,5,$f_formation1.', ',0,1,'L');
        $this->SetXY(80,193);
        $this->Cell(60,0,$f_ecole1,0,1,'L');
        $this->SetXY(80,199);
        $this->Cell(60,0,$f_date1,0,1,'L');

        $this->SetXY(80,210);
        $this->MultiCell(60,5,$f_formation2.', ',0,1,'L');
        $this->SetXY(80,223);
        $this->Cell(60,0,$f_ecole2,0,1,'L');
        $this->SetXY(80,229);
        $this->Cell(60,0,$f_date2,0,1,'L');

        $this->SetXY(80,240);
        $this->MultiCell(60,5,$f_formation3.', ',0,1,'L');
        $this->SetXY(80,253);
        $this->Cell(60,0,$f_ecole3,0,1,'L');
        $this->SetXY(80,259);
        $this->Cell(60,0,$f_date3,0,1,'L');
    }

    function experience(){
        global $e_experience1;
        global $e_date1;

        global $e_experience2;
        global $e_date2;

        global $e_experience3;
        global $e_date3;

        global $e_experience4;
        global $e_date4;

        $this->SetFont('Arial','B',15);
        $this->SetXY(150,165);
        $this->setFillColor(135,170,202);
        $this->SetTextColor(255,255,255);
        $this->Cell(60,10,'Experience',0,1,'C',true);

        $this->SetFont('Arial','',12);
        $this->SetXY(150,180);
        $this->setFillColor(255,255,255);
        $this->SetTextColor(0,0,0);
        $this->MultiCell(60,5,$e_experience1,0,1,'L');
        $this->SetXY(150,193);
        $this->Cell(60,0,$e_date1,0,1,'L');

        $this->SetXY(150,203);
        $this->MultiCell(60,5,$e_experience2,0,1,'L');
        $this->SetXY(150,216);
        $this->Cell(60,0,$e_date2,0,1,'L');

        $this->SetXY(150,226);
        $this->MultiCell(60,5,$e_experience3,0,1,'L');
        $this->SetXY(150,239);
        $this->Cell(60,0,$e_date3,0,1,'L');

        $this->SetXY(150,249);
        $this->MultiCell(60,5,$e_experience4,0,1,'L');
        $this->SetXY(150,262);
        $this->Cell(60,0,$e_date4,0,1,'L');
    }
    function separator(){
        $this->setFillColor(135,170,202);
        $this->rect(90,205,40,0.3,'F');
        $this->rect(90,235,40,0.3,'F');
        $this->rect(145,165,0.3,100,'F');
        $this->rect(160,199,40,0.3,'F');
        $this->rect(160,222,40,0.3,'F');
        $this->rect(160,245,40,0.3,'F');
    }
    function Loisir(){
        global $loisir1;
        global $loisir2;
        global $loisir3;

        $this->SetFont('Arial','B',15);
        $this->SetXY(85,275);
        $this->setFillColor(135,170,202);
        $this->SetTextColor(255,255,255);
        $this->rect(80,270,$this->w,10,'F');
        $this->Cell(0,0,'Loisir',0,1,'C');

        $this->SetFont('Arial','',12);
        $this->SetTextColor(0,0,0);
        $this->SetXY(85,284);
        $this->Cell(0,0,$loisir1.$loisir2.$loisir3,0,1,'C');
    }
}

//PROFIL
$pdf = new PDF();
$prenom=$infocv[0]->prenom;
$nom=$infocv[0]->nom;
$metier=$infocv[0]->metier;

//CONTACT
$anniversaire=date('d/m/Y',strtotime($infocv[0]->anniversaire));
$adresse=$infocv[0]->adresse;
$ville=$infocv[0]->postale .' '. $infocv[0]->ville;
$telephone=$infocv[0]->telephone;
$mail=$infocv[0]->mail;

//HARDSKILLS
if( !empty($infocv[0]->hardskills)){
    $hardskills1= $infocv[0]->hardskills;
}
else{
    $hardskills1='';
}
if( !empty($infocv[1]->hardskills)){
    $hardskills2= $infocv[1]->hardskills;
}
else{
    $hardskills2='';
}
if( !empty($infocv[2]->hardskills)){
    $hardskill3= $infocv[2]->hardskills;
}
else{
    $hardskills3='';
}
if( !empty($infocv[3]->hardskills)){
    $hardskills4= $infocv[3]->hardskills;
}
else{
    $hardskills4='';
}

//SOFTSKILLS
if( !empty($infocv[0]->softskills)){
    $softskills1= $infocv[0]->softskills;
}
else{
    $softskills1='';
}
if( !empty($infocv[1]->softskills)){
    $softskills2= $infocv[1]->softskills;
}
else{
    $softskills2='';
}
if( !empty($infocv[2]->softskills)){
    $softskill3= $infocv[2]->softskills;
}
else{
    $softskills3='';
}
if( !empty($infocv[3]->softskills)){
    $softskills4= $infocv[3]->softskills;
}
else{
    $softskills4='';
}

//LANGUE
if( !empty($infocv[0]->langue)){
    $langue1= $infocv[0]->langue;
}
else{
    $langue1='';
}
if( !empty($infocv[1]->langue)){
    $langue2= $infocv[1]->langue;
}
else{
    $langue2='';
}
if( !empty($infocv[2]->langue)){
    $langue3= $infocv[2]->langue;
}
else{
    $langue3='';
}

//TEXTE
if( !empty($infocv[0]->motivation)){
    $texte= $infocv[0]->motivation;
}
else{
    $texte='';
}

//FORMATION
if(!empty($infocv[0]->formation)){
    $f_formation1=$infocv[0]->formation;
    $f_ecole1=$infocv[0]->ecole;
    $f_date1='(' . date('Y',strtotime($infocv[0]->date_start_f)) .'-'. date('Y',strtotime($infocv[0]->date_end_f)) .')';
}else{
    $f_formation1=' ';
    $f_ecole1=' ';
    $f_date1=' ';
}
if(!empty($infocv[1]->formation)){
    $f_formation2=$infocv[1]->formation;
    $f_ecole2=$infocv[1]->ecole;
    $f_date2='(' . date('Y',strtotime($infocv[1]->date_start_f)) .'-'. date('Y',strtotime($infocv[1]->date_end_f)) .')';
}else{
    $f_formation2=' ';
    $f_ecole2=' ';
    $f_date2=' ';
}
if(!empty($infocv[2]->formation)){
    $f_formation3=$infocv[2]->formation;
    $f_ecole3=$infocv[2]->ecole;
    $f_date3='(' . date('Y',strtotime($infocv[2]->date_start_f)) .'-'. date('Y',strtotime($infocv[2]->date_end_f)) .')';
}else{
    $f_formation3=' ';
    $f_ecole3=' ';
    $f_date3=' ';
}

//EXPERIENCE
if(!empty($infocv[0]->experience)){
    $e_experience1=$infocv[0]->experience;
    $e_date1='(' . date('Y',strtotime($infocv[0]->date_start_e)).'-'. date('Y',strtotime($infocv[0]->date_end_e)) .')';
}else{
    $e_experience1='';
    $e_date1='';
}
if(!empty($infocv[1]->experience)){
    $e_experience2=$infocv[1]->experience;
    $e_date2='(' . date('Y',strtotime($infocv[1]->date_start_e)).'-'. date('Y',strtotime($infocv[1]->date_end_e)) ;
}else{
    $e_experience2='';
    $e_date2='';
}
if(!empty($infocv[2]->experience)){
    $e_experience3=$infocv[2]->experience;
    $e_date3='(' . date('Y',strtotime($infocv[2]->date_start_e)).'-'. date('Y',strtotime($infocv[2]->date_end_e)) ;
}else{
    $e_experience3='';
    $e_date3='';
}
if(!empty($infocv[3]->experience)){
    $e_experience4=$infocv[3]->experience;
    $e_date4='(' . date('Y',strtotime($infocv[3]->date_start_e)).'-'. date('Y',strtotime($infocv[3]->date_end_e)) ;
}else{
    $e_experience4='';
    $e_date4='';
}

//LOISIR
if( !empty($infocv[0]->loisir)){
    $loisir1= $infocv[0]->loisir;
}
else{
    $loisir1='';
}
if( !empty($infocv[0]->loisir)){
    $loisir2= $infocv[0]->loisir;
}
else{
    $loisir2='';
}
if( !empty($infocv[0]->loisir)){
    $loisir3= $infocv[0]->loisir;
}
else{
    $loisir3='';
}




$pdf->SetAutoPageBreak('off');
$pdf->addPage();
$pdf->BanderoleGauche();
$pdf->HeaderCV();
$pdf->Contact();
$pdf->Hardskills();
$pdf->Softskills();
$pdf->Langue();
$pdf->Profil();
$pdf->Formation();
$pdf->Experience();
$pdf->separator();
$pdf->Loisir();
$pdf->Output();

get_header();

