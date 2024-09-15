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
                        <button class="status-btn" data-task-id="<?= $task['id'] ?>" data-status="<?= $task['status'] ?>">
                            <span class="status <?= strtolower($task['status']) ?>"><?= htmlspecialchars($task['status']) ?></span>
                        </button>
                    </td>
                    <td><button><i class='bx bx-dots-vertical-rounded'></i></button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="#" class="btn-download">View More</a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusButtons = document.querySelectorAll('.status-btn');
    
    statusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const taskId = this.getAttribute('data-task-id');
            const currentStatus = this.getAttribute('data-status');
            
            fetch('/update-task-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `task_id=${taskId}&current_status=${currentStatus}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update UI
                    this.setAttribute('data-status', data.newStatus);
                    const statusSpan = this.querySelector('.status');
                    statusSpan.textContent = data.newStatus;
                    statusSpan.className = `status ${data.newStatus.toLowerCase()}`;
                } else {
                    console.error('Failed to update status:', data.error);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>