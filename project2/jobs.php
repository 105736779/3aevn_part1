<?php$currentPage = basename($_SERVER['PHP_SELF']); // Get the current page's filename?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="keywords"
    content="AI, IT, IT Company, Computer, Aevina, Artificial Intelligence, Official, Jobs, Hiring, description">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Aevina's Official Website Jobs Description Page">
  <title>Aevina - Innovators in Artificial Intelligence</title>
  <link href="styles/styles.css" rel="stylesheet">
</head>

<?php 
// Help from ChatGPT to get the current page name for correct CSS styling
$currentPage = basename($_SERVER['PHP_SELF']);
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
  <main id="main-jobs">
    <article class="job-list">
      <h2>Job Listings</h2>
      <div class="job-item">
        <a href="#job1" class="job-item-a">
          <h3>AI/ML Engineer Employment</h3>
          <p>Remote</p>
          <p><strong>Position Reference:</strong> AIE78</p>
        </a>
        <a href="apply.php" class="apply-btn">Apply Now</a>
      </div>
      <div class="job-item">
        <a href="#job2" class="job-item-a">
          <h3>Data Scientist Employment</h3>
          <p>Remote</p>
          <p><strong>Position Reference:</strong> DSE78</p>
        </a>
        <a href="apply.php" class="apply-btn">Apply Now</a>
      </div>
    </article>
    <!--Detail-->
    <section id="job1" class="job-details" aria-labelledby="job1-heading">
      <div class="aids-description">
        <div class="description-detail">
          <h3 id="job1-heading">AI/ML Engineer Overview</h3>
          <p>We are seeking a highly motivated and skilled AI Developer to join our growing team and play a crucial role
            in revolutionizing our customer service SaaS platform with cutting-edge artificial intelligence. </p>
        </div>
      </div>
      <div class="aids-topic">
        <div class="responsibility">
          <h3>Key Responsibility</h3>
          <div class="responsibility-detail">
            <ul>
              <li>AI Model Development & Integration:Design, develop, and integrate AI models, primarily utilizing GPT
                into our core SaaS platform.</li>
              <li>Data Management & Analysis: Work with large datasets related to customer interactions, product
                information, and retail transactions.</li>
            </ul>
          </div>
        </div>
        <div class="skill">
          <div class="skill-detail">
            <h3>Required Skills</h3>
            <ul>
              <li class="horiziontal-break">Essential
                <ol>
                  <li>Proven AI Experience: Demonstrated experience in developing and deploying AI solutions</li>
                  <li>Bachelor's Degree: Bachelor's degree in Computer Science, Artificial Intelligence</li>
                </ol>
              </li>
              <li>Preferable
                <ol>
                  <li>Experience with any of the major cloud platforms (AWS, Azure, GCP).</li>
                  <li>Experience with SPARQL or Gremlin query languages for Graph Databases.</li>
                </ol>
              </li>
            </ul>
          </div>
        </div>
        <div class="salary">
          <div class="salary-detail">
            <h3>Salary</h3>
            <p>$120,000</p>
          </div>
          <div class="report-to">
            <h3>Reports To</h3>
            <p>Lead AI Architect</p>
          </div>
        </div>
      </div>
    </section>

    <section id="job2" class="job-details" aria-labelledby="job2-heading">
      <div class="aids-description">
        <div class="description-detail">
          <h3 id="job2-heading">Data Scientist Overview</h3>
          <p>As a Junior Data Scientist at Aevina, you will challenged to understand client problems and formulate
            exacting solutions as part of a professional technical team. </p>
        </div>
      </div>
      <div class="aids-topic">
        <div class="responsibility">
          <h3>Responsibility</h3>
          <div class="responsibility-detail">
            <ul>
              <li>Use your critical thinking and analysis skills to continuously improve our unique of Consumer Data.
              </li>
              <li>Develop a strong practical understandiAWS tools and operations.</li>
              <li>Work with clients to understand their business objectives and provide analytical solutions to meet
                their needs using our geoTribes Platform.</li>
            </ul>
          </div>
        </div>
        <div class="skill">
          <div class="skill-detail">
            <h3>Required Skills</h3>
            <ul>
              <li class="horiziontal-break">Essential
                <ol>
                  <li>Degree with a strong quantitatin a primary disciple such as: phystatistics, engineering,
                    actuarialstudies or computer science.</li>
                  <li>Strong understanding of statis concepts and their application to world problems is essential.</li>
                </ol>
              <li>Preferable
                <ol>
                  <li>Experience in data engineering AWS, GIS software or analysis woul an advantage.</li>
                  <li>Experience working with Hadoop based systems to achieve analytic outcomes</li>
                </ol>
              </li>
            </ul>
          </div>
        </div>
        <div class="salary">
          <div class="salary-detail">
            <h3>Salary</h3>
            <p>$150,000</p>
          </div>
          <div class="report-to">
            <h3>Reports To</h3>
            <p>Lead Data Scientist</p>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- Mobile Job List (hidden on desktop) -->
  <section class="mobile-job-list">
    <h2>Job Listings</h2>
    <!-- Job 1 - Mobile Version -->
    <details class="mobile-job-item">
      <summary>
        <span class="job-title">AI/ML Engineer Employment</span>
        <span class="job-meta">
          <span class="job-remote">Remote</span>
          <span class="job-ref"><strong>Position Reference:</strong> AIE78</span>
        </span>
        <a class="mobile-apply-btn" href="apply.php">Apply Now</a>
      </summary>
      <div class="mobile-job-details">
        <div class="aids-description">
          <div class="description-detail">
            <h3>AI/ML Engineer Overview</h3>
            <p>We are seeking a highly motivated and skilled AI Developer to join our growing team and play a crucial
              role in revolutionizing our customer service SaaS platform with cutting-edge artificial intelligence.
            </p>
          </div>
        </div>

        <div class="aids-topic">
          <div class="responsibility">
            <h3>Key Responsibility</h3>
            <div class="responsibility-detail">
              <ul>
                <li>AI Model Development & Integration: Design, develop, and integrate AI models, primarily utilizing
                  GPT into our core SaaS platform.</li>
                <li>Data Management & Analysis: Work with large datasets related to customer interactions, product
                  information, and retail transactions.</li>
              </ul>
            </div>
          </div>

          <div class="skill">
            <div class="skill-detail">
              <h3>Required Skills</h3>
              <ul>
                <li class="horiziontal-break">Essential
                  <ol>
                    <li>Proven AI Experience: Demonstrated experience in developing and deploying AI solutions</li>
                    <li>Bachelor's Degree: Bachelor's degree in Computer Science, Artificial Intelligence</li>
                  </ol>
                </li>
                <li>Preferable
                  <ol>
                    <li>Experience with any of the major cloud platforms (AWS, Azure, GCP).</li>
                    <li>Experience with SPARQL</li>
                  </ol>
                </li>
              </ul>
            </div>
          </div>

          <div class="salary">
            <div class="salary-detail">
              <h3>Salary</h3>
              <p>$120,000</p>
            </div>
            <div class="report-to">
              <h3>Reports To</h3>
              <p>Lead AI Architect</p>
            </div>
          </div>
        </div>
      </div>
    </details>

    <!-- Job 2 - Mobile Version -->
    <details class="mobile-job-item">
      <summary>
        <span class="job-title">Data Scientist Employment</span>
        <span class="job-meta">
          <span class="job-remote">Remote</span>
          <span class="job-ref"><strong>Position Reference:</strong> DSF78</span>
        </span>
        <a class="mobile-apply-btn" href="apply.php">Apply Now</a>
      </summary>

      <div class="mobile-job-details">
        <div class="aids-description">
          <div class="description-detail">
            <h3>Data Scientist Overview</h3>
            <p>As a Junior Data Scientist at Aevina, you will challenged to understand client problems and formulate
              exacting solutions as part of a professional technical team.</p>
          </div>
        </div>

        <div class="aids-topic">
          <div class="responsibility">
            <h3>Responsibility</h3>
            <div class="responsibility-detail">
              <ul>
                <li>Use your critical thinking and analysis skills to continuously improve our unique of Consumer
                  Data.</li>
                <li>Develop a strong practical understandiAWS tools and operations.</li>
                <li>Work with clients to understand their business objectives and provide analytical solutions to meet
                  their needs using our geoTribes Platform.</li>
              </ul>
            </div>
          </div>

          <div class="skill">
            <div class="skill-detail">
              <h3>Required Skills</h3>
              <ul>
                <li class="horiziontal-break">Essential
                  <ol>
                    <li>Degree with a strong quantitatin a primary disciple such as: phystatistics, engineering,
                      actuarialstudies or computer science.</li>
                    <li>Strong understanding of statis concepts and their application to world problems is essential.
                    </li>
                  </ol>
                </li>
                <li>Preferable
                  <ol>
                    <li>Experience in data engineering AWS, GIS software or analysis woul an advantage.</li>
                    <li>Experience working with Hadoop based systems to achieve analytic outcomes</li>
                  </ol>
                </li>
              </ul>
            </div>
          </div>

          <div class="salary">
            <div class="salary-detail">
              <h3>Salary</h3>
              <p>$150,000</p>
            </div>
            <div class="report-to">
              <h3>Reports To</h3>
              <p>Lead Data Scientist</p>
            </div>
          </div>
        </div>
      </div>
    </details>
    <!-- Mobile Aside (hidden on desktop) -->
    <aside class="mobile-aside">
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
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12606.517380861531!2d145.038955!3d-37.82215!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642326bae5aaf%3A0x75e96bbd4988f769!2sSwinburne%20University%20of%20Technology!5e0!3m2!1sen!2sus!4v1744177890599!5m2!1sen!2sus"></iframe>
      </div>
    </aside>
  </section>
  <!-- Footer -->
<?php 
// Help from ChatGPT to get the current page name for correct CSS styling
$currentPage = basename($_SERVER['PHP_SELF']);
include 'footer.inc'; 
?>
</body>

</html>