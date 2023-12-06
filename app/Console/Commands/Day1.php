<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Day1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:day1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * @var string[]
     */
    private array $lines;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $day1 = Storage::get('assets/day1.txt');
        $this->lines = explode(PHP_EOL, $day1);

        $this->part1();
        $this->part2();

    }

    private function part1(): void
    {
        $total = 0;
        foreach ($this->lines as $line) {
            $first = substr(strpbrk($line, '0123456789'), 0, 1);
            $last = substr(strpbrk(Str::reverse($line), '0123456789'), 0, 1);

            $total += (int) ($first.$last);
        }

        $this->info(sprintf("The answer to step 1 is %d", $total));
    }

    public function part2(): void
    {
        $total = 0;

        $numbers = [
            'one' =>1,
            'two' => 2,
            'three' => 3,
            'four' => 4,
            'five' => 5,
            'six' => 6,
            'seven' => 7,
            'eight' => 8,
            'nine'=> 9,
        ];

        foreach ($this->lines as $line) {
            foreach ($numbers as $string => $int) {
                if(Str::contains($line, $string)){
                    $line = str_replace($string,  substr($string, 0, 1) . $int . substr($string, -1, 1) , $line);
                }
            }

            $first = substr(strpbrk($line, '0123456789'), 0, 1);
            $last = substr(strpbrk(Str::reverse($line), '0123456789'), 0, 1);

            $total += (int) ($first.$last);
        }

        $this->info(sprintf("The answer to step 2 is %d", $total));
    }
}
