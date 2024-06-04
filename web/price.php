<?php


// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teapotsdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT prod_id, prod_name, prod_category, prod_desc, prod_price FROM products";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="price.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Petrona:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Shadow&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amethysta&family=Londrina+Shadow&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amethysta&family=Literata:ital,opsz,wght@0,7..72,200..900;1,7..72,200..900&family=Londrina+Shadow&display=swap" rel="stylesheet">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>


<style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('menu.png'); /* Replace 'main_background.jpg' with the actual image URL */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif; /* Add your preferred font-family here */
        }
        h3       
{
color: burlywood;
text-align: center;
}
.price{
    right: 2px;
}
.des{
    font-style: arial;
}
h2{
    color: burlywood;
    text-align: center;
}
    </style>
    

    <div class="right">
    <a href="contact.php"><ion-icon name="arrow-forward-outline"></ion-icon></a>
</div>

<div class="left">
    <a href="about.php"><ion-icon name="arrow-back-outline"></ion-icon></a>
</div>

<h1>It is our pride to offer premium quality <br> product from all over LSPU</h1>

<div class="tab-container">
    <button class="tablink" onclick="openTab('skills')">ALL</button>
    <button class="tablink" onclick="openTab('hobbies')">MILKTEA</button>
    <button class="tablink" onclick="openTab('education')">COFFEE</button>
    <button class="tablink" onclick="openTab('about')">BREAD</button>
</div>

    <h2>Updated Product</h2>
<div id="skills" class="tab-content">
    <div class="grid-container">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<h2 class='head'>" . $row["prod_name"] . "<span class='price'>" . $row["prod_price"] . " php</span></h2>";
                echo "<p class='des'>" . $row["prod_desc"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</div>

      
      <div id="hobbies" class="tab-content">
        <h3>MILKTEA</h3>
        <div class="grid-container">
            <div class="left-column">
              <h2 class="head">Red Velvet Milktea <span class="price">39 php</span></h2>
              <p class="des">A dark, red chocolate milktea with a sweet aftertaste that blends well with anything.</p>
    
              <h2 class="head">Matcha Milktea <span class="price">39 php</span></h2>
              <p class="des">A bittersweet milktea with the blend of fresh tea leaves and a slightly bitter taste.</p>
    
              <h2 class="head">Salted Caramel<span class="price">39 php</span></h2>
              <p class="des">A sweet yet slightly salty milktea flavor that is unique and flavorful.</p>
           </div>
    
           <div class="center-column">
            <h2 class="head">Okinawa Milktea <span class="price">39 php</span></h2>
            <p class="des">A classic milktea flavor with a rich and creamy taste.</p>
    
            <h2 class="head">Blueberry Milktea <span class="price">39 php</span></h2>
            <p class="des">A fruity and creamy milktea with a refreshing blueberry flavor.</p>
    
            <h2 class="head">Lemon Milktea <span class="price">39 php</span></h2>
            <p class="des">A tangy and creamy milktea with the zesty taste of lemon.</p>
           </div>

           <div class="right-column">
            <h2 class="head">RedVelvet Milktea <span class="price">39 php</span></h2>
              <p class="des">A dark, red chocolate milktea with a sweet aftertaste that blends well with anything.</p>

              <h2 class="head">Salted Caramel<span class="price">39 php</span></h2>
              <p class="des">A sweet yet slightly salty milktea flavor that is unique and flavorful.</p>
    
              <h2 class="head">Hokkaido Milktea <span class="price">39 php</span></h2>
              <p class="des">A unique and tasty flavor of milktea that originated from a foreign country.</p>
           </div>
          </div>
      </div>

      <div id="education" class="tab-content">
            <h3>COFFEE</h3>
            <div class="grid-container">
              <div class="left-column">
                 
                <h2 class="head">Coffee American <span class="price">89 php</span></h2>
                <p class="des">A blend of pure, black coffee that will shake anyone awake with its strong flavor.</p>
        
                <h2 class="head">Matcha Coffee <span class="price">89 php</span></h2>
                <p class="des">A blend of dirty matcha that tastes fragrant and bitterly sweet.</p>
        
                <h2 class="head">Caramel <span class="price">89 php</span></h2>

            </div>
            <div class="center-column">
                <h2 class="head">Hazelnut <span class="price">89 php</span></h2>
                <p class="des">A nutty flavored coffee for customers who love the taste of hazelnut in their coffee.</p>
        
                <h2 class="head">Espresso <span class="price">89 php</span></h2>
                <p class="des">A classic flavor of coffee favored by anyone and recommended for people who want to try drinking coffee first.</p>
 
                <h2 class="head">Cinnamon <span class="price">89 php</span></h2>
                <p class="des">A coffee that adds a little spice and sweetness to a coffee, making a unique tasting sweetness.</p>
            </div>
            <div class="right-column">
                <h2 class="head">Mocha <span class="price">89 php</span></h2>
                <p class="des">A coffee that combines chocolate and coffee flavors for a decadent taste.</p>
        
                <h2 class="head">Hot Mocha <span class="price">89 php</span></h2>
                <p class="des">A pour of hot, blended mocha that is perfect for a cold day.</p>
        
                <h2 class="head">Hot Chocolate <span class="price">89 php</span></h2>
                <p class="des">A warm cup of chocolate coffee, loved by many customers to start their day.</p>
        
            </div>
          </div>
      </div>
      

      <div id="about" class="tab-content">
        <h3>BREAD</h3>
        <div class="grid-container">
          <div class="left-column">
              <h2 class="head">Plain Croissant <span class="price">50 php</span></h2>
              <p class="des">A classic buttery croissant that pairs well with coffee or tea.</p>
      
              <h2 class="head">Whole Wheat Bagel <span class="price">80 php</span></h2>
              <p class="des">A healthier option with the goodness of whole wheat, perfect for a light breakfast.</p>
      
              <h2 class="head">Garlic Bread <span class="price">70 php</span></h2>
              <p class="des">Slices of bread toasted with garlic butter, ideal for a savory snack.</p>
          </div>

          <div class="center-column">
              <h2 class="head">Cheese Focaccia <span class="price">100 php</span></h2>
              <p class="des">A flavorful Italian bread with melted cheese on top, great for cheese lovers.</p>
      
              <h2 class="head">Baguette <span class="price">60 php</span></h2>
              <p class="des">A classic French bread with a crispy crust and soft interior, ideal for sandwiches.</p>
      
              <h2 class="head">Pretzel <span class="price">70 php</span></h2>
              <p class="des">A twisted bread snack with a salty flavor, perfect for munching on the go.</p>
          </div>
          <div class="right-column">
              <h2 class="head">Sourdough Bread <span class="price">90 php</span></h2>
              <p class="des">A tangy and chewy bread made from naturally fermented dough, great for toasting.</p>
      
              <h2 class="head">Brioche <span class="price">80 php</span></h2>
              <p class="des">A rich and buttery bread perfect for breakfast or as a dessert with jam or Nutella.</p>
    
              <h2 class="head">Ciabatta <span class="price">100 php</span></h2>
              <p class="des">An Italian bread with a crispy crust and airy interior, great for sandwiches or bruschetta.</p>
          </div>
        </div>
      </div>

<script>
    function openTab(tabName) {
        var i;
        var x = document.getElementsByClassName("tab-content");
        if (tabName === 'skills') {
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "block"; // Show all tab content
            }
        } else {
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none"; // Hide all tab content
            }
            document.getElementById(tabName).style.display = "block"; // Show selected tab content
        }
    }
</script>

</body>
</html>

<?php
$conn->close();
?>