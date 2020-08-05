<?php
include('config.php');
$query="select approved,pending,rejected from mec";


$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>=1)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $approved= $row['approved'];
        $pending= $row['pending'];
        $rejected= $row['rejected'];
    }
}
    else
    {
        echo" something went wrong";
        
    }
    



?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="intern.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
     <script type="text/javascript">
      function goToNewPage()
      {
        var url =document.getElementById('list').value;
        if(url!='none')  {
          window.location=url;
        }
      }
    </script>

</head>
<body>
 <select name="list" id="list" accesskey="target">
   <option value="mec.php">MEC</option>
    <option value="cse.php">CSE</option>
    <option value="ece.php">ECE</option>
    <option value="index.php">ISE</option>
   
  </select>
  <input type="button" value="go" onclick="goToNewPage()"/>

    <canvas id="myChart" style="height: 350px; display: block; width: 900px;"></canvas>
    <?php
    echo "<input type='hidden' id= 'approved' value= '$approved'>";
    echo "<input type='hidden' id= 'pending' value= '$pending'>";
    echo "<input type='hidden' id= 'rejected' value= '$rejected'>";
    
    
    ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    
    
    <script>
    var approved=document.getElementById("approved").value;
    var pending=document.getElementById("pending").value;
    var rejected=document.getElementById("rejected").value;
    
        
    window.onload = function()
    {
      var randomScalingFactor= function() {
          return Math.round(Math.random()^100);
      };
        
        var config = {
            type:'bar',
            data:{
                borderColor:"#ffff",
                datasets:[{
                    data: [
                        approved,
                        pending,
                        rejected
                        ],
                                borderColor:"#fff",
                                 borderWidth:"1",
                                 hoverBorderColor:"#000",
                                  label:'internship report',
                                 backgroundColor:[
                                 "#6970d5",
                                 "#f312cb",
                                 "#ff0060"
                                     ],
                           hoverBackgroundColor:[
                               "#f38b4a",
                               "#56d798",
                               "#ff8397",
                               "#6970d5",
                               "#ffe400"]
                            }],
                labels:[
                    'approved',
                    'pending',
                    'rejected'
                ]
            },
            options:{
                responsive:true
            }
        };
        
        
      var ctx=document.getElementById('myChart').getContext('2d');
      window.myPie =new Chart(ctx,config);
     };
    
    </script>
    
    
    
    
    
    
    
    
    
</body>
</html>