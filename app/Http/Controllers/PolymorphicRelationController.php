<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class PolymorphicRelationController extends Controller
{
    public function posts($id)
    {
        $post = Post::find($id);

        foreach ($post->comments as $comment) {
            dd($comment);
        }
    }

    public function video($id)
    {
        $video = Video::find($id);

        foreach ($video->comments as $comment) {
            dd($comment);
        }
    }

    public function comments()
    {
        /**
         *         select * from "comments" where
                   (
                            (
                                "commentable_type" = 'App\Post' and exists (
                                select * from "posts" where "comments"."commentable_id" = "posts"."id" and "title" = 'foo'
                            )
                        )
                            or
                          (
                                "commentable_type" = 'App\Video' and exists (
                                select * from "videos" where "comments"."commentable_id" = "videos"."id" and "title" = 'foo'
                           )
                        )
                    )
         */
//        Comment::whereHasMorph('commentable', [Post::class, Video::class], function ($query, $type) {
//            if ($type === Post::class) {
//                // $query->
//            }
//            if ($type === Video::class) {
//                // $query->
//            }
//        });


       $comments =  Comment::whereHasMorph('commentable', [Post::class,Video::class], function ($query) {
            $query->where('id', 1);
        })->get();

       dd($comments);
    }

    public function savePost()
    {
       $validatedData['title']  = 'this is test post';
       $validatedData['body']  = 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh';

       $post = Post::create($validatedData);

        $comment = new Comment;
        $comment->body = "text post";

        $post->comments()->save($comment);

        return 'success';
    }

    public function saveVideo()
    {
       $video  = new Video();
       $video->title = 'this is test video';
       $video->url = 'http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=role_permission_testing&table=videos&pos=0';
       $video->save();

       $comment = new Comment;
       $comment->body = "text video";

        $video->comments()->save($comment);
        return 'success';
    }
}
