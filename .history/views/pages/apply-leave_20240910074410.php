<div class="leave-application-form">
    <form action="#" method="post">
        <div class="form-group">
            <label for="from-slot">From slot</label>
            <select id="from-slot" name="from_slot" required>
                <option value="">Select slot</option>
                <!-- Add more options here -->
            </select>
        </div>

        <div class="form-group">
            <label for="to-date">To Date</label>
            <input type="date" id="to-date" name="to_date" placeholder="Enter to date" required>
        </div>

        <div class="form-group">
            <label for="to-slot">To Slot</label>
            <select id="to-slot" name="to_slot" required>
                <option value="">Select slot</option>
                <!-- Add more options here -->
            </select>
        </div>

        <div class="form-group">
            <label for="reason">Reason</label>
            <textarea id="reason" name="reason" rows="4" placeholder="Enter reason for leave" required></textarea>
        </div>

        <div class="form-group">
            <label for="your-name">Your Name</label>
            <input type="text" id="your-name" name="your_name" value="Theekshana" required>
        </div>

        <div class="form-group">
            <label for="notify-to">Notify To</label>
            <input type="text" id="notify-to" name="notify_to" placeholder="Search for user" required>
        </div>

        <div class="form-group">
            <label for="documents">Documents</label>
            <input type="file" id="documents" name="documents">
            <label for="documents" class="file-upload-btn">
                <i class='bx bx-upload'></i> Add file
            </label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-submit">Save</button>
        </div>
    </form>
</div>