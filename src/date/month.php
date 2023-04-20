<?php

namespace App\date;

class Month {

public $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
private $months = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre'];
public $month;
public $year;
public $menstrues;

    public function __construct(int $month = null, int $year = null, string $menstrues = null)
    {   
        if($month === null){
            $month = intval(date('m'));
        }
        if($year ===null){
            $year = intval(date('Y'));
        }
        if($menstrues === null){
            $menstrues = $_SESSION['date'];
        }
        if($month<1 || $month>12){
            throw new \Exception("Le mois $month n'est pas valide");
        }
        $this->month = $month;
        $this->year = $year; 
        $this->menstrues = $menstrues;
    }
//retourne le mois en toutes lettres
    public function toString():string
    {
        return $this->months[$this->month-1].' '.$this->year;
    }

//retourne le nombre de semaines d'un mois
    public function getWeeks():int{
        $start = $this->getStartingDay();
        $end =(clone $start)->modify('+1 month -1 day');
        $weeks = intval($end->format('W'))-intval($start->format('W'))+1;
        if($weeks<0){
            $weeks = intval($end->format('W'))+1;
        }
        return $weeks;
    }

//retourne le premier jour du mois
    public function getStartingDay():\DateTime
    {
        return new \DateTime("$this->year-$this->month-01");
    }


