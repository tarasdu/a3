@extends('layouts.master')


@section('title')
    Scrabble Word Score Calculator
@endsection

@push('head')
    <link rel="stylesheet" href="/css/scrabble.css" type="text/css">
@endpush

@section('content')
    <div id="container">
        <h1>Scrabble Word Score Calculator</h1>
        <img src="/img/scrabble.jpg" width="250" height="250" alt="scrabble scorecard">

        <form method="get" action="/">

            <div class="inputBlock">
                <div class="col1">
                    <p>Your word<p>
                    <p class="required">&#42;Required</p>
                </div>
                <div class="col2">
                    <label for="word"></label>
                    <input type="text" name="word" id="word" value="" autofocus="autofocus" maxlength="20">
                </div>
            </div>

            <div class="inputBlock">
                <div class="col1">
                    <p>Bonus points<p>
                </div>
                <div class="col2">
                    <input type="radio" name="bonusPoints" id="bonusPointsNone" value="none"><label for="bonusPointsNone">None</label><br>
                    <input type="radio" name="bonusPoints" id="bonusPointsDouble" value="double"><label for="bonusPointsDouble">Double word score</label><br>
                    <input type="radio" name="bonusPoints" id="bonusPointsTriple" value="triple"><label for="bonusPointsTriple">Triple word score</label>
                </div>
            </div>

            <div class="inputBlock">
                <div class="col1">
                    <p>Include 50 point "bingo"?<p>
                    <p class="comment">(word that uses all 7 tiles)</p>
                </div>
                <div class="col2">
                    <input type="checkbox" name="bingo" id="bingo">
                    <label for="bingo">Yes</label>
                </div>
            </div>

            <input type="submit" value="Calculate">

        </form>
    </div>

@endsection
