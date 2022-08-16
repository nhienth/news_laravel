<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class News extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'news_id' => $this->news_id,
            'category_id' => $this->category_id,
            'news_title' => $this->news_title,
            'news_img' => $this->news_img,
            'news_summary' => $this->news_summary,
            'news_content' => $this->news_content,
            'date_posted' => $this->date_posted->format('d/m/Y'),
            'date_updated' => $this->date_updated->format('d/m/Y'),
            'news_status' => $this->news_status,
            'author_id' => $this->author_id,
            'news_views' => $this->news_views,
        ];
    }
}
