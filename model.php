<?php
//     public function tickets_csv() {
    //         $f_dt = $this->input->post('from_date');
    //         $t_dt = $this->input->post('to_date');

    //         // if(empty($f_dt)) $f_dt=date('Y-m-d'. ' 00:00:01' );
    //         // if(empty($t_dt)) $t_dt=date('Y-m-d'. ' 23:59:59');

    //         if(empty($f_dt)) $f_dt=date('Y-m-d');
    //         if(empty($t_dt)) $t_dt=date('Y-m-d');

    //         $f_dt_u = strtotime($f_dt);
    //         $t_dt_u = strtotime($t_dt);

    //          //$sql = "select * from tickets  where created_at between ".$f_dt_u." and ".$t_dt_u;
    //         //  $sql = "select id, first_name, last_name, email, mobile_number, subject, message,assigned_to,department_id,attachment_name,status, permanent_reg_no, email_attempts,DATE_FORMAT(FROM_UNIXTIME(created_at),'%d-%m-%Y %H:%i:%s')created_at from tickets  where created_at between ".$f_dt_u." and ".$t_dt_u;
    //         $sql = "
    //     SELECT 
    //         id, 
    //         first_name, 
    //         last_name, 
    //         email, 
    //         mobile_number, 
    //         subject, 
    //         message, 
    //         assigned_to, 
    //         department_id, 
    //         attachment_name, 
    //         status, 
    //         permanent_reg_no, 
    //         email_attempts, 
    //         DATE_FORMAT(FROM_UNIXTIME(created_at), '%d-%m-%Y %H:%i:%s') AS created_at 
    //     FROM 
    //         tickets 
    //     WHERE 
    //         created_at BETWEEN FROM_UNIXTIME($f_dt_u) AND FROM_UNIXTIME($t_dt_u)
    // ";

    //         $query = $this->db->query($sql);
    //         return $query->result();



    //     }

    public function tickets_csv($fromdt, $todt)
    {
        // $fromdate = strtotime($fromdt);
        // $todate = strtotime($todt);
        $fromdate = $fromdt.' 00:00:00';
        $todate = $todt.' 23:59:59';
        $sql = "select id, first_name, last_name, email, mobile_number, subject, message,assigned_to,department_id,attachment_name,status, permanent_reg_no, email_attempts,DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m-%d')created_at from tickets  where FROM_UNIXTIME(created_at) >= '".$fromdate."' and FROM_UNIXTIME(created_at) <= '".$todate."'";
        // echo $sql; die();
        $query = $this->db->query($sql);
        return $query->result();
    }

    // public function get_todays_report($fromdt, $todt)
    // {
    //     // $fromdate = strtotime($fromdt);
    //     // $todate = strtotime($todt);
    //     $fromdate = $fromdt.' 00:00:00';
    //     $todate = $todt.' 23:59:59';
    //     $sql = "select id, first_name, last_name, email, mobile_number, subject, message,assigned_to,department_id,attachment_name,status, permanent_reg_no, email_attempts,DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m-%d')created_at from tickets where FROM_UNIXTIME(created_at) >= '".$fromdate."' and FROM_UNIXTIME(created_at) <= '".$todate."'";
    //     // print_r($sql); die();    
    //     $query = $this->db->query($sql);
    //     return $query->result();
    // }

    public function queries_csv($fromdt, $todt)
    {
        // $fromdate = strtotime($fromdt);
        // $todate = strtotime($todt);
        $fromdate = $fromdt.' 00:00:00';
        $todate = $todt.' 23:59:59';
        $sql = "select id, first_name, last_name, email, mobile_number, subject, query, query_replied,assigned_to,department_id, permanent_reg_no, email_attempts,DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m-%d')created_at from call_queries where FROM_UNIXTIME(created_at) >= '".$fromdate."' and FROM_UNIXTIME(created_at) <= '".$todate."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    // public function get_todays_queries_report($fromdt, $todt)
    // {
    //     // $fromdate = strtotime($fromdt);
    //     // $todate = strtotime($todt);
    //     $fromdate = $fromdt.' 00:00:00';
    //     $todate = $todt.' 23:59:59';
    //     $sql = "select id, first_name, last_name, email, mobile_number, subject, query, query_replied,assigned_to,department_id, permanent_reg_no, email_attempts,DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m-%d')created_at from call_queries where FROM_UNIXTIME(created_at) >= '".$fromdate."' and FROM_UNIXTIME(created_at) <= '".$todate."'";
    //     // print_r($sql); die();
    //     $query = $this->db->query($sql);
    //     return $query->result();
    // }

    // public function queries_csv() {
    //     $f_dt = $this->input->post('f_dt');
    //     $t_dt = $this->input->post('t_dt');

    //     if(empty($f_dt)) $f_dt=date('Y-m-d'. ' 00:00:01' );
    //     if(empty($t_dt)) $t_dt=date('Y-m-d'. ' 23:59:59');

    //     $f_dt_u = strtotime($f_dt);
    //     $t_dt_u = strtotime($t_dt);

    //     $sql = "select id, first_name, last_name, email, mobile_number, subject, query, query_replied,assigned_to,department_id, permanent_reg_no, email_attempts,DATE_FORMAT(FROM_UNIXTIME(created_at),'%d-%m-%Y %H:%i:%s')created_at from call_queries  where created_at between ".$f_dt_u." and ".$t_dt_u;
    //     $query = $this->db->query($sql);
    //     return $query->result();
    //}
}
?>