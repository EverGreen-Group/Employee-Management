<?php
// views/pages/view-attendance.php
?>

<div class="head-title">
    <div class="left">
        <h1>View Attendance</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">View Attendance</a>
            </li>
        </ul>
    </div>
</div>

<div class="attendance-filter">
    <form action="index.php" method="get">
        <input type="hidden" name="page" value="view-attendance">
        <label for="start-date">Start Date:</label>
        <input type="date" id="start-date" name="start_date" value="<?php echo htmlspecialchars($startDate ?? ''); ?>">
        <label for="end-date">End Date:</label>
        <input type="date" id="end-date" name="end_date" value="<?php echo htmlspecialchars($endDate ?? ''); ?>">
        <button type="submit">Filter</button>
    </form>
</div>

<div class="attendance-actions">
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="check_in">
        <button type="submit">Check In</button>
    </form>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="check_out">
        <button type="submit">Check Out</button>
    </form>
</div>

<div class="table-data">
    <div class="order">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Total Hours</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($attendance)): ?>
                    <?php foreach ($attendance as $record): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($record['date']); ?></td>
                            <td><?php echo htmlspecialchars($record['time_in']); ?></td>
                            <td><?php echo htmlspecialchars($record['time_out'] ?? 'Not recorded'); ?></td>
                            <td>
                                <?php
                                if (!empty($record['time_out'])) {
                                    $timeIn = new DateTime($record['time_in']);
                                    $timeOut = new DateTime($record['time_out']);
                                    $interval = $timeIn->diff($timeOut);
                                    echo $interval->format('%H:%I');
                                } else {
                                    echo 'N/A';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
