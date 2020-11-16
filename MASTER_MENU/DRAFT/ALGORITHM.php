<?php

/*....................................*/
/*  ALGORITHM algoritma pseudocode Concept */
/*....................................*/
?>

	<?php
		/*Keuangan*/
			// Export tagihan mahasiswa per angakatan //
				1.pilih jenis tagihan
				2.Pilih angkatan
				3.menampilkan list mahasiswa sesuai angkatan
					[
						3.1 Filter kelas 
					]
				4.tampilkan nominal tagihan 
					[
						4.1 pengkondisian gelombang pendaftaran
						4.2 tampilkan nominal setelah pengkondisian 
							[
								4.2.1.A	pengkodisian berdasarkan UTS dan UAS 
										[
											4.2.1.A.
										]
							]
							[
								4.2.1	jika tipe tagihan sks jumlahkan dengan pengambilan sks mahasiswa
								4.2.2	SPP
							]
					]
				5.Entri nominal tagihan
				6.Data tersimpan / Terunggah
				
				// Export tagihan mahasiswa semi global //
					1. form prosedure tagihan global
						[
						 	1.1 CHOOSE jenis tagihan(tb_jenis_tagihan)
							1.2 fetching datta mahasiswa global
							1.3 rendering tagihan 
								[
									1.3.A fetching (tb_tagihan_01)
									1.3.B GET data sort by (jenis tagihan,gelombang,kode,kelas) FROM (mahasiswa|Golbal)
									1.3.C 
									
								]
						]
					
					
				
				//update BRIVA & HIJACK UAS UTS mahasiswa 
					1. tampilan Daftar Briva(mahasiswa yang sudah membyaar di briva)
						[
							1.1 sort by tanggal 1 hari
							1.2 sorting mahasiswa yang aktif dan sudah membayar di briva
							1.3 Update data(biaya_02_rekam_bri)
						]
					
					2. pemrosesan data hijack(global Update)
						[
							2.1 tampilkan data mahasiswa
								[
									2.1.A IF status mahasiswa(mahasiswa) = 2(aktif) 
									2.1.B IF TAGIHAN  [app=2] (biaya_02_rekam_bri) berdasarkan semester aktif next status UTS = 2 [OPT 1]
									2.1.B IF TAGIHAN [app=1 OR APP app=3] (biaya_02_rekam_bri) berdasarkan semester aktif next status UTS = 2 [OPT 2]
												/*
													Issue
														 jika row kosong makan tetap dianggap tidak ada tagihan
												*/
													
										2.1.B  IF [APP = 2 SUM(total Row) == SUM(APP = 2 SUM(total from Server side:PHP) [OPT 3]
														[
															/*Penjabaran linear Break*/
																Fetching data field(rows)
																IF field[APP]= '2' 
																SUM field[APP] == rows table record 
																IF ROWS field[APP]='2' SUM([APP])
																IF server_side == SUM([APP]) ="Work"
																IF server_side ==SUM([APP]) = "failed"
														]
												
								]
								
							2.2 
						]
				
				{ /*NOTE APP Keuangan*/
					/* TASK TARGET */
						Update hijack UTS UAS mahasiswa yang sudah bayar
						BEBERAPA TAGIHAN DI KELAS REG/EKS BLM OK
						CETAK TAGIHAN BRIVA
						PINDAH SCRIPT SIA DEV KE SIA
						TOTAL PEMBAYARAN UPDATE DATA BRIVA
						MENU REPORT 2 BANK, MINGGUAN/BULANAN/TAHUNAN
					
				}
		
		/* Mahasiswa*/
			// Biaya Mahasiswa => Tagihan Mahasiswa //
			1.Pilih Tagihan
			2.Pilih bank pembayaran (Penggkondisian table bank)
				BANK JATENG[
						1.langsung melakukan pembayaran Pihak Bank Jateng , maka otomatis 'status' akan berubah
						]
				BANK BRI
					[
						1.pilih biaya pembyaran
						2. mendapat ID transaksi BRI
						3.Kirim / Proses data Ke BRIVA BRI
						4.Data tersimpan
					]
			3.biaya Tersimpan dalam tagihan Bank
			
			//Entri KRS <3.0 = 21 3.0> = 24
				1.pilih KRS
					[
						1.1 jika IP Dibawah 3.0 maka KRS yang diambil maksimal 21
						1.2 Jika IP Diatas 3.0 maka KRS yang diambil maksimal 24
					]
			
			//Form pengajuan 
					1. Form prosedure
								[
									 1.1 generate kode
                   1.2 entri data sesuai prosedur input table()
                   1.3 entri dengan status = '1'
								]
			    2. Simpan data()
				
		/*Akademik */
			// Import KRS//
			1.list krs
			2.pilih berdasarkan tahun ajaran
			3 import data ke table tujuan
				[
					3.1 pilih kejuruan dan semester
					3.2 load record krs
					3.3 Prosess simpan sesuai prosedur INSERT PROCCESS
					3.4 Preview result
				]
		
		
					
	
