<?php /*----------------------------------------*/
					NA-MIX
			ALGORITHM Pseudocode Math Proccesing AND Schema
        /*---------------------------------------*/
		
/* APPS */
	/*-----------*/
	/* ..OFFICE..*/
	/*-----------*/	
			[1.0]Algorithm Proses ENTRI KARYAWAN
				NA_SITE/NA_OFFICE/OFC_KRY_01_M_IN_KRY.php
				
				
				{
					#Mining
						@na_ofc_kry_01 = D1
						@na_ofc_kry_01_jbt = D2
						@na_ofc_kry_div = D3
						@na_ofc_lokasi_01 = D4
					#Set Variabel
						EP
						D1 = ?
						{D2}
						{D3}
						{D4}
					#Proccess
						EP + 'D2-4'INSERT D1 
					#Execute
						EP [D1]
					#Result
						D1 Inserted
				}
		/*.........................................................*/
			
			[2.0]Algorithm Proses ENTRI AKTA 
				NA_SITE/NA_OFFICE/OFC_KRY_01_M_DTL_M_H_AKT.php
				
				{
					#Mining
						@na_ofc_kry_01_akta = D1
						@na_ofc_berkas_01 = D2
						@na_ofc_kry_01 = D3
					#Set Variabel
						D1 = ?
						D2 = ?
						EP
						D3
					#Proccess
						IF D1<0 EP[D3] INSERT D1
						IF D1>0 EP[D1,D3] UPLOAD D1
						IF D1>0 EP[D1,D3] UPLOAD D2
					#Execute
						EP [D1]
						EP [D2]
					#Result
						D1 INSERTED
						D2 UPLOADED
						D1 UPLOADED
				}
		/* ........................................................ */
	
	/*---------------------------------------------------------*/
	/* ..Purchasing............................................*/
	/*--------------------------------------------------------*/	
		
			[1.0]Algorithm Proses ENTRI PR
				NA_SITE/NA_OFFICE/PRC_01_PR_M_IN.php
				
				{
					#Mining
						@na_prc_01_vnd = D1
						@na_prc_01_produk = D2
						@na_prc_01_pr = D3
					#Set Variabel
						EP
						D1
						D2
						D3 = ?
					#Proccess
						EP + 'D1-D2' INSERT D3
					#Execute
						EP[D3]
					#Result
						D3 INSERTED
				}
		/* ................................................... */
		
				
			[2.0]Algorithm Proses ENTRI PR -> PO
				NA_SITE/NA_OFFICE/PRC_01_PO_M_PR_02.php
				
				{
					#Mining
						@na_prc_01_vnd = D1
						@na_prc_01_produk = D2
						@na_prc_01_pr = D3
						@na_prc_01_po = D4
					#Set Variabel
						EP
						UP
						D1
						D2
						D3 = ?
						D4 = ?
					#Proccess 
						EP + 'D1-3' INSERT D4
						UP IF D4 INSERT UPDATE D3:'Status='4'
					#Execute
						EP [D4]
						UP [D3]
					#Result
						D4 Inserted
						D3 UPDATED
				}
		/* .................................................... */
		
			[3.0]Algorithm Proses ENTRI PO NOTA Detail
				NA_SITE/NA_OFFICE/PRC_01_PO_M_NOTA_IN_02.php
				
				{
					#Mining
						@na_prc_01_nota = D1
						@na_prc_01_po = D2
						@na_prc_nota_dtl = D3
					#Set Variabel
						EP
						UP
						D1
						D2
						D3 = ?
					#Proccess
						EP + 'D1-2' 
							[ IF D1 'status'='1' SHOW IN EP]
							INSERT D3 AND EU + 'D3' UPDATE D2:'status'='4'
							[IF INSERTED CONFIRM D3]
					#Execute
						EP [D3]
						UP[D2]
					#Result
						D3 Inserted
						D2 UPDATED
				}
		/*....................................................*/
				
				[4.0]Algorithm Proses RCV NOTA
					NA_SITE/NA_OFFICE/PRC_01_PO_M_NOTA_RCV.php
					
					{
						#Mining
							@na_prc_01_po = D1
							@na_prc_01_pr = D2
							@na_prc_01_nota_dtl = D3
						#Set Variabel
							UP
							D1
							D2
							D3
						#Proccess
							UP UPDATE D1:'status'='2':'jml'='jmlkirim'
							UP UPDATE D2:'status'='2'
							UP UPDATE D3:'status'='2':'jml'='jmlkirim'
						#Execute
							UP [D1]
							UP [D2]
							UP [D3]
						#Result
							D1 UPDATE
							D2 UPDATE
							D3 UPDATE
					}
		/* ...................................................... */				
						
				[5.0]Algorithm LAP Penggunaan Budget
					 NA_SITE/NA_OFFICE/PRC_01_LAP_BCTRL_M_USE.php
						
					{
						#Mining
							@na_prc_01_bctrl = D1
							@na_prc_01_po = D2
						#Set Variabel
							VP
							D1
							D2
						#Proccess
							VP + 'D1-2' 
								[SHOW D1:'Saldo'='Nominal' IF 'Status'='2']
								[SUM D2:'harga'='Total']
								[D1] - [D2]
							SHOW VP[D1][D2]
						#Execute
							VP [D1]
							VP [D2]
						#Result
							D1 SHOW 
							D2 SHOW
					}
		/*.................................................*/
							
	/*---------------------------------------------------------*/
	/* ..warehouse Inventory...................................*/
	/*--------------------------------------------------------*/
				[6.0] Algoritma Entri Qty !=> PO
					
					{
						#Mining
							@na_wh_01_brg = D1
							@na_wh_01_brg_rec_qty = D2
						#Set Variabel
							UP
							EP
							D1
							D2
						#Proccess
							EP INSERT [D2] 
								THEN UP UPDATE D1:'QTY'+'New QTY'
						#Execute
							EP [D2]
							UP [D1]
						#Result
							D2 INSERTED
							D1 UPDATED
					}
		/*.................................................*/
				
				[7.0]Algorithm Update Qty => PO
					 
					 
					 {
						#Mining
							@na_prc_01_po = D1
							@na_wh_01_brg = D2
							@na_prc_01_nota_dtl = D3
							@na_prc_01_nota = D4
							@na_wh_01_brg_rec_qty = D5
						#Set Variabel
							UP
							EP
							VP
							D1
							D2
							D3
							D4
						#Proccess
							EP SEARCHING [D4] 
							VP SHOWING [D4]GET[D3]GET[D1]
							EP CHOOSING VP [D3][D4]
							EP INSERT [D5]
							UP UPDATE [D2] 'qty'='qty'
						#Execute
							EP[D5]
							UP[D2]
						
						#Result
							D2 UPDATE
							D5 INSERTED
					 }
		/*..................................................................*/
				
				[8.0]Alogirthm Mutasi Stock
					[
						1.Cari Stock / Material Terkait
						2.pilih Qty untuk mutasi
						3.simpan beberapa perubahan data
						
					
					]
					
					{
						#Mining
							
					
					}
						
			
							
							
					
							
						 
						
				
					
			
						
						
				
				
		
?>