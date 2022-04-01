<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="../css/admin.css">
  <script src="../js/time.js"></script>
  <script src="../js/scroll.js"></script>
</head>

<body onload="initClock()">
  <?php
  session_start();
  include("../include/connection.php");
  ?>
  <!-- navbar -->
  <nav class="navbar">
    <div class="navbar2">
      <div class="navbar3">
        <h1 class="logo">Railway Reservation System <h3>admin</h3>
        </h1>
        <ul class="nav nav-right">
        <li><a href="../php/home.php">Home</a></li>
        <li class='menu__group'><a href='../include/logout.php' class='menu'>Log Out</a></li>
          <li class="menu__group">
            <div class="datetime">
              <div class="date">
                <span id="dayname">Day</span>,
                <span id="month">Month</span>
                <span id="daynum">00</span>,
                <span id="year">Year</span>
              </div>
              <div class="time">
                <span id="hour">00</span>:
                <span id="minutes">00</span>:
                <span id="seconds">00</span>
                <span id="period">AM</span>
              </div>
            </div>
            </p>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- <div class="leftbar">
    <div class="add">
      <ul>
        <li><button id="btnitrain"> Add Train</button></li>
        <li><button id="btnitour"> Add Tour</button></li>
        <li><button id="btniadmin"> Add Admin</button></li>
      </ul>
    </div>
    <div>
      <ul>
        <li><button>Update Train</button></li>
        <li><button>Update Tour</button></li>
        <li><button>Update Admin</button></li>
        <li><button>Update Fare</button></li>
      </ul>
    </div>
    <div class="delete">
      <ul>
        <li><button>Delete Train</button></li>
        <li><button>Delete Tour</button></li>
        <li><button>Delete Admin</button></li>

      </ul>
    </div>
    <div class="view">
      <ul>
        <li><button>Show Train</button></li>
        <li><button>Show Fare</button></li>
        <li><button>TOTAL ticket booked</button></li>
      </ul>
    </div>
  </div> -->
  <div class="main">
    <div class="mainadd">
      <form method="POST" class='addtrain'>
        <h2>Add Train</h2>
        <label>Train Name</label>
        <input type="text" name="tname" required>
        <label>Train Date</label>
        <input type="date" name="tdate" required>
        <label>Arrival Time</label>
        <input type="time" name="tatime" required>
        <label>Depature Time</label>
        <input type="time" name="tdtime" required>
        <label>Tour</label>
        <select name="tourname" required>
          <?php
          $des_search = "select * from tour;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[Tour_id],$des[Source_station_id],$des[Destination_station_id]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }
          ?>
        </select float:right;">
        <label>Train category</label>
        <select name="tcat" required>
          <?php
          $des_search = "select * from train_category;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[train_cat_id],$des[train_type]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }

          ?>
        </select><br>

        <input type="submit" name="inserttrain" class="insert" value="Submit" required>
      </form>
      <?php

      $select = "SELECT * FROM `sequence`";
      $select_q = mysqli_query($con, $select);
      $arr = mysqli_fetch_assoc($select_q);
      if (isset($_SESSION['somevalue'])) {
        $somevalue = $arr['train'];
      } else {
        $somevalue = $arr['train'];
        $_SESSION['somevalue'] = $arr['train'];
      }
      // if (isset($_SESSION['somevalue2'])) {
      //   $somevalue2 = $_SESSION['somevalue2'];
      // } else {
      //   $somevalue2 = 7;
      // }

      if (isset($_POST['inserttrain'])) {
        $_SESSION['tname'] = mysqli_real_escape_string($con, @$_REQUEST['tname']);
        $_SESSION['tdate'] = mysqli_real_escape_string($con, @$_REQUEST['tdate']);
        $_SESSION['tatime'] = mysqli_real_escape_string($con, @$_REQUEST['tatime']);
        $_SESSION['tdtime'] = mysqli_real_escape_string($con, @$_REQUEST['tdtime']);
        $_SESSION['tourname'] = mysqli_real_escape_string($con, @$_REQUEST['tourname']);
        $_SESSION['tcat'] = mysqli_real_escape_string($con, @$_REQUEST['tcat']);
        $_SESSION['tfac'] = mysqli_real_escape_string($con, @$_REQUEST['tfac']);
        $_SESSION['tfnac'] = mysqli_real_escape_string($con, @$_REQUEST['tfnac']);

        $pos = strpos($_SESSION['tourname'], ",");
        $_SESSION['tourname'] = substr($_SESSION['tourname'], 0, $pos);

        $pos = strpos($_SESSION['tcat'], ",");
        $_SESSION['tcat'] = substr($_SESSION['tcat'], 0, $pos);
        $inserttrain = "insert into train values('T$_SESSION[somevalue]' ,'$_SESSION[tname]','$_SESSION[tdate]','$_SESSION[tatime]','$_SESSION[tdtime]','$_SESSION[tourname]','$_SESSION[tcat]')";
        // $insertfare = "insert into fare values('F$_SESSION[somevalue2]' ,'$_SESSION[tfac]','$_SESSION[tourname]','$_SESSION[tcat]','SC1')";
        // $query_tseat = mysqli_query($con, $insertfare);
        if ($query_des = mysqli_query($con, $inserttrain)) {
        } else {
        };
        $somevalue++;
        $select = "UPDATE sequence SET train = $somevalue;";
        $select_q = mysqli_query($con, $select);
        $_SESSION['somevalue'] = $somevalue;

        header("Location: opdone.php");
      }

      ?>
      <form method="POST" class='addtour'>
        <h2>Add Tour</h2>
        <label>Tour source station</label>
        <input type="text" margin-right: 100px;" name="tsstation">
        <label margin-right: 10px;">Tour Destination station</label>
        <input type="text" name="tdstation">
        <label>Fare for ac</label>
        <input type="number" margin-right: 180px;" name="tfac" required>
        <label>Fare for non-ac</label>
        <input type="number" name="tfnac">
        <input type="submit" name="inserttour" class="insert" value="Submit">
      </form>
      <?php
      $select = "SELECT * FROM `sequence`";
      $select_q = mysqli_query($con, $select);
      $arr = mysqli_fetch_assoc($select_q);
      if (isset($_SESSION['somevalue3'])) {
        $somevalue3 = $arr['id'];
      } else {
        $somevalue3 = $arr['id'];
        $_SESSION['somevalue3'] = $arr['id'];
      }
      if (isset($_SESSION['somevalue2'])) {
        $somevalue2 = $arr['fare'];
      } else {
        $somevalue2 = $arr['fare'];
        $_SESSION['somevalue2'] = $arr['fare'];
      }
      $_SESSION['tsstation'] = mysqli_real_escape_string($con, @$_REQUEST['tsstation']);
      $_SESSION['tdstation'] = mysqli_real_escape_string($con, @$_REQUEST['tdstation']);
      $_SESSION['tfac'] = mysqli_real_escape_string($con, @$_REQUEST['tfac']);
      $_SESSION['tfnac'] = mysqli_real_escape_string($con, @$_REQUEST['tfnac']);
      if (isset($_POST['inserttour'])) {

        $ts = "select * from tour where Source_station_id='$_SESSION[tsstation]' and Destination_station_id='$_SESSION[tdstation]'";
        $tq = mysqli_query($con, $ts);
        $tcount = mysqli_num_rows($tq);
        if ($tcount > 0) {
        } else {
          $insertour = "insert into tour values('TR$_SESSION[somevalue3]' ,'$_SESSION[tsstation]','$_SESSION[tdstation]')";

          $insertfare = "insert into fare values('F$_SESSION[somevalue2]' ,'$_SESSION[tfac]','TR$_SESSION[somevalue3]','TC1','SC1')";
          $query_tseat = mysqli_query($con, $insertfare);
          if ($query_des = mysqli_query($con, $insertour)) {
          } else {
            echo $insertour . mysqli_error($con);
          };

          $somevalue2++;
          $select = "UPDATE sequence SET fare = $somevalue2;";
          $select_q = mysqli_query($con, $select);

          //continue doing something with somevalue
          //at bottom, save somevalue back into session.

          $_SESSION['somevalue2'] = $somevalue2;
          $insertfare2 = "insert into fare values('F$_SESSION[somevalue2]' ,'$_SESSION[tfnac]','TR$_SESSION[somevalue3]','TC1','SC2')";
          $query_tseat2 = mysqli_query($con, $insertfare2);
          $somevalue3++;
          $select = "UPDATE sequence SET id = $somevalue3;";
          $select_q = mysqli_query($con, $select);
          $somevalue2++;
          $select = "UPDATE sequence SET fare = $somevalue2;";
          $select_q = mysqli_query($con, $select);
          $_SESSION['somevalue3'] = $somevalue3;
          $_SESSION['somevalue2'] = $somevalue2;
          header("Location: opdone.php");
        }
      }

      ?>
      <form class="addadmin" method="POST">
        <h2>Add Admin</h2>
        <label>Admin id</label>
        <input type="text" name="aid">
        <label>password</label>
        <input type="password" name="apass">
        <label>First name</label>
        <input type="text" name="afn">
        <label>Last name</label>
        <input type="text" margin-right: 200px;" name="aln">
        <label>Email</label>
        <input type="email" margin-right: 200px;" name="aemail">
        <label>Gender</label>
        <select margin-right: 390px;" name="agender">
          <option>male</option>
          <option>female</option>
          <option>other</option>
        </select>
        <label>Mobile Number</label>
        <input type="number" margin-right: 140px;" name="ano">
        <label>Date of birth</label>
        <input type="date" margin-right: 200px;" name="adob">
        <label>City</label>
        <input type="text" margin-right: 290px;" name="acity">
        <label>State</label>
        <input type="text" name="astate">
        <label>Local Address</label>
        <input type="text" name="aladd">
        <input type="submit" name="insertadmin" class="insert" value="Submit">
      </form>
      <?php
      if (isset($_POST['insertadmin'])) {
        $_SESSION['aid'] = mysqli_real_escape_string($con, @$_REQUEST['aid']);
        $_SESSION['apass'] = mysqli_real_escape_string($con, @$_REQUEST['apass']);
        $_SESSION['afn'] = mysqli_real_escape_string($con, @$_REQUEST['afn']);
        $_SESSION['aln'] = mysqli_real_escape_string($con, @$_REQUEST['aln']);
        $_SESSION['aemail'] = mysqli_real_escape_string($con, @$_REQUEST['aemail']);
        $_SESSION['agender'] = mysqli_real_escape_string($con, @$_REQUEST['agender']);
        $_SESSION['ano'] = mysqli_real_escape_string($con, @$_REQUEST['ano']);
        $_SESSION['adob'] = mysqli_real_escape_string($con, @$_REQUEST['adob']);
        $_SESSION['acity'] = mysqli_real_escape_string($con, @$_REQUEST['acity']);
        $_SESSION['astate'] = mysqli_real_escape_string($con, @$_REQUEST['astate']);
        $_SESSION['aladd'] = mysqli_real_escape_string($con, @$_REQUEST['aladd']);

        $admin_insert = "insert into admin values('$_SESSION[aid]','$_SESSION[apass]','$_SESSION[afn]','$_SESSION[aln]','$_SESSION[aemail]','$_SESSION[agender]',
        '$_SESSION[ano]','$_SESSION[adob]','$_SESSION[acity]','$_SESSION[astate]','$_SESSION[aladd]')";
        if ($q_insertadmin = mysqli_query($con, $admin_insert)) {
          header("Location: opdone.php");
        } else {
        }
      }
      ?>
    </div>

    <div class="mainupdate">
      <form class="updatetrain" method="POST">
        <h1>Update train</h1>
        <label>Select Train</label>
        <select name="utrainname" required>
          <?php
          $des_search = "select * from train;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[Train_id],$des[Train_name]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }
          ?>
        </select>
        <label>Train Name</label>
        <input type="text" name="upname" required>
        <label>Train Date</label>
        <input type="date" name="updatetdate" required>
        <label>Train Arrival time</label>
        <input type="time" name="updatetatime" required>
        <label>Train Depature time</label>
        <input type="time" name="updatetdtime" required>
        <label>Select Tour</label>
        <select name="utourname" required>
          <?php
          $des_search = "select * from tour;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[Tour_id],$des[Source_station_id],$des[Destination_station_id]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }
          ?>
        </select>
        <label>Select Train category</label>
        <select name="utraincat" required>
          <?php
          $des_search = "select * from train_category;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[train_cat_id],$des[train_type]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }
          ?>
        </select>
        <input type="submit" name="updatetrain" value="Submit">
      </form>
      <?php
      if (isset($_POST['updatetrain'])) {
        $_SESSION['utrainname'] = mysqli_real_escape_string($con, @$_REQUEST['utrainname']);
        $_SESSION['upname'] = mysqli_real_escape_string($con, @$_REQUEST['upname']);
        $_SESSION['updatetdate'] = mysqli_real_escape_string($con, @$_REQUEST['updatetdate']);

        $_SESSION['updatetatime'] = mysqli_real_escape_string($con, @$_REQUEST['updatetatime']);
        $_SESSION['updatetdtime'] = mysqli_real_escape_string($con, @$_REQUEST['updatetdtime']);

        $_SESSION['utourname'] = mysqli_real_escape_string($con, @$_REQUEST['utourname']);
        $_SESSION['utraincat'] = mysqli_real_escape_string($con, @$_REQUEST['utraincat']);

        // $pos = strpos($_SESSION['upname'], ",");
        // $_SESSION['upname'] = substr($_SESSION['upname'], 0, $pos);

        $pos = strpos($_SESSION['utrainname'], ",");
        $_SESSION['utrainname'] = substr($_SESSION['utrainname'], 0, $pos);

        $pos = strpos($_SESSION['utraincat'], ",");
        $_SESSION['utraincat'] = substr($_SESSION['utraincat'], 0, $pos);

        $pos = strpos($_SESSION['utourname'], ",");
        $_SESSION['utourname'] = substr($_SESSION['utourname'], 0, $pos);

        // $update_train = "update train set Train_name='$_SESSION[utrainname]',Date='$_SESSION[updatetdate]'
        // ,Arrival_time='$_SESSION[updatetatime]',Departure_time='$_SESSION[updatetdtime]',Tour_id='$_SESSION[utourname]',Train_cat_id='$_SESSION[utraincat]' where Train_id='$_SESSION[utrainname]';";
        $update_train = "UPDATE `train` SET `Train_name`='$_SESSION[upname]',`Date`='$_SESSION[updatetdate]',
      `Arrival_time`='$_SESSION[updatetatime]',`Departure_time`='$_SESSION[updatetdtime]',`Tour_id`='$_SESSION[utourname]',`Train_cat_id`='$_SESSION[utraincat]' where Train_id='$_SESSION[utrainname]'";
        if ($update_train_q = mysqli_query($con, $update_train)) {
        } else {
          echo $update_train . mysqli_error($con);
        }
      }
      ?>
      <form class="updatetour" method="POST">
        <h1>Update Tour</h1>

        <label>Tour</label>
        <select name="tourname" required>
          <?php
          $des_search = "select * from tour;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[Tour_id],$des[Source_station_id],$des[Destination_station_id]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }

          ?>
        </select float:right;">
        <label>Tour Arrival station Name</label>
        <input type="text" name="upss" required>
        <label>Tour Arrival station Date</label>
        <input type="text" name="upds" required>

        <input type="submit" name="updatetour">
      </form>
      <?php
      if (isset($_POST['updatetour'])) {
        $_SESSION['tourname'] = mysqli_real_escape_string($con, @$_REQUEST['tourname']);
        $_SESSION['upss'] = mysqli_real_escape_string($con, @$_REQUEST['upss']);
        $_SESSION['upds'] = mysqli_real_escape_string($con, @$_REQUEST['upds']);
        $pos = strpos($_SESSION['tourname'], ",");
        $_SESSION['tourname'] = substr($_SESSION['tourname'], 0, $pos);
        $update_tour = "UPDATE `tour` SET `Source_station_id`='$_SESSION[upss]',
      `Destination_station_id`='$_SESSION[upds]' where Tour_id='$_SESSION[tourname]'";
        if ($update_tour_q = mysqli_query($con, $update_tour)) {
          echo $update_tour . mysqli_error($con);
        } else {
          echo $update_tour . mysqli_error($con);
        }
      }
      ?>
      <form class="updateadmin" method="POST">
        <h1>Update Admin</h1>

        <label>Tour</label>
        <select name="uaid" required>
          <?php
          $des_search = "select * from admin;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[admin_id]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }

          ?>
        </select>
        <label>First name</label>
        <input type="text" name="uafn">
        <label>Last name</label>
        <input type="text" margin-right: 200px;" name="ualn">
        <label>Email</label>
        <input type="email" margin-right: 200px;" name="uaemail">
        <label>Gender</label>
        <select margin-right: 390px;" name="uagender">
          <option>male</option>
          <option>female</option>
          <option>other</option>
        </select>
        <label>Mobile Number</label>
        <input type="number" margin-right: 140px;" name="uano">
        <label>Date of birth</label>
        <input type="date" margin-right: 200px;" name="uadob">
        <label>City</label>
        <input type="text" margin-right: 290px;" name="uacity">
        <label>State</label>
        <input type="text" name="uastate">
        <label>Local Address</label>
        <input type="text" name="ualadd">
        <input type="submit" name="uadmin" class="insert" value="Submit">
      </form>
      <?php
      if (isset($_POST['uadmin'])) {
        $_SESSION['uaid'] = mysqli_real_escape_string($con, @$_REQUEST['uaid']);
        $_SESSION['uapass'] = mysqli_real_escape_string($con, @$_REQUEST['uapass']);
        $_SESSION['uafn'] = mysqli_real_escape_string($con, @$_REQUEST['uafn']);
        $_SESSION['ualn'] = mysqli_real_escape_string($con, @$_REQUEST['ualn']);
        $_SESSION['uaemail'] = mysqli_real_escape_string($con, @$_REQUEST['uaemail']);
        $_SESSION['uagender'] = mysqli_real_escape_string($con, @$_REQUEST['uagender']);
        $_SESSION['uano'] = mysqli_real_escape_string($con, @$_REQUEST['uano']);
        $_SESSION['uadob'] = mysqli_real_escape_string($con, @$_REQUEST['uadob']);
        $_SESSION['uacity'] = mysqli_real_escape_string($con, @$_REQUEST['uacity']);
        $_SESSION['uastate'] = mysqli_real_escape_string($con, @$_REQUEST['uastate']);
        $_SESSION['ualadd'] = mysqli_real_escape_string($con, @$_REQUEST['ualadd']);

        $admin_update = "update admin set First_name='$_SESSION[uafn]',Last_name='$_SESSION[ualn]',Email='$_SESSION[uaemail]',Gender='$_SESSION[uagender]',
        Mobile_No='$_SESSION[uano]',Date_of_birth='$_SESSION[uadob]',City='$_SESSION[uacity]',State = '$_SESSION[uastate]',Local_address='$_SESSION[ualadd]' where admin_id='$_SESSION[uaid]'";
        if ($q_updateadmin = mysqli_query($con, $admin_update)) {
        } else {
        }
      ?>
        <script>
          location.href = "opdone.php";
        </script>
      <?php
      } ?>
      <form method="post" class='updatefare'>
        <h1>Update Fare</h1>
        <label>Select Tour</label>
        <select name="updatetours" required>
          <?php
          $des_search = "select * from tour;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[Tour_id],$des[Source_station_id],$des[Destination_station_id]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }

          ?>
        </select>

        <select name="seatupdate">
          <option>SC1</option>
          <option>SC2</option>
        </select>
        <label>Fare</label>
        <input type="text" name="fareupdate" required>
        <input type="submit" name="updatefare" required>
        <?php
        if (isset($_POST['updatefare'])) {

          $_SESSION['fareupdate'] = mysqli_real_escape_string($con, @$_REQUEST['fareupdate']);
          $_SESSION['seatupdate'] = mysqli_real_escape_string($con, @$_REQUEST['seatupdate']);
          $_SESSION['updatetours'] = mysqli_real_escape_string($con, @$_REQUEST['updatetours']);

          $pos = strpos($_SESSION['updatetours'], ",");
          $_SESSION['updatetours'] = substr($_SESSION['updatetours'], 0, $pos);

          $admin_update = "update fare set Fare='$_SESSION[fareupdate]' where Tour_id='$_SESSION[updatetours]' and Seat_cat_id='$_SESSION[seatupdate]'";
          if ($q_updateadmin = mysqli_query($con, $admin_update)) {
          } else {
            echo mysqli_error($con);
          }
        }
        ?>
      </form>
    </div>
    <div class="maindelete">

      <form method="post" class="deletetrain">
        <h1>Delete Train</h1>
        <label>Select Train</label>
        <select name="deletetrain" required>
          <?php
          $des_search = "select * from train;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[Train_id],$des[Train_name]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }

          ?>
        </select>
        <input type="submit" name="deleteTrain">
        <?php
        if (isset($_POST['deleteTrain'])) {

          $_SESSION['deletetrain'] = mysqli_real_escape_string($con, @$_REQUEST['deletetrain']);


          $pos = strpos($_SESSION['deletetrain'], ",");
          $_SESSION['deletetrain'] = substr($_SESSION['deletetrain'], 0, $pos);

          $delete_train = "DELETE FROM `train` WHERE Train_id='$_SESSION[deletetrain]'";
          if ($q_updateadmin = mysqli_query($con, $delete_train)) {
          } else {
            echo mysqli_error($con);
          }
        }
        ?>
      </form>
      <form method="post" class='deletetour'>
        <h1>Delete Tour</h1>
        <label>Select Tour</label>
        <select name="deletetour" required>
          <?php
          $des_search = "select * from tour;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[Tour_id],$des[Source_station_id],$des[Destination_station_id]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }

          ?>
        </select>
        <input type="submit" name="deleteTour">
        <?php
        if (isset($_POST['deleteTour'])) {

          $_SESSION['deletetour'] = mysqli_real_escape_string($con, @$_REQUEST['deletetour']);


          $pos = strpos($_SESSION['deletetour'], ",");
          $_SESSION['deletetour'] = substr($_SESSION['deletetour'], 0, $pos);

          $delete_train = "DELETE FROM `tour` WHERE Tour_id='$_SESSION[deletetour]'";
          if ($q_updateadmin = mysqli_query($con, $delete_train)) {
          } else {
            echo mysqli_error($con);
          }
          $delete_train = "DELETE FROM `fare` WHERE Tour_id='$_SESSION[deletetour]'";
          if ($q_updateadmin = mysqli_query($con, $delete_train)) {
          } else {
            echo mysqli_error($con);
          }
        }
        ?>
      </form>
      <form method="post" class='deleteadmin'>
        <h1>Delete Admin</h1>
        <label>Select Admin</label>
        <select name="deleteadmin" required>
          <?php
          $des_search = "select * from admin;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[admin_id],$des[First_Name]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }

          ?>
        </select>
        <input type="submit" name="deleteAdmin">
        <?php
        if (isset($_POST['deleteAdmin'])) {

          $_SESSION['deleteadmin'] = mysqli_real_escape_string($con, @$_REQUEST['deleteadmin']);


          $pos = strpos($_SESSION['deleteadmin'], ",");
          $_SESSION['deleteadmin'] = substr($_SESSION['deleteadmin'], 0, $pos);

          $delete_train = "DELETE FROM `admin` WHERE admin_id='$_SESSION[deleteadmin]'";
          if ($q_updateadmin = mysqli_query($con, $delete_train)) {
          } else {
            echo mysqli_error($con);
          }
        }
        ?>
      </form>
    </div>
    <div class="mainview">
      <form action="#" method="POST" class='showtrain'>
        <h1>Search Train</h1>
        <select name="source" id="c" required> <br>
          <option selected disabled value="">--Source Station--</option>
          <?php
          $des_search = "select DISTINCT(Source_station_id) from tour;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[Source_station_id]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }

          ?>
        </select>

        <select name="destination" id="d" required>
          <option selected disabled value="">--Destination Station--</option>
          <?php
          $des_search = "select DISTINCT(Destination_station_id) from tour;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[Destination_station_id]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }

          ?>


        </select><br>

        <br>
        <input type="submit" name="search" value="Search">
        <?php
        if (isset($_POST['search'])) {
          $_SESSION['source'] = mysqli_real_escape_string($con, @$_REQUEST['source']);
          $_SESSION['destination'] = mysqli_real_escape_string($con, @$_REQUEST['destination']);

          $tour_search = "select * from `tour` where Source_station_id='$_SESSION[source]'
         and Destination_station_id='$_SESSION[destination]'";
          if ($query_des2 = mysqli_query($con, $tour_search)) {
            echo mysqli_error($con);
          } else {
            echo mysqli_error($con);
          };
          $des2 = mysqli_fetch_assoc($query_des2);
          while ($des2) {
            $train_search = "SELECT * FROM `train` WHERE Tour_id in (select Tour_id from `tour` where Source_station_id='$_SESSION[source]'
            and Destination_station_id='$_SESSION[destination]');";
            if ($query_des = mysqli_query($con, $train_search)) {
            } else {
              echo mysqli_error($con);
            };
            $des = mysqli_fetch_assoc($query_des);

            while ($des) {

              echo "<table style='border: 1px solid'>";
              echo "<tr style='border: 1px solid'>";
              echo "<td style='border: 1px solid'>" . " $des[Train_id]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des[Train_name]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des[Date]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des[Arrival_time]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des[Departure_time]" . "</td>";

              echo "<td style='border: 1px solid'>" . " $des[Train_cat_id]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des2[Source_station_id]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des2[Destination_station_id]" . "</td>";
              echo "</tr>";
              echo "</table>";

              $des = mysqli_fetch_assoc($query_des);
            }
            $des2 = mysqli_fetch_assoc($query_des2);
          }
        }
        ?>
      </form>
      <form method='post' class='showfare'>
        <h1>Show Fare</h1>
        <select name='tour_show'>
          <?php
          $des_search = "select * from tour;";
          if ($query_des = mysqli_query($con, $des_search)) {
          } else {
            echo mysqli_error($con);
          };
          $des = mysqli_fetch_assoc($query_des);
          while ($des) {
            echo "<option>" . "$des[Tour_id],$des[Source_station_id],$des[Destination_station_id]" . "</option>";
            $des = mysqli_fetch_assoc($query_des);
          }
          echo "</select>";
          $_SESSION['tour_show'] = mysqli_real_escape_string($con, @$_REQUEST['tour_show']);
          $pos = strpos($_SESSION['tour_show'], ",");
          $_SESSION['tour_show'] = substr($_SESSION['tour_show'], 0, $pos);

          if (isset($_POST['tour_show'])) {


            $des_search = "select * from Fare where Tour_id='$_SESSION[tour_show]';";
            if ($query_des = mysqli_query($con, $des_search)) {
            } else {
            };
            $des = mysqli_fetch_assoc($query_des);
            while ($des) {
              $tour_search = "select * from `tour` where tour_id='$des[Tour_id]'";
              if ($query_des2 = mysqli_query($con, $tour_search)) {
              } else {
              };
              $des2 = mysqli_fetch_assoc($query_des2);
              echo "<table style='border: 1px solid'>";
              echo "<tr style='border: 1px solid'>";
              echo "<td style='border: 1px solid'>" . " $des[Fare_id]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des[Fare]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des2[Source_station_id]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des2[Destination_station_id]" . "</td>";
              if ($des['Seat_cat_id'] == "SC1") {
                echo "";
                echo "<td style='border: 1px solid'> AC</td>";
              } else {
                echo "<td style='border: 1px solid'> NON-AC</td>";
              }
              echo "</tr>";
              echo "</table>";
              $des = mysqli_fetch_assoc($query_des);
            }
          }



          ?>
          <input type="submit">
      </form>
      <form method="post" class='showticket'>
        <h1>show booked ticket</h1>
        <select name="ticket_show">
          <?php
          $a = "select * from train;";
          $ab = mysqli_query($con, $a);
          $abc = mysqli_fetch_assoc($ab);
          while ($abc) {
            echo "<option>" . "$abc[Train_id],$abc[Train_name]" . "</option>";
            $abc = mysqli_fetch_assoc($ab);
          }
          echo "</select>";

          ?>
          <input type="submit" name="ttb">
          <?php

          if (isset($_POST['ttb'])) {
            $_SESSION['ticket_show'] = mysqli_real_escape_string($con, @$_REQUEST['ticket_show']);
            $pos = strpos($_SESSION['ticket_show'], ",");
            $_SESSION['ticket_show'] = substr($_SESSION['ticket_show'], 0, $pos);
            $train_search = "select * from seat where Train_id = '$_SESSION[ticket_show]'";
            if ($query_des = mysqli_query($con, $train_search)) {
            } else {
            };

            $des = mysqli_fetch_assoc($query_des);

            while ($des) {
              $i = 0;
              echo "<table style='border: 1px solid'>";
              echo "<tr style='border: 1px solid'>";
              echo "<td style='border: 1px solid'>" . " $i" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des[Seat_no]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des[Date]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des[passsenger_id]" . "</td>";
              echo "<td style='border: 1px solid'>" . " $des[user_id]" . "</td>";

              echo "</tr>";
              echo "</table>";
              $i++;
              $des = mysqli_fetch_assoc($query_des);
            }
          }
          ?>
      </form>

    </div>



  </div>

</body>

</html>