<?php
/**
 * Created by Anonymous
 * Date: 2/5/20
 * Time: 1:48 am
 */

interface Subscriber {
    public function update($postId);
}

class HealthTips {
    private array $subscribers = array();
    private $post;

    public function addSubscriber(Subscriber $subscriber)
    {
        $this->subscribers[] = $subscriber;
        echo "new Subscriber added \n";
    }

    public function notifySubscribers()
    {
        foreach ($this->subscribers as $subscriber) {
            $subscriber->update($this->post);
        }
    }

    public function publishPost($post)
    {
        $this->post = $post;
        $this->notifySubscribers();
    }


}

class FoodBlogSubscriber implements Subscriber {
    public function update($postId)
    {
        echo "Food blog: $postId has been published";
    }
}

$publisher = new HealthTips();
$subscriber = new FoodBlogSubscriber();
$publisher->addSubscriber($subscriber);
$publisher->publishPost(12);