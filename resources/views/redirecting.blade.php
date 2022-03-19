<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Success</title>
</head>
<body>
    <div class="container">
        Redirecting......
    </div>
</body>
</html>


<script>
    window.onload = function() {
    // similar behavior as clicking on a link
        setInterval(function(){window.location.href = "{{ route('user.order') }}",3000});
    }
</script>