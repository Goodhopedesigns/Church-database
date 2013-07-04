<?php

echo "<table>";
echo form_open('member_ministry/assignMember');
echo "<tr>";
echo "<td><label for = 'member'>ASSIGN </label></td>";
echo "<td>".  form_dropdown('member',$members)."</td><td> </td>";
echo "<td><label for = 'member'>TO</label></td>";
echo "<td>".  form_dropdown('ministry',$answer)."</td><td> </td>";
echo "</tr>";
echo "<tr><td></td><td>".form_submit('submit','submit')."</td><td></td><td>".form_submit('cancel','cancel')."</td></tr>";
echo form_close();
echo "</table>";
?>
