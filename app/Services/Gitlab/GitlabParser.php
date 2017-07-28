<?php

namespace App\Services\Gitlab;

use App\Services\Discord\Content\Embed;
use App\Services\Discord\Content\Message;

final class GitlabParser
{
    public function parse(string $type, array $payload): Message
    {
        switch ($type) {
            case 'Issue Hook':
                return $this->parseIssue($payload);
            default:
                abort(422);
        }

        return null;
    }

    private function parseIssue(array $payload): Message
    {
        $message = new Message;
        $embed = new Embed;

        // Begin parsing
        $project = $payload['project']['namespace'] . '/' . $payload['project']['name'];
        $username = $payload['user']['username'];
        $thumbnail = $payload['project']['avatar_url'];
        $issue_id = $payload['object_attributes']['iid'];
        $issue_title = $payload['object_attributes']['title'];
        $issue_url = $payload['object_attributes']['url'];
        $issue_action = $payload['object_attributes']['state'];

        $embed->setTitle($username . ' ' . $issue_action . ' issue #' . $issue_id)
            ->setDescription('Issue #' . $issue_id . ' was ' . $issue_action . ' on ' . $project . PHP_EOL . $issue_title)
            ->setUrl($issue_url)
            ->setThumbnail($thumbnail);
        // End parsing

        return $message->addEmbed($embed);
    }
}