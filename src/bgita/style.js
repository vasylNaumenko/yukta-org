var scr_w = screen.width;
if (!scr_w) {
 scr_w = 1280;
}

switch (scr_w){

case 777 :

document.write( "<STYLE  type=\"text/css\">\n"+  
"body {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt; background-color: #e5f7f3}\n"+
"body.skrlnk {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt;background-color: #ccffff}\n"+
"h1 {font-family: Times New, Arial, Helvetica, sans-serif; font-size: 17pt; text-align: center;color: blue}\n"+
"h2 {  font-family: Times New, Arial, Helvetica, sans-serif; font-size: 15pt; text-align: left;color: blue}\n"+
"a  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 11pt;text-align: center}\n"+
"a:Hover { color:#FF0080;    background-color: #ffff00}\n"+        
"a.skrlnk {  font-family: Times New, Arial, Helvetica, sans-serif;  text-decoration:none; font-size: 10pt;text-align: left;color: #000066; background-color: #ccffff}\n"+
"a.skrlnk:Hover { color:#FF0080;  background-color: #ffff00}\n"+
"a.lnk_ref {  font-family: Verdana, Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-weight: normal; font-size: 11pt;   text-align: left;color: #000076;background-color: #e5f7f3}\n"+
"a.lnk_ref:Hover { color:#FF0080;     background-color: #ffff00}\n"+
"a.oper_l {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 11pt;text-align: left;color: #000959;background-color: #FFFFFF}\n"+
"a.oper_l:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.oper_d {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 11pt;text-align: left;color: #000959;background-color: #E9FFFF}\n"+
"a.oper_d:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.oper_s {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 12pt;text-align: left;color: blue;background-color: #A4FFE9}\n"+
"a.oper_s:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.menu  {  font-family: Times New, Arial, Helvetica, sans-serif; font-size: 10pt;  text-align: center;text-decoration:none; color: #0518C9; background-color: #ABE1FE}\n"+
"a.menu:Hover { color:#FF0080;  background-color: #ffff00}\n"+
"a.lit {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 9pt;text-align: left;color: blue;background-color: #A4FFE9}\n"+
"a.lit:Hover {color:#FF0080;background-color: #ffff00}\n"+
"th  { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 13pt;font-weight: normal;background-color: #CCFFFF}\n"+
"th.s { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 13pt; font-weight: normal;background-color: #D7FFFD}\n"+
"th.small {font-family: Arial, Helvetica, sans-serif;  color: #081180; font-size: 10pt;font-weight: normal;  background-color: #CCFFFF}\n"+
"th.head { font-family: Arial, Helvetica, sans-serif;  color: #081180;font-size: 14pt;font-weight: bold; background-color: #e5f7f3}\n"+
"th.form { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 10pt;font-weight: bold; background-color: #e5f7f3}\n"+
"td.h_left { font-family: verdana, Times New , Helvetica ,sans-serif ,Arial ;   font-weight: normal;font-size: 12pt; color: #081180;background-color: #E9FFFF;padding: 1; vertical-align: top;text-align: center}\n"+
"td.h_right { font-family: verdana, Arial, sans-serif ,Times New , Helvetica; font-weight: normal;font-size: 12pt; color: #0012B0;background-color: #E9FFFF; padding: 1;vertical-align: top;   text-align: center}\n"+
"td.h_sintax { font-family: verdana, sans-serif ,Helvetica , Times New , Arial ; font-weight: normal;font-size: 10pt;background-color: #E9FFFF;padding: 4; vertical-align: top; text-align: left}\n"+
"td.home_right{font-family: Arial, sans-serif ,Times New,Helvetica;font-weight: bold;font-size: 11pt;color: #0012B0;background-color: #e5f7f3;padding: 1;vertical-align: top; text-align: center}\n"+
"td.form { font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 9pt;color: #000959;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: center}\n"+
"td.form_Left {font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 9pt; color: #000959; background-color: #e5f7f3; padding: 1; vertical-align: center;  text-align: left}\n"+
"td.skrlnk { font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 13pt; color: #000959;background-color: #ccffff;padding: 1;vertical-align: center;   text-align: center}\n"+
"td.skrlnk_{font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 10pt; color: #000959; background-color: #ccffff; padding: 1;vertical-align: center;   text-align: left}\n"+
"td.body { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal;font-size: 9pt; color: #000999;background-color: #e5f7f3;padding: 1; vertical-align: center;   text-align: justify}\n"+
"td.body_chr {font-family: Arial,Helvetica, sans-serif ; font-weight: normal;font-size: 13pt; color: #000000;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: justify}\n"+
"td.body_chr_cit {font-family: Arial,Helvetica, sans-serif; font-weight: normal;font-size: 11pt; color: #000999;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: justify}\n"+
"td.refer { font-family: Arial, Helvetica, sans-serif; font-weight: normal;font-size: 10pt; color: #000999;background-color: #e5f7f3;padding: 1; vertical-align: center; text-align: justify}\n"+
"td.menu { font-family: Arial,Helvetica, sans-serif; font-weight: normal; font-size: 10pt; color: #0000ff;background-color: #ABE1FE;padding: 1;vertical-align: center; text-align: center}\n"+
"td.b_l_left { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal; font-size: 10pt;color: #000959;background-color: #FFFFFF; padding: 5; vertical-align: top; text-align: left}\n"+
"td.b_l_right { font-family: verdana, Arial,Helvetica, sans-serif; font-weight: normal; font-size: 10pt; color: #0010B0;background-color: #FFFFFF;padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_d_left { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal;  font-size: 10pt; color: #000959;background-color: #E9FFFF; padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_light { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal; font-size: 10pt; color: #000959;background-color: #FEFDD3;padding: 5;vertical-align: top;text-align: left}\n"+
"td.menu_left { font-family: Arial,Helvetica, sans-serif;font-weight: normal;   font-size: 11pt;color: #000959;background-color: #ABE1FE;padding: 5;vertical-align: top;text-align: left}\n"+
"td.b_d_right { font-family: verdana, Arial, Helvetica, sans-serif; font-weight: normal; font-size:10pt; color: #0010B0; background-color: #F4FDFF; padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_tabl { font-family: Times New, Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12pt; color: #000959; background-color: #E9FFFF;padding: 5;vertical-align:center; text-align: center}\n"+
"td.gram { font-family: Times New, Arial,Helvetica, sans-serif;font-weight: normal;  font-size: 12pt; color: #000959;background-color: #E9FFFF;padding: 5;vertical-align: center;text-align: left}\n"+
"td.h_gr { font-family: Verdana, sans-serif ,Times New ,Arial, Helvetica; font-weight: normal; font-size: 10pt; color: #081180;background-color: #E6FFFE;  padding: 1; vertical-align: top;    text-align: left}\n"+
"td.gr_l { font-family: Times New, Verdana, Tahoma, Arial,Helvetica, sans-serif; font-weight: normal;font-size: 10pt; color: #010483;background-color: #FFFFFF; padding: 0; vertical-align: top;text-align: left}\n"+
"td.gr_d { font-family: Times New, Verdana, Arial,Helvetica, sans-serif; font-weight: normal;font-size: 10pt; color: #010483;background-color: #F4FDFF;padding: 0;vertical-align: top; text-align: left}\n"+
"select  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 12pt; color: #330066; font-weight: normal; background-color: #E9FFFF}\n"+
"input{ font-size: 7pt}\n"+
"hr  { color: #0077FF}\n"+
"</style>");
 break;

case 640,800 :
document.write( "<STYLE  type=\"text/css\">\n"+  
"body {  font-family: Arial, Helvetica, sans-serif; font-size: 8pt; background-color: #e5f7f3}\n"+
"body.skrlnk {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt;background-color: #ccffff}\n"+
"h1 {font-family: Times New, Arial, Helvetica, sans-serif; font-size: 11pt; text-align: center;color: blue}\n"+
"h2 {  font-family: Times New, Arial, Helvetica, sans-serif; font-size: 12pt; text-align: left;color: blue}\n"+
"a  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 7pt;text-align: center}\n"+
"a:Hover { color:#FF0080;    background-color: #ffff00}\n"+        
"a.skrlnk {  font-family: Times New, Arial, Helvetica, sans-serif;  text-decoration:none; font-size: 8pt;text-align: left;color: #000066; background-color: #ccffff}\n"+
"a.skrlnk:Hover { color:#FF0080;  background-color: #ffff00}\n"+
"a.lnk_ref {  font-family: Verdana, Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-weight: normal; font-size: 9pt;   text-align: left;color: #000076;background-color: #e5f7f3}\n"+
"a.lnk_ref:Hover { color:#FF0080;     background-color: #ffff00}\n"+
"a.oper_l {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 8pt;text-align: left;color: #000959;background-color: #FFFFFF}\n"+
"a.oper_l:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.oper_d {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 8pt;text-align: left;color: #000959;background-color: #E9FFFF}\n"+
"a.oper_d:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.oper_s {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 8pt;text-align: left;color: blue;background-color: #A4FFE9}\n"+
"a.oper_s:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.menu  {  font-family: Times New, Arial, Helvetica, sans-serif; font-size: 8pt;  text-align: center;text-decoration:none; color: #0518C9; background-color: #ABE1FE}\n"+
"a.menu:Hover { color:#FF0080;  background-color: #ffff00}\n"+
"a.lit {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 9pt;text-align: left;color: blue;background-color: #A4FFE9}\n"+
"a.lit:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.mono {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 8pt; text-align: left; color: #010483; background-color: #D5FFF4}\n"+
"a.mono:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"a.b_l_left {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 8pt; text-align: left; color: #010483; background-color: #EFFFF4}\n"+
"a.b_l_left:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"a.b_d_left {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 8pt; text-align: left; color: #010483; background-color: #E4FFF4}\n"+
"a.b_d_left:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"a.b_light {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 8pt; text-align: left; color: #010483; background-color: #FEFDD3}\n"+
"a.b_light:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"th  { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 9pt;font-weight: normal;background-color: #CCFFFF}\n"+
"th.s { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 8pt; font-weight: normal;background-color: #D7FFFD}\n"+
"th.small {font-family: Arial, Helvetica, sans-serif;  color: #081180; font-size: 7pt;font-weight: normal;  background-color: #CCFFFF}\n"+
"th.head { font-family: Arial, Helvetica, sans-serif;  color: #081180;font-size: 10pt;font-weight: bold; background-color: #e5f7f3}\n"+
"th.form { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 8pt;font-weight: bold; background-color: #e5f7f3}\n"+
"td.h_left { font-family: verdana, Times New , Helvetica ,sans-serif ,Arial ;   font-weight: normal;font-size: 8pt; color: #081180;background-color: #E9FFFF;padding: 1; vertical-align: top;text-align: center}\n"+
"td.h_right { font-family: verdana, Arial, sans-serif ,Times New , Helvetica; font-weight: normal;font-size: 8pt; color: #0012B0;background-color: #E9FFFF; padding: 1;vertical-align: top;   text-align: center}\n"+
"td.h_sintax { font-family: verdana, sans-serif ,Helvetica , Times New , Arial ; font-weight: normal;font-size: 8pt;background-color: #E9FFFF;padding: 4; vertical-align: top; text-align: left}\n"+
"td.home_right{font-family: Arial, sans-serif ,Times New,Helvetica;font-weight: bold;font-size: 8pt;color: #0012B0;background-color: #e5f7f3;padding: 1;vertical-align: top; text-align: center}\n"+
"td.form { font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 7pt;color: #000959;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: center}\n"+
"td.form_Left {font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 8pt; color: #000959; background-color: #e5f7f3; padding: 1; vertical-align: center;  text-align: left}\n"+
"td.skrlnk { font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 9pt; color: #000959;background-color: #ccffff;padding: 1;vertical-align: center;   text-align: center}\n"+
"td.skrlnk_{font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 7pt; color: #000959; background-color: #ccffff; padding: 0;vertical-align: center;   text-align: left}\n"+
"td.body { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal;font-size: 7pt; color: #000999;background-color: #e5f7f3;padding: 1; vertical-align: center;   text-align: justify}\n"+
"td.body_chr {font-family: Arial,Helvetica, sans-serif ; font-weight: normal;font-size: 10pt; color: #000000;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: justify}\n"+
"td.body_chr_cit {font-family: Arial,Helvetica, sans-serif; font-weight: normal;font-size: 8pt; color: #000999;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: justify}\n"+
"td.refer { font-family: Arial, Helvetica, sans-serif; font-weight: normal;font-size: 9pt; color: #000999;background-color: #e5f7f3;padding: 1; vertical-align: center; text-align: justify}\n"+
"td.menu { font-family: Arial,Helvetica, sans-serif; font-weight: normal; font-size: 9pt; color: #0000ff;background-color: #ABE1FE;padding: 1;vertical-align: center; text-align: center}\n"+
"td.b_l_left { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal; font-size: 8pt;color: #000959;background-color: #EFFFF4; padding: 5; vertical-align: top; text-align: left}\n"+
"td.b_l_right { font-family: verdana, Arial,Helvetica, sans-serif; font-weight: normal; font-size: 8pt; color: #0010B0;background-color: #FFFFFF;padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_d_left { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal;  font-size: 8pt; color: #000959;background-color: #E4FFF4; padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_light { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal; font-size: 8pt; color: #000959;background-color: #FEFDD3;padding: 5;vertical-align: top;text-align: left}\n"+
"td.menu_left { font-family: Arial,Helvetica, sans-serif;font-weight: normal;   font-size: 9pt;color: #000959;background-color: #ABE1FE;padding: 5;vertical-align: top;text-align: left}\n"+
"td.b_d_right { font-family: verdana, Arial, Helvetica, sans-serif; font-weight: normal; font-size:8pt; color: #0010B0; background-color: #F4FDFF; padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_tabl { font-family: Times New, Arial, Helvetica, sans-serif; font-weight: normal; font-size: 9pt; color: #000959; background-color: #E9FFFF;padding: 5;vertical-align:center; text-align: center}\n"+
"td.gram { font-family: Times New, Arial,Helvetica, sans-serif;font-weight: normal;  font-size: 9pt; color: #000959;background-color: #E9FFFF;padding: 5;vertical-align: center;text-align: left}\n"+
"td.h_gr { font-family: Verdana, sans-serif ,Times New ,Arial, Helvetica; font-weight: normal; font-size: 8pt; color: #081180;background-color: #D5FFF4;  padding: 5; vertical-align: top;    text-align: left}\n"+
"td.gr_l { font-family: Times New, Verdana, Tahoma, Arial,Helvetica, sans-serif; font-weight: normal;font-size: 7pt; color: #010483;background-color: #FFFFFF; padding: 0; vertical-align: top;text-align: left}\n"+
"td.gr_d { font-family: Times New, Verdana, Arial,Helvetica, sans-serif; font-weight: normal;font-size: 7pt; color: #010483;background-color: #F4FDFF;padding: 0;vertical-align: top; text-align: left}\n"+
"td.mono {  font-family: Times New, Verdana, Tahoma, Arial, Helvetica, sans-serif; font-weight: normal; font-size: 9pt; color: #010483; background-color: #D5FFF4; padding: 5; vertical-align: top; text-align: left}\n"+
"select  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 8pt; color: #330066; font-weight: normal; background-color: #E9FFFF}\n"+
"select.wk  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 9pt; color: #3300ff; font-weight: bold; background-color: #E9FFFF}\n"+
"select.reg  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 8pt; color: #3300ff; font-weight: bold; background-color: #E9FFFF}\n"+
"input{ font-size: 7pt}\n"+
"hr  { color: #0077FF}\n"+
"</style>");
  break;

case 1024 :
document.write( "<STYLE  type=\"text/css\">\n"+  
"body {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt; background-color: #e5f7f3}\n"+
"body.skrlnk {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt;background-color: #ccffff}\n"+
"h1 {font-family: Times New, Arial, Helvetica, sans-serif; font-size: 13pt; text-align: center;color: blue}\n"+
"h2 {  font-family: Times New, Arial, Helvetica, sans-serif; font-size: 15pt; text-align: left;color: blue}\n"+
"a  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 10pt;text-align: center}\n"+
"a:Hover { color:#FF0080;    background-color: #ffff00}\n"+        
"a.skrlnk {  font-family: Times New, Arial, Helvetica, sans-serif;  text-decoration:none; font-size: 10pt;text-align: left;color: #000066; background-color: #ccffff}\n"+
"a.skrlnk:Hover { color:#FF0080;  background-color: #ffff00}\n"+
"a.lnk_ref {  font-family: Verdana, Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-weight: normal; font-size: 10pt;   text-align: left;color: #000076;background-color: #e5f7f3}\n"+
"a.lnk_ref:Hover { color:#FF0080;     background-color: #ffff00}\n"+
"a.oper_l {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 11pt;text-align: left;color: #000959;background-color: #FFFFFF}\n"+
"a.oper_l:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.oper_d {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 11pt;text-align: left;color: #000959;background-color: #E9FFFF}\n"+
"a.oper_d:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.oper_s {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 12pt;text-align: left;color: blue;background-color: #A4FFE9}\n"+
"a.oper_s:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.menu  {  font-family: Times New, Arial, Helvetica, sans-serif; font-size: 10pt;  text-align: center;text-decoration:none; color: #0518C9; background-color: #ABE1FE}\n"+
"a.menu:Hover { color:#FF0080;  background-color: #ffff00}\n"+
"a.lit {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 9pt;text-align: left;color: blue;background-color: #A4FFE9}\n"+
"a.lit:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.mono {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 10pt; text-align: left; color: #010483; background-color: #D5FFF4}\n"+
"a.mono:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"a.b_l_left {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 10pt; text-align: left; color: #010483; background-color: #EFFFF4}\n"+
"a.b_l_left:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"a.b_d_left {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 10pt; text-align: left; color: #010483; background-color: #E4FFF4}\n"+
"a.b_d_left:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"a.b_light {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 10pt; text-align: left; color: #010483; background-color: #FEFDD3}\n"+
"a.b_light:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"th  { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 13pt;font-weight: normal;background-color: #CCFFFF}\n"+
"th.s { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 13pt; font-weight: normal;background-color: #D7FFFD}\n"+
"th.small {font-family: Arial, Helvetica, sans-serif;  color: #081180; font-size: 10pt;font-weight: normal;  background-color: #CCFFFF}\n"+
"th.head { font-family: Arial, Helvetica, sans-serif;  color: #081180;font-size: 12pt;font-weight: bold; background-color: #e5f7f3}\n"+
"th.form { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 10pt;font-weight: bold; background-color: #e5f7f3}\n"+
"td.h_left { font-family: verdana, Times New , Helvetica ,sans-serif ,Arial ;   font-weight: normal;font-size: 11pt; color: #081180;background-color: #E9FFFF;padding: 1; vertical-align: top;text-align: center}\n"+
"td.h_right { font-family: verdana, Arial, sans-serif ,Times New , Helvetica; font-weight: normal;font-size: 11pt; color: #0012B0;background-color: #E9FFFF; padding: 1;vertical-align: top;   text-align: center}\n"+
"td.h_sintax { font-family: verdana, sans-serif ,Helvetica , Times New , Arial ; font-weight: normal;font-size: 10pt;background-color: #E9FFFF;padding: 4; vertical-align: top; text-align: left}\n"+
"td.home_right{font-family: Arial, sans-serif ,Times New,Helvetica;font-weight: bold;font-size: 11pt;color: #0012B0;background-color: #e5f7f3;padding: 1;vertical-align: top; text-align: center}\n"+
"td.form { font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 9pt;color: #000959;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: center}\n"+
"td.form_Left {font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 9pt; color: #000959; background-color: #e5f7f3; padding: 1; vertical-align: center;  text-align: left}\n"+
"td.skrlnk { font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 13pt; color: #000959;background-color: #ccffff;padding: 1;vertical-align: center;   text-align: center}\n"+
"td.skrlnk_{font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 10pt; color: #000959; background-color: #ccffff; padding: 1;vertical-align: center;   text-align: left}\n"+
"td.body { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal;font-size: 9pt; color: #000999;background-color: #e5f7f3;padding: 1; vertical-align: center;   text-align: justify}\n"+
"td.body_chr {font-family: Arial,Helvetica, sans-serif ; font-weight: normal;font-size: 13pt; color: #000000;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: justify}\n"+
"td.body_chr_cit {font-family: Arial,Helvetica, sans-serif; font-weight: normal;font-size: 11pt; color: #000999;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: justify}\n"+
"td.refer { font-family: Arial, Helvetica, sans-serif; font-weight: normal;font-size: 10pt; color: #000999;background-color: #e5f7f3;padding: 1; vertical-align: center; text-align: justify}\n"+
"td.menu { font-family: Arial,Helvetica, sans-serif; font-weight: normal; font-size: 10pt; color: #0000ff;background-color: #ABE1FE;padding: 1;vertical-align: center; text-align: center}\n"+
"td.b_l_left { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal; font-size: 10pt;color: #000959;background-color: #EFFFF4; padding: 5; vertical-align: top; text-align: left}\n"+
"td.b_l_right { font-family: verdana, Arial,Helvetica, sans-serif; font-weight: normal; font-size: 10pt; color: #0010B0;background-color: #FFFFFF;padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_d_left { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal;  font-size: 10pt; color: #000959;background-color: #E4FFF4; padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_light { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal; font-size: 10pt; color: #000959;background-color: #FEFDD3;padding: 5;vertical-align: top;text-align: left}\n"+
"td.menu_left { font-family: Arial,Helvetica, sans-serif;font-weight: normal;   font-size: 11pt;color: #000959;background-color: #ABE1FE;padding: 5;vertical-align: top;text-align: left}\n"+
"td.b_d_right { font-family: verdana, Arial, Helvetica, sans-serif; font-weight: normal; font-size:10pt; color: #0010B0; background-color: #F4FDFF; padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_tabl { font-family: Times New, Arial, Helvetica, sans-serif; font-weight: normal; font-size: 10pt; color: #000959; background-color: #E9FFFF;padding: 5;vertical-align:center; text-align: center}\n"+
"td.gram { font-family: Times New, Arial,Helvetica, sans-serif;font-weight: normal;  font-size: 10pt; color: #000959;background-color: #E9FFFF;padding: 5;vertical-align: center;text-align: left}\n"+
"td.h_gr { font-family: Verdana, sans-serif ,Times New ,Arial, Helvetica; font-weight: normal; font-size: 10pt; color: #081180;background-color: #D5FFF4;  padding: 5; vertical-align: top;    text-align: left}\n"+
"td.gr_l { font-family: Times New, Verdana, Tahoma, Arial,Helvetica, sans-serif; font-weight: normal;font-size: 8pt; color: #010483;background-color: #FFFFFF; padding: 0; vertical-align: top;text-align: left}\n"+
"td.gr_d { font-family: Times New, Verdana, Arial,Helvetica, sans-serif; font-weight: normal;font-size: 8pt; color: #010483;background-color: #F4FDFF;padding: 0;vertical-align: top; text-align: left}\n"+
"td.mono {  font-family: Times New, Verdana, Tahoma, Arial, Helvetica, sans-serif; font-weight: normal; font-size: 10pt; color: #010483; background-color: #D5FFF4; padding: 5; vertical-align: top; text-align: left}\n"+
"select  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 9pt; color: #330066; font-weight: normal; background-color: #E9FFFF}\n"+
"select.wk  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 11pt; color: #3300ff; font-weight: bold; background-color: #E9FFFF}\n"+
"select.reg  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 10pt; color: #3300ff; font-weight: bold; background-color: #E9FFFF}\n"+
"hr  { color: #0077FF}\n"+
"</style>");
  break;

// 1280 and more
 default :
document.write( "<STYLE  type=\"text/css\">\n"+  
"body {  font-family: Arial, Helvetica, sans-serif; font-size: 14pt; background-color: #e5f7f3}\n"+
"body.skrlnk {  font-family: Arial, Helvetica, sans-serif; font-size: 12pt;background-color: #ccffff}\n"+
"h1 {font-family: Times New, Arial, Helvetica, sans-serif; font-size: 17pt; text-align: center;color: blue}\n"+
"h2 {  font-family: Times New, Arial, Helvetica, sans-serif; font-size: 15pt; text-align: left;color: blue}\n"+
"a  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 11pt;text-align: center}\n"+
"a:Hover { color:#FF0080;    background-color: #ffff00}\n"+        
"a.skrlnk {  font-family: Times New, Arial, Helvetica, sans-serif;  text-decoration:none; font-size: 12pt;text-align: left;color: #000066; background-color: #ccffff}\n"+
"a.skrlnk:Hover { color:#FF0080;  background-color: #ffff00}\n"+
"a.lnk_ref {  font-family: Verdana, Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-weight: normal; font-size: 11pt;   text-align: left;color: #000076;background-color: #e5f7f3}\n"+
"a.lnk_ref:Hover { color:#FF0080;     background-color: #ffff00}\n"+
"a.oper_l {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 11pt;text-align: left;color: #000959;background-color: #FFFFFF}\n"+
"a.oper_l:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.oper_d {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 11pt;text-align: left;color: #000959;background-color: #E9FFFF}\n"+
"a.oper_d:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.oper_s {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 12pt;text-align: left;color: blue;background-color: #A4FFE9}\n"+
"a.oper_s:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.menu  {  font-family: Times New, Arial, Helvetica, sans-serif; font-size: 10pt;  text-align: center;text-decoration:none; color: #0518C9; background-color: #ABE1FE}\n"+
"a.menu:Hover { color:#FF0080;  background-color: #ffff00}\n"+
"a.lit {font-family: Times New, Arial, Helvetica, sans-serif;text-decoration:none;font-size: 9pt;text-align: left;color: blue;background-color: #A4FFE9}\n"+
"a.lit:Hover {color:#FF0080;background-color: #ffff00}\n"+
"a.mono {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 13pt; text-align: left; color: #010483; background-color: #D5FFF4}\n"+
"a.mono:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"a.b_l_left {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 13pt; text-align: left; color: #010483; background-color: #EFFFF4}\n"+
"a.b_l_left:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"a.b_d_left {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 13pt; text-align: left; color: #010483; background-color: #E4FFF4}\n"+
"a.b_d_left:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"a.b_light {  font-family: Times New, Arial, Helvetica, sans-serif; text-decoration:none; font-size: 13pt; text-align: left; color: #010483; background-color: #FEFDD3}\n"+
"a.b_light:Hover { color:#010483; background-color: #E7FFFF}        \n"+
"th  { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 12pt;font-weight: normal;background-color: #CCFFFF}\n"+
"th.s { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 15pt; font-weight: normal;background-color: #D7FFFD}\n"+
"th.small {font-family: Arial, Helvetica, sans-serif;  color: #081180; font-size: 12pt;font-weight: normal;  background-color: #CCFFFF}\n"+
"th.head { font-family: Arial, Helvetica, sans-serif;  color: #081180;font-size: 14pt;font-weight: bold; background-color: #e5f7f3}\n"+
"th.form { font-family: Arial, Helvetica, sans-serif; color: #081180; font-size: 12pt;font-weight: bold; background-color: #e5f7f3}\n"+
"td.h_left { font-family: verdana, Times New , Helvetica ,sans-serif ,Arial ;   font-weight: normal;font-size: 13pt; color: #081180;background-color: #E9FFFF;padding: 1; vertical-align: top;text-align: center}\n"+
"td.h_right { font-family: verdana, Arial, sans-serif ,Times New , Helvetica; font-weight: normal;font-size: 13pt; color: #0012B0;background-color: #E9FFFF; padding: 1;vertical-align: top;   text-align: center}\n"+
"td.h_sintax { font-family: verdana, sans-serif ,Helvetica , Times New , Arial ; font-weight: normal;font-size: 12pt;background-color: #E9FFFF;padding: 4; vertical-align: top; text-align: left}\n"+
"td.home_right{font-family: Arial, sans-serif ,Times New,Helvetica;font-weight: bold;font-size: 13pt;color: #0012B0;background-color: #e5f7f3;padding: 1;vertical-align: top; text-align: center}\n"+
"td.form { font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 11pt;color: #000959;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: center}\n"+
"td.form_Left {font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 11pt; color: #000959; background-color: #e5f7f3; padding: 1; vertical-align: center;  text-align: left}\n"+
"td.skrlnk { font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 13pt; color: #000959;background-color: #ccffff;padding: 1;vertical-align: center;   text-align: center}\n"+
"td.skrlnk_{font-family: Arial,Helvetica, sans-serif;font-weight: normal;font-size: 10pt; color: #000959; background-color: #ccffff; padding: 1;vertical-align: center;   text-align: left}\n"+
"td.body { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal;font-size: 11pt; color: #000999;background-color: #e5f7f3;padding: 1; vertical-align: center;   text-align: justify}\n"+
"td.body_chr {font-family: Arial,Helvetica, sans-serif ; font-weight: normal;font-size: 15pt; color: #000000;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: justify}\n"+
"td.body_chr_cit {font-family: Arial,Helvetica, sans-serif; font-weight: normal;font-size: 13pt; color: #000999;background-color: #e5f7f3;padding: 1;vertical-align: center; text-align: justify}\n"+
"td.refer { font-family: Arial, Helvetica, sans-serif; font-weight: normal;font-size: 12pt; color: #000999;background-color: #e5f7f3;padding: 1; vertical-align: center; text-align: justify}\n"+
"td.menu { font-family: Arial,Helvetica, sans-serif; font-weight: normal; font-size: 12pt; color: #0000ff;background-color: #ABE1FE;padding: 1;vertical-align: center; text-align: center}\n"+
"td.b_l_left { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal; font-size: 11pt;color: #000959;background-color: #EFFFF4; padding: 5; vertical-align: top; text-align: left}\n"+
"td.b_l_right { font-family: verdana, Arial,Helvetica, sans-serif; font-weight: normal; font-size: 11pt; color: #0010B0;background-color: #FFFFFF;padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_d_left { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal;  font-size: 11pt; color: #000959;background-color: #E4FFF4; padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_light { font-family: verdana, Arial,Helvetica, sans-serif;font-weight: normal; font-size: 11pt; color: #000959;background-color: #FEFDD3;padding: 5;vertical-align: top;text-align: left}\n"+
"td.menu_left { font-family: Arial,Helvetica, sans-serif;font-weight: normal;   font-size: 13pt;color: #000959;background-color: #ABE1FE;padding: 5;vertical-align: top;text-align: left}\n"+
"td.b_d_right { font-family: verdana, Arial, Helvetica, sans-serif; font-weight: normal; font-size:11pt; color: #0010B0; background-color: #F4FDFF; padding: 5;vertical-align: top; text-align: left}\n"+
"td.b_tabl { font-family: Times New, Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12pt; color: #000959; background-color: #E9FFFF;padding: 5;vertical-align:center; text-align: center}\n"+
"td.gram { font-family: Times New, Arial,Helvetica, sans-serif;font-weight: normal;  font-size: 14pt; color: #000959;background-color: #E9FFFF;padding: 5;vertical-align: center;text-align: left}\n"+
"td.h_gr { font-family: Verdana, sans-serif ,Times New ,Arial, Helvetica; font-weight: normal; font-size: 11pt; color: #081180;background-color: #D5FFF4;  padding: 5; vertical-align: top;    text-align: left}\n"+
"td.gr_l { font-family: Times New, Verdana, Tahoma, Arial,Helvetica, sans-serif; font-weight: normal;font-size: 9pt; color: #010483;background-color: #FFFFFF; padding: 0; vertical-align: top;text-align: left}\n"+
"td.gr_d { font-family: Times New, Verdana, Arial,Helvetica, sans-serif; font-weight: normal;font-size: 9pt; color: #010483;background-color: #F4FDFF;padding: 0;vertical-align: top; text-align: left}\n"+
"td.mono {  font-family: Times New, Verdana, Tahoma, Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12pt; color: #010483; background-color: #D5FFF4; padding: 5; vertical-align: top; text-align: left}\n"+
"select  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 12pt; color: #330066; font-weight: normal; background-color: #E9FFFF}\n"+
"select.wk  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 14pt; color: #3300FF; font-weight: bold; background-color: #E9FFFF}\n"+
"select.reg  {  font-family: Times New, Arial, Helvetica, sans-serif;font-size: 10pt; color: #3300FF; font-weight: bold; background-color: #E9FFFF}\n"+
"input{ font-size: 10pt}\n"+
"hr  { color: #0077FF}\n"+
"</style>");
}
