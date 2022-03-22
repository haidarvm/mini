<?php

namespace Mini\Model;

use Mini\Core\DModel;

class Postc extends DModel {
    public $table = 'wput_posts';
    public $primaryKey = 'ID';

    public function getPost($id) {
        return $this->join('wput_post_id pi', 'pi.post_id = ID')->where('new_id =' . $id)->find();
    }

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
        return $this->join('wput_post_id pi', 'pi.post_id = ID')->where('pi.new_id ='. $id)->find();
    }

    public function getPostc($id) {
        $posts = $this->db->get('posts', ['[>]post_id' => ['ID' => 'post_id']], '*', ['new_id'=> $id]);
        return $posts;
    }

    public function getPostm($id) {
        // $this->db->join('post_id pi', 'pi.post_id=p.ID', 'INNER');
        // $this->db->where('new_id', $id);
        // return $this->db->getOne('posts p');
    }
}
