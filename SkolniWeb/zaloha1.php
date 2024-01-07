<!DOCTYPE html>
<html lang="cz">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panely</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
    .panel-clickable {
        cursor: pointer;
    }
    .panel-clickable:hover .panel-hover {
        background-color: #dcdcdc; /* Adjust the color as needed */
    }
    
   
    </style>

    </head>
    <body>
   
  
    <!-- sponsors -->
    <div class="container text-center mt-5">
        <!-- Your content goes here -->
        <h2 class="display-4">Sponzoři</h2>
        <!-- Sponsors section -->
        <div class="row mt-5">
            <div class="col-6 col-md-3 mb-4">
                <img src="Images/SponsorImage.jpg" alt="Sponsor 1" class="img-fluid rounded" style="max-width: 100%;">
            </div>
            <div class="col-6 col-md-3 mb-4">
                <img src="Images/SponsorImage.jpg" alt="Sponsor 2" class="img-fluid rounded" style="max-width: 100%;">
            </div>
            <div class="col-6 col-md-3 mb-4">
                <img src="Images/SponsorImage.jpg" alt="Sponsor 3" class="img-fluid rounded" style="max-width: 100%;">
            </div>
            <div class="col-6 col-md-3 mb-4">
                <img src="Images/SponsorImage.jpg" alt="Sponsor 4" class="img-fluid rounded" style="max-width: 100%;">
            </div>
            <div class="col-6 col-md-3 mb-4">
                <img src="Images/SponsorImage.jpg" alt="Sponsor 5" class="img-fluid rounded" style="max-width: 100%;">
            </div>
            <div class="col-6 col-md-3 mb-4">
                <img src="Images/SponsorImage.jpg" alt="Sponsor 6" class="img-fluid rounded" style="max-width: 100%;">
            </div>
            <div class="col-6 col-md-3 mb-4">
                <img src="Images/SponsorImage.jpg" alt="Sponsor 7" class="img-fluid rounded" style="max-width: 100%;">
            </div>
            <div class="col-6 col-md-3 mb-4">
                <img src="Images/SponsorImage.jpg" alt="Sponsor 8" class="img-fluid rounded" style="max-width: 100%;">
            </div>
        </div>
        
    </div>
    <br>
    <br><br>

    <!-- display the projects -->
    <div class="container ">
    <h2 class="display-4 text-center">Projekty</h2>

    <!-- Search form -->
    <div class="mb-3">
        <!-- <label for="exampleInput" class="form-label">Vstupní pole</label> -->
        <input type="text" class="form-control" id="nameInput" placeholder="Zadejte název hledaného projektu">
    </div>
    <button type="submit" class="btn btn-primary" onclick="Search()">Vyhledat</button>
    <br>
    <br>
    <div id="allProjects">
    <?php
        //get column: Name, Institution, Specialization, Contact, Details
        $data = getCompanyesFromDatabase();
        
        //display panels for evry project
        $i = 0;
        foreach($data as $row)
        {
            echo "
            <div name='".$row["Name"]."'>
            <div class='row panel-clickable bg-light panel-hover' onclick='onPanelClicked(". $i .")' name='".$row["Name"]."'>
                <div class='col-lg-6'>
                    <div class='panel'>
                        <h2>" . $row["Name"] . "</h2>
                        <p>" . $row["Institution"] . "</p>
                    </div>
                </div>
                
                <div class='col-lg-3'>
                    <div class='panel small-panel d-flex align-items-center justify-content-center'>
                        <br>
                        ". $row["Specialization"] ."
                    </div>                        
                </div>
                
                <div class='col-lg-3'>
                    <div class='panel small-panel d-flex align-items-center justify-content-center'>
                        <br>
                        <br><br>
                        <a href='mailto:". $row["Contact"] ."' onclick='event.stopPropagation();'>". $row["Contact"] ."</a>
                    </div>
                </div>
            
                <!-- Longer Text Panel -->
                <div class='col-lg-12 text-center' style='display: none;' id='detailText".$i."'>
                    <div class='panel d-flex align-items-center justify-content-center'>
                        <p>". $row["Details"] ."</p>
                    </div>
                </div>
            </div><br>
            </div>";
        $i++;
        }

        function getCompanyesFromDatabase()
        {
            $serverName = "localhost:3310";
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
            $sql = "SELECT * FROM testtable";
            $result = $conn->query($sql);

            $data = array();
            while ($row = $result->fetch_assoc()) 
            {
                $data[] = $row;
            }

            $conn->close();            
            return $data;            
        }
    ?>
    </div>
    </div>
    



    <!-- my scrpits -->
    <script> 
    //display and hide the details text
    function onPanelClicked(panelNum)
    {
        var detailsText = document.getElementById("detailText" + panelNum)

        if(detailsText.style.display == "block")
        {
            detailsText.style.display = "none";
        }else
        {
            detailsText.style.display = "block";
        }
    }   


    //select only searched projects
    function Search()
    {
        var allProjects = document.getElementById("allProjects")
        var projects = Array.from(allProjects.children)

        var searchedTag = document.getElementById("nameInput").value
        searchedTag = searchedTag.toLowerCase()

        projects.forEach(proj => 
        {
            var projName = proj.getAttribute("name")
            if(projName != null && searchedTag != null)            
            {
                projName = projName.toLowerCase()
                if(projName.includes(searchedTag) == true)
                {
                    proj.style = ""
                }else
                {
                    proj.style.display = "none"
                }
                
            }

            console.log(proj)
        });

        
    }
    </script>

    <!-- other scripts -->
    <script>
    var carousel = document.querySelector('.carousel');
    var elements = document.querySelectorAll('.carousel > *');
    var currentIndex = 0;

    // Add click event to navigate to the corresponding section
    indicator.onclick = function (i) {
        return function () {
            // Calculate the scroll distance based on the current and target index
            var scrollDistance = (i - currentIndex) * elements[0].offsetWidth;
            carousel.scrollBy({ left: scrollDistance, behavior: 'smooth' });

            // Update the currentIndex and re-render the indicators
            currentIndex = i;
            renderIndicators();
        };
    }(i);

    function renderIndicators() {
        // Clear previous indicators
        elements.forEach(function (element) {
        var indicators = element.querySelector('.indicators');
        if (indicators) {
            indicators.innerHTML = '';
            for (var i = 0; i < elements.length; i++) {
            var indicator = document.createElement('div');
            indicator.classList.add('indicator');
            indicator.classList.toggle('active', i === currentIndex);

            // Add click event to navigate to the corresponding section
            indicator.onclick = function (i) {
                return function () {
                elements[i].scrollIntoView();
                }
            }(i);

            indicators.appendChild(indicator);
            }
        }
        });
    }

    var observer = new IntersectionObserver(function (entries, observer) {
        // Find the entry with the largest intersection ratio
        var activated = entries.reduce(function (max, entry) {
        return (entry.intersectionRatio > max.intersectionRatio) ? entry : max;
        });

        if (activated.intersectionRatio > 0) {
        currentIndex = Array.from(elements).indexOf(activated.target);
        renderIndicators();
        }
    }, {
        root: carousel,
        threshold: 0.5
    });

    elements.forEach(function (element) {
        observer.observe(element);
    });

    // Initial render of indicators
    renderIndicators();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>