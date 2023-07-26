<?php 

include('functions/userFunctions.php') ;
include('includes/header.php');
include('config/dbcon.php');
include('authenticator.php');

function build_calendar($month,$year)
{
    $daysOfTheWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

    $firstDayofMonth = mktime(0,0,0,$month,1,$year);

    $numberOfDays = date('t',$firstDayofMonth);

    $dateComponents = getdate($firstDayofMonth);

    $monthName = $dateComponents['month'];

    $daysOfTheWeek = $dateComponents['wday'];

    $dateToday = date('Y-m-d');

    $calendar = "<table class='table table-bordered'>";
    $calendar.= "<center><h2> $monthName $year </h2>";
    $calendar.= "<a class ='btn btn-xs btn-primary me-2' href='?month=".date('m',mktime(0,0,0,$month-1, 1, $year))."&year=".date('Y', mktime(0,0,0,$month-1,1, $year))."'>Previous Month</a>";

    $calendar.= "<a class ='btn btn-xs btn-primary me-2' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";

    $calendar.= "<a class ='btn btn-xs btn-primary me-2' href='?month=".date('m',mktime(0,0,0,$month+1, 1, $year))."&year=".date('Y', mktime(0,0,0,$month+1,1, $year))."'>Next Month</a></center><br>";

    $calendar.= "<tr>";

    if(is_array($daysOfTheWeek))
    {
        foreach($daysOfTheWeek as $day)
        {
            $calendar.= "<th class='header'> $day </th>";
        }    
    }

    $calendar.= "<tr></tr>";

    if($daysOfTheWeek > 0 )
    {
        for($k=0 ; $k < $daysOfTheWeek; $k++)
        {
            $calendar.="<td class='empty'></td>";

        }
    }

    $currentDay = 1;

    $month = str_pad($month ,2 ,"0" , STR_PAD_LEFT);

    while($currentDay <= $numberOfDays)
    {
        if($daysOfTheWeek == 7)
        {
            $daysOfTheWeek = 0;
            $calendar.= "<tr></tr>";
        }



        $currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayName = strtolower(date('l',strtotime($date)));
        $eventNum = 0;

        // if($dateToday == $date)
        // {
        //     $calendar.="<td class='today bg-warning'><h4>$currentDay</h4>";
        // }
        // else
        // {
        //     $calendar.="<td><h4>$currentDay</h4>";
        // }
        $today =  $date == date('Y-m-d')?"today":"";
        if($date < date('Y-m-d'))
        {
            $calendar.="<td><h4> $currentDay </h4><button class='btn btn-xs btn-danger'>N/A</button>";
        }
        else
        {
            $calendar.="<td class='$today'><h4> $currentDay </h4><a href='book.php?date=".$date."' class='btn btn-xs btn-success'>Book</a>";
        }



        $calendar.= "</td>";

        $currentDay++;
        $daysOfTheWeek++;

    }

    if($daysOfTheWeek > 0 )
    {
        $remainingDays = 7-$daysOfTheWeek;
        for($i=0 ; $i < $remainingDays; $i++)
        {
            $calendar.="<td></td>";

        }
    }

    $calendar.= "</tr>";
    $calendar.= "</table>";

    echo $calendar;

}


?>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table{
            table-layout: fixed;
        }
        td{
            width: 33%;
        }
        .today{
            background: yellow;
        }

    </style>



    </head>

<body>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <?php 
            $dateComponents = getdate();
            $month = $dateComponents['mon'];
            $year = $dateComponents['year'];
            echo build_calendar($month,$year);
            ?>

        </div>
    </div>
</div>

</body>
</html>
<?php 
include('includes/footer.php');
?>