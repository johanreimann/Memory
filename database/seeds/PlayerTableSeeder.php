<?php
 
use Illuminate\Database\Seeder;
 
class PlayerTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('players')->delete();
 
        $players = array(
            ['id' => 1, 'name' => 'BBB', 'score' => 10,'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'CCC', 'score' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'DDD', 'score' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('players')->insert($players);
    }
 
}

?>