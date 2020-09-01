<?php
class Modeldata extends CI_Model
{
    public function apply_transform($row){
        $excludeColumns = ['id_test', 'id_train', 'nis', 'nama_siswa', 'prediksi'];
        foreach($row as $key => &$val){
            if(in_array($key, $excludeColumns)){
                unset($row[$key]);
                continue;
            }
            if($key == 'jenkel'){
                $val = $this->transform_rules('jk')($val);
                continue;
            }
            if(substr($key, 0, 5) == 'rapor' || substr($key, 0, 4) == 'usbn'){
                $val = $this->transform_rules('nilai')($val);
                continue;
            }
            if($key == 'minat' || $key == 'kelas'){
                $val = $this->transform_rules('minat')($val);
                continue;
            }
            if($key == 'nilai_iq'){
                $val = $this->transform_rules('iq')($val);
                continue;
            }
        }
        return $row;
    }

    public function transform_rules($type){
        $transform_function = [
            'jk'=> function ($data) {
                return ($data == "L") ? 1 : 2;
            },
            'nilai'=> function ($data) {
                if($data >= 93){
                    return 4;
                } else if($data >= 84){
                    return 3;
                } else if($data >= 75){
                    return 2;
                } else {
                    return 1;
                }
            },
            'minat'=> function ($data) {
                return ($data == "MIPA") ? 1 : 2;
            },
            'iq'=> function ($data) {
                if($data >= 140){
                    return 1;
                } else if($data >= 120){
                    return 2;
                } else if($data >= 110){
                    return 3;
                } else if($data >= 90){
                    return 4;
                } else if($data >= 80){
                    return 5;
                } else if($data >= 70){
                    return 6;
                } else {
                    return 7;
                }
            }
        ];

        return $transform_function[$type];
    }
}