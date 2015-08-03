<?php
use backend\models\Catalogo;

$this->title = 'Reporte Id '.$model->ID_LISTA.'   DC4 parte 1 ';
?>
<head profile="http://dublincore.org/documents/dcmi-terms/">
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
		<title xml:lang="en-US">- no title specified</title>
		<meta name="DCTERMS.title" content="" xml:lang="en-US"/>
		<meta name="DCTERMS.language" content="en-US" scheme="DCTERMS.RFC4646"/>
		<meta name="DCTERMS.source" content="http://xml.openoffice.org/odf2xhtml"/>
		<meta name="DCTERMS.creator" content="DGC"/>
		<meta name="DCTERMS.issued" content="2013-09-12T12:33:00" scheme="DCTERMS.W3CDTF"/>
		<meta name="DCTERMS.contributor" content="caleb.nunez"/>
		<meta name="DCTERMS.modified" content="2013-09-12T12:33:00" scheme="DCTERMS.W3CDTF"/>
		<meta name="DCTERMS.provenance" content="" xml:lang="en-US"/>
		<meta name="DCTERMS.subject" content="," xml:lang="en-US"/>
		<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" hreflang="en"/>
		<link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" hreflang="en"/>
		<link rel="schema.DCTYPE" href="http://purl.org/dc/dcmitype/" hreflang="en"/>
		<link rel="schema.DCAM" href="http://purl.org/dc/dcam/" hreflang="en"/>
		<style type="text/css">
	@page {  }
	table { border-collapse:collapse; border-spacing:0; empty-cells:show }
	td, th { vertical-align:top; font-size:12pt;}
	h1, h2, h3, h4, h5, h6 { clear:both }
	ol, ul { margin:0; padding:0;}
	li { list-style: none; margin:0; padding:0;}
			<!-- "li span.odfLiEnd" - IE 7 issue-->
	li span. { clear: both; line-height:0; width:0; height:0; margin:0; padding:0; }
	span.footnodeNumber { padding-right:1em; }
	span.annotation_style_by_filter { font-size:95%; font-family:Arial; background-color:#fff000;  margin:0; border:0; padding:0;  }
	* { margin:0;}
	.fr1 { font-size:12pt; font-family:Liberation Serif; vertical-align:top; writing-mode:lr-tb; margin-left:0.319cm; margin-right:0.319cm; padding:0.002cm; border-style:none; }
	.Heading_20_2 { font-size:12pt; font-family:Arial; writing-mode:lr-tb; text-align:center ! important; color:#ffffff; font-weight:bold; }
	.Heading_20_5 { font-size:11pt; font-family:Arial; writing-mode:lr-tb; text-align:center ! important; color:#ffffff; font-weight:bold; }
	.P1 { font-size:9pt; text-align:center ! important; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P10 { font-size:2pt; font-family:Arial Narrow; writing-mode:lr-tb; text-align:center ! important; }
	.P11 { font-size:2pt; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P12 { font-size:3pt; font-family:Arial Narrow; writing-mode:lr-tb; text-align:center ! important; }
	.P13 { font-size:10pt; font-family:Arial Narrow; writing-mode:lr-tb; text-align:center ! important; }
	.P14 { font-size:10pt; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P15 { font-size:10pt; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P16 { font-size:10pt; font-family:Arial Narrow; writing-mode:lr-tb; text-align:center ! important; }
	.P17 { font-size:10pt; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P18 { font-size:10pt; font-family:Arial Narrow; writing-mode:lr-tb; font-weight:bold; }
	.P19 { font-size:12pt; font-family:Arial Narrow; writing-mode:lr-tb; text-align:center ! important; }
	.P2 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P20 { font-size:6pt; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P21 { font-size:12pt; font-family:Times New Roman; writing-mode:lr-tb; text-align:center ! important; }
	.P22 { font-size:9pt; font-family:Arial; writing-mode:lr-tb; text-align:center ! important; }
	.P23 { font-size:9pt; font-family:Arial; writing-mode:lr-tb; }
	.P24 { font-size:10pt; font-family:Arial; writing-mode:lr-tb; text-align:center ! important; }
	.P25 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:-0.118cm; margin-right:0cm; text-align:center ! important; text-indent:0cm; }
	.P26 { font-size:12pt; font-family:Times New Roman; writing-mode:lr-tb; margin-left:-0.31cm; margin-right:0cm; text-indent:0.31cm; }
	.P27 { font-size:8pt; font-family:Times New Roman; writing-mode:lr-tb; margin-left:0cm; margin-right:0cm; text-indent:-2.223cm; }
	.P27_1 { font-size:5pt; font-family:Times New Roman; writing-mode:lr-tb; margin-left:0cm; margin-right:0cm; text-indent:-2.223cm; }
	.P28 { font-size:5pt; font-family:Times New Roman; writing-mode:lr-tb; margin-left:0cm; margin-right:0cm; text-indent:-2.223cm; }
	.P29 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:0cm; margin-right:-0.069cm; text-indent:0cm; }
	.P3 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; text-align:center ! important; }
	.P30 { font-size:12pt; font-family:Times New Roman; writing-mode:lr-tb;  margin-right:0cm; text-indent:0cm; }
	.P31 { font-size:8pt; font-family:Arial Narrow; writing-mode:lr-tb;  margin-right:0cm; text-indent:0cm; }
	.P32 { font-size:7.5pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:-1.905cm; margin-right:0cm; text-indent:0cm; }
	.P33 { font-size:12pt; font-family:Times New Roman; writing-mode:lr-tb; margin-right:0cm; text-indent:-0.404cm; }
	.P34 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-right:0cm; text-align:right ! important; text-indent:0cm; }
	.P35 { font-size:9.5pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:-2.223cm; margin-right:0cm; text-align:center ! important; text-indent:0cm; }
	.P36 { font-size:7.5pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:-2.223cm; margin-right:0cm; text-indent:0.318cm; }
	.P37 { font-size:7.5pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:-2.223cm; margin-right:0cm; text-indent:0.318cm; }
	.P38 { font-size:9.5pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:-2.223cm; margin-right:0cm; text-align:right ! important; text-indent:0.318cm; }
	.P39 { font-size:10pt; font-weight:bold; text-align:center ! important; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P4 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P40 { color:#ffffff; font-size:13pt; font-weight:bold; text-align:center ! important; font-family:Arial; writing-mode:lr-tb; }
	.P41 { font-size:12pt; margin-bottom:0cm; margin-top:0cm; font-family:Times New Roman; vertical-align:top; writing-mode:lr-tb; }
	.P42 { font-size:12pt; margin-bottom:0cm; margin-top:0cm; font-family:Times New Roman; vertical-align:top; writing-mode:lr-tb; }
	.P43 { font-size:12pt; margin-bottom:0cm; margin-top:0cm; font-family:Times New Roman; vertical-align:top; writing-mode:lr-tb; text-align:center ! important; }
	.P44 { font-size:9pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial; vertical-align:top; writing-mode:lr-tb; text-align:center ! important; font-weight:bold; }
	.P45 { font-size:9pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial; vertical-align:top; writing-mode:lr-tb; text-align:center ! important; font-weight:bold; }
	.P46 { font-size:8pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial; vertical-align:top; writing-mode:lr-tb; text-align:center ! important; font-weight:bold; }
	.P47 { font-size:2pt; margin-bottom:0cm; margin-top:0cm; font-family:Times New Roman; vertical-align:top; writing-mode:lr-tb; }
	.P48 { font-size:9pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; vertical-align:top; writing-mode:lr-tb; }
	.P49 { font-size:10pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P5 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; text-align:center ! important; }
	.P50 { font-size:9pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P51 { font-size:9pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb; line-height:115%; }
	.P52 { font-size:9pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb; line-height:115%; }
	.P6 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P7 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; text-align:center ! important; }
	.P8 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; text-align:justify ! important; }
	.P9 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; text-align:justify ! important; }
	.Standard { font-size:12pt; font-family:Times New Roman; writing-mode:lr-tb; }
	.Tabla1 { width:19.666cm;  margin-right:auto;writing-mode:lr-tb; }
	.Tabla2 { width:19.685cm;  margin-right:auto;writing-mode:lr-tb; }
	.Tabla3 { width:19.711cm;  margin-right:auto;writing-mode:lr-tb; }
	.Tabla4 { width:19.683cm;  margin-right:auto;writing-mode:lr-tb; }
	.Tabla1_A1 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-style:none; writing-mode:lr-tb; }
	.Tabla1_B1 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-style:none; writing-mode:lr-tb; }
	.Tabla2_A1 { vertical-align:middle; background-color:#000000; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-width:0.0265cm; border-style:solid; border-color:#000000; writing-mode:lr-tb; }
	.Tabla2_A10 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_A11 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_A12 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_A122 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-right-width:0.0265cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-color:#000000; border-right-style:solid; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_A13 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_A14 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_A14_1 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm;border-right-width:0.0176cm; border-bottom-width:0.0176cm; border-left-style:solid; border-right-color:#000000; border-bottom-color:#000000; border-left-color:#000000; border-right-style:solid; border-top-style:none; border-bottom-style:solid; writing-mode:lr-tb; }
	.Tabla2_A15 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_A2 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_A3 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_A4 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_A5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_A6 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_A7 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_A8 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0.2cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:none; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_A8_BT { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0.2cm; border-left-width:0.0265cm; border-left-style:none; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:none; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_A8_BTR { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0.2cm; border-left-width:0.0265cm; border-left-style:none; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_A9 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_A99 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none;   writing-mode:lr-tb; }
	
	.Tabla2_B11 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_B5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_C11 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_C5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_D11 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_D5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_E5 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_F11 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_G5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_H10 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_H11 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_I5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_J5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_K5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_L5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_M5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_N5 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_O5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_P5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_Q10 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_Q11 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_Q12 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_Q13 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_Q14 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_Q15 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_Q16 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_Q9 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_R5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_S4 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_S5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_T5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_U5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_V9 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_W5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_X5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_Y5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_Y9 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_Z5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_a5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_b5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_c5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_d5 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_e5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_A1 { vertical-align:middle; background-color:#000000; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0529cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_A10 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_A11 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	
	.Tabla3_A111 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none;  border-right-width:0.0cm; border-right-style:none; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	
	.Tabla3_A12 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_A13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_A14 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_A2 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_A3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_A4 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_A5 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_A6 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_A7 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_A8 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_A9 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_B4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_C4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_D4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_E13 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_F4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_G4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_H7 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_I4 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_J2 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_J3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_J4 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_K4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_L4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_M4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_N13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-style:none; writing-mode:lr-tb; }
	.Tabla3_N4 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_O12 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_O13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_O14 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_P2 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_P3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_P4 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_Q13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_R13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_S13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_T2 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_T3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_T4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_U12 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_U13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_U14 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_V4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_W13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_W7 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_X4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_Y12 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_Y13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_Y14 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_Z13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_Z4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_a2 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-style:none; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_b12 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_b13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_b14 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_b3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_b4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_c4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_d2 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-style:none; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_d3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla3_d4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla3_e4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla4_A1 { vertical-align:middle; background-color:#000000; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-width:0.0176cm; border-style:solid; border-color:#000000; writing-mode:lr-tb; }
	.Tabla4_A10 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A11 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A12 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A14 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A15 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A16 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A17 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A18 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A19 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A2 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0176cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla4_A20 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A21 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A22 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A23 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A24 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A25 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A26 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A27 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A28 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A29 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0.1cm; padding-bottom:0.1cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A30 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A31 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla4_A4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A6 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A7 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A8 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_A9 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B10 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B11 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B12 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B14 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B15 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B16 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B17 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B18 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B19 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B2 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0176cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla4_B20 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B21 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B22 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B23 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B24 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B25 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B26 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B27 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B28 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B29 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0.1cm; padding-bottom:0.1cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B30 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B31 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla4_B4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B6 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B7 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B8 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_B9 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C10 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C11 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C12 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C14 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C15 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C16 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C17 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C18 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C19 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C2 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0176cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla4_C20 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C21 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C22 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C23 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C24 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C25 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C26 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C27 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C28 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C29 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0.1cm; padding-bottom:0.1cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C30 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C31 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla4_C4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C6 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C7 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C8 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_C9 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D10 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D11 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D12 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D13 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D14 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D15 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D16 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D17 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D18 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D19 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D2 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-width:0.0176cm; border-style:solid; border-color:#000000; writing-mode:lr-tb; }
	.Tabla4_D20 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D21 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D22 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D23 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D24 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D25 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D26 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D27 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D28 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D29 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0.1cm; padding-bottom:0.1cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D30 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D31 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla4_D4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D6 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D7 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D8 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D9 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla1_A { width:3.688cm; }
	.Tabla1_B { width:15.977cm; }
	.Tabla2_A { width:0.679cm; }
	.Tabla2_B { width:0.684cm; }
	.Tabla2_C { width:0.693cm; }
	.Tabla2_E { width:0.116cm; }
	.Tabla2_F { width:0.649cm; }
	.Tabla2_G { width:0.099cm; }
	.Tabla2_H { width:0.596cm; }
	.Tabla2_I { width:0.695cm; }
	.Tabla2_M { width:0.699cm; }
	.Tabla2_P { width:0.504cm; }
	.Tabla2_Q { width:0.191cm; }
	.Tabla2_S { width:0.727cm; }
	.Tabla2_U { width:0.178cm; }
	.Tabla2_V { width:0.55cm; }
	.Tabla2_e { width:1.221cm; }
	.Tabla3_A { width:1.282cm; }
	.Tabla3_B { width:0.757cm; }
	.Tabla3_C { width:0.758cm; }
	.Tabla3_D { width:0.049cm; }
	.Tabla3_E { width:0.709cm; }
	.Tabla3_G { width:0.432cm; }
	.Tabla3_H { width:0.326cm; }
	.Tabla3_I { width:1.549cm; }
	.Tabla3_J { width:1.617cm; }
	.Tabla3_K { width:0.741cm; }
	.Tabla3_N { width:0.945cm; }
	.Tabla3_O { width:0.598cm; }
	.Tabla3_P { width:0.067cm; }
	.Tabla3_Q { width:0.637cm; }
	.Tabla3_R { width:0.699cm; }
	.Tabla3_S { width:0.575cm; }
	.Tabla3_T { width:0.175cm; }
	.Tabla3_U { width:0.609cm; }
	.Tabla3_V { width:0.141cm; }
	.Tabla3_W { width:0.644cm; }
	.Tabla3_X { width:0.108cm; }
	.Tabla3_Y { width:0.677cm; }
	.Tabla3_Z { width:0.785cm; }
	.Tabla3_a { width:0.037cm; }
	.Tabla3_b { width:0.6cm; }
	.Tabla3_c { width:0.639cm; }
	.Tabla3_e { width:0.672cm; }
	.Tabla4_A { width:1.623cm; }
	.Tabla4_B { width:11.035cm; }
	.Tabla4_C { width:3.249cm; }
	.Tabla4_D { width:3.776cm; }
	.Tabla2_13 { height:0.4cm; }
	.Tabla2_15 { height:0.457cm; }
	.Tabla2_2 { height:0.603cm; }
	.Tabla2_3 { height:0.75cm; }
	.Tabla2_5 { height:0.531cm; }
	.Tabla2_6 { height:0.603cm; }
	.Tabla2_7 { height:0.501cm; }
	.Tabla2_9 { height:0.45cm; }
	.Tabla3_13 { height:0.45cm; }
	.Tabla3_3 { height:0.199cm; }
	.Tabla3_4 { height:0.45cm; }
	.Tabla3_7 { height:0.9cm; }
	.Tabla4_3 { height:0.7cm; }
	.T1 { font-size:9pt; }
	.T10 { font-size:10pt; }
	.T12 { font-family:Arial Narrow; font-size:9pt; }
	.T13 { font-family:Arial Narrow; font-size:9pt; }
	.T14 { font-family:Arial Narrow; font-size:9pt; }
	.T15 { font-family:Arial Narrow; font-size:9pt; }
	.T16 { font-family:Arial Narrow; font-size:9pt; }
	.T17 { font-family:Arial Narrow; font-size:9pt; font-weight:bold; }
	.T2 { font-family:Arial; font-size:9pt; font-weight:bold; }
	.T22 { font-family:Arial Narrow; font-size:9.5pt; font-weight:bold; }
	.T24 { font-family:Arial Narrow; font-size:8pt; font-weight:bold; }
	.T25 { font-family:Arial Narrow; font-size:7.5pt; }
	.T26 { font-family:Arial Narrow; font-size:7pt; }
	.T27 { font-family:Arial Narrow; font-size:7.5pt; }
	.T31 { vertical-align:super; font-size:58%;font-family:Arial Narrow; font-size:9pt; }
	.T33 { vertical-align:super; font-size:58%;font-family:Arial Narrow; font-size:10pt; }
	.T4 { font-family:Arial; font-size:9pt; }
	.T5 { font-family:Arial; font-size:9pt; }
	.T6 { font-family:Arial; font-size:8pt; font-weight:bold; }
	.P122{ font-size:9.5pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P1222{ font-size:9.5pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb; font-weight:bold; }
	.T28 { font-family:Arial Narrow; font-size:9pt; }	
			<!-- ODF styles with no properties representable as CSS -->
	.Tabla1.1 .Tabla2.1 .Tabla2.14 .Tabla2.16 .Tabla3.1 .Tabla3.14 .Tabla3.2 .Tabla3.5 .Tabla3.6 .Tabla4.1 .Tabla4.2  .T29 .T30 .T8  { }
		</style>
	</head>
	<body dir="ltr" style=" writing-mode:lr-tb; ">
	
	
		<?php 
			$company = $model->iDPLAN->iDCOMISION->iDEMPRESA;
			
			$a_rfc = str_split(strtoupper($company->RFC));
			
			$a_nss = str_split(strtoupper($company->NSS));
			
		
			
			$a_cp = str_split(strtoupper($company->CODIGO_POSTAL));
				
			$a_cp = (isset($a_cp))? array_reverse($a_cp) : $a_cp;
			
			
			$entidadFederativa =  Catalogo::findOne(['CATEGORIA'=>1, 'ID_ELEMENTO'=>$company->ENTIDAD_FEDERATIVA]);
			
			$mpio =  Catalogo::findOne(['CATEGORIA'=>2, 'ID_ELEMENTO'=>$company->MUNICIPIO_DELEGACION]);
			
			$giro =  Catalogo::findOne(['CATEGORIA'=>4, 'ID_ELEMENTO'=>$company->GIRO_PRINCIPAL]);
			
			/**
			@todo: revisar invertir el arreglo
			 */
			
			$modelEst = $model->iDESTABLECIMIENTOs;
			
			$establecimientos = count($model->iDESTABLECIMIENTOs);
			
			$a_establecimientos = str_split(strtoupper(''.$establecimientos));
			
			$a_fConst =  str_split(strtoupper(''.date("Ymd", strtotime(($model->iDPLAN->VIGENCIA_INICIO!==null)?$model->iDPLAN->VIGENCIA_INICIO:'1910-01-01'))));
			$a_fElab =  str_split(strtoupper(''.date("Ymd", strtotime(($model->iDPLAN->VIGENCIA_FIN!==null)?$model->iDPLAN->VIGENCIA_FIN:'1910-01-01'))));
	
	?>
	
		<table border="0" cellspacing="0" cellpadding="0" class="Tabla1">
			<colgroup>
				<col width="161"/>
				<col width="698"/>
			</colgroup>
			<tr class="Tabla11">
				<td style="text-align:left;width:3.688cm; " class="Tabla1_A1">
					<div style="clear:both; line-height:0; width:0; height:0; margin:10; "> 
						
						<img style="height:3.02cm;width:3.64cm;" alt="" src="data:image/*;base64,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">
					</div>
				
				</td>
				<td style="text-align:center;width:15.977cm; " class="Tabla1_B1">
					<p class="P45"> </p><p class="P43">
						<span class="T2">SUBSECRETARÍA DE INCLUSIÓN LABORAL</span>
					</p><p class="P44">DIRECCIÓN GENERAL DE CAPACITACIÓN</p><p class="P44"> </p><p class="P43">
						<span class="T6">
											CONSTANCIAS DE COMPETENCIAS O DE HABILIDADES LABORALES
											PRESENTACIÓN DE LISTAS DE CONSTANCIAS DE COMPETENCIAS O DE HABILIDADES LABORALES
						</span>
					</p><p class="P46">Formato DC-4</p><p class="P43">
						<span class="T6">LISTA DE CONSTANCIAS DE COMPETENCIAS O DE HABILIDADES LABORALES</span>
					</p>
				</td>
			</tr>
		</table><p class="P47"> </p>
		<table border="0" cellspacing="0" cellpadding="0" class="Tabla2">
			<colgroup>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="30"/>
				<col width="32"/>
				<col width="32"/>
				<col width="32"/>
				<col width="32"/>
				<col width="32"/>
				<col width="32"/>
				<col width="32"/>
				<col width="32"/>
				<col width="53"/>
			</colgroup>
			<tr class="Tabla21">
				<td colspan="27" style="text-align:center;width:0.679cm; height:37px; " class="Tabla2_A1 P40">
							DATOS DE LA EMPRESA
				</td>
			</tr>
			<tr class="Tabla22">
				<td colspan="27" style="text-align:left;width:0.679cm;  vertical-align:top;" class="Tabla2_A2">
					<span class="P122">Nombre o razón social (En caso de persona física, anotar apellido paterno, apellido materno y nombre(s))</span>
				</td>
			</tr>
			<tr class="Tabla23">
				<td colspan="27" style="text-align:left;width:0.679cm; height:30px" class="Tabla2_A3">
					<span class="T28"><?=$company->NOMBRE_RAZON_SOCIAL?></span> 
				</td>
			</tr>
			<tr class="Tabla22">
				<td colspan="15" style="text-align:left;width:0.679cm; " class="Tabla2_A4">
					<span class="P122">Registro Federal de Contribuyentes con homoclave (SHCP)</span>
				</td>
				<td colspan="12" style="text-align:left; " class="Tabla2_S4">
						<span class="P122">Registro patronal del I.M.S.S.(Una letra o número y 10 dígitos)</span>
				</td>
			</tr>
			<tr class="Tabla25">
				<td style="text-align:center; vertical-align:middle; width:0.679cm; height:30 " class="Tabla2_A5 T28">
					<?=trim(isset($a_rfc[0])?$a_rfc[0]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_rfc[1])?$a_rfc[1]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_rfc[2])?$a_rfc[2]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_rfc[3])?$a_rfc[3]:'') ?>
				</td>
				<td  style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					--
				</td>
				<td  style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_rfc[4])?$a_rfc[4]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_rfc[5])?$a_rfc[5]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_rfc[6])?$a_rfc[6]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
						<?=trim(isset($a_rfc[7])?$a_rfc[7]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
						<?=trim(isset($a_rfc[8])?$a_rfc[8]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
						<?=trim(isset($a_rfc[9])?$a_rfc[9]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle;width:0.679cm; " class="Tabla2_A5 T28">
					--
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
						<?=trim(isset($a_rfc[10])?$a_rfc[10]:'') ?>
				</td>
				<td  style="text-align:center; vertical-align:middle; width:0.504cm; " class="Tabla2_A5 T28">
						<?=trim(isset($a_rfc[11])?$a_rfc[11]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
						<?=trim(isset($a_rfc[12])?$a_rfc[12]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_nss[0])?$a_nss[0]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_nss[1])?$a_nss[1]:'') ?>
				</td>
				
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_nss[2])?$a_nss[2]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_nss[3])?$a_nss[3]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_nss[4])?$a_nss[4]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_nss[5])?$a_nss[5]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_nss[6])?$a_nss[6]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_nss[7])?$a_nss[7]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_nss[8])?$a_nss[8]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=trim(isset($a_nss[9])?$a_nss[9]:'') ?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					-
				</td>
				<td style="text-align:center;width:0.679cm; vertical-align:middle;" class="Tabla2_e5 T28">
					<?=trim(isset($a_nss[10])?$a_nss[10]:'') ?>
				</td>
			</tr>
			<tr class="Tabla22">
				<td colspan="21" style="text-align:left;width:0.679cm; " class="Tabla2_A4">
					<span class="P122">Periodo de vigencia del plan (No deberá exceder de 2 años)</span>
				</td>
				<td colspan="6" rowspan="3" style="text-align:left; vertical-align: text-top;" class="Tabla2_S4">
						<span class="P122">Número de establecimientos considerados en la lista</span>
				</td>
			</tr>
			<tr class="Tabla23">
				<td colspan="3" style="text-align:left;width:0.679cm; height:30px" class="Tabla2_A99">
					<p class="P2"></p>
				</td>
				<td colspan="4" style="text-align:center;width:0.679cm; height:30px" class="Tabla3_A111">
					<span class="P122">
						Año
					</span>
				</td>
				<td colspan="2" style="text-align:center;width:0.679cm; height:30px" class="Tabla3_A111">
					<span class="P122">
						Mes</span>
				</td>
				<td colspan="2" style="text-align:center;width:0.679cm; height:30px" class="Tabla3_A111">
					<span class="P122">
						Día</span>
				</td>
				<td colspan="2" style="text-align:center;width:0.679cm; height:30px" class="Tabla3_A111">
					<p class="P2">
					</p>
				</td>
				<td colspan="4" style="text-align:center;width:0.679cm; height:30px" class="Tabla3_A111">
					<span class="P122">
						Año
					</span>
				</td>
				<td colspan="2" style="text-align:center;width:0.679cm; height:30px" class="Tabla3_A111">
					<span class="P122">
						Mes
					</span>
				</td>
				<td colspan="2" style="text-align:center;width:0.679cm; height:30px" class="Tabla3_A111">
					<span class="P122">
						Día</span>
				</td>
				
				
			</tr>
			<tr class="Tabla36">
				<td colspan="3" style="text-align:left;width:0.679cm; height:10px" class="Tabla3_A10">
					<p class="P2"></p>
				</td>
				<td colspan="4" style="text-align:center;width:0.679cm; height:10px" class="Tabla3_A10">
					<p class="P2"></p>
				</td>
				<td colspan="2" style="text-align:center;width:0.679cm; height:10px" class="Tabla3_A10">
					<p class="P2"></p>
				</td>
				<td colspan="2" style="text-align:center;width:0.679cm; height:10px" class="Tabla3_A10">
					<p class="P2"></p>
				</td>
				<td colspan="2" style="text-align:center;width:0.679cm; height:10px" class="Tabla3_A10">
					<p class="P2">
					</p>
				</td>
				<td colspan="4" style="text-align:center;width:0.679cm; height:10px" class="Tabla3_A10">
					<p class="P2">
					
					</p>
				</td>
				<td colspan="2" style="text-align:center;width:0.679cm; height:10px" class="Tabla3_A10">
					<p class="P2"></p>
				</td>
				<td colspan="2" style="text-align:center;width:0.679cm; height:10px" class="Tabla3_A10">
					<p class="P2"></p>
				</td>
			
			</tr>
			<tr class="Tabla25">
				<td colspan="3" style="text-align:left; vertical-align:middle; width:0.679cm; height:30 " class="Tabla2_A5">
						<span class="P122">
						DEL
						</span>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=$a_fConst[0]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?php echo $a_fConst[1];?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					 <?=$a_fConst[2]?>
				</td>
				<td  style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					 <?=$a_fConst[3]?>
				</td>
				<td  style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=$a_fConst[4]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=$a_fConst[5]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=$a_fConst[6]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
				    <?=$a_fConst[7]?>
				</td>
				<td colspan="2" style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 P122">
					al
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
						<?=$a_fElab[0]?>
				</td>
				<td style="text-align:center; vertical-align:middle;width:0.679cm; " class="Tabla2_A5 T28">
					<?=$a_fElab[1]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
						<?=$a_fElab[2]?>
				</td>
				<td  style="text-align:center; vertical-align:middle; width:0.504cm; " class="Tabla2_A5 T28">
						<?=$a_fElab[3]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=$a_fElab[4]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
				<?=$a_fElab[5]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=$a_fElab[6]?>
				</td>
				
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
				<?=$a_fElab[7]?>
				</td>
			
				
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=round($establecimientos/100000)?:round($establecimientos/100000)?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=round($establecimientos/10000)?:round($establecimientos/10000)?>
				</td>
				<td colspan]="2" style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?=round($establecimientos/1000)?:round($establecimientos/1000)?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
						<?=round($establecimientos/100)?:round($establecimientos/100)?>
				</td>
				<td colspan="2" style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_e5 T28">
						<?=round($establecimientos%10)?>
				</td>				
				
			</tr>
			<tr class="Tabla26">
				<td colspan="27" style="text-align:left;width:0.679cm; " class="Tabla2_A6">
					<span class="P122">Clave Única de Registro de Población. - En caso de persona física *</span>
				</td>
			</tr>
			<tr class="Tabla27">
				<td colspan="27" style="text-align:left;width:0.679cm; height:29px; " class="Tabla2_A7">
					<p class="P11"> </p><p class="P52">
						<span class="T28"><?=strtoupper($company->CURP) ?></span></p>
				</td>
			</tr>
			<tr class="Tabla26">
				<td colspan="14" style="text-align:left;width:0.679cm; " class="Tabla2_A8">
						<span class="P122">Calle</span>
				</td>
				<td colspan="3" style="text-align:left;width:0.679cm; " class="Tabla2_A8_BT">
						<span class="P122">No. Exterior</span>
				</td>
				<td colspan="3" style="text-align:left;width:0.679cm; " class="Tabla2_A8_BT">
						<span class="P122">No. Interior</span>
				</td>
				<td colspan="7" style="text-align:left;width:0.679cm; " class="Tabla2_A8_BTR">
						<span class="P122">Colonia</span>
				</td>
			</tr>
			<tr class="Tabla29">
				<td colspan="14" style="text-align:left;width:0.679cm; " class="Tabla2_A9">
						<span class="T28"><?= $company->CALLE ?></span>
				</td>
				<td colspan="3" style="text-align:left;width:0.191cm; " class="Tabla2_Q9">
						<span class="T28"><?= $company->NUMERO_EXTERIOR ?></span>
				</td>
				<td colspan="3" style="text-align:left;width:0.55cm; " class="Tabla2_V9">
						<span class="T28"><?= $company->NUMERO_INTERIOR ?></span>
				</td>
				<td colspan="7" style="text-align:left;width:0.727cm; " class="Tabla2_Y9">
					<p class="P6">
						<span class="T28"><?= $company->COLONIA ?></span></p>
				</td>
			</tr>
			<tr class="Tabla22">
				<td colspan="6" style="text-align:left; width:90px; " class="Tabla2_A10">
					<span class="P122">Código postal (5 dígitos)</span>
				</td>
				<td colspan="8" style="text-align:left;width:0.596cm; " class="Tabla2_H10">
					<span class="P122">Entidad federativa</span>
				</td>
				<td colspan="13" style="text-align:left;width:0.191cm; " class="Tabla2_Q10">
					<span class="P122">Municipio o delegación política</span>
				</td>
			</tr>
			<tr class="Tabla29">
				<td colspan="2" style="text-align:center; vertical-align: middle;  height:25px " class="Tabla2_A11">
					<span class="T28"><?=trim(isset($a_cp[4])?$a_cp[4]:'') ?></span>
				</td>
				<td style="text-align:center;width:0.684cm; vertical-align: middle; " class="Tabla2_B11">
					<span class="T28"><?=trim(isset($a_cp[3])?$a_cp[3]:'') ?></span>
				</td>
				<td style="text-align:center;width:0.693cm;vertical-align: middle; " class="Tabla2_C11">
					<span class="T28"><?=trim(isset($a_cp[2])?$a_cp[2]:'') ?></span>
				</td>
				<td style="text-align:center;width:0.693cm;vertical-align: middle; " class="Tabla2_D11">
					<span class="T28"><?=trim(isset($a_cp[1])?$a_cp[1]:'') ?></span>
				</td>
				<td  style="text-align:center;width:0.649cm;vertical-align: middle; " class="Tabla2_F11">
					<span class="T28"><?=trim(isset($a_cp[0])?$a_cp[0]:'') ?></span>
				</td>
				<td colspan="8" style="text-align:left;width:0.596cm; vertical-align: middle; " class="Tabla2_H11">
						<span class="T28"><?=trim(isset($entidadFederativa)?$entidadFederativa->NOMBRE:'') ?></span>
				</td>
				<td colspan="13" style="text-align:left;width:0.191cm; vertical-align: middle;" class="Tabla2_Q11">
						<span class="T28"><?=trim(isset($mpio)?$mpio->NOMBRE:'') ?></span>
				</td>
			</tr>
			<tr class="Tabla26">
				<td colspan="14" style="text-align:left;width:0.679cm; " class="Tabla2_A12">
						<span class="P122">Localidad</span>
				</td>
				<td colspan="13" style="text-align:left;width:0.191cm; " class="Tabla2_Q12">
					<span class="P122">Teléfono (s)</span>
				</td>
			</tr>
			<tr class="Tabla213">
				<td colspan="14" style="text-align:left;width:0.679cm; height:20px; " class="Tabla2_A13">
					<p class="P6">
						</p>
				</td>
				<td colspan="13" style="text-align:left;width:0.191cm; " class="Tabla2_Q13">
						<span class="T28"><?= $company->TELEFONO?></span></p>
			</tr>
			<tr class="Tabla26">
				<td colspan="14" style="text-align:left;width:0.679cm; " class="Tabla2_A12">
						<span class="P122">Correo electrónico</span>
				</td>
				<td colspan="13" style="text-align:left;width:0.191cm; " class="Tabla2_Q12">
					<span class="P122">Fax</span>
				</td>
			</tr>
			<tr class="Tabla213">
				<td colspan="14" style="text-align:left;width:0.679cm; height:20px; " class="Tabla2_A13">
						<span class="T28"><?= $company->CORREO_ELECTRONICO?></span> 
				</td>
				<td colspan="13" style="text-align:left;width:0.191cm; " class="Tabla2_Q13">
						<span class="T28"><?= $company->FAX?></span>
				</td>
			</tr>
			<tr class="Tabla26">
				<td colspan="27" style="text-align:left;width:0.679cm; " class="Tabla2_A122">
					<span class="P122">Actividad o giro principal</span>
				</td>
			
			</tr>
			<tr class="Tabla2_Q13">
				<td colspan="27"  style="text-align:left; vertical-align:middle; width:0.679cm; height:25px; " class="Tabla2_A15">
						<span class="T28"><?=trim(isset($giro)?$giro->NOMBRE:'') ?></span>
				</td>
				
			</tr>
			<tr class="Tabla215">
				<td rowspan = "2" colspan="9" style="text-align:left;width:0.679cm;  vertical-align:middle; " class="Tabla2_A14_1">
					<span class="P122">Número de constancias expedidas</span>
				</td>
				<td colspan="6" style="text-align:center;width:0.679cm; height:20px " class="Tabla2_A14_1">
					<span class="P122">Hombres</span>
				</td>
				<td colspan="6" style="text-align:center;width:0.679cm; height:20px " class="Tabla2_A14_1">
					<span class="P122">Mujeres</span>
				</td>
				<td colspan="6" style="text-align:center;width:0.679cm;  height:20px" class="Tabla2_A14_1">
					<span class="P122">Total</span>
				</td>
			</tr>
			<tr class="Tabla215">
				
				<td colspan="6" style="text-align:center;width:0.679cm;  height:30px " class="Tabla2_Q13">
				<span class="T28"><?= $model->CONSTANCIAS_HOMBRES?></span>
					
				</td>
				<td colspan="6" style="text-align:center;width:0.679cm;  height:30px " class="Tabla2_Q13">
					<span class="T28"><?= $model->CONSTANCIAS_MUJERES?></span>
				</td>
				<td colspan="6" style="text-align:center;width:0.679cm; height:30px " class="Tabla2_Q13">
					<span class="T28"><?= $model->CONSTANCIAS_HOMBRES + $model->CONSTANCIAS_MUJERES?></span>
				</td>
			</tr>
			
		</table>
		<p class="P27_1"> </p>		
		<table border="0" cellspacing="0" cellpadding="0" class="Tabla3">
			<colgroup>
				<col width="56"/>
				<col width="33"/>
				<col width="33"/>
				<col width="2"/>
				<col width="31"/>
				<col width="33"/>
				<col width="19"/>
				<col width="14"/>
				<col width="68"/>
				<col width="71"/>
				<col width="32"/>
				<col width="32"/>
				<col width="32"/>
				<col width="41"/>
				<col width="26"/>
				<col width="3"/>
				<col width="28"/>
				<col width="31"/>
				<col width="25"/>
				<col width="8"/>
				<col width="27"/>
				<col width="6"/>
				<col width="28"/>
				<col width="5"/>
				<col width="30"/>
				<col width="34"/>
				<col width="2"/>
				<col width="26"/>
				<col width="28"/>
				<col width="28"/>
				<col width="29"/>
			</colgroup>
			
			
			<tr class="Tabla35">
				<td colspan="31" style="text-align:center;width:1.282cm; " class="Tabla3_A5">
				<p class="P24"> </p>
					<h1 class="P39">
						<a id="a__Los_datos_se_proporcionan_bajo_protesta_de_decir_verdad__apercibidos_de_la_responsabilidad_en_que_incurre_todo">
							<span/>
						</a>Los datos se proporcionan bajo protesta de decir verdad, apercibidos de la responsabilidad en que incurre todo</h1>
				</td>
			</tr>
			<tr class="Tabla36">
				<td colspan="31" style="text-align:center;width:1.282cm; " class="Tabla3_A6">
					<p class="P21">
						<span class="T17">aquél que no se conduce con verdad.</span>
					</p>
					<p class="P24">&nbsp;</p>
				</td>
			</tr>
			<tr class="Tabla37">
				<td colspan="6" style="text-align:left;width:1.282cm; " class="Tabla3_A7">
					<p class="P18">&nbsp;</p>
				</td>
				<td colspan="18" style="text-align:center;width:0.326cm; " class="Tabla3_H7">
					<p class="P16"> </p>
					<p class="T28 text-center">
					<?=$company->iDREPRESENTANTELEGAL->NOMBRE ?>
					<?=$company->iDREPRESENTANTELEGAL->APP ?>
					<?=$company->iDREPRESENTANTELEGAL->APM ?></p>
				</td>
				<td colspan="7" style="text-align:left;width:0.644cm; " class="Tabla3_W7">
					<p class="P15"> </p>
				</td>
			</tr>
			<tr class="Tabla36">
				<td colspan="31" style="text-align:center;width:1.282cm; " class="Tabla3_A8">
					<span class="P122">Nombre y firma del patrón o representante legal de la empresa</span>
				</td>
			</tr>
			<tr class="Tabla36">
				<td colspan="31" style="text-align:left;width:1.282cm; " class="Tabla3_A9">
					<p class="P4">&nbsp;</p>
				</td>
			</tr>
			<tr class="Tabla36">
				<td colspan="31" style="text-align:center;width:1.282cm; " class="Tabla3_A10">
					<span class="P1222">Lugar y fecha de elaboración de este informe</span>
				</td>
			</tr>
			<tr class="Tabla36">
				<td colspan="31" style="text-align:center;width:1.282cm; " class="Tabla3_A11">
					<p class="P20"></p>
				</td>
			</tr>
			<tr class="Tabla33">
				<td colspan="19" style="text-align:center;width:1.282cm; " class="Tabla3_A12">
					<p class="P15"><?= $model->LUGAR_INFORME?></p>
				</td>
				<td colspan="4" style="text-align:left;width:0.598cm; " class="Tabla3_O12">
					<p class="P15"> </p>
				</td>
				<td colspan="2" style="text-align:left;width:0.609cm; " class="Tabla3_U12">
					<p class="P15"> </p>
				</td>
				<td colspan="2" style="text-align:left;width:0.677cm; " class="Tabla3_Y12">
					<p class="P15"> </p>
				</td>
				<td colspan="4" style="text-align:left;width:0.6cm; " class="Tabla3_b12">
					<p class="P15"> </p>
				</td>
			</tr>
			<tr class="Tabla313">
				<td colspan="4" style="text-align:left;width:1.282cm; " class="Tabla3_A13">
					<p class="P15"> </p>
				</td>
				<td colspan="14" style="text-align:left;width:0.709cm; " class="Tabla3_E13">
					<p class="P29">
						<span class="T28"></span></p>
				</td>
				<td style="text-align:left;width:0.945cm; " class="Tabla3_N13">
					<p class="P15"> </p>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
				
					<?= $a_fElab[0]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?= $a_fElab[1]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?= $a_fElab[2]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?= $a_fElab[3]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?= $a_fElab[4]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?= $a_fElab[5]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?= $a_fElab[7]?>
				</td>
				<td style="text-align:center; vertical-align:middle; width:0.679cm; " class="Tabla2_A5 T28">
					<?= $a_fElab[6]?>
				</td>
				<td colspan="4" style="text-align:left;width:0.6cm; " class="Tabla3_b13">
					<p class="P17">&nbsp;</p>
				</td>
			</tr>
			<tr class="Tabla314">
				<td colspan="19" style="text-align:left;width:1.282cm; " class="Tabla3_A14">
					<p class="P15"> </p>
				</td>
				<td colspan="4" style="text-align:center;width:0.598cm; " class="Tabla3_O14">
					<span class="P122">Año</span>
				</td>
				<td colspan="2" style="text-align:center;width:0.609cm; " class="Tabla3_U14">
					<span class="P122">Mes</p>
				</td>
				<td colspan="2" style="text-align:center;width:0.677cm; " class="Tabla3_Y14">
					<span class="P122">Día</p>
				</td>
				<td colspan="4" style="text-align:left;width:0.6cm; " class="Tabla3_b14">
					<p class="P14">&nbsp;</p>
				</td>
			</tr>
		</table>
		
		<p class="P30">
			<span class="T22"> </span>
			<span class="T24">NOTAS E INSTRUCCIONES</span><br />
		
			
			
			<span class="T25">-  Llenar a máquina o con letra de molde.</span>
			<span class="T25">-  Escribir arriba de cada dígito de la homoclave del Registro Federal de Contribuyentes, la palabra número. Ejemplos: número 0, número 1, número 2,etc.</span><br />
			<span class="T25">-  Entregar el formato a la autoridad laboral solamente en original. En su caso, puede presentar una copia si requiere que se le acuse de recibo.</span><br />

			<span class="T25">-  La empresa o patrón deberá conservar copia de las constancias reportadas en la o las listas de constancias presentadas ante la autoridad laboral en el formato DC-4 durante el último año.</span><br />

			<span class="T25">-  Las empresas deberán adjuntar la información de los trabajadores y de cada constancia de competencias o de habilidades laborales entregada a los trabajadores capacitados.</span><br />
			
			<span class="T25">-  La falta de información en los datos opcionales, no será motivo para negar la presentación respectiva.</span><br />
			
			<span class="T25">-  Consultas sobre el trámite llamar a la Dirección General de Capacitación al teléfono 2000-5126 y al correo electrónico registro@stps.gob.mx</span><br />
			
			<span class="T25">* Datos no obligatorios</span>
		</p>
		<p class="P34" style="text-align:right;">DC-4 ANVERSO (primera parte)</p>
		
		
	<div class="" style="position: relative; width: 100%; height: 50px;">
			<!-- Padding -->		
		</div>
		
		
		
		<div class="" style="position: relative; width: 100%; height: 30px;">
			<!-- Padding -->		
		</div>
		
		<table border="0" cellspacing="0" cellpadding="0" class="Tabla4">
			<colgroup>
				<col width="71"/>
				<col width="482"/>
				<col width="142"/>
				<col width="165"/>
			</colgroup>
			<tr class="Tabla41">
				<td colspan="4" style="text-align:center;width:1.623cm; " class="Tabla4_A1">
					<h5 class="Heading_20_5">
						<a id="a__ESTABLECIMIENTOS_EN_LOS_QUE_RIGE_LA_COMISIÓN_MIXTA_DE_CAPACITACIÓN__ADIESTRAMIENTO_Y_PRODUCTIVIDAD">
							<span />
						</a>
						<span class="T10">ESTABLECIMIENTOS CONSIDERADOS EN LA LISTA DE CONSTANCIAS DE COMPETENCIAS O DE HABILIDADES LABORALES DE CAPACITACIÓN, ADIESTRAMIENTO Y PRODUCTIVIDAD</span>
					</h5>
				</td>
			</tr>
			<tr class="Tabla42">
				<td style="text-align:center;width:1.623cm; " class="Tabla4_A2">
					<p class="P122">Número</p><p class="P122">consecutivo</p>
				</td>
				<td style="text-align:center;width:11.035cm; " class="Tabla4_B2">
					<p class="P122">Domicilio</p><p class="P21">
						<span class="P122">(Anotar el domicilio conforme a los datos solicitados en el anverso de este formato, para cada uno de los establecimientos adicionales)</span>
					</p>
				</td>
				<td style="text-align:center;width:3.249cm; " class="Tabla4_C2">
					<p class="P122">R.F.C. con homoclave</p><p class="P122">(SHCP)</p>
				</td>
				<td style="text-align:center;width:3.776cm; " class="Tabla4_D2">
					<p class="P122">Registro patronal del I.M.S.S.</p>
				</td>
			</tr>
			
			
			<?php for($i=0; $i<35; $i++){?>
			<tr class="Tabla43">
				<td style="text-align:center;width:1.623cm; " class="Tabla4_A3">
					<p class="P7">
						<span class="T28">
						<?php
						if (isset($modelEst[$i]))
						echo $i + 1;
						?></span></p>
				</td>
				<td style="text-align:left;width:11.035cm; " class="Tabla4_B3">
					<p class="P9">
						<span class="T28"><?php 
						
							if (isset($modelEst[$i])){
								
							$entidad =  Catalogo::findOne(['CATEGORIA'=>1, 'ID_ELEMENTO'=>$modelEst[$i]->ENTIDAD_FEDERATIVA]);
						
							$municipio =  Catalogo::findOne(['CATEGORIA'=>2, 'ID_ELEMENTO'=>$modelEst[$i]->MUNICIPIO_DELEGACION]);
						
							echo ''.strtoupper($modelEst[$i]->NOMBRE_CENTRO_TRABAJO) . ' ';
							echo (strlen(trim($modelEst[$i]->NOMBRE_CENTRO_TRABAJO)) > 0) ?  ': ' : ' ';
							echo 'Calle '; 
							echo (strlen(trim($modelEst[$i]->CALLE)) > 0) ?  $modelEst[$i]->CALLE : 'S/N ';

							echo ', No Ext ';
							echo  (strlen(trim($modelEst[$i]->NUMERO_EXTERIOR)) > 0) ? $modelEst[$i]->NUMERO_EXTERIOR :  'S/N';
							echo ',  No Int ';
							echo (strlen(trim($modelEst[$i]->NUMERO_INTERIOR )) > 0) ? $modelEst[$i]->NUMERO_INTERIOR : 'S/N';
							echo ', C.P. ';
							echo (strlen(trim($modelEst[$i]->CODIGO_POSTAL )) > 0) ? $modelEst[$i]->CODIGO_POSTAL : 'S/N';
							echo ', Col.'; 
							echo (strlen(trim($modelEst[$i]->COLONIA)) > 0) ? $modelEst[$i]->COLONIA : 'S/N';
							echo ', Edo. ';
							echo  ($entidad !== null)?$entidad->NOMBRE : 'S/N';
							echo ', Mpio/Del. ';
							echo ($municipio!== null)?$municipio->NOMBRE : 'S/N';
						}
						else
							echo '&nbsp;';
						
						?></span></p>
				</td>
				<td style="text-align:left;width:3.249cm; " class="Tabla4_C3">
					<p class="P7">
						<span class="T28"><?php
						if (isset($modelEst[$i]))
							echo $modelEst[$i]->RFC;
						?></span></p>
				</td>
				<td style="text-align:left;width:3.776cm; " class="Tabla4_D3">
					<p class="P7">
						<span class="T28"><?php
						if (isset($modelEst[$i]))
							echo $modelEst[$i]->NSS;
						?></span></p>
				</td>
			</tr>
			<?php }?>
			<tr class="Tabla43">
				<td style="text-align:left;width:1.623cm; " class="Tabla4_A31">
					<p class="P7">
						<span class="T28"></span></p>
				</td>
				<td style="text-align:left;width:11.035cm; " class="Tabla4_B31">
					<p class="P9">
						<span class="T28"></span></p>
				</td>
				<td style="text-align:left;width:3.249cm; " class="Tabla4_C31">
					<p class="P7">
						<span class="T28"></span></p>
				</td>
				<td style="text-align:left;width:3.776cm; " class="Tabla4_D31">
					<p class="P7">
						<span class="T28"></span></p>
				</td>
			</tr>
		</table><p class="P36"> </p><p class="P32"> </p><p class="P30">
			<span class="T27">Consultas sobre el trámite llamar a la Dirección General de Capacitación al Teléfono 2000-5126 o realizar la consulta al correo electrónico registro@stps.gob.mx</span>
		</p><p class="P34" style="text-align:right">DC-4 REVERSO (primera parte)</p>
	</body>