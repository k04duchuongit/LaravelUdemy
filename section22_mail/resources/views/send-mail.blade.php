<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Email Form</title>

    <!-- ✅ Link Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5" >
        <h2 class="mb-4">Subscribe with your Email</h2>
        <form action="{{ route('send.mail') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                    required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message address</label>
                <input type="text" class="form-control" id="message" name="message"
                    placeholder="Enter your message" required>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>

    <!-- Optional: Bootstrap JS (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