 //est-ce-que le jour est dans le mois?
    public function withinMonth (\DateTime $date):bool {
        return  $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
    }

//retourne le mois suivant
    public function nextMonth():Month{
        $month = $this->month + 1;
        $year = $this->year;
        if($month>12){
            $month = 1;
            $year += 1 ;
        }
        $cycle = intval($_SESSION['cycle']);
        $menstrues_date = new \Datetime($this->menstrues);
        $menstrues = $menstrues_date->modify("+".($cycle-1)."days")->format('Y-m-d');
        return new Month($month,$year,$menstrues);
    }

//retourne le mois precedent
    public function previousMonth():Month{
        $month = $this->month - 1;
        $year = $this->year;
        if($month<1){
            $month = 12;
            $year -= 1 ;
        }
        $cycle = intval($_SESSION['cycle']);
        $menstruesDate = $this->getStartingMenstrues();
        $menstrues = $menstruesDate->modify("-".($cycle-1)."days")->format('Y-m-d');
        return new Month($month,$year,$menstrues);
}
// precise si une date est dans la periode menstruelle
    public function isMenstruesPeriod(\DateTime $date):bool{
        if($this->isMenstruesPeriodOfTheCurrentMonth($date)){
            return true;
        }elseif($this->withinMenstruesPeriodOfThePreviousMonth($date)){
            return true;
        }elseif($this->withinMenstruesPeriodOfTheNextMonth($date)){
            return true;
        }else{
            return false;
        }
    }
    public function isMenstruesPeriodOfTheCurrentMonth(\DateTime $date):bool{
        $a=0;
        $duree = intval($_SESSION['duree']);
        $startMenstrues = $this->getStartingMenstrues();
        for($i=0 ; $i < $duree; $i++){
            $table[$i] = (clone $startMenstrues)->modify("+".($i)."days");
        }
        for($i=0; $i < $duree; $i++){
            if($date == $table[$i]){
                $a = 1;
            }
        }
        if($a==1){
            return true;
        }else{
            return false;
        }
    }
// retourne le debut de la periode menstruelle du mois
    public function getStartingMenstrues(): \Datetime{
        return new \DateTime($this->menstrues);
    }

// precise si une date correspond a la date d'ovulation
    public function isOvulation(\DateTime $date):bool{
        $ovulationDay = $this->getOvulationDay();
        if($date == $ovulationDay){
            return true;
        }elseif($this->isOvulationForThePreviousMonth($date)==true){
            return true;
        }elseif($this->isOvulationForTheNextMonth($date)==true){
            return true;
        }else{
            return false;
        }

    }
// retourne la date d'ovulation
    public function getOvulationDay():\DateTime{
        $cycle = intval($_SESSION['cycle']);
        $startMenstrues = $this->getStartingMenstrues();
        return $startMenstrues->modify("+".($cycle-14)."days");
    }
// precise si une date est dans la periode feconde
    public function isFecondPeriod(\DateTime $date):bool{
       if($this->isFecondPeriodOfTheCurrentMonth($date)){
           return true;
       }elseif($this->withinFecondPeriodOfThePreviousMonth($date)){
           return true;
       }elseif($this->withinFecondPeriodOfTheNextMonth($date)){
           return true;
       }else{
           return false;
       }
    }
// precise si une date est dans la periode feconde du mois courant
    public function isFecondPeriodOfTheCurrentMonth(\DateTime $date):bool{
        $a=0;
        $ovulationDay = $this->getOvulationDay();
        for($i=0 ; $i<3 ; $i++){
            $table[$i] = (clone $ovulationDay)->modify("-".($i+1)."days");
            $table[$i+3] = (clone $ovulationDay)->modify("+".($i+1)."days");
        }
        for($i=0; $i<6; $i++){
            if($date == $table[$i]){
                $a = 1;
            }
        }
        if($a==1){
            return true;
        }else{
            return false;
        }
    }
//precise si une date correspond a l'ovulation du mois precedent
    public function isOvulationForThePreviousMonth(\DateTime $date):bool{
       $previousMonth = $this->previousMonth();
       $ovulationDay = $previousMonth->getOvulationDay();
       if($date == $ovulationDay){
           return true;
       }else{
           return false;
       }
    }
//precise si une date correspond a l'ovulation du mois suivant
    public function isOvulationForTheNextMonth(\DateTime $date):bool{
        $nextMonth = $this->nextMonth();
        $ovulationDay = $nextMonth->getOvulationDay();
        if($date == $ovulationDay){
            return true;
        }else{
            return false;
        }
     }
//precise si une date est dans la periode menstruelle du mois precedent
    public function withinMenstruesPeriodOfThePreviousMonth(\DateTime $date):bool{
        $previousMonth = $this->previousMonth();
        return $previousMonth->isMenstruesPeriodOfTheCurrentMonth($date);
    }
//precise si une date est dans la periode menstruelle du mois suivant
    public function withinMenstruesPeriodOfTheNextMonth(\DateTime $date):bool{
        $nextMonth = $this->nextMonth();
        return $nextMonth->isMenstruesPeriodOfTheCurrentMonth($date);
}
//precise si une date est dans la periode feconde du mois precedent
    public function withinFecondPeriodOfThePreviousMonth(\DateTime $date):bool{
        $previousMonth = $this->previousMonth();
        return $previousMonth->isFecondPeriodOfTheCurrentMonth($date);
    }
//precise si une date est dans la periode feconde du mois suivant
    public function withinFecondPeriodOfTheNextMonth(\DateTime $date):bool{
        $nextMonth = $this->nextMonth();
        return $nextMonth->isFecondPeriodOfTheCurrentMonth($date);
}

//precise si un jour correspond a aujourd'hui
    public function isTheDateOfToday(\DateTime $date):bool{
        return date('Y-m-d')===$date->format('Y-m-d');
    }

//retourne les jours avant l'ovulation
    public function daysBeforeOvulation():int{
       $ovulation = $this->getOvulationDay();
       $today = new \DateTime(date('Y-m-d'));
       $interval = $ovulation->getTimestamp() - $today->getTimestamp();
       $interval_in_days = floor($interval/86400);

       return $interval_in_days;

    }

//retourne le nombre de jours ecoules apres le precedent cycle

    public function daysAfterStartCycle():int{
        $start_cycle = new \DateTime($this->menstrues);
        $today = new \DateTime(date('Y-m-d'));
        $interval = $today->getTimestamp() - $start_cycle->getTimestamp();
        $interval_in_days = floor($interval/86400);

        return $interval_in_days+1;
    }

// retourne le probabilite de tomber enceinte
    
    public function percentageOfPregnancy():int{
        $today = new \DateTime(date('Y-m-d'));
        if($this->isOvulation($today)){
            return 100;
        }elseif($this->isMenstruesPeriod($today)){
            return 5;
        }elseif($this->isFecondPeriod($today)){
            return 95;
        }elseif($this->isOvulation($today)){
            return 100;
        }else{
            return 2;
        }
    }

}