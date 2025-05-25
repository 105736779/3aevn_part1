<?php
$currentPage = basename($_SERVER['PHP_SELF']); // Get the current page's filename
?>

<!-- Footer section with contact info, links, team, and social media -->
<footer>
  <article>
    <!-- Contact details -->
    <section aria-label="Contact Information">
      <h3>Contact Us</h3>
      <ul>
        <li>Email to: <a href="mailto:info@aevinaai.com.au" title="info@aevinaai.com.au" target="_blank" hreflang="en"
            class="link">info@aevinaai.com.au</a></li>
        <li>Phone: 0493167158</li>
        <li>Head Office Address: John St, Hawthorn VIC 3122</li>
      </ul>
    </section>

    <!-- External process management link -->
    <section aria-label="Our Process">
      <h3>Our Process</h3>
      <ul>
        <li><a href="https://3aevn.atlassian.net/jira/software/projects/SCRUM/boards/1?sprintStarted=true"
            title="Jira Scrum Project Management" target="_blank" hreflang="en" class="link">Jira Scrum Project
            Management</a></li>
        <li>
          <a href="https://github.com/105736779/3aevn_part1.git" title="Repository Link" target="_blank"
            class="link">GitHub Repository</a>
        </li>
      </ul>
    </section>

    <!-- Footer site navigation -->
    <section aria-label="Navigation Links">
      <h3>Navigation</h3>
      <ul>
        <li><a href="index.php" <?php if ($currentPage !== 'process_eoi.php' && $currentPage == 'index.php') echo 'class="selected" aria-current="page"'; ?>>Home</a></li>
        <li><a href="jobs.php" <?php if ($currentPage !== 'process_eoi.php' && $currentPage == 'jobs.php') echo 'class="selected"'; ?>>Jobs</a></li>
        <li><a href="apply.php" <?php if ($currentPage !== 'process_eoi.php' && $currentPage == 'apply.php') echo 'class="selected" aria-current="page"'; ?>>Apply</a></li>
        <li><a href="about.php" <?php if ($currentPage !== 'process_eoi.php' && $currentPage == 'about.php') echo 'class="selected"'; ?>>About</a></li>
        <li><a href="enhancements.php" <?php if ($currentPage !== 'process_eoi.php' && $currentPage == 'enhancements.php') echo 'class="selected"'; ?>>Enhancements</a></li>
      </ul>
    </section>

    <!-- Team member credits -->
    <section aria-label="Team Members">
      <h3>Members</h3>
      <ul>
        <li>Khanh Nam Le Pham</li>
        <li>Viet Hoang Tran</li>
        <li>Quang Tuan Anh Tran</li>
      </ul>
    </section>

    <!-- Social media icons with hover effect -->
    <section aria-label="Social Media Links">
      <h3>Social</h3>
      <div class="social-icons-container">
        <a href="#" class="social-icon" aria-label="LinkedIn">
          <img src="images/linkedin-grey.svg" class="icon-default" alt="LinkedIn">
          <img src="images/linkedin.png" class="icon-hover" alt="LinkedIn">
        </a>
        <a href="#" class="social-icon" aria-label="Twitter">
          <img src="images/x-grey.svg" class="icon-default" alt="Twitter">
          <img src="images/twitter.png" class="icon-hover" alt="Twitter">
        </a>
        <a href="#" class="social-icon" aria-label="Facebook">
          <img src="images/facebook-grey.svg" class="icon-default" alt="Facebook">
          <img src="images/facebook.png" class="icon-hover" alt="Facebook">
        </a>
        <a href="#" class="social-icon" aria-label="YouTube">
          <img src="images/youtube-grey.svg" class="icon-default" alt="YouTube">
          <img src="images/youtube.png" class="icon-hover" alt="YouTube">
        </a>
        <a href="#" class="social-icon" aria-label="Instagram">
          <img src="images/instagram-grey.svg" class="icon-default" alt="Instagram">
          <img src="images/social.png" class="icon-hover" alt="Instagram">
        </a>
      </div>
    </section>
  </article>

  <!-- Copyright -->
  <article>
    <section>
      <hr>
      <p>Copyright © 2025 Aevina AI. All rights reserved.</p>
    </section>
  </article>
</footer>