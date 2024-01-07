<!DOCTYPE html>
<html lang="cz">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panely</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <style>
    /* Add some custom styles if needed */
    .footer-panel {
        width: 100%;
        background-color: #f8f9fa; /* Bootstrap light gray background color */
        padding: 10px;
        text-align: center;
    }
    body {
      margin: 0;
      padding: 0;
    }

    h1 {
      position: absolute;
      top: 5%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
    }
    </style>

    </head>
    <body>



<!-- backgroudn images  -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">                
        <div class="carousel-item active">
            <img src="Images/projectPicture.jpg" class="d-block w-100" style="max-height: 800px;" alt="First slide">
            <!-- <div class="carousel-caption position-absolute top-0 start-50 translate-middle-x text-center">
                <h1 style="font-size: 3em;">Projekty studentů SPŠE Plzeň</h1>
            </div> -->

        </div>
        <div class="carousel-item">
            <img src="Images/projectPicture1.jpg" class="d-block w-100" style="max-height: 800px;" alt="Second slide">
            <!-- <div class="carousel-caption position-absolute top-0 start-50 translate-middle-x text-center">
                <h1 style="font-size: 3em;">Projekty studentů SPŠE Plzeň</h1>
            </div> -->
        </div>
        <div class="carousel-item">
            <img src="Images/projectPicture2.jpg" class="d-block w-100" style="max-height: 800px;" alt="Third slide">
            <!-- <div class="carousel-caption position-absolute top-0 start-50 translate-middle-x text-center">
                <h1 style="font-size: 3em;">Projekty studentů SPŠE Plzeň</h1>
            </div> -->
        </div>
        <div class="carousel-item">
            <img src="Images/projectPicture3.jpg" class="d-block w-100" style="max-height: 800px;" alt="Fourth slide">
            <!-- <div class="carousel-caption position-absolute top-0 start-50 translate-middle-x text-center">
                <h1 style="font-size: 3em;">Projekty studentů SPŠE Plzeň</h1>
            </div> -->
        </div>
    </div>
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button> -->
    <!-- Carousel Indicators -->
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>

    </ol>    
</div>

<!-- headline  -->
<h1 style="font-size: 3em">Projekty studentů SPŠE</h1>


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
        
    </div>
    
</div>
<br>
<br><br>






<!-- display the projects -->
<div class="container ">
<h2 class="display-4 text-center">Projekty</h2>

<!-- Search form -->
<br>   
<div class="row">
<div class="col">
    <div class="mb-3">
        <input type="text" class="form-control w-100" id="nameInput" placeholder="Zadejte název hledaného projektu">
    </div>
</div>
<div class="col-auto">
    <div class="mb-3">
        <button type="submit" class="btn btn-primary btn-block" onclick="Search()">Vyhledat</button>
    </div>
</div>
</div>
<br>
<br>
<div id="allProjects">

