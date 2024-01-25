<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example seed data for the 'transactions' table
        $transactions = [
            [
                'type' => 'expense',
                'amount' => 50.25,
                'date' => '2024-01-15',
                'category' => 'Makanan',
                'note' => 'Lunch with friends',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'income',
                'amount' => 100.50,
                'date' => '2024-01-16',
                'category' => 'Gaji',
                'note' => 'Monthly salary',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'expense',
                'amount' => 20.00,
                'date' => '2024-01-18',
                'category' => 'Hiburan',
                'note' => 'Movie night',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'expense',
                'amount' => 15.75,
                'date' => '2024-01-20',
                'category' => 'Transportasi',
                'note' => 'Bus fare',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'income',
                'amount' => 75.00,
                'date' => '2024-01-22',
                'category' => 'Kerja Freelance',
                'note' => 'Client payment',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'expense',
                'amount' => 40.50,
                'date' => '2024-01-25',
                'category' => 'Keperluan',
                'note' => 'Electricity bill',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'income',
                'amount' => 120.00,
                'date' => '2024-01-27',
                'category' => 'Bonus',
                'note' => 'Year-end bonus',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'expense',
                'amount' => 25.50,
                'date' => '2024-01-28',
                'category' => 'Makanan',
                'note' => 'Dinner with family',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'expense',
                'amount' => 60.00,
                'date' => '2024-01-29',
                'category' => 'Hiburan',
                'note' => 'Weekend getaway',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'income',
                'amount' => 90.25,
                'date' => '2024-02-01',
                'category' => 'Lainnya',
                'note' => 'Consulting fee',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'expense',
                'amount' => 35.00,
                'date' => '2024-02-03',
                'category' => 'Lainnya',
                'note' => 'Gym membership',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'income',
                'amount' => 80.50,
                'date' => '2024-02-05',
                'category' => 'Lainnya',
                'note' => 'Dividend payment',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'expense',
                'amount' => 45.75,
                'date' => '2024-02-08',
                'category' => 'Lainnya',
                'note' => 'Book purchase',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'expense',
                'amount' => 30.00,
                'date' => '2024-02-10',
                'category' => 'Keperluan',
                'note' => 'Household items',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'income',
                'amount' => 110.75,
                'date' => '2024-02-12',
                'category' => 'Lainnya',
                'note' => 'Project payment',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert the data into the 'transactions' table
        DB::table('transactions')->insert($transactions);
    }
}
