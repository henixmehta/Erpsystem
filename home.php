<html>
  <head >
    <title>Home page</title>
      <link href="bootstrap.min.css" rel="stylesheet" />
      <link href="StyleSheet.css" rel="stylesheet" />
      
      <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@700&display=swap" rel="stylesheet"/>   
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
          crossorigin="anonymous"></script> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
          crossorigin="anonymous"></script>    
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"/>

      <style>          
          body{
            margin-top: 62px;
          }
          form {
            background-color:lightgray;
          }

          .background-container {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('pictures/Main.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color: gray;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
          }

          /* heading */
          .texth {
            text-align: center;
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
          }
 
          .welcome {
            font-family: 'Pacifico', cursive;
            color: white; /* Gold */
            font-size: 55px;
            margin-top:125px;
          }

          h1 {
            font-family: 'Playfair Display', serif;
            font-size: 77px;
            font-weight: bold;
            color: white;
            text-transform :capitalize ;
          }

        /* navbar */
          .navbar {
            height: 53px;
            padding-left: 147px;
            background-color: rgb(255 255 255 / 2%) !important
          }

          .navbar-light .navbar-brand {
            color: rgb(0 173 255 / 90%);
          }

          .navbar-toggler {
                padding: 1.25rem 0.75rem;
                font-size: 1.25rem;
                line-height: 1;
                background-color: transparent;
                border: 1px solid transparent;
                border-radius: 0.25rem;
                transition: box-shadow .15s ease-in-out;
            }
          .navbar a.nav-link {
            color: rgb(0 173 255 / 100%) !important;
          }

          .navbar a {
            font-size: 14px;
            font-weight: bold;
            font-family: 'Bell MT';
            text-transform: uppercase;
            text-decoration: none;
          }

          a {
            text-decoration: none;
            color: black;
          }

          .navbar a:hover {
            color: darkblue; /* Change color on hover */
          }

          .navbar .dropdown-menu .dropdown-item:focus {
            color: black;
            background-color: transparent;
          }

          .nav-item {
            margin-right: 10px;
          }

          .logo_span {
            font-size: 24px;
            font-weight: bold;
            font-family: 'Bell MT';
            text-transform: capitalize;
            display: inline-block;
            margin-top: 10px;
          }

          .search-form {
            margin-right: 20px;
            margin-top: 10px;
          }

          .navbar-brand {
            margin-right: 10px;
            width: 40px;
            height: 40px;
            border-radius: 90%;
          }

          .account-dropdown {
            margin-left: 20px;
          }

          .navbar a.nav-link:hover,
          .navbar .dropdown-item:hover {
            color: #555;
            text-decoration: none;
          }

          .navbar a:hover {
              color: #555 !important; 
          }
          
          /* Services section */
          .service-section {
            text-align: center;
            padding: 40px; 
            background-color: rgba(0 , 0, 0, 0.3);
            color: #fff;
          }

          .service-heading {
            font-size: 27px;
            font-weight: bold;
            margin-bottom: 30px; /* Adjusted margin */
            text-align: center;
            text-transform: uppercase;
            color: #fff8;
            font-family: 'Georgia', serif;
            margin-bottom: 42px;
            padding-top:20px;
          }

          .service-img {
            width: 100%;
            max-width: 350px; 
            height: auto; 
            margin-top: 20px; 
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
          }

          .service-title {
            font-size: 22px; 
            font-weight: bold;
            color: #A5A4A5;
            font-family: 'Baskerville Old Face';
            text-transform: uppercase;
          }

          .service-details {
            margin-top: 15px; 
            font-size: 16px;
            color: #f1f2f3;
            font-family: 'Verdana', sans-serif;
          }

          .bodyservice {
            padding: 0px 0; 
            background-color: #f8f9fa;
            color: #333;
            text-align: center;
          }

          .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; 
            margin-bottom: 0px;
            margin-top: px; 
            text-align: center;
          }

          .col-sm {
            flex: 1; 
            margin-bottom: 0px;
          }

          .custom-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px; 
            background-color: #333;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
          }

          @media (min-width: 768px) {
            .service-img {
              max-width: 100%;
              height: auto;
            }
          }

          /* how it work */             
           .bodyhow {
            font-family: Arial, sans-serif;
            background-color: rgba(255, 255, 255, 0.1);
            width: 105%;
            margin-top: 0px;
          }
      
          .container {
            max-width: 1200px;
            margin: 0px 14px;
            padding: 0;
          }
          
          .row1 {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            margin-bottom: 19px;
            flex-direction: row;
            align-content: space-between;
            align-items: center;
            margin-top: 0px;
            text-align: center;
            margin-right: -135px;
            margin-left: 93px;
          }          

          .col-lg-4 {
            flex-basis: calc(33.33% - 30px);
            margin-bottom: 100px;
          }
          
          .step-heading{
            font-size: 27px;
            font-weight: bold;
            margin-bottom: 42px;
            text-align: center;
            text-transform: uppercase;
            color: #fff8;
            font-family: 'Georgia', serif;
            margin-left:330px;
            padding-top:20px;
          }
       
          .step {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
          }
          
          .step-number {
            width: 40px;
            height: 40px;
            background-color: #333;
            color: #fff;
            border-radius: 50%;
            font-size: 18px;
            line-height: 40px;
            text-align: center;
            margin-bottom: 10px;
            margin-left: 125px;                      
          }
          
          .step-title {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
            margin-left: -12px;        
          }
          
          .step-description {
            font-size: 16px;
            margin-top: 15px;
            color: #666;
            line-height: 1.5;
            font-family: 'Roboto', sans-serif;
          }

          .carousel-indicators {
            padding-left :10%;
          }

          .carousel-indicators li {
            border-radius: 10%;
            background-color: silver;
            width: 40px;
            height: 4px;
            margin: 20px 10px; 
            cursor: pointer;
            padding-left: 10px;
            border: none; 
          }

          .carousel-indicators .active {
            background-color: #ff511c;
            width: 40px;
            height: 4px;
            margin: 20px 10px; 
            cursor: pointer;
          }

          .carousel-inner {
            border-radius: 5px;
            margin-bottom :40px;
            padding:100px;
            background-color :rgba(0,0,0,0.7);
          }

          .carousel-item {
            height: 200px; 
            text-align: center;
          }

          .carousel-caption {
            background-color: white ;
            padding: 50px;
            height:200px;
            border-radius: 5px;
            color: black;
          }

          .carousel-caption h4 {
            font-size: 15px;
            margin-bottom: 5px;
            font-family :Arial;
            margin-top :10px;
            margin-left :10px ;
          }

          .carousel-caption p {
            font-style: italic;
            font-size: 16px;
            font-family :Caladea ;
            font-weight :500 ;
          }
                
          .check{
            color :orange ;
          }

          .img-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
            border : 1px solid black;
            margin : auto ;
          }

          .img-circle img {
            width: 100%;
            height: 100%;
            background-size: cover;
            }

          h2 {
            font-size: 27px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align :center ;
            text-transform :uppercase ;
            color: #fff8;
            font-family: 'Georgia', serif;
          }
            
          h3 {
            font-size:18px;
            font-weight: bold;
            margin-bottom: 30px;
            text-transform :uppercase ;            
          }

          ul {
            list-style:none;
          }

          /* footer */
          .containerend{
            max-width: 1350px;
            margin: -20px 14px;
            padding: 0;
            margin-top:-40px;
          }

          footer {
            background-color: rgba(0  , 0, 0, 0.3);
            border-radius: 15px;
          }

          .footer-columns {
            justify-content: space-between;
            margin-top: 38px;
            margin-left: 200px;
            text-align: center;
            padding: 30px;
            margin-bottom:32px;
          }

          .footer-column h5 {
            color: #f8f9fa; 
            font-size : 20px; 
            margin-bottom: 20px; 
            margin-left: 45px;
          }

          h5{
            font-family: 'Georgia', serif;
          }

          p{
            font-family: 'Verdana', sans-serif;
          }

          li{
            font-family: 'Verdana', sans-serif;
          }

          .footer-column p,
          .footer-column ul {
            color: #c9d1d9;
            font-size: 16px; 
            margin-bottom: 7px;
            margin-left: 10px;
          }

          .footer-column li{
            margin-bottom: 4px;
          }

          .footer-column a {
            color: #c9d1d9; /* Link color (light blue) */
            text-decoration: none; /* Remove default underline */
          }

          .footer-column a:hover {
            color: #58a6ff; /* Link color on hover (bright blue) */
          }

          /* que icon */
          .custom-question-icon {
            color: grey; /* Change color */
            font-size: 36px; /* Change size */
            margin-right: 10px; /* Adjust spacing */
          }

          /* icon */
          .custom-icon {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align :center ;
            text-transform :uppercase ;
          }
          
          /* slide images */
          * {
            box-sizing: border-box;
          }
          
          .mySlides {
            display: none;
            position: relative;
          }

          img {
            vertical-align: middle;
          }

          /* Slideshow container */
          .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: 1px;
            margin-top:52.50px; 
          }

          .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 1550px;
            width: 1521px;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
          }
          
          /* Caption text */
          .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
            margin-left:230px;
            font-family: Verdana, sans-serif;
          }

          /* Number text (1/3 etc) */
          .numbertext {
            color: #f2f2f2;
            font-size: 12px;  
            padding: 8px 12px;
            position: absolute;
            top: 0;
          }

          /* The dots/bullets/indicators */
          .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
            margin-bottom:10px;
          }

          .active {
            background-color: #717171;
          }

          /* Fading animation */
          .fade {
            animation-name: fade;
            animation-duration: 2s;
          }

          @keyframes fade {
            from {opacity: 0.4} 
            to {opacity: 0.95}
          }

          /* On smaller screens, decrease text size */
          @media only screen and (max-width: 300px) {
            .text {font-size: 11px}
          }

          .setpic{
            width: 1521px ;
            height: 92.50%;
          }

          
          /* size */
          @media (max-width: 767px) {
          .navbar-brand {
          position: relative;
          }

          .logo-container {
            margin-right: 300px; 
          }

          .logo_span {
            font-size: 17px; 
            font-weight: bold;
            font-family: 'Bell MT';
            text-transform: capitalize;
            margin-top: 0;
            margin-left: 35px; 
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
          }   
        
          .input-group {
            max-width: 250px;
            margin: 0 auto;
          }

          .form-control {
            font-size: 12px;
            }

          .search-icon {
            font-size: 14px;
            vertical-align: middle;
            }

          .search-btn {
            padding: 4px 8px;
          }      

          .dropdown-item {
            padding: 5px 10px;
            text-align:center;
          }
          .col-lg-4 {
            flex-basis: calc(35.33% - 20px);
          }

          .step-number {
            margin-left: 0px; /* Reset margin for larger screens */
          }
        }

        @media (max-width: 767px) {
          
        }

      </style>

