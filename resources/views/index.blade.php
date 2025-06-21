<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kitui County | Infrastructure Damage Tracker</title>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <!-- Navbar -->
  <nav>
    <div class="logo"><b>KITUI DAMAGE TRACKER</b></div>
    <button class="nav-toggle" onclick="toggleMainMenu()">
    <ion-icon name="menu-outline"></ion-icon>
  </button>
    <ul id="mainMenu">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#faqs">FAQs</a></li>
      <li><a href="#resources">Resources</a></li>
      <li><a href="#contact">Contact Us</a></li>
      <li><a href="{{ route('register') }}" class="btn">Login</a></li>
    </ul>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <h1>Report Infrastructure Damage in Kitui County</h1>
    <p>Help improve your community by reporting broken roads, bridges, and utilities.</p>
    @auth
    <button><a href="{{ route('issue.create') }}">Report Issue Now</a></button>
    @else
    <button onclick="alert('Login first to report an issue'); window.location.href='{{ route('login') }}';">Report Issue Now</button>
    @endauth

  </section>

 <!-- About Section -->
 <section id="about" class="about-section">
  <div class="about-container">
    <div class="about-image">
      <img src="{{ asset('images/kitui.jpg') }}" alt="Kitui County Community Infrastructure">
    </div>
    <div class="about-content">
      <h2>About Kitui Damage Tracker</h2>
      <p>The Kitui Damage Tracker is a community-driven platform designed to empower residents of Kitui County to report infrastructure issues swiftly and effectively. From damaged roads and bridges to disrupted water or power supplies, our platform ensures your voice is heard by the right authorities.</p>
      <p>Our mission is to foster collaboration between residents and local government, enabling faster repairs and stronger infrastructure. By providing real-time updates and a user-friendly interface, we aim to make Kitui County a better place for all.</p>
      <ul class="about-features">
        <li><strong>Empower Communities:</strong> Give residents a direct line to report issues and track progress.</li>
        <li><strong>Real-Time Updates:</strong> Stay informed with the latest status on reported damages.</li>
        <li><strong>Accessible Anywhere:</strong> Use the platform on your phone, tablet, or computer with ease.</li>
      </ul>

    </div>
  </div>
</section>

<!-- FAQs Section -->
<section id="faqs" class="faqs-section">
  <div class="faqs-container">
    <h2>Frequently Asked Questions</h2>
    <div class="faq-item">
      <h3 class="faq-question">What is Kitui Damage Tracker?</h3>
      <p>Kitui Damage Tracker is a web platform that allows residents of Kitui County to report infrastructure damages such as roads, bridges, and utilities, helping local authorities address issues efficiently.</p>
    </div>
    <div class="faq-item">
      <h3 class="faq-question">How do I report a damage?</h3>
      <p>Click the 'Report Issue Now' button on the homepage, fill out the form with details about the damage, and submit it. You can track its status in your dashboard after logging in.</p>
    </div>
    <div class="faq-item">
      <h3 class="faq-question">Who can use this platform?</h3>
      <p>The platform is open to all residents of Kitui County. Simply register or log in to start reporting issues or accessing resources.</p>
    </div>
    <div class="faq-item">
      <h3 class="faq-question">How long does it take to resolve an issue?</h3>
      <p class="faq-answer">Resolution time depends on the severity and type of issue. You can check the current status of your report in the 'View My Raised Issues' section of your dashboard.</p>
    </div>
  </div>
</section>

<!-- Resources Section -->
<section id="resources" class="resources-section">
  <div class="resources-container">
    <h2>Resources</h2>
    <div class="resource-cards">
      <div class="resource-card">
        <img src="images/resource2.jpg" alt="Infrastructure Planning">
        <a href="https://kituimunicipality.org/planning-development-control-transport-infrastructure/" target="_blank" class="resource-link">View Resource</a>
      </div>
      <div class="resource-card">
        <img src="images/resource1.png" alt="Disaster Preparedness">
        <a href="https://www.redcross.or.ke/programmes/disaster-management/#:~:text=It%20implements%20programmes%20that%20aim,adaptation%20(E%2FCCA)." target="_blank" class="resource-link">View Resource</a>
      </div>
      <div class="resource-card">
        <img src="images/resource3.jpg" alt="Community Support">
        <a href="https://ecdp.co.ke/" target="_blank" class="resource-link">View Resource</a> <!-- Placeholder link; replace with actual URL -->
      </div>
    </div>
    <p>Explore these resources for more information on infrastructure planning and disaster preparedness in Kitui County.</p>
  </div>
</section>

<!-- Contact Us Section -->
<section id="contact" class="contact-section">
  <div class="contact-container">
    <div class="contact-form">
      <h2>Contact Us</h2>
      <form>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" required></textarea>
        <button type="submit" class="btn">Send Message</button>
      </form>
    </div>
    <div class="contact-image">
      <img src="images/contact2.jpeg" alt="Contact Kitui County">
    </div>
  </div>
</section>

<!-- Footer Section -->
 <!-- Footer Section -->
 <footer class="footer-section">
  <div class="footer-container">
    <div class="footer-content">
      <p>© 2025 Kitui Damage Tracker. All rights reserved.</p>
      <ul class="footer-links">
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Service</a></li>
      </ul>

      <div class="footer-social">
        <a href="#" aria-label="Facebook"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="#" aria-label="Twitter"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="#" aria-label="Instagram"><ion-icon name="logo-instagram"></ion-icon></a>
        <a href="#" aria-label="Whatsapp"><ion-icon name="logo-whatsapp"></ion-icon></a>

      </div>
    </div>
  </div>
</footer>
<script>
  function toggleMainMenu() {
    const menu = document.getElementById('mainMenu');
    menu.classList.toggle('open');
  }
</script>

</body>
</html>