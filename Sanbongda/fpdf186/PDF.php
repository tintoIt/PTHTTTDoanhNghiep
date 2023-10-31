<?php 

require 'C:\xampp\htdocs\BaocaoWeb\fpdf186\fpdf.php';

class PDF extends FPDF {
    function AddFont($family, $style = '', $file = '', $dir = '') {
        $fontkey = strtolower($family) . $style;
        if(isset($this->fonts[$fontkey]))
            return;

        // Thêm điều kiện cho tên font SFUFuturaHeavy và tệp font SFUFuturaHeavy.TTF
        if($family == 'SFUFuturaHeavy') {
            $file = 'SFUFuturaHeavy.ttf';
        }

        $info = $this->MakeFont($file, $style, $this->uni);
        if(!$info) {
            $this->Error('Could not include font definition file');
        }
        $info['i'] = count($this->fonts) + 1;
        if(empty($info['type'])) {
            $info['type'] = 'TrueType';
        }
        if(!empty($info['diff'])) {
            $info['diff'] = implode(',', $info['diff']);
        }
        $this->FontFiles[$info['file']] = array('length1'=>$info['originalsize']);
        $this->fonts[$fontkey] = $info;
    }
}




?>