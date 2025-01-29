<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} Admin Panel</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
                display: flex;
                min-height: 100vh;
            }

            .sidebar {
                min-width: 250px;
                max-width: 250px;
                background-color: #343a40;
                color: #fff;
                flex-shrink: 0;
                height: 100vh;
            }

            .sidebar a {
                color: #adb5bd;
                text-decoration: none;
                padding: 10px 20px;
                display: block;
            }

            .sidebar a:hover {
                background-color: #495057;
                color: #fff;
            }

            .content {
                flex-grow: 1;
                padding: 20px;
            }

            .navbar {
                margin-bottom: 20px;
            }

            .footer {
                text-align: center;
                padding: 10px;
                background-color: #f8f9fa;
                position: fixed;
                bottom: 0;
                width: calc(100% - 250px);
            }
        </style>
    </head>
    <body>
        <!-- Sidebar -->
        <nav class="sidebar">
            <h3 class="py-3 text-center">{{ config('app.name', 'Laravel') }}</h3>
            <a href="/dashboard">Dashboard</a>
            <a href="/users">Users</a>
            <a href="/settings">Settings</a>
            <a href="/reports">Reports</a>
            <a href="/logout">Logout</a>
        </nav>

        <!-- Main Content -->
        <div class="content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Admin Panel</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Notifications</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                       class="nav-link"
                                       onclick="event.preventDefault(); this.closest('form').submit();">
                                       {{ __('Logout') }}
                                    </a>
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Section -->
            <div class="container">
                <h1>Welcome, Admin!</h1>
                <p>This is the admin panel where you can manage the application.</p>

                <!-- Example Table -->
                <div class="mt-4 card">
                    <div class="card-header">Recent Activities</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Action</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>User John created a post.</td>
                                    <td>2025-01-23 14:32</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>User Jane updated her profile.</td>
                                    <td>2025-01-23 13:15</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Admin archived a report.</td>
                                    <td>2025-01-23 12:05</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <p>© <?php echo date("Y"); ?> {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
