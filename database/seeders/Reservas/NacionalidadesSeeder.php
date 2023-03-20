<?php

namespace Database\Seeders\Reservas;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NacionalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        DB::statement("SET sql_mode = '' ");

        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Afganistán','AFGANA','AFG')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Albania','ALBANESA','ALB')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Alemania','ALEMANA','DEU')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Andorra','ANDORRANA','AND')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Angola','ANGOLEÑA','AGO')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('AntiguayBarbuda','ANTIGUANA','ATG')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('ArabiaSaudita','SAUDÍ','SAU')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Argelia','ARGELINA','DZA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Argentina','ARGENTINA','ARG')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Armenia','ARMENIA','ARM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Aruba','ARUBEÑA','ABW')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Australia','AUSTRALIANA','AUS')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Austria','AUSTRIACA','AUT')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Azerbaiyán','AZERBAIYANA','AZE')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Bahamas','BAHAMEÑA','BHS')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Bangladés','BANGLADESÍ','BGD')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Barbados','BARBADENSE','BRB')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Baréin','BAREINÍ','BHR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Bélgica','BELGA','BEL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Belice','BELICEÑA','BLZ')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Benín','BENINÉSA','BEN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Bielorrusia','BIELORRUSA','BLR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Birmania','BIRMANA','MMR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Bolivia','BOLIVIANA','BOL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('BosniayHerzegovina','BOSNIA','BIH')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Botsuana','BOTSUANA','BWA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Brasil','BRASILEÑA','BRA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Brunéi','BRUNEANA','BRN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Bulgaria','BÚLGARA','BGR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('BurkinaFaso','BURKINÉS','BFA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Burundi','BURUNDÉSA','BDI')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Bután','BUTANÉSA','BTN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('CaboVerde','CABOVERDIANA','CPV')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Camboya','CAMBOYANA','KHM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Camerún','CAMERUNESA','CMR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Canadá','CANADIENSE','CAN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Catar','CATARÍ','QAT')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Chad','CHADIANA','TCD')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Chile','CHILENA','CHL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('China','CHINA','CHN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Chipre','CHIPRIOTA','CYP')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('CiudaddelVaticano','VATICANA','VAT')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Colombia','COLOMBIANA','COL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Comoras','COMORENSE','COM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('CoreadelNorte','NORCOREANA','PRK')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('CoreadelSur','SURCOREANA','KOR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('CostadeMarfil','MARFILEÑA','CIV')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('CostaRica','COSTARRICENSE','CRI')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Croacia','CROATA','HRV')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Cuba','CUBANA','CUB')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Dinamarca','DANÉSA','DNK')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Dominica','DOMINIQUÉS','DMA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Ecuador','ECUATORIANA','ECU')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Egipto','EGIPCIA','EGY')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('ElSalvador','SALVADOREÑA','SLV')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('EmiratosÁrabesUnidos','EMIRATÍ','ARE')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Eritrea','ERITREA','ERI')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Eslovaquia','ESLOVACA','SVK')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Eslovenia','ESLOVENA','SVN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('España','ESPAÑOLA','ESP')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('EstadosUnidos','ESTADOUNIDENSE','USA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Estonia','ESTONIA','EST')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Etiopía','ETÍOPE','ETH')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Filipinas','FILIPINA','PHL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Finlandia','FINLANDÉSA','FIN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Fiyi','FIYIANA','FJI')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Francia','FRANCÉSA','FRA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Gabón','GABONÉSA','GAB')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Gambia','GAMBIANA','GMB')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Georgia','GEORGIANA','GEO')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Gibraltar','GIBRALTAREÑA','GIB')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Ghana','GHANÉSA','GHA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Granada','GRANADINA','GRD')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Grecia','GRIEGA','GRC')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Groenlandia','GROENLANDÉSA','GRL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Guatemala','GUATEMALTECA','GTM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Guineaecuatorial','ECUATOGUINEANA','GNQ')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Guinea','GUINEANA','GIN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Guinea-Bisáu','GUINEANA','GNB')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Guyana','GUYANESA','GUY')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Haití','HAITIANA','HTI')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Honduras','HONDUREÑA','HND')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Hungría','HÚNGARA','HUN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('India','HINDÚ','IND')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Indonesia','INDONESIA','IDN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Irak','IRAQUÍ','IRQ')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Irán','IRANÍ','IRN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Irlanda','IRLANDÉSA','IRL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Islandia','ISLANDÉSA','ISL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('IslasCook','COOKIANA','COK')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('IslasMarshall','MARSHALÉSA','MHL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('IslasSalomón','SALOMONENSE','SLB')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Israel','ISRAELÍ','ISR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Italia','ITALIANA','ITA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Jamaica','JAMAIQUINA','JAM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Japón','JAPONÉSA','JPN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Jordania','JORDANA','JOR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Kazajistán','KAZAJA','KAZ')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Kenia','KENIATA','KEN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Kirguistán','KIRGUISA','KGZ')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Kiribati','KIRIBATIANA','KIR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Kuwait','KUWAITÍ','KWT')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Laos','LAOSIANA','LAO')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Lesoto','LESOTENSE','LSO')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Letonia','LETÓNA','LVA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Líbano','LIBANÉSA','LBN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Liberia','LIBERIANA','LBR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Libia','LIBIA','LBY')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Liechtenstein','LIECHTENSTEINIANA','LIE')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Lituania','LITUANA','LTU')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Luxemburgo','LUXEMBURGUÉSA','LUX')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Madagascar','MALGACHE','MDG')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Malasia','MALASIA','MYS')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Malaui','MALAUÍ','MWI')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Maldivas','MALDIVA','MDV')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Malí','MALIENSE','MLI')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Malta','MALTÉSA','MLT')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Marruecos','MARROQUÍ','MAR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Martinica','MARTINIQUÉS','MTQ')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Mauricio','MAURICIANA','MUS')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Mauritania','MAURITANA','MRT')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('México','MEXICANA','MEX')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Micronesia','MICRONESIA','FSM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Moldavia','MOLDAVA','MDA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Mónaco','MONEGASCA','MCO')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Mongolia','MONGOLA','MNG')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Montenegro','MONTENEGRINA','MNE')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Mozambique','MOZAMBIQUEÑA','MOZ')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Namibia','NAMIBIA','NAM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Nauru','NAURUANA','NRU')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Nepal','NEPALÍ','NPL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Nicaragua','NICARAGÜENSE','NIC')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Níger','NIGERINA','NER')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Nigeria','NIGERIANA','NGA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Noruega','NORUEGA','NOR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('NuevaZelanda','NEOZELANDÉSA','NZL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Omán','OMANÍ','OMN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('PaísesBajos','NEERLANDÉSA','NLD')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Pakistán','PAKISTANÍ','PAK')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Palaos','PALAUANA','PLW')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Palestina','PALESTINA','PSE')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Panamá','PANAMEÑA','PAN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('PapúaNuevaGuinea','PAPÚ','PNG')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Paraguay','PARAGUAYA','PRY')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Perú','PERUANA','PER')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Polonia','POLACA','POL')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Portugal','PORTUGUÉSA','PRT')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('PuertoRico','PUERTORRIQUEÑA','PRI')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('ReinoUnido','BRITÁNICA','GBR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('RepúblicaCentroafricana','CENTROAFRICANA','CAF')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('RepúblicaCheca','CHECA','CZE')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('RepúblicadeMacedonia','MACEDONIA','MKD')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('RepúblicadelCongo','CONGOLEÑA','COG')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('RepúblicaDemocráticadelCongo','CONGOLEÑA','COD')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('RepúblicaDominicana','DOMINICANA','DOM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('RepúblicaSudafricana','SUDAFRICANA','ZAF')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Ruanda','RUANDÉSA','RWA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Rumanía','RUMANA','ROU')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Rusia','RUSA','RUS')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Samoa','SAMOANA','WSM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('SanCristóbalyNieves','CRISTOBALEÑA','KNA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('SanMarino','SANMARINENSE','SMR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('SanVicenteylasGranadinas','SANVICENTINA','VCT')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('SantaLucía','SANTALUCENSE','LCA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('SantoToméyPríncipe','SANTOTOMENSE','STP')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Senegal','SENEGALÉSA','SEN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Serbia','SERBIA','SRB')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Seychelles','SEYCHELLENSE','SYC')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('SierraLeona','SIERRALEONÉSA','SLE')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Singapur','SINGAPURENSE','SGP')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Siria','SIRIA','SYR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Somalia','SOMALÍ','SOM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('SriLanka','CEILANÉSA','LKA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Suazilandia','SUAZI','SWZ')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('SudándelSur','SURSUDANÉSA','SSD')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Sudán','SUDANÉSA','SDN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Suecia','SUECA','SWE')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Suiza','SUIZA','CHE')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Surinam','SURINAMESA','SUR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Tailandia','TAILANDÉSA','THA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Tanzania','TANZANA','TZA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Tayikistán','TAYIKA','TJK')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('TimorOriental','TIMORENSE','TLS')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Togo','TOGOLÉSA','TGO')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Tonga','TONGANA','TON')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('TrinidadyTobago','TRINITENSE','TTO')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Túnez','TUNECINA','TUN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Turkmenistán','TURCOMANA','TKM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Turquía','TURCA','TUR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Tuvalu','TUVALUANA','TUV')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Ucrania','UCRANIANA','UKR')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Uganda','UGANDÉSA','UGA')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Uruguay','URUGUAYA','URY')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Uzbekistán','UZBEKA','UZB')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Vanuatu','VANUATUENSE','VUT')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Venezuela','VENEZOLANA','VEN')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Vietnam','VIETNAMITA','VNM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Yemen','YEMENÍ','YEM')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Yibuti','YIBUTIANA','DJI')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Zambia','ZAMBIANA','ZMB')");
        DB::insert("INSERT INTO nacionalidades(nombre_nacionalidad,gentilicio_nacimiento,iso_nacionalidad)VALUES('Zimbabue','ZIMBABUENSE','ZWE')");
    }
}