<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Department</title>
    <style>
        /* Adjust the margin of the heading */
        .dee {
            color: whitesmoke;
            margin: auto;
            margin-bottom: 100px;  
            font-size: 50px;
        }

        /* Container for buttons to align them horizontally */
        .button-container {
            display: flex;       /* Aligns children (buttons) inline */
            justify-content: space-between; /* Distributes space between buttons */
            margin-top: 10px;
        }

        /* Styling for each button */
        button {
            padding: 10px 15px; /* Adjust padding to control the button size */
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }

        /* Adjust the container */
        .container {
            width: 80%; /* Adjust the width as needed */
            margin: auto;
            padding-top: 150px;
            position: relative; /* Ensure the container is above the snow effect */
            z-index: 1; /* Set a higher z-index */
        }

        /* Snow effect styles */
        html {
            height: 100%;
            background: linear-gradient(#123 30%, #667);
            overflow: hidden;
        }

        .snow, .snow::before, .snow::after {
            position: absolute;
            top: -600px; /* Adjusted to match the grid size */
            left: 0;
            bottom: 0;
            right: 0;
            content: "";
            background-image: 
                radial-gradient(2px 2px at 10px 10px, rgba(255,255,255,0.5) 50%, rgba(0,0,0,0)),
                radial-gradient(3px 3px at 50px 50px, rgba(255,255,255,0.6) 50%, rgba(0,0,0,0)),
                radial-gradient(4px 4px at 100px 100px, rgba(255,255,255,0.7) 50%, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 150px 150px, rgba(255,255,255,0.8) 50%, rgba(0,0,0,0)),
                radial-gradient(3px 3px at 200px 200px, rgba(255,255,255,0.5) 50%, rgba(0,0,0,0)),
                radial-gradient(4px 4px at 250px 250px, rgba(255,255,255,0.6) 50%, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 300px 300px, rgba(255,255,255,0.7) 50%, rgba(0,0,0,0)),
                radial-gradient(3px 3px at 350px 350px, rgba(255,255,255,0.8) 50%, rgba(0,0,0,0));
            background-size: 600px 600px;
            animation: snow 3s linear infinite;
            z-index: 0; /* Ensure the snow effect is below the container */
        }

        .snow::after {
            margin-left: -200px;
            opacity: .4;
            animation-duration: 6s;
            animation-direction: reverse;
            filter: blur(3px);
        }

        .snow::before {
            animation-duration: 9s;
            animation-direction: reverse;
            margin-left: -300px;
            opacity: .65;
            filter: blur(1.5px);
        }

        @keyframes snow {
            to {
                transform: translateY(600px);
            }
        }
    </style>
</head>
<body>
<div class="snow"></div>

<div class="container">
    <center><h2 class="dee">Select a Department: </h2></center>
    <div class="button-container">
        <button onclick="window.open('cashier.php', '_blank')">Cashier</button>
        <button onclick="window.open('registrar.php', '_blank')">Registrar</button>
        <button onclick="window.open('sas.php', '_blank')">Student Advisory Service (SAS)</button>
    </div>
</div>

<script>
    function redirectTo(location) {
        window.location.href = location;
    }
</script>

<?php include '../footer.php'; ?>
</body>
</html>
