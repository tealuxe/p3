<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Body Surface Area Formula</title>
    <meta name="description" content="Body Surface Area Formula">
    <meta name="author" content="Bob Dobbs">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Body Surface Area Calculator</h1>
        <p>Greetings! This is a body surface area calculator based on the Schlich formula (a gender-based formula among
            <a href='http://www.bmi-calculator.net/bsa-calculator/'>a variety of formulas used</a>). Enter your gender, weight,
           and height, and we will calculate your estimated body surface area. Body surface area (BSA) can be useful in medical
           settings, where it can offer a better indication of the body's requirement for energy than weight itself.
        </p>
    </div>
    <form method='GET' action='/calculate'>
        {{ csrf_field() }}
        <div class="row">
            <div class="five columns">
                <div class="right">
                    <label for="genderInput">Gender *</label>
                </div>
            </div>
            <div class="seven columns">
                <input type='radio'
                       id='genderInput'
                       name='genderInput'
                       value='Male'
                       @if (old('genderInput', $gender) == "Male")
                       checked
                        @endif
                > Male
                <input type='radio'
                       name='genderInput'
                       value='Female'
                       @if (old('genderInput', $gender) == "Female")
                       checked
                        @endif
                > Female
            </div>
        </div>
        <div class="row">
            <div class="five columns">
                <div class="right">
                    <label for="weightInput">Body Weight *</label>
                </div>
            </div>
            <div class="seven columns">
                <input type="number"
                       id='weightInput'
                       name="weightInput"
                       value='{{ old('weightInput', $pounds) }}'
                       min="0"> Pounds
            </div>
        </div>
        <div class="row">
            <div class="five columns">
                <div class="right">
                    <label for="heightFeet">Height *</label>
                </div>
            </div>
            <div class="seven columns">

                <select id='heightFeet' name='heightFeet'>
                    <option value='0'
                            @if (old('heightFeet', $feet) == "0")
                            selected
                            @endif >0
                    </option>
                    <option value='1'
                            @if (old('heightFeet', $feet) == "1")
                            selected
                            @endif >1
                    </option>
                    <option value='2'
                            @if (old('heightFeet', $feet) == "2")
                            selected
                            @endif >2
                    </option>
                    <option value='3'
                            @if (old('heightFeet', $feet) == "3")
                            selected
                            @endif >3
                    </option>
                    <option value='4'
                            @if (old('heightFeet', $feet) == "4")
                            selected
                            @endif >4
                    </option>
                    <option value='5'
                            @if (old('heightFeet', $feet) == "5")
                            selected
                            @endif >5
                    </option>
                    <option value='6'
                            @if (old('heightFeet', $feet) == "6")
                            selected
                            @endif >6
                    </option>
                    <option value='7'
                            @if (old('heightFeet', $feet) == "7")
                            selected
                            @endif >7
                    </option>
                </select>
                Feet
                <select id='heightInches' name='heightInches'>
                    <option value='0'
                            @if (old('heightInches', $inches) == "0")
                            selected
                            @endif >0
                    </option>
                    <option value='1'
                            @if (old('heightInches', $inches) == "1")
                            selected
                            @endif >1
                    </option>
                    <option value='2'
                            @if (old('heightInches', $inches) == "2")
                            selected
                            @endif >2
                    </option>
                    <option value='3'
                            @if (old('heightInches', $inches) == "3")
                            selected
                            @endif >3
                    </option>
                    <option value='4'
                            @if (old('heightInches', $inches) == "4")
                            selected
                            @endif >4
                    </option>
                    <option value='5'
                            @if (old('heightInches', $inches) == "5")
                            selected
                            @endif >5
                    </option>
                    <option value='6'
                            @if (old('heightInches', $inches) == "6")
                            selected
                            @endif > 6
                    </option>
                    <option value='7'
                            @if (old('heightInches', $inches) == "7")
                            selected
                            @endif >7
                    </option>
                    <option value='8'
                            @if (old('heightInches', $inches) == "8")
                            selected
                            @endif >8
                    </option>
                    <option value='9'
                            @if (old('heightInches', $inches) == "9")
                            selected
                            @endif >9
                    </option>
                    <option value='10'
                            @if (old('heightInches', $inches) == "10")
                            selected
                            @endif >10
                    </option>
                    <option value='11'
                            @if (old('heightInches', $inches) == "11")
                            selected
                            @endif >11
                    </option>
                </select>
                Inches
            </div>
        </div>
        <div class="center">
            <br/>
            <input class="button-primary" type="submit" value="Calculate">
            <p>* All fields are required.</p>
        </div>
    </form>

    @if($bsa && count($errors) < 1)
        <div class="result">
            Your estimated body surface area is: {{ round($bsa, 2) }} square meters and {{ round($bsaSquareFeet, 2) }} square feet.
            That is equal to the area of {{ round($basketballs, 2) }} NBA regulation basketballs.
            <br/>
            <br/>
        </div>
        <br/>
    @endif

    @if(count($errors) > 0)
        <div class='alert'>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
</body>
</html>
