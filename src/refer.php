<?
session_name("yukta_org");
session_start(); 
if (!isset($_SESSION['id_src']) or $_SESSION['id_src'] =="") $_SESSION['id_src'] = "bhgt";
if ($_SESSION['s_lang']) {
 $lang = $_SESSION['s_lang'];
} else {
 $lang='rus';
 $_SESSION['s_lang'] = $lang;
}
require("header.php");

?>
 <table border="0" cellpadding="2" cellspacing="2" WIDTH=100%>
  <tr>
  <th class="head">
<? if ($lang=="rus") {
echo "Полезные ссылки";
} else {
echo "The useful references ";
}
?>
  </th>
  </tr>
  <td class="form">
  
  </td>
  </tr>

 </table>
 <hr size="1" width="70%">



<TABLE cellpadding="0" cellspacing="0" border="0" width ="100%">
    <TR>
    <TD width="15%"></TD>
    <TD width="70%">
     <table cellpadding="3" cellspacing="3" border="0" width ="100%">
      <tr><td class="refer">
<ul>      
    <li>   <a class="lnk_ref" href=http://www.uni-koeln.de/phil-fak/indologie/tamil/mwd_search.html target=_blank>Cologne Digital Sanskrit Lexicon</a> 
Institute of Indology and Tamil Studies (IITS) University of Cologne. 
    <li>   <a class="lnk_ref"  href=http://www.uni-koeln.de/phil-fak/indologie/tamil/cap_search.html target=_blank>Capeller's Sanskrit-English Dictionary</a> 
Institute of Indology and Tamil Studies (IITS) University of Cologne. 

    <li>   <a class="lnk_ref"  href=http://members.ams.chello.nl/l.bontes/sans_n.htm target=_blank>Mwsdd интерфейс для словаря Cologne Digital Sanskrit Lexicon. Mwsdd is a interface to the cologne digital Sanskrit project.</a>
Есть исходная база в виде текстового файла

    <li>   <a class="lnk_ref"  href=http://www.taralabalu.org target=_blank>Ganakastadhyayi (A Software on Panini's Sutras) Developed by Dr. Shivamurthy Swamiji</a>

    <li>   <a class="lnk_ref"  href=http://samskrtam.narod.ru/ target=_blank>Санскрит. Sanskrit. </a>  А. А. Зализняк 'Грамматический очерк санскрита'

    <li>   <a class="lnk_ref"  href=http://sanskrit.bhaarat.com/Doc_Project/learning_tutorial_wikner/index.html target=_blank>A Practical Sanskrit Introductory by Charles Wikner</a>

    <li>   <a class="lnk_ref"  href=http://sanskrit.gde.to/allfilelistpdf.html target=_blank>Документы на санскрите в PDF формате. Sanskrit Documents in PDF format </a>

    <li>   <a class="lnk_ref"  href=http://www.vaisnava.cz/clanek_en.php3?no=24 target=_blank>Бхагавад Гита в формате MP3 (санскрит). Recited Bhagavad-gita </a>

</ul>
      </td></tr>
      
      
      <tr><td class="refer">
        &nbsp      
      </td></tr>
<!--
      <tr><td class="body">

<H1><?echo $str_lnk_tit2;?> </H1>
      </td></tr>
      
      
      <tr><td class="refer">
<ol>
    <li>  
   <a href=http://hari-katha.org/ target=_blank>Hari-katha.org</a>
  <?echo $str_lnk_p4;?>
      </td></tr>
-->
     </table>
    </TD>

    <TD width="15%"></TD>
    </TR>

</TABLE>

<hr>
<?
require "m_menu.php";
?>
<hr>

