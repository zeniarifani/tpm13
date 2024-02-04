<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
  </head>

  <body>
  <audio id="Background-music" src="/audio/register login admin dashboard bg music.mp3" autoplay loop></audio>
  
    <div class="admin-container">
      <div class="navBar">
        <img src="/image/logo.png" alt="">
      </div>
      <div class="admin-text">
        <h1>Participants</h1>
        <div class="search-bar-container">
        <form id="search-bar" action="{{ route('search') }}" method="GET">
          <input type="text" placeholder="Team name" name="name">
          <button type="submit"><img src="/image/search.png" alt=""></button>
          <!-- <button type="submit">Search</button>
          <img src="/image/search.png" alt=""> -->
        </form>
       <form id="sort-bar" action="{{ route('admin.sort') }}" method="GET">
        @csrf
         <input type="hidden" name="sortButtonClicked" value="true">
        <button type="submit"><img src="/image/filter.png" alt=""></button>
       </form>

        </div>
      </div>

      @foreach ($teams as $t)
  <div class="cards-container">
    <div class="cards-first-line">
      <div class="cards" id="cards{{$loop->iteration}}">
        <h1>{{$t->name}}</h1>
        <a class="viewButton" href="#" data-popup-id="popUp{{$loop->iteration}}">View Data</a>
      </div>
    </div>
    <div class="popUp-container" id="popUp{{$loop->iteration}}">
      <div class="popUp-content">
        <h1>Data tim</h1>
        <p>Leader: {{$t->leader_name}}</p>
        <p>Email: {{$t->email_leader}}</p>
        <p>Whatsapp: {{$t->whatsapp_leader}}</p>
        <p>Line ID: {{$t->line}}</p>
        <p>Github/ Gitlab ID: {{$t->github}}</p>
        <p>Tempat Lahir: {{$t->birthplace}}</p>
        <p>Tanggal Lahir: {{$t->birthdate}}</p>
        <div class="redirect-text">
          <p>CV</p>
          <a href="{{ Storage::url('public/cv/' . $t->cv) }}" target="_blank">View CV</a>
          <a href="">View Flazz Card / ID Card</a>
        </div>
        <div class="action-team">
          <a id="editData" href="{{route('edit',$t->id)}}">Edit Data</a>
          <form action="{{route('delete',$t->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
         </form>
        </div>
      </div>
    </div>
  </div>
@endforeach



    <script src="{{ asset('js/admin.js') }}"></script>
  </body>
</html>
