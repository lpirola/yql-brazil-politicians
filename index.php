<?php
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
$url = 'http://divulgacand2010.tse.jus.br/divulgacand2010/candidatoAutoComplete.do?noCandLimpo=&sgUe=%estado%&cdCargo=%cargo%&cdSituacaoCandidato=3&orderBy=cand.NM_CANDIDATO';
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

foreach ($cargos as $id_cargo => $cargo) {
  if (($id_cargo == 1) || ($id_cargo == 2)) {
    $actv_url = str_replace(array('%estado%', '%cargo%'), array('', $id_cargo), $url);
    echo $actv_url."<br />";
  }else {
    foreach ($ufs as $uf) {
      $actv_url = str_replace(array('%estado%', '%cargo%'), array($uf, $id_cargo), $url);
      echo $actv_url."<br />";
    }
  }
}
?>