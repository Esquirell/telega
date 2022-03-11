<?php

namespace App\Console\Commands;

use danog\MadelineProto\API;
use Illuminate\Console\Command;

class TestGetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $MadelineProto = new API('hello');
        $MadelineProto->start();

        $settings = array(
            'peer' => '@typical_dnepr1', //название_канала, должно начинаться с @, например @breakingmash
            'offset_id' => 0,
            'offset_date' => 0,
            'add_offset' => 0,
            'limit' => 1, //Количество постов, которые вернет клиент
            'max_id' => 0, //Максимальный id поста
            'min_id' => 0, //Минимальный id поста - использую для пагинации, при  0 возвращаются последние посты.
            //'hash' => []
        );
        $response = $MadelineProto->messages->getHistory($settings);
//        $response['messages'][0]['media']['photo']['file_reference'] = iconv('UTF-8', 'ISO-8859-1//IGNORE', $response['messages'][0]['media']['photo']['file_reference']);
        dd($response);
    }
}
