<?php

/**
 * Template Name: CVPDF
 */

require('fpdf/fpdf.php');

global $wpdb;
$id = $_GET['id'];
//$user = "SELECT *
//       FROM canview_cv AS cv
//       LEFT JOIN canview_formation AS cf
//       ON cv.id=cf.id_cv
//       LEFT JOIN canview_experience AS ce
//       ON cv.id=ce.id_cv
//       LEFT JOIN canview_passerelle_hardskills AS ph
//       ON cv.id=ph.id_cv
//       LEFT JOIN canview_hardskills AS ch
//       ON ph.id_hardskills=ch.id
//       LEFT JOIN canview_passerelle_softskills AS ps
//       ON cv.id=ps.id_cv
//       LEFT JOIN canview_softskills AS cs
//       ON ps.id_softskills=cs.id
//       LEFT JOIN canview_passerelle_langue AS pl
//       ON cv.id=pl.id_cv
//       LEFT JOIN canview_langue AS cl
//       ON pl.id_langue=cl.id
//       LEFT JOIN canview_loisir AS clo
//       ON cv.id=clo.id_cv
//       WHERE cv.id_user=$id
//;";
$user="SELECT * FROM canview_cv WHERE id_user=$id";
$infocv = $wpdb->get_results(
    $user
);

$idcv= $infocv[0]->id;

$hs="SELECT ch.hardskills FROM canview_passerelle_hardskills AS pas
             LEFT JOIN canview_hardskills AS ch
             ON pas.id_hardskills=ch.id
             WHERE pas.id_cv = $idcv;
             ";

$hardskills = $wpdb->get_results(
    $hs
);

$ss="SELECT cs.softskills FROM canview_passerelle_softskills AS pas
             LEFT JOIN canview_softskills AS cs
             ON pas.id_softskills=cs.id
             WHERE pas.id_cv = $idcv;
             ";

$softskills = $wpdb->get_results(
    $ss
);

$l="SELECT cl.langue FROM canview_passerelle_langue AS pas
             LEFT JOIN canview_langue AS cl
             ON pas.id_langue=cl.id
             WHERE pas.id_cv = $idcv;
             ";

$langue = $wpdb->get_results(
    $l
);

$for="SELECT formation FROM canview_formation WHERE id_cv=$idcv";
$formation = $wpdb->get_results(
    $for
);

$exp="SELECT experience FROM canview_experience WHERE id_cv=$idcv";
$experience = $wpdb->get_results(
    $exp
);

$loi="SELECT loisir FROM canview_loisir WHERE id_cv=$idcv";
$loisir = $wpdb->get_results(
    $loi
);


//debug($infocv);
//debug(path('/'));

class PDF extends FPDF
{
    function BanderoleGauche()
    {
        global $photo;
        $this->setFillColor(150, 210, 217);
        $this->rect(0, 0, 75, $this->h, 'F');
        $this->Image(path('/')."/app/uploads/user_profil/$photo",7.5,7.5,60,65,'JPG');
    }

    function HeaderCV()
    {
        global $prenom;
        global $nom;
        global $metier;
        $this->setFillColor(135, 170, 202);
        $this->rect(80, 0, $this->w, 72.5, 'F');

        $this->SetFont('Arial', 'B', 25);
        $this->SetXY(85, 20);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(0, 0, $prenom, 0, 1, 'C');

        $w = $this->GetStringWidth($nom) + 6;
        $this->SetXY(85, 30);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(0, 0, $nom, 0, 1, 'C');

        $this->setFillColor(255, 255, 255);
        $this->rect(120, 42, 45, 0.5, 'F');

        $this->SetFont('Arial', '', 20);
        $this->SetXY(85, 55);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(0, 0, $metier, 0, 1, 'C');
    }

    function Contact()
    {
        global $anniversaire;
        global $adresse;
        global $ville;
        global $telephone;
        global $mail;

        $this->SetFont('Arial', 'B', 15);
        $this->SetXY(7.5, 85);
        $this->setFillColor(135, 170, 202);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(60, 10, 'Contact', 0, 1, 'C', true);

        $this->setFillColor(150, 210, 217);
        $this->SetFont('Arial', '', 12);
        $this->SetXY(15, 100);
        $this->Cell(0, 0, $anniversaire, 0, 1, 'L');
                $this->Image(path('/')."app/themes/can_view/asset/imgCV/gateau_anniversaire.png",7.5,97,5,5,'PNG');

        $this->SetXY(15, 110);
        $this->Cell(60, 0, $adresse, 0, 1, 'L');
        $this->SetXY(15, 118);
        $this->Cell(60, 0, $ville, 0, 1, 'L');
        $this->Image(path('/')."app/themes/can_view/asset/imgCV/adresse.png",7.5,106,5,7,'PNG');

        $this->SetXY(15, 128);
        $this->Cell(0, 0, $telephone, 0, 1, 'L');
        $this->Image(path('/')."app/themes/can_view/asset/imgCV/telephone.png",7.5,125,5,5,'PNG');

        $this->SetXY(15, 135);
        $this->MultiCell(60, 5, $mail, 0, 1, 'L');
        $this->Image(path('/')."app/themes/can_view/asset/imgCV/mail.png",7.5,135,5,5,'PNG');
    }

