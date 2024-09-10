<div class="head-title">
    <div class="left">
        <h1>Apply Leave</h1>
    </div>
</div>

<div class="table-data">
    <div class="order">
        <form action="#" method="post">
            <div class="input-box">
                <label for="from-slot">From slot</label>
                <select id="from-slot" name="from_slot" required>
                    <option value="">Select slot</option>
                    <!-- Add more options here -->
                </select>
            </div>

            <div class="input-box">
                <label for="to-date">To Date</label>
                <input type="date" id="to-date" name="to_date" placeholder="Enter to date" required>
            </div>

            <div class="input-box">
                <label for="to-slot">To Slot</label>
                <select id="to-slot" name="to_slot" required>
                    <option value="">Select slot</option>
                    <!-- Add more options here -->
                </select>
            </div>

            <div class="input-box">
                <label for="reason">Reason</label>
                <textarea id="reason" name="reason" rows="4" placeholder="Enter reason for leave" required></textarea>
            </div>

            <div class="input-box">
                <label for="your-name">Your Name</label>
                <input type="text" id="your-name" name="your_name" value="Theekshana" required>
            </div>

            <div class="input-box">
                <label for="notify-to">Notify To</label>
                <input type="text" id="notify-to" name="notify_to" placeholder="Search for user" required>
            </div>

            <div class="input-box">
                <label for="documents">Documents</label>
                <input type="file" id="documents" name="documents" style="display:none;">
                <label for="documents" class="btn-download">
                    <i class='bx bx-upload'></i> Add file
                </label>
            </div>

            <button type="submit" class="btn-download">Save</button>
        </form>
    </div>
</div>