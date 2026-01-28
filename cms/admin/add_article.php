<?php
include 'head.php';
include 'sidebar.php';
include 'header.php';


?>
<style>
    /* Card */
    .registration-card {
        border-radius: 18px;
        background: #ffffff;
        border: 1px solid #f1f1f1;
    }

    /* Section titles */
    .form-section-title {
        font-size: 1.2rem;
        font-weight: 700;
        margin: 25px 0 15px;
        padding-left: 10px;
        border-left: 4px solid #0d6efd;
        color: #0d6efd;
    }

    /* Inputs */
    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 10px 12px;
        border: 1px solid #ddd;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .25);
    }

    /* Fee summary */
    .fee-summary {
        background: #f8f9fa;
        padding: 15px 20px;
        border-radius: 12px;
    }

    .fee-line {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .fee-line.total {
        font-weight: 700;
        font-size: 1.1rem;
        border-top: 1px dashed #ccc;
        padding-top: 10px;
    }

    /* QR Section */
    .qr-section {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 12px;
        text-align: center;
    }

    .qr-section img {
        max-width: 200px;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    /* Itinerary */
    .itinerary-box {
        background: #f8f9fa;
        border-radius: 12px;
    }

    /* Button */
    .btn-submit {
        background: linear-gradient(135deg, #0d6efd, #084298);
        border-radius: 12px;
        font-size: 1.1rem;
        padding: 12px;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #084298, #0d6efd);
    }

    /* Support text */
    .support-text {
        font-size: 0.95rem;
        color: #555;
    }

    /* Success/Error message */
    #invitation_msg {
        margin-top: 15px;
        font-weight: 600;
    }
</style>
<main class="content">
    <div class="container-fluid p-0">
        <!-- Page Header -->
        <div class="mb-4">
            <h1 class="h3 fw-bold text-dark">
                Add <span class="text-primary">Article</span> Detail
            </h1>
            <p class="text-muted">Fill in the Article information below</p>
        </div>

        <div class="container">
            <div class="card border-0 shadow-lg rounded-4 mx-auto" style="max-width: 900px;">
                <!-- Card Header -->
                <div class="card-header bg-primary text-white rounded-top-4 py-4">
                    <h4 class="mb-0 text-center">
                        <i class="bi bi-calendar-event me-2"></i>Article Details
                    </h4>
                </div>

                <!-- Card Body -->
                <div class="card-body p-4 p-md-5">
                    <form id="registrationForm" enctype="multipart/form-data">

                        <div class="row g-4">
                            <!-- Article Name -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Article Name</label>
                                <input type="text" id="article_name" name="article_name" class="form-control form-control-lg" placeholder="Enter the Article Name" required>
                            </div>

                            <!-- Article Content -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Article Content</label>
                                <textarea id="article_content" name="article_content" class="form-control form-control-lg" rows="5" placeholder="Enter the Article Content" required></textarea>
                            </div>

                            <!-- Article Image -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Article Image</label>
                                <input type="file" id="article_image" name="article_image" class="form-control form-control-lg" accept="image/*" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-5">
                            <button type="button" id="submit_article" class="btn btn-primary btn-lg px-5 rounded-pill shadow">
                                <i class="bi bi-check-circle me-2"></i>Submit Article
                            </button>
                        </div>

                        <!-- Success/Failure Message -->
                        <div class="mt-4 text-center">
                            <div id="invitation_msg"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</main>



<?php
include 'footer.php';

?>

<script>
    function allowOnlyNumbers(event) {
        event.target.value = event.target.value.replace(/\D/g, '');
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function calculateTotal() {
        let fee = document.getElementById("ArticleFee").value;

        fee = fee ? parseFloat(fee) : 0;

        let gst = fee * 0.18;
        let total = fee + gst;

        document.getElementById("gstAmount").value = gst.toFixed(2);
        document.getElementById("totalAmount").value = total.toFixed(2);
    }

    // Run once on page load
    window.onload = calculateTotal;
</script>
<script>
    $(document).ready(function() {
        $("#submit_article").click(function(e) {
            e.preventDefault();
            var formData = new FormData($("#registrationForm")[0]);

            // Send the form data to PHP for processing via AJAX
            $.ajax({
                url: "submit_Article.php", // The PHP script that will handle the data
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == 1) {
                        $("#invitation_msg").html('<div class="text-success">Article details submitted successfully!</div>');
                        $("#registrationForm")[0].reset();
                    } else {
                        $("#invitation_msg").html('<div class="text-danger">' + response + '</div>');
                        // $("#registrationForm")[0].reset();
                    }

                },
                error: function(xhr, status, error) {
                    // If there is an error with the AJAX request, display an error message
                    $("#invitation_msg").html('<div class="text-danger">Error: ' + error + '</div>');
                }
            });
        });
    });
</script>