<?php
class quanli1
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
				mysql_select_db("web111"); 
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
		 
		 
		 
		 	public function loadlop6($sql)
	{
		$link= $this->connect(); 
		$ketqua = mysql_query($sql, $link);
		 mysql_close($link);
		 $i=mysql_num_rows($ketqua);
		  if ($i>0)
		  {
			   session_start();
                     $mataikhoan=$_SESSION['mataikhoan'];
			while ($row=mysql_fetch_array($ketqua))
			{
			
				$idlophoc=$row['idlophoc'];
				$idkhoilop=$row['idkhoilop'];
				$tenlop=$row['tenlop']; 
	 			echo '<a class="lop" href="?id='.$mataikhoan.'&gv=8&idlophoc='.$idlophoc.'">'.$tenlop.'</a>';
				echo '<br>';
			}
		}
		else
		{ 
			echo 'không có dữ liệu';
		}
	}
			
			
			public function loaddiemso6($sql)
	{
		$link= $this->connect(); 
		$ketqua=mysql_query($sql, $link);
		 mysql_close($link);
		  $i=mysql_num_rows($ketqua);
		  if ($i>0)
		    {
		  echo'<table width="830" border="1" style="margin:20px 0px 20px 0px" align="center" cellpadding="2" cellspacing="0">
						  <tr>
							<td width="180" align="center"><strong>TÊN HỌC SINH</strong></td>
							
							<td width="200" align="center"><strong>TIÊU ĐỀ BÀI</strong></td>
							<td width="200" align="center"><strong>TRẠNG THÁI</strong></td>
							<td width="100" align="center"><strong>BÀI NỘP</strong></td>
							<td width="50" align="center"><strong>ĐIỂM SỐ</strong></td>
						  </tr>';
		 session_start();
                     $mataikhoan=$_SESSION['mataikhoan'];
			while ($row = mysql_fetch_array($ketqua))
			{
				$idbaikiemtra=$row['idbaikiemtra'];
				$tenhocsinh=$row['tenhocsinh']; 
				
				$tieude=$row['tieude'];
				$trangthai=$row['trangthai'];
				$idlophoc=$row['idlophoc'];
				$file=$row['file'];
				$diemso=$row['diemso'];
				
				echo' </tr>
						 	<td align="center" align="miđle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&gv=8&idlophoc='.$idlophoc.'&idbaikiemtra='.$idbaikiemtra.'">'.$tenhocsinh.'</a></td>
							
							<td align="center" align="miđle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&gv=8&idlophoc='.$idlophoc.'&idbaikiemtra='.$idbaikiemtra.'">'.$tieude.'</a></td>
 	 						<td align="center" align="miđle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&gv=8&idlophoc='.$idlophoc.'&idbaikiemtra='.$idbaikiemtra.'">'.$trangthai.'</a></td>
							<td align="center" align="miđle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&gv=8&idlophoc='.$idlophoc.'&idbaikiemtra='.$idbaikiemtra.'">'.$file.'</a></td>
							<td align="center" align="miđle"><a style=" text-decoration: none;" href="?id='.$mataikhoan.'&gv=8&idlophoc='.$idlophoc.'&idbaikiemtra='.$idbaikiemtra.'">'.$diemso.'</a></td>
								
				</div>';
				
						  
			}
					echo'</table>';
		  }
			else
			{
				echo 'Đang cập nhật dữ liệu...';
			
			}
		 	
		 }


}
?>