<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Kitui Damage Tracker</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <div class="form-wrapper">
    <form method="POST" action="{{ url('login') }}" class="auth-form">
      @csrf
      <h2 class="form-title">Login</h2>
      <div class="form-group">
        <label for="email">Email Address <span class="required">*</span></label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
      </div>

      <div class="form-group">
        <label for="password">Password <span class="required">*</span></label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" class="btn">Login</button>

      <p class="form-footer">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
    </form>
  </div>
</body>
</html>
