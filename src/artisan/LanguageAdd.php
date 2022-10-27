<?php

namespace OrangeLaravel\Language\artisan;

use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class LanguageAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'language:add {lang}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add lang in folder languages';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $resource = resource_path('lang');
        $lang = $this->argument('lang');
        $file = $resource . "\\$lang.json";
        if (!is_dir($resource)) {
            mkdir($resource);
        }
        if (is_file($file)) {
            $this->error("This language already exists");
        } else {
            file_put_contents($file, '{}');
            $this->info('Language success created');
        }
        return CommandAlias::SUCCESS;
    }

}
