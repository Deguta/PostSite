<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post; //Postモデルを参照してテストデータを作成。Modelsというフォルダに格納しているため
use Faker\Generator as Faker;
//  Post::classのPostはModelsフォルダのPostを参照
$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->name,    // 氏名
        'subject' => $faker->realText(16),    // 日本語の場合はrealTextしか反映されない。16文字のテキスト
        'message' => $faker->realText(200),    // 200文字のテキスト
        'created_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'updated_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'category_id' => $faker->numberBetween(1,5),  //カテゴリーのNoを1から5までランダム
    ];
});
