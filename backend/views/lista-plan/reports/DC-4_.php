<?php
use backend\models\Catalogo; ?>
	<head profile="http://dublincore.org/documents/dcmi-terms/">
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
	.P300 { font-size:10pt; font-family:Arial; writing-mode:lr-tb; text-align:center; vertical-align:super; font-size:58%;font-weight:bold; }
	.P31 { font-size:8pt; font-family:Arial Narrow; writing-mode:lr-tb;  margin-right:0cm; text-indent:0cm; }
	.P32 { font-size:7.5pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:-1.905cm; margin-right:0cm; text-indent:0cm; }
	.P33 { font-size:12pt; font-family:Times New Roman; writing-mode:lr-tb; margin-right:0cm; text-indent:-0.404cm; }
	.P34 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-right:0cm; text-align:right ! important; text-indent:0cm; }
	.P35 { font-size:9.5pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:-2.223cm; margin-right:0cm; text-align:center ! important; text-indent:0cm; }
	.P36 { font-size:7.5pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:-2.223cm; margin-right:0cm; text-indent:0.318cm; }
	.P37 { font-size:7.5pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:-2.223cm; margin-right:0cm; text-indent:0.318cm; }
	.P38 { font-size:9.5pt; font-family:Arial Narrow; writing-mode:lr-tb; margin-left:-2.223cm; margin-right:0cm; text-align:right ! important; text-indent:0.318cm; }
	.P39 { font-size:9pt; font-weight:bold; text-align:center ! important; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P4 { font-size:9pt; font-family:Arial Narrow; writing-mode:lr-tb; }
	.P40 { color:#ffffff; font-size:10pt; font-weight:bold; text-align:center ! important; font-family:Arial; writing-mode:lr-tb; }
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
	.Tabla2_A8 { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla2_A9 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla2_A99 { vertical-align:middle; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none;   writing-mode:lr-tb; }
	
	.Tabla_TN_BN_LS_RN { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:none; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla_TN_BN_LN_RN { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:none; border-left-color:#000000; border-right-style:none; border-top-width:0.0265cm; border-top-style:none; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla_TN_BN_LS_RS { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000;  border-top-width:0.0265cm; border-top-style:none; border-top-color:#000000; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla_TS_BS_LS_RS { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000;  border-top-width:0.0265cm; border-top-style:solid; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla_TN_BS_LS_RS { vertical-align:bottom; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000;  border-top-width:0.0265cm; border-top-style:none; border-top-color:#000000; border-bottom-width:0.0265cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
		
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
	.Tabla3_A100 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:none; border-left-color:#000000; border-right-width:0.0265cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
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
	.Tabla4_A3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
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
	.Tabla4_B3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
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
	.Tabla4_C3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
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
	.Tabla4_D3 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D30 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D31 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-width:0.0176cm; border-bottom-style:solid; border-bottom-color:#000000; writing-mode:lr-tb; }
	.Tabla4_D4 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D5 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D6 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D7 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D8 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla4_D9 { vertical-align:top; padding-left:0.123cm; padding-right:0.123cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0176cm; border-left-style:solid; border-left-color:#000000; border-right-width:0.0176cm; border-right-style:solid; border-right-color:#000000; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
	.Tabla8_A3 { vertical-align:bottom; padding-left:0.191cm; padding-right:0.191cm; padding-top:0cm; padding-bottom:0cm; border-left-width:0.0265cm; border-left-style:solid; border-left-color:#000000; border-right-style:none; border-top-style:none; border-bottom-style:none; writing-mode:lr-tb; }
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
	.T22 { font-family:Arial Narrow; font-size:2pt; font-weight:bold; }
	.T24 { font-family:Arial Narrow; font-size:8pt; font-weight:bold; }
	.T25 { font-family:Arial Narrow; font-size:7pt; }
	.T26 { font-family:Arial Narrow; font-size:7pt; }
	.T27 { font-family:Arial Narrow; font-size:7.5pt; }
	.T31 { vertical-align:super; font-size:58%;font-family:Arial Narrow; font-size:9pt; }
	.T33 { vertical-align:super; font-size:58%;font-family:Arial Narrow; font-size:10pt; }
	.T4 { font-family:Arial; font-size:9pt; }
	.T5 { font-family:Arial; font-size:9pt; }
	.T28 { font-family:Arial Narrow; font-size:9pt; }
	.T6 { font-family:Arial; font-size:8pt; font-weight:bold; }
	.P122{ font-size:9.5pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb; }
	.Titulos{ font-size:11.5pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb;  }
	.TextoIndicativo{ font-size:10pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; }
	.TextoUsuario{ font-size:9.5pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb;  }
	.TextoDetalle{ font-size:6pt; margin-bottom:0cm; margin-top:0cm; font-family:Arial Narrow; writing-mode:lr-tb;  }
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
	.cell_white_l{ border-top-width:none; border-left-width:0.04cm;  border-right-width:none; border-style:solid; border-bottom-width:none; border-color:#c1c1c1; }
	.border_top_strong{ border-top-width:0.04cm;    border-style:solid;  border-color:#414142; }	

	
			<!-- ODF styles with no properties representable as CSS -->
	.Tabla1.1 .Tabla2.1 .Tabla2.14 .Tabla2.16 .Tabla3.1 .Tabla3.14 .Tabla3.2 .Tabla3.5 .Tabla3.6 .Tabla4.1 .Tabla4.2 .T29 .T30 .T8  { }
		</style>
	</head>
	<body dir="ltr" style=" writing-mode:lr-tb; ">
	
	
		<?php

			$trabajador = $constancia->iDTRABAJADOR;

			$curso = $constancia->iDCURSO;
			
			$agente = $curso->iDINSTRUCTOR;
		
			$company = $model->iDPLAN->iDCOMISION->iDEMPRESA;
			
			$a_curp = str_split(strtoupper($trabajador->CURP));
			
			//$a_rfc = str_split(strtoupper($company->RFC));
			
			//$a_nss = str_split(strtoupper($company->NSS));
			
			$a_cp = str_split(strtoupper($company->CODIGO_POSTAL));
			
			$entidadFederativa =  Catalogo::findOne(['CATEGORIA'=>1, 'ID_ELEMENTO'=>$trabajador->ENTIDAD_FEDERATIVA]);
			
			$mpio =  Catalogo::findOne(['CATEGORIA'=>2, 'ID_ELEMENTO'=>$trabajador->MUNICIPIO_DELEGACION]);
			
			$giro =  Catalogo::findOne(['CATEGORIA'=>4, 'ID_ELEMENTO'=>$company->GIRO_PRINCIPAL]);
			
			$ocupacion =  Catalogo::findOne(['CATEGORIA'=>5, 'ID_ELEMENTO'=>$trabajador->OCUPACION_ESPECIFICA]);
			
			$areaTematica = Catalogo::findOne(['CATEGORIA'=>6, 'ID_ELEMENTO'=>$curso->AREA_TEMATICA]);

			$ntcl = Catalogo::findOne(['CATEGORIA'=>Catalogo::CATEGORIA_NTCL, 'ID_ELEMENTO'=>$trabajador->NTCL]);
			
			/**
			@todo: revisar invertir el arreglo
			 */
			
			
			$a_fConst =  str_split(strtoupper(''.date("Ymd", strtotime(($model->iDPLAN->VIGENCIA_INICIO!==null)?$model->iDPLAN->VIGENCIA_INICIO:'1910-01-01'))));
			$a_fElab =  str_split(strtoupper(''.date("Ymd", strtotime(($model->iDPLAN->VIGENCIA_FIN!==null)?$model->iDPLAN->VIGENCIA_FIN:'1910-01-01'))));
			
			$a_fEmisionCertificado = ($constancia->FECHA_EMISION_CERTIFICADO!== null ) ? 
			str_split(strtoupper(''.date("Ymd", strtotime(($constancia->FECHA_EMISION_CERTIFICADO!==null)?$constancia->FECHA_EMISION_CERTIFICADO:'1900-01-01')))) : null;
			
			$a_fTerminoCurso = ($curso->FECHA_TERMINO!== null ) ? 
			str_split(strtoupper(''.date("Ymd", strtotime(($curso->FECHA_TERMINO!==null)?$curso->FECHA_TERMINO:'1900-01-01')))) : null;
	
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
				
				<td style="text-align:center;width:21cm; height:1.5cm; background:#e8e8e8; padding-top:15px; " class="Tabla1_B1 Titulos">
                
                	<label classs="">Secretaría del Trabajo y Previsión social</label>
                </td>
                </tr>
		
		</table>
    
     <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:20px; padding-bottom:20px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell TextoIndicativo" align="center"><label>Datos del trabajador</label></td>
                        </tr>
                    </table>
                </div>
                
       <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px; padding-bottom:10px;" >
             
             	<table width="100%">
                	<tr>
                    	<td colspan="3" class="bordered_cell TextoIndicativo" align="center" width="50%"><label>Clave Única de Registro de Población</label></td>
                    	<td  class="bordered_cell TextoIndicativo" colspan="3" align="center" width="50%"><label>Ocupación especifica <span class="TextoDetalle">(consultar el catálogo al reverso)</span> </label></td>
                    	                                                
                    </tr>
                    <tr>
                    	<td colspan="3" class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" width="50%" align="center"><label><?=$trabajador->CURP; ?> </label></td>
                    	
                        <td colspan="3" class="cell_white_lrbt TextoUsuario" style="padding-bottom:8px;" align="center" width="50%"><label><?=   isset($ocupacion)? $ocupacion->NOMBRE : ' '; ?></label></td>                    
                     </tr>
                     
                     <tr>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" width="33%" align="center" ><label>Nombre</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" width="33%" align="center" ><label>Primer apellido</label></td>
                    	<td colspan="2" class="bordered_cell TextoIndicativo" width="34%" align="center"><label>Segundo apellido </label></td>
                    	
                    </tr>
                    
                    <tr>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="33%" align="center" ><label><?= $trabajador->NOMBRE;?>&nbsp;</label></td>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="33%" align="center" ><label><?= $trabajador->APP;?></label></td>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="34%" align="center"><label><?= $trabajador->APM;?> </label></td>
                    	
                    </tr>
                    
                     <tr>
                    	<td class="bordered_cell TextoIndicativo" colspan="2"  align="center" ><label>Código postal</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2"  align="center" ><label>Calle</label></td>
                    	<td  class="bordered_cell TextoIndicativo"  align="center"><label>Número exterior </label></td>
                        <td  class="bordered_cell TextoIndicativo"  align="center"><label>Número Interior </label></td>
                    	
                    </tr>
                    
                    <tr>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2"  align="center" ><label><?= $trabajador->CODIGO_POSTAL ;?>&nbsp;</label></td>
                    	<td class="cell_white_lrbt TextoUsuario" colspan="2"  align="center" ><label><?= $trabajador->CALLE;?></label></td>
                    	<td  class="cell_white_lrbt TextoUsuario"  align="center"><label><?= $trabajador->NUMERO_INTERIOR;?> </label></td>
                        <td  class="cell_white_lrbt TextoUsuario"  align="center"><label><?= $trabajador->NUMERO_EXTERIOR;?> </label></td>
                    	
                    </tr>
                    
                    <tr>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" width="33%" align="center" ><label>Colonia</label></td>
                    	<td class="bordered_cell TextoIndicativo" colspan="2" width="33%" align="center" ><label>Municipio o Delegación</label></td>
                    	<td colspan="2" class="bordered_cell TextoIndicativo" width="34%" align="center"><label>Estado o Distrito Federal</label></td>
                    	
                    </tr>
                    
                    <tr>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="33%" align="center" ><label><?= $trabajador->COLONIA;?></label></td>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="33%" align="center" ><label><?= $trabajador->MUNICIPIO_DELEGACION;?></label></td>
                    	<td colspan="2" class="cell_white_lrbt TextoUsuario" width="34%" align="center"><label><?= $trabajador->ENTIDAD_FEDERATIVA;?> </label></td>
                    	
                    </tr>
                    
                </table>
             
             </div>  
             
               <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:10px; padding-bottom:20px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell TextoIndicativo" align="center"><label>Datos de certificación de competencias laborales</label></td>
                        </tr>
                    </table>
                </div>   
                
                 <div align="center" style="width:21cm; padding-left:3px; padding-right:3px;" >
                
             
					<table width="100%" >
                       <tr>
                        	<td class="bordered_cell TextoIndicativo"  width="50%" align="center">
                            	<label >Nombre de la norma o estandar*</label>
                            </td>
                            <td width="50%" colspan="3" class="bordered_cell TextoIndicativo" align="center">
                            	<label >Fecha de emisión del certificado</label>                            	
                            </td>
                           
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lr">

                            </td>
                            <td colspan="3" class="cell_white_lr">
                            	
                            </td>
                            
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lr TextoUsuario">
                            	<label><?= isset($ntcl)? $ntcl->NOMBRE : '  '; ?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?= isset($a_fEmisionCertificado) ? $a_fEmisionCertificado[6].$a_fEmisionCertificado[7] : '';?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center" >
	                           	<label><?= isset($a_fEmisionCertificado) ? $a_fEmisionCertificado[4].$a_fEmisionCertificado[5] : '';?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?= isset($a_fEmisionCertificado) ? $a_fEmisionCertificado[0].$a_fEmisionCertificado[1].$a_fEmisionCertificado[2].$a_fEmisionCertificado[3] : '';?></label>
                            </td>
                           
                        </tr>
                        <tr>
                        	<td align="center" class="cell_white_lrb">

                            </td>
                            <td colspan="3" class="cell_white_lrb">
                            	
                            </td>
                            
                        </tr>
                    </table>                
                </div>
                
                  <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:15px;" >
                
             
					<table width="100%" >
                       <tr>
                        	<td class="bordered_cell TextoIndicativo" colspan="7"  width="100%" align="center">
                            	<label >Datos académicos</label>
                            </td>
                           
                           
                        </tr>
                        <tr>
                        	<td colspan="3" width="60%" align="left" class="cell_white_lr TextoIndicativo">
								<label >Nivel Máximo de estudios terminados</label>
                            </td>
                            <td colspan="3" width="20%"  class="cell_white_lr TextoIndicativo">
                            	<label >Documento probatorio</label>
                            </td>
                            <td colspan="1" width="20%"  class="cell_white_lr TextoIndicativo">
                            	<label >Institución educativa*</label>
                            </td>
                            
                        </tr>
                        <tr>
                        	<td align="left" class="cell_white_l TextoIndicativo" valign="bottom">
                            	
                                <?php if ($trabajador->GRADO_ESTUDIO === 0): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                                
                                <label>0.Ninguna</label>
                            </td>
                            <td align="left" class="TextoIndicativo">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 3): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	
                            	<label>3.Bachillerato</label>
                            </td>
                            <td align="left" class="cell_white_r TextoIndicativo">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 6): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?><label>6.Maestria</label>
                            </td>
                            <td align="left" class="cell_white_l TextoIndicativo">
                            	
                            		 <?php if ($trabajador->DOCUMENTO_PROBATORIO === 1): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>1.Titulo</label>
                            </td>
                            <td colspan="1" align="left" class=" TextoIndicativo">
                            	
                            		 <?php if ($trabajador->DOCUMENTO_PROBATORIO === 4): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>4.Otro</label>
                            </td>
                             <td colspan="1" align="left" class="cell_white_r TextoIndicativo">
                            	<label>&nbsp;</label>
                            </td>
                            <td colspan="1" align="left" class="cell_white_lr TextoIndicativo">
                            	<?php if ($trabajador->INSTITUCION_EDUCATIVA === 1): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>1.Publica</label>
                            </td>
                            
                           
                        </tr>
                        
                        <tr>
                        	<td align="left" class="cell_white_l TextoIndicativo">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 1): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>1.Primaria</label>
                            </td>
                            <td align="left" class="TextoIndicativo">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 4): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	
                            	<label>4.Carrera Técnica</label>
                            </td>
                            <td align="left" class="cell_white_r TextoIndicativo">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 7): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>7.Especialidad</label>
                            </td>
                            <td align="left" class="cell_white_l TextoIndicativo">
                            	 <?php if ($trabajador->DOCUMENTO_PROBATORIO === 2): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>	
							<label>2.Certificado</label>
                            </td>
                            <td colspan="1" align="left" class="TextoIndicativo">
                            	<label>&nbsp;</label>
                            </td>
                             <td colspan="1" align="left" class="cell_white_r TextoIndicativo">
                            	<label>&nbsp;</label>
                            </td>
                            <td colspan="1" align="left" class="cell_white_lr TextoIndicativo">
                            	<?php if ($trabajador->INSTITUCION_EDUCATIVA === 2): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>2.Privada</label>
                            </td>
                            
                           
                        </tr>
                        
                           <tr>
                        	<td align="left" class="cell_white_lb TextoIndicativo" style="padding-bottom:15px;">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 2): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>2.Secundaria</label>
                            </td>
                            <td align="left" class="cell_white_b TextoIndicativo" style="padding-bottom:15px;">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 5): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>5.Licenciatura</label>
                            </td>
                            <td align="left" class="cell_white_rb TextoIndicativo" style="padding-bottom:15px;">
                            	 <?php if ($trabajador->GRADO_ESTUDIO === 8): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	<label>8.Doctorado</label>
                            </td>
                            <td align="left" class="cell_white_lb TextoIndicativo" style="padding-bottom:15px;">
                            	 <?php if ($trabajador->DOCUMENTO_PROBATORIO === 3): ?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" /> 
                                <?php else:?>
                                	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                <?php endif;?>
                            	
                            	<label>3.Diploma</label>
                            </td>
                            <td colspan="1" align="left" class="cell_white_b TextoIndicativo" style="padding-bottom:15px;">
                            	<label>&nbsp;</label>
                            </td>
                             <td colspan="1" align="left" class="cell_white_rb TextoIndicativo" style="padding-bottom:15px;">
                            	<label>&nbsp;</label>
                            </td>
                            <td colspan="1" align="left" class="cell_white_lrb TextoIndicativo" style="padding-bottom:15px;">
                            	<label>&nbsp;</label>
                            </td>
                            
                           
                        </tr>
                      
                    </table>                
                </div>
                
                  <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:15px; padding-bottom:20px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell TextoIndicativo" align="center"><label>Datos de capacitación</label></td>
                        </tr>
                    </table>
                </div>  
                
                 <div align="center" style="width:21cm; padding-left:3px; padding-right:3px;" >
                
             
					<table width="100%" >
                    
                    
                       <tr>
                        	<td  colspan="3" class="bordered_cell TextoIndicativo"  width="50%" align="center">
                            	<label >Nombre del curso</label>
                            </td>
                            <td width="50%" colspan="3" class="bordered_cell TextoIndicativo" align="center">
                            	<label >Duración (horas)</label>                            	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td colspan="3" class="cell_white_lrbt TextoUsuario"  width="50%" align="center">
                            	<label ><?=$curso->NOMBRE; ?>&nbsp;</label>
                            </td>
                            <td width="50%" colspan="3" class="cell_white_lrbt TextoUsuario" align="center">
                            	<label ><?=$curso->DURACION_HORAS; ?>&nbsp;</label>                        	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td colspan="3" class="bordered_cell TextoIndicativo"  width="50%" align="center">
                            	<label >Área tematica del curso (consultar cátalogo al reverso)</label>
                            </td>
                            <td width="50%" colspan="3" class="bordered_cell TextoIndicativo" align="center">
                            	<label >Fecha de término</label>                            	
                            </td>
                           
                        </tr>
                        <tr>
                        	<td colspan="3" align="center" class="cell_white_lr">

                            </td>
                            <td colspan="3" class="cell_white_lr">
                            	
                            </td>
                            
                        </tr>
                        <tr>
                        	<td align="center" colspan="3" class="cell_white_lr TextoUsuario">
                            	<label><?=trim(isset($areaTematica)?$areaTematica->NOMBRE:'') ?>&nbsp;</label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?=trim(isset($a_fTerminoCurso)?$a_fTerminoCurso[6].$a_fTerminoCurso[7]:'') ?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center" >
	                           	<label><?=trim(isset($a_fTerminoCurso)?$a_fTerminoCurso[4].$a_fTerminoCurso[5]:'') ?></label>
                            </td>
                            <td class="cell_white_r TextoUsuario" align="center">
                            	<label><?= isset($a_fTerminoCurso) ? $a_fTerminoCurso[0].$a_fTerminoCurso[1].$a_fTerminoCurso[2].$a_fTerminoCurso[3] : '';?></label>
                            </td>
                           
                        </tr>
                        <tr>
                        	<td align="center" colspan="3" class="cell_white_lrb">

                            </td>
                            <td colspan="3" class="cell_white_lrb">
                            	
                            </td>
                            
                        </tr>
                        
                         <tr>
                        	<td class="bordered_cell TextoIndicativo" colspan="3" width="50%" align="center">
                            	<label >Agente capacitador</label>
                            </td>
                            <td width="50%" colspan="3" class="bordered_cell TextoUsuario" align="left">
                            	<label >No registro agente capacitador ante la STPS o encaso de otro especificar (provedor de bienes y servicios extranjeros: STPS)</label>                            	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td  width="15%" align="left" style="padding-bottom:15px;" class="cell_white_lb TextoIndicativo">
                            	
                                <?php 
						
									if (isset($agente) && ($agente->TIPO_INSTRUCTOR === 1 || $agente->TIPO_INSTRUCTOR === 4 )): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>   
                                
                                <label>1.Interno</label>
                            </td>
                            <td width="15%" align="left" class="cell_white_lb TextoIndicativo" style="padding-bottom:15px;">
                            	  <?php 
						
									if (isset($agente) && ($agente->TIPO_INSTRUCTOR === 2 || $agente->TIPO_INSTRUCTOR === 3 )): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	
                            	<label>2.Externo</label>
                            </td>
                            <td width="20%" align="left" class="cell_white_lb TextoIndicativo" style="padding-bottom:15px;">
                            	<?php if (isset($agente) && ($agente->TIPO_INSTRUCTOR !== 1 && $agente->TIPO_INSTRUCTOR !== 2 && $agente->TIPO_INSTRUCTOR !== 3 && $agente->TIPO_INSTRUCTOR !== 4 )): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?> 
                            	
                            	<label>2.Otro</label>
                            </td>
                            <td width="50%" colspan="3" class="cell_white_lrbt TextoUsuario" align="center" style="padding-bottom:15px;">
                            	<label ><?= isset($agente)?$agente->NUM_REGISTRO_AGENTE_EXTERNO : ' ';?></label>                        	
                            </td>
                           
                        </tr>
                        
                        
                        
                    </table>                
                </div>
      
    			
                    <div align="center" style="width:21cm; padding-top:150px" >
             
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
                        
                    
                    </td>
                    </tr>
                   </table> 
                </div> 
                
                
                  <div align="center" style="width:21cm;  " >
                
                    <table border="0" cellspacing="0" cellpadding="0" class="Tabla1">
			
            <tr class="Tabla11">
				
				<td style="text-align:center;width:18cm; height:1.5cm; background:#393c3e;" align="left" class="Tabla1_B1">
					<div style="clear:both; line-height:0; width:0; height:0; margin:10; padding-right:600px"> 
						
						<img style="height:1.2cm;width:2.2cm;" alt="" src="/img/gobmx_header.svg" />
					</div>
				</td>
                </tr>
                <tr class="Tabla11">
				
				<td style="text-align:center;width:21cm; height:1.5cm; background:#e8e8e8; padding-top:15px; " class="Tabla1_B1 Titulos">
                
                	<label classs="">Secretaría del Trabajo y Previsión social</label>
                </td>
                </tr>
		
		</table>
        </div>
        
        
          <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:10px; padding-bottom:5px;" >
                
             
					<table width="100%" >
                    
                    
                       <tr>
                        	<td   class="bordered_cell TextoIndicativo"  width="50%" align="center">
                            	<label >Modalidad de la capacitación</label>
                            </td>
                            <td width="50%" class="bordered_cell TextoIndicativo" align="center">
                            	<label >Objetivo de la capacitación</label>                            	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            		<?php	if ($curso && $curso->MODALIDAD_CAPACITACION == 1 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                                     
                            	<label >1. Presencial</label>
                            </td>
                            <td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            	<?php	if (isset($curso) && $curso->OBJETIVO_CAPACITACION == 1 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	<label >1. Actualizar y perfeccionar conocimientos y habilidades y proporcionar información de nuevas tecnologías</label>                        	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            		<?php	if (isset($curso) && $curso->MODALIDAD_CAPACITACION == 2 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                                     
                            	<label >2. En linea</label>
                            </td>
                            <td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            	<?php	if ($curso && $curso->OBJETIVO_CAPACITACION == 2 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	<label >2. Prevenir riesgos de trabajo</label>                        	
                            </td>
                           
                        </tr>
                        
                          <tr>
                        	<td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            		<?php	if (isset($curso) && $curso->MODALIDAD_CAPACITACION == 3 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                                     
                            	<label >3. Mixta</label>
                            </td>
                            <td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            	<?php	if (isset($curso) && $curso->OBJETIVO_CAPACITACION == 3 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	<label >3. Incrementar la productividad </label>                        	
                            </td>
                           
                        </tr>    
                        
                        <tr>
                        	<td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                                     
                            	<label >&nbsp;</label>
                            </td>
                            <td  class="cell_white_lr TextoUsuario"  width="50%" align="left">
                            
                            	<?php	if (isset($curso) && $curso->OBJETIVO_CAPACITACION == 4 ): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	<label >4. Mejorar el nivel educativo </label>                        	
                            </td>
                           
                        </tr>
                        
                        <tr>
                        	<td  class="cell_white_lrb TextoUsuario"  width="50%" align="left">
                            
                                     
                            	<label >&nbsp;</label>
                            </td>
                            <td  class="cell_white_lrb TextoUsuario"  width="50%" align="left">
                            
                            	<?php	if (isset($curso) && $curso->OBJETIVO_CAPACITACION == 5): ?>
							
                                		<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita_select.jpg" />
                                    
                                    <?php else : ?>
                                    
                                    	<img style="height:0.5cm;width:0.5cm;" alt="" src="/img/bolita.jpg" />
                                        
                                     <?php endif; ?>  
                            	<label >5. Preparar para ocupar vacantes o puestos de nueva creación </label>                        	
                            </td>
                           
                        </tr>
                        
                     </table>
                     
             </div>
             
                          <div align="center" style="width:21cm;  padding-left:3px; padding-right:3px; padding-top:5px;" >
             
             	<table width="100%">
                	<tr>
                    	<td class="cell_white_lrbt">
                        	
                               <p class="P30">
                                   	<span class="T25">Notas e instrucciones</span><br />
			<span class="T25">- Llenar a máquina o con letra de molde.</span><br />
			<span class="T25">- Entregar el formato a la autoridad laboral solamente en original.</span><br />
			<span class="T25">- El Catálogo Nacional de Ocupaciones se encuentra disponible en el reverso de la segunda parte del formato DC-4 y en la página www.stps.gob.mx</span><br />

			<span class="T25">- El catálogo de áreas temáticas se encuentra disponible en el reverso de la segunda parte del formato DC-4 y en la página www.stps.gob.mx</span><br />

			<span class="T25">- En caso de que el trabajador haya recibido más de una constancias de competencias o de habilidades laborales, deberá proporcionar del apartado “Datos del Trabajador” únicamente su nombre y los datos de capacitación las veces que sean necesario en el formato DC-4 (segunda parte), así como  en su caso, los datos que requiera actualizar. </span><br />
			
			<span class="T25">- La falta de información en los datos opcionales, no será motivo para negar la presentación respectiva.</span><br />
								
			<span class="T25">* Datos no obligatorios</span>
                                
                        
                        </td>
                    </tr>
                  </table>
                  
                  
               </div>      
               
               <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:10px; padding-bottom:10px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell TextoIndicativo" align="center"><label>Claves y denominaciones de área y subáeras del Catálogo Nacional de Ocupaciones</label></td>
                        </tr>
                    </table>
               </div>
               
    	<div style="width:21cm; "  id="Marco1">
				<!--Next 'div' was a 'draw:text-box'.-->
				
					<table  width="100%">
						
						<tr >
							<td style="text-align:center;width:20%; " class="bordered_cell TextoDetalle">
								CLAVE DEL ÁREA/SUBÁREA
							</td>
							<td style="text-align:center;width:30%; " class="bordered_cell TextoDetalle">
								
									DENOMINACIÓN
								
							</td>
							
							<td style="text-align:center;width:20%; " class="bordered_cell TextoDetalle">
								CLAVE DEL ÁREA/SUBÁREA
							</td>
							<td style="text-align:center;width:30%; " class="bordered_cell TextoDetalle">
									DENOMINACIÓN
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								01
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Cultivo, crianza y aprovechamiento
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Transporte
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								01.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Agricultura y silvicultura
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Ferroviario
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								01.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Ganadería
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Autotransporte
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								01.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Pesca y acuacultura
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Aéreo
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Marítimo y fluvial
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Extracción y suministro
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								06.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicios de apoyo
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Exploración
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Extracción
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Provisión de bienes y servicios
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Refinación y beneficio
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Comercio
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Provisión de energía
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Alimentación y hospedaje
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								02.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Provisión de agua
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Turismo
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Deporte y esparcimiento
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								03
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Construcción
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicios personales
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								03.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Planeación y dirección de obras
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.6
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Reparación de artículos de uso doméstico y personal
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								03.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Edificación y urbanización
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.7
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Limpieza
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								03.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Acabado
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								07.8
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicio postal y mensajería
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								03.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Instalación y mantenimiento
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								08
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Gestión y soporte administrativo
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Tecnología
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								08.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Bolsa, banca y seguros
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Mecánica
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								08.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Administración
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Electricidad
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								08.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicios legales
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Electrónica
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Informática
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								09
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Salud  y protección social
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Telecomunicaciones
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								09.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicios médicos
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								04.6
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Procesos industriales
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								09.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Inspección sanitaria y del medio ambiente
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								09.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Seguridad social
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Procesamiento y fabricación
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								09.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Protección de bienes y/o personas
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Minerales no metálicos
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Metales
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Comunicación
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Alimentos y bebidas
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Publicación
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Textiles y prendas de vestir
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Radio, cine, televisión y teatro
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Materia orgánica
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10.3
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Interpretación artística
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.6
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Productos químicos
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10.4
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Traducción e interpretación lingüística
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.7
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Productos metálicos y de hule y plástico
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								10.5
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Publicidad, propaganda y relaciones públicas
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.8
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Productos eléctricos y electrónicos
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								05.9
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Productos impresos
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								11
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Desarrollo y extensión del conocimiento
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								11.1
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Investigación
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								11.2
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Enseñanza
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								<p class="P34"> 
							</td>
							
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								11.3
							</td>
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								Difusión cultural
							</td>
						</tr>
					</table>
				
			</div>			           
                
          <div align="center" style="width:21cm; padding-top:2px" >
             
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
                        
                    
                    </td>
                    </tr>
            </table> 
    </div>  
                
        <div align="center" style="width:21cm;  " >
                
                    <table border="0" cellspacing="0" cellpadding="0" class="Tabla1">
			
            <tr class="Tabla11">
				
				<td style="text-align:center;width:18cm; height:1.5cm; background:#393c3e;" align="left" class="Tabla1_B1">
					<div style="clear:both; line-height:0; width:0; height:0; margin:10; padding-right:600px"> 
						
						<img style="height:1.2cm;width:2.2cm;" alt="" src="/img/gobmx_header.svg" />
					</div>
				</td>
                </tr>
                <tr class="Tabla11">
				
				<td style="text-align:center;width:21cm; height:1.5cm; background:#e8e8e8; padding-top:15px; " class="Tabla1_B1 Titulos">
                
                	<label classs="">Secretaría del Trabajo y Previsión social</label>
                </td>
                </tr>
		
		</table>
        </div>   
	
    <div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:15px; padding-bottom:10px;"  >
                	<table width="100%">
                    	<tr>
                        	<td class="bordered_cell TextoIndicativo" align="center"><label>Claves y denominacioones del catálogo de áreas temáticas de los cursos</label></td>
                        </tr>
                    </table>
               </div>
               
               
<div align="center" style="width:21cm; padding-left:3px; padding-right:3px; padding-top:15px; padding-bottom:10px;"  >
					<table width="100%">
						
						<tr >
							<td style="text-align:center;" class="bordered_cell TextoUsuario">
								CLAVE DEL ÁREA 
							</td>
							<td style="text-align:center;" class="bordered_cell TextoUsuario">
								DENOMINACIÓN
							</td>
							<td style="text-align:center;" class="bordered_cell TextoUsuario">
								CLAVE DEL ÁREA 
							</td>
							<td style="text-align:center;" class="bordered_cell TextoUsuario">
								DENOMINACIÓN
							</td>
						</tr>
						<tr >
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								1000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Producción general
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								6000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Seguridad
							</td>
						</tr>
						<tr class="Tabla63">
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								2000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Servicios
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								7000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Desarrollo personal y familiar
							</td>
						</tr>
						<tr class="Tabla63">
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								3000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Administración, contabilidad y economía
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								8000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								
									Uso de tecnologías de la información y  comunicación
								
							</td>
						</tr>
						<tr class="Tabla63">
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								4000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								Comercialización
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								9000
							</td>
							<td style="text-align:center;" class="cell_white_lr TextoDetalle">
								
									Participación social
								
							</td>
						</tr>
						<tr class="Tabla63">
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								5000
							</td>
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								Mantenimiento y reparación
							</td>
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								<p class="P33"> 
							</td>
							<td style="text-align:center;" class="cell_white_lrb TextoDetalle">
								<p class="P34"> 
							</td>
						</tr>
					</table>
				</div>
                
                
                          <div align="center" style="width:21cm; padding-top:700px" >
             
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
                        
                    
                    </td>
                    </tr>
            </table> 
    </div> 
    
	</body>