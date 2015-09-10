<!DOCTYPE html>
<html>

<head>
  <title>Order Summary</title>
  <meta charset = "utf-8">
  <meta name="description" content="CMP SCI 3010; Project 2">             
  <meta name="author" content="Dan Wilder">

  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
    }
  </style>

</head>

<body>

<?php
  
  $axl = $_POST["AXL"];
  $xrj = $_POST["XRJ"];
  $zza = $_POST["ZZA"];
  $state = $_POST["state"];

  $numWidgets = $axl + $xrj + $zza;

  $axlCost = 12.45 * $axl;
  $xrjCost = 15.34 * $xrj;
  $zzaCost = 28.99 * $zza;

  $subTotal = $axlCost + $xrjCost + $zzaCost;

  if ($numWidgets > 40) {
    $discount = $totalCost * 0.05;
    $totalCost = $subTotal - $discount;	
  } else {
    $totalCost = $subTotal;
  }

  if (strcasecmp ($state, "MO") == 0)
  {
    $tax = 0.04375;
    $totalCost *= 1.04375;
  }
  else {
    $tax = 0;
  }
?>

  <table>
    <tr>
      <th>Model Number</th>
      <th>Unit Price</th>
      <th>Amount</th>
      <th>Total Price</th>
    </tr>

    <tr>
      <td>37AX-L</td>
      <td>$12.45</td>
      <td><?php echo $axl; ?></td>
      <td><?php printf("$%1\$.2f", $axlCost); ?></td>
    </tr>

    <tr>
      <td>42XR-J</td>
      <td>$15.34</td>
      <td><?php echo $xrj; ?> </td>
      <td><?php printf("$%1\$.2f", $xrjCost); ?></td>
    </tr>

    <tr>
      <td>93ZZ-A</td>
      <td>$28.99</td>
      <td><?php echo $zza; ?> </td>
      <td><?php printf("$%1\$.2f", $zzaCost); ?></td>
    </tr>
  </table>

  <?php
    printf("Your subtotal is $%1\$.2f", $subTotal);
   
    if ($numWidgets > 40) {
      printf("You receive a discount of $%1\$.2f since you ordered more than 40 widgets.", $discount);
    }

    if (strcasecmp ($state, "MO") == 0)
    {
      printf("Missour sales tax 4.375% : $%1\$.2f", ($tax * $totalCost)); 
    
    }
    
    printf("Your total cost is $%1\$.2f", $totalCost);
  
   ?>

</body>
</html>

