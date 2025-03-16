<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSiteMap extends Command
{
    /**
     * ge
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-site-map';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        SitemapGenerator::create(config('app.url'))
            ->configureCrawler(function (Crawler $crawler) {
                $crawler->setMaximumDepth(3);
            })->writeToFile('public/sitemap.xml');
//        SitemapGenerator::create(config('app.url'))->getSitemap()->writeToFile('public/sitemap.xml');
        $this->info('Sitemap Generated Succesfully !');
    }
}
