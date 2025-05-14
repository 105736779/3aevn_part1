<?php
$currentPage = basename($_SERVER['PHP_SELF']); // Get the current page's filename

// Skip navigation selection logic if the current page is process_eoi.php
$applySelection = ($currentPage !== 'process_eoi.php' && $currentPage == 'apply.php');
?>

<header>
  <section class="left-nav">
    <nav aria-label="Main navigation">
      <!-- Logo with alt and title attributes -->
      <a href="index.html" class="not" aria-label="Aevina Homepage">
        <img src="images/logo.svg" alt="Aevina AI Logo" title="Aevina AI" loading="lazy" id="logo" class="load">
        <img src="images/logo-text.svg" alt="Aevina AI Text Logo" title="Aevina AI" loading="lazy" id="logo-text">
      </a>
      <!-- Navigation links -->
      <a href="index.php" <?php if ($currentPage !== 'process_eoi.php' && $currentPage == 'index.php') echo 'class="selected" aria-current="page"'; ?>>Home</a>
      <a href="jobs.php" <?php if ($currentPage !== 'process_eoi.php' && $currentPage == 'jobs.php') echo 'class="selected"'; ?>>Jobs</a>
      <a href="apply.php" <?php if ($applySelection) echo 'class="selected" aria-current="page"'; ?>>Apply</a>
      <a href="about.php" <?php if ($currentPage !== 'process_eoi.php' && $currentPage == 'about.php') echo 'class="selected"'; ?>>About</a>
      <a href="enhancements.php" <?php if ($currentPage !== 'process_eoi.php' && $currentPage == 'enhancements.php') echo 'class="selected"'; ?>>Enhancements</a>
    </nav>
  </section>
  <section class="right-nav">
    <div class="language">
      <details id="lang-dropdown">
        <summary aria-label="Language options">
          <img src="images/language.svg" alt="Language" title="Language Icon (for visual only)" class="icon">
        </summary>
        <div id="lang-options" role="list" aria-label="Language selection">
          <p role="listitem">English</p>
          <p role="listitem">Vietnamese</p>
          <p role="listitem">Indian</p>
        </div>
      </details>
    </div>
    <div class="user">
      <details id="user-dropdown">
        <summary aria-label="User account options">
          <img src="images/user.svg" alt="Profile" title="Profile Icon (for visual only)" class="icon">
        </summary>
        <div id="user-info-dropdown" role="region" aria-label="User details">
          <div id="user-avatar">
            <img src="images/Trollface.png" alt="User avatar">
          </div>
          <div id="user-details">
            <p id="user-name">Group07: 3AEVN</p>
            <p id="user-email">105736779@student.swin.edu.au</p>
          </div>
        </div>
      </details>
    </div>
    <div class="hamburger">
      <details id="nav-dropdown">
        <summary id="hamburger-icon-container" aria-label="Navigation options">
          <img src="images/hamburger.svg" alt="Options" title="Hamburger Icon" class="icon">
        </summary>
        <div id="nav-options" role="navigation" aria-label="Navigation Options">
          <p>Navigation</p>
          <a href="index.php" <?php if ($currentPage == 'index.php') echo 'class="selected" aria-current="page"'; ?>>Home</a>
          <a href="jobs.php" <?php if ($currentPage == 'jobs.php') echo 'class="selected"'; ?>>Jobs</a>
          <a href="apply.php" <?php if ($currentPage == 'apply.php') echo 'class="selected" aria-current="page"'; ?>>Apply</a>
          <a href="about.php" <?php if ($currentPage == 'about.php') echo 'class="selected"'; ?>>About</a>
          <a href="enhancements.php" <?php if ($currentPage == 'enhancements.php') echo 'class="selected"'; ?>>Enhancements</a>
        </div>
      </details>
    </div>
  </section>
</header>