<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kitui Damage Tracker</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
  <!-- Navbar -->
  <nav>
    <div class="logo"><b>KITUI DAMAGE TRACKER</b></div>
       <!-- Hamburger icon for mobile -->
       <button class="menu-toggle" onclick="toggleSideNav()">
        <ion-icon name="menu-outline"></ion-icon>
    </button>
    <ul>
    </ul>
  </nav>
        <!-- Side Navigation -->
        <div class="side-nav" id="mobileDrawer">
             <!-- Close Button -->
            <div class="drawer-header">
                <button class="drawer-close" onclick="toggleSideNav()">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
            <div class="logo">
            <img src="{{ asset('images/kituilogo.jpg') }}" alt="Kitui County Logo" class="form-logo">
            </div>
            <nav2 class="side-links">
                <ul>
                @if(Auth::user()->user_type === 'admin')
                    <li><a href="{{ route('issues.admin') }}"><ion-icon name="eye-outline"></ion-icon>View Issues</a></li>
                    <li><a href="{{ route('reports.admin') }}"><ion-icon name="document-text-outline"></ion-icon>Admin Report</a></li>
                @else
                <li><a href="{{ route('issue.create') }}"><ion-icon name="alert-circle-outline"></ion-icon>Report Issue</a></li>
                <li><a href="{{ route('issues.index') }}"><ion-icon name="eye-outline"></ion-icon>View Issues</a></li>
                <li><a href="{{ route('reports.index') }}"><ion-icon name="document-text-outline"></ion-icon>Generate Report</a></li>
                @endif
                <li>
                    <a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="background:none;border:none;color:inherit;padding:0;cursor:pointer; font-weight: bolder;font-size:0.97rem">
                            <ion-icon name="log-out-outline"></ion-icon> Log Out
                        </button>
                    </form>
                    </a>
                </li>
                </ul>
            </nav2>
        </div>
        <script>
            function toggleSideNav() {
                const drawer = document.getElementById('mobileDrawer');
                drawer.classList.toggle('open');
            }
        </script>

</body>
</html>