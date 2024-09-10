
<div class="head-title">
    <div class="left">
        <h1>Employee Evaluation</h1>
    </div>
</div>

<div class="table-data">
    <div class="order">
        <form action="<?php echo base_url('evaluation/submit'); ?>" method="post">
            <h2>Part 1: Question & Answer</h2>
            <p>Answer these questions to the best of your ability. Feel free to interpret these questions however you like, and skip a question or request clarification if you are unsure how to answer.</p>

            <div class="input-box">
                <label>1. Hi, What's your name and today's date?</label>
                <div style="display: flex; gap: 10px;">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="date" name="todays_date" required>
                </div>
            </div>

            <div class="input-box">
                <label>2. How well do you believe you have performed your assigned tasks over the past evaluation period?</label>
                <textarea name="performance_evaluation" rows="4" required></textarea>
            </div>

            <div class="input-box">
                <label>3. Have you completed all tasks assigned to you on time? If not, please explain.</label>
                <textarea name="task_completion" rows="4" required></textarea>
            </div>

            <div class="input-box">
                <label>4. Do you believe your skills have improved in your role as a factory worker? Provide examples.</label>
                <textarea name="skill_improvement" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn-download">Submit Evaluation</button>
        </form>
    </div>
</div>
