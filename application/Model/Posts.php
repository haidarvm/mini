<?php

namespace Mini\Model;


use Mini\Core\HiModel;

class Posts extends HiModel {
    public $table = 'wput_posts';
    protected $tb_post_d = 'wput_post_id';
    public $primaryKey = 'ID';

    public function getPostOne($id) {
        $data = $this->eq('ID' , $id)->find();
        return $data;
    }

    public function getPostIdd($id) {
        return $this->join('wput_post_id pi', 'pi.post_id = wput_posts.ID')
        ->where('new_id =' . $id)->find();
    }

    public function getPosts($id) {
        // $posts = $this->db->table('wput_posts');
        return $this->join($this->tb_post_d.' pi', 'pi.post_id = ID')->where('pi.new_id ='. $id)->find();
    }

   
}
