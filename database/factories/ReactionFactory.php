<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $values = collect(['-1' , '1']);
        $models = collect(['App\Models\Comment' , 'App\Models\Product']);
        $user = User::inRandomOrder()->first();
        $model = $models->random();
        $model_id = $model::inRandomOrder()->first();
        if (!DB::table('reactions')->where('user_id' , $user->id)
        ->where('likeable_type' , $model)->where('likeable_id' , $model_id)->exists()) {
            return [
                'user_id' => $user->id,
                'likeable_type' => $model,
                'likeable_id' => $model_id,
                'value' => $values->random() ,
                'created_at' => Carbon::now()->subDays(rand(0, 365))->subHours(rand(0, 23))->subMinutes(rand(1, 55)),
                'updated_at' => Carbon::now(),
            ];
        } else return [];
    }
}
