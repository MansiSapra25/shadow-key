<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secret Created - Shadow Key</title>
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
        .link-box {
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg p-4">
                <div class="card-body text-center">

                    <h2 class="mb-3 text-success">✅ Secret Created</h2>
                    <p class="text-muted">
                        Share this secure link with your recipient.
                    </p>

                    <div class="input-group mb-3 mt-4">
                        <input type="text"
                               id="secretLink"
                               class="form-control link-box"
                               value="{{ url('/reveal/' . $uuid) }}"
                               readonly>

                        <button id="copyBtn" class="btn btn-dark" onclick="copyLink()">
                            Copy
                        </button>
                    </div>

                    <div id="copyMessage"></div>

                    <div class="alert alert-warning mt-4">
                        ⚠ This link will self-destruct after one view.
                    </div>

                </div>
            </div>

            <div class="text-center text-white mt-3">
                <small>Shadow Key • Encrypted • One-Time Access</small>
            </div>

        </div>
    </div>
</div>

<script>
function copyLink() {
    const linkInput = document.getElementById('secretLink');
    const copyBtn = document.getElementById('copyBtn');
    const originalText = copyBtn.innerHTML;

    linkInput.select();
    linkInput.setSelectionRange(0, 99999);

    const textToCopy = linkInput.value;

    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(textToCopy).then(() => {
            updateSuccess(copyBtn, originalText);
        }).catch(() => {
            fallbackCopy(textToCopy, copyBtn, originalText);
        });
    } else {
        fallbackCopy(textToCopy, copyBtn, originalText);
    }
}

function fallbackCopy(text, btn, originalText) {
    try {
        const successful = document.execCommand('copy');
        if (successful) {
            updateSuccess(btn, originalText);
        } else {
            showError();
        }
    } catch (err) {
        showError();
    }
}

function updateSuccess(btn, originalText) {
    btn.innerHTML = '✅ Copied!';
    btn.classList.replace('btn-dark', 'btn-success');
    setTimeout(() => {
        btn.innerHTML = originalText;
        btn.classList.replace('btn-success', 'btn-dark');
    }, 2000);
}

function showError() {
    const msgDiv = document.getElementById('copyMessage');
    msgDiv.innerHTML = '<div class="alert alert-danger mt-3">Failed to copy automatically. Please copy manually.</div>';
    setTimeout(() => { msgDiv.innerHTML = ''; }, 3000);
}
</script>

</body>
</html>
