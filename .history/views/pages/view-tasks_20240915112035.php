<div class="head-title">
    <div class="left">
        <h1>View your Tasks</h1>
    </div>
</div>

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
        <a href="#" class="btn-download">View More</a>
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
                color: '<?= getTaskColor($task) ?>',
                textColor: 'white'
            },
            <?php endforeach; ?>
        ]
    });
    calendar.render();
});

function getTaskColor(task) {
    var dueDate = new Date(task.due_date);
    var today = new Date();
    if (task.status === 'Completed') {
        return 'green';
    } else if (task.status === 'In Progress') {
        return 'blue';
    } else if (dueDate < today) {
        return 'red';
    }
    return 'gray';
}
</script>