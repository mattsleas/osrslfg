# osrslfg

'''php
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
 //<link rel="icon" href="/phpproject1/favicon.png">
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

'''

'''css

body {
  padding: 20px;
  color: #373737;
  font-size: 62.5%;
  line-height: 2.0em;
}

/*this is the username formatting*/
h2{
  font-size: 40px;
  font-family: monospace; 
  font-weight: bold;
  word-spacing: 275px;
}

h4{
line-height: 10%  
}

/* div is border and inside of the user info boxes*/
div {
    width:250px;
    border:3px solid;
    padding: 20px 50px 20px -50px;

    text-align: center;
    margin:20px 50px 20px 30px;
    
    font-family: monospace;

    color: #373737;
    
    display:inline-block;
//    margin-right: auto;
//    margin-left: auto;
}


legend {
  font-size: 40px;
  font-family: monospace;
}

/*fieldset is the background of the find a group box, doesnt include the border tho */
fieldset {
width: 375px;
padding: 15px;

text-align: center;
}

input[type=radio] {
  opacity: 0;
  text-align: center;
  float:left;
}

input[type=radio] + label {
  margin: 0 0 0 0px;
  position: relative;
  cursor: pointer;
  font-size: 16px;
  font-family: monospace;
  float: center;
  
}

input[type=radio] + label ~ label {
  margin: 0 0 0 40px;
 
  
}

input[type=radio] + label::before {
  content: ' ';
  position: absolute;
  left: -35px;
  top: -3px;
  width: 25px;
  height: 25px;
  display: block;
  background: white;
  border: 1px solid #A9A9A9;
}

input[type=radio] + label::after {
  content: ' ';
  position: absolute;
  left: -35px;
  top: -3px;
  width: 23px;
  height: 23px;
  display: block;
  z-index: 1;
  background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjE4MS4yIDI3MyAxNyAxNiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAxODEuMiAyNzMgMTcgMTYiPjxwYXRoIGQ9Ik0tMzA2LjMgNTEuMmwtMTEzLTExM2MtOC42LTguNi0yNC04LjYtMzQuMyAwbC01MDYuOSA1MDYuOS0yMTIuNC0yMTIuNGMtOC42LTguNi0yNC04LjYtMzQuMyAwbC0xMTMgMTEzYy04LjYgOC42LTguNiAyNCAwIDM0LjNsMjMxLjIgMjMxLjIgMTEzIDExM2M4LjYgOC42IDI0IDguNiAzNC4zIDBsMTEzLTExMyA1MjQtNTI0YzctMTAuMyA3LTI1LjctMS42LTM2eiIvPjxwYXRoIGZpbGw9IiMzNzM3MzciIGQ9Ik0xOTcuNiAyNzcuMmwtMS42LTEuNmMtLjEtLjEtLjMtLjEtLjUgMGwtNy40IDcuNC0zLjEtMy4xYy0uMS0uMS0uMy0uMS0uNSAwbC0xLjYgMS42Yy0uMS4xLS4xLjMgMCAuNWwzLjMgMy4zIDEuNiAxLjZjLjEuMS4zLjEuNSAwbDEuNi0xLjYgNy42LTcuNmMuMy0uMS4zLS4zLjEtLjV6Ii8+PHBhdGggZD0iTTExODcuMSAxNDMuN2wtNTYuNS01Ni41Yy01LjEtNS4xLTEyLTUuMS0xNy4xIDBsLTI1My41IDI1My41LTEwNi4yLTEwNi4yYy01LjEtNS4xLTEyLTUuMS0xNy4xIDBsLTU2LjUgNTYuNWMtNS4xIDUuMS01LjEgMTIgMCAxNy4xbDExNC43IDExNC43IDU2LjUgNTYuNWM1LjEgNS4xIDEyIDUuMSAxNy4xIDBsNTYuNS01Ni41IDI2Mi0yNjJjNS4yLTMuNCA1LjItMTIgLjEtMTcuMXpNMTYzNC4xIDE2OS40bC0zNy43LTM3LjdjLTMuNC0zLjQtOC42LTMuNC0xMiAwbC0xNjkuNSAxNjkuNS03MC4yLTcxLjljLTMuNC0zLjQtOC42LTMuNC0xMiAwbC0zNy43IDM3LjdjLTMuNCAzLjQtMy40IDguNiAwIDEybDc3LjEgNzcuMSAzNy43IDM3LjdjMy40IDMuNCA4LjYgMy40IDEyIDBsMzcuNy0zNy43IDE3NC43LTE3Ni40YzEuNi0xLjcgMS42LTYuOS0uMS0xMC4zeiIvPjwvc3ZnPg==') no-repeat center center;
  -ms-transition: all .2s ease;
  -webkit-transition: all .2s ease;
  transition: all .3s ease;
  -ms-transform: scale(0);
  -webkit-transform: scale(0);
  transform: scale(0);
  opacity: 0;
  
}

input[type=radio]:checked + label::after {
  -ms-transform: scale(1);
  -webkit-transform: scale(1);
  transform: scale(1);
  opacity: 1;
  
}
/* inside of the text boxes*/
input[type=text]  {
  position: relative;
  font-size: 16px;
  font-family: monospace;
  float: center;
  text-align: center;
}

input[type=submit]{
    background-color: #10D1D1;
    border: none;
    color:black;
    padding: 15px 32px;
    text-align: center;
    font-family: monospace;
    display: inline-block;
    font-size: 20px;
    font-weight:bold;
    width: 200px;
    text-align: center;

}

'''

