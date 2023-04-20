<?php 
require("src/date/month.php");
try{
$month = new App\date\Month($_GET['month']??null,$_GET['year']??null); 
$start = $month->getStartingDay()->modify('last monday');
}catch(\Exception $e) {
    $month = new App\date\Month();
}
?>
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3 calendar__header">
    <h2><?php echo $month->toString();?></h2>
    <div>
    <a href="calendar.php?month=<?=$month->previousMonth()->month;?>&year=<?=$month->previousMonth()->year;?>" class="btn btn-primary">&lt;</a>
    <a href="calendar.php?month=<?=$month->nextMonth()->month;?>&year=<?=$month->nextMonth()->year;?>" class="btn btn-primary">&gt;</a>
    </div>
</div>

<table class="table calendar__table calendar__table--<?= $month->getWeeks(); ?>weeks">
<?php for($i = 0; $i < $month->getWeeks(); $i++):?>
<tr>
    <?php foreach($month->days as $k => $day):
        $date = (clone $start)->modify("+" . ($k + $i * 7) . "days")
        ?>
    <td class="<?= $month->withinMonth($date)? '' : 'calendar__othermonth';?>">
        <?php if($i == 0):?>
       <div class="calendar__weekday"> <?php echo $day; ?></div>
        <?php endif;?>
       <div class="calendar__day"> <?= $date->format('d');?></div>
    </td>
<?php endforeach; ?>
</tr>
<?php endfor; ?>
</table>
<ul>
    <h5><li class="first_li">Ovulation</li></h5>
    <h5><li class="second_li">Periode feconde</li></h5>
    <h5><li class="third_li">Menstruations</li></h5>
</ul> 
