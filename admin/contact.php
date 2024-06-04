<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
    <style>
        body {
            background-image: url('6730eb5f-3501-4f76-9ecd-ec103382d3b1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'DM Sans', sans-serif;
            margin: 0;
            padding: 0;
            color: #fff;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }
        .line {
            width: 100px;
            height: 2px;
            background-color: #fff;
            margin: 0 auto 20px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1rem;
        }
        textarea {
            height: 120px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #00bcd4;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0097a7;
        }
        .message {
            margin-top: 20px;
            display: block;
            color: #00bcd4;
            font-size: 1rem;
        }
        @media screen and (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            p {
                font-size: 1rem;
            }
            input[type="text"],
            input[type="email"],
            textarea {
                font-size: 0.9rem;
            }
            button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <div class="line"></div>
        <p>Thank you for your interest in our products and services. For any concerns, queries, and reservations please fill out the form below.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="Name" placeholder="Your Name" required>
            <input type="email" name="Email" placeholder="Your Email" required>
            <textarea name="Message" rows="6" placeholder="Your Message" required></textarea>
            <button type="submit" name="submit_message">Submit</button>
        </form>

        <?php if (isset($_SESSION['success_message']) || isset($_SESSION['error_message'])): ?>
            <span class="message">
                <?php 
                    echo isset($_SESSION['success_message']) ? $_SESSION['success_message'] : $_SESSION['error_message'];
                    unset($_SESSION['success_message']);
                    unset($_SESSION['error_message']);
                ?>
            </span>
        <?php endif; ?>
    </div>

    <!-- Iframe for Google Maps (you can remove or modify this as needed) -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.8997812163852!2d121.30965607493903!3d14.083092986344178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5cdecc5ea9ef%3A0xde5d6f6c9e46d1c2!2sLaguna%20State%20Polytechnic%20University%20-%20San%20Pablo%20City!5e0!3m2!1sen!2sph!4v1713601478065!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</body>
</html>
