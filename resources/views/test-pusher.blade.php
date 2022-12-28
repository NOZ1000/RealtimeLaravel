<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('01ae7135ad34cd2b1194', {
      cluster: 'ap2'
    });
    console.log("Hello Pusher1");
    var channel = pusher.subscribe('firstc');
    channel.bind('.firste', function(data) {
    //   alert(JSON.stringify(data));
      console.log(data);
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>