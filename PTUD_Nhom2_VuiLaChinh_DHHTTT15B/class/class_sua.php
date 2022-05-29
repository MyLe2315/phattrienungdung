<?php
class quanli
{
	private function connect()
	{
		$con = mysql_connect("localhost", "root", "");
		if (!$con) {
			echo 'Không kết nối duoc csdl';
			exit();
		} else {
			mysql_select_db("web111");
			mysql_query("SET NAMES UTF8");
			return $con;
		}
	}
	public function themxoasua($sql)
	{
		$link = $this->connect();
		if (mysql_query($sql, $link)) {
			return 1;
		} else {
			return 0;
		}
	}
	public function laycot($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		$giatri = '';
		if ($i > 0) {

			while ($row = mysql_fetch_array($ketqua)) {
				$id = $row[0];
				$giatri = $id;
			}
		}
		return $giatri;
	}




	// quản lí giáo viên
	public function load_ds_giaovien($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			echo '<table width="1200" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="52" align="center"><strong>STT</strong></td>
							<td width="50" align="center"><strong>MÃ GV</strong></td>
							<td width="100" align="center"><strong>HỌ ĐỆM</strong></td>
							<td width="100" align="center"><strong>TÊN</strong></td>
							<td width="300" align="center"><strong>ĐỊA CHỈ</strong></td>
							<td width="100" align="center"><strong>EMAIL</strong></td>
							<td width="100" align="center"><strong>SỐ ĐIỆN THOẠI</strong></td>
							<td width="100" align="center"><strong>NGÀY SINH</strong></td>
							<td width="100" align="center"><strong>MÃ MÔN HỌC</strong></td>
						  </tr>';
			$dem = 1;
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$dem = $dem++;
				$stt = $dem;
				$magv = $row['idgiaovien'];
				$diachi = $row['diachi'];
				$email = $row['email'];
				$sdt = $row['sdt'];
				$hodem = $row['hodem'];
				$ten = $row['tengiaovien'];
				$ngaysinh = $row['ngaysinh'];
				$idmonhoc = $row['idmonhoc'];

				echo ' </tr>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=1&magv=' . $magv . '">' . $dem . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=1&magv=' . $magv . '">' . $magv . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=1&magv=' . $magv . '">' . $hodem . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=1&magv=' . $magv . '">' . $ten . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=1&magv=' . $magv . '">' . $diachi . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=1&magv=' . $magv . '">' . $email . '</a></td> 
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=1&magv=' . $magv . '">' . $sdt . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=1&magv=' . $magv . '">' . $ngaysinh . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=1&magv=' . $magv . '">' . $idmonhoc . '</a></td>
						  </tr>';

				$dem++;
			}

			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}

	public function load_ds_giaovien2($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			echo '<table width="1200" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="52" align="center"><strong>STT</strong></td>
							<td width="50" align="center"><strong>MÃ GV</strong></td>
							<td width="100" align="center"><strong>HỌ ĐỆM</strong></td>
							<td width="100" align="center"><strong>TÊN</strong></td>
							<td width="300" align="center"><strong>ĐỊA CHỈ</strong></td>
							<td width="100" align="center"><strong>EMAIL</strong></td>
							<td width="100" align="center"><strong>SỐ ĐIỆN THOẠI</strong></td>
							<td width="100" align="center"><strong>NGÀY SINH</strong></td>
							<td width="100" align="center"><strong>MÃ MÔN HỌC</strong></td>
						  </tr>';
			$dem = 1;
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$dem = $dem++;
				$stt = $dem;
				$magv = $row['idgiaovien'];
				$diachi = $row['diachi'];
				$email = $row['email'];
				$sdt = $row['sdt'];
				$hodem = $row['hodem'];
				$ten = $row['tengiaovien'];
				$ngaysinh = $row['ngaysinh'];
				$idmonhoc = $row['idmonhoc'];

				echo ' </tr>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=1&magv=' . $magv . '">' . $dem . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=1&magv=' . $magv . '">' . $magv . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=1&magv=' . $magv . '">' . $hodem . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=1&magv=' . $magv . '">' . $ten . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=1&magv=' . $magv . '">' . $diachi . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=1&magv=' . $magv . '">' . $email . '</a></td> 
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=1&magv=' . $magv . '">' . $sdt . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=1&magv=' . $magv . '">' . $ngaysinh . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=1&magv=' . $magv . '">' . $idmonhoc . '</a></td>
						  </tr>';

				$dem++;
			}

			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}

	// quản lí học sinh
	public function load_ds_hocsinh($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			echo '<table width="1200" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="52" align="center"><strong>STT</strong></td>
							<td width="50" align="center"><strong>MÃ HS</strong></td>
							<td width="100" align="center"><strong>HỌ ĐỆM</strong></td>
							<td width="100" align="center"><strong>TÊN</strong></td>
							<td width="300" align="center"><strong>ĐỊA CHỈ</strong></td>
							<td width="100" align="center"><strong>SỐ ĐIỆN THOẠI</strong></td>
							<td width="100" align="center"><strong>NGÀY SINH</strong></td>
							<td width="50" align="center"><strong>MÃ LỚP</strong></td>
						  </tr>';
			$dem = 1;
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$dem = $dem++;
				$stt = $dem;
				$mahs = $row['idhocsinh'];
				$diachihs = $row['diachi'];
				$malop = $row['idlophoc'];
				$sdths = $row['sdt'];
				$hodemhs = $row['hodem'];
				$tenhs = $row['tenhocsinh'];
				$ngaysinhhs = $row['ngaysinh'];


				echo ' </tr>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=4&mahs=' . $mahs . '">' . $dem . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=4&mahs=' . $mahs . '">' . $mahs . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=4&mahs=' . $mahs . '">' . $hodemhs . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=4&mahs=' . $mahs . '">' . $tenhs . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=4&mahs=' . $mahs . '">' . $diachihs . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=4&mahs=' . $mahs . '">' . $sdths . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=4&mahs=' . $mahs . '">' . $ngaysinhhs . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=4&mahs=' . $mahs . '">' . $malop . '</a></td>
						  
						  </tr>';

				$dem++;
			}

			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}


	public function load_baituluandanop($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			echo '<table width="1100" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
			<tr>
			  <td width="52" align="center"><strong>STT</strong></td>
			  <td width="50" align="center"><strong>MÃ HS</strong></td>
			  <td width="300" align="center"><strong>TÊN HỌC SINH</strong></td>
			  <td width="300" align="center"><strong>TIÊU ĐỀ</strong></td>
			  <td width="300" align="center"><strong>NGÀY RA ĐỀ</strong></td>
			  <td width="300" align="center"><strong>FILE</strong></td>
			  <td width="100" align="center"><strong>LOẠI</strong></td>
			
			</tr>';
			$dem = 1;
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$dem = $dem++;
				$stt = $dem;
				$idbaikiemtra = $row['idbaikiemtra'];
				$iddetuluan=$row['iddetuluan'];
				$tieude = $row['tieude'];
				$ngayrade = $row['ngayrade'];
				$tenhocsinh=$row['tenhocsinh'];
				$loaibaikiemtra = $row['loaibaikiemtra'];
				$idlophoc=$row['idlophoc'];
				$idhocsinh=$row['idhocsinh'];
				$idmonhoc=$row['idmonhoc'];
				$file=$row['file'];

				echo ' </tr>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&idbktra='.$iddetuluan.'&idlop='.$idlophoc.'&idmon='.$idmonhoc.'&file='.$file.'">' . $dem . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&idbktra='.$iddetuluan.'&idlop='.$idlophoc.'&idmon='.$idmonhoc.'&file='.$file.'">' . $idhocsinh . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&idbktra='.$iddetuluan.'&idlop='.$idlophoc.'&idmon='.$idmonhoc.'&file='.$file.'">' . $tenhocsinh . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&idbktra='.$iddetuluan.'&idlop='.$idlophoc.'&idmon='.$idmonhoc.'&file='.$file.'">' . $tieude . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&idbktra='.$iddetuluan.'&idlop='.$idlophoc.'&idmon='.$idmonhoc.'&file='.$file.'">' . $ngayrade. '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&idbktra='.$iddetuluan.'&idlop='.$idlophoc.'&idmon='.$idmonhoc.'&file='.$file.'">' . $file . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&idbktra='.$iddetuluan.'&idlop='.$idlophoc.'&idmon='.$idmonhoc.'&file='.$file.'">' . $loaibaikiemtra . '</a></td>
						
						  
						  </tr>';
			}
			echo '</table>';
		}
	}
	
	public function load_ds_hocsinh3($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			echo '<table width="1200" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="52" align="center"><strong>STT</strong></td>
							<td width="50" align="center"><strong>MÃ HS</strong></td>
							<td width="100" align="center"><strong>HỌ ĐỆM</strong></td>
							<td width="100" align="center"><strong>TÊN</strong></td>
							<td width="300" align="center"><strong>ĐỊA CHỈ</strong></td>
							<td width="50" align="center"><strong>GIỚI TÍNH</strong></td>
							<td width="100" align="center"><strong>SỐ ĐIỆN THOẠI</strong></td>
							<td width="100" align="center"><strong>NGÀY SINH</strong></td>
							<td width="50" align="center"><strong>MÃ LỚP</strong></td>
						  </tr>';
			$dem = 1;
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$dem = $dem++;
				$stt = $dem;
				$mahs = $row['idhocsinh'];
				$diachihs = $row['diachi'];
				$malop = $row['idlophoc'];
				$sdths = $row['sdt'];
				$hodemhs = $row['hodem'];
				$tenhs = $row['tenhocsinh'];
				$ngaysinhhs = $row['ngaysinh'];
				$gioitinh = $row['gioitinh'];

				echo ' </tr>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=2&mahs=' . $mahs . '">' . $dem . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=2&mahs=' . $mahs . '">' . $mahs . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=2&mahs=' . $mahs . '">' . $hodemhs . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=2&mahs=' . $mahs . '">' . $tenhs . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=2&mahs=' . $mahs . '">' . $diachihs . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=2&mahs=' . $mahs . '">' . $gioitinh . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=2&mahs=' . $mahs . '">' . $sdths . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=2&mahs=' . $mahs . '">' . $ngaysinhhs . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=2&loai=2&mahs=' . $mahs . '">' . $malop . '</a></td>
						  
						  </tr>';

				$dem++;
			}

			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}



	public function loadchitietbktra($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$iddetuluan = $row['iddetuluan'];
				$tieude = $row['tieude'];
				$ngayrade = $row['ngayrade'];
				$ngayhethan = $row['ngayhethan'];
				$idlophoc = $row['idlophoc'];
				$idmonhoc = $row['idmonhoc'];
				$idgiaovien = $row['idgiaovien'];
				$loaibaikiemtra = $row['loaibaikiemtra'];
				$ghichu = $row['ghichu'];

				echo '<h3 style="color:green">' . $tieude . '</h3>';
				echo '<div style="color:green;margin:10px">Ngày ra đề: ' . $ngayrade . '</div>';
				echo '<div style="color:red;margin:10px">Ngày hết hạn: ' . $ngayhethan . '</div>';
				echo '<div style="color:gray;margin:10px"><b>Ghi chú: ' . $ghichu . '</b></div>';
			}
		}
	}
	public function upfiles($name, $tmp_name, $folder)
	{
		if ($name != '') {
			$newname = $folder . "/" . $name;
			if (move_uploaded_file($tmp_name, $newname)) {
				return 1;
			}
			return 0;
		}
	}

	public function load_tenlop($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$mahs = $row['idhocsinh'];
				$diachihs = $row['diachi'];
				$malop = $row['idlophoc'];
				$sdths = $row['sdt'];
				$hodemhs = $row['hodem'];
				$tenhs = $row['tenhocsinh'];
				$ngaysinhhs = $row['ngaysinh'];

				session_start();
				$_SESSION['idlophoc'] = $malop;
			}
		}
	}
	public function xem_ds_hocsinh($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			echo '<table width="1100" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="52" align="center"><strong>STT</strong></td>
							<td width="50" align="center"><strong>MÃ HS</strong></td>
							<td width="100" align="center"><strong>HỌ ĐỆM</strong></td>
							<td width="100" align="center"><strong>TÊN</strong></td>
							<td width="300" align="center"><strong>ĐỊA CHỈ</strong></td>
							<td width="100" align="center"><strong>SỐ ĐIỆN THOẠI</strong></td>
							<td width="100" align="center"><strong>NGÀY SINH</strong></td>
							<td width="50" align="center"><strong>MÃ LỚP</strong></td>
						  </tr>';
			$dem = 1;
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$dem = $dem++;
				$stt = $dem;
				$mahs = $row['idhocsinh'];
				$diachihs = $row['diachi'];
				$malop = $row['idlophoc'];
				$sdths = $row['sdt'];
				$hodemhs = $row['hodem'];
				$tenhs = $row['tenhocsinh'];
				$ngaysinhhs = $row['ngaysinh'];


				echo ' </tr>
						  <td align="center" >' . $dem . '</td>
						  <td align="center" >' . $mahs . '</td>
						  <td align="center" >' . $hodemhs . '</td>
						  <td align="center" >' . $tenhs . '</td>
						  <td align="center" >' . $diachihs . '</td>
						  <td align="center" >' . $sdths . '</td>
						  <td align="center" >' . $ngaysinhhs . '</td>
						  <td align="center" >' . $malop . '</td>
						  
						  </tr>';

				$dem++;
			}

			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}


	//xem điểm
	public function xem_diem($sql){
	$link = $this->connect();
	$ketqua = mysql_query($sql, $link);
	mysql_close($link);
	$i = mysql_num_rows($ketqua);
	if ($i > 0) {

		echo '<table width="1100" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
					  <tr>
						<td width="100" align="center"><strong>Môn học</strong></td>
						<td width="100" align="center"><strong>Điểm miệng</strong></td>
						<td width="100" align="center"><strong>Điểm 15 phút</strong></td>
						<td width="100" align="center"><strong>Điểm 15 phút</strong></td>
						<td width="100" align="center"><strong>Điểm 1 tiết</strong></td>
						<td width="100" align="center"><strong>Điểm thi giữa kỳ</strong></td>
						<td width="100" align="center"><strong>Điểm thi cuối kỳ</strong></td>
						<td width="100" align="center"><strong>Điểm trung bình môn</strong></td>
					  </tr>';
		$dem = 1;
		session_start();
		$mataikhoan = $_SESSION['mataikhoan'];
		while ($row = mysql_fetch_array($ketqua)) {
			
			$mamonhoc = $row['idmonhoc'];
			$diemmieng = $row['diemmieng'];
			$diem15phut1 = $row['diem15phut1'];
			$diem15phut2 = $row['diem15phut2'];
			$diem1tiet1 = $row['diem1tiet1'];
			$diem1tiet2 = $row['diem1tiet2'];
			$diemthi = $row['diemthi'];
			
			$diemtrungbinh = 0;
            $diemtrungbinh = ($diemmieng + $diem15phut1 + $diem15phut2 + ($diem1tiet1 + $diem15phut2)  * 2 + $diemthi * 3) / 10;


			echo ' </tr>
					  <td align="center" >' . $mamonhoc . '</td>
					  <td align="center" >' . $diemmieng . '</td>
					  <td align="center" >' . $diem15phut1 . '</td>
					  <td align="center" >' . $diem15phut2 . '</td>
					  <td align="center" >' . $diem1tiet1 . '</td>
					  <td align="center" >' . $diem1tiet2 . '</td>
					  <td align="center" >' . $diemthi . '</td>
					  <td align="center" >' . $diemtrungbinh . '</td>
					  
					  </tr>';

			;
		}

		echo '</table>';
	} else {
		echo 'Đang cập nhật dữ liệu...';
	}
}

	// quản lý lớp học
	public function load_ds_lop($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			echo '<table width="1200" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="52" align="center"><strong>STT</strong></td>
							<td width="100" align="center"><strong>MÃ KHỐI</strong></td>
							<td width="100" align="center"><strong>TÊN LỚP</strong></td>
							
						
						  </tr>';
			$dem = 1;
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$dem = $dem++;
				$stt = $dem;
				$malop = $row['idlophoc'];
				$idkhoi = $row['idkhoilop'];
				$tenlop = $row['tenlop'];


				echo ' </tr>
						  <td align="center"><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=3&malop=' . $malop . '">' . $dem . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=3&malop=' . $malop . '">' . $idkhoi . '</a></td>
						  <td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&cn=3&malop=' . $malop . '">' . $tenlop . '</a></td>
						  </tr>';

				$dem++;
			}

			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}




	// thống kê bài kiểm tra
	public function loadbaikiemtra($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			echo '<table width="800" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="200" align="center"><strong>TÊN HỌC SINH</strong></td>
						
							<td width="200" align="center"><strong>TIÊU ĐỀ BÀI</strong></td>
									<td width="200" align="center"><strong>BÀI NỘP</strong></td>
						  </tr>';

			while ($row = mysql_fetch_array($ketqua)) {
				$id = $row['idbaikiemtra'];
				$tenhocsinh = $row['tenhocsinh'];

				$tieude = $row['tieude'];
				$trangthai = $row['trangthai'];
				$idlophoc = $row['idlophoc'];
				$file = $row['file'];
				echo ' </tr>
						 	<td align="center" >' . $tenhocsinh . '</a></td>
						
							<td align="center" >' . $tieude . '</a></td>
 	 				
								<td align="center" >' . $file . '</a></td>
				</div>';
			}
			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}
	public function loadlop($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {

				$idlophoc = $row['idlophoc'];
				$idkhoilop = $row['idkhoilop'];
				$tenlop = $row['tenlop'];
				echo '<a class="lop" href="?id=' . $mataikhoan . '&gv=2&idlophoc=' . $idlophoc . '">' . $tenlop . '</a>';
				echo '<br>';
			}
		} else {
			echo 'không có dữ liệu';
		}
	}
	public function load_ds_baikiemtratuluan($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			echo '<table width="1100" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="10" align="center"><strong>STT</strong></td>
							<td width="100" align="center"><strong>TIÊU ĐỀ</strong></td>
							<td width="100" align="center"><strong>NGÀY RA ĐỀ</strong></td>
							<td width="100" align="center"><strong>NGÀY HẾT HẠN</strong></td>
							<td width="50" align="center"><strong>MÃ LỚP</strong></td>
							<td width="50" align="center"><strong>GIÁO VIÊN RA ĐỀ</strong></td>
							<td width="50" align="center"><strong>MÃ LOẠI</strong></td>
							<td width="100" align="center"><strong>GHI CHÚ</strong></td>
						
						  </tr>';
			$dem = 1;
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$dem = $dem++;
				$stt = $dem;
				$iddetuluan = $row['iddetuluan'];
				$tieude = $row['tieude'];
				$ngayrade = $row['ngayrade'];
				$ngayhethan = $row['ngayhethan'];
				$idlophoc = $row['idlophoc'];
				$idmonhoc = $row['idmonhoc'];
				$idgiaovien = $row['idgiaovien'];
				$loaibaikiemtra = $row['loaibaikiemtra'];
				$ghichu = $row['ghichu'];

				echo ' </tr>
						  <td align="center" >' . $dem . '</td>
						  <td align="center" >' . $tieude . '</td>
						  <td align="center" >' . $ngayrade . '</td>
						  <td align="center" >' . $ngayhethan . '</td>
						  <td align="center" >' . $idlophoc . '</td>
						  <td align="center" >' . $idgiaovien . '</td>
						  <td align="center" >' . $loaibaikiemtra . '</td>
						  <td align="center" >' . $ghichu . '</td>
						  </tr>';

				$dem++;
			}

			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}
	//load điểm
	public function load_ds_diem($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			echo '<table width="1100" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
							   <tr>
								 <td width="10" align="center"><strong>STT</strong></td>
								 <td width="100" align="center"><strong>Mã</strong></td>
								 <td width="100" align="center"><strong>Tên học sinh</strong></td>
								 <td width="100" align="center"><strong>Điểm số</strong></td>
								 <td width="100" align="center"><strong>Loại bài kiểm tra</strong></td>
								 <td width="50" align="center"><strong>Tên lớp</strong></td>
								 <td width="50" align="center"><strong>Tên môn học</strong></td>
								 <td width="100" align="center"><strong>Đánh giá</strong></td>
							 
							   </tr>';
			$dem = 1;
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$dem = $dem++;
				$stt = $dem;
				$idhocsinh = $row['idhocsinh'];
				$tenhocsinh = $row['tenhocsinh'];
				$diemso = $row['diemso'];
				$loaibaikiemtra = $row['tenloai'];
				$idlophoc = $row['idlophoc'];
				$lophoc = $row['tenlop'];
				$danhgia = $row['danhgia'];
				$idgiaovien = $row['idgiaovien'];
				$tenmonhoc = $row['tenmon'];
				$idmonhoc = $row['idmonhoc'];

				echo ' </tr>
							   <td align="center" >' . $dem . '</td>
							   <td align="center" >' . $idhocsinh . '</td>
							   <td align="center" >' . $tenhocsinh . '</td>
							   <td align="center" >' . $diemso . '</td>
							   <td align="center" >' . $loaibaikiemtra . '</td>
							   <td align="center" >' . $lophoc . '</td>
							   <td align="center" >' . $tenmonhoc . '</td>
							   <td align="center" >' . $danhgia . '</td>

							   </tr>';

				$dem++;
			}

			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}


	// load bài kiểm tra tự luận giao diện học sinh 
	public function load_bktra_hs($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			$now = date("Y-m-d h:i:s A");
			putenv("TZ=Asia/Bangkok");
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$iddetuluan = $row['iddetuluan'];
				$tieude = $row['tieude'];
				$ngayrade = $row['ngayrade'];
				$ngayhethan = $row['ngayhethan'];
				$idlophoc = $row['idlophoc'];
				$idmonhoc = $row['idmonhoc'];
				$idgiaovien = $row['idgiaovien'];
				$ghichu = $row['ghichu'];



				echo '<div align="center" style="border: 1px solid black;height:auto;padding:0px;margin:10px" id="baikiemtra" class="col-3">
                <div style="background:lightblue;height:50px"><b>' . $tieude . '</b></div>
                <div style="margin: 10px;color:green">Ngày ra đề: ' . $ngayrade . '</div>
				<div style="margin: 10px;color:red">Ngày hết hạn: ' . $ngayhethan . '</div>
				
				';

				if (strtotime($ngayhethan) < strtotime($now)) {

					echo '<div style="margin:10px">Bài kiểm tra đã quá hạn nộp</div>';
					echo '</div>';
				} else {
					echo '
                <div style="margin-top:10px;margin-bottom:10px"><a href="nopbaikiemtra.php?id=' . $mataikhoan . '&idbktra=' . $iddetuluan . '&idlop=' . $idlophoc . '&idmon=' . $idmonhoc . '"><input type="submit" name="button" class="btn btn-primary " id="button" style="font-size: 15px;" value="Nộp bài"></a></div>';
					echo '</div>';
				}
			}
		}
	}
	public function load_monhoc_hs($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$tenmonhoc = $row['tenmon'];
				$idmonhoc = $row['idmonhoc'];

				echo '<a href="giaodienhocsinh.php?id=' . $mataikhoan . '&hs=3&idmon=' . $idmonhoc . '">' . $tenmonhoc . '</a>';
				echo '</br>';
			}
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}

	public function loadhschuanopbai($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			echo '</br>';
			echo '<strong>DANH SÁCH HỌC SINH CHƯA NỘP BÀI LỚP </strong>';
			echo '<table width="700" border="1" style=" 0px 20px 0px; margin-top:40px;" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="200" align="center"><strong>TÊN HỌC SINH</strong></td>
						
							<td width="200" align="center"><strong>TIÊU ĐỀ BÀI</strong></td>
							<td width="100" align="center"><strong>BÀI NỘP</strong></td>
							
						  </tr>';

			while ($row = mysql_fetch_array($ketqua)) {
				$id = $row['idbaikiemtra'];
				$tenhocsinh = $row['tenhocsinh'];

				$tieude = $row['tieude'];
				$trangthai = $row['trangthai'];
				$idlophoc = $row['idlophoc'];
				$file = $row['file'];
				echo ' </tr></tr>';
				echo ' </tr>
						 	<td align="center">' . $tenhocsinh . '</a></td>
							
							<td align="center">' . $tieude . '</a></td>
							<td align="center">' . $file . '</a></td>
				
				</tr>';
			}
			echo '</table>';
		} else {
			echo '</br>';
			echo 'Tất cả học sinh đã nộp bài';
		}
	}




	// quản lí học sinh		

	public function load_combo_lop($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			echo '<select style="margin-left:15px" name="tenlop" size="1" id="tenlop">';
			echo '<option>Mời chọn lớp</option>';
			while ($row = mysql_fetch_array($ketqua)) {
				$id_lop = $row['idlophoc'];
				$ten_lop = $row['tenlop'];
				echo '<option value="' . $id_lop . '"selected="selected">' . $ten_lop . '</option>';
			}

			echo '</select>';
		}
	}
	/// load ten hs
	public function load_ds_hocsinh2($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			echo '<select style="margin-left:15px" name="tenlop" size="1" id="tenlop">';
			echo '<option>Mời chọn học sinh</option>';

			while ($row = mysql_fetch_array($ketqua)) {
				$id_hocsinh = $row['idhocsinh'];
				$tenhs = $row['tenhocsinh'];
				echo '<option value="' . $id_hocsinh . '"selected="selected">' . $tenhs . '</option>';
			}

			echo '</select>';
		}
	}
	//load combo loại bài ktra
	public function load_combo_loaibktra($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			echo '<select style="margin-left:15px" name="loaibaituluan" size="1" id="loaibaituluan">';
			echo '<option>Mời chọn loại</option>';
			while ($row = mysql_fetch_array($ketqua)) {
				$idloai = $row['idloai'];
				$tenloai = $row['tenloai'];
				echo '<option value="' . $idloai . '"selected="selected">' . $tenloai . '</option>';
			}

			echo '</select>';
		}
	}




	// yêu cầu chỉnh sửa điểm 
	public function loadlop2($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {

				$idlophoc = $row['idlophoc'];
				$idkhoilop = $row['idkhoilop'];
				$tenlop = $row['tenlop'];
				echo '<a class="lop" href="?id=' . $mataikhoan . '&gv=5&idlophoc=' . $idlophoc . '">' . $tenlop . '</a>';
				echo '<br>';
			}
		} else {
			echo 'không có dữ liệu';
		}
	}


	public function loaddiemso($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			echo '<table width="830" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="180" align="center"><strong>TÊN HỌC SINH</strong></td>
							
							<td width="200" align="center"><strong>TIÊU ĐỀ BÀI</strong></td>
							<td width="200" align="center"><strong>TRẠNG THÁI</strong></td>
							<td width="100" align="center"><strong>BÀI NỘP</strong></td>
							<td width="50" align="center"><strong>ĐIỂM SỐ</strong></td>
						  </tr>';
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$idbaikiemtra = $row['idbaikiemtra'];
				$tenhocsinh = $row['tenhocsinh'];

				$tieude = $row['tieude'];
				$trangthai = $row['trangthai'];
				$idlophoc = $row['idlophoc'];
				$file = $row['file'];
				$diemso = $row['diemso'];

				echo ' </tr>
						 	<td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&gv=5&idlophoc=' . $idlophoc . '&idbaikiemtra=' . $idbaikiemtra . '">' . $tenhocsinh . '</a></td>
							
							<td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&gv=5&idlophoc=' . $idlophoc . '&idbaikiemtra=' . $idbaikiemtra . '">' . $tieude . '</a></td>
 	 						<td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&gv=5&idlophoc=' . $idlophoc . '&idbaikiemtra=' . $idbaikiemtra . '">' . $trangthai . '</a></td>
							<td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&gv=5&idlophoc=' . $idlophoc . '&idbaikiemtra=' . $idbaikiemtra . '">' . $file . '</a></td>
							<td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&gv=5&idlophoc=' . $idlophoc . '&idbaikiemtra=' . $idbaikiemtra . '">' . $diemso . '</a></td>
								
				</div>';
			}
			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}




	// Chỉnh sửa điểm
	public function loadlop3($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {

				$idlophoc = $row['idlophoc'];
				$idkhoilop = $row['idkhoilop'];
				$tenlop = $row['tenlop'];
				echo '<a class="lop" href="?id=' . $mataikhoan . '&gv=6&idlophoc=' . $idlophoc . '">' . $tenlop . '</a>';
				echo '<br>';
			}
		} else {
			echo 'không có dữ liệu';
		}
	}


	public function loaddiemso2($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			echo '<table width="830" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="180" align="center"><strong>TÊN HỌC SINH</strong></td>
					
							<td width="200" align="center"><strong>TIÊU ĐỀ BÀI</strong></td>
							<td width="200" align="center"><strong>TRẠNG THÁI</strong></td>
							<td width="100" align="center"><strong>BÀI NỘP</strong></td>
							<td width="50" align="center"><strong>ĐIỂM SỐ</strong></td>
						  </tr>';
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$idbaikiemtra = $row['idbaikiemtra'];
				$tenhocsinh = $row['tenhocsinh'];

				$tieude = $row['tieude'];
				$trangthai = $row['trangthai'];
				$idlophoc = $row['idlophoc'];
				$file = $row['file'];
				$diemso = $row['diemso'];

				echo ' </tr>
						 	<td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&gv=6&idlophoc=' . $idlophoc . '&idbaikiemtra=' . $idbaikiemtra . '">' . $tenhocsinh . '</a></td>
						
							<td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&gv=6&idlophoc=' . $idlophoc . '&idbaikiemtra=' . $idbaikiemtra . '">' . $tieude . '</a></td>
 	 						<td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&gv=6&idlophoc=' . $idlophoc . '&idbaikiemtra=' . $idbaikiemtra . '">' . $trangthai . '</a></td>
							<td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&gv=6&idlophoc=' . $idlophoc . '&idbaikiemtra=' . $idbaikiemtra . '">' . $file . '</a></td>
							<td align="center" ><a style=" text-decoration: none;" href="?id=' . $mataikhoan . '&gv=6&idlophoc=' . $idlophoc . '&idbaikiemtra=' . $idbaikiemtra . '">' . $diemso . '</a></td>
								
				</div>';
			}
			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}

	//Môn học
	public function load_monhoc($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {



			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$tenmonhoc = $row['tenmon'];
				$idmon = $row['idmonhoc'];
				echo ' 
							  </tr>
				  
									<td align="center"  class="boder:2px;"><a class="border btn btn-primary " style=" " href="bailam.php?id='.$mataikhoan.'&idmonhoc=' . $idmon . '">' . $tenmonhoc . '</a></td>
							  
								</tr>';
			}
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}
	public function load_monhoc1($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {


			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$tenmonhoc = $row['tenmon'];
				$idmon = $row['idmonhoc'];
				echo '<span class="lop " href="?id=' . $mataikhoan . '&gv=6&idlophoc=' . $idmon . '">' . $tenmonhoc . '</span>';
			}
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}
	public function load_monhoc2($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {


			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$tenmonhoc = $row['tenmon'];
				$idmon = $row['idmonhoc'];


				echo  $tenmonhoc;
			}
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}



	public function load_diem($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			echo '<select style="margin-left:15px" name="diem" size="1" id="diem">';
			echo '<option> Mời chọn kì thi</option>';
			while ($row = mysql_fetch_array($ketqua)) {
				$idloai = $row['idloai'];
				$tenloai = $row['tenloai'];

				echo '<option value="' . $idloai . '"selected="selected">' . $tenloai . '</option>';
			}

			echo '</select>';
		}
	}


	public function load_khoilop($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {



			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$tenkhoi = $row['tenkhoi'];
				$idkhoi = $row['idkhoilop'];
				echo ' 
						</tr>
			
							  <td align="center"  class="boder:2px;"><a class="border btn btn-primary " style=" " href="giaodienhocsinh.php?idkhoi=' . $idkhoi . '">' . $tenkhoi . '</a></td>
						
						  </tr>';
			}
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}

	public function load_khoilop2($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {



			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$tenkhoilop = $row['tenkhoi'];
				$idkhoilop = $row['idkhoilop'];
				echo ' 
						</tr>
			
							  <td align="center"  class="boder:2px;"><a class="border btn btn-primary " style=" " href="giaodiengiaovien.php?id=' . $mataikhoan . '&gv=8&idkhoilop=' . $idkhoilop . '">' . $tenkhoilop . '</a></td>
						
						  </tr>';
			}
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}

	public function load_danhsach_lop($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

			echo '<table width="800" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="52" align="center"><strong>STT</strong></td>
						
							<td width="100" align="center"><strong>TÊN LỚP</strong></td>
							
						
						  </tr>';
			$dem = 1;
			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$dem = $dem++;
				$stt = $dem;
				$malop = $row['idlophoc'];
				$idkhoi = $row['idkhoi'];
				$tenlop = $row['tenlop'];


				echo ' </tr>
	     
				<td align="left" >' . $dem . '</td>
				<td align="left" >' . $tenlop . '</td>
				

</form></td>

				</tr>';

				$dem++;
			}
			echo '</table>';
		} else {
			echo 'Không có dữ liệu.';
		}
	}



	public function loadmon($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysql_fetch_array($ketqua)) {
				$id = $row['idmonhoc'];
				$tenmon = $row['tenmon'];

				echo ' <td align="center"  class="boder:2px;"><a class="border btn btn-primary " style=" " href="danhgia.php?id=' . $id . '">' . $tenmon . '</a></td>';
			}
		} else {
			echo 'Không có dữ liệu.';
		}
	}


	public function loaddanhgia($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {

		



  echo '<table width="800"  style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="52" align="left"><strong>STT</strong></td>
						
							<td width="100" align="left"><strong>TÊN BÀI KIỂM TRA</strong></td>
							<td width="100" align="left"><strong>ĐÁNH GIÁ</strong></td>
							
						
						  </tr>';

			$dem = 1;


			while ($row = mysql_fetch_array($ketqua)) {

				$tenbaikiemtra = $row['tenloai'];
				$danhgia = $row['danhgia'];
				$dem = $dem++;
				$stt = $dem;

			

							   echo ' </tr>
	     
				<td align="left" >' . $dem . '</td>
				<td align="left" >' . $tenbaikiemtra . '</td>
				<td align="left" >' . $danhgia . '</td>
				

</form></td>

				</tr>';

				$dem++;
			}
			echo '</table>';
		} else {
			echo 'Đang cập nhật...';
		}
	}
	public function loadbaikiemtra_2($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {
			echo '	<table width="700" cellpadding="2" align="center">
  <tr>
    <td width="79">STT</td>
    <td width="373">TÊN BÀI KIỂM TRA</td>

  </tr>';

			$dem = 1;

			while ($row = mysql_fetch_array($ketqua)) {
				$dem = $dem++;
				$stt = $dem;
				$id = $row['idbaikiemtra'];
				$tenbaikt = $row['tieude'];
				$idmon = $row['idmonhoc'];

				echo ' </tr>
							   <td align="left" >' . $dem . '</td>
							   <td align="left" ><a href=danhgia.php?id=' . $id . '">' . $tenbaikt . '</a></td>
							
								
							   </tr>';

				$dem++;
			}
			echo '</table>';
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}
	public function taotaikhoan($sql)
	{
		$link = $this->connect();
		if (mysql_query($sql, $link)) {
			return 1;
		} else {
			return 0;
		}
	}

	public function captaikhoan($sql)
	{
		$link = $this->connect();
		if (mysql_query($sql, $link)) {
			return 1;
		} else {
			return 0;
		}
	}
	public function load_thoigian($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		mysql_close($link);
		$i = mysql_num_rows($ketqua);
		if ($i > 0) {



			session_start();
			$mataikhoan = $_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua)) {
				$id = $row['id'];
				$thoigian = $row['thoigian'];
				echo ' 
							  </tr>
				  
									<td align="cen' . $id . '">' . $thoigian . '</td>
							  
								</tr>';
			}
		} else {
			echo 'Đang cập nhật dữ liệu...';
		}
	}
}
