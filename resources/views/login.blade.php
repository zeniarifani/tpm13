<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<audio id="Background-music" src="/audio/register login admin dashboard bg music.mp3" autoplay loop></audio>

  <div class="background">
    <div class="login-container">
      <div class="first-line">
        <img id="logo-techno" src="/Image/login image/logo techno.png" alt="Logo TechnoScape">
        <img id="logo-hackathon" src="/Image/login image/logo hack.png" alt="Logo Hackathon"> 
      </div>
      <div class="second-line">
        <h1>WELCOME!</h1>
      </div>
      <div class="third-line">
        Let's log you back in...!
      </div>

      @if ($errors->has('loginError'))
    <div class="alert alert-danger">
        {{ $errors->first('loginError') }}
    </div>
@endif

      <div class="form-container">
        <form id="login-form" action="{{route('loginTeam')}}" method="post">
            @csrf
          <div>
            <input type="text" id="team-name" placeholder="Team name" name="name">
            <p class="error-message" id="error-teamName"></p>
          </div>
          <div>
            <input type="password" id="password" placeholder="Password" name="password">
            <p class="error-message" id="error-password"></p>
          </div>
          <div class="forget-pass">
            <a href="forgetpass">Forgot Password?</a>
          </div>
          <div class="loginBtn-container">
            <button type="submit" class="login-button" id="login-button">Login</button>
          </div>
        </form>
      </div>
      
      <div class="fourth-line">
        <p>Belum memiliki akun?</p>
        <a href="">Registrasi disini  </a>
      </div>

      <img id="mascot" src="/Image/login image/Mascot .png" alt="">
    </div>
  </div>
  <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>