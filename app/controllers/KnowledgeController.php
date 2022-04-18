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
    public function content($ma_bai_viet){
        $content = Content::find($ma_bai_viet);
          
        return view('knowledge.content',[
            'content' => $content,
        ]
        );
    }
}
?>