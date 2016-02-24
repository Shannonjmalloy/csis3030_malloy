 <?php 
  include("header.php"); 
  include("global.php"); 
?>
<div id="container">
<br/>
     
    <span style="color: red;">
      <?php echo $errormessage; ?>
    </span>
  
    
    <form method="POST" action="checkout_process.php">
      <label for="firstname">First name:</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $first_name;?>">
        <br /> <br />      

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo $address;?>">
        <br /> <br />
     
        <label for="city">City:</label>
        <input type="text" name="city" id="city" value="<?php echo $city;?>">
        <br /> <br />

        <label for="state">State:</label>
        <input type="text" name="state" id="state" value="<?php echo $state;?>">
        <br /> <br />

        <label for="zip">Zip code:</label>
        <input type="text" name="zip" id="zip" value="<?php echo $zip;?>">
        <br /> <br />     
      
        <input type="submit" value="Submit Order">

      </form>

    </div>


<?php 
  include("footer.php"); 
?>