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
                        <form action="/update-task-status" method="POST" class="status-form">
                            <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                            <select name="new_status" class=status <?= strtolower($task['status']) ?>" onchange="this.form.submit()">
                                <option value="Pending" <?= $task['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="In Progress" <?= $task['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                                <option value="Completed" <?= $task['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                            </select>
                        </form>
                    </td>
                    <td><i class='bx bx-dots-vertical-rounded'></i></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="#" class="btn-download">View More</a>
    </div>

    <!-- Calendar code remains unchanged -->
    <div class="todo">
        <!-- ... (calendar code) ... -->
    </div>
</div>