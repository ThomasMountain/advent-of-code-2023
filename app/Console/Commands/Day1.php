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

    private function part1()
    {
        $total = 0;
        foreach ($this->lines as $line) {
            $first = substr(strpbrk($line, '0123456789'), 0, 1);
            $last = substr(strpbrk(Str::reverse($line), '0123456789'), 0, 1);

            $total += (int) ($first.$last);
        }

        $this->warn(sprintf("The answer to step 1 is %d", $total));
    }

    public function part2()
    {

    }
}
