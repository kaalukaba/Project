<!DOCTYPE html>
<html>
<head>
  <title>VegetableMapper</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>
    <h2>Filterable Table</h2>
    <input id="myInput" type="text" placeholder="Search...">
    <br><br>
    <table id="myTable">
          <thead>
                <tr>
                    <th onclick="sortTable(0)"><a href="#">ID</a></th>
                    <th onclick="sortTable(1)"><a href="#">Category</a></th>
                    <th onclick="sortTable(2)"><a href="#">English Name</a></th>
                    <th>Image</th>
                </tr>
          </thead>
          <tbody id="myTable">
          <tr>
          <?php
                $servername   = "localhost";
                $username     = "root"; 
                $password     = "";
                $dbname       = "db_name";
 
                // Creating connection
                $conn = new mysqli($servername, $username, $password, $dbname);
 
                // Checking connection
                if ($conn->connect_error)
                {
                      die("Connection failed:". $conn->connect_error);
                }     

                $sql = "SELECT * FROM wordmapper WHERE category = 'Vegetables'";
                $result = $conn->query($sql);

                if(!$result)
                {
                      die("Invalid Query:".$conn->connect_error);
                }

                //output data of each row
                while($row = $result->fetch_assoc())
                {
                      ?>
                      <td> <?php echo $row['ID']; ?></td>
                      <td> <?php echo $row['category']; ?></td>
                      <td> <?php echo $row['EnglishName']; ?></td>
                      <td> <?php echo '<img src="data:image;base64,' .base64_encode($row["Image"]). '" alt="Image" style="width: 25px; height: 25px;" >' ; ?></td>
                    </tr>
                      <?php
                }
          ?>
</tbody>
</table>
<script >
function sortTable(n) 
{
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  
  //Set the sorting direction to ascending:
  dir = "asc"; 
  
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
</body>
</html>