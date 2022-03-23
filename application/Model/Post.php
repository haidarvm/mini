<?php

namespace Mini\Model;

use Mini\Core\HiModel;

class Post extends HiModel {
    public $table = 'post_data';
    public $primaryKey = 'id';

    public function getPost($id) {
        return $this->where('id =' . $id)->find();
    }


    public function insertPost($data){ 
        $this->body = $data;
        return $this->insert();
    }

    public function getPostm($id) {
        // $this->db->join('post_id pi', 'pi.post_id=p.ID', 'INNER');
        // $this->db->where('new_id', $id);
        // return $this->db->getOne('posts p');
    }
}
