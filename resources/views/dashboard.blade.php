<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
 
@foreach ($teams as $team)
    <div>
        <p>Name: {{ $team->name }}</p>
        <p>{{ $team->binusian }}</p>
        <p>Email Leader: {{ $team->email_leader }}</p>
        <p>Whatsapp: {{ $team->whatsapp_leader}}</p>
        <p>ID Line: {{ $team->line }}</p>
        <p>Github: {{ $team->github }}</p>
        <p>Birthdate: {{ $team->birthdate }}</p>
        
        @if ($team->cv)
        <a href="{{ asset('storage/cv/' . $team->cv) }}" target="_blank">View CV</a>
        @endif
    </div>
@endforeach

<a href="/">Logout</a>

</body>
</html>