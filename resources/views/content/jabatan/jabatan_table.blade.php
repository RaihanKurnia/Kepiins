@extends('home')

@section('content')
<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('0f1f308829a2c12012bc', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('notif-channel');
    channel.bind('cust-inserted', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
   
  </p>
</body>
@endsection