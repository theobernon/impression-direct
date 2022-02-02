<html>
<head></head>
<body>
    <h1>{{$data['subject']}}</h1>
    <p>
        {!! nl2br(e($data['body_message'])) !!}
    </p>
</body>
</html>
