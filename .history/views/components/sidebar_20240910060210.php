<!-- views/components/sidebar.php -->
<section id="sidebar">
    <a href="index.php" class="brand">
        <img src="/public/img/logo.svg" alt="Logo">
        <span class="text">EVERGREEN</span>
    </a>
    <ul class="side-menu top">
        <li class="<?= $page == 'dashboard' ? 'active' : '' ?>">
            <a href="index.php">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="<?= $page == 'apply-leave' ? 'active' : '' ?>">
            <a href="index.php?page=apply-leave">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="text">Apply Leave</span>
            </a>
        </li>
        <li class="<?= $page == 'view-tasks' ? 'active' : '' ?>">
            <a href="index.php?page=view-tasks">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">View Tasks</span>
            </a>
        </li>
        <!-- Add other menu items here -->
    </ul>
    <!-- Add the bottom part of the sidebar here -->
</section>