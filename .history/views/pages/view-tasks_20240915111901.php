<div class="head-title">
    <div class="left">
        <h1>View your Tasks</h1>
    </div>
</div>

<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['message']; ?>
        <?php unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
        <?php unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Task Summary</h3>
            <i class='bx bx-calendar'></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                <tr>
                    <td>
                        <p><?= htmlspecialchars($task['task_name']) ?></p>
                    </td>
                    <td><p><small><?= htmlspecialchars(date('Y-m-d', strtotime($task['due_date']))) ?></small></p></td>
                    <td><p><small><?= htmlspecialchars(date('H:i', strtotime($task['due_date']))) ?></small></p></td>
                    <td>
                        <form action="/update-task-status" method="POST" class="status-form" id="form-<?= $task['id'] ?>">
                            <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                            <select name="new_status" class="status-select <?= strtolower($task['status']) ?>">
                                <option value="Pending" <?= $task['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="In Progress" <?= $task['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                                <option value="Completed" <?= $task['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <button onclick="document.getElementById('form-<?= $task['id'] ?>').submit();" class="btn-update">Update</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="todo">
        <div class="head">
            <h3>Calendar</h3>
            <i class='bx bx-plus'></i>
            <i class='bx bx-filter'></i>
        </div>
        <div id="calendar"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css" rel="stylesheet">
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            <?php foreach ($tasks as $task): ?>
            {
                title: '<?= addslashes($task['task_name']) ?>',
                start: '<?= $task['due_date'] ?>',
                color: '<?= getTaskColor($task['status']) ?>',
                textColor: 'white'
            },
            <?php endforeach; ?>
        ]
    });
    calendar.render();
});

function getTaskColor(status) {
    switch (status) {
        case 'Completed':
            return 'green';
        case 'In Progress':
            return 'blue';
        case 'Pending':
            return 'gray';
        default:
            return 'gray';
    }
}
</script>