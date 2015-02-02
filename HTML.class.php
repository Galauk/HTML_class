<?php
class HTML{
    public $head;
    public $body = null;
    function show(){
        if ($this->head) {
            echo "<head>";
            echo $this->head;
            echo "</head>";
            $this->head = null;
        }
        if ($this->body) {
            echo $this->body;
            $this->body = null;
        }
    }
    function add($content){
        $this->body .= $content;
    }
    private function append($content,$type=null){
        if($type == "head"){
            $this->head .= $content;
        }
        if($type == "body"){
            $this->body .= $content;
        }
    }
    function title($titulo){
        $x = "<title>";
        $x .= $titulo;
        $x .= "</title>";
        $this->append($x,"head");
    }
    function java($script=""){
        $x = "<script>";
        $x .= $script;
        $x .= "</script>";
        $this->append($x,"head");
    }
    function css($style=""){
        $x = "<style>";
        $x .= $style;
        $x .= "</style>";
        $this->append($x,"head");
    }
    function loadJava($file=null){
        $x = "<script src='".$file."'>";
        $x .= "</script>";
        $this->append($x,"head");
    }
    function loadCss($file=null){
        $x = "<link href='".$file."' rel='stylesheet' type='text/css'>";
        $x .= "</link>";
        $this->append($x,"head");
    }
    function icon($file=null){
        $x = "<link rel='shortcut icon' href='".$file."'>";

        $this->append($x,"head");
    }
    function div($content,$atrib=null){
        $x = "<div";
        foreach($atrib as $key => $value){
            $x .= " ".$key."='".$value."'";
        }
        $x .= ">";
        $x .= $content;
        $x .= "</div>";
        return $x;
    }
    function openDiv($atrib=null){
        $x = "<div";
        foreach($atrib as $key => $value){
            $x .= " ".$key."='".$value."'";
        }
        $x .= ">";
        return $x;
    }
    function closeDiv(){
        $x = "</div>";
        return $x;
    }
    function label($content,$atrib=null){
        $x = "<label";
        foreach($atrib as $key => $value){
            $x .= " ".$key."='".$value."'";
        }
        $x .= ">";
        $x .= $content;
        $x .= "</label>";
        return $x;
    }
    function form($content,$action="",$method="post",$enctype="multipart/form-data"){
        $x = "<form";
        $x .= " action='".$action."'";
        $x .= " method='".$method."'";
        $x .= " enctype='".$enctype."'";
        $x .= ">";
        $x .= $content;
        $x .= "</form>";
        return $x;
    }
    function openForm($action="",$method="post",$name=null,$class=null,$enctype="multipart/form-data"){
        $x = "<form";
        $x .= " action='".$action."'";
        $x .= " method='".$method."'";
        if($name){
            $x .= " name='".$name."'";
        }
        if($class){
            $x .= " class='".$class."'";
        }
        $x .= " enctype='".$enctype."'";
        $x .= ">";
        return $x;
    }
    function closeForm(){
        $x = "</form>";
        return $x;
    }
    function linha($atrib=null){
        $x = "<hr";
        foreach($atrib as $key => $value) {
            $x .= " ".$key."='".$value."'";
        }
        $x.= ">";
        return $x;
    }
    function listArray($array,$atrib=null){
        $x = "<ul";
        foreach($atrib as $key => $value){
            $x .= " ".$key."='".$value."'";
        }
        $x .= ">";
        foreach ($array as $value){
            $x .= "<li>";
            $x .= $value;
            $x .= "</li>";
        }
        $x .= "</ul>";
        return $x;
    }
    function listItem($array,$atrib=null){
        $x = "<ul";
        $x .= ">";
        foreach ($array as $key => $value){
            $x .= "<li";
            foreach($atrib as $key2 => $value2){
                $x .= " ".$key2."='".$value2."'";
            }
            $x .= ">";
            $x .= $value;
            $x .= "</li>";
        }
        $x .= "</ul>";
        return $x;
    }
    function listaTabela($array,$atrib=null){
        $x = "<ul";
        foreach ($atrib as $key => $value) {
            $x .= " ".$key."='".$value."'";
        }
        $x .= ">";
        $i = 0;
        foreach ($array as $key => $value){
            $x .= "<li";
            if($i%2 == 0){
                $x .= " class='line1'";
            }else{
                $x .= " class='line2'";
            }
            $x .= ">";
            $x .= $value;
            $x .= "</li>";
            $i++;
        }

        $x .= "</ul>";
        return $x;
    }

    function input($type,$name=null,$atrib=null){
        $x = "<input";
        $x .= " type='".$type."'";
        if($name){
            $x .= " name='".$name."'";
        }
        foreach($atrib as $key => $value){
            $x .= " ".$key."='".$value."'";
        }
        $x .= ">";
        return $x;
    }
    function select($array,$name=null,$atrib=null){
        $x = "<select";
        if($name){
            $x .= " name='".$name."'";
        }
        foreach($atrib as $key => $value){
            $x .= " ".$key."='".$value."'";
        }
        $x .= ">";
        foreach ($array as $key => $value){
            $x .= "<option value=".$key.">".$value."</option>";
        }
        $x .= "</select>";
        return $x;
    }
    function textarea($content='',$name=null,$atrib=null){
        $x = "<textarea";
        if($name){
            $x .= " name='".$name."'";
        }
        foreach($atrib as $key => $value){
            $x .= " ".$key."='".$value."'";
        }
        $x .= ">";
        $x .= $content;
        $x .= "</textarea>";
        return $x;
    }
    function img($src,$atrib=null){
        $x = "<img";
        foreach($atrib as $key => $value ){
            $x .= " ".$key."='".$value."'";
        }
        $x .= " src='".$src."'>";
        return $x;
    }
    function link($content,$href="#",$atrib=null){
        $x = "<a";
        $x.= " href='".$href."'";
        foreach($atrib as $key => $value){
            $x.= " ".$key."='".$value."'";
        }
        $x .= ">";
        $x .= $content;
        $x .= "</a>";
        return $x;
    }
    function quebra(){
        $x = "<br>";
        return $x;
    }
}
?>