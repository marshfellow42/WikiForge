<!-- resources/views/admin.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="text-white bg-dark">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="border-0 shadow-lg card">
                    <div class="text-white card-header bg-primary">
                        <h3 class="mb-0 text-center">Admin Panel</h3>
                    </div>
                    <div class="card-body bg-light text-dark">
                        <!-- Success/Error Messages -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="/app-card/upload" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Enter the name" required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" name="content" id="content" placeholder="Enter the content" rows="4" required></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>

                    <div class="text-center card-footer bg-light">
                        <a href="/" class="btn btn-danger">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoXnqAvkC3pNnVA+YZ1Q1t9r+ekN0I5oVgm5HSlh83cZr" crossorigin="anonymous"></script>
</body>
</html>
