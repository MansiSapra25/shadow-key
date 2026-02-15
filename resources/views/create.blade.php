<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shadow Key</title>

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
                <div class="card-body">

                    <h2 class="text-center mb-4">🔐 Shadow Key</h2>
                    <p class="text-center text-muted">
                        Create a secure, one-time secret link
                    </p>

                    <form method="POST" action="{{ route('secret.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Enter Secret</label>
                            <textarea 
                                name="secret" 
                                class="form-control" 
                                rows="5" 
                                placeholder="Type your secret here..." 
                                required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark btn-lg">
                                Create Secret Link
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="text-center text-white mt-3">
                <small>Secrets are encrypted and self-destruct after one view.</small>
            </div>

        </div>
    </div>
</div>

</body>
</html>
