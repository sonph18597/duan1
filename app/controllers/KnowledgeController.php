<?php
namespace App\Controllers;

use App\Models\Content;
use App\Models\Fish;

class KnowledgeController{
    public function index(){
        $content = Content::all();
        return view('knowledge.index',[
            'content' => $content,
        ]
        );
    }
}
?>