<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="not-in-form">
                    <div class="response-message"></div>
                </div>
                <!-- /.not-in-form -->
                <div class="card">
                    <div class="card-header" style="display: flex; align-items: self-end;">
                        <h3 class="card-title"><?php echo lang('ticket_report_heading'); ?></h3>
                        <div class="card-tools ml-auto">
                            <form id="ticket_form" action="<?php echo base_url('admin/tickets/daily_report'); ?>" method="post" class="" style="display: flex; align-items: self-end;">
                                <div class="form-group mb-0 mr-2">
                                    <label for="from_date" class="mr-1">From</label>
                                    <input type="date" id="from_date" name="from_date" value="<?= $fromdate; ?>" class="form-control">
                                </div>
                                <div class="form-group mb-0 mr-2">
                                    <label for="to_date" class="mr-1">To</label>
                                    <input type="date" id="to_date" name="to_date" value="<?= $todate; ?>" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary" name="tickets" value="tickets">Search</button>                                
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0 pb-0 records-card-body">
                        <div class="table-responsive">
                            <table class="custom-table z-table table table-striped text-nowrap table-valign-middle mb-0">
                                <thead class="records-thead">
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <!-- <th>Assigned To</th> -->
                                        <th>Attachment</th>
                                        <th>Status</th>
                                        <th>Permanent Registration Number</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody class="records-tbody text-sm">
                                    <?php
                                    if (!empty($tickets)) {
                                        $i = 1;
                                        foreach ($tickets as $t) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $t->first_name; ?></td>
                                                <td><?= $t->last_name; ?></td>
                                                <td><?= $t->email; ?></td>
                                                <td><?= $t->mobile_number; ?></td>
                                                <td><?= $t->subject; ?></td>
                                                <td><?= $t->message; ?></td>
                                                <!-- <td><?= $t->assigned_to; ?></td> -->
                                                <td><?= $t->mobile_number; ?></td>
                                                <td><?= $t->status; ?></td>
                                                <td><?= $t->permanent_reg_no; ?></td>
                                                <td><?= $t->created_at; ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr id="record-0">
                                            <td colspan="12"><?php echo lang('no_records_found'); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"><?php echo $pagination; ?></div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header" style="display: flex; align-items: self-end;">
                        <h3 class="card-title"><?php echo lang('call_queries_report_heading'); ?></h3>
                        <div class="card-tools ml-auto">
                            <form id="call_query_form" action="<?php echo base_url('admin/tickets/daily_report'); ?>" method="post" class="" style="display: flex; align-items: self-end;">
                                <div class="form-group mb-0 mr-2">
                                    <label for="call_from_date" class="mr-1">From</label>
                                    <input type="date" id="call_from_date" name="call_from_date" value="<?= $callfromdt; ?>" class="form-control">
                                </div>
                                <div class="form-group mb-0 mr-2">
                                    <label for="call_to_date" class="mr-1">To</label>
                                    <input type="date" id="call_to_date" name="call_to_date" value="<?= $calltodt; ?>" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary" name="callquery" value="callquery">Search</button>
                                <button type="submit" class="btn btn-secondary ml-2" name="export_csv" value="export_csv">Export CSV</button>
                            </form>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body pt-0 pb-0 records-card-body">
                        <div class="table-responsive">
                            <table class="custom-table z-table table table-striped text-nowrap table-valign-middle mb-0">
                                <thead class="records-thead">
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Subject</th>
                                        <th>Query</th>
                                        <th>Query Replied</th>
                                        <th>Assigned To</th>
                                        <th>Department Id</th>
                                        <th>Permanent Registration Number</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody class="records-tbody text-sm">
                                    <?php
                                    if (!empty($call_queries)) {
                                        $i = 1;
                                        foreach ($call_queries as $c) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $c->first_name; ?></td>
                                                <td><?= $c->last_name; ?></td>
                                                <td><?= $c->email; ?></td>
                                                <td><?= $c->mobile_number; ?></td>
                                                <td><?= $c->subject; ?></td>
                                                <td><?= $c->query; ?></td>
                                                <td><?= $c->query_replied; ?></td>
                                                <td><?= $c->assigned_to; ?></td>
                                                <td><?= $c->department_id; ?></td>
                                                <td><?= $c->permanent_reg_no; ?></td>
                                                <td><?= $c->created_at; ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr id="record-0">
                                            <td colspan="12"><?php echo lang('no_records_found'); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"><?php echo $pagination; ?></div>
                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
<?php load_modals(['admin/add_canned_reply', 'read', 'delete']); ?>