<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret Expired - Shadow Key</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1f1f1f, #2c3e50);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg p-4">
                <div class="card-body text-center">

                    <h2 class="text-danger mb-3">❌ Secret Expired</h2>

                    <p class="text-muted">
                        This secret has already been viewed or has expired.
                    </p>

                    <div class="alert alert-warning mt-4">
                        🔐 For security reasons, secrets are deleted immediately after being accessed.
                    </div>

                    <a href="{{ route('secret.create') }}" 
                       class="btn btn-dark mt-3">
                        Create New Secret
                    </a>

                </div>
            </div>

            <div class="text-center text-white mt-3">
                <small>Shadow Key • Secure • One-Time Access</small>
            </div>

        </div>
    </div>
</div>

</body>
</html>
