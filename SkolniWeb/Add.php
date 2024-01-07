<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pridano</title>

    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            text-align: center;
        }

        .success-message,
        .failure-message {
            text-align: center;
            font-size: 18px;
        }

        .success-message {
            color: #28a745;
        }

        .failure-message {
            color: #dc3545;
        }
    </style>
    
</head>
<body>
<div class="container">
    <a class="btn btn-primary btn-back" href="./AddProject.html">Zpět</a>


    <?php
        // Name, Institution, Specialization, Contact, Details
        if(isset($_POST["Name"]) && isset($_POST["Institution"]) && isset($_POST["Specialization"]) && isset($_POST["Contact"]))
        {

            $name = $_POST["Name"];
            $institution = $_POST["Institution"];
            $specialization = $_POST["Specialization"];
            $contact = $_POST["Contact"];            
            $details = "";
            if(isset($_POST["Details"]))
            {
                $details = $_POST["Details"];
            }


            $serverName = "localhost:3306";
            $userName = "root";
            $password = "";
            $dbName = "testtable";

            $conn = new mysqli($serverName, $userName, $password, $dbName);

            // connection check
            if ($conn->connect_error) 
            {
                return null;
            }

            //get all the projects
            $sql = "INSERT INTO testtable (Name, Institution, Specialization, Contact, Details) VALUES('$name', '$institution','$specialization', '$contact', '$details')";
            $result = $conn->query($sql);            
            
            $conn->close();      
            
            echo "<h2 class='text-center'>Projekt byl přidán</h2>";
        }else
        {
            echo "Nepridano";
        }

       
    ?>
</div>
</body>
</html>