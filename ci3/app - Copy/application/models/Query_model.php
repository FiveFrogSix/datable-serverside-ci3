<?php 
class Query_model extends CI_Model {

    public function system_user($number){ //query system_user
        
        $username = $this->input->post('username');
        $public_ip = $this->input->ip_address();
        $queryUser = $this->db->select('
            system_user.id,
            system_user.username,
            system_user.password,
            system_user.status,
        ')
        ->from('system_user')
        ->where('system_user.username', $username)
        ->get();
        $countUser = $queryUser->num_rows();
        
        if($number == 1){
            if (isset($username)) {
                if($countUser == 1){
                    $password = md5($this->input->post('password'));
                    $rowUser = $queryUser->row();
                    $id = $rowUser->id;
                    $hash_salt = $rowUser->password;
    
                    if(password_verify($password,$hash_salt)){
    
                        $this->db->insert('log_login',array( //เพิ่ม log login
                            'username_id' => $id,
                            'public_ip' => $public_ip
                        ));
    
                        $authArray= array(
                            'bbp_token' => $username.$rowUser->id.'1191ca348054f9372c4f8a81cf0296e5'
                        );
                        $this->session->set_userdata($authArray);
                        $response = array(
                            'status' => true
                        );
                    }else{
                        $this->db->insert('log_login',array( //เพิ่ม log login
                            'username_id' => $id,
                            'public_ip' => $public_ip,
                            'status' => 2,
                        ));
                        $response = array(
                            'status' => false
                        );
                    }
                   
                }else{
                    $response = array(
                        'status' => false,
                    );
                }
            }
        }else{
            $response = array(
                'status' => false,
            );
        }
        echo json_encode($response);
    }
    
    public function virtual_users($number){
        $request = $_SERVER['REQUEST_METHOD'];
        if(isset($_SESSION['bbp_token'])){
            if($number == 1){
                $query = $this->db->select('
                    virtual_Users.email,
                    virtual_Users.fullname,
                    virtual_Users.department,
                    virtual_Users.status_id
                ')
                ->from('virtual_Users')
                ->get();
                $array = array();
    
                foreach($query->result() as $row){
                    $passBtn = '<button name="change_password" value="'.$row->email.'" class="btn btn-warning btn-sm text-light" title="เปลี่ยนรหัสผ่าน"><i class="fas fa-unlock-alt fa-fw"></i></button>';
                    $delBtn = '<button class="btn btn-danger btn-sm disabled" title="ลบผู้ใช้งาน" ><i class="fas fa-trash fa-fw"></i></button>';
                    $array[] = array(
                        'email' => $row->email,
                        'name' => $row->fullname,
                        'depart' => $row->department,
                        'status' => $row->status_id,
                        'pass' => $passBtn,
                        'del' => $delBtn
                    );
                }
                echo json_encode($array);
            }elseif($number == 2){
                if($request == 'POST'){
                    // insert user
                    $this->db->set('domain_name', 'bicben.com');
                    $this->db->set('email',$_POST['email'].'@bicben.com');
                    $this->db->set('password','TO_BASE64(UNHEX(SHA2("'.$_POST['password'].'", 512)))', FALSE);
                    $this->db->set('fullname',$_POST['name']);
                    $this->db->set('department',$_POST['depart']);
                    $this->db->set('status_id',1);
                    $this->db->insert('virtual_Users');

                    

                    echo json_encode(array('status' => true));
                }else{
                    echo json_encode(array('status' => false));
                }
            }elseif($number == 3){
                if($request == 'POST'){
                    // update user password
                    $this->db->set('password', 'TO_BASE64(UNHEX(SHA2("'.$this->input->post('password').'", 512)))', FALSE);
                    $this->db->where('email', $this->input->post('email'));
                    $this->db->update('virtual_users');

                    echo json_encode(array('status' => true));
                }
            }
        }else{
            echo json_encode(array('status' => false));
        }
    }

    public function system_employee($type){
        if($type == 1){
            $this->db->from('system_employee');
            $this->db->truncate();

            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://110.77.138.65/api/v1/employee.php" );
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, 1); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, 1); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $postResult = curl_exec($ch); 
                
            if (curl_errno($ch)) { 
                echo curl_error($ch); 
            } 
        
            $array = json_decode($postResult,true);

            for($i=0; $i<count($array); $i++){
                $this->db->insert('system_employee',$array[$i]);
            }

            curl_close($ch); 

        }elseif($type == 2){
            $this->db->select('system_employee.name')
            ->from('system_employee');
            if(isset($_GET['term'])){
                $this->db->like('system_employee.name',$_GET['term']);
            }

            $this->db->limit(10);
            $query = $this->db->get();
            $array = array();

            foreach($query->result() as $row){
                $array[] = array(
                    'value' => $row->name,
                );
            }
            echo json_encode($array);
        }elseif($type == 3){
            $this->db->from('system_department');
            $this->db->truncate();

            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://110.77.138.65/api/v1/department1.php" );
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, 1); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, 1); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $postResult = curl_exec($ch); 
                
            if (curl_errno($ch)) { 
                echo curl_error($ch); 
            } 
        
            $array = json_decode($postResult,true);

            for($i=0; $i<count($array); $i++){
                $this->db->insert('system_department',$array[$i]);
            }

            $addStatic = array(
                ['name' => 'โปรแกรมเมอร์'],
                ['name' => 'กราฟฟิค'],
            );

            for($b=0; $b<count($addStatic); $b++){
                $this->db->insert('system_department',$addStatic[$b]);
            }

            curl_close($ch); 
        }
    }

    public function system_department($type){
        if($type == 1){
            $this->db->select('system_department.name')
            ->from('system_department');
            if(isset($_GET['term'])){
                $this->db->like('system_department.name',$_GET['term']);
            }
            $query = $this->db->get();
            $array = array();
            foreach($query->result() as $row){
                $array[] = array(
                    'value' => $row->name,
                );
            }
            echo json_encode($array);
        }
    }
    
}