<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-image: url('pictures/Main.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 25px auto;
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
            color: #fff;
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

        .contact-form textarea {
            resize: vertical;
        }

        .back-arrow {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .back-arrow i {
            margin-right: 10px;
        }

        .back-arrow:hover {
            background-color: #0056b3;
        }

        .contact-form button {
            display: block;
            width: 100%;
            padding: 15px 0;
            border: none;
            border-radius: 25px; /* Adjust border-radius for the desired rounded shape */
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            text-transform: uppercase; /* Convert text to uppercase */
            letter-spacing: 1px; /* Add spacing between letters */
            transition: background-color 0.3s;
        }

        .contact-form button:hover {
            background-color: #0056b3;
        }
       
        p{
            font-family: 'Times New Roman', serif; 
            font-size: 16px;
        }

        label{
            font-family: 'Times New Roman', serif; 
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="home.php" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
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
