<form method=post><input type="text" name="table">
<input type="text" name="time">
<input type="text" name="ans"><button name='sub'>sub</button>
<?php 
if(isset($_POST['sub'])){
$first=$_POST['table']; 
$sec=$_POST['time']; 
$ans= ($sec - $first);
	echo"<input type='text' value='$ans'>";
}
?>
</form>
