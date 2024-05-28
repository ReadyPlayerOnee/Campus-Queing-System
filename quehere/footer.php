 <!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Styles for the footer */
footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  background-color: #333;
  color: #fff;
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
}

.footer-bottom {
  flex: 1;
}

.footer-section.social {
  display: flex;
  align-items: center;
}

.footer-section.social a {
  color: #fff;
  margin-left: 10px;
  font-size: 20px;
}

.footer-section.social a:hover {
  color: #ccc;
}
        
    </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../database/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Footer Example</title>
</head>
<body>
  <!-- Your content goes here -->

  <footer>
    <div class="footer-bottom">
      &copy; 2024 Section Z | Designed by Verano & Frens
    </div>
    <div class="footer-section social">
      <h2>Follow Us</h2>
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-linkedin"></i></a>
    </div>
  </footer>
</body>
</html>