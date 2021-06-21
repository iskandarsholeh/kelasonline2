<?php
  require '../db/db_connection.php';
  $email=$_SESSION['email'];

  if(isset($_SESSION['id']))
  {
    if(@$_GET['demail'] && $_SESSION['id']=='suryapinky') 
    {
      $demail=@$_GET['demail'];
      $r1 = mysqli_query($db_connection,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
      $r2 = mysqli_query($db_connection,"DELETE FROM history WHERE email='$demail' ") or die('Error');
      $result = mysqli_query($db_connection,"DELETE FROM user WHERE email='$demail' ") or die('Error');
      header("location:dashboard.php?q=1");
    }
  }

  if(isset($_SESSION['id']))
  {
    if(@$_GET['q']== 'rmquiz' && $_SESSION['id']=='suryapinky') 
    {
      $eid=@$_GET['eid'];
      $result = mysqli_query($db_connection,"SELECT * FROM questions WHERE idq='$eid' ") or die('Error');
      while($row = mysqli_fetch_array($result)) 
      {
        $qid = $row['qid'];
        $r1 = mysqli_query($db_connection,"DELETE FROM options WHERE qid='$qid'") or die('Error');
        $r2 = mysqli_query($db_connection,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
      }
      $r3 = mysqli_query($db_connection,"DELETE FROM questions WHERE idq='$eid' ") or die('Error');
      $r4 = mysqli_query($db_connection,"DELETE FROM quiz WHERE idq='$eid' ") or die('Error');
      $r4 = mysqli_query($db_connection,"DELETE FROM history WHERE idq='$eid' ") or die('Error');
      header("location:dashboard.php?q=5");
    }
  }

  if(isset($_SESSION['id']))
  {
    if(@$_GET['q']== 'addquiz' && $_SESSION['id']=='suryapinky') 
    {
      $name = $_POST['name'];
      $name= ucwords(strtolower($name));
      $total = $_POST['total'];
      $sahi = $_POST['right'];
      $salah = $_POST['salah'];
      $id=uniqid();
      $q3=mysqli_query($db_connection,"INSERT INTO quiz VALUES  ('$id','$name' , '$sahi' , '$salah','$total', NOW())");
      header("location:dashboard.php?q=4&step=2&eid=$id&n=$total");
    }
  }

  if(isset($_SESSION['id']))
  {
    if(@$_GET['q']== 'addqns' && $_SESSION['id']=='suryapinky') 
    {
      $n=@$_GET['n'];
      $eid=@$_GET['eid'];
      $ch=@$_GET['ch'];
      for($i=1;$i<=$n;$i++)
      {
        $qid=uniqid();
        $qns=$_POST['qns'.$i];
        $q3=mysqli_query($db_connection,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
        $oaid=uniqid();
        $obid=uniqid();
        $ocid=uniqid();
        $odid=uniqid();
        $a=$_POST[$i.'1'];
        $b=$_POST[$i.'2'];
        $c=$_POST[$i.'3'];
        $d=$_POST[$i.'4'];
        $qa=mysqli_query($db_connection,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
        $qb=mysqli_query($db_connection,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
        $qc=mysqli_query($db_connection,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
        $qd=mysqli_query($db_connection,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
        $e=$_POST['ans'.$i];
        switch($e)
        {
          case 'a': $ansid=$oaid; break;
          case 'b': $ansid=$obid; break;
          case 'c': $ansid=$ocid; break;
          case 'd': $ansid=$odid; break;
          default: $ansid=$oaid;
        }
        $qans=mysqli_query($db_connection,"INSERT INTO answer VALUES  ('$qid','$ansid')");
      }
      header("location:dashboard.php?q=0");
    }
  }

  if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
  {
    $eid=@$_GET['eid'];
    $sn=@$_GET['n'];
    $total=@$_GET['t'];
    $ans=$_POST['ans'];
    $qid=@$_GET['qid'];
    $q=mysqli_query($db_connection,"SELECT * FROM answer WHERE id_question='$qid' " );
    while($row=mysqli_fetch_array($q) )
    {  $ansid=$row['optionid']; }
    if($ans == $ansid)
    {
      $q=mysqli_query($db_connection,"SELECT * FROM quiz WHERE idq='$eid' " );
      while($row=mysqli_fetch_array($q) )
      {
        $sahi=$row['sahi'];
      }
      if($sn == 1)
      {
        $q=mysqli_query($db_connection,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error');
      }
      $q=mysqli_query($db_connection,"SELECT * FROM history WHERE idq='$eid' AND email='$email' ")or die('Error115');
      while($row=mysqli_fetch_array($q) )
      {
        $s=$row['score'];
        $r=$row['sahi'];
      }
      $r++;
      $s=$s+$sahi;
      $q=mysqli_query($db_connection,"UPDATE `history` SET `score`=$s,`level`=$sn,`benar`=$r, date= NOW()  WHERE  email = '$email' AND idq = '$eid'")or die('Error124');
    } 
    else
    {
      $q=mysqli_query($db_connection,"SELECT * FROM quiz WHERE idq='$eid' " )or die('Error129');
      while($row=mysqli_fetch_array($q) )
      {
        $salah=$row['salah'];
      }
      if($sn == 1)
      {
        $q=mysqli_query($db_connection,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
      }
      $q=mysqli_query($db_connection,"SELECT * FROM history WHERE idq='$eid' AND email='$email' " )or die('Error139');
      while($row=mysqli_fetch_array($q) )
      {
        $s=$row['score'];
        $w=$row['salah'];
      }
      $w++;
      $s=$s-$salah;
      $q=mysqli_query($db_connection,"UPDATE `history` SET `score`=$s,`level`=$sn,`salah`=$w, date=NOW() WHERE  email = '$email' AND idq = '$eid'")or die('Error147');
    }
    if($sn != $total)
    {
      $sn++;
      header("location:quiz.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total&id=$eid")or die('Error152');
    }
    else if( $_SESSION['id']!='suryapinky')
    {
      $q=mysqli_query($db_connection,"SELECT score FROM history WHERE idq='$eid' AND email='$email'" )or die('Error156');
      while($row=mysqli_fetch_array($q) )
      {
        $s=$row['score'];
      }
      $q=mysqli_query($db_connection,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
      $rowcount=mysqli_num_rows($q);
      if($rowcount == 0)
      {
        $q2=mysqli_query($db_connection,"INSERT INTO rank VALUES('$email','$s',NOW())")or die('Error165');
      }
      else
      {
        while($row=mysqli_fetch_array($q) )
        {
          $sun=$row['score'];
        }
        $sun=$s+$sun;
        $q=mysqli_query($db_connection,"UPDATE rank SET score=$sun ,date=NOW() WHERE email= '$email'")or die(mysqli_error($db_connection));
      }
      header("location:quiz.php?q=result&eid=$eid&id=$eid");
    }
    else
    {
      header("location:quiz.php?q=result&eid=$eid&id=$eid");
    }
  }

  if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) 
  {
    $eid=@$_GET['eid'];
    $n=@$_GET['n'];
    $t=@$_GET['t'];
    $q=mysqli_query($db_connection,"SELECT score FROM history WHERE idq='$eid' AND email='$email'" )or die('Error156');
    while($row=mysqli_fetch_array($q) )
    {
      $s=$row['score'];
    }
    $q=mysqli_query($db_connection,"DELETE FROM `history` WHERE idq='$eid' AND email='$email' " )or die('Error184');
    $q=mysqli_query($db_connection,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
    while($row=mysqli_fetch_array($q) )
    {
      $sun=$row['score'];
    }
    $sun=$sun-$s;
    $q=mysqli_query($db_connection,"UPDATE rank SET `score`=$sun ,date=NOW() WHERE email= '$email'")or die('Error174');
    header("location:quiz.php?q=quiz&step=2&eid=$eid&n=1&t=$t&id=$eid");
  }
?>



