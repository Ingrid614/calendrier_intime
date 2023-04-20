<?php if($_GET['id']==null){
	 header("location:index.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/calendar.css">
	<link rel="stylesheet" type="text/css" href="css/home_styles.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
    <title>home page</title>
</head>
<body>
    <div id="home_page">
	<?php require_once("entete.php"); ?>
		<div class="d-flex flex-row align-items-center justify-content-between mx-sm-5">
			<div id="calendar">
							<?php 
					
				require("src/date/month.php");
				try{
				$month = new App\date\Month($_GET['month']??null,$_GET['year']??null,$_GET['menstrues']??$_SESSION['date']); 
				$start = $month->getStartingDay()->modify('last monday');
				}catch(\Exception $e) {
					$month = new App\date\Month();
				}
				?>
				<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3 calendar__header">
					<h2><?php echo $month->toString();?></h2>
					<div>
					<a href="home_page.php?id=<?=$_SESSION['user_id'];?>&month=<?=$month->previousMonth()->month;?>&year=<?=$month->previousMonth()->year;?>&menstrues=<?=$month->previousMonth()->menstrues;?>" class="btn btn-primary">&lt;</a>
					<a href="home_page.php?id=<?=$_SESSION['user_id'];?>&month=<?=$month->nextMonth()->month;?>&year=<?=$month->nextMonth()->year;?>&menstrues=<?=$month->nextMonth()->menstrues;?>" class="btn btn-primary">&gt;</a>
					</div>
					<!-- <h4><?= $_SESSION['user_name'];?></h4> -->
				</div>

				<table class="table calendar__table--<?= $month->getWeeks(); ?>weeks">
				<?php foreach($month->days as $day):?>
				<th class="lead"><?= $day?></th>
				<?php endforeach; ?>
				<?php for($i = 0; $i < $month->getWeeks(); $i++):?>
				<tr>
					<?php foreach($month->days as $k => $day):
						$date = (clone $start)->modify("+" . ($k + $i * 7) . "days")
						?>
					<td class="<?= $month->withinMonth($date)? '' : 'calendar__othermonth';?> <?= $month->isMenstruesPeriod($date)?  'calendar__menstruesPeriod' : ''?> <?= $month->isOvulation($date)? 'calendar__ovulation' : ''?> <?= $month->isFecondPeriod($date)? 'calendar__fecondperiod' : ''?> <?= $month->isTheDateOfToday($date)? 'calendar__today' : ''?>">
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

			</div>
			<div id="informations">
			    <?php $currentMonth = new App\date\Month()?>
				<div id="parameters">
					<div class="lead"><h5><u>Aujourd'hui : <?= date('d-M-y');?></u></h5></div>
					<div id="parameters_section_1">
						<button><u>ovulation</u><br><b>JJ-<?= $currentMonth->daysBeforeOvulation();?> jours</b></button>
						<button><u>regles</u><br><b>JJ-5 jours</b></button>
					</div>
					<div id="parameters_section_2">
						<button><u>cycle</u><br><b> <?= $currentMonth->daysAfterStartCycle();?>eme jour</b></button>
						<button><u>grossesse</u><b><br><?= $currentMonth->percentageOfPregnancy();?>% </b></button>
					</div>
				</div>
			</div>
		</div>
    </div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
