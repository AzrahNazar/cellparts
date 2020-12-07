<?php





session_start();


include '../db/db.php';


$gtot=0;


$id=htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');


$uid=htmlspecialchars(trim($_GET['uid']), ENT_QUOTES, 'UTF-8');








$order_user="";


  $log=htmlspecialchars(trim($$_SESSION['login']), ENT_QUOTES, 'UTF-8');


 if (empty($id)) {

	 $redirectUrl = "index.php";


echo "<script type=\"text/javascript\">";


        echo "window.location.href = '$redirectUrl'";


        echo "</script>";


	 


  }





?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">


<head>


<title>samudra medical books</title>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<link href="../cellular.css" rel="stylesheet" type="text/css">


</head>





<body>


<table width="996" align="center" bgcolor="#FFFFFF">


  <tr>


    <td colspan="5"><img src="../img/banner.jpg" width="1000" height="133" /></td>


  </tr>





<tr>


   <td width="2">


    <td width="936" height="503" valign="top"> 


      <table width="886" align="center">


	  <tr><td><table width="878">


              <tr>


                <td width="228"><a href="view_status.php"><strong><font color="#990000">&lt;&lt; 


        Back </font></strong></a></td>


                <td width="638" align="right">&nbsp;</td>


              </tr></table></td></tr>


        <tr> 


          <td width="878" height="27"  align="center"><table width="771" >


              <tr> 


                <td colspan="2"> 


                  <?php 


				


	$sqlx="SELECT * FROM cart_details where order_id='".$id."' and User_ID='$uid'";


	


$resultx=mysql_query($sqlx);


   			


		 while ($rowx = mysql_fetch_array($resultx)){


		  $subt=($rowx['price'])*($rowx['Qty']);


		  


			 $order_user=$uid;


			 


			    $xx=$xx+1;		





 ?>


                  <table width="805" border="0" cellspacing="0" cellpadding="0">


                    <form name="form1" id="form1" method="post" action="">


                      <tr> 


                        <td width="34" rowspan="2" valign="middle"><div align="center"> 


                            <?php  echo $xx; ?>


                          </div></td>


                        <td width="151" rowspan="2" valign="middle" ><div align="center"><img src="../img/sumeda_p/<?php echo $rowx['img']; ?>" width="128" height="170" ></div></td>


                        <td width="141" rowspan="2" class="catsmall"> 


                          <?php  echo $rowx['name']; ?>


                        </td>


                        <td width="107" valign="bottom"><div align="center"><font color="#006699">Qty</font> 


                            <input name="qty" class="qInput" type="text" value="<?php  echo $rowx['Qty']; ?>" size="7" />


                            &nbsp;&nbsp;&nbsp;&nbsp; </div></td>


                        <td width="159" height="93" valign="bottom" class="newtext"> <div align="left"> 


                            <font color="#000099">x&nbsp;&nbsp;&nbspPrice :</font> Rs. 


                            <?php  echo $rowx['price']; ?>


                            &nbsp;&nbsp;&nbsp;&nbsp; <font color="#000099">=</font> 


                          </div></td>


                        <td width="213" valign="bottom" class="newtext" align="left"> <font color="#000099">&nbsp;&nbsp;Sub 


                          Total:</font>&nbsp;&nbsp; Rs. 


                          <?php  echo $subt; $gtot=$gtot+$subt; ?>


                        </td>


                      </tr>


                      <tr> 


                        <td width="107" valign="middle"><div align="center"> </div></td>


                        <td height="93" colspan="2" valign="middle" class="bultext">&nbsp; 


                        </td>


                      </tr>


                    </form>


                  </table>


                  <?php  } ?>


                </td>


              


              </tr>


			  <tr>


                


                <td height="25"  > </td>


				


				<td align="right" class="bultext">___________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>


              </tr>


              <tr>


                


                <td  ></td>


				


				<td align="right" class="bultext"><font color="#990000">Grand 


                  Total :</font> Rs. 


                  <?php  echo $gtot; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>


              </tr>


			  <tr>


                


                <td> </td>


				


				<td align="right" class="bultext" valign="top"><img src="../img/linetwo.jpg" align="top" width="104"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>


              </tr>


              <tr> 


                <td width="404"><div align="right"> 


                    <?php $sqlz="SELECT * FROM cust where usern='".$order_user."'";


	           $resultz=mysql_query($sqlz);


			  		


		 while ($rowz = mysql_fetch_array($resultz)){


		 $title=$rowz['title'];


		  $nic=$rowz['nic'];


		   $mobi=$rowz['mobi'];


		    $home=$rowz['home'];


		  $eadd=$rowz['eadd'];


		  $add1=$rowz['add1'];


		


		 


		 


		 }?>


                  </div></td>


                <td width="355">&nbsp; </td>


              </tr>


			  <tr bgcolor="#CCCCCC"> 


                <td width="404" colspan="2"> 


                  <table width="790" align="center"  class="ttext">


                    <tr bgcolor="#EFEFEF"> 


                      <td width="114"><font color="#990000">Name:</font></td>


                      <td width="664"> 


                        <?php  echo $title; ?>&nbsp;&nbsp;<?php  echo $nic; ?>


                      </td>


                    </tr>


					  


                    <tr bgcolor="#EFEFEF"> 


                      <td width="114" height="20"><font color="#990000">Mobile:</font></td>


                      <td width="664"> 


                        <?php  echo $mobi; ?>


                      </td>


                    </tr>


					  


                    <tr bgcolor="#EFEFEF"> 


                      <td width="114" height="20"><font color="#990000">Tel:</font></td>


                      <td width="664"> 


                        <?php  echo $home; ?>


                      </td>


                    </tr>


					  


                    <tr bgcolor="#EFEFEF"> 


                      <td width="114" height="20"><font color="#990000">Email:</font></td>


                      <td width="664"> 


                        <?php  echo $eadd; ?>


                      </td>


                    </tr>


					  


                    <tr bgcolor="#EFEFEF"> 


                      <td width="114" height="20"><font color="#990000">Address(Delivery):</font></td>


                      <td width="664"> 


                        <?php  echo $add1; ?>


                      </td>


                    </tr>


					  </table></td>


                


              </tr>


            </table></td>


        </tr>


      </table>


		


		


		</td>


  </tr>


<tr>


<td height="35" colspan="3" bgcolor="#990000">&nbsp;</td>


  </tr>


</table>


</body>


</html>


