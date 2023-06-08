# SQL-classroom-rental-system
<h2>打開方式</h2>
<p>clone 到 Appserv/www 的資料夾 </p>
<p>執行後網址欄格式:</p>
<p>http://localhost/SQL-classroom-rental-system/index.php</p>
<p>（每層資料夾都要打清楚才進得去QQ）</p>

<h2>連接phpMyAdmin</h2>
<a href='https://www.youtube.com/watch?v=cu0hatjEUTo&ab_channel=VideoStorehouse'>https://www.youtube.com/watch?v=cu0hatjEUTo&ab_channel=VideoStorehouse</a>
<p>打開config.inc.php貼上(路徑(windows): C:\AppServ\www\phpMyAdmin\config.sample.inc.php)->要把config.sample.inc.php改名成config.inc.php</p>
<p>/**</p>
 <p>* Second server</p>
 <p>*/</p>
<p>$i++;</p>
<p>/* Authentication type */</p>
<p>$cfg['Servers'][$i]['auth_type'] = 'cookie';</p>
<p>/* Server parameters */</p>
<p>$cfg['Servers'][$i]['host'] = '140.122.184.125';</p>
<p>$cfg['Servers'][$i]['port'] = '3307';</p>
<p>$cfg['Servers'][$i]['connect_type'] = 'tcp';</p>
<p>$cfg['Servers'][$i]['compress'] = false;</p>
<p>$cfg['Servers'][$i]['AllowNoPassword'] = false;</p>
