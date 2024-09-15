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
                            <input type="hidden" name="current_status" value="<?= $task['status'] ?>">
                            <button type="submit" class="status-btn <?= strtolower($task['status']) ?>">
                                <?= htmlspecialchars($task['status']) ?>
                            </button>
                        </form>
                    </td>
                    <td><button><i class='bx bx-dots-vertical-rounded'></i></button></td>
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