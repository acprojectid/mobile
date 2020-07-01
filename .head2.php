<?
$set['web']=false;
//header("Content-type: application/vnd.wap.xhtml+xml");
//header("Content-type: application/xhtml+xml");
header("Content-type: text/html");
echo '<?xml version="1.0" encoding="utf-8"?>';
?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head><title><?echo $set['title'];?></title>
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" href="/style/themes/<?echo $set['set_them'];?>/anto.css" type="text/css" />

<script type="text/javascript" src="/ajax/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/ajax/login.js"></script>
<script type="text/javascript" src="/ajax/butonmenu.js"></script>
    
</head>

<body>
<?

if(isset($user)){

echo "<div class=\"mfsm\" id=\"root\"><div class=\"anto\" id=\"fb_header\"><table width='100%'><tr><td valign=\"top\">";
echo '<center><div id="loginContainer"><a href="#" id="loginButton"><span><img src="/style/themes/default/kontak.png" width="20" height="20"/></span></a>';
echo '<div style="clear:both"></div><div id="loginBox"><div id="loginForm"><fieldset id="body"><fieldset>';
echo "<form class='mess' method='post' action='/reg.php?$passgen'>\n";
echo "Masukan Nama Pengguna Tanpa spasi <br /><input class='logen' type='text' name='nick' value='3-32 karakter' onfocus='this.select()' style='padding:5px' width='40%'  maxlength='32' />\n";
echo "<br /> <font color='#ff0000'>Gunakan Nama Pengguna yang singkat, karena ini untuk LOGIN anda nanti.</font><br /><br />\n";
echo "<span class='mfss fcg'>Dengan mendaftar, Anda otomatis setuju dengan <a href='/rules.php'>Peraturan ".$arvanasoft."</a></span><br />\n";
echo "<input type='submit' class='btn' value='Lanjutkan' />\n";
echo "</form></div>\n";
echo '</fieldset></div></center></div>';
echo '<div id="menuContainer"><a href="#" id="menuButton"><span><img src="/style/themes/default/open.png" width="20" height="20"/></span></a>';
echo '<div style="clear:both"></div><div id="menuBox"><div id="menuForm">';
echo '<a href="/'.$user['nick'].'">';
avatar($user['id']); 
echo ''.$user['ank_name'].'</a>';
echo"<div class='row'></div>";
echo '<a href="/ank.php?id='.$user['id'].'"><img src="/style/themes/default/sunting.png"/> '.$sunting.' '.$profil.'</a>';
echo"<div class='row'></div>";
echo '<a href="/info.php?id='.$user['id'].'"><img src="/style/themes/default/dinding.png"/> '.$lihat.' '.$dinding.' </a>';
echo"<div class='row'></div>";
echo "<a href='/catatan/user.php?id=".$user['id']."'><img src='/style/themes/default/catatan.png'/> $catatan (".mysql_result(mysql_query("SELECT COUNT(*) FROM `blog_list` WHERE `id_user` = '".$user[id]. "'",$db),0).")</a>";
echo"<div class='row'></div>";
echo "<a href='/gifts.php?id=".$user['id']."'><img src='/style/themes/default/hadiah.png'/> $hadiah (".mysql_result(mysql_query("SELECT COUNT(*) FROM `gifts` WHERE `id_user` = '".$user[id]. "'",$db),0).")</a>";
echo"<div class='row'></div>";
echo "<a href='/fotoprofil.php?buek'><img src='/style/themes/default/photoe.png'/> Upload $poto</a>";
echo"<div class='row'></div>";
$qo = mysql_query("SELECT * FROM `group` WHERE `user` = '$user[id]' ORDER BY time DESC");
while ($lo = mysql_fetch_array($qo))
{
$po = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '$lo[id]'"));
echo '  <a href="/group/index.php?id='.$lo['id'].'"><img src="/style/themes/default/group.png"/> Group: '.$lo['name'].'</a>';
}
echo"<div class='row'></div>";
$ro = mysql_query("SELECT * FROM `page` WHERE `user` = '$user[id]' ORDER BY time DESC");
while ($so = mysql_fetch_array($ro))
{
$to = mysql_fetch_array(mysql_query("SELECT * FROM `page` WHERE `id` = '$so[id]'"));
echo '  <a href="/page/index.php?id='.$so['id'].'"><img src="/style/themes/default/halaman.png"/> '.$halaman.': '.$so['name'].'</a>';
}
echo"<div class='row'></div>";
echo "<a href='/chat/'><img class=\"img\" src=\"/style/themes/$set[set_them]/chats.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Chatting </a>";
echo"<div class='row'></div>";
echo "<a href='/shout/'><img class=\"img\" src=\"/style/themes/$set[set_them]/shout.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Shoutbox </a>";
echo"<div class='row'></div>";
echo "<a href='/partner'><img class=\"img\" src=\"/style/themes/$set[set_them]/partner.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Partner</a>";
echo"<div class='row'></div>";
echo "<a href='/lib'><img class=\"img\" src=\"/style/themes/$set[set_them]/library.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Library</a>";
echo"<div class='row'></div>";
echo "<a href='/loads/'><img class=\"img\" src=\"/style/themes/$set[set_them]/loads.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Download</a>";
echo"<div class='row'></div>";
echo "<a href='/forum/'><img class=\"img\" src=\"/style/themes/$set[set_them]/forums.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Forum</a></li>";
echo "</div>\n";
echo '</div></div>';
echo '<center>';
echo "<span class='mfss'><a href='/'><img class=\"img\" src=\"/style/themes/$set[set_them]/home.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" width=\"23\" height=\"23\" /></a></span>";
$k_t = mysql_result(mysql_query("SELECT COUNT(id) FROM `status_list` WHERE `msg` = '$user[id]' LIMIT 1"), 0);
{
if($k_t>0){
echo "<span class='mfss'><a href='/status/mentions.php?tag=@$user[nick]'><font color='#ff0000'>$k_t</font>          <img class=\"img\" src=\"/style/themes/$set[set_them]/tag.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" width=\"23\" height=\"23\" /></a></span>";
}
else
{
echo "<span class='mfss'><a href='/status/mentions.php?tag=@$user[nick]'>          <img class=\"img\" src=\"/style/themes/$set[set_them]/tag.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" width=\"23\" height=\"23\" /></a></span>";
}
}

$k_f = mysql_result(mysql_query("SELECT COUNT(id) FROM `frends_new` WHERE `to` = '$user[id]' LIMIT 1"), 0);
{
if($k_f>0){
echo "<span class='mfss'><a href='/frend.php'>          <span class='noti_bubble'>$k_f</span><img src='/style/themes/$set[set_them]/konco2.png' width=\"23\" height=\"23\" /></a></span>";
}
else
{
echo "<span class='mfss'><a href='/frend.php'>          <img class=\"img\" src=\"/style/themes/$set[set_them]/konco.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" width=\"23\" height=\"23\" /></a></span>";
}
}


$not=mysql_result(mysql_query("SELECT COUNT(*) FROM `jurnal` WHERE `id_kont` = '$user[id]' AND `read` = '0'"), 0);
{
if($not>0){
echo "<span class='mfss'><a class='inv' href='/index.php?jurnal=jurnel'>          <span class='noti_bubble'>$not</span><img class=\"img\" src=\"/style/themes/$set[set_them]/globe2.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" width=\"23\" height=\"23\" /></a></span>";
}
else
{
echo "<span class='mfss'><a href='/jurnal.php'>          <img class=\"img\" src=\"/style/themes/$set[set_them]/globe.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" width=\"23\" height=\"23\" /></a></span>";
}
}
$k_new=mysql_result(mysql_query("SELECT
COUNT(*) FROM `mail`
WHERE `id_kont` = '$user[id]' AND `read` =
'0'"), 0);
if ($k_new>0)
{
if ($_SERVER['PHP_SELF']=='/new_mess.php'){
echo "<span class='mfss'><a class='inv' href='/?pesan=baru'>          <img class=\"img\" src=\"/style/themes/$set[set_them]/mails2.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" width=\"23\" height=\"23\" /><span class='noti_bubble'>$k_new</span></a></span>";
}
else
{
echo "<span class='mfss'><a class='inv' href='/?pesan=baru'>          <img class=\"img\" src=\"/style/themes/$set[set_them]/mails2.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" width=\"23\" height=\"23\" /><span class='noti_bubble'>$k_new</span></a></span>";
}
}

else
{
if ($_SERVER['PHP_SELF']=='/konts.php'){
echo "<span class='mfss'><a class='inv'  href='/mail.php?'>          <img class=\"img\" src=\"/style/themes/$set[set_them]/mails.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" width=\"23\" height=\"23\" /></a></span>";
}
else
{
echo "<span class='mfss'><a href='/mail.php?'>          <img class=\"img\" src=\"/style/themes/$set[set_them]/mails.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" width=\"23\" height=\"23\" /></a></span>";
}
}
echo'</center>';
echo'</td></tr>';
echo'</table>';
echo'</div></div>';
if (isset($_GET['pesan']) && $_GET['pesan']
=='baru') {

include_once 'new_mss.php';

}
}

if(!isset($user)){

echo "<div class=\"anto\" id=\"root\"><table cellspacing=\"0\" cellpadding=\"0\" class=\"lr\"><tr><td valign=\"top\">
<div class=\"header_logo\"><a href=\"/index.php\"><br/><font color='white'>CariTeman.mL</font>
</a></div></td>";

echo "<td valign=\"top\" class=\"r\">";
echo '<center><div id="loginContainer"><a href="#" id="loginButton"><span>Daftar</span><em></em></a>';
echo '<div style="clear:both"></div><div id="loginBox"><div id="loginForm"><fieldset id="body"><fieldset>';
echo "<form class='mess' method='post' action='/reg.php?$passgen'>\n";
echo "Masukan Nama Pengguna Tanpa spasi <br /><input class='logen' type='text' name='nick' value='3-32 karakter' onfocus='this.select()' style='padding:5px' width='40%'  maxlength='32' />\n";
echo "<br /> <font color='#ff0000'>Gunakan Nama Pengguna yang singkat, karena ini untuk LOGIN anda nanti.</font><br /><br />\n";
echo "<span class='mfss fcg'>Dengan mendaftar, Anda otomatis setuju dengan <a href='/rules.php'>Peraturan ".$arvanasoft."</a></span><br />\n";
echo "<input type='submit' class='btn' value='Lanjutkan' />\n";
echo "</form></div>\n";
echo '</fieldset></div></center></div>';
echo "</td></tr></table></div>";}

?>
