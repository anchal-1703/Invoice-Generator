<?php
public function daily_report()
{
    $fromdt = $todt = $callfromdt = $calltodt = date('Y-m-d');
    $tickets = $call_queries = [];

    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        if ($this->input->post('tickets') == 'tickets') {
            $fromdt = $this->input->post('from_date');
            $todt = $this->input->post('to_date');

            if ($this->input->post('export_ticket_csv')) {
                $this->export_tickets_csv($fromdt, $todt);
                return;
            }
            $tickets = $this->Support_model->tickets_csv($fromdt, $todt);
        } else {
            $callfromdt = $this->input->post('call_from_date');
            $calltodt = $this->input->post('call_to_date');

            if ($this->input->post('export_csv')) {
                $this->export_queries_csv($callfromdt, $calltodt);
                return;
            }

            $call_queries = $this->Support_model->queries_csv($callfromdt, $calltodt);
        }
    } else {
        $tickets = $this->Support_model->tickets_csv($fromdt, $todt);
        $call_queries = $this->Support_model->queries_csv($callfromdt, $calltodt);
    }

    $data['data']['tickets'] = $tickets;
    $data['data']['fromdate'] = $fromdt;
    $data['data']['todate'] = $todt;
    $data['data']['callfromdt'] = $callfromdt;
    $data['data']['calltodt'] = $calltodt;
    $data['data']['call_queries'] = $call_queries;
    $data['data']['main_controller'] = 'support';
    $data['view'] = 'daily_report';
    $this->load_panel_template($data);
}

private function export_tickets_csv($fromdt, $todt)
{
    $this->load->dbutil();
    $this->load->helper('file');
    $this->load->helper('download');
    $fromdate = $fromdt.' 00:00:00';
    $todate = $todt.' 23:59:59';
    $query = $this->db->select('*')
                      ->from('tickets')
                      ->where('FROM_UNIXTIME(created_at) >=', $fromdate)
                      ->where('FROM_UNIXTIME(created_at) <=', $todate)
                      ->get();

    if ($query->num_rows() > 0) {
        $delimiter = ",";
        $newline = "\r\n";
        $enclosure = '"';
        $csv_data = $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);

        log_message('debug', 'CSV Data: ' . $csv_data);

        force_download('tickets_report.csv', $csv_data);
    } else {
        log_message('debug', 'No data found for tickets CSV.');
        $this->session->set_flashdata('error', 'No data found for the selected date range.');
        redirect('admin/tickets/daily_report');
    }
}

private function export_queries_csv($callfromdt, $calltodt)
{
    $this->load->dbutil();
    $this->load->helper('file');
    $this->load->helper('download');
    $fromdate = $callfromdt.' 00:00:00';
    $todate = $calltodt.' 23:59:59';
    $query = $this->db->select("id, first_name, last_name, email, mobile_number, subject, query, query_replied,department_id, permanent_reg_no,DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m-%d')created_at")
                      ->from('call_queries')
                      ->where('FROM_UNIXTIME(created_at) >=', $fromdate)
                      ->where('FROM_UNIXTIME(created_at) <=', $todate)
                      ->get();

    if ($query->num_rows() > 0) {
        $delimiter = ",";
        $newline = "\r\n";
        $enclosure = '"';
        $csv_data = $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);

        log_message('debug', 'CSV Data: ' . $csv_data);

        force_download('call_queries_report.csv', $csv_data);
    } else {
        log_message('debug', 'No data found for call queries CSV.');
        $this->session->set_flashdata('error', 'No data found for the selected date range.');
        redirect('admin/tickets/daily_report');
}
}

}
?>