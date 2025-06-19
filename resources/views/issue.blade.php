<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kitui County | Issue Report</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.min.css">
</head>
<body>
  <!-- Navbar -->
  <nav>
    <div class="logo"><b>Kitui Damage Tracker</b></div>
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('/') }}">About</a></li>
      <li><a href="{{ url('/') }}">FAQs</a></li>
      <li><a href="{{ url('/') }}">Resources</a></li>
      <li><a href="{{ url('/') }}">Contact Us</a></li>
      <li><a><form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background:none;border:none;color:inherit;padding:0;cursor:pointer;">
                Log Out
            </button>
        </form></a>
    </li>
    </ul>
  </nav>

  <!-- Issue Form Section -->
  <section class="issue-form-section">
    <div class="issue-form-container">
      <header class="form-header">
        <img src="images/kituilogo.jpg" alt="Kitui County Logo" class="form-logo">
        <h1>Kitui Issue Report</h1>
      </header>
      <form action="{{ route('issue.store') }}" method="post" id="issueForm">
    @csrf

        <div class="form-group">
          <label for="complainant_name">Name of the Complainant <span class="required">*</span></label>
          <input type="text" id="complainant_name" name="complainant_name" required>
        </div>
        <div class="form-group">
          <label for="phone_number">Phone Number <span class="required">*</span></label>
          <input type="tel" id="phone_number" name="phone_number" required>
        </div>
        <div class="form-group">
          <label for="subcounty">Subcounty <span class="required">*</span></label>
          <select id="subcounty" name="subcounty" required onchange="updateWards()">
            <option value="">Choose</option>
            <option value="Kitui West">Kitui West</option>
            <option value="Kitui Central">Kitui Central</option>
            <option value="Kitui Rural">Kitui Rural</option>
            <option value="Kitui South">Kitui South</option>
            <option value="Kitui East">Kitui East</option>
            <option value="Mwingi North">Mwingi North</option>
            <option value="Mwingi West">Mwingi West</option>
            <option value="Mwingi Central">Mwingi Central</option>
          </select>
        </div>
        <div class="form-group">
          <label for="ward">Ward <span class="required">*</span></label>
          <select id="ward" name="ward" required>
            <option value="">Choose</option>
          </select>
          <div id="newAreaSection" class="new-area-section" style="display: none;">
            <label for="new_area">Add New Area (if not listed):</label>
            <input type="text" id="new_area" name="new_area">
          </div>
        </div>
        <div class="form-group">
          <label for="infrastructure_type">Type of Infrastructure Damaged <span class="required">*</span></label>
          <select id="infrastructure_type" name="infrastructure_type" required>
            <option value="">Choose</option>
            <option value="Road">Road</option>
            <option value="Bridge">Bridge</option>
            <option value="Water Supply">Water Supply</option>
            <option value="Power Line">Power Line</option>
            <option value="Telecom">Telecom</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="form-group">
          <label for="damage_description">Description of Damage <span class="required">*</span></label>
          <textarea id="damage_description" name="damage_description" rows="4" required></textarea>
        </div>
        <div class="form-group">
          <label for="severity_level">Severity Level <span class="required">*</span></label>
          <select id="severity_level" name="severity_level" required>
            <option value="">Choose</option>
            <option value="Minor">Minor</option>
            <option value="Moderate">Moderate</option>
            <option value="Severe">Severe</option>
            <option value="Critical/Emergency">Critical/Emergency</option>
          </select>
        </div>
        <div class="form-group">
          <label for="location_details">Location Details <span class="required">*</span></label>
          <input type="text" id="location_details" name="location_details" required>
        </div>
        <button type="submit" class="btn">Submit</button>
      </form>
    </div>
  </section>

  <script>
    function updateWards() {
      const subcounty = document.getElementById('subcounty').value;
      const wardSelect = document.getElementById('ward');
      const newAreaSection = document.getElementById('newAreaSection');
      wardSelect.innerHTML = '<option value="">Choose</option>';

      let wards = [];
      switch (subcounty) {
        case 'Kitui Central':
          wards = ['Miambani', 'Township', 'Kyangwithya West', 'Kyangwithya East', 'Mulango'];
          break;
        case 'Mwingi North':
          wards = ['Ngomeni', 'Kyuso', 'Mumoni', 'Tseikuru', 'Tharaka', 'Katse'];
          break;
        case 'Kitui South':
          wards = ['Ikutha', 'Kanziko', 'Athi', 'Mutomo', 'Mutha', 'Ikanga/Kyatune'];
          break;
        case 'Kitui East':
          wards = ['Zombe/Mwitika', 'Nzambani', 'Chuluni', 'Voo/Kyamatu', 'Endau/Malalani', 'Mutitu/Kaliku'];
          break;
        case 'Mwingi Central':
          wards = ['Central (Mwingi)', 'Kivou', 'Nguni', 'Nuu', 'Mui', 'Waita'];
          break;
        case 'Mwingi West':
          wards = ['Migwani', 'Nguutani', 'Kyome/Thaana', 'Kiomo/Kyethani'];
          break;
        case 'Kitui West':
          wards = ['Matinyani', 'Kauwi', 'Kwa Mutonga/Kithumula', 'Mutonguni'];
          break;
        case 'Kitui Rural':
          wards = ['Kisasi', 'Mbitini', 'Kvavonza/Yatta', 'Kanyangi'];
          break;
        default:
          wards = [];
      }

      wards.forEach(ward => {
        const option = document.createElement('option');
        option.value = ward;
        option.textContent = ward;
        wardSelect.appendChild(option);
      });

      newAreaSection.style.display = wards.length === 0 ? 'block' : 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
      updateWards();
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('success') === 'true') {
        alert('Issue reported successfully! Issue ID: ' + urlParams.get('issue_id'));
      }
    });
  </script>
</body>
</html>