<?php
class corona{
    public function getApiGlobal(){
        $url = "https://api.kawalcorona.com/";
        $data = file_get_contents($url);
        return json_decode($data,true);
    }
    
    public function getApiIndonesia(){
        $url = "https://api.kawalcorona.com/indonesia";
        $data = file_get_contents($url);
        return json_decode($data,true);
    }

    public function getTotalPositive(){
        $url = "https://api.kawalcorona.com/positif";
        $data = file_get_contents($url);
        return json_decode($data,true);
    }

    public function getTotalRecovered(){
        $url = "https://api.kawalcorona.com/sembuh";
        $data = file_get_contents($url);
        return json_decode($data,true);
    }

    public function getTotalDeaths(){
        $url = "https://api.kawalcorona.com/meninggal";
        $data = file_get_contents($url);
        return json_decode($data,true);
    }
}
?>