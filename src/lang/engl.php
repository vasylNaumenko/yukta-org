<?
$str_h_edin = 'Yedinstvo';
$str_m_home = 'Home';
$str_m_lexicon = 'Dictionary';
$str_m_cont_bg = "Bh.Gita's content";
$str_m_intr_transl = 'Translation';
$str_m_intr_refer = 'Links';
$str_m_gram = 'Grammar';
$s_gr_tit = "Grammar of Sanskrit (only Russian)";
$str_SrchGramm = 'Search in the tables:';
$str_ViewGramm = 'Viewing of sections:';

$str_home_header = "This site is devoted to Sanskrit";
$s_h_h = "and it has intention to make the contribution to rapprochement of this language with Russian for more wide spreading of Truth ";
$s_h_1 = 'Sanskrit-English-Russian Dictionery';
$s_h_1_1 = "The dictionary is based on the electronic version ' Sanskrit-English Dictionary ' by Monier-Williams (Cologne Digital Sanskrit Lexicon);";
$s_h_1_2 = 'It has three directions of search;';
$s_h_1_3 = 'The transliteration is based on the Harvard-Kyoto (HK) convention (see Links).'; 
$s_h_1_4_1 = 'It contains now ';
$s_h_1_4_2 = "Sanskrit's meanings and";
$s_h_1_4_3 = 'the English-Russian meanings appropriate to them.';
$s_h_2 = 'Grammar';
$s_h_2_h = 'This section is assembled from different sources and contains';
$s_h_2_h_ = 'items, among which:';
$s_h_2_1 = "<LI> Tables of declinations of nouns, pronouns, numerals;
<LI> Table of conjugation of verbs;
<LI> Morphology; 'The complete table of sandhi ' can be especially useful to practical work';
<LI> Phonetics;
<LI> Compound;
<LI> Some sections from 'The Grammatic sketch of Sanskrit ' by A. A. Zaliznyak.
<br> <br>This section allows to conduct search in all grammatic tables. It is especially convenient  for definition of conjugation, declination, inclination, number etc. concrete word on its termination..
<br> For example, the word avatiSThate is absent in the dictionary. There is  avasthA only. The search with the mask '-te ' allows to find the necessary table of the terminations of verbs in the present time. So we can see from the table that such termination is characteristic for 3-rd person of singular number Atmanepada. This is only one from many ways of using the grammar section.. 
</UL>";
$s_h_3 = "Bhagavad Gita's content";
$s_h_3_1 = "<UL>
<LI> The Bhagavad Gita's translation by yukta.org  is an attempt to translate the text as more precisely as it is possible..     
<LI>It is probably deeply to reflect above each verse using the Interactive translation. Simply click with your mouse on Sanskrit's text of a verse.
</UL>";
$s_h_4 = 'Interactive translation';
$s_h_4_1 = "<UL>It is an attempt to make the convenient interface for the analysis of concrete verses. The interface contains the source text on Sanskrit, translation, grammatic analysis of a verse, list of Sanskrit's words of a verse and their English-Russian meanings.
</UL>";
$s_h_5 = "<br>Dear friend, be happy by heart and good luck to you in your searchings for Truth!
<br> <br>
For those who wants to give advice, wish, something by the remark etc. - write ";
$s_h_5_1 = "<br> 
There is an intention to develop the complete functional Sanskrit-English-Russian dictionary approximately on 160 000 meanings of Sanskrit. <br> 
We need your help for this purpose. ";

$s_upd = 'Updated ';

// Page 'Lexicon'

$str_lex_tit = 'Sanskrit-English-Russian dictionary ';
$str_lex_rus = 'Russian :';
$str_lex_eng = 'English:';
$str_lex_san = 'Sanskrit :';
$str_lex_srch = "Search";

$s_lex_ex = 'Examples of search:';
$str_lex_trans = 'The transliteration is based on the Harvard-Kyoto (HK) convention:';  

$str_lex_fnd = 'It is found ';
$str_lex_mns = ' document ( limit - 200 ). You can choose up to 40 meanings. ';
$str_lex_fetch = 'Fetch documents';


