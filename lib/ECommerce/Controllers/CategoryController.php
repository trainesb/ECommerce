<?php


namespace ECommerce\Controllers;


use ECommerce\Site;
use ECommerce\Tables\SubCategories;
use ECommerce\Tables\TopCategories;
use ECommerce\Tables\TopSubMaps;

class CategoryController extends Controller {

    private $files;
    private $post;

    public function __construct(Site $site, $post, $files) {
        parent::__construct($site);
        $this->files = $files;
        $this->post = $post;

        $visible = $post['visible'];
        $name = $post['name'];
        $description = $post['description'];

        $img = "";
        if(!empty($files) && $this->uploadImg()) {
            $img = "dist/img/categories/".$this->post['type']."/" . basename($this->files["file"]["name"]);
        }

        if($post['type'] === 'top') {

            $top = new TopCategories($site);

            if($top->add($name, $description, $visible, $img)) {
                $this->result = json_encode(["ok" => true]);
            } else {
                $this->result = json_encode(["ok" => false, "message" => "Failed to add Category!"]);
            }
        } else {
            $sub = new SubCategories($site);

            if($sub->add($name, $description, $visible, $img)) {

                $topSub = new TopSubMaps($site);
                $top_id = $post['parentID'];
                $sub_id = $sub->getIdByName($name)['id'];

                if ($topSub->add($top_id, $sub_id)) {
                    $this->result = json_encode(["ok" => true]);
                } else {
                    $this->result = json_encode(["ok" => false, "message" => "Failed to add category map"]);
                }
            } else {
                $this->result = json_encode(["ok" => false, "message" => "Failed to add Category!"]);
            }
        }
    }

    public function uploadImg() {
        $target_dir = dirname(__FILE__)."/../../../dist/img/categories/".$this->post['type']."/";
        $target_file = $target_dir . basename($this->files["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an image or fake
        if(!$this->validateImg()) {
            $this->result = json_encode(["ok" => false, "message" => "File isn't an img!"]);
            return false;
        }

        // Check if file already exists
        if(file_exists($target_file)) {
            $this->result = json_encode(["ok" => false, "message" => "File already exists!"]);
            return false;
        }

        // Check file size
        if($this->files["file"]["size"] > 5000000) {
            $this->result = json_encode(["ok" => false, "message" => "File is to large!"]);
            return false;
        }

        //Allow certain file types
        $allowedTypes = array("jpg", "png", "jpeg", "gif");
        if(!in_array($imageFileType, $allowedTypes)) {
            $this->result = json_encode(["ok" => false, "message" => "Only JPG, JPEG, PNG & GIF allowed!"]);
            return false;
        }

        // Try to upload file
        if(!move_uploaded_file($this->files["file"]["tmp_name"], $target_file)) {
            $this->result = json_encode(["ok" => false, "message" => "Error during file upload!"]);
            return false;
        }
        return true;
    }

    public function validateImg() {

        if(isset($this->post)) {
            $check = getimagesize($this->files["file"]["tmp_name"]);
            if($check !== false) {
                return true;
            }
        }
        return false;
    }
}
