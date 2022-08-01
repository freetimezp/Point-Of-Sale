<?php

//graph creator

class Graph
{
    public $canvasX = 1000;
    public $canvasY = 400;
    public $title = "Graph title";
    public $xTitle = "Title X";

    public function display($data) {
        $canvasY = $this->canvasY;
        $canvasX = $this->canvasX;

        if(!is_array($data) || empty($data)) {
            echo "Data must be an array and not empty!";
            return;
        }

        $xText = array_keys($data);

        $maxY = max($data);
        $maxX = count($data);

        if($maxY == 0) {
            //echo "Not sales yet!";
            return;
        }

        $multiplierY = $canvasY / $maxY;
        $multiplierX = $canvasX / $maxX;

        $num = 1;
        $points = "0,$canvasY ";
        foreach ($data as $key => $value) {
            $points .= $multiplierX*$num . "," . $canvasY - ($value*$multiplierY) . " ";
            $num++;
        }
        $points .= "$canvasX, $canvasY";

        $extraX = 100;
        $extraY = 50;
    ?>

        <div class="graph-table">
            <svg viewBox="0 -<?=$extraY;?> <?=$canvasX + $extraX;?> <?=$canvasY + ($extraY * 2);?>" class="border">
                <!-- top to bottom lines-->
                <?php
                    for($i = 0; $i < $maxX; $i++) {
                        $x1 = $i * $multiplierX;
                        $y1 = 0;
                        $x2 = $x1;
                        $y2 = $canvasY;
                        ?>
                        <polyline class="poly_top_bottom" points="<?=$x1;?>,<?=$y1;?> <?=$x2;?>,<?=$y2;?>" />
                        <?php
                    }
                ?>
                <polyline class="poly_top_bottom" points="<?=$canvasX;?>,0 <?=$canvasX;?>,<?=$canvasY;?>" />

                <!-- left to right lines-->
                <?php
                $max_lines = count($data);
                $segmentY = floor($canvasY / $max_lines);
                for($i = 0; $i < $max_lines; $i++) {
                    $x1 = 0;
                    $y1 = $i * $segmentY;
                    $x2 = $canvasX;
                    $y2 = $y1;

                    ?>
                    <polyline class="poly_left_right" points="<?=$x1;?>,<?=$y1;?> <?=$x2;?>,<?=$y2;?>" />
                    <?php
                }
                ?>

                <polyline class="poly" points="<?=$points;?>" />

                <!-- set circles-->
                <?php
                    $num = 1;
                    $points = "0,$canvasY ";
                    foreach ($data as $key => $value) {
                        ?>
                        <circle r="4" cx="<?=$num*$multiplierX;?>" cy="<?=$canvasY-($value*$multiplierY);?>" />
                        <?php
                            if($value != 0) {
                                ?>
                                <text x="<?=($num*$multiplierX)-25;?>" y="<?=($canvasY-($value*$multiplierY))+10;?>" style="font-size:12px;"><?=$value.'$';?></text>
                                <?php
                                }
                        $num++;
                    }
                    $points .= "$canvasX, $canvasY";
                ?>

                <!-- set X values-->
                <?php $num = 0; ?>
                <?php foreach($xText as $value): ?>
                    <?php $num++; ?>
                    <text x="<?=($num*$multiplierX) - 15;?>" y="<?=$canvasY + ($extraY/2);?>" class="x-text"><?=$value;?></text>
                <?php endforeach; ?>

                <!-- set Y values-->
                <?php
                $max_lines = count($data);
                $segmentY = floor($canvasY / $max_lines);
                $num = $maxY;

                for($i = 0; $i < $max_lines; $i++) {
                    $x = $canvasX;
                    $y = $i * $segmentY;

                    if(round($num) < 0) {
                        break;
                    }

                    ?>
                    <text x="<?=$x + 15;?>" y="<?=$y + 5;?>" class="y-text"><?=round($num).'$';?></text>
                    <?php
                    $max_lines = $max_lines ? $max_lines : 1;
                    $num -= $maxY / $max_lines;
                }
                ?>

                <!-- graph title -->
                <text x="20" y="20">
                    <?=$this->title;?>
                </text>

                <!-- X title -->
                <text class="x-title" x="<?=($canvasX/2) - (strlen($this->xTitle)/2)*8;?>" y="<?=$canvasY + ($extraY/1.2);?>">
                    <?='(-->'. $this->xTitle . '<--)';?>
                </text>
            </svg>
        </div>
<?php
    }
}