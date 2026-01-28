<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CMS | Admin</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #eef2ff;
        }

        .login-card {
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,.15);
        }

        .form-control {
            height: 50px;
            border-radius: 10px;
        }

        .btn-primary {
            height: 50px;
            border-radius: 10px;
            font-weight: 600;
        }

        .password-toggle {
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-12 col-sm-10 col-md-6 col-lg-4">
        <div class="card login-card p-4">
            <div class="text-center mb-4">
                <h3 class="fw-bold">CMS</h3>
                <p class="text-muted">Sign in to continue</p>
            </div>

            <form id="loginForm">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" id="email" class="form-control" placeholder="Enter Username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" class="form-control" placeholder="Enter password" required>
                        <span class="input-group-text password-toggle" id="togglePassword">👁️</span>
                    </div>
                </div>

                <div class="d-grid mt-3">
                    <button type="submit" id="loginBtn" class="btn btn-primary">
                        Sign In
                    </button>
                </div>

                <div class="text-danger text-center mt-3" id="loginMsg"></div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$("#togglePassword").click(function () {
    let pass = $("#password");
    pass.attr("type", pass.attr("type") === "password" ? "text" : "password");
});

$("#loginForm").submit(function (e) {
    e.preventDefault();

    let email = $("#email").val();
    let password = $("#password").val();

    if (!email || !password) {
        $("#loginMsg").text("All fields are required");
        return;
    }

    $("#loginBtn").prop("disabled", true).text("Signing in...");

    $.ajax({
        url: "login.php",
        type: "POST",
        data: { uname: email, pass: password },
        success: function (response) {
            if (response.trim() === "success") {
                window.location.href = "dashboard.php";
            } else {
                $("#loginMsg").text(response);
                $("#loginBtn").prop("disabled", false).text("Sign In");
            }
        }
    });
});
</script>
</body>
</html>