    function Hardskills()
    {
        global $hardskills1;
        global $hardskills2;
        global $hardskills3;
        global $hardskills4;
        $this->SetFont('Arial', 'B', 15);
        $this->SetXY(7.5, 150);
        $this->setFillColor(135, 170, 202);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(60, 10, 'Hardskills', 0, 1, 'C', true);

        $this->SetFont('Arial', '', 12);
        $this->SetXY(7.5, 165);
        $this->Cell(60, 0, $hardskills1, 0, 1, 'C');
        $this->SetXY(7.5, 172);
        $this->Cell(60, 0, $hardskills2, 0, 1, 'C');
        $this->SetXY(7.5, 179);
        $this->Cell(60, 0, $hardskills3, 0, 1, 'C');
        $this->SetXY(7.5, 186);
        $this->Cell(60, 0, $hardskills4, 0, 1, 'C');
    }

    function Softskills()
    {
        global $softskills1;
        global $softskills2;
        global $softskills3;
        global $softskills4;
        $this->SetFont('Arial', 'B', 15);
        $this->SetXY(7.5, 195);
        $this->setFillColor(135, 170, 202);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(60, 10, 'Softskills', 0, 1, 'C', true);

        $this->SetFont('Arial', '', 12);
        $this->SetXY(7.5, 210);
        $this->Cell(60, 0, $softskills1, 0, 1, 'C');
        $this->SetXY(7.5, 217);
        $this->Cell(60, 0, $softskills2, 0, 1, 'C');
        $this->SetXY(7.5, 224);
        $this->Cell(60, 0, $softskills3, 0, 1, 'C');
        $this->SetXY(7.5, 231);
        $this->Cell(60, 0, $softskills4, 0, 1, 'C');
    }

    function Langue()
    {
        global $langue1;
        global $langue2;
        global $langue3;

        $this->SetFont('Arial', 'B', 15);
        $this->SetXY(7.5, 245);
        $this->setFillColor(135, 170, 202);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(60, 10, 'Langues', 0, 1, 'C', true);

        $this->SetFont('Arial', '', 12);
        $this->SetXY(7.5, 260);
        $this->Cell(60, 0, $langue1, 0, 1, 'C');
        $this->SetXY(7.5, 266);
        $this->Cell(60, 0, $langue2, 0, 1, 'C');
        $this->SetXY(7.5, 273);
        $this->Cell(60, 0, $langue3, 0, 1, 'C');
    }

    function profil()
    {
        global $texte;

        $this->SetFont('Arial', 'B', 15);
        $this->SetXY(85, 90);
        $this->setFillColor(135, 170, 202);
        $this->SetTextColor(255, 255, 255);
        $this->rect(80, 85, $this->w, 10, 'F');
        $this->Cell(0, 0, 'Profil', 0, 1, 'C');

        $this->SetFont('Arial', '', 12);
        $this->SetXY(80, 100);
        $this->setFillColor(255, 255, 255);
        $this->SetTextColor(0, 0, 0);
        $this->MultiCell(125, 6, $texte, 0, 1, 'F');

        $this->setFillColor(0, 0, 0);
        $this->rect(100, 155, 90, 0.3, 'F');
    }

    function Formation()
    {
        global $f_formation1;

        global $f_formation2;

        global $f_formation3;

        $this->SetFont('Arial', 'B', 15);
        $this->SetXY(80, 165);
        $this->setFillColor(135, 170, 202);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(60, 10, 'Formation', 0, 1, 'C', true);

        $this->SetFont('Arial','',12);
        $this->SetXY(80,180);
        $this->setFillColor(255,255,255);
        $this->SetTextColor(0,0,0);
        $this->MultiCell(60,5,$f_formation1.', ',0,1,'L');

        $this->SetXY(80,210);
        $this->MultiCell(60,5,$f_formation2.', ',0,1,'L');

        $this->SetXY(80,240);
        $this->MultiCell(60,5,$f_formation3.', ',0,1,'L');
    }
//
    function experience()
    {
        global $e_experience1;

        global $e_experience2;

        global $e_experience3;

        global $e_experience4;


        $this->SetFont('Arial', 'B', 15);
        $this->SetXY(150, 165);
        $this->setFillColor(135, 170, 202);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(60, 10, 'Experience', 0, 1, 'C', true);

        $this->SetFont('Arial','',12);
        $this->SetXY(150,180);
        $this->setFillColor(255,255,255);
        $this->SetTextColor(0,0,0);
        $this->MultiCell(60,5,$e_experience1,0,1,'L');

        $this->SetXY(150,203);
        $this->MultiCell(60,5,$e_experience2,0,1,'L');

        $this->SetXY(150,226);
        $this->MultiCell(60,5,$e_experience3,0,1,'L');

        $this->SetXY(150,249);
        $this->MultiCell(60,5,$e_experience4,0,1,'L');
    }
    function separator()
    {
        $this->setFillColor(135, 170, 202);
        $this->rect(90, 205, 40, 0.3, 'F');
        $this->rect(90, 235, 40, 0.3, 'F');
        $this->rect(145, 165, 0.3, 100, 'F');
        $this->rect(160, 199, 40, 0.3, 'F');
        $this->rect(160, 222, 40, 0.3, 'F');
        $this->rect(160, 245, 40, 0.3, 'F');
    }
    function Loisir()
    {
        global $loisir1;
        global $loisir2;
        global $loisir3;

        $this->SetFont('Arial', 'B', 15);
        $this->SetXY(85, 275);
        $this->setFillColor(135, 170, 202);
        $this->SetTextColor(255, 255, 255);
        $this->rect(80, 270, $this->w, 10, 'F');
        $this->Cell(0, 0, 'Loisir', 0, 1, 'C');

        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0, 0, 0);
        $this->SetXY(85, 284);
        $this->Cell(0, 0, $loisir1 . $loisir2 . $loisir3, 0, 1, 'C');
    }
}
//
//PROFIL
$pdf = new PDF();
$prenom = $infocv[0]->prenom;
$nom = $infocv[0]->nom;
$photo = $infocv[0]->photo;
$metier = $infocv[0]->metier;

