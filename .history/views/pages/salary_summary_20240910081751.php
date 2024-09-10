<div class="head-title">
    <div class="left">
        <h1>Salary Summary</h1>
    </div>
</div>

<div class="table-data">
    <div class="order">
        <div class="salary-summary">
            <div class="summary-header">
                <h2>Monthly Salary Payment Summary</h2>
                <span>From 1-31 <?php echo $monthYear; ?></span>
                <a href="#" class="btn-download">View report</a>
            </div>
            <div class="summary-details">
                <p>No. of Days Attended per Month: <?php echo $daysAttended; ?> Days</p>
                <p>Payment per day: Rs. <?php echo number_format($paymentPerDay, 2); ?></p>
                <p>Total Salary: Rs. <?php echo number_format($totalSalary, 2); ?></p>
            </div>
            <div class="salary-breakdown">
                <div class="breakdown-item">
                    <span>Payment</span>
                    <strong>Rs. <?php echo number_format($payment, 2); ?></strong>
                </div>
                <div class="breakdown-item">
                    <span>Benefits</span>
                    <strong>Rs. <?php echo number_format($benefits, 2); ?></strong>
                </div>
                <div class="breakdown-item">
                    <span>Tax</span>
                    <strong><?php echo number_format($tax, 2); ?></strong>
                </div>
            </div>
            <div class="salary-chart">
                <!-- Implement chart here -->
            </div>
        </div>
        <div class="payroll-summary">
            <div class="previous-payroll">
                <h3>Previous Payroll</h3>
                <p><?php echo $monthYear; ?></p>
                <strong>Rs. <?php echo number_format($previousPayroll, 2); ?></strong>
                <span class="status paid">PAID</span>
            </div>
            <div class="upcoming-payroll">
                <h3>Upcoming Payroll</h3>
                <p>April 1, 2024</p>
                <strong>$<?php echo number_format($upcomingPayroll, 2); ?></strong>
                <span class="status pending">PENDING</span>
            </div>
            <div class="worker-info">
                <img src="path_to_worker_image.jpg" alt="<?php echo $workerName; ?>">
                <div>
                    <strong><?php echo $workerName; ?></strong>
                    <span><?php echo $workerRole; ?></span>
                </div>
                <a href="#" class="btn-download">View Invoice</a>
            </div>
        </div>
    </div>
</div>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Transaction History</h3>
            <a href="#" class="btn-download">See All</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Worker</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td>
                        <img src="path_to_worker_image.jpg" alt="<?php echo $workerName; ?>">
                        <p><?php echo $workerName; ?><br><span><?php echo $workerRole; ?></span></p>
                    </td>
                    <td><?php echo $transaction['date']; ?></td>
                    <td>Rs. <?php echo number_format($transaction['amount'], 2); ?></td>
                    <td><a href="#" class="btn-download">View Invoice</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>