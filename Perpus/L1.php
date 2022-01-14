<?php
$nama = "Maulana Rafli Kusuma";
$umur = 17;
$sekolah = "SMK Telkom Malang";

echo "Halo,  perkenalkan nama saya ".$nama.", saya berusia ".$umur." tahun. 
Sekarang saya bersekolah di ".$sekolah;
?>
    <br/>
    <br/>
<?php
$teman = "Jamet";
echo $teman;
if($teman == "Jamal"){
    echo ", adalah teman saya";
}else{
    echo ", adalah pacar saya";
}
?>
    <br/>
    <br/>
<?php
$nilai = 43;

if($nilai >90){
    echo "Predikat = A+";
}elseif($nilai >80 and $nilai <=90){
    echo "Predikat = A";
}elseif($nilai >70 and $nilai <=80){
    echo "Predikat = B+";
}elseif($nilai >60 and $nilai <=70){
    echo "Predikat = B";
}elseif($nilai >50 and $nilai <=60){
    echo "Predikat = C+";
}elseif($nilai >40 and $nilai <=50){
    echo "Predikat = C";
}elseif($nilai >30 and $nilai <=40){
    echo "Predikat = D";
}else{
    echo "Predikat = E";
}
?>
