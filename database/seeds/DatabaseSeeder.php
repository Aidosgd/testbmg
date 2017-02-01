<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(LecturesTableSeeder::class);
         $this->call(TestsTableSeeder::class);
         $this->call(QuestionsTableSeeder::class);
         $this->call(AnswersTableSeeder::class);
    }
}

class LecturesTableSeeder extends Seeder {
    public function run()
    {
        \App\Models\Lecture::create(array(
            'title' => 'Лекция 1',
            'description' => 'Описание лекций 1',
            'youtube_link' => 'a3wj58mfeF4',
        ));

        \App\Models\Lecture::create(array(
            'title' => 'Лекция 2',
            'description' => 'Описание лекций 2',
            'youtube_link' => 'GzSemMI50bU',
        ));
    }
}

class TestsTableSeeder extends Seeder {
    public function run()
    {
        \App\Models\Test::create(array(
            'title' => 'Тест 1',
            'lecture_id' => '1',
        ));

        \App\Models\Test::create(array(
            'title' => 'Тест 2',
            'lecture_id' => '2',
        ));
    }
}

class QuestionsTableSeeder extends Seeder {
    public function run()
    {
        \App\Models\Question::create(array(
            'title' => 'Вопрос 1',
            'test_id' => '1',
        ));

        \App\Models\Question::create(array(
            'title' => 'Вопрос 2',
            'test_id' => '1',
        ));

        \App\Models\Question::create(array(
            'title' => 'Вопрос 3',
            'test_id' => '2',
        ));

        \App\Models\Question::create(array(
            'title' => 'Вопрос 4',
            'test_id' => '2',
        ));
    }
}

class AnswersTableSeeder extends Seeder {
    public function run()
    {
        \App\Models\Answer::create(array(
            'title' => 'Ответ 1',
            'status' => 1,
            'question_id' => '1',
        ));

        \App\Models\Answer::create(array(
            'title' => 'Ответ 2',
            'status' => 0,
            'question_id' => '1',
        ));

        \App\Models\Answer::create(array(
            'title' => 'Ответ 3',
            'status' => 0,
            'question_id' => '2',
        ));

        \App\Models\Answer::create(array(
            'title' => 'Ответ 4',
            'status' => 1,
            'question_id' => '2',
        ));

        \App\Models\Answer::create(array(
            'title' => 'Ответ 5',
            'status' => 0,
            'question_id' => '3',
        ));

        \App\Models\Answer::create(array(
            'title' => 'Ответ 6',
            'status' => 1,
            'question_id' => '3',
        ));

        \App\Models\Answer::create(array(
            'title' => 'Ответ 7',
            'status' => 0,
            'question_id' => '4',
        ));

        \App\Models\Answer::create(array(
            'title' => 'Ответ 8',
            'status' => 1,
            'question_id' => '4',
        ));
    }
}