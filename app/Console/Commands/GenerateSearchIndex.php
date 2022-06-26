<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use App\StaticPageRepository;

class GenerateSearchIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'andi:search-index
                            {--progressive : Generate search index for contents updated since last index generation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate search index from current content';

    private $repository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(StaticPageRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!$this->option('progressive'))
        {
            DB::table('search_index')->truncate();
            $this->generateStaticPageIndex();
        }
        else
        {
            $lastUpdate = $this->getLastSearchIndexUpdateTime();
            $this->generateStaticPageIndex($lastUpdate);
        }
    }

    private function sanitizeKeyword($keywordsCandidate)
    {
        return filter_var($keywordsCandidate, FILTER_SANITIZE_STRING);
    }

    private function generateStaticPageIndex($lastUpdate = null)
    {
        $allUri = collect(config('static.pages'))->keys();

        if (!empty($lastUpdate))
        {
            $allUri = $this->repository->getUriMetaUpdatedAfterTime($lastUpdate)->pluck('uri')->map(function($item, $key) {
                return ($item == '') ? '__home__' : $item;
            })->intersect($allUri);

            DB::table('search_index')->whereIn('uri', $allUri->map(function($item, $key) {
                return ($item == '__home__') ? '' : $item;
            }))->delete();
        }

        if ($allUri->count() > 0)
        {
            $allContentsByUriLocale = $this->repository->getLocalesMetaByUri($allUri->toArray());
            $searchIndex = [];

            foreach ($allContentsByUriLocale as $uri => $localeContents)
            {
                $cleanUri = str_replace('__home__', '', $uri);
                foreach ($localeContents as $locale => $contents)
                {
                    $searchIndex[] = [
                        'uri' => $cleanUri,
                        'title' => config('static.pages.'. $uri . '.title'),
                        'locale' => $locale,
                        'keyword' => $this->sanitizeKeyword(implode(' ', array_values($contents))),
                        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ];
                }
            }

            // Insert 25 rows per INSERT query
            foreach (array_chunk($searchIndex, 25) as $partialSearchIndex)
            {
                DB::table('search_index')->insert($partialSearchIndex);
            }

            $this->info(sprintf('Updated %d rows in search index for static pages', count($searchIndex)));
        }
        else
        {
            $this->info('No search index updated for static pages');
        }
    }

    private function getLastSearchIndexUpdateTime()
    {
        return DB::table('search_index')->max('updated_at');
    }
}
