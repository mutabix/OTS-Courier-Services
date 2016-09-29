<form action='newExpense.php' method='POST'>
    <div class='card' style='padding-left:10px; padding-top:10px;'>
        <div class='row'>
            <div class='col-md-5'>
                <div class='form-group'>
                    <label for='expenseDate'>Expense Date</label>
                    <?php echo "<input type='text' class='form-control' name='expenseDate' id='expenseDate' value='".date('d/m/Y')."' disabled>" ?>
                    <a onclick="enableDate()"><label>modify</label></a>
                </div>
            </div>
            <div class='col-md-5'>
                <div class='form-group'>
                    <label for='expenseAmount'>Amount</label>
                    <?php echo "<input type='number' class='form-control' name='expenseAmount' placeholder='00.00'>" ?>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-10'>
                <div class='form-group'>
                    <label for='expenseDescription'>Description</label>
                    <?php echo "<input type='text' class='form-control' name='expenseDescription' placeholder='Description e.g. Wages'>" ?>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-5'>
                <div class='form-group'>
                    <label for='expenseIncurredBy'>Expense Incurred By (EC)</label>
                    <?php echo "<input type='text' class='form-control' name='expenseIncurredBy' placeholder='Employee Code'>" ?>
                </div>
            </div>
            <div class='col-md-5'>
                <div class='form-group'>
                    <label for='expenseApprovedBy'>Expense Approved By (EC)</label>
                    <?php echo "<input type='text' class='form-control' name='expenseApprovedBy' placeholder='Employee Code'>" ?>
                </div>
            </div>
        </div>
    </div>
    
    <button type='submit' class='btn btn-info btn-fill pull-left' name='submitExpense' onclick='enableDateForSubmit()'>Submit Expense</button>
</form>