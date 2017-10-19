<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_3 extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function grade($tgs, $uts, $uas)
	{
		$tgs = ($tgs*20)/100;
		$uts = ($uts*30)/100;
		$uas = ($uas*50)/100;
		$total = $tgs + $uts + $uas;
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
		
		return $akhir;
	}
	
	public function ipk($datarr)
	{
		$datret = array();
		$thn_msk = 2015;
		$smt = 0;
		$sks = 0;
		$jumip = 0;
		for ($i=1; $i <= 8 ; $i++) {
			$datret[$i] = ""; 
			$sks = 0;
			$jumip = 0;
			foreach ($datarr as $row) {
				if($row->thn == $thn_msk){
					if($row->smt == "ganjil"){
						$smt = 1;
					}
				}
				elseif (($row->thn-1) == $thn_msk){
					if($row->smt == "genap"){
						$smt = 2;
					}else{
						$smt = 3;
					}
				}
				elseif (($row->thn-2) == $thn_msk){
					if($row->smt == "genap"){
						$smt = 4;
					}else{
						$smt = 5;
					}
				}
				elseif (($row->thn-3) == $thn_msk){
					if($row->smt == "genap"){
						$smt = 6;
					}else{
						$smt = 7;
					}
				}
				elseif (($row->thn-4) == $thn_msk){
					if($row->smt == "genap"){
						$smt = 8;
					}
				}
				if($smt == $i){
					$n = $row->nilai;
					if ($n == "A") {
						$ip = 4;
					}
					elseif ($n == "B+") {
						$ip = 3.5;
					}
					elseif ($n == "B") {
						$ip = 3;
					}
					elseif ($n == "C+") {
						$ip = 2.5;
					}
					elseif ($n == "C") {
						$ip = 2;
					}
					elseif ($n == "D") {
						$ip = 1;
					}
					elseif ($n == "E") {
						$ip = 0;
					}
					$sks += $row->sks;
					$jumip += $row->sks * $ip;
				}
			}
			if (!empty($jumip) && !empty($sks)){
				$datret[$i] = round(($jumip/$sks), 2);
			}
		}
		return $datret;
	}
}