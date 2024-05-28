<?php

    require_once('../config.php');

?>
<!DOCTYPE html>
<html>
<head>
    <style>
      body {
  background-image: url('../manbg.png');
  background-repeat: no-repeat;
  background-position: right; }
         button {
      font-size: 5px;
      padding: 5px 5px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    #currentNumber {
      font-size: 24px;
      margin: 0 10px;
    }



        * {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}

.container{
     display: flex;
  justify-content: space-center;
}
  
.column {
  float: left;
  width: 50%;
  padding: 10px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
    flex: 1;
   border: 2px solid #ccc;
  padding: 10px;
  margin-right: 60px;
  margin-left: -50px;

}

.in{
    
margin-right: 5px;
  margin-left: 1px;

}

.contain{
    text-align: center;
    padding: 12px;
}

th, td {
  text-align: left;
  padding: 12px;

}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
    .cell {
  border: 0px solid #ccc;
  padding: 2px;
  flex: 1;
}

        .center {
  margin: auto;
  width: 20%;
  border: 10px;
  padding: 20px;
}
</style>
    <title>SAS</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
        
        <center> <ul class="navbar-nav p-2 "> 
                <li class="nav-item">
                    <h3 id="nowServing">Now Serving: </h3>
                 </li></center>

    <div class="container">
        <div class="row mt-10 d-flex justify-content-center">
            <div class="center">
                <h1>SAS Queue</h1> 
                <a class="btn btn-success mb-4" href="../create3.php">Sign Up</a>
                <a class="btn btn-success mb-4" href="pick1.php">Return</a>
                <div class="row">
                    <div class="column">
                        <table class="table table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th class="cell">ID</th>
                                    <th class="cell">Fullname</th>      
                                    <th class="cell">Course</th>
                                    <th class="cell">Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="tableBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contain">
        <button id="prev">&#60;|</button>
        <span id="currentNumber">3000</span>
        <button id="next">|&#62;</button>
        <button id="nowServingDataSAS">Serve Now</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
         let currentNumber = 3000; // Initialize with 2000 instead of 0
const numberSpan = document.getElementById('currentNumber');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');
const nowServingDataSASButton = document.getElementById('nowServingDataSAS');
const tableBody = $('#tableBody');
const nowServingSection = $('#nowServing'); // Add this line

prevButton.addEventListener('click', () => {
    currentNumber--;
    updateNumber();
});

nextButton.addEventListener('click', () => {
    currentNumber++;
    updateNumber();
});

function updateNumber() {
    numberSpan.textContent = currentNumber;
}

// Assume the PHP file responsible for serving the data is 'serve_data.php'
// Assume the PHP file responsible for serving the data is 'serve_data.php'
// Assume the PHP file responsible for serving the data is 'serve_data.php'
nowServingDataSASButton.addEventListener('click', () => {
    $.ajax({
        url: '../insert_datas.php',
        type: 'POST',
       data: { currentNumber: currentNumber, queue: 'sas' },
        success: function(response) {
            const data = JSON.parse(response);

            if (data.length > 0) {
                const item = data[0];
                const row = `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.fullname}</td>
                        <td>${item.course}</td>
                        <td>${item.status === '1' ? 'Active' : 'Active'}</td> <!-- Display status based on value -->
                    </tr>
                `;    
                tableBody.append(row);
                nowServingSection.html(`Now Serving:<br> ${item.id}`);

                // Send the served student's ID to que.php to display in cashier's portion
                $.ajax({
                    url: 'que.php',
                    type: 'POST',
                    data: { servedId: item.id, queue: 'sas' },
                    success: function(response) {
                        console.log('sent to que.php');
                    },
                    error: function() {
                        console.log('error que.php');
                    }
                });
            } else {
                tableBody.append('<tr><td colspan="4">No data available</td></tr>');
            }
        },
        error: function() {
            console.log('Error fetching data');
        }
    });
});
    




//updateNumber(); // Call updateNumber() initially to set the initial value of "Now Serving"
    </script>

    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php include '../footer.php'; ?>
</html>