</head>
<body>            
  <!-- Navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="pictures/erp.png" alt="Company Logo" width="40" height="40" class="mr-2">
            Apextech
        </a>
  
        <!-- Navigation links -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Projects</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>
  
  <!-- Headings -->
  <div class="background-container">
  <form id="form1" >
    <!-- slide images -->
    <!-- slids -->
    <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="pictures/slide10.jpg" class="setpic">
            <div class="overlay"></div> 
            <div class="text">An ERP system streamlines business processes by integrating various functions.</div>
        </div>

          <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="pictures/x4.jpg" class="setpic">
            <div class="overlay"></div> 
            <div class="text">Unify, Simplify, Excel: Transforming Business with ERP Solutions.</div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="pictures/slide4.jpg " class="setpic">
            <div class="overlay"></div> 
            <div class="text">Effortlessly manage your business operations with our intuitive ERP system!</div>
          </div>
     </div>
    <br>

    <div style="text-align:center">
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
    </div>  
      <div class="texth">
        <h4 class="welcome">welcome to</h4>
        <h1 class="crave" >ApexTech</h1>
        <!-- <h4 class="bold-text">Streamline Your Business <br />Operations with Apextech</h4> -->
      </div>
      </form>
      <!-- services -->
      <div class="bodyservice background-container">
        <div class="service-section">
          <h2 class="service-heading"><i class="fas fa-cogs custom-question-icon"></i> Our Services</h2>
          <div class="row">
            <div class="col-sm">
              <div class="custom-icon"><i class="fas fa-code"></i></div>  
              <div class="service-title">Custom Software Development</div>
              <div class="service-details">Our software development company offers a comprehensive range of services to 
                meet the diverse needs of our clients. From custom software development and mobile app development to web
                development and cloud solutions, we leverage cutting-edge technologies to deliver innovative solutions
                tailored to your specific requirements. With a team of experienced developers, designers, and project
                managers, we ensure high-quality, scalable, and efficient software solutions that drive business growth and success.
            </div>
          </div>
          <div class="col-sm">
              <img class="service-img" src="pictures/image1.jpg" alt="Service Image" />
          </div>
          <div class="col-sm">              
            <i class="fas fa-laptop-code custom-icon"></i>
              <div class="service-title">FrontEnd Development</div>
                <div class="service-details">Our software development company offers a comprehensive range of services 
                  to meet the diverse needs of our clients. From custom software development and mobile app development 
                  to web development and cloud solutions, we leverage cutting-edge technologies to deliver innovative
                  solutions tailored to your specific requirements. With a team of experienced developers, designers,
                  and project managers, we ensure high-quality, scalable, and efficient software solutions that drive
                  business growth and success.</div>
                </div>
              </div>
          </div>
          <div class="service-section">
            <div class="row">
              <div class="col-sm">
                <img class="service-img" src="pictures/image4.jpg" alt="Service Image" />
              </div>
              <div class="col-sm">
                <i class="fas fa-mobile-alt custom-icon"></i>
                  <div class="service-title">Mobile Application Development</div>
                  <div class="service-details">Mobile application development involves creating software applications 
                    specifically designed to run on mobile devices such as smartphones and tablets. These applications 
                    can be developed for various platforms, including iOS (Apple devices) and Android (Google devices), 
                    and they serve a wide range of purposes, from entertainment and social networking to productivity 
                    and e-commerce..
                  </div>
              </div>
              <div class="col-sm">
                  <img class="service-img" src="pictures/image3.jpg" alt="Service Image" />
              </div>
        </div>
      </div>
      
      <!-- how it works -->
      <div class="bodyhow ">       
        <div class="container">
          <h2 class="step-heading"><i class="fas fa-cog custom-question-icon"> </i> How It Works</h2>
          <div class="row1">
            <div class="col-lg-4">
              <div class="step">
                <div class="step-number">1</div>
                <h3 class="step-title">Integration</h3>
                <p class="step-description">Our ERP system consolidates business functions for seamless coordination and data flow.</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="step">
                <div class="step-number">2</div>
                <h3 class="step-title">Automation</h3>
                <p class="step-description">Automating repetitive tasks is not just a key strategy; it's a game-changer in today's fast-paced work environment.</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="step">
                <div class="step-number">3</div>
                <h3 class="step-title">Real-Time Data</h3>
                <p class="step-description">Access up-to-date insights into your business operations for informed decision-making.</p>
              </div>
            </div>
          </div>
          <div class="row1">
            <div class="col-lg-4">
              <div class="step">
                <div class="step-number">4</div>
                <h3 class="step-title">Scalability</h3>
                <p class="step-description">Our ERP system is scalable, adapting to your business's growth and changing needs.</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="step">
                <div class="step-number">5</div>
                <h3 class="step-title">Customization</h3>
                <p class="step-description">Easily customize our ERP system to align with the specialized workflows and demands of your industry</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="step">
                <div class="step-number">6</div>
                <h3 class="step-title">Training & Support</h3>
                <p class="step-description">Receive comprehensive training and support to ensure smooth implementation and usage.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- footer -->
      <footer>
        <div class="containerend">
          <div class="row footer-columns">
            <div class="col-sm footer-column">
              <h5>Company Information</h5>
              <p>Apextech</p>
              <p>B/34 citylight complex, citylight, surat</p>
              <p>Email: apextech@erp.com</p>
              <p>Phone: +972-295-7190</p>
            </div>
            <div class="col-sm footer-column">
              <h5>Useful Links</h5>
              <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </div>
            <div class="col-sm footer-column">
              <h5>Follow Us</h5>
              <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">LinkedIn</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    <!-- </form> -->
        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides() {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("dot");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}    
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
              setTimeout(showSlides, 2000); // Change image every 2 seconds
            }
        </script>  
  </body>
</html>    