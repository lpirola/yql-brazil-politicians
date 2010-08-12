/*select a.name, b.name, a.name_urna, b.name_urna from politicos a left join politicos b*/


update  politicos set `partido` = 1
where partido = 'PT';
update  politicos set `partido` = 2
where partido = 'PCB';
update  politicos set `partido` = 3
where partido = 'PRTB';
update  politicos set `partido` = 4
where partido = 'PSTU';
update  politicos set `partido` = 5
where partido = 'PSDC';
update  politicos set `partido` = 6
where partido = 'PSDB';
update  politicos set `partido` = 7
where partido = 'PV';
update  politicos set `partido` = 8
where partido = 'PSOL';
update  politicos set `partido` = 9
where partido = 'PCO';
update  politicos set `partido` = 10
where partido = 'DEM';
update  politicos set `partido` = 11
where partido = 'PMDB';
update  politicos set `partido` = 12
where partido = 'PTB';
update  politicos set `partido` = 13
where partido = 'PDT';
update  politicos set `partido` = 14
where partido = 'PSB';
update  politicos set `partido` = 16
where partido = 'PP';
update  politicos set `partido` = 17
where partido = 'PR';
update  politicos set `partido` = 18
where partido = 'PPS';
update  politicos set `partido` = 19
where partido = 'PMN';
update  politicos set `partido` = 20
where partido = 'PSC';
update  politicos set `partido` = 21
where partido = 'PSL';
update  politicos set `partido` = 22
where partido = 'PC do B';
update  politicos set `partido` = 23
where partido = 'PTC';
update  politicos set `partido` = 24
where partido = 'PRP';
update  politicos set `partido` = 25
where partido = 'PHS';
update  politicos set `partido` = 26
where partido = 'PRB';
update  politicos set `partido` = 27
where partido = 'PTN';
update  politicos set `partido` = 28
where partido = 'PT do B';
/********** ************/
update  politicos set `situacao` = 11
where situacao = 'Falecido';

update  politicos set `situacao` = 10
where situacao = 'Não conhecimento do pedido';

update  politicos set `situacao` = 9
where situacao = 'Com notícia de inelegibilidade';

update  politicos set `situacao` = 8
where situacao = 'Renúncia';

update  politicos set `situacao` = 7
where situacao = 'Deferido com recurso';

update  politicos set `situacao` = 6
where situacao = 'Com impugnação';

update  politicos set `situacao` = 5
where situacao = 'Cancelado';

update  politicos set `situacao` = 4
where situacao = 'Indeferido com recurso';

update  politicos set `situacao` = 3
where situacao = 'Indeferido';

update  politicos set `situacao` = 2
where situacao = 'Aguardando Julgamento';

update  politicos set `situacao` = 1
where situacao = 'Deferido';

INSERT INTO `politicians`
(`id`,`num_candidate`, 'uf', `name`,`name_urna`,`number_urna`,`political_situation_id`,`party_politic_id`,`coligacao`,`political_position_id`)
