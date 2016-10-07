<?php
//adding namespace
namespace Database\Seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    	Eloquent::unguard();
    	//call our class and run our seeds
    	$this->call('BearAppSeeder');
    	$this->command->info('Bear app seeds finished.');
    	//}
        // $this->call(UsersTableSeeder::class);
    }
}
/*
BearAppSeeder extends Seeder{
    public function run(){
    //clear our database
        DB::table('bears')->delete();
        DB::table('fish')->delete();
        DB::table('picnics')->delete();
        DB::table('tree')->delete();
        DB::table('bears_picnics')->delete();
        //seed our bears table
        $bearLawly = Bear::create(array(
            'name' => 'Lawly',
            'type' => 'Grizzly',
            'danger_level' => 8
        ));

        $bearCerms = Bear::create(array(
            'name' => 'Cerms',
            'type' => 'Black',
            'danger_level' => 4
        ));

        $bearAdobot = Bear::create(array(
            'name' => 'Adobot',
            'type' => 'Polar',
            'danger_level', 3
        ));

        $this->command->info('The bears are alive');

        //seed our fish table
        Fish::create(array(
            'weight' => 5,
            'bear_id' => $bearLawly->id;
        ));
        Fish::create(array(
            'weight' => 12,
            'bear_id' => $bearCerms->id;
        ));
        Fish::create(array(
            'weight' => 5,
            'bear_id' = $bearAdobot->id;
        ));

        $this->command->info('They are eating fish');

        //seed our tree table
        Tree::create(array(
            'type' => 'Redwood',
            'age' => 500,
            'bear_id' => $bearLawly
        ));
        Tree::create(array(
            'type' => 'Oak',
            'age' => 400,
            'bear_id' => $bearLawly
        ));

        $this->command->info('Climb bears! Be free');

        //we will create one picnic and apply all the bears to
        //this one picnic
        $picnicYellowStone = Picnic::create(array(
            'name' => 'Yellowstone',
            'taste_level' => 6
        ));
        $picnicGrandCanyon = Picnic::create(array(
            'name' => 'Grand Canyon',
            'taste_level' => 5
        ));
        //link bears to our picnics
        $bearLawly->picnics->attach($picnicYellowStone->id);
        $bearLawly->picnics->attach($picnicGrandCanyon->id);

        $bearCerms->picnics->attach($picnicYellowStone->id);
        $bearCerms->picnics->attach($picnicGrandCanyon->id);

        $bearAdobot->picnics->attach($picnicYellowStone->id);
        $bearAdobot->picnics->attach($picnicGrandCanyon->id);

        $this->command->info('They are terrorizing the picnics');
    }
}*/