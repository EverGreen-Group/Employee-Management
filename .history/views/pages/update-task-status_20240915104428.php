<div class="head-title">
    <div class="left">
        <h1>Update Task Status</h1>
    </div>
</div>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Task Details</h3>
        </div>
        <form action="/update-task-status" method="POST" class="status-form">
            <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
            <table>
                <tr>
                    <td>Task Name:</td>
                    <td><?= htmlspecialchars($task['task_name']) ?></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><?= htmlspecialchars($task['description']) ?></td>
                </tr>
                <tr>
                    <td>Due Date:</td>
                    <td><?= htmlspecialchars(date('Y-m-d H:i', strtotime($task['due_date']))) ?></td>
                </tr>
                <tr>
                    <td>Current Status:</td>
                    <td>
                        <select name="new_status" class="status-select <?= strtolower($task['status']) ?>">
                            <option value="Pending" <?= $task['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="In Progress" <?= $task['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                            <option value="Completed" <?= $task['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn-download">Update Status</button>
        </form>
    </div>
</div>