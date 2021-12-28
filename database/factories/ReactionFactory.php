<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        $values = collect(['-1', '1']);
        $models = collect(['App\Models\Comment', 'App\Models\Product']);
        $user = User::inRandomOrder()->first();
        $model = $models->random();
        $model_id = $model::inRandomOrder()->first();
        if (
            !DB::table('reactions')
                ->where('user_id', $user->id)
                ->where('likeable_type', $model)
                ->where('likeable_id', $model_id)
                ->exists()
        ) {
            return [
                'user_id' => $user->id,
                'likeable_type' => $model,
                'likeable_id' => $model_id,
                'value' => $values->random(),
                'created_at' => Carbon::now()->subDays(random_int(0, 365))->subHours(random_int(0, 23))->subMinutes(random_int(1, 55)),
                'updated_at' => Carbon::now(),
            ];
        }
        return [];
    }
}
