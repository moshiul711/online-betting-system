<?php
//$db = new PDO('mysql:host=localhost;dbname=bpwn_audit;charset=utf8mb4','root','');
//if(isset($_POST['expense_save']))
//{
//    $financial_year = 1;
//    $exp_date = $_POST['date'];
//    $exp_name=$_POST['expense_name'];
//    $exp_medium=$_POST['expense_medium'];
//
//    $query_expense = "INSERT INTO `transaction_summary` (`transaction_type`,`transaction_name`,`transaction_medium`,`submit_date`, `bank_idbank`,  `financial_year_idfinancial_year`)
//                        VALUES ('E','$exp_name','$exp_medium', '$exp_date', '3', '$financial_year')";
//    $result_expense = $db->exec($query_expense);
//    if($result_expense) echo "Data has been saved Successfully";
//
//    $last_transactionID = $db->lastInsertId();
//
//    for($loop = 0; $loop<count($_POST['amount']); $loop++)
//    {
//        $category_id = $_POST['exp_name'][$loop];
//        $amount = $_POST['amount'][$loop];
//        $query_expense_trans = "INSERT INTO  `transaction` (transaction_summary_idtransaction_summary,
//                                                            transaction_category_idtransaction_category, amount)
//                                                            VALUES('$last_transactionID', '$category_id', '$amount')";
//        $result_expense_trans = $db->exec($query_expense_trans);
//    }
//}
//
//
//$query = "SELECT * FROM `transaction_category`";
//$result = $db->query($query);
//$bisu = $result->fetchAll(PDO::FETCH_ASSOC);
//
//?>

<html>
<head>
    <title>Expense</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style type="text/css">
        table,td{
            border: none;
        }
    </style>
</head>
<body>
<div class="container">
    <br />
    <br />
    <div class="form-group">
        <form action="#" method="post" id="add_name">
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td>
                            <label>Expense name:</label>
                            <input type="text" name="expense_name" id="expense_name" class="form-control" placeholder="Please enter your name">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Expense Medium:</label>
                            <input type="text" name="expense_medium" id="expense_medium" class="form-control" placeholder="Where you have expensed?">
                        </td>
                        <td>
                            <label>Date:</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><label id="serial">SL:</label>
                            <label  class="form-control">1</label>
                        </td>
                        <td>
                            <label>Expense category:</label>

                        </td>
                        <td>
                            <div class="form-group">
                                <label>Amount:</label>
                                <input type="text" name="amount[]" placeholder="Enter your Amount" class="txtBox form-control name_list" id="" />
                            </div>
                        </td>
                        <td>
                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                        </td>
                    </tr>

                </table>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="">Total</label>
                            <output id="result"></output>
                        </div>
                    </td>
                </tr>

                <button type="submit" name="expense_save">Save</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td><label id="serial" class="form-control">'+i+'</label></td><td> <select class="form-control " name="exp_name[]" id="expense">  <option value="" >ghhfhfhfgh </select> </td><td><div class="form-group">\n' +
                '                                <label>Amount:</label>\n' +
                '                                <input type="text" name="amount[]" placeholder="Enter your Amount" class="txtBox form-control name_list" id="" />\n' +
                '                            </div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
    });
</script>