//CONTACT
$anniversaire = date('d/m/Y', strtotime($infocv[0]->anniversaire));
$adresse = $infocv[0]->adresse;
$ville = $infocv[0]->postale . ' ' . $infocv[0]->ville;
$telephone = $infocv[0]->telephone;
$mail = $infocv[0]->mail;

//HARDSKILLS
if (!empty($hardskills[0]->hardskills)) {
    $hardskills1 = $hardskills[0]->hardskills;
} else {
    $hardskills1 = '';
}
if (!empty($hardskills[1]->hardskills)) {
    $hardskills2 = $hardskills[1]->hardskills;
} else {
    $hardskills2 = '';
}
if (!empty($hardskills[2]->hardskills)) {
    $hardskills3 = $hardskills[2]->hardskills;
} else {
    $hardskills3 = '';
}
if (!empty($hardskills[3]->hardskills)) {
    $hardskills4 = $hardskills[3]->hardskills;
} else {
    $hardskills4 = '';
}

//SOFTSKILLS
if (!empty($softskills[0]->softskills)) {
    $softskills1 = $softskills[0]->softskills;
} else {
    $softskills1 = '';
}
if (!empty($softskills[1]->softskills)) {
    $softskills2 = $softskills[1]->softskills;
} else {
    $softskills2 = '';
}
if (!empty($softskills[2]->softskills)) {
    $softskills3 = $softskills[2]->softskills;
} else {
    $softskills3 = '';
}
if (!empty($softskills[3]->softskills)) {
    $softskills4 = $softskills[3]->softskills;
} else {
    $softskills4 = '';
}

//LANGUE
if (!empty($langue[0]->langue)) {
    $langue1 = $langue[0]->langue;
} else {
    $langue1 = '';
}
if (!empty($langue[1]->langue)) {
    $langue2 = $langue[1]->langue;
} else {
    $langue2 = '';
}
if (!empty($langue[2]->langue)) {
    $langue3 = $langue[2]->langue;
} else {
    $langue3 = '';
}

//TEXTE
if (!empty($infocv[0]->motivation)) {
    $texte = $infocv[0]->motivation;
} else {
    $texte = '';
}

//FORMATION
if(!empty($formation[0]->formation)){
    $f_formation1=$formation[0]->formation;
}else{
    $f_formation1=' ';
}
if(!empty($formation[1]->formation)){
    $f_formation2=$formation[1]->formation;
}else{
    $f_formation2=' ';
}
if(!empty($formation[2]->formation)){
    $f_formation3=$formation[2]->formation;
}else{
    $f_formation3='';
}

//EXPERIENCE
if(!empty($experience[0]->experience)){
    $e_experience1=$experience[0]->experience;
}else{
    $e_experience1='';
}
if(!empty($experience[1]->experience)){
    $e_experience2=$experience[1]->experience;
}else{
    $e_experience2='';
}
if(!empty($experience[2]->experience)){
    $e_experience3=$experience[2]->experience;
}else{
    $e_experience3='';
}
if(!empty($experience[3]->experience)){
    $e_experience4=$experience[3]->experience;
}else{
    $e_experience4='';
}

//LOISIR
if (!empty($loisir[0]->loisir)) {
    $loisir1 = $loisir[0]->loisir.' / ';
} else {
    $loisir1 = '';
}
if (!empty($loisir[1]->loisir)) {
    $loisir2 = $loisir[1]->loisir.' / ';
} else {
    $loisir2 = '';
}
if (!empty($loisir[2]->loisir)) {
    $loisir3 = $loisir[2]->loisir;
} else {
    $loisir3 = '';
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
