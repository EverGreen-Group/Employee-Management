<!-- views/layouts/main.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/public/css/style.css">
    <title><?= $title ?? 'EVERGREEN' ?></title>
</head>
<body>
    <div id="sidebar-container">
        <?php include 'views/components/sidebar.php'; ?>
    </div>

    <section id="content">
        <div id="navbar-container">
            <?php include 'views/components/navbar.php'; ?>
        </div>

        <main>
            <?= $content ?>
        </main>
    </section>

    <script src="/public/js/script.js"></script>
</body>
</html>