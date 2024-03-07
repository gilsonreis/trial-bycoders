<?php

namespace App\Console\Commands;

use Faker\Generator;
use Illuminate\Console\Command;

class InsertSalesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-sales
                            {--time-update=30 : Interval time in seconds to insert each sale.}
                            {--days=-30 days : Negative days until today to be inserted in sales. Eg. "-10 days". }
                            {--only-completed=false : Insert sales only completed status. }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert a random sale to refresh dashboard in real time.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $faker = app(Generator::class);

        $timeUpdate = $this->option('time-update');
        $days = $this->option('days');
        $onlyCompleted = $this->option('only-completed');

        $this->info("Insert each sale at " . $timeUpdate . " seconds.");
        $this->info("------------------------------------------------------");
        $this->newLine();

        while(true) {
           $sale = [
               'seller_id' => $faker->numberBetween(2, 11),
               'customer_id' => $faker->numberBetween(12, 90),
               'car_detail_id' => $faker->numberBetween(1, 30),
               'commission' => $faker->randomFloat(2, 1000, 2000),
               'sale_value' => $faker->randomFloat(2, 45000, 53000),
               'status' => $onlyCompleted ? 'completed' : $faker->randomElement(['in_progress', 'canceled', 'completed']),
               'created_at' => $faker->dateTimeBetween($days)
           ];
           \DB::table('sales')->insert($sale);
           $this->info("Sale inserted at " . $sale['created_at']->format("Y-m-d"));
           sleep($timeUpdate);
        }
    }
}
