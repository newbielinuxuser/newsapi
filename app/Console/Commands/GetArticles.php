<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Article;
use App\FailedRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Log;

class GetArticles extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'articles:get';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Get more articles from newsapi.org';

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
	 * @return mixed
	 */
	public function handle()
	{
		$arrCountry = ['sg','us','my'];
		// $arrCountry = ['ae','ar','at','au','be','bg','br','ca','ch','cn','co','cu','cz','de','eg','fr','gb','gr','hk','hu','id','ie','il','in','it','jp','kr','lt','lv','ma','mx','my','ng','nl','no','nz','ph','pl','pt','ro','rs','ru','sa','se','sg','si','sk','th','tr','tw','ua','us','vez'];
		$arrCategory = ['business', 'entertainment', 'general', 'health', 'science', 'sports', 'technology'];
		$strUrl = 'https://newsapi.org/v2/top-headlines';
		$strDomain = 'top-headlines';
		$strApi = 'd60ed490af024c45ac6fca19a945eb31';
		$client = new Client();
		foreach ($arrCountry as $country) {
			foreach ($arrCategory as $category) {
				$result = $client->request('GET', $strUrl, [
					'headers' => [
						'X-Api-Key' => $strApi,
					],
					'query' => [
						'country' => $country,
						'category' => $category,
						// 'apiKey' => $strApi,
					],
					'http_errors' => false,
				]);
				if($result->getStatusCode() == 200) {
					$objResponse = $result->getBody()->getContents();
					$objResponse = json_decode($objResponse);
					foreach ($objResponse->articles as $key => $value) {
						$value->source_name = $value->source->name;
						$value = collect($value)->toArray();
						unset($value['source']);
						$value['country'] = $country;
						$value['category'] = $category;
						$value['source_url'] = $strUrl;
						$value['domain'] = $strDomain;
						$value['status_code'] = $result->getStatusCode();
						if(is_null($value['urlToImage'])) {
							$value['urlToImage'] = url('/img/core-img/no-image.png');
							$objArticle = Article::firstOrCreate(
								[
									'title' => $value['title'],
								], $value);
						} else {
							$objArticle = Article::firstOrCreate(
								[
									'urlToImage' => $value['urlToImage']
							], $value);
						}
						Log::info($objArticle);
						broadcast(new \App\Events\ArticleEvent($objArticle));
					}
				} else {
					$objResponse = $result->getBody()->getContents();
					$objResponse = json_decode($objResponse);
					$arrResponse = collect($objResponse)->toArray();
					$arrResponse['category'] = $category;
					$arrResponse['country'] = $country;
					$arrResponse['source_url'] = $strUrl;
					$arrResponse['domain'] = $strDomain;
					$arrResponse['api'] = $strApi;
					FailedRequest::create($arrResponse);
				}
			}
		}
	}
}