// Page 'Content Bh. Gita'

$str_cont_tit1 = 'The contents chapter ';
$str_cont_tit2 = ' ';
$str_cont_tit3 = 'of the  Bhagavad Gita ';
$str_cont_chapt = 'Chapter :';
$str_cont_sans = 'Sanskrit';
$str_cont_rus = 'Russian';
$str_cont_fetch = "Fetch documents"; 

// Page 'Links' entries

$str_lnk_tit1 = 'The basic references';
$str_lnk_p1 = "The Cologne Digital Sanskrit Lexicon contains Monier-Williams' 'Sanskrit-English Dictionary' with approx. 160.000 main entries. ";
$str_lnk_p2 = "The digital version of Cappeller's Sanskrit Dictionary (1891) contains approx. 50.000 main entries. ";
$str_lnk_p3 = 'The English-Russian on-line dictionary contains 56 000 main entries.';
$str_lnk_tit2 = ' ';
$str_lnk_p4 = ' ';

$d_h = "yukta.org in off-line.";
$d_t_1 = "The database of the site is constantly updated. The current version of this site in a format MySQL (zip-packed the folder 'data' MySQL for win32) is possible to download here -";
$d_t_2 = "The software of the site (php files) &ndash; here"; 
$d_t_3 = "It is necessary to download  and install three programs local Intranet for use of these two files under Windows:";
$d_t_4 = "For example here:";
$d_t_5 = "There is good manual on installation of these programs and reference (Russian) -";
$d_t_6 = " The simplified variant install local Intranet in a folder d:\www\ is shown below, the configuration files httpd.conf and php.ini for which it is possible to download here ";
$d_t_7 = "<li> The Program Apache and MySQL need install in d:\www\apache and d:\www\mysql accordingly.
			 <br>
			 PHP -  to unpack in d:\www\php. 
			 <br>
			 If you will choose other ways for accommodation of the programs &ndash; it is necessary
			 will correct configuration files httpd.conf and php.ini.
			
			 <li> Copy sample (from the dowloaded file conf.zip) httpd.conf in  d:\www\apache\conf\ 			
			 <li> Copy sample (from the dowloaded file conf.zip) php.ini in basic catalogue Windows
			 <li> Copy a file d:\www\php\php4ts.dll in a folder 'system' of the  basic folder of  Windows.

			 <li> If you already installed the MySQL earlier also have in it
			 Important data &ndash be attentive at performance it
			 Item! Write.<br> 			
			 Remove (having kept if necessary) contents d:\www\mysql\data\ and
			 unpack here contents of the downloaded data.zip. In
			 d:\www\mysql\data\ there should be two folders: mysql and yukta.
			
			 <li> In d:\www\apache\htdocs\ create a folder bhgita and unpack in it
			 contents of the dowloaded file bhgita.zip. In d:\www\apache\htdocs\bhgita there should be two folders bgita and lang, 8
			 php files and two gif files.";
$d_t_8 = "If all is made without mistakes, the installation is completed by yours local Intranett now.";
$d_t_9 = "<em> For runing and testing: </em>
			
			 <li> Create a label for D:\www\Apache\Apache.exe. In properties for it
			 shortcut &ldquo;Object&rdquo; it is necessary to register:
 			D:\www\Apache\Apache.exe -w -f &quot;d:\www\Apache\conf\httpd.conf&quot; -d
 			&quot;d:\www\Apache\&quot; 
			
			 <li> Create a label for D:\www\mysql\bin\mysqld.exe 
			 <li> Click on a label Apache. The window of the console  will be opened and  
			 a bit later second window, which here will be closed itself  at the correct work.
			 Do not close the first window.
			 <li> Click on a label MySQL. The window of the console will be opened and will be closed itself after this.
			 <li> Enter http://localhost/bhgita/ in a browser. The site yukta.org in a local mode will open if all in the order,
			 .";
$Switch_ShowLex_gr = "Grammar";
$Switch_ShowLex_eng = "English";
$Switch_ShowLex_rus = "Russian";
$Switch_ShowLex_src = "Source";


$str_m_intr_mp3 = "Bh.Gita's mp3";



?>
