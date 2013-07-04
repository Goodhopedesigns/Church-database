<?php
    echo "<ul>";
    echo    "<li>". anchor('expenditure/viewExpenditure','VIEW EXPENDITURES').
                  "<br/> >> click the link above to view the church's expenditures on different transactions.</li>";
    echo    "<li>". anchor('expenditure/recordExpenditureFrm','RECORD EXPENDITURES').
                  "<br/> >> click the link above to record the expenses on different transactions.</li>";
    echo        "<li>". anchor('expenditure/viewExpenditureCategory','VIEW EXPENDITURE CATEGORIES').
                  "<br/> >> click the link above to view/add/edit/remove the expenditure categories.</li>";
    echo "</ul>";
?>
