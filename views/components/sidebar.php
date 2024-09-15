<section id="sidebar">
    <a href="index.php" class="brand">
        <img src="../project-root/public/img/logo.svg" alt="Logo">
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
                <span class="text">Apply for leave</span>
            </a>
        </li>
        <li class="<?= $page == 'view-tasks' ? 'active' : '' ?>">
            <a href="index.php?page=view-tasks">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">View Tasks</span>
            </a>
        </li>
        <li class="<?= $page == 'complete-evaluation' ? 'active' : '' ?>">
            <a href="index.php?page=complete-evaluation">
                <i class='bx bxs-file'></i>
                <span class="text">Complete Evaluation</span>
            </a>
        </li>
        <li class="<?= $page == 'salary-slip' ? 'active' : '' ?>">
            <a href="index.php?page=salary-slip">
                <i class='bx bxs-wallet'></i>
                <span class="text">Salary Slip</span>
            </a>
        </li>
        <li class="<?= $page == 'view-attendance' ? 'active' : '' ?>">
            <a href="index.php?page=view-attendance">
                <i class='bx bxs-calendar'></i>
                <span class="text">View Attendance</span>
            </a>
        </li>
        <li class="<?= $page == 'personal-detail' ? 'active' : '' ?>">
            <a href="index.php?page=personal-detail">
                <i class='bx bxs-user'></i>
                <span class="text">Personal detail</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="index.php?action=logout" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>