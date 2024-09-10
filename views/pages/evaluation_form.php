<div class="head-title">
    <div class="left">
        <h1>Evaluation Submitted</h1>
    </div>
</div>

<div class="table-data">
    <div class="order">
        <h2>Thank you for completing your evaluation</h2>
        <p>Your responses have been recorded. Here's a summary of your submission:</p>

        <div class="input-box">
            <label>Name:</label>
            <p><?php echo htmlspecialchars($name ?? 'Not provided'); ?></p>
        </div>

        <div class="input-box">
            <label>Evaluation Date:</label>
            <p><?php echo htmlspecialchars($evaluation_date ?? 'Not provided'); ?></p>
        </div>

        <div class="input-box">
            <label>Performance Evaluation:</label>
            <p><?php echo nl2br(htmlspecialchars($performance_evaluation ?? 'Not provided')); ?></p>
        </div>

        <div class="input-box">
            <label>Task Completion:</label>
            <p><?php echo nl2br(htmlspecialchars($task_completion ?? 'Not provided')); ?></p>
        </div>

        <div class="input-box">
            <label>Skill Improvement:</label>
            <p><?php echo nl2br(htmlspecialchars($skill_improvement ?? 'Not provided')); ?></p>
        </div>

        <div class="input-box">
            <a href="<?php echo BASE_URL; ?>evaluation" class="btn-download">Start New Evaluation</a>
        </div>
    </div>
</div>