<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.socket.io/4.4.1/socket.io.min.js"
            integrity="sha384-fKnu0iswBIqkjxrhQCTZ7qlLHOFEgNkRmK2vaO/LbTZSXdJfAu6ewRBdwHPhBo/H"
            crossorigin="anonymous"></script>
    <!-- Styles -->

</head>
<body class="antialiased">
<div class="visible-print text-center">
    {!! QrCode::size(100)->generate(Request::url()); !!}
    <p>Scan me to return to the original page.</p>
    <button id="send">Login Other Client</button>
</div>
<script>
    $(function () {
        let ip = "127.0.0.1";
        let port = "3000";
        let socket = io(ip + ":" + port)
        socket.on();

        $('#send').on('click', function (e) {
            socket.emit('sendRequest', "allow");
        });

        socket.on('login', (message) => {
            if (message === "allow") {
                window.location = '{{route('login')}}';
            }
        });
    });
</script>
</body>
</html>

