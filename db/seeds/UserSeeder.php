<?php


use Phinx\Seed\AbstractSeed;
use Phalcon\Security;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 99; $i++) {
            $security = new Security();
            $row = $this->fetchRow("SELECT UuidToBin(UUID()) as uuid");
            $data[] = [
                'uuid'          => $row['uuid'],
                'username'      => $faker->userName,
                'password'      => $security->hash('user12345'),
                'email'         => $faker->email,
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName
            ];
        }

        $this->table('users')->insert($data)->save();
    }
}
