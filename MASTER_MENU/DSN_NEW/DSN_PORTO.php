		<table width="1028" border="0" class="table table-bordered">
		  <tr>
			<td height="49" colspan="10"><a href="#" onClick="MM_openBrWindow('iregdosen.php?<?php echo"kddsn=$IDDSN"; ?>','','scrollbars=yes,width=700,height=700')" class="btn btn-primary">Riwayat Pendidikan </a></td>
		  </tr>
		  <tr align="center" bgcolor="#E0E0E0">
			<td width="87" height="43">JENJANG</td>
			<td width="125">JURUSAN </td>
			<td width="82">SEKOLAH </td>
			<td width="92">TEMPAT</td>
			<td width="87">IJASAH</td>
			<td width="87">TANGGAL</td>
			<td width="121">TAHUN</td>
			<td width="135">BIAYA</td>
			<td width="108">FILE</td>
			<td width="62">ACTION</td>
		  </tr>
		  <?php
		  $reg = mysql_query("select * from dosen_aka where iddosen='$IDDSN'");
		  while($regg = mysql_fetch_array($reg)){
		  
		  ?>
		  <tr align="center">
			<td height="43"><?php  echo"$regg[jenjang]";?></td>
			<td><?php  echo"$regg[jurusan]";?></td>
			<td><?php  echo"$regg[sekolah]";?></td>
			<td><?php  echo"$regg[tempat]";?></td>
			<td><?php  echo"$regg[ijasah]";?></td>
			<td><?php  echo"$regg[tanggal]";?></td>
			<td><?php  echo"$regg[tahun]";?></td>
			<td><?php  echo"$regg[biaya]";?></td>
			<td><?php  echo"$regg[file]";?></td>
			<td><a href="#" onClick="MM_openBrWindow('eregdosen.php?<?php echo"kddsn=$IDDSN&idmain=$regg[idmain]"; ?>','','scrollbars=yes,width=700,height=700')"><img src="http://sikadu.unwahas.ac.id/img/edit-32.png" width="27" height="27" border="0"></a></td>
		  </tr>
		  <?php
		  }
		  ?>
		</table>
		<br>
		<table width="1146" border="0" class="table table-bordered">
		  <tr>
			<td height="38" colspan="8"><a href="#" onClick="MM_openBrWindow('ijabatan.php?<?php echo"kddsn=$IDDSN"; ?>','','scrollbars=yes,width=700,height=700')" class="btn btn-primary">RIWAYAT JABATAN </a> </td>
		  </tr>
		  <tr align="center" bgcolor="#71B8FF">
			<td width="143" height="61"> UNIT KERJA </td>
			<td width="127"> JABATAN </td>
			<td width="138"> PEJABAT MENETAPAN </td>
			<td width="130"> NO. SK </td>
			<td width="138"> TANGGAL SK </td>
			<td width="208"> TMT JABATAN </td>
			<td width="114"> FILE </td>
			<td width="114">ACTION</td>
		  </tr>
			<?php
		  $reg2 = mysql_query("select * from dosen_jabatan where iddosen='$IDDSN'");
		  while($regg2 = mysql_fetch_array($reg2)){
		  
		  ?>
		  <tr align="center">
			<td height="43"><?php  echo"$regg2[unit]";?></td>
			<td height="43"><?php  echo"$regg2[jabatan]";?></td>
			<td height="43"><?php  echo"$regg2[pejabat]";?></td>
			<td height="43"><?php  echo"$regg2[nosk]";?></td>
			<td height="43"><?php  echo"$regg2[tglsk]";?></td>
			<td height="43"><?php  echo"$regg2[tmtjabatan]";?></td>
			<td height="43"><?php  echo"$regg2[file]";?></td>
			<td height="43"><a href="#" onClick="MM_openBrWindow('ejabatan.php?<?php echo"kddsn=$IDDSN&idmain=$regg2[idmain]"; ?>','','scrollbars=yes,width=700,height=700')"><img src="http://sikadu.unwahas.ac.id/img/edit-32.png" width="27" height="27" border="0"></a></td>
		  </tr>
		  <?php
		  }
		  ?>
		</table>
		<br>
		<table width="1146" border="0" class="table table-bordered">
		  <tr>
			<td height="38" colspan="8"><a href="#" onClick="MM_openBrWindow('ijabatanstruk.php?<?php echo"kddsn=$IDDSN"; ?>','','scrollbars=yes,width=700,height=700')" class="btn btn-primary">RIWAYAT JABATAN </a> </td>
		  </tr>
		  <tr align="center" bgcolor="#00C663">
			<td width="143" height="61"> UNIT KERJA </td>
			<td width="127"> JABATAN </td>
			<td width="138"> PEJABAT MENETAPAN </td>
			<td width="130"> NO. SK </td>
			<td width="138"> TANGGAL SK </td>
			<td width="208"> TMT JABATAN </td>
			<td width="114"> FILE </td>
			<td width="114">ACTION</td>
		  </tr>
		  <?php
		  $reg2 = mysql_query("select * from dosen_jabatan_struk where iddosen='$IDDSN'");
		  while($regg2 = mysql_fetch_array($reg2)){
		  
		  ?>
		  <tr align="center">
			<td height="43"><?php  echo"$regg2[unit]";?></td>
			<td height="43"><?php  echo"$regg2[jabatan]";?></td>
			<td height="43"><?php  echo"$regg2[eselon]";?></td>
			<td height="43"><?php  echo"$regg2[nosk]";?></td>
			<td height="43"><?php  echo"$regg2[tglsk]";?></td>
			<td height="43"><?php  echo"$regg2[tmtjabatan]";?></td>
			<td height="43"><?php  echo"$regg2[file]";?></td>
			<td height="43"><a href="#" onClick="MM_openBrWindow('ejabatanstruk.php?<?php echo"kddsn=$IDDSN&idmain=$regg2[idmain]"; ?>','','scrollbars=yes,width=700,height=700')"><img src="http://sikadu.unwahas.ac.id/img/edit-32.png" width="27" height="27" border="0"></a></td>
		  </tr>
		  <?php
		  }
		  ?>
		</table>
		<table width="1144" border="0" class="table table-bordered">
		  <tr>
			<td colspan="6"><a href="#" onClick="MM_openBrWindow('iserti.php?<?php echo"kddsn=$IDDSN"; ?>','','scrollbars=yes,width=700,height=700')" class="btn btn-primary"> Sertifikasi Dosen </a> </td>
		  </tr>
		  <tr align="center" bgcolor="#FFC1C1">
			<td width="129" height="38"> NO. DPLK </td>
			<td width="173"> NO. REK </td>
			<td width="203"> NO. JAMSOSTEK </td>
			<td width="203"> NO. SERDIK </td>
			<td width="203"> FILE SERDOS </td>
			<td width="207">ACTION</td>
		  </tr>
		  <?php
		  $reg3 = mysql_query("select * from dosen_serti where iddosen='$IDDSN'");
		  while($regg3 = mysql_fetch_array($reg3)){
		  
		  ?>
		  <tr align="center">
			<td height="50"><?php echo"$regg3[nodplk]"; ?></td>
			<td height="50"><?php echo"$regg3[norek]"; ?></td>
			<td height="50"><?php echo"$regg3[nojamsostek]"; ?></td>
			<td height="50"><?php echo"$regg3[noserdik]"; ?></td>
			<td height="50"><?php echo"$regg3[file]"; ?></td>
			<td height="50"><a href="#" onClick="MM_openBrWindow('eserti.php?<?php echo"kddsn=$IDDSN&idmain=$regg3[idmain]"; ?>','','scrollbars=yes,width=700,height=700')"><img src="http://sikadu.unwahas.ac.id/img/edit-32.png" width="27" height="27" border="0"></a></td>
		  </tr>
		  <?php
		  }
		  ?>
		</table>
		<table width="1144" border="0" class="table table-bordered">
		  <tr>
			<td width="1138" colspan="6"><a href="#" onClick="MM_openBrWindow('ikerja.php?<?php echo"kddsn=$IDDSN"; ?>','','scrollbars=yes,width=700,height=700')" class="btn btn-primary">Riwayat Pekerjaan </a></td>
		  </tr>
		  <tr align="center" bgcolor="#FF97FF">
			<td height="44">NO</td>
			<td> SEBAGAI</td>
			<td>PERUSAHAAN</td>
			<td>TAHUN MASUK </td>
			<td>SAMPAI DENGAN </td>
			<td>ACTION</td>
		  </tr>
			<?php
		  $reg4 = mysql_query("select * from dosen_riwayat_kerja where iddosen='$IDDSN'");
		  while($regg4 = mysql_fetch_array($reg4)){
		  
		  ?>
		  <tr align="center">
			<td height="55"><?php echo"$regg4[no]"; ?></td>
			<td height="55"><?php echo"$regg4[sebagai]"; ?></td>
			<td height="55"><?php echo"$regg4[perusahaan]"; ?></td>
			<td height="55"><?php echo"$regg4[thn_masuk]"; ?></td>
			<td height="55"><?php echo"$regg4[sampai_dengan]"; ?></td>
			<td height="55"><a href="#" onClick="MM_openBrWindow('ekerja.php?<?php echo"kddsn=$IDDSN&idmain=$regg4[idmain]"; ?>','','scrollbars=yes,width=700,height=700')"><img src="http/img/edit-32.png" width="27" height="27" border="0"></a></td>
		  </tr>
		  <?php
		  }
		  ?>
		</table>