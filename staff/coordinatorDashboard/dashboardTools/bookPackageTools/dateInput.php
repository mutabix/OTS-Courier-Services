<!--<div class="form-group">
    <label for="receiverState">State / Territory</label>
    <select class="form-control" id="receiverState" name="receiverState">
        <?php 
            //int numberOfDays = 31;
            //for(int i=0; i<numberOfDays; i++){

            }
        ?>
        <option selected disabled>Select State / Territory</option>
        <option>QLD</option>
        <option>NSW</option>
        <option>ACT</option>
        <option>VIC</option>
        <option>SA</option>
        <option>NT</option>
        <option>WA</option>
        <option disabled>TAS</option>
    </select>
</div>-->

<select name="year">
  <option value="">Year</option>
  <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
    <?php } ?>
</select>
<select name="month">
    <option value="">Month</option>
    <?php for ($month = 1; $month <= 12; $month++) { ?>
    <option value="<?php echo strlen($month)==1 ? '0'.$month : $month; ?>"><?php echo strlen($month)==1 ? '0'.$month : $month; ?></option>
    <?php } ?>
</select>
<select name="day">
  <option value="">Day</option>
    <?php for ($day = 1; $day <= 31; $day++) { ?>
    <option value="<?php echo strlen($day)==1 ? '0'.$day : $day; ?>"><?php echo strlen($day)==1 ? '0'.$day : $day; ?></option>
    <?php } ?>
</select>

