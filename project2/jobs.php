<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="keywords"
    content="AI, IT, IT Company, Computer, Aevina, Artificial Intelligence, Official, Jobs, Hiring, description">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Aevina's Official Website Jobs Description Page">
  <meta name="author" content="Aevina Team">
  <title>Aevina - Innovators in Artificial Intelligence</title>
  <link href="styles/styles.css" rel="stylesheet">
</head>

<?php 
include 'header.inc'; 
?>

<!--Image for jobs page-->
  <figure id="jobs-image-container">
    <img src="images/jobs-image.jpg" alt="Jobs Description Image" id="jobs-image">
    <section class="jobs-image-text">
      <h1 class="animation-slide slideInLeft">More Than IT-Your Digital Partner</h1>
      <p class="animation-slide slideInRight">Find Your Perfect Career</p>
    </section>
  </figure>
  <!--Aside tag-->

  <aside id="aside-jobs">
    <div>
      <h3>Apply Process</h3>
      <ol>
        <li>Find your favourite job</li>
        <li>Check our requirements</li>
        <li>Fill in our form</li>
        <li>Apply and wait for responses</li>
      </ol>
    </div>
    <div>
      <h3>Recruitment Process</h3>
      <ol>
        <li>Application review</li>
        <li>CV screening</li>
        <li>Offline Interview</li>
        <li>Official offer</li>
      </ol>
    </div>
    <div id="map">
      <h3>Our Location</h3>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12606.517380861531!2d145.038955!3d-37.82215!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642326bae5aaf%3A0x75e96bbd4988f769!2sSwinburne%20University%20of%20Technology!5e0!3m2!1sen!2sus!4v1744177890599!5m2!1sen!2sus"></iframe>
    </div>
  </aside>
  <!--Main-->
