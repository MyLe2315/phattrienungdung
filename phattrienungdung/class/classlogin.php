<?php
class login
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
	public function mylogin($user,$pass)
	{
		$pass=md5($pass);
		$link= $this->connect(); 
		$sql="select id, mataikhoan, matkhau,  magiaovien, mahocsinh, maqtvct from taikhoan where  magiaovien='$user' and matkhau='$pass' limit 1 ";
		$ketqua = mysql_query($sql, $link);
		 $i=mysql_num_rows($ketqua);
		  if ($i==1)
		  {
			while ($row=mysql_fetch_array($ketqua))
			{
				$id=$row['id']; 
				$mataikhoan=$row['mataikhoan']; 
				$pass=$row['matkhau']; 
				$magv=$row['magv']; 
				$mahs=$row['mahs']; 			
			}
			return 1;
		  }
		else
		{
			return 0;
		}
	}
	public function myloginhs($user,$pass)
	{
		$pass=md5($pass);
		$link= $this->connect(); 
		$sql="select id, mataikhoan, matkhau,  magiaovien, mahocsinh, maqtvct from taikhoan where mahocsinh='$user' and matkhau='$pass' limit 1 ";
		$ketqua = mysql_query($sql, $link);
		 $i=mysql_num_rows($ketqua);
		  if ($i==1)
		  {
			while ($row=mysql_fetch_array($ketqua))
			{
				$id=$row['id']; 
				$mataikhoan=$row['mataikhoan']; 
				$pass=$row['matkhau']; 
				$magv=$row['magv']; 
				$mahs=$row['mahs']; 			
			}
			return 1;
		  }
		else
		{
			return 0;
		}
	}
	public function myloginhqtv($user,$pass)
	{
		$pass=md5($pass);
		$link= $this->connect(); 
		$sql="select id, mataikhoan, matkhau, magiaovien, mahocsinh, maqtvct from taikhoan where maqtvct='$user' and matkhau='$pass' limit 1 ";
		$ketqua = mysql_query($sql, $link);
		 $i=mysql_num_rows($ketqua);
		  if ($i==1)
		  {
			while ($row=mysql_fetch_array($ketqua))
			{
				$id=$row['id']; 
				$mataikhoan=$row['mataikhoan']; 
				$pass=$row['matkhau']; 
				$magv=$row['magv']; 
				$mahs=$row['mahs']; 
				$idqtv=$row['idqtv'];			
			}
			return 1;
		  }
		else
		{
			return 0;
		}
	}
	
	
	
}
?>