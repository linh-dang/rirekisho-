<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\CV;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // buoc 1...
   // public function run()
   // {
   //     Model::unguard();
   //     $this->call(UsersTableSeeder::class);
   //     $this->call(CVTableSeeder::class);
   //     $this->call(RecordTableSeeder::class);
   //     Model::reguard();
   // }
      // buoc 2
    public function run()
    {
        Model::unguard();
        $this->call(SkillSeeder::class);
        Model::reguard();
    }

}

class RecordTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('Records')->delete();
        $faker = Faker::create('vi_VN');
        $faker1 = Faker::create();
        $CVs = DB::table('cvs')->get();

        foreach ($CVs as $v) {
            DB::table('Records')->insert([
                'Type' => 0,
                'Date' => '2012-11-03',
                'Content' => 'Đại học XXX - ' . $faker->city,
                'cv_id' => $v->id,
            ]);
        }
        foreach ($CVs as $v) {
            DB::table('Records')->insert([
                'Type' => 1,
                'Date' => '2012-12-07',
                'Content' => 'Công ty ' . $faker->middleName . ' ' . $faker->firstName . ' - ' . $faker->city,
                'cv_id' => $v->id,
            ]);
        }
        foreach ($CVs as $v) {
            DB::table('Records')->insert([
                'Type' => 1,
                'Date' => '2014-04-17',
                'Content' => 'Công ty ' . $faker->middleName . ' ' . $faker->firstName . ' - ' . $faker->city,
                'cv_id' => $v->id,
            ]);
        }
        foreach ($CVs as $v) {
            DB::table('Records')->insert([
                'Type' => 2,
                'Date' => '2012-12-07',
                'Content' => $faker->city,
                'cv_id' => $v->id,
            ]);
        }
    }
}

class CVTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cvs')->delete();
        $faker = Faker::create('vi_VN');
        $faker1 = Faker::create();
        $faker2 = Faker::create('ja_JP');
        $users = DB::table('users')->where('role', 0)->get();
        $visitor = DB::table('users')->where('role', 1)->get();
        $admin = DB::table('users')->where('role', 2)->first();
        $superadmin = DB::table('users')->where('role', 3)->first();
        //admin
        DB::table('cvs')->insert([
            'First_name' => 'Linh',
            'Last_name' => 'Dang',
            'Gender' => 0,
            'Address' => $faker->city,
            'user_id' => $admin->id,
            'Phone' => $faker->phoneNumber,
            'Birth_date' => "1994-11-02",
            'Self_intro' => $faker1->paragraph($nbSentences = 3, $variableNbSentences = true),
        ]);
        //superadmin
        DB::table('cvs')->insert([
            'First_name' => 'Bui',
            'Last_name' => 'Ngoc',
            'Gender' => 1,
            'Address' => $faker->city,
            'user_id' => $superadmin->id,
            'Phone' => $faker->phoneNumber,
            'Birth_date' => "1994-11-02",
            'Self_intro' => $faker1->paragraph($nbSentences = 3, $variableNbSentences = true),
        ]);
        foreach ($users as $v) {
            DB::table('cvs')->insert([
                'First_name' => $faker->middleName.' '.$faker->firstName,
                'Last_name' => $faker->lastName,
                'Gender' => 1,
                'Address' => $faker->city,
                'Phone' => $faker->phoneNumber,
                'user_id' => $v->id,
                'Birth_date' => $faker->date($format = 'Y-m-d', $max = '1995-11-03'),
                'Self_intro' => $faker2->realText($maxNbChars = 200),
                //'active' => 1,
            ]);
        }
        foreach ($visitor as $v) {
            DB::table('cvs')->insert([
                'First_name' => $faker->middleName.' '.$faker->firstName,
                'Last_name' => $faker->lastName,
                'Gender' => 1,
                'Address' => $faker->city,
                'Phone' => $faker->phoneNumber,
                'user_id' => $v->id,
                'Birth_date' => $faker->date($format = 'Y-m-d', $max = '1995-11-03'),
                'Self_intro' => $faker2->realText($maxNbChars = 200),
                //'active' => 1,
            ]);
        }
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        $faker = Faker::create();
        $counter = range(1, 25);

        DB::table('users')->insert([
            'name' => 'BuiNgoc[superadmin]',
            'email' => 'superadmin@123.com',
            'password' => bcrypt('secret'),
            'role' => 3,
        ]);

        DB::table('users')->insert([
            'name' => 'LinhDang[admin]',
            'email' => 'admin@123.com',
            'password' => bcrypt('secret'),
            'role' => 2,
        ]);
        DB::table('users')->insert([
            'name' => 'Linh Dan[applicant]',
            'email' => 'applicant@123.com',
            'password' => bcrypt('secret'),
            'role' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Linh Dang[visitor]',
            'email' => 'visitor@123.com',
            'password' => bcrypt('secret'),
            'role' => 1,
        ]);

        foreach ($counter as $v) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
            ]);
        }

        foreach ($counter as $v) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
                'role' => 0,
            ]);
        }
    }
}
