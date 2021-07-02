<?php 

function hancurkan()
{
    $ci =& get_instance();
    $user = [
        'ud' => $ci->session->userdata('ud'),
        'user' => $ci->session->userdata('user'),
        'level' => $ci->session->userdata('level'),
        'nama' => $ci->session->userdata('nama')
    ];
    // $ci->session->sess_destroy();

    // $ci->session->set_userdata($user);

    foreach ($ci->session->userdata() as $key => $ses) {
        if ($key != 'ud' && $key != 'user' && $key != 'level' && $key != 'nama') {
            $ci->session->unset_userdata($key);
        }
    }
}

function sudah_login(){
	$ci =& get_instance();
	$sesi_user = $ci->session->userdata('ud');
	if ($sesi_user) {
		redirect('admin');
	}
}

function belum_login(){
	$ci =& get_instance();
	$sesi_user = $ci->session->userdata('ud');
	if (!$sesi_user) {
		redirect('login');
	}
}

function rupiah($v)
{
	return "Rp. ".number_format($v, 0, ",", ".");
}

if (!function_exists('format_indo')) {
  function format_indo($date){
    date_default_timezone_set('Asia/Jakarta');
    // array hari dan bulan
    $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w",strtotime($date));
    $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun;

    return $result;
  }
}

if (!function_exists('format_indo2')) {
  function format_indo2($date){
    date_default_timezone_set('Asia/Jakarta');
    // array hari dan bulan
    $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w",strtotime($date));
    $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." WIB";

    return $result;
  }
}



function rep($id=null)
{
    return strtolower(str_replace(" ","-", $id));
}
function rep2($id=null)
{
    return strtolower(str_replace("/","", $id));
    return strtolower(str_replace("-","", $id));
    return strtolower(str_replace("_","", $id));
    return strtolower(str_replace("|","", $id));
    return strtolower(str_replace(",","", $id));
    return strtolower(str_replace(".","", $id));
    return strtolower(str_replace("(","", $id));
    return strtolower(str_replace(")","", $id));
    return strtolower(str_replace("{","", $id));
    return strtolower(str_replace("}","", $id));
    return strtolower(str_replace("[","", $id));
    return strtolower(str_replace("]","", $id));
}

function unrep($id=null)
{
    return strtoupper(str_replace("-"," ", $id));
}

function waktu($id=null)
{
    $ampm = explode(" ", $id);
    $pecah = explode(":", $ampm[0]);
    $jam = $pecah[0];
    $menit = $pecah[1];
    $jadi = [
        '1' => '13',
        '2' => '14',
        '3' => '15',
        '4' => '16',
        '5' => '17',
        '6' => '18',
        '7' => '19',
        '8' => '20',
        '9' => '21',
        '10' => '22',
        '11' => '23',
        '12' => '00',
    ];
    if ($ampm[1] == 'pm') {
        return $jadi[$jam].":".$menit;
    }else{
        return $id;
    }
}

