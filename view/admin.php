<!DOCTYPE html>
<html lang="en">

<head>
    <title>admin</title>
    <link rel="stylesheet" href="../assets/css/adminStyle.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


</head>

<body>
    <?php
   

    require_once '../controler/worldPlace.php';
    require_once '../controler/userCheck.php';
    $totalPlace = countWorldTourRows();
    $totalGuides = countGuides();

   
     ?>

    <input type="checkbox" id="nav-toggle">

    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="fas fa-accusoft">Toursim</span></h2>

        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a class="active" href="index.php"><span class="fas fa-igloo"></span><span>Dasboard</span></a>
                </li>

                <li>
                    <a href="index.php"><span class="fas fa-home"></span><span>Home</span></a>
                </li>
                <li>
                    <a href="planing.php"><span class="fas fa-users"></span><span>User</span></a>
                </li>
                <li>
                    <a href="hotel.php"><span class="fas fa-hotel"></span><span>Hotel</span></a>
                </li>
                <li>
                    <a href="#"><span class="fas  fa-people-carry"></span><span>Guide</span></a>
                </li>
                <li>
                    <a href="#"><span class="fas fa-car"></span><span>Transport</span></a>
                </li>
                <li>
                    <a href="#"><span class="fas  fa-user-circle"></span><span>Account</span></a>
                </li>
                <li>
                    <a href="#"><span class="fas fa-clipboard-list"></span><span>Task</span></a>
                </li>

            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="fas fa-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="search-wrapper">
                <span class="fas fa-search"></span>
                <input type="search" placeholder="search here" name='search'>
            </div>
            <div class="user-wrapper">
                <img src="images/my.jpg" alt="">
                <h4>Mahin</h4>
                <small>Super admin</small>
            </div>
        </header>
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <!-- <h1><?php echo $user ?></h1> -->
                        <span>Users</span>
                    </div>
                    <div>
                        <span class="fas fa-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <!-- <h1><?php echo $hotel ?></h1> -->
                        <h1>70</h1>
                        <span>Hotel</span>
                    </div>
                    <div>
                        <span class="fas fa-home"></span>
                    </div>
                </div>
                <a href="allGuides.php">
                <div class="card-single">
                    <div>
                        <h1><?php echo $totalGuides ?></h1>
                        
                        <span>Guide</span>
                    </div>
                    <div>
                        <span class="fas  fa-people-carry"></span>
                    </div>
                </div>
                </a>
                <div class="card-single">
                    <div>
                        <!-- <h1><?php echo $tour ?></h1> -->
                        <span>Tours</span>
                    </div>
                    <div>
                        <span class="fas fa-car"></span>
                    </div>
                </div>
                <a href="worldwide.php">
                <div class="card-single">
                    <div>
                        <h1>
                            <?php echo $totalPlace; ?>
                        </h1>
                        <span>Place</span>
                    </div>
                    <div>
                        <span class="fas fa-clipboard-list"></span>
                    </div>
                </div>
                </a>
                <div class="card-single">
                    <div>
                        <h1>
                            <!-- <?php echo $row ?> -->
                        </h1>
                        <span>Blog</span>
                    </div>
                    <div>
                        <span class="fas fa-clipboard-list"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <!-- <h1><?php echo $transport ?></h1> -->
                        <span>Transport</span>
                    </div>
                    <div>
                        <span class="fas fa-home"></span>
                    </div>
                </div>
            </div>

            <div class="recent-flex">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recent User</h2>
                            <button> See all <span class="fas fa-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Phone</td>
                                        <td>Gender</td>
                                        <td>User Type</td>
                                        <td>function</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
// Assuming you have established a connection to the Oracle database
require_once '../model/db.php';
$conn = getConnection();


$stid = oci_parse($conn, "SELECT * FROM EMP");
oci_execute($stid);

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $name = $row['ENAME'];
    $job = $row['JOB'];


    echo '<tr>
        <td>' . $name . '</td>
        <td>' . $job . '</td>
    
    </tr>';
}

oci_free_statement($stid);
oci_close($conn);
?>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="customers">

                </div>
            </div>
        </main>
    </div>



    <!-- <script>
        function showResult(str) {
            if str.length == 0) {
            document.getElementById("search").innerHTML = "";
            document.getElementById("search").style.border = "0px";
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("search").innerHTML = this.responseText;
                document.getElementById("search").style.border = "1px solid #A5ACB2";
            }
        }
        xmlhttp.open("GET", "search.php?q=" + str, true);
        xmlhttp.send();
        }
    </script> -->
</body>

</html>