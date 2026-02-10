<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
use Carbon\Carbon;
use App\Models\GoldTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ScrapMsgold extends Command
{
    protected $signature = 'scrap:msgold';
    protected $description = 'Daily scrape MS Gold customer prices';

    public function handle()
    {
        $url = 'https://msgold.com.my/';

        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
        ])->timeout(15)->get($url);

        if (!$response->successful()) {
            $this->error('Failed to fetch website');
            return;
        }

        $crawler = new Crawler($response->body());

        // cus → gold type mapping
        $mapping = [
            'cus0' => ['pamp', 'goldbar'],
            'cus1' => ['gold999', 'gold950'],
            'cus2' => ['gold916'],
            'cus3' => ['gold835'],
            'cus4' => ['gold750', 'gold585'],
            'cus5' => ['gold375'],
        ];
        $goldTable = GoldTable::all();
        $extraValue = GoldTable::where('type','!=','datetime')->pluck('additional_value', 'type')->toArray();

        foreach ($mapping as $cusId => $goldTypes) {

            if (!$crawler->filter("#{$cusId}")->count()) {
                continue;
            }

            // Example: RM 320.50 → 320.50
            $rawText = trim($crawler->filter("#{$cusId}")->text());
            $price = (float) preg_replace('/[^\d.]/', '', $rawText);


            Log::info('MS Gold scraped', [
                'cus'   => $cusId,
                'raw'   => $rawText,
                'price' => $price,
            ]);

            foreach ($goldTypes as $type) {

                $finalPrice = $price + ($extraValue[$type] ?? 0);

                GoldTable::updateOrCreate(
                    ['type' => $type],
                    [
                        'value'      => $price,
                        'new_value' => $finalPrice,
                    ]
                );
            }
        }

        $this->info('MS Gold data scraped and updated successfully');
    }
}
