<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTER</title>
  <link rel="stylesheet" href="{{ asset('css/Register.css') }}">
</head>
<body>

<audio id="Background-music" src="/audio/register login admin dashboard bg music.mp3" autoplay loop></audio>

  <div id="first-page">
    <div class="website-container">
      <div class="logo-container">
        <img id="logo-hackathon" src="/image/Logo Hackathon.png" alt="Hackathon Logo">
      </div>
      
      <div class="register-container">
        <p class="informasi-grup">Informasi Grup</p>
          <div class="progress-bar"><img  src="/image/Progress bar 1.png" alt="Progress bar">
          </div>
        
        <form id="register-form1" action="{{route('registerTeam')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="nama-container">
            <label for="nama-group">Nama Group</label>
            <input type="text" name="name" id="nama-group" value="{{old('name')}}"> 
            <p id="error-name" class="error-message"></p>
          </div> 
    
          <div class="password-container">
            <label for="password">Password</label>
              <input type="password" name="password" id="password" value="{{old('password')}}">
              <img class="eye" id="eye" src="/image/close eye.png" alt="" onclick="Eye1()">
              <p id="error-password" class="error-message"></p>
          </div> 
          
          <div class="confirm-container">
            <label for="confirm-password">Confirm Password</label>
              <input type="password" name="password_confirmation" id="confirm-password" >
              <img class="eye-confirm-pass" id="eye-confirm-pass" src="/image/close eye.png" alt="" onclick="Eye2()">
              <p id="error-confirm-password" class="error-message"></p>
          </div> 
    
          <p class="status-text">Status</p>
            <div class="radio-btn-binus">
              <input type="radio" id="Binusian"   name="binusian" value="Binusian" required>
              <label id="Binusian" for="Binusian">Binusian</label><br>
              <input type="radio" id="Non-Binusian" name="binusian" value="NonBinusian" required>
              <label for="Non-Binusian">Non-Binusian</label>
              <br>
              </div>
            <div class="error-message" id="error-status"></div>
            
          <div class="next-button">
            <a id="next-btn" href=""><img src="/image/Next.png" alt="Next Button"></a>
          </div>
    
            <div class="redirect-login">
              <p>Sudah memiliki akun?</p>
              <a href="login">Login disini</a>
            </div>
      </div>
    </div>
  </div>

    <div id="second-page" class="hidden" >
      <div class="website-container">
        <div class="logo-container">
          <img id="logo-hackathon2" src="/image/Logo Hackathon.png" alt="Hackathon Logo">
        </div>
        
        <div class="register-container2">
          <p class="informasi-grup">Informasi Leader</p>
            <div class="progress-bar"><img  src="/image/Progress bar 2.png" alt="Progress bar">
            </div>
            
  
            <div class="nama-container2">
              <label for="nama-lengkap">Nama Lengkap</label>
              <input type="text" name="leader_name" id="nama-lengkap" value="{{old('leader_name')}}"> 
              <p id="error-name2" class="error-message"></p>
            </div> 
      
            <div class="email-container2">
              <label for="email">Email</label>
              <input type="email" name="email_leader" id="email2" >
              <!-- <input type="checkbox" id="showPassword"> Show Password -->
              <p id="error-email2" class="error-message"></p>
            </div> 
            
            <div class="wa-number-container2">
              <label for="wa-number">Whatsapp Number</label>
              <input type="Number" id="wa-number" name="whatsapp_leader" value="{{old('whatsapp_leader')}}">
              <p id="error-wa-number" class="error-message"></p>
            </div> 
      
            <div class="line-id-container2">
              <label for="line-id-number">Line ID</label>
              <input type="text" id="line-id-number" name="line" value="{{old('line')}}">
              <p id="error-line-id" class="error-message"></p>
            </div> 
          
              
          <div class="navigation-btn2">
            <div class="back-btn" id="back-btn2">
              <a><img src="/image/Back.png" alt="Back Button"></a>
            </div>
            <div class="next-btn2" id="next-btn2">
              <a><img src="/image/Next.png" alt="Next Button"></a>
            </div>
          </div>
              
      
              <div class="redirect-login">
                <p>Sudah memiliki akun?</p>
                <a href="">Login disini</a>
              </div>
        </div>
      </div>
    </div>

    <div id="third-page" class="hidden">
      <div class="website-container">
        <div class="logo-container3">
          <img id="logo-hackathon" src="/image/Logo Hackathon.png" alt="Hackathon Logo">
        </div>
        
        <div class="register-container3">
          <p class="informasi-grup">Informasi Leader</p>
            <div class="progress-bar"><img id="progressBar-3"  src="/image/Progress bar 3.png" alt="Progress bar">
            </div>
      
            <div class="github-container">
              <label for="github">GitHub/ Gitlabel ID</label>
              <input type="text" name="github" id="github" value="{{old('github')}}">
              <p id="error-github" class="error-message"></p> 
            </div> 
      
            <div class="tempat-lahir-container">
              <label for="tempat-lahir">Tempat Lahir</label>
              <input type="text" name="birthplace" id="tempat-lahir" >
              <!-- <input type="checkbox" id="showPassword"> Show Password -->
              <p id="error-tempat-lahir" class="error-message"></p>
            </div> 
            
            <div class="tanggal-lahir-container">
              <label for="tanggal-lahir">Tanggal Lahir</label>
              <input type="date" name="birthdate" id="tanggal-lahir" required>
              <p id="error-tanggal-lahir" class="error-message"></p>
            </div> 
          

          <div class="upload-btn-container">
            <label for="upload-btn-CV">Upload CV</label>
            <input type="file" class="form control" id="upload-btn-CV" name="cv">

            <label for="upload-btn-ID">Upload Flazz Card / ID</label>
            <input type="file" class="form control" id="upload-btn-ID" name="id_card">
          </div>
        

              
          <div class="navigation-btn">
            
            <div class="back-button3">
              <a href=""><img id="back-btn3" src="/image/Back.png" alt="Back Button"></a>
            </div>

            <div class="next-btn3">
              <button type="submit">
               <img id="submit-btn" src="/image/submit-button.png" alt="Next Button">
              </button>
            </div>
  
          </div>
              
      
              <div class="redirect-login">
                <p>Sudah memiliki akun?</p>
                <a href="login">Login disini</a>
              </div>
              
            </form>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/Register.js') }}"></script>
</body>
</html>