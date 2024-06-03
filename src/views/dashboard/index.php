<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 2rem;
        }
        h2 {
            text-align: center;
            margin-bottom: 1rem;
            color: #343a40;
        }
        .table {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .btn {
            background: #343a40;
            border: none;
            color: white;
        }
        .btn:hover {
            background: #495057;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'administrator'): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Country</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['dob']; ?></td>
                            <td><?php echo $user['country']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You do not have permission to view this page.</p>
        <?php endif; ?>
    </div>
</body>
</html>
