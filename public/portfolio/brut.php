<table border=1>
<?php
$data = "test";

foreach (hash_algos() as $v)
{
	echo "<tr>";
$time_start = microtime(true);
$r = hash($v,$data,false);
$time_end = microtime(true);
$time = $time_end - $time_start;
printf("<td> %-12s</td><td> %3d</td> <td> %s </td>",$v,strlen($r),$r);
echo "<td>".($time)."micro-secondes</td>";
$time_start=0;$time_end=0;$time=0;
echo "</tr>";
}
?>

</table>