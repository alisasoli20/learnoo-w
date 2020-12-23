<?php

namespace Database\Seeders;

use App\Models\SecurityQuestion;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        Subject::insert([
//            ["name" => "Introducing Indian Society"],
//            ["name" => "Demographic Structure"],
//            ["name" => "Social Institutions"],
//            ["name"=> "Market as a Social Institution"],
//            ["name"=> "Social Inequality and Exclusion"],
//            ["name"=> "Challenges of Cultural Diversity"],
//            ["name"=> "ICT"],
//            ["name"=> "Developments in Society"],
//            ["name"=> "Structural Change"],
//            ["name"=> "Economics"],
//            ["name"=> "Geography"],
//            ["name"=>"Political Science"],
//            ["name"=>"Psychology"],
//            ["name"=>"Sociology"],
//            ["name"=>"Philosophy"],
//            ["name"=>"Human Rights"],
//            ["name"=>"Informatics Practices"],
//            ["name"=>"Public Administration"],
//            ["name"=>"Home Science"],
//            ["name"=>"Legal Studies"],
//            ["name"=>"Mass Media Studies"],
//            ["name"=> "Entrepreneurship"],
//            ["name"=> "Physical Education"],
//            ["name"=> "Fashion Studies"],
//            ["name"=> "Fine Arts"],
//            ["name"=> "Business Statistics"],
//            ["name"=> "Food Science"],
//            ["name"=> "History"],
//            ["name"=> "Logic and scientific methods"],
//            ["name"=> "Agricultural Sciences"],
//            ["name"=> "Combined Mathematics"]
//        ]);

         SecurityQuestion::insert([
             ['question' => "What was the house number and street name you lived in as a child?"],
             ['question' => "What were the last four digits of your childhood telephone number?"],
             ['question' => "What primary school did you attend?"],
             ['question' => "In what town or city was your first full time job?"],
             ['question' => "In what town or city did you meet your spouse or partner?"],
             ['question' => "What is the middle name of your oldest child?"],
             ['question' => "What are the last five digits of your drivers license number?"],
             ['question' => "What is your grandmother's(on your mother's side) maiden name?"],
             ['question' => "What is your spouse or partner's mother's maiden name?"],
             ['question' => "In what town or city did your parents meet?"],
         ]);
    }
}
