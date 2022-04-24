<?php
class quanli
{
	private function connect()
		{
			$con =mysql_connect("localhost","root","");
			if(!$con)
			{
				echo 'Không kết nối duoc csdl';
				exit();
			}
			else
			{
				mysql_select_db("webkiemtratructuyen"); 
				mysql_query("SET NAMES UTF8"); 
				return $con;
			}
		}
public function themxoasua($sql)
	{
		$link=$this->connect();
		if(mysql_query($sql,$link))
		{
			return 1;
		}
		else
		{
			return 0;	
		}
			
	}
	public function laycot($sql)
	{
		$link= $this->connect(); 
		$ketqua=mysql_query($sql, $link);
		 mysql_close($link);
		 $i=mysql_num_rows ($ketqua);
		 $giatri='';
		  if ($i>0)
		  {
			
			while ($row = mysql_fetch_array($ketqua))
			{
				$id=$row[0];
				$giatri=$id;
				
			}
		  }
		  return $giatri;
		 }
		 public function load_ds_giaovien($sql)
	{
		$link= $this->connect(); 
		$ketqua=mysql_query($sql, $link);
		mysql_close($link);
		$i=mysql_num_rows($ketqua);
		  if ($i>0)
		  {
			 
			  echo'<table width="1200" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
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
				$dem=1;
				session_start();
				$mataikhoan=$_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua))
			{	
				$dem=$dem++;
				$stt=$dem;
				$magv=$row['magiaovien'];
				$diachi=$row['diachi'];
				$email=$row['email']; 
				$sdt=$row['sdt'];
				$hodem=$row['hodem'];
				$ten=$row['tengiaovien'];
				$ngaysinh=$row['ngaysinh'];
				$idmonhoc=$row['idmonhoc'];
				
				echo' </tr>
						  <td align="center"align="miđle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&cn=1&magv='.$magv.'">'.$dem.'</a></td>
						  <td align="left" align="middle"><a  style=" text-decoration: none;"href="?id='.$mataikhoan.'&cn=1&magv='.$magv.'">'.$magv.'</a></td>
						  <td align="center" align="middle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&cn=1&magv='.$magv.'">'.$hodem.'</a></td>
						  <td align="center" align="middle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&cn=1&magv='.$magv.'">'.$ten.'</a></td>
						  <td align="center" align="middle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&cn=1&magv='.$magv.'">'.$diachi.'</a></td>
						  <td align="center" align="middle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&cn=1&magv='.$magv.'">'.$email.'</a></td> 
						  <td align="center" align="middle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&cn=1&magv='.$magv.'">'.$sdt.'</a></td>
						  <td align="center" align="middle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&cn=1&magv='.$magv.'">'.$ngaysinh.'</a></td>
						  <td align="center" align="middle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&cn=1&magv='.$magv.'">'.$idmonhoc.'</a></td>
						  </tr>';
						  
				$dem++;
				
			}
			
			echo'</table>';
		  }
			else
			{
				echo 'Đang cập nhật dữ liệu...';
			
			}
		 }	}
?>