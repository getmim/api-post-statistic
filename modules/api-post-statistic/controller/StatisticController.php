<?php
/**
 * StatisticController
 * @package api-post-statistic
 * @version 0.0.1
 */

namespace ApiPostStatistic\Controller;

use LibFormatter\Library\Formatter;

use Post\Model\Post;
use PostStatistic\Model\PostStatistic as PStatistic;

class StatisticController extends \Api\Controller
{
    public function popularAction() {
        if(!$this->app->isAuthorized())
            return $this->resp(401);

        list($page, $rpp) = $this->req->getPager();

        $cond = [
            'post.status' => 3
        ];

        if($created = $this->config->apiPostStatistic->popular->created){
            $created = strtotime($created);
            $cond['post.created'] = ['__op', '>', date('Y-m-d 00:00:00', $created)];
        }

        $posts = [];

        $pstats = PStatistic::get($cond, $rpp, 1, ['views'=>false]);
        if($pstats){
            $post_ids = array_column($pstats, 'post');
            $posts = Post::get(['id'=>$post_ids]);
        }

        if($posts){
            $fmt = ['user'];
            if(module_exists('post-category'))
                $fmt[] = 'category';
            $posts = Formatter::formatMany('post', $posts, $fmt);
        }
        
        foreach($posts as &$pg)
            unset($pg->meta);
        unset($pg);

        $this->resp(0, $posts);
    }

    public function trendingAction() {
        if(!$this->app->isAuthorized())
            return $this->resp(401);

        list($page, $rpp) = $this->req->getPager();

        $cond = [
            'post.status' => 3
        ];

        if($created = $this->config->apiPostStatistic->trending->created){
            $created = strtotime($created);
            $cond['post.created'] = ['__op', '>', date('Y-m-d 00:00:00', $created)];
        }

        $posts = [];

        $pstats = PStatistic::get($cond, $rpp, 1, ['views'=>false]);
        if($pstats){
            $post_ids = array_column($pstats, 'post');
            $posts = Post::get(['id'=>$post_ids]);
        }

        if($posts){
            $fmt = ['user'];
            if(module_exists('post-category'))
                $fmt[] = 'category';
            $posts = Formatter::formatMany('post', $posts, $fmt);
        }

        foreach($posts as &$pg)
            unset($pg->meta);
        unset($pg);

        $this->resp(0, $posts);
    }
}