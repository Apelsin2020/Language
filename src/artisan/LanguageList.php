<?php

namespace Apelsin\Language\artisan;

use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class LanguageList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'language:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all languages';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $files = scandir(resource_path('lang/'));
        foreach ($files as $file){
            if(preg_match('/\.(json)/', $file)){
                $this->info(explode('.',$file)[0]);
            }
        }
//        $this->info('Display this on the screen');
        return CommandAlias::SUCCESS;
    }
}
