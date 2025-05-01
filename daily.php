<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="csrf-token" content="{{ csrf_token()�}}">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Diary report</title>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
            <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        </head>
        <style>
            * {
                padding: 4px;
            }
        </style>


        <h1 style="text-align:center;">Punjab Pharmacy Council</h1>
        <form action="" method="post" class="form-inline" style="padding: 12px;display: flex;align-items: center; justify-content: space-evenly;">
            <h5>Tickets Report</h5>
            <label for="from_date"><b>Check Tickets Report:</b> From Date</label>
            <input type="date" class="form-control w-25" name="from_date" id="from_date" value="">
            <label for="to_date">To Date</label>
            <input type="date" class="form-control w-25" name="to_date" id="to_date" value="">
            <input type="submit" name="search" class="btn btn-primary search-btn " value="Search">
        </form>
        <hr style="padding: 0;">
        <!-- <h3 style="text-align:center;">Daily Report</h3> -->

        <table id="demo" class="table table-striped table-bordered" style="width:100%">

            <caption class="text-center">Daily Report: Tickets</caption>
            <thead>
                <tr>
                    <th>id</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>email</th>
                    <th>mobile_number</th>
                    <th>subject</th>
                    <th>message</th>
                    <th>assigned_to</th>
                    <th>attachment_name</th>
                    <th>status</th>
                    <th>permanent_reg_no</th>
                    <th>created_at</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($tickets)) : ?>
                    <?php foreach ($tickets as $ticket) : ?>
                        <tr>
                            <td><?= $ticket->id ?></td>
                            <td><?= $ticket->first_name ?></td>
                            <td><?= $ticket->last_name ?></td>
                            <td><?= $ticket->email ?></td>
                            <td><?= $ticket->mobile_number ?></td>
                            <td><?= $ticket->subject ?></td>
                            <td><?= $ticket->assigned_to ?></td>
                            <td><?= $ticket->department_id ?></td>
                            <td><?= $ticket->attachment_name ?></td>
                            <td><?= $ticket->status ?></td>
                            <td><?= $ticket->permanent_reg_no ?></td>
                            <td><?= $ticket->created_at ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="14">No tickets found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <form action="" method="post" class="form-inline" style="padding: 12px;display: flex;align-items: center; justify-content: space-evenly;">
            <h5>Call Queries Report</h5>
            <label for="from_date"><b>Check Call Queries Report:</b> From Date</label>
            <input type="date" class="form-control w-25" name="from_date" id="from_date1" value="{{ old('from_date', $from_date ?? '') }}">
            <label for="to_date">To Date</label>
            <input type="date" class="form-control w-25" name="to_date" id="to_date1" value="{{ old('to_date', $to_date ?? '') }}">
            <input type="submit" name="search" class="btn btn-primary search-btn " value="Search">
        </form>
        <hr style="padding: 0;">
        <table id="demo1" class="table table-striped table-bordered" style="width:100%">
            <caption class="text-center">Daily Report: Call Queries </caption>
            <thead>
                <tr>
                    <th>id</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>email</th>
                    <th>mobile_number</th>
                    <th>subject</th>
                    <th>query</th>
                    <th>query_replied</th>
                    <th>assigned_to</th>
                    <th>department_id</th>
                    <th>permanent_reg_no</th>
                    <th>created_at</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($call_queries)) : ?>
                    <?php foreach ($call_queries as $call_querie) : ?>
                        <tr>
                            <td><?= $call_querie->id ?></td>
                            <td><?= $call_querie->first_name ?></td>
                            <td><?= $call_querie->last_name ?></td>
                            <td><?= $call_querie->email ?></td>
                            <td><?= $call_querie->mobile_number ?></td>
                            <td><?= $call_querie->subject ?></td>
                            <td><?= $call_querie->query ?></td>
                            <td><?= $call_querie->query_replied ?></td>
                            <td><?= $call_querie->assigned_to ?></td>
                            <td><?= $call_querie->department_id ?></td>
                            <td><?= $call_querie->permanent_reg_no ?></td>
                            <td><?= $call_querie->created_at ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="14">No Queries found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#demo').DataTable();
                $('#demo1').DataTable();
                var today = new Date().toISOString().split('T')[0];
                $('#to_date').val(today);

                $('#from_date').change(function() {
                    var from_date = $(this).val();
                    var to_date = $('#to_date').val();
                    if (from_date > to_date) {
                        alert('From date should not be greater than to date');
                        $(this).val(to_date);
                    }
                });

                $('#to_date').change(function() {
                    var to_date = $(this).val();
                    var from_date = $('#from_date').val();
                    if (to_date < from_date) {
                        alert('To date should not be less than from date');
                        $(this).val(from_date);
                    }
                });
                $('#to_date1').val(today);

                $('#from_date1').change(function() {
                    var from_date = $(this).val();
                    var to_date = $('#to_date1').val();
                    if (from_date > to_date) {
                        alert('From date should not be greater than to date');
                        $(this).val(to_date);
                    }
                });

                $('#to_date1').change(function() {
                    var to_date = $(this).val();
                    var from_date = $('#from_date1').val();
                    if (to_date < from_date) {
                        alert('To date should not be less than from date');
                        $(this).val(from_date);
                    }
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        </script>


        </body>

        </html>