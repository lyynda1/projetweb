<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplement</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Add Supplement</h1>
        <form action="../../Controller/EventController.php" method="POST" class="needs-validation" novalidate>
            <!-- Event ID -->
            <div class="mb-3">
                <label for="id_evenement" class="form-label">Event ID</label>
                <input type="number" class="form-control" id="id_evenement" name="id_evenement" required>
                <div class="invalid-feedback">Please provide a valid event ID.</div>
            </div>

            <!-- Supplement Name -->
            <div class="mb-3">
                <label for="nom" class="form-label">Supplement Name</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
                <div class="invalid-feedback">Please provide the supplement name.</div>
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="prix" class="form-label">Price</label>
                <input type="number" class="form-control" id="prix" name="prix" step="0.01" required>
                <div class="invalid-feedback">Please provide a valid price.</div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Supplement</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Form Validation -->
    <script>
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>

</html>
