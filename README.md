# SQL-classroom-rental-system
<h2>打開方式</h2>
<p>clone 到 Appserv/www 的資料夾 </p>
<p>執行後網址欄格式:</p>
<p>http://localhost/SQL-classroom-rental-system/index.php</p>
<p>（每層資料夾都要打清楚才進得去QQ）</p>

<h2>連接phpMyAdmin</h2>
<a href='https://www.youtube.com/watch?v=cu0hatjEUTo&ab_channel=VideoStorehouse'>影片</a>
<p>打開config.inc.php貼上</p>
<div>/**
 * Second server
 */
$i++;
/* Authentication type */
$cfg['Servers'][$i]['auth_type'] = 'cookie';
/* Server parameters */
$cfg['Servers'][$i]['host'] = '140.122.184.125';
$cfg['Servers'][$i]['port'] = '3307';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['compress'] = false;
$cfg['Servers'][$i]['AllowNoPassword'] = false;</div>
