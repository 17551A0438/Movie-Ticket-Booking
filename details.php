<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location:login.php");
	exit;
} 
include('header.php');
?>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-6">
        <table  class="table table-bordered table-striped">
		<tbody>   
		<?php
        function l($count,$k)
        {
        $arr=array();
        $arr=['A','B','C','D','E','F'];           
            if($count<=10)
            {
                echo '<td>';       
                echo '<button type="button" data-price=100 class="num" value="'.$arr[$k].$count.'">'.$arr[$k].$count.'</button>';
                echo '</td>';
                l($count+1,$k+0);       
            }           
            if($count==11 && $k<count($arr)-1)
            {
                echo '<tr>';               
                echo '</tr>';
            l(1,$k+1);
            }           
        }       
        l(1,0);   
        ?>
        </tbody>
        </table>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>
