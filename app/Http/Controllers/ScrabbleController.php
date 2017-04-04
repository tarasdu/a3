<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ScrabbleController extends Controller
{
    private $scoreCard = array(
        'a'=>1, 'b'=>3, 'c'=>3, 'd'=>2,
        'e'=>1, 'f'=>4, 'g'=>2, 'h'=>4, 'i'=>1, 'j'=>8,
        'k'=>5, 'l'=>1, 'm'=>3, 'n'=>1, 'o'=>1, 'p'=>3,
        'q'=>10, 'r'=>1, 's'=>1, 't'=>1, 'u'=>1, 'v'=>4,
        'w'=>4, 'x'=>8, 'y'=>4, 'z'=>10);

    private function calculate($word) {

        $score = 0;
        $letters = str_split($word);
        foreach ($letters as $letter) {
            $score = $score + $this->scoreCard[strtolower($letter)];
        }
        return $score;
    }

    public function showResult(Request $request) {

        $word = $request->input('word', '');
        $bonus = $request->input('bonusPoints', 'none');
        $bingo = $request->has('bingo');
        $score = 0;
        $errors = [];
        $messages = array(
            'word.required' => 'The field "Your word" is required',
            'word.alpha' => 'The field "Your word" can only contain letters'
        );

        if ($request->all() != null) {


            $validate = Validator::make($request->all(), [
            'word' => 'required|alpha',
            ], $messages);
            
            if ($validate->fails()) {
                $errors = $validate->errors();
            }

            if ($word && !$errors) {

                $score = $this->calculate($word);
                if($bonus == 'double')
                    $score = $score * 2;
                if($bonus == 'triple')
                    $score = $score * 3;
                if($bingo)
                    $score = $score + 50;

            }
        }

        return view('form')->with([
            'word' => $word,
            'bonusPoints' => $bonus,
            'bingo' => $bingo,
            'score' => $score,
            'errors' => $errors
        ]);
    }
}
