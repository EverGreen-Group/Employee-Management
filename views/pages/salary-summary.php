<div class="head-title">
        <div class="left">
            <h1>Salary Summary</h1>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Monthly Salary Payment Summary</h3>
                <a href="#" class="btn-download">
                    <i class="bx bx-file"></i>
                    <span>View report</span>
                </a>
            </div>
            <p>From <?php echo $currentMonth['start_date']; ?> to <?php echo $currentMonth['end_date']; ?></p>
            <p>No. of Days Attended per Month: <?php echo $currentMonth['days_attended']; ?> Days</p>
            <p>Payment per day: Rs. <?php echo number_format($currentMonth['payment_per_day'], 2); ?></p>
            <p>Total Salary: Rs. <?php echo number_format($currentMonth['total_salary'], 2); ?></p>
            
            <div class="box-info">
                <li>
                    <i class="bx bx-dollar-circle"></i>
                    <span class="text">
                        <p>Payment</p>
                        <h3>Rs. <?php echo number_format($currentMonth['payment'], 2); ?></h3>
                    </span>
                </li>
                <li>
                    <i class="bx bx-time"></i>
                    <span class="text">
                        <p>Pending</p>
                        <h3>Rs. <?php echo number_format($currentMonth['pending'], 2); ?></h3>
                    </span>
                </li>
                <li>
                    <i class="bx bx-check-circle"></i>
                    <span class="text">
                        <p>Paid</p>
                        <h3>Rs. <?php echo number_format($currentMonth['paid'], 2); ?></h3>
                    </span>
                </li>
            </div>
            
            <!-- Add pie chart here -->
            <div class="chart">
                <img src="../project-root/public/img/pie.png" alt="Pie Chart">
                <small>50%</small>
            </div>
        </div>
        
        <div class="todo">
            <div class="head">
                <h3><i class="bx bx-bar-chart-alt-2"></i> Previous Payroll</h3>
                <p><?php echo $previousPayroll['date']; ?></p>
            </div>
            <h3>Rs. <?php echo number_format($previousPayroll['amount'], 2); ?></h3>
            <span class="status completed"><?php echo $previousPayroll['status']; ?></span>
            
            <div class="head">
                <h3><i class="bx bx-calendar"></i> Upcoming Payroll</h3>
                <p><?php echo $upcomingPayroll['date']; ?></p>
            </div>
            <h3>Rs. <?php echo number_format($upcomingPayroll['amount'], 2); ?></h3>
            <span class="status pending"><?php echo $upcomingPayroll['status']; ?></span>
            <ul class="todo-list">
                <li class="completed">
                    <p>
                        <img src="../project-root/public/img/people.png" alt="<?php echo $upcomingPayroll['worker']['name']; ?>" class="worker-image">
                        <?php echo $upcomingPayroll['worker']['name']; ?>
                        <br>
                        <small><?php echo $upcomingPayroll['worker']['position']; ?></small>
                    </p>
                    <a href="#" class="btn-download">View Invoice</a>
                </li>
            </ul>
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
                            <img src="../project-root/public/img/people.png" alt="Theekshana" class="worker-image">
                            <p>Theekshana <br><small>Worker</small></p>
                        </td>
                        <td><?php echo $transaction['date']; ?><br><small><?php echo $transaction['time']; ?></small></td>
                        <td>Rs. <?php echo number_format($transaction['amount'], 2); ?></td>
                        <td><a href="#" class="btn-download"><i class="bx bx-file"></i> View Invoice</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>