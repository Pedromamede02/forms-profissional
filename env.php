<?php 

  if(isset($_POST['submit']))
{ 

    print_r($_POST['nome']);

  include_once('/Teste-Profissional/conn.php');

$nome= $_POST['nome'];
$sobrenome= $_POST['sobrenome'];
$email= $_POST['email'];
$contato= $_POST['contato'];

$insere=mysqli_query($conn, "INSERT INTO 1(nome,sobrenome,email,contato) values ('$nome','$sobrenome','$email','$contato',')");

}
//1 form
 
if(isset($_POST['submit']))
{ 
  include_once('conn.php');

$resp1= $_POST['avaliacao1'];
$resp2= $_POST['avaliacao2'];
$resp3= $_POST['avaliacao3'];
$resp4= $_POST['avaliacao4'];
$resp5= $_POST['avaliacao5'];
$resp6= $_POST['avaliacao6'];
$resp7= $_POST['avaliacao7'];
$resp8= $_POST['avaliacao8'];


$insere=mysqli_query($conn, "INSERT INTO form1(avaliacao1,avaliacao2,avaliacao3,avaliacao4,avaliacao5,avaliacao6,avaliacao7,avaliacao8) values ('$resp1','$resp2','$resp3','$resp4','$resp5','$resp6','$resp7','$resp8')");
}
// 2 form

 
if(isset($_POST['submit']))
{ 
  include_once('conn.php');

$resp9= $_POST['resp9'];
$resp10= $_POST['resp10'];
$resp11= $_POST['resp11'];
$resp12= $_POST['resp12'];
$resp13= $_POST['resp13'];
$resp14= $_POST['resp14'];
$resp15= $_POST['resp15'];
$resp16= $_POST['resp16'];


$insere=mysqli_query($conn, "INSERT INTO form2(resp9,resp10,resp11,resp12,resp13,resp14,resp15,resp16) values ('$resp9','$resp10','$resp11','$resp12','$resp13','$resp14','$resp15','$resp16')");
}

//form3

if(isset($_POST['submit']))
{ 
  include_once('conn.php');

$resp17= $_POST['resp17'];
$resp18= $_POST['resp18'];
$resp19= $_POST['resp19'];
$resp20= $_POST['resp20'];
$resp21= $_POST['resp21'];
$resp22= $_POST['resp22'];
$resp23= $_POST['resp23'];
$resp24= $_POST['resp24'];


$insere=mysqli_query($conn, "INSERT INTO form3(resp17,resp18,resp19,resp20,resp21,resp22,resp23,resp24) values ('$resp17','$resp18','$resp19','$resp20','$resp21','$resp22','$resp23','$resp24')");
}
//form 4

if(isset($_POST['submit']))
{ 
  include_once('conn.php');

$resp25= $_POST['resp25'];
$resp26= $_POST['resp26'];
$resp27= $_POST['resp27'];
$resp28= $_POST['resp28'];
$resp29= $_POST['resp29'];
$resp30= $_POST['resp30'];
$resp31= $_POST['resp31'];
$resp32= $_POST['resp32'];


$insere=mysqli_query($conn, "INSERT INTO form4(resp25,resp26,resp27,resp28,resp29,resp30,resp31,resp32) values ('$resp25','$resp26','$resp27','$resp28','$resp29','$resp30','$resp31','$resp32')");
}

// form 5

if(isset($_POST['submit']))
{ 
  include_once('conn.php');

$resp33= $_POST['resp33'];
$resp34= $_POST['resp34'];
$resp35= $_POST['resp35'];
$resp36= $_POST['resp36'];
$resp37= $_POST['resp37'];
$resp38= $_POST['resp38'];
$resp39= $_POST['resp39'];
$resp40= $_POST['resp40'];


$insere=mysqli_query($conn, "INSERT INTO form5(resp33,resp34,resp35,resp36,resp37,resp38,resp39,resp40) values ('$resp33','$resp34','$resp35','$resp36','$resp37','$resp38','$resp39','$resp40')");

}
// form 6

if(isset($_POST['submit']))
{ 
  include_once('conn.php');

$resp41= $_POST['resp41'];
$resp42= $_POST['resp42'];
$resp43= $_POST['resp43'];
$resp44= $_POST['resp44'];
$resp45= $_POST['resp45'];
$resp46= $_POST['resp46'];
$resp47= $_POST['resp47'];
$resp48= $_POST['resp48'];


$insere=mysqli_query($conn, "INSERT INTO form6(resp41,resp42,resp43,resp44,resp45,resp46,resp47,resp48) values ('$resp41','$resp42','$resp43','$resp44','$resp45','$resp46','$resp47','$resp48')");
}

//form7
 
if(isset($_POST['submit']))
{ 
  include_once('conn.php');

$resp49= $_POST['resp49'];
$resp50= $_POST['resp50'];
$resp51= $_POST['resp51'];
$resp52= $_POST['resp52'];
$resp53= $_POST['resp53'];
$resp54= $_POST['resp54'];
$resp55= $_POST['resp55'];
$resp56= $_POST['resp56'];


$insere=mysqli_query($conn, "INSERT INTO form7(resp49,resp50,resp51,resp52,resp53,resp54,resp55,resp56) values ('$resp49','$resp50','$resp51','$resp52','$resp53','$resp54','$resp55','$resp56')");
}
?>

