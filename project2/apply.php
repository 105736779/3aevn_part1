<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags for encoding, SEO keywords, mobile responsiveness, and description -->
  <meta charset="UTF-8">
  <meta name="keywords"
    content="AI, IT, IT Company, Computer, Aevina, Artificial Intelligence, Official, Application, Form">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Aevina's Official Website Application Page">
  <meta name="author" content="Aevina Team">
  <!-- Link to external CSS file -->
  <link rel="stylesheet" href="styles/styles.css">

  <!-- Page title shown in browser tab -->
  <title>Aevina - Innovators in Artificial Intelligence</title>
</head>

<body>

  <!-- Main header containing the navigation bar -->
  <?php 
  // Help from ChatGPT to get the current page name for correct CSS styling
  include 'header.inc'; 
  ?>

  <!-- Main content area: Job application form -->
  <main class="apply-main" role="main">
    <article>
      <section aria-labelledby="form-title">
        <h2 id="form-title">Job Application Form</h2>


        <!-- Begin form: POST method to Swinburne testing endpoint -->
        <form action="process_eoi.php" method="post" id="application-form"
          aria-describedby="form-title">

          <!-- Job Reference selection -->
          <fieldset>
            <legend>Job Reference Number <span class="required">*</span></legend>
            <select name="job_ref_number" required aria-required="true" aria-label="Job Reference Number">
              <option value="">Select Job Ref Number</option>
              <option value="AIE78">AIE78</option>
              <option value="DSE78">DSE78</option>
            </select>
            <!-- Helpful link to job listings -->
            <p class="small-description">Don’t know the job application number? <a href="jobs.php"
                class="job-link">Check out our Job Descriptions Page</a></p>
          </fieldset>

          <!-- Personal information fields -->
          <fieldset>
            <legend>Personal Information</legend>

            <div class="form-row">
              <label for="first_name">First Name <span class="required">*</span></label>
              <input type="text" id="first_name" name="first_name" required maxlength="20" pattern="^[A-Za-z\s]{1,20}$"
                placeholder="Enter your first name" aria-required="true">
            </div>

            <div class="form-row">
              <label for="last_name">Last Name <span class="required">*</span></label>
              <input type="text" id="last_name" name="last_name" required maxlength="20" pattern="^[A-Za-z\s]{1,20}$"
                placeholder="Enter your last name" aria-required="true">
            </div>

            <div class="form-row">
              <label for="dob">Date of Birth <span class="required">*</span></label>
              <input type="date" id="dob" name="dob" required pattern="\d{2}/\d{2}/\d{4}" placeholder="dd/mm/yyyy"
                aria-required="true">
            </div>

            <div class="form-row">
              <label>Gender <span class="required">*</span></label>
              <div class="radio-group" role="radiogroup" aria-required="true">
                <!-- Gender selection radio buttons -->
                <label for="male">Male</label>
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="female">Female</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="other">Other</label>
                <input type="radio" id="other" name="gender" value="other">
              </div>
            </div>



            <div class="form-row">
              <label for="phone">Phone Number <span class="required">*</span></label>
              <input type="tel" id="phone" name="phone" required pattern="^[\d\s]{8,12}$"
                placeholder="Enter your phone number" aria-required="true">
            </div>

            <div class="form-row">
              <label for="email">Personal Email <span class="required">*</span></label>
              <input type="email" id="email" name="email" required placeholder="Enter your email" aria-required="true">
            </div>
          </fieldset>

          <!-- Address details -->
          <fieldset>
            <legend>Address Details</legend>

            <div class="form-row">
              <label for="address">Street Address <span class="required">*</span></label>
              <input type="text" id="address" name="address" required maxlength="40" pattern="^[A-Za-z0-9\s,.-]{1,40}$"
                placeholder="Enter your address" aria-required="true">
            </div>

            <div class="form-row">
              <label for="suburb">Suburb/Town <span class="required">*</span></label>
              <input type="text" id="suburb" name="suburb" required maxlength="40" pattern="^[A-Za-z0-9\s,.-]{1,40}$"
                placeholder="Enter your suburb/town" aria-required="true">
            </div>

            <div class="form-row">
              <label for="postcode">Postcode <span class="required">*</span></label>
              <input type="text" id="postcode" name="postcode" required pattern="^\d{4}$"
                placeholder="Enter your postcode" aria-required="true">
            </div>

            <div class="form-row">
              <label for="state">State <span class="required">*</span></label>
              <!-- State selection dropdown -->
              <select id="state" name="state" required aria-required="true">
                <option value="">Select your state</option>
                <option value="vic">VIC</option>
                <option value="nsw">NSW</option>
                <option value="qld">QLD</option>
                <option value="nt">NT</option>
                <option value="wa">WA</option>
                <option value="sa">SA</option>
                <option value="tas">TAS</option>
                <option value="act">ACT</option>
              </select>
            </div>
          </fieldset>

          <!-- Education and skills -->
          <fieldset>
            <legend>Qualifications & Certifications</legend>

            <div class="form-row">
              <label for="degree">Degree</label>
              <input type="text" id="degree" name="degree" placeholder="Enter your degree">
            </div>

            <div class="form-row">
              <label>Required Technical Skills</label>
              <div class="checkbox-group" role="group">
                <!-- Checkbox group for tech skills -->
                <input type="checkbox" id="java" name="skills[]" value="Java">
                <label for="java">Java</label>

                <input type="checkbox" id="python" name="skills[]" value="Python">
                <label for="python">Python</label>

                <input type="checkbox" id="html" name="skills[]" value="HTML">
                <label for="html">HTML</label>
              </div>
            </div>

            <div class="form-row">
              <label for="other_skills">Other Skills</label>
              <!-- Free text area for other skills -->
              <textarea id="other_skills" name="other_skills" rows="4"
                placeholder="Describe your other skills here..."></textarea>
            </div>
          </fieldset>

          <!-- Form submission controls -->
          <div class="form-footer" role="group" aria-label="Form Actions">
            <!-- Status hidden field added as required -->
            <input type="hidden" name="status" value="New">
            <input type="submit" value="Apply">
            <input type="reset" value="Reset">
          </div>
        </form>
      </section>
    </article>
  </main>

  <?php 
  // Help from ChatGPT to get the current page name for correct CSS styling
  $currentPage = basename($_SERVER['PHP_SELF']);
  include 'footer.inc'; 
  ?>
</body>

</html>