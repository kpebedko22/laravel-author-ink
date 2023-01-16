<?php

namespace App\Packages\Enum\Examples;

use App\Models\Book;
use App\Packages\Enum\Enum;

class WizardQuestionEnum extends Enum
{
    const STEP_1 = 1;
    const STEP_2 = 2;
    const STEP_3 = 3;

    protected array $fillable = [
        'id',
        'question',
        'answers'
    ];

    protected array $casts = [
        'answers' => 'array'
    ];

    protected static function getEnumDefinition(): array
    {
//        $step10answers = Book::pluck('title', 'id')->toArray();

        return [
            [
                'id' => self::STEP_1,
                'question' => 'enum/wizard.step_1.question', // 'Who will wear this fragrance?',
                'answers' => [
                    1 => 'enum/wizard.step_1.answer_1', //'Male',
                    2 => 'enum/wizard.step_1.answer_2', //'Female',
                    3 => 'enum/wizard.step_1.answer_3', //'Unisex',
                    4 => 'enum/wizard.step_1.answer_4', //'Any',
                ]
            ],
            [
                'id' => self::STEP_2,
                'question' => 'enum/wizard.step_9.question', //'Do you prefer a specific brand?',
                'answers' => [
                    1 => 'enum/wizard.step_9.answer_1', //'Yes',
                    2 => 'enum/wizard.step_9.answer_2', //'No',
                ]
            ],
//            [
//                'id' => self::STEP_3,
//                'question' => 'enum/wizard.step_10.question', //'Which brand do you prefer?',
//                'answers' => $step10answers, // answers from 'brands' table
//            ],
        ];
    }

    public function getQuestionAttribute(string $value): string
    {
        return __($value, [], $this->language);
    }

//    public function setAnswersAttribute(array $value)
//    {
//        $result = [];
//
//        array_walk($value, function ($value, $key) use (&$result) {
//            $result[] = [
//                'id' => $key,
//                'name' => $value
//            ];
//        });
//
//        $this->attributes['answers'] = $result;
//    }
}
