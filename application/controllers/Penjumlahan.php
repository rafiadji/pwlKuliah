<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjumlahan extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function jumlah($a, $b)
	{
		$c = $a+$b;
		echo $a . " + " . $b . " = " . $c;
	}
	
	public function pitagoras($a, $b)
	{
		$c = pow($a, 2) + pow($b, 2);
		echo "a adalah tinggi segitiga <br> b adalah alas segitiga <br>";
		echo "pitagoras dari a = " . $a . " dan b = " . $b . " adalah " . sqrt($c);
	}
	
	public function nilaiakhir($tugas, $uts, $uas)
	{
		$tugas = ($tugas * 20) / 100;
		$uts = ($uts * 30) / 100;
		$uas = ($uas * 50) / 100;
		$total = $tugas + $uts + $uas;
		if ($total >= 85) {
			$akhir = "A";
		}
		elseif ($total >= 75) {
			$akhir = "B+";
		}
		elseif ($total >= 70) {
			$akhir = "B";
		}
		elseif ($total >= 65) {
			$akhir = "C+";
		}
		elseif ($total >= 60) {
			$akhir = "C";
		}
		elseif ($total >= 55) {
			$akhir = "D";
		}
		else{
			$akhir = "E";
		}
		echo "Nilai akhir => " . $total . " dengan indeks => " . $akhir;
	}
	
	public function habisdibagi($a)
	{
		$hasil = 0;
		for ($i=1; $i < $a ; $i++) { 
			if($i%3 == 0 || $i%4 == 0){
				$hasil += $i;
			}
		}
		echo $hasil;
	}
	
	public function fibonaci($a)
	{
		$awal = 1;
		$akhir = 2;
		$hasil = 0;
		for ($i=1; $i <= $a ; $i++) {
			if ($awal%2 == 0) {
				$hasil += $awal;
				echo $awal . " ";
			} 
			$tempakhir = $awal + $akhir;
			$awal = $akhir;
			$akhir = $tempakhir;
		}
		echo "<br> Hasil = " . $hasil;
	}
}
