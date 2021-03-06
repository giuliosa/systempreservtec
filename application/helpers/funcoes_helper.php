﻿<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function limpar($string){
	$table = array(
        '/'=>'', '('=>'', ')'=>'',
    );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
	$string= preg_replace('/[,.;:`´^~\'"]/', null, iconv('UTF-8','ASCII//TRANSLIT',$string));
	$string= strtolower($string);
	$string= str_replace(" ", "-", $string);
	$string= str_replace("---", "-", $string);
	return $string;
}

function mostrarMes($value){
 	if ($value == 1) {
 		$string = 'Janeiro';
 	}
 	if ($value == 2) {
 		$string = 'Fevereiro';
 	}
 	if ($value == 3) {
 		$string = 'Março';
 	}
 	if ($value == 4) {
 		$string = 'Abril';
 	}
 	if ($value == 5) {
 		$string = 'Maio';
 	}
 	if ($value == 6) {
 		$string = 'Junho';
 	}
 	if ($value == 7) {
 		$string = 'Julho';
 	}
 	if ($value == 8) {
 		$string = 'Agosto';
 	}
 	if ($value == 9) {
 		$string = 'Setembro';
 	}
 	if ($value == 10) {
 		$string = 'Outubro';
 	}
 	if ($value == 11) {
 		$string = 'Novembro';
 	}
 	if ($value == 12) {
 		$string = 'Dezembro';
 	}

	return $string;
}

function remover_caracter($string)
{
	// matriz de entrada
	$what = array('ä', 'ã', 'à', 'á', 'â', 'ê', 'ë', 'è', 'é', 'ï', 'ì', 'í', 'ö', 'õ', 'ò', 'ó', 'ô', 'ü', 'ù', 'ú', 'û', 'À', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ', 'ç', 'Ç', ' ', '-', '(', ')', ',', ';', ':', '|', '!', '"', '#', '$', '%', '&', '/', '=', '?', '~', '^', '>', '<', 'ª', 'º');

    // matriz de saída
	$by = array('a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'A', 'A', 'E', 'I', 'O', 'U', 'n', 'n', 'c', 'C', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_');

    // devolver a string
	return str_replace($what, $by, $string);
}

// function postadoem($string){
//
//     $dia_sem= date('w', strtotime($string));
//
//     if($dia_sem == 0){
//     $semana = "Domingo";
//     }elseif($dia_sem == 1){
//     $semana = "Segunda-feira";
//     }elseif($dia_sem == 2){
//     $semana = "Terça-feira";
//     }elseif($dia_sem == 3){
//     $semana = "Quarta-feira";
//     }elseif($dia_sem == 4){
//     $semana = "Quinta-feira";
//     }elseif($dia_sem == 5){
//     $semana = "Sexta-feira";
//     }else{
//     $semana = "Sábado";
//     }
//
//  	$dia= date('d', strtotime($string));
//
// 	$mes_num = date('m', strtotime($string));
//  	if($mes_num == 01){
//     $mes= "Janeiro";
//     }elseif($mes_num == 02){
//     $mes = "Fevereiro";
//     }elseif($mes_num == 03){
//     $mes = "Março";
//     }elseif($mes_num == 04){
//     $mes = "Abril";
//     }elseif($mes_num == 05){
//     $mes = "Maio";
//     }elseif($mes_num == 06){
//     $mes = "Junho";
//     }elseif($mes_num == 07){
//     $mes = "Julho";
//     }elseif($mes_num == 08){
//     $mes = "Agosto";
//     }elseif($mes_num == 09){
//     $mes = "Setembro";
//     }elseif($mes_num == 10){
//     $mes = "Outubro";
//     }elseif($mes_num == 11){
//     $mes = "Novembro";
//     }else{
//     $mes = "Dezembro";
//     }
//
//     $ano = date('Y', strtotime($string));
//     $hora = date('H:i', strtotime($string));
//
//     return $semana.', '.$dia.' de '.$mes.' de '.$ano.' '.$hora;
// }
