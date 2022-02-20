<?php

namespace Mini\Model;
use Mini\Core\HiModel;

class Posts extends HiModel {

    public $table = 'wput_posts';
	public $primaryKey = 'ID';


    public function getPost($id) {
        return $this->join('wput_post_id pi', 'pi.post_id = wput_posts.ID')
        ->where("new_id =".$id)->find();
    }

    public function getPosts($id) {
        $posts = $this->db->table('wput_posts');
        return $posts->join('wput_post_id', 'post_id', '=' ,'ID')->where("new_id" ,'=',$id)->get();
    }


    public function getPostm($id) {
        // $this->db->join('post_id pi', 'pi.post_id=p.ID', 'INNER');
        // $this->db->where('new_id', $id);
        // return $this->db->getOne('posts p');
    }
}
