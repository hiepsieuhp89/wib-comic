<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
include('simple_html_dom.php');

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $html = file_get_html('http://www.nettruyen.com/');
            $category_dom = $html->find('div.Module-144 ul.navbar-nav li.dropdown'); 
            $category_dom = $category_dom[0]->find('div.clearfix li'); 
            $i=0;$j=0;
            foreach($category_dom as $key=>$value){
                if($i==7){
                    $j++;
                    $i=0;
                }
                $category[$j][$i]['name'] = $value->find('a')[0]->plaintext;
                $category[$j][$i]['slug'] = substr($value->find('a')[0]->href, strpos($value->find('a')[0]->href, 'tim-truyen') + 11);
                $category[$j][$i]['title'] = $value->find('a')[0]->getAttribute('data-title');
                $i++;
            }
            $view->with('category',$category);
        });
    }
}
