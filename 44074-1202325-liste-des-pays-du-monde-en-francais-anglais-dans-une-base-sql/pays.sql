/*
Export créé par Alexandre VAL aka Joe Le Mort
Tuxboard.com
*/


DROP TABLE IF EXISTS `countrys`;

CREATE TABLE `countrys` (
  `id` int(11) NOT NULL auto_increment,
  `country` varchar(2) NOT NULL,
  `fr` varchar(255) NOT NULL,
  `en` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `countrys` */

insert into `countrys` (`id`,`country`,`fr`,`en`) values (1,'AF','Afghanistan','Afghanistan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (2,'ZA','Afrique du Sud','South Africa');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (3,'AL','Albanie','Albania');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (4,'DZ','Algérie','Algeria');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (5,'DE','Allemagne','Germany');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (6,'AD','Andorre','Andorra');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (7,'AO','Angola','Angola');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (8,'AI','Anguilla','Anguilla');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (9,'AQ','Antarctique','Antarctica');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (10,'AG','Antigua-et-Barbuda','Antigua & Barbuda');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (11,'AN','Antilles néerlandaises','Netherlands Antilles');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (12,'SA','Arabie saoudite','Saudi Arabia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (13,'AR','Argentine','Argentina');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (14,'AM','Arménie','Armenia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (15,'AW','Aruba','Aruba');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (16,'AU','Australie','Australia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (17,'AT','Autriche','Austria');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (18,'AZ','Azerbaïdjan','Azerbaijan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (19,'BJ','Bénin','Benin');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (20,'BS','Bahamas','Bahamas, The');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (21,'BH','Bahreïn','Bahrain');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (22,'BD','Bangladesh','Bangladesh');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (23,'BB','Barbade','Barbados');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (24,'PW','Belau','Palau');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (25,'BE','Belgique','Belgium');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (26,'BZ','Belize','Belize');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (27,'BM','Bermudes','Bermuda');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (28,'BT','Bhoutan','Bhutan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (29,'BY','Biélorussie','Belarus');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (30,'MM','Birmanie','Myanmar (ex-Burma)');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (31,'BO','Bolivie','Bolivia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (32,'BA','Bosnie-Herzégovine','Bosnia and Herzegovina');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (33,'BW','Botswana','Botswana');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (34,'BR','Brésil','Brazil');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (35,'BN','Brunei','Brunei Darussalam');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (36,'BG','Bulgarie','Bulgaria');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (37,'BF','Burkina Faso','Burkina Faso');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (38,'BI','Burundi','Burundi');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (39,'CI','Côte d\'Ivoire','Ivory Coast (see Cote d\'Ivoire)');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (40,'KH','Cambodge','Cambodia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (41,'CM','Cameroun','Cameroon');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (42,'CA','Canada','Canada');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (43,'CV','Cap-Vert','Cape Verde');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (44,'CL','Chili','Chile');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (45,'CN','Chine','China');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (46,'CY','Chypre','Cyprus');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (47,'CO','Colombie','Colombia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (48,'KM','Comores','Comoros');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (49,'CG','Congo','Congo');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (50,'KP','Corée du Nord','Korea, Demo. People\'s Rep. of');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (51,'KR','Corée du Sud','Korea, (South) Republic of');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (52,'CR','Costa Rica','Costa Rica');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (53,'HR','Croatie','Croatia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (54,'CU','Cuba','Cuba');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (55,'DK','Danemark','Denmark');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (56,'DJ','Djibouti','Djibouti');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (57,'DM','Dominique','Dominica');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (58,'EG','Égypte','Egypt');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (59,'AE','Émirats arabes unis','United Arab Emirates');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (60,'EC','Équateur','Ecuador');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (61,'ER','Érythrée','Eritrea');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (62,'ES','Espagne','Spain');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (63,'EE','Estonie','Estonia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (64,'US','États-Unis','United States');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (65,'ET','Éthiopie','Ethiopia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (66,'FI','Finlande','Finland');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (67,'FR','France','France');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (68,'GE','Géorgie','Georgia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (69,'GA','Gabon','Gabon');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (70,'GM','Gambie','Gambia, the');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (71,'GH','Ghana','Ghana');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (72,'GI','Gibraltar','Gibraltar');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (73,'GR','Grèce','Greece');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (74,'GD','Grenade','Grenada');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (75,'GL','Groenland','Greenland');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (76,'GP','Guadeloupe','Guinea, Equatorial');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (77,'GU','Guam','Guam');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (78,'GT','Guatemala','Guatemala');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (79,'GN','Guinée','Guinea');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (80,'GQ','Guinée équatoriale','Equatorial Guinea');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (81,'GW','Guinée-Bissao','Guinea-Bissau');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (82,'GY','Guyana','Guyana');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (83,'GF','Guyane française','Guiana, French');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (84,'HT','Haïti','Haiti');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (85,'HN','Honduras','Honduras');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (86,'HK','Hong Kong','Hong Kong, (China)');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (87,'HU','Hongrie','Hungary');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (88,'BV','Ile Bouvet','Bouvet Island');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (89,'CX','Ile Christmas','Christmas Island');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (90,'NF','Ile Norfolk','Norfolk Island');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (91,'KY','Iles Cayman','Cayman Islands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (92,'CK','Iles Cook','Cook Islands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (93,'FO','Iles Féroé','Faroe Islands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (94,'FK','Iles Falkland','Falkland Islands (Malvinas)');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (95,'FJ','Iles Fidji','Fiji');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (96,'GS','Iles Géorgie du Sud et Sandwich du Sud','S. Georgia and S. Sandwich Is.');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (97,'HM','Iles Heard et McDonald','Heard and McDonald Islands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (98,'MH','Iles Marshall','Marshall Islands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (99,'PN','Iles Pitcairn','Pitcairn Island');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (100,'SB','Iles Salomon','Solomon Islands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (101,'SJ','Iles Svalbard et Jan Mayen','Svalbard and Jan Mayen Islands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (102,'TC','Iles Turks-et-Caicos','Turks and Caicos Islands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (103,'VI','Iles Vierges américaines','Virgin Islands, U.S.');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (104,'VG','Iles Vierges britanniques','Virgin Islands, British');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (105,'CC','Iles des Cocos (Keeling)','Cocos (Keeling) Islands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (106,'UM','Iles mineures éloignées des États-Unis','US Minor Outlying Islands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (107,'IN','Inde','India');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (108,'ID','Indonésie','Indonesia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (109,'IR','Iran','Iran, Islamic Republic of');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (110,'IQ','Iraq','Iraq');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (111,'IE','Irlande','Ireland');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (112,'IS','Islande','Iceland');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (113,'IL','Israël','Israel');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (114,'IT','Italie','Italy');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (115,'JM','Jamaïque','Jamaica');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (116,'JP','Japon','Japan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (117,'JO','Jordanie','Jordan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (118,'KZ','Kazakhstan','Kazakhstan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (119,'KE','Kenya','Kenya');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (120,'KG','Kirghizistan','Kyrgyzstan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (121,'KI','Kiribati','Kiribati');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (122,'KW','Koweït','Kuwait');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (123,'LA','Laos','Lao People\'s Democratic Republic');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (124,'LS','Lesotho','Lesotho');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (125,'LV','Lettonie','Latvia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (126,'LB','Liban','Lebanon');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (127,'LR','Liberia','Liberia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (128,'LY','Libye','Libyan Arab Jamahiriya');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (129,'LI','Liechtenstein','Liechtenstein');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (130,'LT','Lituanie','Lithuania');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (131,'LU','Luxembourg','Luxembourg');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (132,'MO','Macao','Macao, (China)');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (133,'MG','Madagascar','Madagascar');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (134,'MY','Malaisie','Malaysia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (135,'MW','Malawi','Malawi');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (136,'MV','Maldives','Maldives');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (137,'ML','Mali','Mali');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (138,'MT','Malte','Malta');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (139,'MP','Mariannes du Nord','Northern Mariana Islands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (140,'MA','Maroc','Morocco');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (141,'MQ','Martinique','Martinique');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (142,'MU','Maurice','Mauritius');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (143,'MR','Mauritanie','Mauritania');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (144,'YT','Mayotte','Mayotte');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (145,'MX','Mexique','Mexico');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (146,'FM','Micronésie','Micronesia, Federated States of');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (147,'MD','Moldavie','Moldova, Republic of');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (148,'MC','Monaco','Monaco');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (149,'MN','Mongolie','Mongolia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (150,'MS','Montserrat','Montserrat');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (151,'MZ','Mozambique','Mozambique');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (152,'NP','Népal','Nepal');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (153,'NA','Namibie','Namibia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (154,'NR','Nauru','Nauru');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (155,'NI','Nicaragua','Nicaragua');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (156,'NE','Niger','Niger');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (157,'NG','Nigeria','Nigeria');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (158,'NU','Nioué','Niue');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (159,'NO','Norvège','Norway');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (160,'NC','Nouvelle-Calédonie','New Caledonia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (161,'NZ','Nouvelle-Zélande','New Zealand');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (162,'OM','Oman','Oman');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (163,'UG','Ouganda','Uganda');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (164,'UZ','Ouzbékistan','Uzbekistan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (165,'PE','Pérou','Peru');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (166,'PK','Pakistan','Pakistan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (167,'PA','Panama','Panama');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (168,'PG','Papouasie-Nouvelle-Guinée','Papua New Guinea');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (169,'PY','Paraguay','Paraguay');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (170,'NL','countrys-Bas','Netherlands');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (171,'PH','Philippines','Philippines');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (172,'PL','Pologne','Poland');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (173,'PF','Polynésie française','French Polynesia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (174,'PR','Porto Rico','Puerto Rico');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (175,'PT','Portugal','Portugal');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (176,'QA','Qatar','Qatar');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (177,'CF','République centrafricaine','Central African Republic');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (178,'CD','République démocratique du Congo','Congo, Democratic Rep. of the');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (179,'DO','République dominicaine','Dominican Republic');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (180,'CZ','République tchèque','Czech Republic');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (181,'RE','Réunion','Reunion');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (182,'RO','Roumanie','Romania');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (183,'GB','Royaume-Uni','Saint Pierre and Miquelon');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (184,'RU','Russie','Russia (Russian Federation)');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (185,'RW','Rwanda','Rwanda');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (186,'SN','Sénégal','Senegal');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (187,'EH','Sahara occidental','Western Sahara');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (188,'KN','Saint-Christophe-et-Niévès','Saint Kitts and Nevis');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (189,'SM','Saint-Marin','San Marino');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (190,'PM','Saint-Pierre-et-Miquelon','Saint Pierre and Miquelon');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (191,'VA','Saint-Siège ','Vatican City State (Holy See)');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (192,'VC','Saint-Vincent-et-les-Grenadines','Saint Vincent and the Grenadines');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (193,'SH','Sainte-Hélène','Saint Helena');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (194,'LC','Sainte-Lucie','Saint Lucia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (195,'SV','Salvador','El Salvador');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (196,'WS','Samoa','Samoa');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (197,'AS','Samoa américaines','American Samoa');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (198,'ST','Sao Tomé-et-Principe','Sao Tome and Principe');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (199,'SC','Seychelles','Seychelles');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (200,'SL','Sierra Leone','Sierra Leone');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (201,'SG','Singapour','Singapore');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (202,'SI','Slovénie','Slovenia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (203,'SK','Slovaquie','Slovakia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (204,'SO','Somalie','Somalia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (205,'SD','Soudan','Sudan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (206,'LK','Sri Lanka','Sri Lanka (ex-Ceilan)');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (207,'SE','Suède','Sweden');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (208,'CH','Suisse','Switzerland');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (209,'SR','Suriname','Suriname');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (210,'SZ','Swaziland','Swaziland');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (211,'SY','Syrie','Syrian Arab Republic');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (212,'TW','Taïwan','Taiwan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (213,'TJ','Tadjikistan','Tajikistan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (214,'TZ','Tanzanie','Tanzania, United Republic of');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (215,'TD','Tchad','Chad');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (216,'TF','Terres australes françaises','French Southern Territories - TF');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (217,'IO','Territoire britannique de l\'Océan Indien','British Indian Ocean Territory');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (218,'TH','Thaïlande','Thailand');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (219,'TL','Timor Oriental','Timor-Leste (East Timor)');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (220,'TG','Togo','Togo');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (221,'TK','Tokélaou','Tokelau');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (222,'TO','Tonga','Tonga');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (223,'TT','Trinité-et-Tobago','Trinidad & Tobago');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (224,'TN','Tunisie','Tunisia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (225,'TM','Turkménistan','Turkmenistan');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (226,'TR','Turquie','Turkey');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (227,'TV','Tuvalu','Tuvalu');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (228,'UA','Ukraine','Ukraine');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (229,'UY','Uruguay','Uruguay');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (230,'VU','Vanuatu','Vanuatu');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (231,'VE','Venezuela','Venezuela');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (232,'VN','Viêt Nam','Viet Nam');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (233,'WF','Wallis-et-Futuna','Wallis and Futuna');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (234,'YE','Yémen','Yemen');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (235,'YU','Yougoslavie','Saint Pierre and Miquelon');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (236,'ZM','Zambie','Zambia');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (237,'ZW','Zimbabwe','Zimbabwe');
insert into `countrys` (`id`,`country`,`fr`,`en`) values (238,'MK','ex-République yougoslave de Macédoine','Macedonia, TFYR');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
