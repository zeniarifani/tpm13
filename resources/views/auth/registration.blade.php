<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Registration</h4>
                <hr>    
            <form action="{{route('register-team')}}" method="post" enctype="multipart/form-data">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Group Name</label>
                        <input type="text" class="form control" placeholder="Enter Group Name"
                        name="name" value="{{old('name')}}">
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form control" placeholder="Enter Password"
                        name="password" value="{{old('password')}}">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete= "new-password" value="{{old('password_confirmation')}}">
                        <span class="text-danger" >@error('password') {{$message}} @enderror</span>
                    </div>

                    <div class="form-group mt-5">
                        <label class="font-weight-bold">Mahasiswa Binus/Bukan</label>
                        <select name="binusian" class="form-control">
                            <option value="Binusian">Binusian</option>
                            <option value="NonBinusian">Non-Binusian</option>
                        <select>
                    </div>

                    <div class="form-group">
                        <label for="leader_name">Leader Name</label>
                        <input type="text" class="form control" placeholder="Enter Leader Name"
                        name="leader_name" value="{{old('leader_name')}}">
                        <span class="text-danger">@error('leader_name') {{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="email_leader">Leader's Email</label>
                        <input type="email" class="form control" placeholder="Enter Leader's Email"
                        name="email_leader" value="{{old('email_leader')}}">
                        <span class="text-danger">@error('email_leader') {{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="whatsapp_leader">Leader Whatsapp (+62)</label>
                        <input type="tel" class="form control" placeholder="Enter Leader's Whatsapp"
                        name="whatsapp_leader" value="{{old('whatsapp_leader')}}">
                        @error('whatsapp_leader')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror

                     <div class="form-group">
                        <label for="line">Leader's ID LINE</label>
                        <input type="text" class="form control" placeholder="Enter ID LINE"
                        name="line" value="{{old('line')}}">
                        <span class="text-danger">@error('line') {{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="github">Github</label>
                        <input type="text" class="form control" placeholder="Enter Github ID"
                        name="github" value="{{old('github')}}">
                        <span class="text-danger">@error('github') {{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" class="form control" placeholder="birthdate"
                        name="birthdate" value="{{old('birthdate')}}">
                        <span class="text-danger">@error('birthdate') {{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="cv">CV</label>
                        <input type="file" class="form control" placeholder="Indert CV"
                        name="cv" value="{{old('cv')}}" accept=".pdf, .jpg, .jpeg, .png">
                        <span class="text-danger">@error('cv') {{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit" >Register</button>
                    </div>

                    <a href="login">Already Registered? Login here</a>

            </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>