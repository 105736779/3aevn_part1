<?php$currentPage = basename($_SERVER['PHP_SELF']); // Get the current page's filename?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="keywords" content="AI, IT, IT Company, Computer, Aevina, Artificial Intelligence, Official, Homepage">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Aevina's Official Website Homepage">
  <meta name="author" content="Aevina Team">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Aevina - Innovators in Artificial Intelligence</title>
</head>

<body>

  <?php 
  // Help from ChatGPT to get the current page name for correct CSS styling
  $currentPage = basename($_SERVER['PHP_SELF']);
  include 'header.inc'; 
  ?>

  <main>
    <figure id="homepage-image-container">
      <!-- image generated from chatgpt -->
      <img src="images/background-image.png" alt="Homepage Image" id="homepage-image">
      <section class="slogan-overlay">
        <h1 class="animation-slide slideInTop">Engineering Intelligence, Delivering Results</h1>
        <p class="animation-slide slideInBottom">AI solutions designed to evolve with your ambitions</p>
      </section>
    </figure>

    <article class="welcome">
      <h2 class="animation-slide-inscroll slideInLeft">Welcome to Aevina AI</h2>
      <p class="animation-slide-inscroll slideInLeft">
        Aevina AI is a leading technology company specialising in the development of cutting-edge artificial
        intelligence and machine learning solutions. Our mission is to transform industries and improve lives through
        innovative AI applications. We are committed to fostering a collaborative and inclusive work environment where
        talented individuals can thrive and make a real impact.
      </p>
    </article>

    <article class="services-container">
      <h2 class="animation-slide-inscroll slideInRight">Our Key Services</h2>
      <article class="services">
        <section>
          <h3>Machine Learning Development</h3>
          <img src="images/1707285097354.png" alt="Machine Learning Development" class="services-images">
          <p>
            We build custom machine learning models to analyse data, automate processes, and predict future outcomes.
          </p>
        </section>
        <section>
          <h3>Natural Language Processing</h3>
          <img src="images/1674819272389.jpg" alt="Natural Language Processing" class="services-images">
          <p>
            Our NLP solutions enable businesses to understand and process human language, improving communication and
            customer service.
          </p>
        </section>
        <section>
          <h3>Computer Vision</h3>
          <img src="images/Blog-Banner-Computer-Vision.jpg" alt="Computer Vision" class="services-images">
          <p>
            We develop computer vision systems that allow machines to "see" and interpret images and videos, with
            applications in robotics, security, and more.
          </p>
        </section>
      </article>
    </article>

    <section class="hiring">
      <h2 class="animation-slide-inscroll slideInBottomScale">Join Our Team</h2>
      <p class="animation-slide-inscroll slideInBottomScale">
        Aevina AI is actively seeking skilled and dedicated individuals to join our team. <br>We offer a stimulating
        work environment and the chance to contribute to groundbreaking AI development.
      </p>
      <a href="jobs.php" class="job-des-nav-button animation-slide btn-breathe">
        Wanna work with us? Click here to see more!
      </a>
    </section>
  </main>

<?php
// Help from ChatGPT to get the current page name for correct CSS styling
$currentPage = basename($_SERVER['PHP_SELF']);
include 'footer.inc'; 
?>

</body>

</html>