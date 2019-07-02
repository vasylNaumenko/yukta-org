<?
session_name("yukta_org");
session_start(); 
require("header.php");
if (!isset($_SESSION['id_src']) or $_SESSION['id_src'] =="") $_SESSION['id_src'] = "bhgt";

?>
<BODY LANG="ru-RU">

<TABLE WIDTH=100% BORDER=0 CELLPADDING=4 CELLSPACING=0 STYLE="page-break-before: always">
	<COL WIDTH=15*>
	<COL WIDTH=221*>
	<COL WIDTH=20*>
	<TR VALIGN=TOP>
		<TD WIDTH=6%>
			<P ><BR></P>
		</TD>
		<TH  class="head" WIDTH=86%>
		
                <? echo $d_h; ?>
		<br> <br>
                <FONT COLOR=red>
		В связи с переходом на другую версию словаря и переделкой программного обеспечения, база и программа сайта временно не доступны для скачивания.
                </FONT>
               <HR ALING=CENTER WIDTH=100% SIZE=1 COLOR=BLUE>
                </TH>
		<TD WIDTH=8%>
			<P ><BR>
			</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=6%>
			<P ><BR>
			</P>
		</TD>
		<TD class="body" WIDTH=86%>
			<P ><? echo $d_t_1; ?> <A class="skrlnk"  HREF="download/data.zip">data.zip</A>(1,6Mb).
			<? echo $d_t_2;?>  <A class="skrlnk"  HREF="download/bhgita.zip">bhgita.zip</A>(25Kb).<br></P>
            		<? echo $d_t_3; ?><br>
		        <ol>
			 <li> Apache for win32;
			 <li> MySQL for win32;
			 <li> PHP for win32. 
			</ol>
			<P><? echo $d_t_4;?>
			<A class="skrlnk"  HREF="http://nagoya.apache.org/dist/httpd/binaries/win32/apache_1.3.27-win32-x86-no_src.exe">apache_1.3.27-win32-x86-no_src.exe</A> (5.1Мб)        <A class="skrlnk"  HREF="http://www.php.net/get_download.php?df=php-4.2.3-Win32.zip" target=_blank>PHP 4.2.3 zip packag</A>   (5.4Мб)          <A class="skrlnk"  HREF="http://www.mysql.com/Downloads/MySQL-3.23/mysql-3.23.53-win.zip">MySQL  3.23.53</A>  (13.3Мб) 
		</TD>
		<TD WIDTH=8%>
			<P ><BR>
			</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=6%>
			<P ><BR>
			</P>
		</TD>
		<TD class="body" WIDTH=86% >
			<BLOCKQUOTE>
		        <HR ALING=CENTER WIDTH=100% SIZE=1 COLOR=BLUE>
			<? echo $d_t_5;?> <br> 
			<A class="skrlnk"  HREF="http://www.woweb.ru/non-cgi/123/1028968133/print/"  target=_blank>http://www.woweb.ru/non-cgi/123/1028968133/print/</A>
		        <HR ALING=CENTER WIDTH=100% SIZE=1 COLOR=BLUE>
			</BLOCKQUOTE>

		</TD>
		<TD WIDTH=8%>
			<P ><BR>
			</P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=6%>
			<P ><BR>
			</P>
		</TD>
		<TD class="body" WIDTH=86%>
			<BR>
		  <ul>
			<LH><EM><?echo $d_t_6;?> <A class="skrlnk"  HREF="download/conf.zip">conf.zip</A>.</em>
			<? echo $d_t_7;?>
                        <P><BR>
			</P>
			</ul><P><BR>
			</P>
			<P><? echo $d_t_8;?>
                        </P>
			<P><BR>
			</P>
			<ol><lh><? echo $d_t_9;?>
			</ol>
		</TD>
		<TD WIDTH=8%>
			<P ><BR>
			</P>
		</TD>
	</TR>
</TABLE>
<?
echo "<hr>";

require "m_menu.php";


?>