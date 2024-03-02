<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

</head>
<body>
    <style>
        form {
        background-color:transparent;
        display: block;
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
       .containerform {
          max-width: 800px;
          margin: 60px auto;
          padding: 40px;
          background-color: rgba(0, 0, 0, 0.6);
          border-radius: 10px;
          box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
        }
        h1 {
          text-align: center;
          color: #A5A4A5;
          margin: 0px;
          font-weight: 500;
          margin-bottom: 20px;
          font-family: 'Georgia', serif;
        }
        h2 {
          font-size: 24px;
          font-weight: 500;
          color: grey;
          margin-bottom: 15px;
          font-family: 'Verdana', sans-serif;
        }
        .contact-info, .contact-form {
          margin-top: 30px;
        }
        .contact-info h2, .contact-form h2 {
          text-align: center;
          font-weight: 400;
        }
        .contact-info p, .contact-form label {
          margin: 5px 0;
          text-align: center;
          color: #fff;
        }
        .contact-form input, .contact-form textarea {
          width: 100%;
          padding: 10px;
          margin-bottom: 10px;
          border: none;
          border-radius: 5px;
          background-color: rgba(255, 255, 255, 0.1);
          color: #fff;
        }  
        p{
          font-family: 'Times New Roman', serif; 
          font-size: 16px;
        }
        label{
          font-family: 'Times New Roman', serif; 
          font-size: 16px;
        }
        ul {
          list-style:none;
          }

        textarea {
          resize: vertical;
        }

        .contact-form input:hover, .contact-form textarea:hover {
            background-color: rgba(255, 255, 255, 0.3); 
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            transition: background-color 0.3s;
        }
        button[type="submit"] {
          display: block;
          width: 100%;
          padding: 15px 0;
          border: none;
          border-radius: 25px; 
          background-color: #007bff;
          color: #fff;
          cursor: pointer;
          font-weight: bold;
          font-size: 16px;
          text-transform: uppercase; 
          letter-spacing: 1px; 
          transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
          background-color: #0056b3;
        }
        /* navbar */
        a {
          text-decoration: none;
          color: black;
        }

        .navbar {
          height: 53px;
          padding: 27px;
          background-color: rgb(255 255 255 / 2%) !important
        }

        .navbar-light .navbar-brand {
          color: rgb(0 173 255 / 90%);
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
        
        .navbar a:hover {
            color: darkblue; 
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
      }
      
        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .text {font-size: 11px}
        }

</style>
<div class="background-container">
  
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
             </ul>
          </div>
      </div>
    </nav>
  
    <div class="containerform">
    <h1>Contact Us</h1>
    <div class="contact-info">
      <h2>Our Office</h2>
      <p>B/34 citylight complex,</p>
      <p>Surat, Gujarat, 395003 </p>
      <p>India</p>

        <h2>Contact Information</h2>
        <p>Email: apextech@example.com</p>
        <p>Phone: +91 (972) 295-7190</p>
    </div>

    <div class="contact-form">
        <h2>Send us a Message</h2>
        <form id="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit" id="submit-btn">Send Message</button>
        </form>
    </div>
  </div>
 
</body>
</html>