<!-- views/pages/apply-leave.php -->
<div class="head-title">
    <div class="left">
        <h1>Apply Leave</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Apply Leave</a>
            </li>
        </ul>
    </div>
</div>

<div class="leave-application-form">
    <form action="index.php?page=apply-leave" method="post">
        <div class="form-group">
            <label for="leave-type">Leave Type:</label>
            <select id="leave-type" name="leave_type" required>
                <option value="">Select Leave Type</option>
                <option value="annual">Annual Leave</option>
                <option value="sick">Sick Leave</option>
                <option value="personal">Personal Leave</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start-date">Start Date:</label>
            <input type="date" id="start-date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end-date">End Date:</label>
            <input type="date" id="end-date" name="end_date" required>
        </div>
        <div class="form-group">
            <label for="reason">Reason:</label>
            <textarea id="reason" name="reason" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit">Submit Application</button>
        </div>
    </form>
</div>