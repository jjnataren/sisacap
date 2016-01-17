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
	.Tabla1_B1 { border-left-width:0.04cm; border-right-width:0.04cm; border-top-width:0.04cm; border-bottom-width:0.04cm; border-color:#c1c1c1; vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-style:solid; writing-mode:lr-tb; }
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
	
	.Titulos{ font-size:11.5pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb;  }
	.TextoIndicativo{ font-size:10pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; }
	.TextoUsuario{ font-size:9.5pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb;  }
	.TextoDetalle{ font-size:7pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb;  }
	.bordered_cell{background:#e8e8e8; border-top-width:0.04cm; border-left-width:0.04cm;  border-right-width:0.04cm; border-style:solid; border-bottom-width:0.04cm; border-color:#c1c1c1; }
	.cell_white_lrb{ border-top-width:none; border-left-width:0.04cm;  border-right-width:0.04cm; border-style:solid; border-bottom-width:0.04cm; border-color:#c1c1c1; }
	.cell_white_lr{ border-top-width:none; border-left-width:0.04cm;  border-right-width:0.04cm; border-style:solid; border-bottom-width:none; border-color:#c1c1c1; }
	.cell_white_r{ border-top-width:none; border-left-width:none;  border-right-width:0.04cm; border-style:solid; border-bottom-width:none; border-color:#c1c1c1; }
	.cell_white_1{ border-top-width:none; border-left-width:0.04cm;  border-right-width:none; border-style:solid; border-bottom-width:none; border-color:#c1c1c1; }
	.cell_white_lrbt{ border-top-width:0.04cm; border-left-width:0.04cm;  border-right-width:0.04cm; border-style:solid; border-bottom-width:0.04cm; border-color:#c1c1c1; }
	.cell_white_lrt{ border-top-width:0.04cm; border-left-width:0.04cm;  border-right-width:0.04cm; border-style:solid; border-bottom-width:none; border-color:#c1c1c1; }
	.cell_white_b{ border-top-width:none; border-left-width:none;  border-right-width:none; border-style:solid; border-bottom-width:0.04cm; border-color:#c1c1c1; }	
	.cell_white_t{ border-top-width:0.04cm; border-left-width:none;  border-right-width:none; border-style:solid; border-bottom-width:none; border-color:#c1c1c1; }	
	.cell_white_rb{ border-top-width:none; border-left-width:none;  border-right-width:0.04cm; border-style:solid; border-bottom-width:0.04cm; border-color:#c1c1c1; }	
	.cell_white_lb{ border-top-width:none; border-left-width:0.04cm;  border-right-width:none; border-style:solid; border-bottom-width:0.04cm; border-color:#c1c1c1; }
	.border_top_strong{ border-top-width:0.04cm;    border-style:solid;  border-color:#414142; }	
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
			
			$fpdof = new \DateTime( $model->FECHA_P_DOF);
	
			if ($fpdof)
				$a_fpdof =  str_split(date_format($fpdof, "Ymd"));
				
				$fsoli = new \DateTime( $model->FECHA_SOLICITUD);
	
			if ($fsoli)
				$a_fsoli =  str_split(date_format($fsoli, "Ymd"));	
			
			
	
	?>
	
		<table border="0" cellspacing="0" cellpadding="0" class="Tabla1">
			
            <tr class="Tabla11">
				
				<td style="text-align:center;width:18cm; height:1.5cm; background:#393c3e;" align="left" class="Tabla1_B1">
					<div style="clear:both; line-height:0; width:0; height:0; margin:10; padding-right:600px"> 
						
						<img style="height:1.2cm;width:2.2cm;" alt="" src="/img/gobmx_header.svg" />
					</div>
				</td>
                </tr>
                <tr class="Tabla11">
				
				<td style="text-align:center;width:21cm; height:1.5cm; background:#e8e8e8; padding-top:10px; " class="Tabla1_B1 Titulos">
                
                	<label classs="">Secretaría del Trabajo y Previsión social</label>
                </td>
                </tr>
		
		</table>
        
        	
                
                <div align="center" style="width:21cm; padding-bottom:15px; padding-top:15px;" class="Titulos">
                	<label  >Lista de constancias de competencias o habilidades laborales</label>
                </div>
                
            
                
                <div align="center" style="width:21cm; padding-left:3px; padding-right:3px;" >
                
             
					<table width="100%" >
                       <tr>
                        	<td class="bordered_cell TextoIndicativo"  width="33%" align="center">
                            	<label >Homoclave del formato</label>
                            </td>
                            <td width="33%" colspan="3" class="bordered_cell TextoIndicativo" align="center">
                            	<label >Fecha de publicación del formato en el DOF</label>                            	
                            </td>
                             <td width="33%" class="bordered_cell TextoIndicativo" align="center">
                            	<label  class="">Expediente</label>                            	
                            </td>
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lr">

                            </td>
                            <td colspan="3" class="cell_white_lr">
                            	
                            </td>
                             <td class="cell_white_lr">
                            	
                            </td>
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lr TextoUsuario">
                            	<label>DC-4</label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?= isset($a_fpdof) ? $a_fpdof[6].$a_fConst[7] : '';?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center" >
	                           	<label><?= isset($a_fpdof) ? $a_fpdof[4].$a_fpdof[5] : '';?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?= isset($a_fpdof) ? $a_fpdof[0].$a_fpdof[1].$a_fpdof[2].$a_fpdof[3] : '';?></label>
                            </td>
                             <td class="cell_white_r TextoUsuario">
                             <label><?= $model->EXPEDIENTE; ?></label>
                            	
                            </td>
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lrb">

                            </td>
                            <td colspan="3" class="cell_white_lrb">
                            	
                            </td>
                             <td class="cell_white_lrb">
                            	
                            </td>
                        </tr>
                    </table>                
                </div>

             
                
                <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:10px; padding-bottom:10px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell Titulos" align="center"><label>Datos de la empresa</label></td>
                        </tr>
                    </table>
                </div>
                
              
             <div style="width:21cm; padding-bottom:10px;" >
                <div align="center" style="width:48%; float:left; padding-left:3px; padding-right:3px;" >
                	<table width="100%">
                    	<tr>
                        	<td style="padding-left:5px;" class="TextoIndicativo cell_white_lrt"  align="left"><label>Registro federal de contribuyentes con homoclave (DHCP):</label></td>
                                                     
                        </tr>
                        <tr>
                        	<td class="TextoIndicativo cell_white_lr"  align="left"><label></label></td>
                                                
                        </tr>
                        <tr>
                        	<td class="TextoUsuario cell_white_lrb"align="center"><label><?=$company->RFC; ?></label></td>
                                                    
                        </tr>
                        <tr>
                        	<td style="padding-left:5px;" class="TextoIndicativo cell_white_lrt"  align="left"><label>Clave Única de Registro de Población CURP 
                            (<span class="TextoDetalle">En caso de ser persona fisica</span>)*:</label></td>
                                                     
                        </tr>
                        <tr>
                        	<td class="TextoIndicativo cell_white_lr"  align="left"><label></label></td>
                                                
                        </tr>
                        <tr>
                        	<td class="TextoUsuario cell_white_lrb"  align="center"><label><?=($company->CURP) ? $company->CURP:'&nbsp;'; ?></label></td>
                                                    
                        </tr>
                        
                        <tr>
                        	<td style="padding-left:5px; padding-bottom:5px;" class="TextoIndicativo cell_white_lrbt"  align="left"><label>Denominación o razón social: <span class="TextoUsuario"><?=$company->NOMBRE_RAZON_SOCIAL?></span></label></td>
                                                     
                        </tr>
                        
                           <tr>
                        	<td style="padding-left:5px; padding-bottom:5px;" class="TextoIndicativo cell_white_lrbt"  align="left"><label>Registro patronal del IMSS: <span class="TextoUsuario"><?=$company->NSS?></span></label></td>
                                                     
                        </tr>
                        
                    </table>
                </div>
                 <div align="center" style="width:48%; float:right; padding-left:3px; padding-right:3px;" >
                	<table width="100%">
                    	<tr>
                        
                        
                            <td colspan="6" class="TextoIndicativo cell_white_lrt"  style=" padding-bottom:5px;" align="left"><label>Periodo de vigencia del plan 
                            	<span class="TextoDetalle">(no debe exceder a 2 años)</span>:</label>
                            </td> 
                            
                                                       
                        </tr>
                        
                        <tr>
                        
                        
                            <td colspan="6" class="TextoIndicativo cell_white_lr"  align="left">
                            </td> 
                            
                                                       
                        </tr>
                        
                        <tr>
                        
                        
                            <td  class="TextoIndicativo cell_white_lr"  align="left">
                            <label>Del: &nbsp;<span class="TextoUsuario">  <?= $a_fConst[6].$a_fConst[7];?></span></label>
                            </td> 
                            <td  class="TextoUsuario cell_white_lr"  align="center">
                             <label> <?= $a_fConst[4].$a_fConst[5];?></label>
                            </td> 
                            <td  class="TextoUsuario cell_white_1"  align="center">
                             <label> <?= $a_fConst[0].$a_fConst[1].$a_fConst[2].$a_fConst[3];?></label>
                            </td> 
                            <td  class="TextoIndicativo cell_white_r"  align="left">
                            <label>al:  <span class="TextoUsuario"><?=$a_fElab[6].$a_fElab[7];?></span></label>
                            </td> 
                             <td  class="TextoUsuario cell_white_lr"  align="center">
                             <label><?=$a_fElab[4].$a_fElab[5]?></label>
                            </td>
                             <td  class="TextoUsuario cell_white_lr"  align="center">
                             <label><?=$a_fElab[0].$a_fElab[1].$a_fElab[2].$a_fElab[3]; ?></label>
                            </td>
                            
                                                       
                        </tr>
                        	
                         <tr>
                        
                        
                            <td colspan="6" class="TextoIndicativo cell_white_lr"  align="left">
                            </td> 
                            
                                                       
                        </tr>
                     
                        <tr>
                
                
                            <td colspan="6" class="TextoIndicativo cell_white_lrbt"  align="left" style="padding-bottom:10px; padding-bottom:10px;">
                            <label>Numero de establecimiento considerados en esta lista: &nbsp;<span class="TextoUsuario"> <?=$establecimientos; ?></span></label>
                            </td>                            
                        </tr>
                    </table>
                </div>
                
                
               </div> 
             
             
             <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px; padding-bottom:10px;" >
             
             	<table width="100%">
                	<tr>
                    	<td class="bordered_cell TextoIndicativo" align="center" width="30%"><label>Código postal</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" align="center" width="30%"><label>Calle</label></td>
                    	<td class="bordered_cell TextoIndicativo" align="center" width="20%"><label>Número exterior</label></td>
                    	<td class="bordered_cell TextoIndicativo"align="center" width="20%"><label>Número interior</label></td>                                                                        
                    </tr>
                    <tr>
                    	<td class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center"><label><?=$company->CODIGO_POSTAL; ?> </label></td>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2" style="padding-bottom:8px;" align="center"><label><?= $company->CALLE; ?></label></td>                    
                        <td class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center"><label><?= $company->NUMERO_EXTERIOR; ?></label></td>                    
                        <td class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center"><label><?= $company->NUMERO_INTERIOR; ?></label></td>                    
                     </tr>
                     
                     <tr>
                    	<td class="bordered_cell TextoIndicativo" align="center" ><label>Colonia</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" align="center" ><label>Municipío o delegación</label></td>
                    	<td colspan="2" class="bordered_cell TextoIndicativo" align="center"><label>Estado o Distrito Federal</label></td>
                    	
                    </tr>
                    <tr>
                    	<td class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center"><label><?= $company->COLONIA; ?></label></td>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2" style="padding-bottom:8px;" align="center"><label><?=trim(isset($mpio)?$mpio->NOMBRE:'') ?></label></td>                    
                        <td colspan="2" class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center"><label><?=trim(isset($entidadFederativa)?$entidadFederativa->NOMBRE:'') ?></label></td>                    
                                         
                     </tr>
                      <tr>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" align="center" ><label>Telefono(s)</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" align="center" ><label>Correo electrónico</label></td>
                    	<td  class="bordered_cell TextoIndicativo" align="center"><label>Fax*</label></td>
                    	
                    </tr>
                    <tr>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2" style="padding-bottom:4px;" align="center"><label><?= $company->TELEFONO; ?></label></td>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2" style="padding-bottom:4px;" align="center"><label><?= $company->CORREO_ELECTRONICO;?></label></td>                    
                        <td class="cell_white_lrbt TextoUsuario" style="padding-bottom:4px;" align="center"><label><?= $company->FAX;?></label></td>                    
                                         
                     </tr>
                     
                     <tr>
                    	<td class="bordered_cell TextoIndicativo" colspan="5" align="center" ><label>Actividad o giro principal</label></td>
                        
                      </tr>
                       <tr>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="5" style="padding-bottom:4px;" align="center"><label><?=trim(isset($giro)?$giro->NOMBRE:''); ?></label></td>
                  
                  		</tr>
                </table>
             
             </div>
                
                
              
                
              <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px; padding-bottom:10px;" >
                <table width="100%">
                    <tr>
                    <td class="bordered_cell TextoIndicativo" align="center" valign="middle" rowspan="2" width="16%"><label>Número de contancias expedidas</label></td>
                    <td class="bordered_cell TextoIndicativo" align="center" ><label>Hombres</label></td>
                    <td class="bordered_cell TextoIndicativo" align="center" ><label>Mujeress</label></td>
                    <td class="bordered_cell TextoIndicativo" align="center" ><label>Total</label></td>
                    
                  </tr>
                  	
                    <tr>
                    	<td class="cell_white_lrbt TextoUsuario"  style="padding-bottom:4px;" align="center"><label><?= $model->CONSTANCIAS_HOMBRES; ?></label></td>
                        <td class="cell_white_lrbt TextoUsuario"  style="padding-bottom:4px;" align="center"><label><?= $model->CONSTANCIAS_MUJERES;?></label></td>
                        <td class="cell_white_lrbt TextoUsuario"  style="padding-bottom:4px;" align="center"><label><?= $model->CONSTANCIAS_HOMBRES + $model->CONSTANCIAS_MUJERES;?></label></td>
                  	</tr>
                  	
              </table>
            </div>
            
            
            
             <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px;" >
             
             	<table width="100%">
                	<tr>
                    	<td class="cell_white_lrt TextoIndicativo"  colspan="14" style="padding-left:15px; padding-right:85px;" align="Left">
                        	<label>Los datos se proporcionan bajo protesta de decir verdad, apercibidos de la responsabilidad en que incurre todo aquél que no se conduce con verdad.</label>
                      	</td>
                       
                      </tr>
                      <tr>
                            <td class="cell_white_1 TextoUsuario"  align="center">
                            </td>
                            <td class=" TextoUsuario"  align="center">
                            	
                            </td>
                            <td colspan="2" rowspan="2" class="TextoUsuario"  align="left">
                            
                            <?php 
					  
								  $representante = $model->iDPLAN->iDEMPRESA->iDREPRESENTANTELEGAL;
								  
								  if ($representante->SIGN_PICTURE !== NULL && $representante->SIGN_PASSWD !== NULL  ): ?>
								  
								<img  src="<?='data:image/' . 'gif' . ';base64,'.$representante->getSigningBinary(); ?>" style="height:1cm;width:3cm;" />
									
							<?php endif;?>
										
                            </td>
                            
                            
                            <td colspan="10" class="cell_white_r TextoUsuario"  align="center">
                             
                            </td>
                            
                            
                            
                        </tr>
                       <tr>
                            <td class="cell_white_1 TextoUsuario"  align="center">
                            </td>
                            <td class=" TextoUsuario"  align="left">
                            	<label><?= ($model->iDPLAN->iDEMPRESA->iDREPRESENTANTELEGAL)? $model->iDPLAN->iDEMPRESA->iDREPRESENTANTELEGAL->NOMBRE : ''; ?></label>
                            </td>
                          
                            
                            <td class="TextoUsuario"  align="center">
                            </td>
                             <td class="TextoUsuario"  align="center">
                             	<label><?= $model->LUGAR_INFORME; ?></label>
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                            <td class="cell_white_r TextoUsuario"  align="center">
                             	<label><?= isset($a_fsoli) ? $a_fsoli[6].$a_fsoli[7] : '';?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario"  align="center">
                             	<label><?= isset($a_fsoli) ? $a_fsoli[4].$a_fsoli[5] : '';?></label>
                            </td>
                            <td class=" TextoUsuario"  align="center">
                             	<label><?= isset($a_fsoli) ? $a_fsoli[0].$a_fsoli[1].$a_fsoli[2].$a_fsoli[3] : '';?></label>
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                             <td class="cell_white_r TextoUsuario"  align="center">
                            </td>
                            
                        </tr>
                        <tr>
                        	<td class="cell_white_lr" colspan="14"></td>
                        </tr>
                        
                        <tr>
                            <td class="cell_white_1"  align="center">
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                            	
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                             <td class="cell_white_t TextoUsuario"  align="center">
                             	
                            </td>
                            <td class="TextoUsuario cell_white_t"  align="center">
                            </td>
                            <td class="TextoUsuario cell_white_t"  align="center">
                            </td>
                            <td class="TextoUsuario"  align="center">
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                             	
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                             	
                            </td>
                            <td class="cell_white_t TextoUsuario"  align="center">
                             	
                            </td>
                            <td class="TextoUsuario "  align="center">
                            </td>
                             <td class="cell_white_r TextoUsuario"  align="center">
                            </td>
                            
                        </tr>
                    
                         <tr>
                            <td colspan="4" class="cell_white_lb TextoIndicativo"  style="padding-bottom:8px;" align="center">
                            	<label>Nombre y firma solicitante o representante legal</label>
                            </td>
                          
                            <td colspan="5" class="cell_white_b TextoIndicativo"  align="center">
                            	<label>Lugar y fecha de elaboración de este informe</label>
                            </td>
                             
                            <td colspan="4" class="cell_white_b TextoIndicativo"  align="center">
                            	<label>Fecha de la solicitud</label>
                            </td>
                           
                            <td  class="cell_white_rb TextoIndicativo"  align="center">
                           	</td>
                            
                            
                          </tr>  
                </table>
             </div>
            
            <br />
            
             <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px;" >
             
             	<table width="100%">
                	<tr>
                    	<td class="cell_white_lrbt">
                        	
                                                    <p class="P30">
                                    <span class="T22"> </span>
                                    <span class="T25">Notas e instrucciones</span><br />
                                    <span class="T25">-  Llenar a máquina o con letra de molde.</span><br />
                                    <span class="T25">-  Escribir arriba de cada dígito de la homoclave del Registro Federal de Contribuyentes, la palabra número. Ejemplos: número 0, número 1, número 2,etc.</span><br />
                                    <span class="T25">-  Entregar el formato a la autoridad laboral solamente en original. En su caso, puede presentar una copia si requiere que se le acuse de recibo.</span><br />
                        
                                    <span class="T25">-  La empresa o patrón deberá conservar copia de las constancias reportadas en la o las listas de constancias presentadas ante la autoridad laboral en el formato DC-4 durante el último año.</span><br />
                        
                                    <span class="T25">-  Las empresas deberán adjuntar la información de los trabajadores y de cada constancia de competencias o de habilidades laborales entregada a los trabajadores capacitados.</span><br />
                                    
                                    <span class="T25">-  La falta de información en los datos opcionales, no será motivo para negar la presentación respectiva.</span><br />
                                    
                                    <span class="T25">-  Consultas sobre el trámite llamar a la Dirección General de Capacitación al teléfono 2000-5126 y al correo electrónico registro@stps.gob.mx</span><br />
                                    
                                    <span class="T25">* Datos no obligatorios</span>
                                </p>
                        
                        </td>
                    </tr>
                  </table>
                  
               </div>
               
                <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px; " >
             
             	<table width="100%">
                	<tr>
                    <td class="T25" style="font-style:italic; padding-left:25px; padding-right:25px;" align="center" >De conformidad con los articulos 4 y 69-M, Fracción V de la Ley Federal de Procedimiento Administrativo, los formatos para solicitar trámites y servicios deberán publicarse en el Diario oficial de la Federación  (DOF) </td>
                    </tr>
                   </table> 
                </div> 
                
                 <div align="center" style="width:21cm;" >
             
             	<table width="100%" height="100%">
                	<tr>
                    <td  class="border_top_strong" style="background:#e9e9e9; vertical-align:middle; padding-top:10px; padding-bottom:10px;" width="30%" align="left"><img style="height:2.5cm; width:8cm;"  src="/img/gobrep.jpg" /></td>
                    <td class="border_top_strong" style="background:#e9e9e9; vertical-align:middle; padding-top:10px; padding-bottom:10px;" width="20%" align="left"><img style="height:1.6cm; width:4cm;"  src="/img/indice.jpg" /></td>
                    <td class="border_top_strong" style="background:#e9e9e9; padding-top:10px; padding-bottom:10px;" width="10%" align="center"></td>
                    <td class="border_top_strong" style="background:#e9e9e9; padding-top:10px; padding-bottom:10px;" width="40%" align="left">
                    	<p>
				              <span style="font-size:12pt; font-weight:bold; font-family:Arial Narrow;">Contacto: </span><br/>
                              <span style="font-size:13pt;  font-family:Arial Narrow;">Av. Anillo Periférico Sur 4271,</span><br/>
                              <span style="font-size:13pt;  font-family:Arial Narrow;">Col. Fuentes del Pedregal, Deleg. Tlalpan</span><br/>
                              <span style="font-size:12.5pt;  font-family:Arial Narrow;">Distrito Federal CP 14140</span><br />
                              <span style="font-size:12.5pt;  font-family:Arial Narrow;">Tel: (55) 3000-2100</span>
                        </p>
                    
                    </td>
                    </tr>
                   </table> 
                </div> 
                    
                
		
        
          <div align="center" style="width:21cm;" >
        
        <table border="0" cellspacing="0" cellpadding="0" class="Tabla1">
			
            <tr class="Tabla11">
				
				<td style="text-align:center;width:18cm; height:1.5cm; background:#393c3e;" align="left" class="Tabla1_B1">
					<div style="clear:both; line-height:0; width:0; height:0; margin:10; padding-right:600px"> 
						
						<img style="height:1.2cm;width:2.2cm;" alt="" src="/img/gobmx_header.svg" />
					</div>
				</td>
                </tr>
                <tr class="Tabla11">
				
				<td style="text-align:center;width:21cm; height:1.5cm; background:#e8e8e8; padding-top:10px; " class="Tabla1_B1 Titulos">
                
                	<label classs="">Secretaría del Trabajo y Previsión social</label>
                </td>
                </tr>
		
		</table>
        
        </div>
        
        <br />
        
          <div align="center" style="width:21cm; height:21cm" class="cell_white_lrbt" >
        
		<table border="0" cellspacing="0" cellpadding="0" width="100%" >
	
			<tr >
				<td colspan="4" style="text-align:center; padding-left:140px; padding-right:140px;" class="bordered_cell TextoIndicativo">
					
						<span class="">Establecimientos considerados en la lista de constancias de competencias o de habilidades laborales de capacitación, adiestramiento y productividad</span>
					
				</td>
			</tr>
			<tr >
				<td style="text-align:center;width:3cm; " class="bordered_cell TextoIndicativo">
					<label>Número consecutivo</label>
				</td>
				<td style="text-align:center;width:8cm; padding-left:40px; padding-right:40px; " class="bordered_cell TextoIndicativo">
					<label>Domicilio</label><br />
						<span class="TextoDetalle">(Anotar el domicilio conforme a los datos solicitados en el anverso de este formato, para cada establecimiento adicional)</span>
					
				</td>
				<td style="text-align:center;width:7cm; " class="bordered_cell TextoIndicativo">
					<label>R.F.C. con homoclave (SHCP)</label>
				</td>
				<td style="text-align:center;width:3cm; " class="bordered_cell TextoIndicativo">
					<label>Registro patronal del I.M.S.S.</label>
				</td>
			</tr>
			
			
			<?php for($i=0; $i<50; $i++){?>
			<tr >
				<td style="text-align:center; " class="cell_white_r TextoUsuario">
					<label>
						
						<?php
						if (isset($modelEst[$i]))
						echo $i + 1;

						?></label>
				</td>
				<td style="text-align:left; padding-left:5px;" class="cell_white_r TextoUsuario">
					<label>
						<?php 
						
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
						
						?></label>
				</td>
				<td style="text-align:left; padding-left:5px;"  class="cell_white_r TextoUsuario">
					<label>
						<?php
						if (isset($modelEst[$i]))
							echo $modelEst[$i]->RFC;
						?></label>
				</td>
				<td style="text-align:left; padding-left:5px;"  class="cell_white_l TextoUsuario">
					<label>
						<?php
						if (isset($modelEst[$i]))
							echo $modelEst[$i]->NSS;
						?></label>
				</td>
			</tr>
			<?php }?>
			
		</table>
        
        </div>
        
          <div align="center" style="width:21cm;" >
             
             	<table width="100%" height="100%">
                	<tr>
                    <td  class="border_top_strong" style="background:#e9e9e9; vertical-align:middle; padding-top:10px; padding-bottom:10px;" width="30%" align="left"><img style="height:2.5cm; width:8cm;"  src="/img/gobrep.jpg" /></td>
                    <td class="border_top_strong" style="background:#e9e9e9; vertical-align:middle; padding-top:10px; padding-bottom:10px;" width="20%" align="left"><img style="height:1.6cm; width:4cm;"  src="/img/indice.jpg" /></td>
                    <td class="border_top_strong" style="background:#e9e9e9; padding-top:10px; padding-bottom:10px;" width="10%" align="center"></td>
                    <td class="border_top_strong" style="background:#e9e9e9; padding-top:10px; padding-bottom:10px;" width="40%" align="left">
                    	<p>
				              <span style="font-size:12pt; font-weight:bold; font-family:Arial Narrow;">Contacto: </span><br/>
                              <span style="font-size:13pt;  font-family:Arial Narrow;">Av. Anillo Periférico Sur 4271,</span><br/>
                              <span style="font-size:13pt;  font-family:Arial Narrow;">Col. Fuentes del Pedregal, Deleg. Tlalpan</span><br/>
                              <span style="font-size:12.5pt;  font-family:Arial Narrow;">Distrito Federal CP 14140</span><br />
                              <span style="font-size:12.5pt;  font-family:Arial Narrow;">Tel: (55) 3000-2100</span>
                        </p>
                    
                    </td>
                    </tr>
                   </table> 
                </div> 
	</body>