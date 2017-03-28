<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $faker = Faker::create('pl_PL');

        $number_of_users = 20;
        $password = 'pass';

        for ($i = 1; $i <= $number_of_users; $i++)
        {

            if ($i === 1){
                DB::table('users')->insert([
                    'name' => 'Tomasz Wędzony',
                    'sex' => 'm',
                    'email' => 'pantomcio87@gmail.com',
                    'password' => bcrypt($password),

                ]);
            }

            else

                {

                $sex = $faker->randomElement($array = array('f', 'm'));

                switch ($sex) {
                    case 'm':
                        $name = $faker->firstNameMale . ' ' . $faker->lastName;

                        break;

                    case 'f':
                        $name = $faker->firstNameFemale . ' ' . $faker->lastName;

                        break;
                }

                DB::table('users')->insert([
                    'name' => $name,
                    'sex' => $sex,
                    'email' => str_replace('-', '', str_slug($name)) . '@' . $faker->safeEmailDomain,
                    'password' => bcrypt($password),

                ]);

                }
        }

    }
}
