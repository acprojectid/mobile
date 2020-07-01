<?php

// Mod by : Anto van Griffen
// Site : www.tmanku.tk
// Hargailah privasi orang lain

include_once './sys/inc/settings.php';
include_once './sys/inc/db_tables';
include_once './sys/inc/user.php';
include_once './sys/inc/lang.php';
list($msec, $sec) = explode(chr(32), microtime());

if(!isset($user))
{
echo "  <div id='content'>";
echo"<div class='t'>";
echo '<center><a href="/ctmbetaversion.apk"> <img src="/style/themes/default/android.png" width="150px"></a></center>';

echo "</div></div>";
echo"<div class='kompo'>";
echo"<br /><span><a href='/rules.php'><font color='white'>$bantuan</font></a></span> |  </span> <span><a href='http://facebook.com/cariteman.ml'/> <font color='white'>fanpages</font></a></span> |  <span><a href='/tentang.php'><font color='white'>About us</font></a></span> | <span><a href='/aut.php'><font color='white'>$masuk</font></a></span> | <span><a href='/reg.php'><font color='white'>$daftar</font></a></span> | <span><a href='/partner/friends.php'><font color='white'>Partners</font></a></span> | 
<span><a href='/users.php'><font color='white'>$member: ".mysql_result(mysql_query("SELECT COUNT(*) FROM `user`"), 0)."</font></a> </span> | <span><a href='/online.php'><font color='white'> Online :  ".mysql_result(mysql_query("SELECT COUNT(*) FROM `user` WHERE `date_last` > ".(time()-600).""), 0)."</font></a></span> | <span><a href='/online_g.php'><font color='white'>Visitor :  ".mysql_result(mysql_query("SELECT COUNT(*) FROM `guests` WHERE `date_last` > ".(time()-600)." AND `pereh` > '0'"), 0)."</font></a></span></div>";
echo"<div class='anto'><center><a href='http://fb.com/vangriffens'/> <font color='white'> © CtM 2013. All Rights Reserved </font></a></center></div>\n";
echo "</div><div class='togo'></div>";
}
else
{
echo"<div class='togo'></div>";
echo "<div class='kompo'>";
echo '<table width="100%"><tr><td width="25%" class="ps"><a href="/index.php"> <font color="#ffffff"><img src="/img/home2.gif" alt="culek"></font></a></font></a></td>';
echo '<td width="25%" class="ps"><a  href="/'.$user['nick'].'"><font color="#ffffff"><img src="/img/propele.png" alt="culek"></font></a></font></a></td>';
echo '<td width="25%" class="ps"><a href="/frend.php"><font color="#ffffff"><img src="/img/plend.png" alt="culek"></font></a></font></a></td>';
echo '<td width="25%" class="ps"><a href="/search.php"><font color="#ffffff"><img src="/img/search.png" alt="culek"></font></a></td></tr></table></div>';

echo '<div class="abt acw apm" id="search">';
echo '<form method="post" action="/users.php?go">';
echo '<table cellspacing="0" cellpadding="0" class="comboInput"><tr><td class="inputCell"><input class="logen" name="usearch" value="" size="20" type="text"><td><input value="'.$cari.'" class="btn" type="submit"></td></tr></table></form>';
echo "</div>";
echo "<div class='al aps' id='m_more_item'><center>Member online | <a class=\"inv\" href=\"#fb_header\">[ ^ ] $top</a></center></div>";

$ife=mysql_result(mysql_query("SELECT COUNT(*) FROM `user` WHERE `date_last` > ".(time()-600).""), 0);
echo "<div class='t'>";
if($ife>0)
{
if (isset($user) && mysql_result(mysql_query("SELECT COUNT(*) FROM `user` WHERE `date_last` > ".(time()-600).""), 0)==1)
{
echo "<a href='/info.php'>$hanyasaya :( </a>";
}
else
{
$q = mysql_query("SELECT * FROM `user` WHERE `date_last` > '".(time()-600)."' ORDER BY `date_last` DESC LIMIT 7");
while ($ank = mysql_fetch_array($q))
{
$u_on[]="<a href='/$ank[nick]'><span style=\"color:$ank[ncolor]\">$ank[ank_name]</span></a> ";
}
echo implode(', ',$u_on).' ';
}
}

if($ife>7){
$sisa=$ife-7;
echo "<a href='/urang_on.php'>dan $sisa Jg ol.</a>";
}
echo "</span></div>";

echo "  <div id='content'>";
echo"<div class='t'>";
echo '<center><a href="/ctmbetaversion.apk"> <img src="/style/themes/default/android.png" width="150px"></a></center>';

echo "</div></div>";

echo"<div class='kompo'>";


if (isset($_POST['saved'])){
if (isset($_POST['set_them']) && preg_match('#^([A-z0-9\-_\(\)]+)$#ui', $_POST['set_them']) && is_dir(H.'style/themes/'.$_POST['set_them']))
{
$user['set_them']=$_POST['set_them'];
mysql_query("UPDATE `user` SET `set_them` = '$user[set_them]' WHERE `id` = '$user[id]' LIMIT 1");
}
elseif (isset($_POST['set_them2']) && preg_match('#^([A-z0-9\-_\(\)]+)$#ui', $_POST['set_them2']) && is_dir(H.'style/themes/'.$_POST['set_them2']))
{
$user['set_them2']=$_POST['set_them2'];
mysql_query("UPDATE `user` SET `set_them2` = '$user[set_them2]' WHERE `id` = '$user[id]' LIMIT 1");
}
else $err='Kesalahan Pemasangan Tema';

if (isset($_POST['lang']) && ($_POST['lang']==1 || $_POST['lang']==0))
{
$user['lang']=intval($_POST['lang']);
mysql_query("UPDATE `user` SET `lang` = '$user[lang]' WHERE `id` = '$user[id]' LIMIT 1");
}
else $err='Kesalahan Modus Tampilkan Gambar';

if (!isset($err))msg('Perubahan Tersimpan Silahkan Reload Halaman');
header("Location: /index.php?".SID);
}
echo "<form method='post' action='?$passgen'>\n";
echo " $bahasa / $tema :<br />\n<select name='lang'>\n";
echo "<option value='1'".($user['lang']==1?" selected='selected'":null).">English</option>\n";
echo "<option value='0'".($user['lang']==0?" selected='selected'":null).">indonesia</option>\n";
echo "</select>\n";
echo "  <select name='set_them".($webbrowser?'2':null)."'>\n";
$opendirthem=opendir(H.'style/themes');
while ($themes=readdir($opendirthem)){

if ($themes=='.' || $themes=='..' || !is_dir(H."style/themes/$themes"))continue;

if (file_exists(H."style/themes/$themes/.only_for_".($webbrowser?'wap':'web')))continue;

echo "<option value='$themes'".($user['set_them'.($webbrowser?'2':null)]==$themes?" selected='selected'":null).">".trim(file_get_contents(H.'style/themes/'.$themes.'/them.name'))."</option>\n";
}
closedir($opendirthem);
echo "</select>\n";
echo "<input class='btnF' type='submit' name='saved' value='$simpan' />\n";
echo "</form>\n";
echo "</span><br/>";


echo "<span><a href='/settings'><font color='white'>$pengaturan</font></a></span> <font color='white'>|</font> <span><a href='/rules.php'><font color='white'>$privasi</font></a></span> <font color='white'>|</font> <span><a href='/partner/friends.php'><font color='white'>Partners</font></a></span> | <span><a href='/invite.php'><font color='white'>$undang</font></a></span> <font color='white'>|</font> <span><a href='/admin.php'><font color='white'>$admin</font></a></span> | <span><a href='/online.php'> <font color='white'>Online :  ".mysql_result(mysql_query("SELECT COUNT(*) FROM `user` WHERE `date_last` > ".(time()-600).""), 0)." </font></a></span> <font color='white'>|</font> <span><a href='/online_g.php'><font color='white'>Visitor :  ".mysql_result(mysql_query("SELECT COUNT(*) FROM `guests` WHERE `date_last` > ".(time()-600)." AND `pereh` > '0'"), 0)."</font></a></span> <font color='white'>|</font> <span><a href='/users.php'><font color='white'>$member : ".mysql_result(mysql_query("SELECT COUNT(*) FROM `user`"), 0)."</font></a> </span> <font color='white'>|</font> <span><a href='http://facebook.com/cariteman.ml'/> <font color='white'>fanpages</font></a></span><font color='white'>|</font> <br /><span><a href='/exit.php'><font color='white'>$keluar</font></a> ( $user[ank_name] ) </span>";
if (user_access('adm_panel_show'))
echo "<span><a href='/adm_panel/'><b>Admin Panel</b></a></div></div>";
echo "</div>";
echo"<div class='anto'>\n";
echo"<center><a href='http://facebook.com/vangriffens'/> <font color='white'> © CtM 2013. All Rights Reserved </font></a></center>";
echo "</div><div class='togo'></div>";

exit;
}
?>
