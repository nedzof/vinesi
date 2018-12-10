<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 16:59
 */

use view\TemplateView;

?>
<!DOCTYPE html>
<html>
<body>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Monthly Rent</th>
        <th>Utilities</th>
        <th>Payment Method</th>
        <th>Deposit</th>
        <th>Start</th>
        <th>End</th>
        <th>Property ID</th>
        <th>Tenant ID</th>
        <th>Tenant Name</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $result1 = getLeaseTable();
    for ($i = 0; $i < count($result1); $i++){
    $row = $result1[$i];?>
    <tr>
        <td><?php echo $customer->getId(); ?> </td>
        <td><?php echo TemplateView::noHTML($customer->getName()); ?></td>
        <td><?php echo TemplateView::noHTML($customer->getEmail(), false); ?> </td>
        <td><?php echo TemplateView::noHTML($customer->getMobile()); ?> </td>
        <td><a class="action"
               href="<?php echo url_for('../public/files/lease/edit.php?id=' . h(u($row['leaseid']))); ?>">Edit</a>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>