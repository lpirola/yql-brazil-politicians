<?php
header('Content-Type: text/html; charset=utf-8'); 
require_once('xml2array.php');
require_once('db.php');
require_once('cleanup.php');

$ufs = array("AC"=>"AC",
              "AL"=>"AL",
              "AP"=>"AP",
              "AM"=>"AM",
              "BA"=>"BA",
              "CE"=>"CE",
              "DF"=>"DF",
              "ES"=>"ES",
              "GO"=>"GO",
              "MA"=>"MA",
              "MT"=>"MT",
              "MS"=>"MS",
              "MG"=>"MG",
              "PA"=>"PA",
              "PB"=>"PB",
              "PR"=>"PR",
              "PE"=>"PE",
              "PI"=>"PI",
              "RJ"=>"RJ",
              "RN"=>"RN",
              "RS"=>"RS",
              "RO"=>"RO",
              "RR"=>"RR",
              "SC"=>"SC",
              "SP"=>"SP",
              "SE"=>"SE",
              "TO"=>"TO");
$url = 'http://200.186.60.45/divulgacand2010/candidatoAutoComplete.do?noCandLimpo=&sgUe=%estado%&cdCargo=%cargo%&cdSituacaoCandidato=3&orderBy=cand.NM_CANDIDATO';
$cargos = array(
1=>'Presidente (BR)',
'Vice-Presidente (BR)',
'Governador',
'Vice-Governador',
'Senador',
'Deputado Federal',
'Deputado Estadual',
'Deputado Distrital',
'1º Suplente Senador',
'2º Suplente Senador'
);
$actv_url = array();
foreach ($cargos as $id_cargo => $cargo) {
  if (($id_cargo == 1) || ($id_cargo == 2)) {
    $actv_url[] = array(str_replace(array('%estado%', '%cargo%'), array('BR', $id_cargo), $url), $uf, $id_cargo);
  }else {
    foreach ($ufs as $uf) {
      $actv_url[] = array(str_replace(array('%estado%', '%cargo%'), array($uf, $id_cargo), $url), $uf, $id_cargo);
    }
  }
}
$mysqli->query("set names 'utf8'");

foreach ($actv_url as $link) {
  // create curl resource
  $ch = curl_init();

  // set url
  curl_setopt($ch, CURLOPT_URL, $link[0]);

  //return the transfer as a string
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  // $output contains the output string
  $xml = curl_exec($ch);

  // close curl resource to free up system resources
  curl_close($ch);
  
  //echo $link[0]."\n";
  $arr = xml2array($xml);

  $arr['response']['cargo'] = array();
  $arr['response']['cargo'] = array_pad($arr['response']['cargo'], count($arr['response']['sqCand']), $link[2]);
  $pol = $arr['response'];
  for($i=0; $i<count($pol['sqCand']);$i++) {
    $sql = "INSERT INTO politicos (sqCand,sgUe,name,name_urna,numero,situacao,partido,coligacao,cargo) VALUES (".cleanUp($pol['sqCand'][$i]).", '".cleanUp($pol['sgUe'][$i])."', '".cleanUp($pol['name'][$i])."', '".cleanUp($pol['name_urna'][$i])."', '".cleanUp($pol['numero'][$i])."', '".cleanUp($pol['situacao'][$i])."', '".cleanUp($pol['partido'][$i])."', '".cleanUp($pol['coligacao'][$i])."', '".cleanUp($pol['cargo'][$i])."');";
    //echo $sql;
    if (!$mysqli->query($sql)) {
        printf("URL - SQL: %s\n", $link[0]." - ".$sql);
    }
  }
}
?>