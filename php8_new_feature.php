<?php

class calculator
{
    //1. union type
    public function add(int|string $a, int|string $b): int|string
    {
        if (is_integer($a) && is_integer($b))
            return $a + $b;

        if (is_string($a) && is_string($b))
            return $a . $b;
    }

    //2. match expression
    public function matchExample()
    {
        $statusCode = 200;

        switch ($statusCode) {
            case 200:
            case 201:
                return 'success';
                break;
            case 404:
                return 'not found';
                break;
            case 500:
                return 'internal server error';
                break;
            default:
                return 'unknown satus code';
        }

        //match expression
        return match ($statusCode) {
            200, 201 => 'success',
            404 => 'not found',
            500 => 'internal server error',
            default => 'unknown satus code'
        };
    }
}

//3. named arguments
// class Human
// {
//     protected string $name;
//     protected int $age;
//     protected string $gender;

//     public function setHuman(string $name, string $gender, $age)
//     {
//         $this->name     = $name;
//         $this->age      = $age;
//         $this->gender   = $gender;
//     }
// }

// $human = new Human();

// $human->setHuman('Ripon', 'Male', 27);
// $human->setHuman(gender: 'Male', age: 27, name: 'Ripon');


//4. constructor property promotion
// class Human
// {
//     public function __construct(protected string $name, protected string $gender, protected $age)
//     {
//     }
// }

// $human = new Human(gender: 'Male', age: 27, name: 'Ripon');


//4. null safe operator ?->

// $email = $session->user->profile->email; normal case kono akta te value na paile error dibe

$email = null;

if ($session != null)
    $user = $session->user;
if ($user != null)
    $profile = $user->profile;
if ($profile != null)
    $email = $profile->email;

return $email;


$email = $session?->user?->profile?->email; // value na paile error dibe na javascript ar optional chaining operator ar moto ? 


//php psr -> PHP Standards Recommendations

/*
        - PSR-1: Basic Coding Standard
        - PSR-2: Coding Style Guide
        - PSR-4: Autoloader
        - PSR-12: Extended Coding Style


        php: 8
        1. union type
        2. match expression
        3. named arguments
        4. null safe operator ?->
*/
