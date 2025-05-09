<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'tag_id' => 1,
                'spot_name' => '東京スカイツリー',
                'address' => '東京都墨田区押上1丁目1-2',
                'image_url' => 'https://user0514.cdnw.net/shared/img/thumb/town32151974_TP_V4.jpg',
                'latitude' => 35.710063,
                'longitude' => 139.8107,
                'title' => 'スカイツリーからの眺めは圧巻！',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'user_id' => 1,
                'tag_id' => 2,
                'spot_name' => '大阪城',
                'address' => '大阪府大阪市中央区大阪城1-1',
                'image_url' => 'https://gahag.net/img/201603/08s/gahag-0063528834-1.jpg',
                'latitude' => 34.687315,
                'longitude' => 135.526201,
                'title' => '歴史を感じる場所でした。',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'user_id' => 1,
                'tag_id' => 3,
                'spot_name' => '清水寺',
                'address' => '京都府京都市東山区清水1丁目294',
                'image_url' => 'https://www.free-materials.com/adm/wp-content/uploads/2021/09/0adpDSC_1471-.jpg',
                'latitude' => 34.994856,
                'longitude' => 135.785046,
                'title' => '紅葉の時期にまた来たい。',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'user_id' => 1,
                'tag_id' => 1,
                'spot_name' => '札幌時計台',
                'address' => '北海道札幌市中央区北1条西2丁目',
                'image_url' => 'https://user0514.cdnw.net/shared/img/thumb/BIBAI2181_TP_V.jpg',
                'latitude' => 43.062096,
                'longitude' => 141.354376,
                'title' => '意外とこぢんまりしてた。',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
