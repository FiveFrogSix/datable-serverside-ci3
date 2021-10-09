<?php 

public function serverside(){
    header('Access-Control-Allow-Origin: *');

    $request=$_REQUEST;
    $_order = $this->input->get('order');

    $col =array(
        0   =>  'id',
        1   =>  'name',
        2   =>  'department',
        3   =>  'salary'
    );  
    
   

    $this->db->start_cache();
    $this->db->select('
        id,
        name,
        department,
        salary
    ');
    $this->db->from('test');
    $this->db->like('name',$request['search']['value'],'right');
    $this->db->or_like('department',$request['search']['value'],'right');
    if(intval($request['search']['value'])){
        $this->db->or_where('salary >=',$request['search']['value'],'right');
    }
    
    $query = $this->db->get();

    $totalData= $query->num_rows();
    $totalFilter=$totalData;
    
    if(isset($_order) && $_order!=NULL){
        // จัดรูปแบบการจัดเรียงข้อมูลจากค่าที่ส่งมา
        $_orderColumn = $_order['0']['column'];
        $_orderSort = $_order['0']['dir'];
        $this->db->order_by($col[$_orderColumn+1], $_orderSort);
    }else{ 
        $order = array('id' => 'asc');
        $this->db->order_by(key($order), $order[key($order)]);            
    }
    
    $this->db->limit($request['length'],$request['start']);
    $query = $this->db->get();
    $this->db->flush_cache();



    $data = array();

    foreach($query->result() as $row){
        $data[] = array(
            'id' => $row->id,
            'name' => $row->name,
            'depart' => $row->department,
            'salary' => $row->salary
        );
    }
    


    $json_data =array(
        "draw"              =>  intval($request['draw']),
        "recordsTotal"      =>  intval($totalData),
        "recordsFiltered"   =>  intval($totalFilter),
        "data"              =>  $data
    );

    echo json_encode($json_data);


}