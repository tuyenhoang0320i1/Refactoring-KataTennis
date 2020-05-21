<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */

define("LOVE", 0);
define("FIFTEEN", 15);
define("THIRTY", 30);
define("FORTY", 40);

class TennisGame
{
    public $score = '';

    public function getScore($player1, $player2, $scoreOfPlayer1, $scoreOfPlayer2)
    {
        $tempScore = 0;

        if ($scoreOfPlayer1 == $scoreOfPlayer2) {
            switch ($scoreOfPlayer1) {
                case 0:
                    $this->score = LOVE;
                    break;
                case 1:
                    $this->score = FIFTEEN;
                    break;
                case 2:
                    $this->score = THIRTY;
                    break;
                case 3:
                    $this->score = FORTY;
                    break;
                default:
                    $this->score = "Deuce";
                    break;

            }
        } else if ($scoreOfPlayer1 >= 4 || $scoreOfPlayer2 >= 4) {
            $minusResult = $scoreOfPlayer1 - $scoreOfPlayer2;
            if ($minusResult == 1) {
                $this->score = "Advantage player1";
            } else if ($minusResult == -1) {
                $this->score = "Advantage player2";
            } else if ($minusResult >= 2) {
                $this->score = "Win for player1";
            } else {
                $this->score = "Win for player2";
            }
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i == 1) {
                    $tempScore = $scoreOfPlayer1;
                } else {
                    $this->score .= "-";
                    $tempScore = $scoreOfPlayer2;
                }
                switch ($tempScore) {
                    case 0:
                        $this->score .= LOVE;
                        break;
                    case 1:
                        $this->score .= FIFTEEN;
                        break;
                    case 2:
                        $this->score .= THIRTY;
                        break;
                    case 3:
                        $this->score .= FORTY;
                        break;
                }
            }
        }
    }

    public
    function __toString()
    {
        return $this->score;
    }
}