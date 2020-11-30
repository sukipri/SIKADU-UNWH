select * from mahasiswa order by rand() limit  100
	select * from mahasiswa where idkejuruan='1101' and idtahun_ajaran='16' 
	select * from mahasiswa where  nama like '%LURISTIYA MEI%'
	select * from mahasiswa where idmahasiswa='18101011010'
	
select * from mahasiswa2 where idmahasiswa='151010034'

select * from biaya_02_rekam_bri order by rand() limit 10
	select * from biaya_02_rekam_bri where idsemester='120' and idmahasiswa='18101011010'
	select * from biaya_02_rekam_bri where app='2' and idsemester='120'
	describe biaya_02_rekam_bri 

select * from biaya_02_rekam where idmahasiswa='20105011051' and idsemester='120'

select * from semester where aktif='2'
select * from user_mhs where idmahasiswa='18101011014'
select * from tahun_ajaran
select * from user_ku
select * from user_bu
select * from gelombang
select * from tb_jenis_tagihan

select * from tb_tagihan_01
	 describe tb_tagihan_01 
	 /*delete from tb_tagihan_01 where idmain_tagihan_01 like '%IMP%'*/
	
select * from user_mhs where idmahasiswa='18101011010'
	describe user_mhs 
	


select * from tb_form_ajuan_01
	describe tb_form_ajuan_01
	/*truncate table tb_form_ajuan_01 */

select * from fakultas

 
	
	