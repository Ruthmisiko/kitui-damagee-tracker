<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Kitui Damage Tracker</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <div class="form-wrapper">
    <form method="POST" action="{{ url('register') }}" class="auth-form">
      @csrf
      <h2 class="form-title">Create an Account</h2>

      <div class="form-group">
        <label for="name">Full Name <span class="required">*</span></label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
      </div>

      <div class="form-group">
        <label for="email">Email Address <span class="required">*</span></label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
      </div>

      <div class="form-group">
        <label for="password">Password <span class="required">*</span></label>
        <input type="password" id="password" name="password" required>
      </div>

      <div class="form-group">
        <label for="password_confirmation">Confirm Password <span class="required">*</span></label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
      </div>

      <input type="hidden" name="user_type" value="client">

      <button type="submit" class="btn">Register</button>

      <p class="form-footer">Already have an account? <a href="{{ route('login') }}">Log In</a></p>
    </form>
  </div>
</body>
</html>
