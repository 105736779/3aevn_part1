<?php$currentPage = basename($_SERVER['PHP_SELF']); // Get the current page's filename?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="keywords"
    content="AI, IT, IT Company, Computer, Aevina, Aritificial Intelligence, Official, About, Members, Information, Profile, Skills, Experience, Demographics, Hometown, Favorites">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Aevina's Official Website About Page with Extended Group Information">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Aevina - Innovators in Artificial Intelligence</title>
</head>

<body>

  <?php 
  // Help from ChatGPT to get the current page name for correct CSS styling
  $currentPage = basename($_SERVER['PHP_SELF']);
  include 'header.inc'; 
  ?>

  <main class="about-main">
    <article class="about-page">
      <section class="sticky-title">
        <h1>About Our Group</h1>
      </section>
      <!-- Group Photo -->
      <section class="group-photo">
        <h2>Our Group Photo</h2>
        <figure>
          <img src="images/groupphoto.jpg" alt="Aevina AI team group photo" id="group-photo">
          <figcaption>Who's the most handsome? (Khanh, Hoang, John, from left to right)</figcaption>
        </figure>
      </section>
      <!-- Class + Tutor Info in a Calendar -->
      <section class="class-calendar" role="region" aria-label="Class and Tutor Information">
        <h2>Class Schedule</h2>
        <div class="calendar-wrapper">
          <table class="calendar">
            <thead>
              <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>8:30 - 9:30</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>9:30 - 10:30</td>
                <td></td>
                <td></td>
                <td></td>
                <td rowspan="2" class="highlight">Group Class with Razeen</td>
                <td></td>
              </tr>
              <tr>
                <td>11:30 - 12:30</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>12:30 - 1:30</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>1:30 - 2:30</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>2:30 - 3:30</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>3:30 - 4:30</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Contributions Table -->
      <section class="contributions" role="region" aria-label="Member Contributions">
        <h2>Member Contributions</h2>
        <h3>Assignment Part 1</h3>
        <dl class="contribution-list">
          <dt>Khanh Nam Le Pham</dt>
          <dd>
            <strong>Shared:</strong> CSS, About Page<br>
            <strong>Individual:</strong> Home Page, About page
          </dd>

          <dt>Viet Hoang Tran</dt>
          <dd>
            <strong>Shared:</strong> CSS, About Page<br>
            <strong>Individual:</strong> Jobs Page
          </dd>

          <dt>Quang Tuan Anh Tran</dt>
          <dd>
            <strong>Shared:</strong> CSS, About Page<br>
            <strong>Individual:</strong> Apply Page
          </dd>
        </dl>
        <h3>Assignment Part 2</h3>
        <dl class="contribution-list">
          <dt>Khanh Nam Le Pham</dt>
          <dd>
            <strong>Shared:</strong>CSS, Enhancements<br>
            <strong>Individual:</strong> Task 1, 2, 6, 8
          </dd>

          <dt>Viet Hoang Tran</dt>
          <dd>
            <strong>Shared:</strong> CSS, Enhancements<br>
            <strong>Individual:</strong> Task 5, 7
          </dd>

          <dt>Quang Tuan Anh Tran</dt>
          <dd>
            <strong>Shared:</strong> CSS, Enhancements<br>
            <strong>Individual:</strong> Task 3, 4
          </dd>
        </dl>

      </section>

      <!-- Programming Skills -->
      <section class="skills" aria-label="Programming Skills">
        <h2>Programming Skills</h2>
        <div class="battery-bars">
          <div class="member-skill">
            <h3>Khanh Nam Le Pham</h3>
            <div class="battery html" data-level="70">
              <p>HTML</p>
            </div>
            <div class="battery css" data-level="85">
              <p>CSS</p>
            </div>
            <div class="battery js" data-level="5">
              <p>JavaScript</p>
            </div>
          </div>
          <div class="member-skill">
            <h3>Viet Hoang Tran</h3>
            <div class="battery html" data-level="90">
              <p>HTML</p>
            </div>
            <div class="battery css" data-level="80">
              <p>CSS</p>
            </div>
            <div class="battery js" data-level="10">
              <p>JavaScript</p>
            </div>
          </div>
          <div class="member-skill">
            <h3>Quang Tuan Anh Tran</h3>
            <div class="battery html" data-level="90">
              <p>HTML</p>
            </div>
            <div class="battery css" data-level="90">
              <p>CSS</p>
            </div>
            <div class="battery js" data-level="50">
              <p>JavaScript</p>
            </div>
          </div>
        </div>
      </section>
      <section class="hometown">
        <h2>Hometown</h2>
        <img src="images/Flag_of_Vietnam.svg.png" alt="Vietnam" title="Vietnam" id="vietnam">
        <p>Vietnam, a land of captivating beauty and vibrant energy, fills its people with a deep sense of pride. From
          the
          stunning natural wonders that grace our landscapes to the bustling cities that pulse with life and innovation,
          there's an undeniable dynamism in the air. Our unique culture, expressed through art, music, and everyday
          interactions, creates a strong sense of community and belonging. We take pride in our delicious and
          distinctive
          cuisine, a source of joy and connection. Looking towards the future, there's a shared feeling of optimism and
          determination as Vietnam continues to grow and make its mark on the world. It's a pride rooted in our present
          and our potential.</p>
      </section>
      <!-- Demographic Boxes -->
      <section class="demographics" aria-label="Demographics">
        <h2>Demographics</h2>
        <div class="demographic-boxes">
          <div class="demographic-card">
            <img src="images/khanh.jpg" alt="Photo of Khanh" />
            <div class="info">
              <p class="name">Khanh Nam Le Pham</p>
              <p>Personal Information</p>
              <p><strong>Name:</strong> Khanh Nam Le Pham</p>
              <p><strong>Age:</strong> 18</p>
              <p><strong>Nationality:</strong> Vietnamese</p>
              <p><strong>Gender:</strong> Male</p>
              <p><strong>Course:</strong> Bachelor of Computer Science (Professional)</p>
              <p><strong>Major:</strong> Artificial Intelligence</p>
              <p><strong>Student ID:</strong> 105736779</p>
              <p><strong>Personal Email: </strong><a href="mailto:2006phamlenamkhanh@gmail.com"
                  target="_blank">2006phamlenamkhanh@gmail.com</a></p>
            </div>
          </div>
          <div class="demographic-card">
            <img src="images/VIETHOANGIMAGE.jpg" alt="Photo of Viet Hoang" />
            <div class="info">
              <p class="name">Viet Hoang Tran</p>
              <p>Personal Information</p>
              <p><strong>Name:</strong> Viet Hoang Tran</p>
              <p><strong>Age:</strong> 19</p>
              <p><strong>Nationality:</strong> Vietnamese</p>
              <p><strong>Gender:</strong> Male</p>
              <p><strong>Course:</strong> Bachelor of Computer Science (Professional)</p>
              <p><strong>Major:</strong> Data Science</p>
              <p><strong>Student ID:</strong> 104688235</p>
              <p><strong>Personal Email: </strong><a href="mailto:vhoangtran11@gmail.com"
                  target="_blank">vhoangtran11@gmail.com</a></p>
            </div>
          </div>
          <div class="demographic-card">
            <img src="images/johnnytran.jpg" alt="Photo of Quang/John" />
            <div class="info">
              <p class="name">Quang Tuan Anh (John) Tran</p>
              <p>Personal Information</p>
              <p><strong>Name:</strong> Quang Tuan Anh (John) Tran</p>
              <p><strong>Age:</strong> 19</p>
              <p><strong>Nationality:</strong> Vietnamese</p>
              <p><strong>Gender:</strong> Male</p>
              <p><strong>Course:</strong> Bachelor of Computer Science (Professional)</p>
              <p><strong>Major:</strong> Artificial Intelligence</p>
              <p><strong>Student ID:</strong> 105942699</p>
              <p><strong>Personal Email: </strong><a href="#" target="_blank">johntran@gmail.com</a></p>
            </div>
          </div>
        </div>
      </section>
      <section class="interests" aria-label="Shared Interests Table">
        <h2>Group Interests</h2>
        <div class="interests-wrapper">
          <table class="interests-table">
            <thead>
              <tr>
                <th>Interest</th>
                <th>Khanh</th>
                <th>Hoang</th>
                <th>John</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Photography</td>
                <td colspan="2" class="shared">✔</td>
                <td class="solo">-</td>
              </tr>
              <tr>
                <td>Programming</td>
                <td class="solo">-</td>
                <td colspan="2" class="shared">✔</td>
              </tr>
              <tr>
                <td>Gaming</td>
                <td class="solo">✔</td>
                <td class="solo">-</td>
                <td class="solo">-</td>
              </tr>
              <tr>
                <td>Hiking</td>
                <td class="solo">-</td>
                <td class="solo">✔</td>
                <td class="solo">-</td>
              </tr>
              <tr>
                <td>Chess</td>
                <td colspan="3" class="shared">✔</td>
              </tr>
              <tr>
                <td>AI Art</td>
                <td class="solo">✔</td>
                <td class="solo">–</td>
                <td class="solo">✔</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

    </article>
  </main>

  <br>

  <?php 
  // Help from ChatGPT to get the current page name for correct CSS styling
  $currentPage = basename($_SERVER['PHP_SELF']);
  include 'footer.inc'; 
  ?>

</body>

</html>