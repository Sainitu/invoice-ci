<!DOCTYPE html>

<html lang=”en”>

<head>

<meta charset=”UTF-8">

<meta name=”viewport” content=”width=device-width, initial-scale=1.0">

<title>Invoice</title>
<style>
    .row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}
#imga{
  display: none;
  opacity: 0;
}
#container{
  font-size: 14px;
}
</style>
</head>

<body>
<div id="container" style="font-family: arial,sans-serif;">
  <div style="margin-bottom: 20px;">
    <h2 style="text-align: center;">Invoice</h2>
  </div>
  <table style="width: 100%; border-collapse: collapse; border: none;">
  <tr>
    <td style="width: 60%; padding: 10px;">
      <p style="font-weight: bold;">From:</p>
      <address>
        CompanyName, Inc.<br>
        Rajasthan, Ind<br>
        Email: Admin@CompanyName.com
      </address>
    </td>
    <td style="text-align: right; padding: 10px;">
      <img  id="imga" src="http://localhost/admin-template/invoice/assests/theme/logo-sample.png" alt="Company Logo" width="200" height="100">
      <img src="<?php echo base_url(); ?>assests/theme/logo-sample.png" alt="Company Logo" width="200" height="100">
    </td>
  </tr>
  <tr>
    <td style="width: 40%; padding: 10px;">
      <p style="font-weight: bold;">To:</p>
      <address>
        Admin, Inc.<br>
        Name:- <?php echo $resultData['first_name'].'' .$resultData['last_name']; ?><br>
        Phone: <?php echo $resultData['mobile']; ?><br>
        Email: <?php echo $resultData['email']; ?> 
      </address>
    </td>
    <td colspan="2" style="width: 60%; padding: 10px;">
      <div style="display: flex; justify-content: space-between;">
        <p>Invoice ID: #<?php echo $resultData['date']; ?></p>
        <p>Invoice Date: <?php echo $resultData['invoice_id']; ?></p>
      </div>
    </td>
  </tr>
</table>


  <div style="margin-top: 20px;">
    <table style="width: 100%; border-collapse: collapse; ">
      <thead>
        <tr>
          <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 5px;">Qty</th>
          <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 5px;">Product</th>
          <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 5px;">Price (Per unit)</th>
          <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 5px;">Amount (Per item)</th>
        </tr>
      </thead>
      <tbody id="inv_items">
      <?php foreach ($mergedData as $item): ?>
        <tr>
            <td><?php echo $item['p_quantity']; ?></td>
            <td><?php echo $item['pname']; ?></td>
            <td><?php echo $item['p_price']; ?></td>
            <td><?php echo $item['p_amount']; ?></td>
        </tr>
    <?php endforeach; ?>

        </tbody>
        <tr style="border-top: 0; border-bottom: 1px solid black;">
            <td colspan="4"></td>
            </tr>
    </table>
  </div>
  <p style="font-weight: bold;">Payment Methods:</p>
   
  <div class="row">
  <div class="column">
    <table>
      <tr style="text-align: center;">
        <th><img src="<?php echo base_url(); ?>/assests/theme/dist/img/credit/visa.png" alt="Visa"></th>
        <th><img src="<?php echo base_url(); ?>/assests/theme/dist/img/credit/mastercard.png" alt="Mastercard"></th>
      <!-- </tr>
      <tr> -->
      <th><img src="<?php echo base_url(); ?>/assests/theme/dist/img/credit/american-express.png" alt="American Express"></th>
        <th><img src="<?php echo base_url(); ?>/assests/theme/dist/img/credit/paypal2.png" alt="Paypal"></th>
      </tr>
    </table>
  </div>
  <div class="column">
    <table>
            <tr>
            <td></td>
            <td style="width: 50%; text-align: left; padding-right: 10px;">Subtotal:  <?php echo $resultData['sub_total']; ?></td>
            </tr>
            <tr>
            <td></td>
            <td style="width: 50%; text-align: left; padding-right: 10px;">Service Tax(10%): <?php echo $resultData['service_tax']; ?></td>
            </tr>
            <tr>
            <td></td>
            <td style="width: 50%; text-align: left; padding-right: 10px;">Total:  <?php echo $resultData['grand_total']; ?></td>
            </tr>
    </table>
  </div>
</div>


</div>
</body>

</html>