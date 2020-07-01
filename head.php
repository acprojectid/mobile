<?
$set['web']=false;
//header("Content-type: application/vnd.wap.xhtml+xml");
//header("Content-type: application/xhtml+xml");
header("Content-type: text/html");
echo '<?xml version="1.0" encoding="utf-8"?>';
?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
<meta name="google-site-verification"content="IhbX7fF0v0ILOT8QDZHFSsEst99M4FpFJCN-HN4yfnc" />
<title><?echo $set['title'];?></title>
<link rel="shortcut icon" href="/favicon.ico" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
 <script type="text/javascript" src="/ajax/jquery.dropdown.js"></script>

<link rel="stylesheet" href="/style/themes/<?echo $set['set_them'];?>/demo.css" type="text/css" />
<link rel="stylesheet" href="/style/themes/<?echo $set['set_them'];?>/jquery.mmenu.all.css" type="text/css" />
      
      <style type="text/css">
         .mm-menu li.img a
         {
            font-size: 16px;
         }
         .mm-menu li.img a img
         {
            float: left;
            margin: -5px 10px -5px 0;
         }
         .mm-menu li.img a small
         {
            font-size: 12px;
         }
      </style>

      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script type="text/javascript" src="/ajax/jquery.mmenu.min.all.js"></script>
      <script type="text/javascript" src="/ajax/jquery.mmenu.min.js"></script>
      <script type="text/javascript" src="/ajax/jquery.mmenu.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
      <script type="text/javascript">

         //   The menu on the left
         $(function() {
            $('nav#menu-left').mmenu();
         });


         //   The menu on the right
         $(function() {

            var $menu = $('nav#menu-right');

            $menu.mmenu({
               position   : 'right',
               classes      : 'mm-light',
               counters   : true,
               searchfield   : true,
               header      : {
                  add         : true,
                  update      : true,
                  title      : 'Full menu' 
               }
            });

           //   Click a menu-item
            var $confirm = $('#confirmation');
            $menu.find( 'li a' ).yes( '.mm-subopen' ).yes( '.mm-subclose' ).bind(
               'click.example',
               function( e )
               {
                  e.preventDefault();
                  $confirm.show().text( 'You clicked "' + $.trim( $(this).text() ) + '"' );
                  $('#menu-right').trigger( 'close' );
               }
            );
         });
      </script> 

<link rel="stylesheet" href="/style/themes/<?echo $set['set_them'];?>/anto.css" type="text/css" />
<link rel="stylesheet" href="/style/themes/<?echo $set['set_them'];?>/jquery.dropdown.css" type="text/css" />
 
   </head>

<body>
<?

