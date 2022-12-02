<?php

namespace Database\Seeders;

use Closure;
use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BaseSeeder extends Seeder
{
    protected Generator $faker;
    protected int $numItems;
    protected int $chunkSize = 1000;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    protected function generateData(Closure $generator, bool $addTimestamps = true): array
    {
        $result = [];
        for ($i = 0; $i < $this->numItems; $i++) {

            $data = $generator();

            if ($addTimestamps) {
                $data = $this->addTimestamps($data);
            }

            $result[] = $data;
        }

        return $result;
    }

    protected function addTimestamps(array $data, ?Carbon $timestamp = null): array
    {
        $time = $timestamp ?: Carbon::now();

        return array_merge([
            'created_at' => $time,
            'updated_at' => $time
        ], $data);
    }

    protected function chunkedInsert(Closure $inserter, array $data)
    {
        $chunkData = array_chunk($data, $this->chunkSize);

        foreach ($chunkData as $chunkDatum) {
            $inserter($chunkDatum);
        }
    }

    public function run()
    {
        //
    }
}
