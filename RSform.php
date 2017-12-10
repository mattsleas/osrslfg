<?php

$connection=mysqli_connect("localhost","root","","rsdb");

if($connection){
    echo "connection established! <br><br><br>";
} 
else{
    die("connection failed. Reason:".mysqli_connect_error());
}
?>
<link href="DisplayBox.css" rel="stylesheet" type="text/css"/>

 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>OSRS LFG</title>
 <link rel="icon" href="/phpproject1/favicon.png">
 </head>
<fieldset>
<legend>Find a Group</legend>
<h1>Oldschool Username</h1>
<input type="text" placeholder="User Name" name="username" required /><br>
<h1>Combat Level</h1>
<input type="text" placeholder="Combat" name="cmbt" required /><br>
<h1>Activity</h1>

      <input type="radio" value="pvp" id="pvp" name="activity" checked/>
      <label for="pvp" class="radio" >PVP</label>
      <input type="radio" value="pve" id="pve" name="activity" />
      <label for="pve" class="radio">PVE</label>
    
<br>

<p>
 <label>
 <input type="submit" name="submit" id="submit" value="Submit" />
 </label>
</p>

<h1>NOTE: Set private chat ON to be contacted by other players.</h1>
</fieldset>







<?php
$username=$_POST['username'];
$cmbt=$_POST['cmbt'];
$activity=$_POST['activity'];
$sql="insert into rstable (username, cmbt, activity) values('$username','$cmbt','$activity')";
    if(!mysqli_query($connection,$sql)){
          echo "<h3>persons's data is NOT inserted successfully</h3>";
    }  
    
?>


<br><br><br>
<legend>Find Players</legend>

<p>
<?php
$atk="<img src='/PhpProject1/skill_icon_attack1.gif' alt ='atk' />";
$str="<img src='/PhpProject1/skill_icon_strength1.gif' alt ='str' />";
$def="<img src='/PhpProject1/skill_icon_defence1.gif' alt ='def' />";
$hp="<img src='/PhpProject1/skill_icon_hitpoints1.gif' alt ='hp' />";
$magic="<img src='/PhpProject1/skill_icon_magic1.gif' alt ='magic' />";
$rng="<img src='/PhpProject1/skill_icon_ranged1.gif' alt ='rng' />";
$clock="<img src='/PhpProject1/clock2.png' alt ='time' />";

$sql="SELECT id, username, cmbt, activity FROM rstable";
$results = mysqli_query($connection,$sql);

if(mysqli_num_rows($results) > 0) 
    {
    While($row=mysqli_fetch_array($results)) {
    //this is where the table formatting should go. $row[1]
        //echo "<p>";
        echo"<div>";
        //echo "<h5>";
        echo "<p>";
        //echo "<h1>Username</h1>";
        echo "<h2>$row[1]</h2>";

        echo "<h1>Combat Level $row[2] </h1>";

        echo "<h1>$atk 99     $str 99   $def 99   </h1>";
        echo "<h1>$hp 99     $magic 99   $rng 99   </h1>";

        echo "<h1>$row[3]</h1>";
    //i wanna shift clock down
        echo "<h1>$clock 1h</h1>";
       //echo "</p>";
        //echo "</h5>";
        echo "</div>";
    }
}      

mysqli_close($connection);
?>