<?php
    //get column: Name, Institution, Specialization, Contact, Details

    //createTestPanel();


    $data = getCompanyesFromDatabase();
    
    //display panels for evry project
    if($data != null)    
    {
        $i = 0;
        foreach($data as $row)
        {
            echo "<div name='".$row['Name']."'>
            <div class='row panel-clickable rounded' style='background-color: #D2D2D2;' onclick='onPanelClicked(". $i .")' name='".$row['Name']."'>
                <div class='col-lg-4'>
                    <div class='panel'>
                        <br>
                        <h2 class='text-start'>" . $row['Name'] . "</h2>
                    </div>
                </div>
                
                <div class='col-lg-2'>
                    <div class='panel small-panel d-flex align-items-center justify-content-center rounded'>
                        <br><br><br><br>
                        <p class='text-center m-0'>" . $row['Institution'] ."</p>
                    </div>                        
                </div>
        
                <div class='col-lg-2'>
                    <div class='panel small-panel d-flex align-items-center justify-content-center rounded'>
                        <br><br><br><br>
                        <p class='text-center m-0'>" . $row['Specialization'] ."</p>
                    </div>                        
                </div>
        
                <div class='col-lg-2'>
                    <div class='panel small-panel d-flex align-items-center justify-content-center rounded'>
                        <br>
                        <br><br><br>
                        <p class='m-0'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='mailto:". $row['Contact'] ."' onclick='event.stopPropagation();'>". $row['Contact'] ."</a></p>
                    </div>
                </div>
                
                <!-- Longer Text Panel -->
                <div class='col-lg-4 text-center mx-auto rounded' style='display: none; background-color: #D2D2D2;' id='detailText".$i."'>
                    <div class='panel d-flex align-items-center justify-content-center text-center'>
                        <p class='m-0'>". $row['Details'] ."</p>
                    </div>
                </div>
                        
            </div><br>
        </div>";
        $i++;
        }
    }
   

    function getCompanyesFromDatabase()
    {
        $serverName = "localhost:3306";
        $userName = "root";
        $password = "";
        $dbName = "testtable";

        try
        {
            $conn = new mysqli($serverName, $userName, $password, $dbName);
        }
        catch (Exception $e)
        {
            return null;
        }

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

    function createTestPanel()
    {
        $name = "TestName";
        $i = 0;
        $Instutution = "SPSE";
        $Specialization = "Programovani";
        $Contact = "neco@gmail.com";
        $Details = "asfk sdjfks jfkjsdkgshdkj skfjk sdfjsjdfkjs adk fjksd fk jskd jfk sdfkl sk fjklsd jfklsdk fsdkjfk sdjdkf jksfksjdk lfjklsdj ksdjfkl sakldf jl";

        echo "<div name='".$name."'>
            <div class='row panel-clickable rounded' style='background-color: #D2D2D2;' onclick='onPanelClicked(". $i .")' name='".$name."'>
                <div class='col-lg-4'>
                    <div class='panel'>
                        <br>
                        <h2 class='text-start'>" . $name . "</h2>
                    </div>
                </div>
                
                <div class='col-lg-2'>
                    <div class='panel small-panel d-flex align-items-center justify-content-center rounded'>
                        <br><br><br><br>
                        <p class='text-center m-0'>" . $Instutution ."</p>
                    </div>                        
                </div>
        
                <div class='col-lg-2'>
                    <div class='panel small-panel d-flex align-items-center justify-content-center rounded'>
                        <br><br><br><br>
                        <p class='text-center m-0'>" . $Specialization ."</p>
                    </div>                        
                </div>
        
                <div class='col-lg-2'>
                    <div class='panel small-panel d-flex align-items-center justify-content-center rounded'>
                        <br>
                        <br><br><br>
                        <p class='m-0'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='mailto:". $Contact ."' onclick='event.stopPropagation();'>". $Contact ."</a></p>
                    </div>
                </div>
                
                <!-- Longer Text Panel -->
                <div class='col-lg-4 text-center mx-auto rounded' style='display: none; background-color: #D2D2D2;' id='detailText".$i."'>
                    <div class='panel d-flex align-items-center justify-content-center text-center'>
                        <p class='m-0'>". $Details ."</p>
                    </div>
                </div>
                        
            </div><br>
        </div>";
    }


?>

<!-- test project panel -->


</div>
</div>






<br><br><br><br>
<!-- Footer Panel -->
<div class="footer-panel">
    <div class="container">
        <p>Vytvořil <strong>Michal Svoboda</strong> &copy; 2023</p>
        <p>Kontaktujte mě na <a href="https://www.linkedin.com/in/johndoe/" target="_blank">LinkedIn</a> nabo na <a href='mailto:michal.svoboda05@gmail.com' onclick='event.stopPropagation();'>michal.svoboda05@gmail.com</a></p>
    </div>
</div>

<!-- my scrpits -->
<script> 
//display and hide the details text
function onPanelClicked(panelNum)
{
    console.log("panel onPanelClicked");
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