if(isset($user)){
echo '<div id="page">
         <div id="header">
            <a href="#menu-left"></a>
           <img src="/style/themes/default/logo.png" width="70"/>
            <a href="#menu-right" class="friends right" id="fb_header"></a>
         </div>
<nav id="menu-left">
            <ul>
<li><a href="?view=usermenu"><img src="/style/themes/default/perhatian.png"/> Pengguna Opera Mini Klik disini</a></li>
               <li><a href="/'.$user['nick'].'">';
arvana($user['id']); 
echo ''.$user['ank_name'].'</a></li>
               <li><a href="/ank.php?id='.$user['id'].'"><img src="/style/themes/default/sunting.png"/> '.$sunting.' '.$profil.'</a></li>
               <li><a href="/info.php?id='.$user['id'].'"><img src="/style/themes/default/dinding.png"/> '.$lihat.' '.$dinding.' </a></li>';
               echo "<li><a href='/catatan/user.php?id=".$user['id']."'><img src='/style/themes/default/catatan.png'/> $catatan (".mysql_result(mysql_query("SELECT COUNT(*) FROM `blog_list` WHERE `id_user` = '".$user[id]. "'",$db),0).")</a></li>";
echo "<li><a href='/gifts.php?id=".$user['id']."'><img src='/style/themes/default/hadiah.png'/> $hadiah (".mysql_result(mysql_query("SELECT COUNT(*) FROM `gifts` WHERE `id_user` = '".$user[id]. "'",$db),0).")</a></li>";
echo "<li><a href='/fotoprofil.php?buek'><img src='/style/themes/default/photoe.png'/> Upload $poto</a></li>";
$qo = mysql_query("SELECT * FROM `group` WHERE `user` = '$user[id]' ORDER BY time DESC");
while ($lo = mysql_fetch_array($qo))
{
$po = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '$lo[id]'"));
echo ' <li> <a href="/group/index.php?id='.$lo['id'].'"><img src="/style/themes/default/group.png"/> Group: '.$lo['name'].'</a>';
}
echo '</li>';
$ro = mysql_query("SELECT * FROM `page` WHERE `user` = '$user[id]' ORDER BY time DESC");
while ($so = mysql_fetch_array($ro))
{
$to = mysql_fetch_array(mysql_query("SELECT * FROM `page` WHERE `id` = '$so[id]'"));
echo '  <li><a href="/page/index.php?id='.$so['id'].'"><img src="/style/themes/default/halaman.png"/> '.$halaman.': '.$so['name'].'</a>';
}
echo '</li>';
echo "<li><a href='/chat/'><img class=\"img\" src=\"/style/themes/$set[set_them]/chats.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Chatting </a></li>";
echo "<li><a href='/shout/'><img class=\"img\" src=\"/style/themes/$set[set_them]/shout.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Shoutbox </a></li>";
echo "<li><a href='/partner'><img class=\"img\" src=\"/style/themes/$set[set_them]/partner.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Partner</a></li>";
echo "<li><a href='/lib'><img class=\"img\" src=\"/style/themes/$set[set_them]/library.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Library</a></li>";
echo "<li><a href='/loads/'><img class=\"img\" src=\"/style/themes/$set[set_them]/loads.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Download</a></li>";
echo "<li><a href='/forum/'><img class=\"img\" src=\"/style/themes/$set[set_them]/forum1.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Forum</a></li>";
echo "<li><a href='/exit.php'><img class=\"img\" src=\"/style/themes/$set[set_them]/metu.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> $keluar</a></li>";

echo '<li><a href="/">CtM sosial Site</a></li>
            </ul>
         </nav>
         <nav id="menu-right">
            <ul>
               <li>
                  <span>'.$semua.' menu</span>
                  <ul>
                    <li class="img">
                        <a href="/users.php">
                           <img src="/style/themes/default/member.png"/>
                           Member</a>
                     </li>
                     <li class="img">
                        <a href="/gifts.php">
                           <img src="/style/themes/default/gifts.png"/>
                           Gift</a>
                     </li>

                     <li class="img">
                       <a href="/foto/">
                           <img src="/style/themes/default/gallery.png"/>
                          Gallery</a>
                     </li>

                     <li class="img">
                       <a href="/about.php">
                           <img src="/style/themes/default/about.png"/>
                           About</a>
                     </li>
                     <li class="img">
                        <a href="/rules.php">
                           <img src="/style/themes/default/privacy.png"/>
                           Privacy</a>
                     </li>
                     <li class="img">
                       <a href="http://facebook.com/cariteman.ml">
                           <img src="/style/themes/default/fanspage.gif"/>
                           Fanspage</a>
                     </li>

                    <li class="img">
                        <a href="/news/index.php.">
                           <img src="/style/themes/default/feed.png"/>
                           News Feed</a>
                     </li>

                    <li class="img">
                       <a href="/info.php">
                           <img src="/style/themes/default/profile.png"/>
                           Profile</a>
                     </li>
                     <li class="img">
                        <a href="/frend.php">
                           <img src="/style/themes/default/myfriends.png"/>
                           My Friends</a>
                     </li>
                     
                     <li class="img">
                       <a href="/mail.php">
                           <img src="/style/themes/default/pesan.png"/>
                           Mail</a>
                     </li>

                     <li class="img">
                        <a href="/catatan/">
                           <img src="/style/themes/default/notes.png"/>
                           Notes</a>
                     </li>
                     <li class="img">
                        <a href="/chat/">
                           <img src="/style/themes/default/chatroom.png"/>
                           Chat Room</a>
                     </li>

 <li class="img">
                        <a href="/forum/">
                           <img src="/style/themes/default/forums.png"/>
                          Forums</a>
                      </li>
 <li class="img">
                        <a href="/loads/">
                           <img src="/style/themes/default/downloads.png"/>
                           Downloads</a>
                     </li>

 <li class="img">
                        <a href="/lib/">
                           <img src="/style/themes/default/libraries.png"/>
                         Libraries</a>
                     </li>

 <li class="img">
                        <a href="/vote/">
                           <img src="/style/themes/default/polling.png"/>
                           Polling</a>
                     </li>

 <li class="img">
                        <a href="/page/">
                           <img src="/style/themes/default/pages1.png"/>
                           Pages</a>
                     </li>
 <li class="img">
                        <a href="/group/">
                           <img src="/style/themes/default/groups.png"/>
                           Groups</a>
                     </li>
 <li class="img">
                        <a href="/partner/">
                           <img src="/style/themes/default/partners.png"/>
                           Partners</a>
                     </li>

                  </ul>
               </li>
               
               <li>
                  <span>Games</span>
                  <ul>
                     <li class="Label">A</li>
                     <li class="img">
                        <a href="#">
                           
                                                      <small>Belum Tersedia</small>
                        </a>
                     </li>

                     
                  </ul>
               </li>

               <li>
                  <span>Zodiak</span>
                  <ul>
                     <li class="Label">D</li>
                     <li class="img">
                        <a href="#">
                           
                           <small>Belum Tersedia</small>
                        </a>
                     </li>
                   
                  </ul>
               </li>
            </ul>
         </nav>
      </div> </div> </div>';
if (isset($_GET['view']) && $_GET['view']
=='usermenu') {

echo "<div class='nfb'>";
arvana($user['id']); 

echo''.$user['ank_name'].'</div>';
echo '<div class="nfb"><a href="/info.php?id='.$user['id'].'"><img src="/style/themes/default/dinding.png"/> '.$lihat.' '.$dinding.' </a></div>';
 echo '<div class="nfb"><a href="/ank.php?id='.$user['id'].'"><img src="/style/themes/default/sunting.png"/> '.$sunting.' '.$profil.'</a></div>';
echo "<div class='nfb'><a href='/catatan/user.php?id=".$user['id']."'><img src='/style/themes/default/catatan.png'/> $catatan (".mysql_result(mysql_query("SELECT COUNT(*) FROM `blog_list` WHERE `id_user` = '".$user[id]. "'",$db),0).")</a></div>";
echo "<div class='nfb'><a href='/gifts.php?id=".$user['id']."'><img src='/style/themes/default/hadiah.png'/> $hadiah (".mysql_result(mysql_query("SELECT COUNT(*) FROM `gifts` WHERE `id_user` = '".$user[id]. "'",$db),0).")</a></div>";
echo "<div class='nfb'><a href='/fotoprofil.php?buek'><img src='/style/themes/default/photoe.png'/> Upload $poto</a></div>";
$qo = mysql_query("SELECT * FROM `group` WHERE `user` = '$user[id]' ORDER BY time DESC");
while ($lo = mysql_fetch_array($qo))
{
$po = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '$lo[id]'"));
echo ' <div class="nfb"><a href="/group/index.php?id='.$lo['id'].'"><img src="/style/themes/default/group.png"/> Group: '.$lo['name'].'</a>';
}
echo '</div>';
$ro = mysql_query("SELECT * FROM `page` WHERE `user` = '$user[id]' ORDER BY time DESC");
while ($so = mysql_fetch_array($ro))
{
$to = mysql_fetch_array(mysql_query("SELECT * FROM `page` WHERE `id` = '$so[id]'"));
echo '  <div class="nfb"><a href="/page/index.php?id='.$so['id'].'"><img src="/style/themes/default/halaman.png"/> '.$halaman.': '.$so['name'].'</a>';
}
echo '</div>';
echo "<div class='nfb'><a href='/chat/'><img class=\"img\" src=\"/style/themes/$set[set_them]/chats.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Chatting </a></div>";
echo "<div class='nfb'><a href='/shout/'><img class=\"img\" src=\"/style/themes/$set[set_them]/shout.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Shoutbox </a></div>";
echo "<div class='nfb'><a href='/partner'><img class=\"img\" src=\"/style/themes/$set[set_them]/partner.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Partner</a></div>";
echo "<div class='nfb'><a href='/lib'><img class=\"img\" src=\"/style/themes/$set[set_them]/library.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Library</a></div>";
echo "<div class='nfb'><a href='/loads/'><img class=\"img\" src=\"/style/themes/$set[set_them]/loads.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Download</a></div>";
echo "<div class='nfb'><a href='/forum/'><img class=\"img\" src=\"/style/themes/$set[set_them]/forum1.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Forum</a></div>";
echo "<div class='nfb'><a href='/mail.php?id=1'><img class=\"img\" src=\"/style/themes/$set[set_them]/lapor.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Report problem</a></div>";
echo "<div class='nfb'><a href='/games'><img class=\"img\" src=\"/style/themes/$set[set_them]/game.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> Games</a></div>";
echo "<div class='nfb'><a href='/exit.php'><img class=\"img\" src=\"/style/themes/$set[set_them]/metu.png\" id=\"facebook_logo\" alt=\"Temanku\" title=\"forceimage\" /> $keluar</a></div>";
}

echo "  <div id='content'>";
echo '<table width="100%">';
echo'<tr>';
echo '<td width="25%" class="sp">';
$not=mysql_result(mysql_query("SELECT COUNT(*) FROM `jurnal` WHERE `id_kont` = '$user[id]' AND `read` = '0'"), 0);
{
if($not>0){
echo "<span class='mfss'><a href='#mangan' data-dropdown='#dropdown-1'><font color='red'>$not</font>  Not</a></span>";
}
else
{
echo "<span class='mfss'><a href='/jurnal.php'> Not</a></span>";
}
}
echo '</td>';

echo '<td width="25%" class="sp">';
$k_new=mysql_result(mysql_query("SELECT
COUNT(*) FROM `mail`
WHERE `id_kont` = '$user[id]' AND `read` =
'0'"), 0);
if ($k_new>0)
{
if ($_SERVER['PHP_SELF']=='/new_mess.php'){
echo "<span class='mfss'><a href='#meki' data-dropdown='#dropdown-2'><font color='red'>Mail <font color='red'>$k_new</font></font></a></span>";
}
else
{
echo "<span class='mfss'><a href='#meki' data-dropdown='#dropdown-2'>Mail <font color='red'>$k_new</font></a></span>";
}
}

else
{
if ($_SERVER['PHP_SELF']=='/konts.php'){
echo "<span class='mfss'><a class='inv'  href='/mail.php?'>Mail</a></span>";
}
else
{
echo "<span class='mfss'><a href='/mail.php?'> Mail</a></span>";
}
}
echo'</td>';

echo '<td width="25%" class="sp">';
$k_f = mysql_result(mysql_query("SELECT COUNT(id) FROM `frends_new` WHERE `to` = '$user[id]' LIMIT 1"), 0);
{
if($k_f>0){
echo "<span class='mfss'><a href='/frend.php'> <font color='red'>$k_f</font> $teman</a></span>";
}
else
{
echo "<span class='mfss'><a href='/frend.php'>$teman</a></span>";
}
}

echo'</td>';
echo '<td width="25%" class="sp"><a class="inv" href="/"> '.$awal.'</font></a></td>';
echo'</tr>';
echo'</table>';
echo'</div>';

echo'</div>';
    
echo '</div></div></div></div>';
echo '<div id="dropdown-2" class="dropdown dropdown-tip">
      <ul class="dropdown-menu">';
echo "<font color='red'> ($k_new) $pesanbaru $belumdibaca ...!</font>";
$k_post=mysql_result(mysql_query("SELECT COUNT(DISTINCT `mail`.`id_user`) FROM `mail`
 LEFT JOIN `users_konts` ON `mail`.`id_user` = `users_konts`.`id_kont` AND `users_konts`.`id_user` = '$user[id]'
 WHERE `mail`.`id_kont` = '$user[id]' AND (`users_konts`.`type` IS NULL OR `users_konts`.`type` = 'common' OR `users_konts`.`type` = 'favorite') AND `mail`.`read` = '0'"),0);
//echo mysql_error(),"<br />\n";

$k_page=k_page($k_post,$set['p_str']);
$page=page($k_page);
$start=$set['p_str']*$page-$set['p_str'];

if ($k_post==0)
{
echo "  <div class='t'>";
echo "  <div class='tu'>Tidak ada pesan baru</div>";
echo "</div>";
}
else
{
$q=mysql_query("SELECT MAX(`mail`.`time`) AS `last_time`, COUNT(`mail`.`id`) AS `count`, `mail`.`id_user`, `users_konts`.`name` FROM `mail`
 LEFT JOIN `users_konts` ON `mail`.`id_user` = `users_konts`.`id_kont` AND `users_konts`.`id_user` = '$user[id]'
 WHERE `mail`.`id_kont` = '$user[id]' AND (`users_konts`.`type` IS NULL  OR `users_konts`.`type` = 'common' OR `users_konts`.`type` = 'favorite') AND `mail`.`read` = '0'
  GROUP BY `mail`.`id_user` ORDER BY `count` DESC LIMIT $start, $set[p_str]");
while ($kont = mysql_fetch_assoc($q))
{
echo '<li class="dropdown-divider"></li>';
echo "<div class='ib'>";
$anek=get_user($kont['id_user']);
avatar($anek['id']);

if ($anek)
echo "<div class='c'><a href='/mail.php?id=$anek[id]'><b>".($kont['name']?$kont['name']:$anek['ank_name'])."</b></a>".online($anek['id'])." (+$kont[count])<br />";
else
echo "<a href='/mail.php?id=$anek[id]'>[DELETED] (+$kont[count])<br />";
echo "<span class='mfss fcg'>$kirims: ";
if ($user['lang']==0){
echo"".waktu($kont['last_time'])."</span>";
}elseif ($user['lang']==1){
echo"".eng($kont['last_time'])."</span>";
}
echo "<br/></div></div>";
}
}


echo'</li></div>';
    

echo '<div id="dropdown-1" class="dropdown dropdown-tip">
      <ul class="dropdown-menu">';
               echo "<font color='red'>$not $pemberitahuan  $belumdibaca ...!</font><br/>";
$q=mysql_query("SELECT * FROM `jurnal` WHERE `read` = '0' AND `id_user` = '0' AND `id_kont` = '".$user['id']."' ORDER BY id DESC LIMIT 20");
while ($post = mysql_fetch_array($q)){
echo '<li class="dropdown-divider"></li>';
echo ' <div class="row"><a href="/jurnal.php?id='.$post['id'].'&amp;redir='.output_text($post['link']).'"> '.output_text($post['text1']).' '.output_text($post['text2']).' '.output_text($post['text3']).'';
echo "  <span class='mfss fcg'>";
if ($user['lang']==0){
echo" ".waktu($post['time'])."";
}elseif ($user['lang']==1){
echo" ".eng($post['time'])."";
}
echo '</span></a></div>';
}
echo '<li class="dropdown-divider"></li>';
echo "<a href='/jurnal.php'><font color='red'>$lihat $semua $pemberitahuan</font></a>";
    
echo ' </ul>
   </div></div></div></div>';
}


if(!isset($user)){
echo '<script type="text/javascript" src="/ajax/jquery-1.3.2.min.js"></script><script type="text/javascript" src="/ajax/login.js"></script>';
echo "<div class=\"anto\" id=\"root\"><table cellspacing=\"0\" cellpadding=\"0\" class=\"lr\"><tr><td valign=\"top\">
<div class=\"header_logo\"><a href=\"/index.php\"><img src='/style/themes/default/logo.png' width='70'/>
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
