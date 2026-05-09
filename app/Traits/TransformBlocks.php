<?php

namespace App\Traits;

trait TransformBlocks
{
    public function transformBlocks($blocks): array
    {
        $data = [];

        foreach ($blocks as $block) {

            switch ($block->type) {

                case 'title':
                    $data['title'] = $block->content['text'] ?? '';
                    break;

                case 'subtitle':
                    $data['subtitle'] = $block->content['text'] ?? '';
                    break;

                case 'image':
                    $data['image'] = $block->content['url'] ?? '';
                    break;

                case 'list':
                    $data['list'] = $block->content['items'] ?? [];
                    break;

                case 'card':
                    $data['cards'][] = $block->content;
                    break;
            }
        }

        return $data;
    }
}