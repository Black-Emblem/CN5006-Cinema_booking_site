<?php
print "<h1 class=major>Book now!</h1>";
    print "<form ACTION= {$_SERVER['PHP_SELF']} method=get>";

$sql = "SELECT Name, ID FROM movies where ID in (SELECT Movie_ID FROM `play` where nDate >= current_date group by Movie_ID)";
$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);
if ($rowCount > 0) {
print "<select onchange='this.form.submit()' name='mID'>";
    while ($row = mysqli_fetch_assoc($result)) {
        if (isset($_GET["mID"])){
            if ($_GET["mID"] == $row["ID"]){
                print "<option value='{$row["ID"]}' selected>{$row["Name"]}</option> ";
            }
            else{
                print "<option value='{$row["ID"]}'>{$row["Name"]}</option> ";
            }

        }
        else{
            print "<option value='{$row["ID"]}'>{$row["Name"]}</option> ";
        }

    }
    }

    if (isset($_GET["mID"])){
        if($_GET["mID"] == 0){
            print "<br><input type='submit' value='next'>";
        }
    }

    print "</select></form>";

if (isset($_GET["mID"])){
    $sql = "select * from play where Movie_ID = '{$_GET["mID"]}' and nDate >= current_date ";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0)
            {
            print "<form ACTION= {$_SERVER['PHP_SELF']} method=get>";
            print "<select onchange='this.form.submit()' name='pID'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $sql = "SELECT NAME FROM brunch where ID = '{$row["Brunch_ID"]}'";
                $resw = mysqli_query($conn, $sql);
                $rws = mysqli_fetch_assoc($resw);

                print "<option value='{$row["ID"]}'>Brunch: {$rws["NAME"]} Hall: {$row["Hall_ID"]} Date: {$row["nDate"]} Time: {$row["nTime"]} price: {$row["price"]}</option>";
                }

        print "<input type='hidden' name='mID' value='{$_GET["mID"]}'>";
        print "</select>";

        if (isset($_GET["pID"])){}
        else{
            print "<br><input type='submit' value='next'>";
        }
        print "</form>";
    }
}
if(isset($_GET["pID"])) {
    print "<form method='post' action='result.php'>";
    $sql = "select nLines, nRows from hall where ID = (SELECT Hall_ID from play where ID = {$_GET["pID"]})";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $sitArray = [];
    $valTemp = "";

    print "<div ystyle='overflow: auto'><table>";
    for ($_i = 1; $_i <= $row["nRows"]; $_i++) {
        print "<tr>";
        for ($_j = 1; $_j <= $row["nLines"]; $_j++) {
            print "<td>";
            $sql = "select ID from ticket where rows_num = {$_i} and line_num = {$_j} and state = 'confirmed' and Play_ID = '{$_GET["pID"]}'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                print "<label class='container'><h6>R{$_i} L{$_j}</h6><i id='checkedmark'/></label>";
            } else {
                $valTemp .= "R{$_i}-L{$_j}";
                print "<label class='container'><h6>{$valTemp}</h6><input type='checkbox' name='{$valTemp}' value='{$valTemp}'><span class='checkmark'></span></label>";
                $valTemp = "";
            }
            print "</td>";
        }
        print "</tr>";
    }
    print "</table></div>";

    $sql = "select price from play where ID = {$_GET["pID"]}";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    print "<h3>Price per ticket: {$row["price"]}<br><br>Payment option: </h3><select name='pay'><option value='0'>Pay at ticket booth</option></select>";
    echo "<br><input type='hidden' name='playID' value={$_GET["pID"]}><input type='submit' value='book' style='align-self: center;'></form>";
}