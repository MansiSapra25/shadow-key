<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Secret Revealed - Shadow Key</title>
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
            <div class="col-md-7">

                <div class="card shadow-lg p-4">
                    <div class="card-body text-center">

                        <h2 class="mb-3 text-primary">🔓 Secret Revealed</h2>
                        <p class="text-muted">
                            This secret can only be viewed once.
                        </p>


                        <div class="alert alert-danger mt-4">
                            🔥 This secret has now been permanently deleted.
                        </div>

                        <a href="{{ route('secret.create') }}" class="btn btn-dark mt-3">
                            Create Another Secret
                        </a>

                    </div>
                </div>

                <div class="text-center text-white mt-3">
                    <small>Shadow Key • One-Time Secure Sharing</small>
                </div>

            </div>
        </div>
    </div>

    <script>
        window.onload = function () {
            alert("Your Secret is:\n\n" + {!! json_encode($secret) !!});
        };
    </script>

</body>

</html>