<?php
  require_once "./settings.php";

  if (!$conn) {
      echo "<p>Database connection failed: " . mysqli_connect_error() . "</p>";
  } else {
      // First query: Job listings
      $list_query = "SELECT id, job_title, type, job_reference FROM job";
      $list_result = mysqli_query($conn, $list_query);

      if ($list_result && mysqli_num_rows($list_result) > 0) {
        echo '<main id="main-jobs">';
        echo '<article class="job-list">';
        echo '<h2>Job Listings</h2>';
          while ($row = mysqli_fetch_assoc($list_result)) {
              $id = htmlspecialchars($row['id']);
              $job_title = htmlspecialchars($row['job_title']);
              $type = htmlspecialchars($row['type']);
              $job_reference = htmlspecialchars($row['job_reference']);

              echo '<div class="job-item">';
              echo "<a href='#$id' class='job-item-a'>";
              echo "<h3>$job_title Employment</h3>";
              echo "<p>$type</p>";
              echo "<p><strong>Position Reference: $job_reference</strong></p>";
              echo "</a>";
              echo '<a href="apply.php" class="apply-btn">Apply Now</a>';
              echo '</div>';
          }
      } else {
          echo "<p>No jobs listed in the database.</p>";
      }
      echo '</article>';

      // Second query: Job details
      $detail_query = "SELECT * FROM job";
      $detail_result = mysqli_query($conn, $detail_query);

      if ($detail_result && mysqli_num_rows($detail_result) > 0) {
          while ($row = mysqli_fetch_assoc($detail_result)) {
              $id = htmlspecialchars($row['id']);
              $job_title = htmlspecialchars($row['job_title']);
              $job_overview = htmlspecialchars($row['job_overview']);
              $key_responsibility = htmlspecialchars($row['key_responsibility']);
              $essential_skill = htmlspecialchars($row['essential_skill']);
              $preferable_skill = htmlspecialchars($row['preferable_skill']);
              $salary = htmlspecialchars($row['salary']);
              $ReportsTo = htmlspecialchars($row['ReportsTo']);

              echo "<section id='$id' class='job-details' aria-labelledby='job$id-heading'>";
              echo "<div class='aids-description'>";
              echo "<div class='description-detail'>";
              echo "<h3 id='job$id-heading'>$job_title Overview</h3>";
              echo "<p>$job_overview</p>";
              echo "</div></div>";

              echo "<div class='aids-topic'>";
              echo "<div class='responsibility'>";
              echo "<h3>Key Responsibility</h3>";
              echo "<div class='responsibility-detail'><ul>";
              $tasks = explode('|', $row['key_responsibility']);
              foreach ($tasks as $task) {
                  echo "<li>" . htmlspecialchars(trim($task)) . "</li>";
              }
              echo "</ul></div></div>";

              echo "<div class='skill'><div class='skill-detail'>";
              echo "<h3>Required Skills</h3><ul>";
               echo "<li class='horiziontal-break'>Essential<ol>";
               $essential_skill = explode('|', $row['essential_skill']);
                foreach ($essential_skill as $ess) {
                    echo "<li>" . htmlspecialchars(trim($ess)) . "</li>";
                }
                echo "</ol></li>";
  
                echo "<li>Preferable<ol>";
                $preferable_skill = explode('|', $row['essential_skill']);
                foreach ($preferable_skill as $pref) {
                    echo "<li>" . htmlspecialchars(trim($pref)) . "</li>";
                }
                echo "</ol></li></ul></div></div>";

              echo "<div class='salary'><div class='salary-detail'>";
              echo "<h3>Salary</h3><p>$salary</p></div>";
              echo "<div class='report-to'><h3>Reports To</h3><p>$ReportsTo</p></div>";
              echo "</div></div></section>";
          }
      } else {
          echo "<p>No job details in the database.</p>";
      }

      // Close connection only once
      mysqli_close($conn);
  }
  echo '</main>';

            // Reset pointer to reuse result for mobile view
            mysqli_data_seek($detail_result, 0);

            echo '<section class="mobile-job-list">';
            echo '<h2>Job Listings</h2>';
            while ($row = mysqli_fetch_assoc($detail_result)) {
                $id = htmlspecialchars($row['id']);
                $job_title = htmlspecialchars($row['job_title']);
                $type = htmlspecialchars($row['type']);
                $job_reference = htmlspecialchars($row['job_reference']);
                $job_overview = htmlspecialchars($row['job_overview']);
                $key_responsibility = explode('|', $row['key_responsibility']);
                $essential_skill = explode('|', $row['essential_skill']);
                $preferable_skill = explode('|', $row['preferable_skill']);
                $salary = htmlspecialchars($row['salary']);
                $ReportsTo = htmlspecialchars($row['ReportsTo']);
  
                echo '<details class="mobile-job-item"><summary>';
                echo "<span class='job-title'>$job_title Employment</span>";
                echo "<span class='job-meta'><span class='job-remote'>$type</span>";
                echo "<span class='job-ref'><strong>Position Reference:</strong> $job_reference</span></span>";
                echo "<a class='mobile-apply-btn' href='apply.html'>Apply Now</a>";
                echo "</summary>";
  
                echo "<div class='mobile-job-details'><div class='aids-description'>";
                echo "<div class='description-detail'><h3>$job_title Overview</h3><p>$job_overview</p></div></div>";
  
                echo "<div class='aids-topic'><div class='responsibility'>";
                echo "<h3>Key Responsibility</h3><div class='responsibility-detail'><ul>";
                foreach ($key_responsibility as $task) {
                    echo "<li>" . htmlspecialchars(trim($task)) . "</li>";
                }
                echo "</ul></div></div>";
  
                echo "<div class='skill'><div class='skill-detail'><h3>Required Skills</h3><ul>";
                echo "<li class='horiziontal-break'>Essential<ol>";
                foreach ($essential_skill as $ess) {
                    echo "<li>" . htmlspecialchars(trim($ess)) . "</li>";
                }
                echo "</ol></li>";
  
                echo "<li>Preferable<ol>";
                foreach ($preferable_skill as $pref) {
                    echo "<li>" . htmlspecialchars(trim($pref)) . "</li>";
                }
                echo "</ol></li></ul></div></div>";
  
                echo "<div class='salary'><div class='salary-detail'><h3>Salary</h3><p>$salary</p></div>";
                echo "<div class='report-to'><h3>Reports To</h3><p>$ReportsTo</p></div></div>";
                echo "</div></div></details>";
            }
  
            // Mobile aside section
            echo '<aside class="mobile-aside">
                  <div>
                    <h3>Apply Process</h3>
                    <ol>
                      <li>Find your favourite job</li>
                      <li>Check our requirements</li>
                      <li>Fill in our form</li>
                      <li>Apply and wait for responses</li>
                    </ol>
                  </div>
                  <div>
                    <h3>Recruitment Process</h3>
                    <ol>
                      <li>Application review</li>
                      <li>CV screening</li>
                      <li>Offline Interview</li>
                      <li>Official offer</li>
                    </ol>
                  </div>
                  <div class="mobile-map">
                    <h3>Our Location</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12606.517380861531!2d145.038955!3d-37.82215!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642326bae5aaf%3A0x75e96bbd4988f769!2sSwinburne%20University%20of%20Technology!5e0!3m2!1sen!2sus!4v1744177890599!5m2!1sen!2sus" allowfullscreen></iframe>
                  </div>
                </aside>';
            echo '</section>';
  ?>
<?php 
// Help from ChatGPT to get the current page name for correct CSS styling
$currentPage = basename($_SERVER['PHP_SELF']);
include 'footer.inc'; 
?>
</body>

</html>